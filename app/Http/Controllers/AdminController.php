<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Sermons;
use App\Models\SermonNotes;
use App\Models\Event;

use DB;

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
    public function newevent(Request $request)
    {
        $request->validate([
            'eventupload' => 'required|mimes:jpeg,png,webp,svg|max:2048',
        ]);
        $eventfile = $request->file('eventupload');
        if ($eventfile) {
            $validExtensions = ['jpeg', 'png', 'webp', 'svg'];
            $fileExtension = strtolower($eventfile->getClientOriginalExtension());

            if (!in_array($fileExtension, $validExtensions)) {
                return redirect()
                    ->back()
                    ->with('error', 'Invalid file format. Please upload a jpeg, png, webp, svg file.');
            }
            $eventfileName = time() . '.' . $fileExtension;
            $eventfile->move('EventImages/', $eventfileName);
            $event = new Event();
            $event->Img_Path = $eventfileName;
            $event->Event_Title = $request->event_title;
            $event->Event_Date = $request->event_date;
            $event->Event_Description = $request->event_description;
            $event->save();
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
