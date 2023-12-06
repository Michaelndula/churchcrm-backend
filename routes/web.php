<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MobileApiController;
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
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('admin', [AdminController::class, 'admin'])->name('admin');
    Route::get('users', [AdminController::class, 'users'])->name('users');
    Route::get('announcements', [AdminController::class, 'announcements'])->name('announcements');
    Route::post('new-announcement', [AdminController::class, 'newannouncement'])->name('new-announcement');
    Route::get('sermons', [AdminController::class, 'sermons'])->name('sermons');
    //newsermons
    Route::post('new-sermons', [AdminController::class, 'newsermons'])->name('newsermons');

    Route::get('notessermons', [AdminController::class, 'sermonsnotes'])->name('sermonsnotes');
    Route::get('events', [AdminController::class, 'events'])->name('events');
    Route::delete('delete/{id}/announcement', [AdminController::class, 'deleteannouncement'])->name('deleteannouncement');
    Route::post('new-sermon-notes', [AdminController::class, 'newsermonnotes'])->name('new-sermon-notes');
    Route::delete('delete/{id}/sermonnotes', [AdminController::class, 'deletesermonnotes'])->name('deletesermonnotes');
    // new-event
    Route::post('new-event', [AdminController::class, 'newevent'])->name('new-event');
    //deleteevent
    Route::delete('delete/{id}/event', [AdminController::class, 'deleteevent'])->name('deleteevent');
});
