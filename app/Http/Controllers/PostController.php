<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function __construct() {
        $this->middleware("verified")->except("show");
    }

    public function create()
    {
        $this->authorize("create", Post::class);
        $post = null;
        return view("posts.create", compact("post"));
    }

    public function show(Post $post)
    {
        return view("posts.show",  compact("post"));
    }

    public function store(Request $request)
    {
        // Validate inputs from the form
        $this->validate($request, [
            "content" => "required",
            "image_file" => ["required", "image"],
            "title" => "required",
            "category" => "required"
        ]);

        // Generate UUID
        $uuid = Str::orderedUuid()->toString();
        // Get File Extension
        $extension = $request->file('image_file')->getClientOriginalExtension();

        $bucket_name = getenv("AWS_BUCKET");
        $region = getenv("AWS_DEFAULT_REGION");

        // Filename in the bucket
        $filename =  "post-pics/{$uuid}.{$extension}";

        // Full Image URL
        $image_file = "https://{$bucket_name}.s3.{$region}.amazonaws.com/{$filename}";

        try {
            // Upload to S3
            Storage::disk("s3")->put($filename, fopen($request->file("image_file"), "r+"), "public");

            // Create a post in the database
            Auth::user()->posts()->create([
                "id" => $uuid,
                "filename" => $filename,
                "image_file" => $image_file,
                "content" => $request->content,
                "title" => $request->title,
                "category" => $request->category
            ]);

            return redirect()->route("main.home")->with("success", "Post Created Successfully");
        } catch (\Throwable $th) {
            return back()->with("error", "Couldn't create post, Please try again later.");
        }
    }

    public function edit(Request $request, Post $post)
    {
        // Check if user has permission to update the specific post
        $this->authorize("update", $post);

        return view("posts.edit", compact("post"));
    }

    public function update(Request $request, Post $post)
    {
        // Check if user has permission to update the specific post
        $this->authorize("update", $post);

        $this->validate($request, [
            "content" => "required",
            "image_file" => "image",
            "title" => "required",
            "category" => "required"
        ]);

        try {
            if ($request->image_file) {
                // Reupload image
                Storage::disk("s3")->put($post->filename, fopen($request->file("image_file"), "r+"), "public");
            }
            // Update Post in the database
            $post->update($request->only(["content", "title", "category"]));

            return redirect()->route("main.home")->with("success", "Post Updated Successfully");
        } catch (\Throwable $th) {
            return back()->with("error", "Couldn't update post, Please try again later.");
        }

    }

    public function destroy(Post $post)
    {
        // Check if user has permission to delete the specific post
        $this->authorize("delete", $post);

        try {
            if (Storage::disk("s3")->exists($post->filename)) {
                // Delete file from s3
                Storage::disk("s3")->delete($post->filename);
            }

            // Delete post
            $post->delete();

            return redirect()->route("main.home")->with("success", "Post Deleted Successfully");
        } catch (\Throwable $th) {
            return back()->with("error", "Couldn't delete post, Please try again later.");
        }
    }
}
