<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Event;
use App\Models\SermonNotes;
use App\Models\Sermons;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MobileApiController extends Controller
{
    public function fetchEvents()
    {
        $data = Event::all();
        return response()->json($data);
    }
    public function fetchAnnouncements()
    {
        $data = Announcement::all();
        return response()->json($data);
    }
    public function fetchSermonnotes()
    {
        $data = SermonNotes::all();
        return response()->json($data);
    }
    public function fetchSermons()
    {
        $data = Sermons::all();
        return response()->json($data);
    }
    public function fetchProfile($id)
    {
        $data = User::where('id', $id)->first();
        return response()->json($data);
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $token = $request->user()->createToken('authToken')->plainTextToken;

            $user = Auth::id();

            return response()->json(
                [
                    'token' => $token,
                    'email' => $credentials['email'],
                    'userId' => $user,
                ]
            );
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
