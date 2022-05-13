<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\SocailLoginNewUserMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;

class SocailiteController extends Controller
{
    public function login($provider)
    {
        // return $provider;
        return Socialite::driver($provider)->redirect();
    }

    public function loginCallback($provider)
    {
        $userData = Socialite::driver($provider)->user();

        $user = User::whereEmail($userData->getEmail())->first();

        if(!$user){
            $user = User::create([
                'name' => $userData->getName(),
                'email' => $userData->getEmail(),
                'password' =>bcrypt('password')
            ]);

            Mail::to($userData->getEmail())->send(new SocailLoginNewUserMail($user));
        }
        Auth::guard('web')->login($user);
        return redirect()->route('dashboard');



    }
}
