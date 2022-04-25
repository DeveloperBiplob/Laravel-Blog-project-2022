<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Category;
use App\Models\Post;
use App\Models\Slider;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $data = [];
        $data['sliders'] = Slider::latest()->get();
        $data['about'] = About::first();
        $data['randomPosts'] = Post::with('authorData', 'category', 'subCategory')->latest()->inRandomOrder()->take(3)->get();
        $data['latestPosts'] = Post::with('authorData', 'category', 'subCategory')->latest()->take(3)->get();
        return view('Frontend.Pages.home', $data);
    }

    public function allPost()
    {
        $data = [];
        $data['randomPosts'] = Post::with('authorData', 'category', 'subCategory')->latest()->inRandomOrder()->paginate(6);
        $data['latestPosts'] = Post::with('authorData', 'category', 'subCategory')->latest()->take(3)->get();
        $data['categories'] = Category::latest()->get();
        $data['tags'] = Tag::latest()->get();
        return view('Frontend.Pages.all_post', $data);
    }

    public function PostDetails()
    {
        return view('Frontend.Pages.single_post');
    }

    public function postSearch(Request $request)
    {
        return Post::where('name', 'LIKE', "%$request->name%")->take(5)->get();
    }
}
