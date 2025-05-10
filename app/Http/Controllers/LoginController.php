<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->is_admin) {
                return redirect('/admin');
            }
            return redirect('/seller');
        }
        return view('auth.login');
    }

    public function create()
    {
        return redirect()->route('login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            $redirect = Auth::user()->is_admin ? '/admin' : '/seller';
            return redirect()->intended($redirect)
                ->with('success', 'You have successfully logged in!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function show(string $id)
    {
        return abort(404);
    }

    public function edit(string $id)
    {
        return abort(404);
    }

    public function update(Request $request, string $id)
    {
        return abort(404);
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'You have been logged out!');
    }
}
