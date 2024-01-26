<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use App\Models\AppUser;
use Illuminate\Support\Facades\Hash;
class ResetPasswordController extends Controller
{
    public function showResetForm( $token, $email)
    {

        return view('auth.reset-appuser-password', [
            'token' => $token,
            'email' => $email,
        ]);
    }


    public function reset(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'token' => 'required|string',
                'password' => 'required|confirmed|min:8',
            ]);

            $status = Password::broker('app_users')->reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function ($user, $password) {
                    $user->forceFill([
                        'password' => Hash::make($password),
                        'remember_token' => Str::random(60),
                    ])->save();
                }
            );

            if ($status === Password::PASSWORD_RESET) {
                // Password reset was successful
                return view('auth.password-reset-success', ['status' => $status]);
            } else {
                // Password reset failed
                return view('auth.password-reset-failed', ['status' => $status]);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

   // TODO -MW
    private function isTokenValid($email, $token)
    {
        $user = AppUser::where('email', $email)->first();
        return $user && $user->password_reset_token === $token;
    }
}
