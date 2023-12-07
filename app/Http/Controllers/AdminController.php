<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Sermons;
use App\Models\SermonNotes;
use App\Models\Event;
use DB;
use Illuminate\Support\Facades\Redis;

class AdminController extends Controller
{
    //
    //
    public function admin()
    {
        return view('admin.index');
    }
    public function dashboard()
    {
        return view('admin.index');
    }
    public function users()
    {
        return view('admin.pages.users');
    }
    public function announcements()
    {
        return view('admin.pages.announcements');
    }
    public function sermons()
    {
        return view('admin.pages.sermons');
    }
    public function sermonsnotes()
    {
        return view('admin.pages.sermons-notes');
    }
    public function events()
    {
        return view('admin.pages.events');
    }
    public function newannouncement(Request $request)
    {
        //user ajax.to save the data.
        $announcement = new Announcement();
        $announcement->Topic = $request->topic;
        $announcement->Message = $request->message;
        $announcement->save();
        return redirect()->back();
    }
    //deleteannouncement
    public function deleteannouncement($id)
    {
        try {
            $announcement = Announcement::findOrFail($id);
            $announcement->delete();

            return response()->json(['message' => 'Announcement deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while deleting the announcement.'], 500);
        }
    }

    public function newsermonnotes(Request $request)
    {
        $request->validate([
            'notesupload' => 'required|mimes:pdf,doc,docx,ppt,pptx|max:2048',
        ]);
        $notesfile = $request->file('notesupload');
        if ($notesfile) {
            $validExtensions = ['pdf', 'doc', 'docx', 'ppt', 'pptx'];
            $fileExtension = strtolower($notesfile->getClientOriginalExtension());

            if (!in_array($fileExtension, $validExtensions)) {
                return redirect()
                    ->back()
                    ->with('error', 'Invalid file format. Please upload a PDF, DOC, DOCX, PPT, or PPTX file.');
            }
            $notesfileName = time() . '.' . $fileExtension;
            $notesfile->move('SermonNotes/', $notesfileName);
            $sermonnotes = new SermonNotes();
            $sermonnotes->notesupload = $notesfileName;
            $sermonnotes->sermondescription = $request->sermondescription;
            $sermonnotes->save();
        }
        return redirect()->back();
    }

    public function deletesermonnotes($id)
    {
        try {
            $announcement = SermonNotes::findOrFail($id);
            $announcement->delete();

            return response()->json(['message' => 'Announcement deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while deleting the announcement.'], 500);
        }
    }







    public function newsermons(Request $request) {
        $sermons = new Sermons();
    
        // Adding the Sermon Notes
        $request->validate([
            'Sermon_Notes' => 'mimes:pdf,doc,docx,ppt,pptx|max:2048',
            'Thumbnail' => 'mimes:jpeg,png,jpg,webp,svg|max:2048',
        ]);

        $sermon_notes = $request->file('Sermon_Notes');
        if ($sermon_notes) {
            $validExtensions = ['pdf', 'doc', 'docx', 'ppt', 'pptx'];
            $fileExtension = strtolower($sermon_notes->getClientOriginalExtension());

            if (!in_array($fileExtension, $validExtensions)) {
                return redirect()
                    ->back()
                    ->with('error', 'Invalid file format. Please upload a PDF, DOC, DOCX, PPT, or PPTX file.');
            }
            $sermon_notes_fileName = time() . '.' . $fileExtension;
            $sermon_notes->move('SermonNotes/', $sermon_notes_fileName);
            $sermons->Sermon_Notes = $sermon_notes_fileName;
        }
        // Adding the Thumbnail
       

        $thumbnailFile = $request->file('Thumbnail');
        if ($thumbnailFile) {
            $validExtensions = ['jpeg', 'png','jpg', 'webp', 'svg'];
            $fileExtension = strtolower($thumbnailFile->getClientOriginalExtension());

            if (!in_array($fileExtension, $validExtensions)) {
                return redirect()
                    ->back()
                    ->with('error', 'Invalid file format. Please upload a jpeg, jpg,  png, webp, svg file.');
            }
            $thumbnailFileName = time() . '.' . $fileExtension;
            $thumbnailFile->move('SermonThumbnails/', $thumbnailFileName);
            $sermons->Thumbnail = $thumbnailFileName;
        }

        $sermons->Title = $request->Title;
        $sermons->Sermon_Description = $request->Sermon_Description;
        $sermons->Sermon_Link = $request->Sermon_Link;
        $sermons->save();
        return redirect()->back();
    }








    public function newevent(Request $request)
    {
        $request->validate([
            'eventupload' => 'required|mimes:jpeg,png,jpg,webp,svg|max:2048',
        ]);
        $eventfile = $request->file('eventupload');
        if ($eventfile) {
            $validExtensions = ['jpeg','jpg', 'png', 'webp', 'svg'];
            $fileExtension = strtolower($eventfile->getClientOriginalExtension());

            if (!in_array($fileExtension, $validExtensions)) {
                return redirect()
                    ->back()
                    ->with('error', 'Invalid file format. Please upload a jpeg, jpg, png, webp, svg file.');
            }
            $eventfileName = time() . '.' . $fileExtension;
            $eventfile->move('EventImages/', $eventfileName);
            $event = new Event();
            $event->Img_Path = $eventfileName;
            $event->Event_Title = $request->event_title;
            $event->Event_Date = $request->event_date;
            $event->Event_Description = $request->event_description;
            $save = $event->save();

           
        }
        return redirect()->back();
    }
    public function deleteevent($id)
    {
        try {
            $announcement = Event::findOrFail($id);
            $announcement->delete();
            return response()->json(['message' => 'Announcement deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while deleting the announcement.'], 500);
        }
    }
}
