<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AppUser;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register_user(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string|max:12|min:10',
            'email' => 'required|email|unique:app_users,email',
            'password' => 'required|string|min:8',
            'confirmpassword' => 'required|string|min:8' 
        ]);

        $user = AppUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        $token = $user->createToken('authToken')->plainTextToken;
        return response()->json(['user' => $user, 'message' => 'App user registered successfully']);

        // return response()->json(['token' => $token]);
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
    
        $user = AppUser::where('email', $credentials['email'])->first();
    
        if ($user && Hash::check($credentials['password'], $user->password)) {
            return response()->json([
                'user_id' => $user->id,
                'user' => $user,
                'access_token' => $user->createToken('auth_token')->plainTextToken,
                'message' => 'User logged in successfully',
            ]);
        }
    
        return response()->json(['message' => 'Invalid credentials'], 401);
    }
    
}
