<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Sermons;
use App\Models\SermonNotes;

use DB;

class AdminController extends Controller
{
    //
    //
    public function admin(){
        return view('admin.index');
    }
    public function dashboard(){
        return view('admin.index');
    }
    public function users(){
        return view('admin.pages.users');
    }
    public function announcements(){
        return view('admin.pages.announcements');
    }
    public function newannouncement(Request $request){
        //user ajax.to save the data.
        $announcement = new Announcement;
        $announcement->Topic = $request->topic;
        $announcement->Message = $request->message;
        $announcement->save();
        return redirect()->back();
    }
    //deleteannouncement
    public function deleteannouncement($id){
        DB::delete('DELETE FROM announcements WHERE id = ?', [$id]); 
        return redirect()->back();
    }
    public function newsermonnotes(Request $request){
        $request->validate([
            'notesupload' => 'required|mimes:pdf,docs,ppt|max:2048'
        ]);

        $sermonnotes = new SermonNotes;

        $notesfile = $request->file('notesupload');

        if ($notesfile) {
            $notesfileName = time() . '.' . $notesfile->getClientOriginalExtension();
            $notesfilepath = $notesfile->move('SermonNotes/', $notesfileName);
            $sermonnotes->notesupload = $notesfileName;
            dd($notesfileName);
        } else {
           echo 'no file found'; 
        }

        $sermonnotes->sermondescription = $request->sermondescription;
        $sermonnotes->save();
        return redirect()->back();
    }
    
    public function sermons(){
        return view('admin.pages.sermons');
    }
    public function sermonsnotes(){
        return view('admin.pages.sermons-notes');
    }
    public function events(){
        return view('admin.pages.events');
    }
}
