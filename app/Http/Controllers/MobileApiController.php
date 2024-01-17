<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Event;
use App\Models\Note;
use App\Models\SermonNotes;
use App\Models\Sermons;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
use PDFParser;

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
        $notes = Sermons::select('Notes_Thumbnail', 'Sermon_Notes')->get();
        return response()->json(['data' => $data, 'notes' => $notes]);
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

    public function createNotes(Request $request) {
        $validatedData = $request->validate([
            'note_topic' => 'required|string',
            'content' => 'required|string',
            'note_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $notes = new Note();
        $notes_image_thumbnail = $validatedData['note_img'];
        if ($notes_image_thumbnail) {
            $validExtensions = ['jpeg', 'png', 'jpg', 'webp', 'svg'];
            $fileExtension = strtolower($notes_image_thumbnail->getClientOriginalExtension());

            if (!in_array($fileExtension, $validExtensions)) {
                return redirect()
                    ->back()
                    ->with('error', 'Invalid file format. Please upload a jpeg, jpg,  png, webp, svg file.');
            }
            $notesThumbnailFile = time() . '.' . $fileExtension;
            $notes_image_thumbnail->move('User_Notes_Thumbnails/', $notesThumbnailFile);
            $notes->note_img = $notesThumbnailFile;
        }

        $notes->note_topic = $validatedData['note_topic'];
        $notes->user_id_fk = $request->user_id_fk;
        
        $notes->save();

        $jsonFilePath = Storage::path('UserNotes\notes_file.json');

        if (file_exists($jsonFilePath)) {
            $existingNotes = file_get_contents($jsonFilePath);
            $data = json_decode($existingNotes, true) ?? [];
        } else {
            $data = [];
        }

        // Data to be sent to the file
        $data[$notes->id] = [
            'userID' => $notes->user_id_fk,
            'note_topic' => $notes->note_topic,
            'content' => $validatedData['content'],
        ];

        file_put_contents($jsonFilePath, json_encode($data, JSON_PRETTY_PRINT));
    }

    public function displayNotes($id) {
    
        // Find all notes for the logged user
        $user = User::where('id', $id)->first();

        if ($user) {
            $data = Note::where('user_id_fk', $user->id)->orderBy('updated_at', 'desc')->get();
            // Get the created date
            // $createdAtDate = Carbon::parse($data->created_at)->toDateString();
            return response()->json($data);
        } else {
            return response()->json(['error' => 'User not found'], 404);
        }
    }

    // public function sermonAndNote($id) {
    //     $data = Sermons::where('id', $id)->first();

    //     $pdfFile =  public_path('SermonNotes/' . $data->Sermon_Notes);
    //     $parser = new \Smalot\PdfParser\Parser();
    //     $pdf = $parser->parseFile($pdfFile);
    //     $text = mb_convert_encoding($pdf->getText(), 'UTF-8', 'UTF-8');
    //     $data->text = $text;

    //     return response()->json($data);
    // }


}
