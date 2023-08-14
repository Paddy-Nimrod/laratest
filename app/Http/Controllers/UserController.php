<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Validation\Rule;


class UserController extends Controller
{
    public function register(Request $request)
    {
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:200']
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        auth()->login($user);
        return redirect('/home');
    }

    //login function 
    public function login(Request $request)
    {
        $incomingFields = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);
        if (auth()->attempt(['email' => $incomingFields['login_name'], 'password' => $incomingFields['login_password']])) {
            $request->session()->regenerate();
        }
        return redirect("/home");
    }

    // logout function
    public function logout()
    {
        auth()->logout();
        return redirect('/home');
    }
}
