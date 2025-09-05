<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterUserRequest;

class UserController extends Controller
{
    public function register(RegisterUserRequest $request) {
        $validated = $request->validated();
        $validated["password"] = bcrypt($validated["password"]);
        $user = User::create($validated);
        Auth::guard('web')->login($user);
        
        return redirect('/');
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }

    public function login(LoginUserRequest $request) {
        $validated = $request->validated();

        if (Auth::attempt([
            'email' => $validated["userEmail"], 
            'password' => $validated["userPassword"]
        ])) {
            $request->session()->regenerate();
        }

        return redirect('/');
    }
}
