<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware("verified")->except("show");
    }

    public function show(User $user)
    {
        $posts = Post::latest()->where("user_id", $user->id)->with(["user"])->paginate(4);
        return view("users.show", compact("user", "posts"));
    }

    public function edit(User $user)
    {
        // Check if user is allowed to update the profile
        if ($user->username !== Auth::user()->username) {
            abort(403);
        }
        return view("users.edit");
    }

    public function update(Request $request, User $user)
    {
        // Check if user is allowed to update the profile
        if ($user->username !== Auth::user()->username) {
            abort(403);
        }
        $this->validate($request, [
            "fullname" => ["required","max:100"],
            "username" => ["required","max:100"],
            "image_file" => ["image"],
            "facebook_link" => ["nullable", "url"],
            "twitter_link" => ["nullable", "url"],
            "instagram_link" => ["nullable", "url"],
            "linkedin_link" => ["nullable", "url"],
        ]);

        try {
            if ($request->image_file) {
                // Get File Extension
                $extension = $request->file('image_file')->getClientOriginalExtension();

                $bucket_name = getenv("AWS_BUCKET");
                $region = getenv("AWS_DEFAULT_REGION");

                // Filename in the bucket
                $filename =  "profile-pics/{$user->id}.{$extension}";

                // Full Image URL
                $image_file = "https://{$bucket_name}.s3.{$region}.amazonaws.com/{$filename}";

                // Reupload image
                Storage::disk("s3")->put($filename, fopen($request->file("image_file"), "r+"), "public");
            }

            User::find(Auth::user()->id)->update([
            "job_title" => $request->job_title ?? "",
            "facebook_link" => $request->facebook_link ?? "",
            "twitter_link" => $request->twitter_link ?? "",
            "instagram_link" => $request->instagram_link ?? "",
            "linkedin_link" => $request->linkedin_link ?? "",
            "bio" => $request->bio ?? "",
            "location" => $request->location ?? "",
            "fullname" => $request->fullname,
            "username" => $request->username,
            "image_file" => $request->image_file ? $image_file : Auth::user()->image_file,
            ]);

            return back()->with("success", "Account updated successfully");
        } catch (\Throwable $e) {
            return back()->with("error", "Username is already taken");
        }

    }
}
