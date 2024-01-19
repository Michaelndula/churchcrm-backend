<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Event;
use App\Models\Note;
use App\Models\SermonNotes;
use App\Models\Sermons;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

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

   

    public function createNotes(Request $request)
    {
        // ===== Pending work on the upload of the image =====//
        $validatedData = $request->validate([
            'note_topic' => 'required|string',
            'content' => 'required|string',
        ]);

        $notes = new Note();
        
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

    public function displayNotes()
    {
        $jsonFilePath = Storage::path('UserNotes\notes_file.json');
    
        if (file_exists($jsonFilePath)) {
            $existingNotes = file_get_contents($jsonFilePath);
            $notesData = json_decode($existingNotes, true) ?? [];
            
            //returning the data 
            return response()->json(['data' => $notesData]);
        } else {
            return response()->json(['message' => 'No notes found', 'data' => []]);
        }
    }
    

    public function sermonAndNote($id)
    {
        $data = Sermons::where('id', $id)->first();

    //     $pdfFile =  public_path('SermonNotes/' . $data->Sermon_Notes);
    //     $parser = new \Smalot\PdfParser\Parser();
    //     $pdf = $parser->parseFile($pdfFile);
    //     $text = mb_convert_encoding($pdf->getText(), 'UTF-8', 'UTF-8');
    //     $data->text = $text;

        return response()->json($data);
    }
}
