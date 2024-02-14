<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use App\Models\AppUser;
use App\Models\Password_reset_code;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function showResetForm($token, $email)
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
    public function resetcode(Request $request)
    {
        try {
            $id = 1;
            $code = $request->code;

            $user = AppUser::where('password_reset_code', '=', $code)->get();
            if ($user) {
                return response()->json(['message' => $code], 200);
                // TODO - solve the diffminute error
                // if ($code && $user->password_reset_code->diffInMinutes(now()) < 60) {
                //     return response()->json(['message' => 'reset code available'], 200);
                // } else {
                //     return false;
                // }
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function resetpassword(Request $request, $code)
    {
        $credentials = $request->validate([
            'newpassword' => 'required|string',
            'confirmpassword' => 'required|string',
        ]);
        $user = AppUser::where('password_reset_code', $code)->get();
        if ($user) {
            $newpassword = $credentials['newpassword'];
            $confirmpassword = $credentials['confirmpassword'];
            if ($newpassword == $confirmpassword) {
                $password = Hash::make($credentials['confirmpassword']);
                $user->password = $password;

                // $user->update([
                //     'password' => $password,
                // ]);
                $user->save();
                return response()->json(['newpassword' => $newpassword], 200);
            }
        } else {
            return response()->json(['error' => 'User not found'], 404);
        }
    }
}
