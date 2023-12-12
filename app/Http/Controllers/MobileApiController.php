<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Event;
use App\Models\SermonNotes;
use App\Models\Sermons;
use Illuminate\Http\Request;
use App\Models\User;

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
}
