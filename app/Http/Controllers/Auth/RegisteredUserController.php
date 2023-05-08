<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rules;
use Inertia\Inertia;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
       
            'role'=>'required',
            'password' => [
    'required',
    'confirmed',
    Password::defaults(),
],

        ]);
        //! user avatar storage logic
        $avatar_path = '';
        if ($request->hasFile('avatar')) {
            $avatar_path = $request->file('avatar')->store('/avatars', 'public');
        }
        // ! user registration only
        $user = User::create([
            'name' => $request->name,
            'branch'=> $request->branch,
            'avatar'=>'storage/' . $avatar_path,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);
        dd($user);
       
        

        // event that listens to a user being registered
        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
