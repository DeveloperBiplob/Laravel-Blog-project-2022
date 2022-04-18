<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('Frontend.Pages.home');
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
