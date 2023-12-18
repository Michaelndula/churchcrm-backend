<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MobileApiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard-page', function () {
    return view('dashboard-page');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('logout', [AdminController::class, 'logout'])->name('logout');
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('admin', [AdminController::class, 'admin'])->name('admin');

    // Announcements
    Route::get('announcements', [AdminController::class, 'announcements'])->name('announcements');
    Route::post('new-announcement', [AdminController::class, 'newannouncement'])->name('new-announcement');
    Route::delete('delete/{id}/announcement', [AdminController::class, 'deleteannouncement'])->name('deleteannouncement');
    Route::put('/announcements/{id}', [AdminController::class, 'update_announcement'])->name('announcement.update');

    // Users
    Route::put('/users/{id}', [AdminController::class, 'update_user'])->name('users.update');
    Route::get('users', [AdminController::class, 'users'])->name('users');

    //Sermons
    Route::post('new-sermons', [AdminController::class, 'newsermons'])->name('new-sermons');
    Route::get('sermons', [AdminController::class, 'sermons'])->name('sermons');

    // Sermon notes
    Route::get('notessermons', [AdminController::class, 'sermonsnotes'])->name('sermonsnotes');  
    Route::post('new-sermon-notes', [AdminController::class, 'newsermonnotes'])->name('new-sermon-notes');
    Route::delete('delete/{id}/sermonnotes', [AdminController::class, 'deletesermonnotes'])->name('deletesermonnotes');


    // Events
    Route::post('new-event', [AdminController::class, 'newevent'])->name('new-event');
    Route::get('events', [AdminController::class, 'events'])->name('events');
    Route::post('updateevent', [AdminController::class, 'updateevent'])->name('update-event');
    Route::delete('delete/{id}/event', [AdminController::class, 'deleteevent'])->name('deleteevent');

});

Route::put('/sermonnotes/{notesId}', [AdminController::class, 'update_sermon_notes']);