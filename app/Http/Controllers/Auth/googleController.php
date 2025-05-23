<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class GoogleController extends Controller
{
    // redirectToGoogle
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    // handleGoogleCallback
    public function handleGoogleCallback(Request $request)
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Check if user already exists
            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                session()->put('register-google', [
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'password' => bcrypt(Str::random(16)), // Generate a random password
                    'google_id' => $googleUser->getId(),
                    'avatar' => $googleUser->getAvatar(),
                ]);

                return redirect(route('register2'));
            }

            // If user exists, log them in
            Auth::login($user);
            return redirect('/dashboard');
        } catch (Exception $e) {
            return redirect('/login')->with('error', 'Something went wrong');
        }
    }
}
