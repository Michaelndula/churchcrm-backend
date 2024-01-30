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
        //TODO Adding User Profile image.
        $validated = $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string|max:12|min:10',
            'email' => 'required|email|unique:app_users,email',
            'password' => 'required|string|min:8',
        ]);
        $password = $request->password;
        $confirmpassword = $request->confirmpassword;
        if ($password == $confirmpassword) {
            $user = new AppUser();

            $user->name = $validated['name'];
            $user->email = $validated['email'];
            $user->phone = $validated['phone'];
            $user->profile_photo_path= 'default_user_profile.jpeg';
            $user->password = Hash::make($password);

            $save = $user->save();
            
            if ($save) {
                $token = $user->createToken('authToken')->plainTextToken;
                return response()->json(['user' => $user, 'message' => 'App user registered successfully']);
            }
        } else {
            return response()->json(['message' => 'Password do not match']);
        }
    }
    // Update User
    public function update_user(Request $request, $id) {
        $validated = $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string|max:12|min:10',
            'email' => 'required|email|unique:app_users,email',
            'password' => 'required|string|min:8',
            'profile' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            'membership_status' => 'string',
        ]);

        $profile_pic = $validated['profile'];

        $user = AppUser::findOrFail($id);
        if($user) {
            $user->name = $validated['name'];
            $user->email = $validated['email'];
            $user->phone = $validated['phone'];
            $user->password = Hash::make($validated['password']);
            $user->membership_status = $validated['membership_status'];

            //Saving the profile photo
            // if ($profile_pic) {
            //     $validExtensions = ['jpeg', 'png', 'jpg', 'webp', 'svg'];
            //     $fileExtension = strtolower($profile_pic->getClientOriginalExtension());

            //     if (!in_array($fileExtension, $validExtensions)) {
            //         return redirect()
            //             ->back()
            //             ->with('error', 'Invalid file format. Please upload a jpeg, jpg,  png, webp, svg file.');
            //     }
            //     $profile_pic_path = time() . '.' . $fileExtension;
            //     $profile_pic->move('Mobile_App_Profile_Pics/', $profile_pic_path);
            // }

            // $user->profile_photo_path = $profile_pic_path;
            $user->profile_photo_path = 'default_user_profile.jpeg';

            $user->save();
        }
        else {
            return response()->json(['message' => 'Error! User does not exist']);
        }
     }

    //  Delete user account 
    public function delete_user($id) {
        
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
