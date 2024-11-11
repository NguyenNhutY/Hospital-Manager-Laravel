<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        // Find the user by username
        $user = User::where('name', $username)->first();

        if (!$user) {
            return response()->json(['message' => 'Invalid username'], 401);
        }

        // Check if the provided password matches the hashed password in the database
        if (Hash::check($password, $user->password)) {
            return response()->json(['message' => 'Login successful'],  200);
        }

        return response()->json(['message' => 'Invalid password'], 401);
    }
}
