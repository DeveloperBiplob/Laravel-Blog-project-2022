<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function subscriber(Request $request)
    {
        $request->validate(['email'=> ['required', 'email', 'unique:subscribers,email']]);

        Subscriber::create($request->only('email'));
        return true;
    }
}
