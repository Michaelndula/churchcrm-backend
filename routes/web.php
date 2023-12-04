<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});



Route::get('/dashboard-page', function () {
    return view('dashboard-page');
});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
Route::middleware(['auth', 'verified'])->group(
    function () {
        // Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('admin', [AdminController::class, 'admin'])->name('admin');
        Route::get('delete/{id}', [AdminController::class, 'deleteannouncement'])->name('deleteannouncement');
        Route::post('new-sermon-notes', [AdminController::class, 'newsermonnotes'])->name('new-sermon-notes');

    }
);
Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
Route::get('users', [AdminController::class, 'users'])->name('users');
Route::get('announcements', [AdminController::class, 'announcements'])->name('announcements');
Route::post('new-announcement', [AdminController::class, 'newannouncement'])->name('new-announcement');
Route::get('sermons', [AdminController::class, 'sermons'])->name('sermons');
Route::get('notessermons', [AdminController::class, 'sermonsnotes'])->name('sermonsnotes');
Route::get('events', [AdminController::class, 'events'])->name('events');
