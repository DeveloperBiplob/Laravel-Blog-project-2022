<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Post;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $data = [];
        $data['sliders'] = Slider::latest()->get();
        $data['about'] = About::first();
        $data['randomPosts'] = Post::latest()->inRandomOrder()->take(3)->get();
        $data['latestPosts'] = Post::latest()->take(3)->get();
        return view('Frontend.Pages.home', $data);
    }

    public function allPost()
    {
        return view('Frontend.Pages.all_post');
    }

    public function PostDetails()
    {
        return view('Frontend.Pages.single_post');
    }
}
