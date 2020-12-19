<?php

namespace App\Http\Controllers;

use App\Models\Post;

class MainController extends Controller
{
    public function home()
    {
        $posts = Post::latest()->with(["user"])->paginate(4);

        return view("main.home", compact("posts"));
    }

    public function about()
    {
        return view("main.about");
    }
}
