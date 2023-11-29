<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function dashboard(){
        return view('admin.index');
    }
    public function users(){
        return view('admin.pages.users');
    }
    public function announcements(){
        return view('admin.pages.announcements');
    }
    public function newannouncement(){
        //user ajax.to save the data.
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
