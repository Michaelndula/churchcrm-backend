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
            'phone' =>$userData['phone'],
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

        if (Auth::attempt($credentials)) {
            $user = Auth::appuser();
        $token = $user->createToken('authToken')->accessToken;

        // return response(['user' => $user, 'access_token' => $token]);

            $token = $request->user()->createToken('authToken')->plainTextToken;

            return response()->json(['token' => $token]);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }
}

