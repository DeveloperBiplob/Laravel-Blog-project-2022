<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Post;
use App\Models\Slider;
use App\Models\SubCategory;
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
        $data['posts'] = Post::with('authorData', 'category', 'subCategory')->latest()->inRandomOrder()->paginate(6);
        $data['latestPosts'] = Post::with('authorData', 'category', 'subCategory')->latest()->take(3)->get();
        $data['categories'] = Category::latest()->get();
        $data['tags'] = Tag::latest()->get();
        return view('Frontend.Pages.all_post', $data);
    }

    public function PostDetails(Post $post)
    {
        $data = [];
        $data['latestPosts'] = Post::with('authorData', 'category', 'subCategory')->latest()->take(3)->get();
        $data['categories'] = Category::latest()->get();
        $data['tags'] = Tag::latest()->get();
        return view('Frontend.Pages.single_post', $data, compact('post'));
    }

    public function categoryWisePost(Category $category)
    {
        $data = [];
        $data['posts'] = $category->posts()->latest()->paginate(6);
        $data['latestPosts'] = Post::with('authorData', 'category', 'subCategory')->latest()->take(3)->get();
        $data['categories'] = Category::latest()->get();
        $data['tags'] = Tag::latest()->get();
        return view('Frontend.Pages.all_post', $data);
    }

    public function tagWisePost(Tag $tag)
    {
        $data = [];
        $data['posts'] = $tag->posts()->latest()->paginate(6);
        $data['latestPosts'] = Post::with('authorData', 'category', 'subCategory')->latest()->take(3)->get();
        $data['categories'] = Category::latest()->get();
        $data['tags'] = Tag::latest()->get();
        return view('Frontend.Pages.all_post', $data);
    }

    public function subCategoryWisePost(SubCategory $subCategory)
    {
        $data = [];
        $data['posts'] = $subCategory->posts()->latest()->paginate(6);
        $data['latestPosts'] = Post::with('authorData', 'category', 'subCategory')->latest()->take(3)->get();
        $data['categories'] = Category::latest()->get();
        $data['tags'] = Tag::latest()->get();
        return view('Frontend.Pages.all_post', $data);
    }

    public function adminWisePost(Admin $admin)
    {
        $data = [];
        $data['posts'] = $admin->posts()->latest()->paginate(6);
        $data['latestPosts'] = Post::with('authorData', 'category', 'subCategory')->latest()->take(3)->get();
        $data['categories'] = Category::latest()->get();
        $data['tags'] = Tag::latest()->get();
        return view('Frontend.Pages.all_post', $data);
    }

    public function postSearch(Request $request)
    {
        return Post::withOnly('authorData')->where('name', 'LIKE', "%$request->name%")->get(['name', 'slug', 'author']);
    }
}
