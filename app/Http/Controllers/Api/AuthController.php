<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AppUser;

class AuthController extends Controller
{

    public function register_user(Request $request)
    {
        $userData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone' => 'required|string|max:12',
            'password' => 'required|min:8',
        ]);

        $user = AppUser::create([
            'name' => $userData['name'],
            'email' => $userData['email'],
            'phone' => $userData['phone'],
            'password' => bcrypt($userData['password']),
        ]);


        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json(['token' => $token]);
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('app_users')->attempt($credentials)) {
            $user = Auth::guard('app_users')->user();

            $token = $user->createToken('authToken')->plainTextToken;

            // Return the token as a JSON response
            return response()->json(['token' => $token]);
        }

        // If authentication fails, return an unauthorized response
        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
