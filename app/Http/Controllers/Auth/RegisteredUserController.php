<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Session;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }
    public function create2(): View|RedirectResponse
    {
        if (!Session::has('register') && !Session::has('register-google')) {
            return redirect(route('register'));
        }

        return view('auth.register_step_2');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);


        Session::put('register', [
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);



        return redirect(route('register2'));
    }
    public function store2(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'member_id' => 'required|numeric',
            'member_id_image' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);


        if (!Session::has('register') && !Session::has('register-google')) {
            return redirect(route('register'));
        }

        $isFirstUser = User::count() === 0;

        $userData = [
            'name' => Session::has('register-google') ? Session::get('register-google')['name'] : $request->name,
            'email' => Session::has('register-google') ? Session::get('register-google')['email'] : Session::get('register')['email'],
            'password' => Session::has('register-google') ? Session::get('register-google')['password'] : Session::get('register')['password'],
            'phone' => $request->phone,
            'member_id' => $request->member_id,
            'member_id_path' => $request->file('member_id_image')->store('member_id_images', 'public'),
            'is_admin' => $isFirstUser ? true : false,
            'member_id_approved' => $isFirstUser ? true : false,
            'member_status' => true,
        ];

        if (Session::has('register-google')) {
            $sessionData = Session::get('register-google');
            $userData['google_id'] = $sessionData['google_id'];
            $userData['avatar'] = $sessionData['avatar'];
        }

        $user = User::create($userData);





        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
