<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register (Request $request) {
        $incommingFields = $request->validate([
            'name' => ['required', 'min:4', 'max:25'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'max:15']
        ]);
        return "Hello from User Contoller";
    }
}
