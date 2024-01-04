<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Sermons;
use App\Models\SermonNotes;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    // Events =====================
    public function events()
    {
        return view('admin.pages.events');
    }

    // Profile page ==================
    public function profile() {
        return view('admin.pages.profile_page');
    }

    public function validateAndMoveImage($file)
    {
        $validExtensions = ['jpeg', 'jpg', 'png', 'webp', 'svg'];
        $fileExtension = strtolower($file->getClientOriginalExtension());

        if (!in_array($fileExtension, $validExtensions)) {
            return false;
        }

        $fileName = time() . '.' . $fileExtension;
        $file->move('EventImages/', $fileName);

        return $fileName;
    }

    public function newevent(Request $request)
    {
        $request->validate([
            'eventupload' => 'required|mimes:jpeg,png,jpg,webp,svg|max:2048',
            'event_title' => 'required|string|max:255',
            'event_date' => 'required|date',
            'event_description' => 'required|string',
        ]);

        $eventfile = $request->file('eventupload');
        $eventfileName = $this->validateAndMoveImage($eventfile);

        if ($eventfileName === false) {
            return redirect()
                ->back()
                ->with('error', 'Invalid file format. Please upload a jpeg, jpg, png, webp, svg file.');
        }

        $event = new Event();
        $event->Event_Title = $request->event_title;
        $event->Event_Date = $request->event_date;
        $event->Event_Description = $request->event_description;
        $event->Img_Path = $eventfileName;

        $save = $event->save();

        return redirect()->back();
    }

    public function updateevent(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'event_title' => 'required|string|max:255',
            'event_date' => 'required|date',
            'event_description' => 'required|string',
            'event_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Add image validation if needed
        ]);

        $event = Event::findOrFail($request->event_id);

        $event->Event_Title = $request->event_title;
        $event->Event_Date = $request->event_date;
        $event->Event_Description = $request->event_description;

        if ($request->hasFile('event_image')) {
            $imagePath = $this->validateAndMoveImage($request->file('event_image'));

            if ($imagePath === false) {
                return redirect()
                    ->back()
                    ->with('error', 'Invalid file format. Please upload a jpeg, jpg, png, webp, svg file.');
            }

            $event->Img_Path = $imagePath;
        }

        $event->save();

        return redirect()->back()->with('success', 'Event updated successfully');
    }



    public function deleteevent($id)
    {
        try {
            $event = Event::findOrFail($id);
            $event->delete();
            return response()->json(['message' => 'Event deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while deleting the announcement.'], 500);
        }
    }
    // END Events

    public function newannouncement(Request $request)
    {
        //user ajax.to save the data.
        $announcement = new Announcement();
        $announcement->Topic = $request->Topic;
        $announcement->Message = $request->Message;
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

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        return redirect()->route('login');
    }

    public function newsermons(Request $request)
    {
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
            $validExtensions = ['jpeg', 'png', 'jpg', 'webp', 'svg'];
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



    public function update_user(Request $request, $id)
    {
        $request->validate([
            'email'    => 'required|email|unique:users,email,' . $id,
            'password' => 'sometimes|nullable|min:6',
        ]);

        $user = User::findOrfail($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->email = $request->input('email');
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();
        return redirect()->back()->with('message', 'User updated successfully.');
    }

    public function update_announcement(Request $request, $id) {
        $request->validate([
            'Topic'    => 'required|string',
            'Message' => 'required|string',
        ]);

        $announcements = Announcement::findOrfail($id);

        if (!$announcements) {
            return response()->json(['message' => 'Announcement not found'], 404);
        }

        $announcements->Topic = $request->input('Topic');
        $announcements->Message = $request->input('Message');

        $announcements->save();


        return redirect()->back()->with('message', 'Announcement updated successfully.');
    }

    public function update_sermon_notes(Request $request, $id)
    {
        $request->validate([
            'notesupload' => 'sometimes|required|mimes:pdf,doc,docx,ppt,pptx|max:2048',
            'sermondescription' => 'required|string',
        ]);
    
        $sermonnotes = SermonNotes::findOrFail($id);
    
        if (!$sermonnotes) {
            return response()->json(['message' => 'Notes not found'], 404);
        }
    
        $notesfileName = $sermonnotes->notesupload;
    
        if ($request->hasFile('notesupload')) {
            $validExtensions = ['pdf', 'doc', 'docx', 'ppt', 'pptx'];
            $fileExtension = strtolower($request->file('notesupload')->getClientOriginalExtension());
    
            if (!in_array($fileExtension, $validExtensions)) {
                return redirect()
                    ->back()
                    ->with('error', 'Invalid file format. Please upload a PDF, DOC, DOCX, PPT, or PPTX file.');
            }
    
            $notesfileName = time() . '.' . $fileExtension;
            $request->file('notesupload')->move('SermonNotes/', $notesfileName);
        }
    
        $sermonnotes->update([
            'notesupload' => $notesfileName,
            'sermondescription' => $request->sermondescription,
        ]);
    
        return redirect()->back();
    }
    

    public function download_sermon_notes ($id) {
        $path_name = SermonNotes::where("id", $id)->value("notesupload");
        $file_path = 'public/SermonNotes/' . $path_name;
        if (Storage::exists($file_path)) {
            return Storage::disk('local')->get($file_path);
        } else {
            return response()->json(['error' => 'File not found'], 404);
        }
    }

    public function update_admin_profile(Request $request, $id) {
        $request->validate([
            'email'    => 'required|email|unique:users,email,' . $id,
            'password' => 'sometimes|nullable|min:6',
        ]);

        $user = User::findOrfail($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->email = $request->input('email');
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();
        return redirect()->back()->with('message', 'Admin updated successfully.');
    }
}
