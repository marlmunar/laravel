<?php

namespace App\Http\Controllers;

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
}
