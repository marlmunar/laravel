<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterUserRequest;

class UserController extends Controller
{
    public function register(RegisterUserRequest $request) {
        $validated = $request->validated();
        $validated["password"] = bcrypt($validated["password"]);
        User::create($validated);
        return "Hello from User Contoller";
    }
}
