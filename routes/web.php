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
    Route::post('/announcements/{id}', [AdminController::class, 'update_announcement'])->name('announcement.update');

    // Users
    Route::put('/users/{id}', [AdminController::class, 'update_user'])->name('users.update');
    Route::get('users', [AdminController::class, 'users'])->name('users');
    Route::put('/update-profile/{id}', [AdminController::class, 'update_admin_profile'])->name('update.admin.profile');

    // Profile
    Route::get('profile', [AdminController::class, 'profile'])->name('profile');
//update profile details
Route::post('profile-information-update', [AdminController::class, 'updateProfileInformation'])->name('profile-information-update');
    //Sermons
    Route::post('new-sermons', [AdminController::class, 'newsermons'])->name('new-sermons');
    Route::get('sermons', [AdminController::class, 'sermons'])->name('sermons');

    // Sermon notes
    Route::get('notessermons', [AdminController::class, 'sermonsnotes'])->name('sermonsnotes');  
    Route::post('new-sermon-notes', [AdminController::class, 'newsermonnotes'])->name('new-sermon-notes');
    Route::delete('delete/{id}/sermonnotes', [AdminController::class, 'deletesermonnotes'])->name('deletesermonnotes');
    Route::put('/sermonnotes/{id}', [AdminController::class, 'update_sermon_notes'])->name('sermonnotes.update');
    // Download sermon notes
    Route::get('/download-notes/{id}', [AdminController::class, 'download_sermon_notes'])->name('download_sermon_notes'); 

    // Events
    Route::post('new-event', [AdminController::class, 'newevent'])->name('new-event');
    Route::get('events', [AdminController::class, 'events'])->name('events');
    Route::post('updateevent', [AdminController::class, 'updateevent'])->name('update-event');
    Route::delete('delete/{id}/event', [AdminController::class, 'deleteevent'])->name('deleteevent');
    Route::get('settings', [AdminController::class, 'settings'])->name('settings');

});
