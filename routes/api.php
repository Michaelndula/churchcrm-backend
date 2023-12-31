<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MobileApiController;
use App\Http\Controllers\Api\AuthController;
USE App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::group(['middleware' => 'auth:sanctum'], function () {
//     // Your authenticated routes go here
// });



//the auth functions
Route::post('/register', [AuthController::class, 'register_user']);
Route::post('/login', [MobileApiController::class, 'login']);

// fetch of the api data
Route::get('/fetchEvents', [MobileApiController::class, 'fetchEvents']);
Route::get('/fetchAnnouncements', [MobileApiController::class, 'fetchAnnouncements']);
Route::get('/fetchSermonnotes', [MobileApiController::class, 'fetchSermonnotes']);
Route::get('/fetchSermons', [MobileApiController::class, 'fetchSermons']);

// Profile
Route::get('/profile/{userId}', [MobileApiController::class, 'fetchProfile']);


// Notes
Route::post('/newNotes', [MobileApiController::class, 'createNotes']);
Route::get('/showNotes/{userId}', [MobileApiController::class, 'displayNotes']);

// Sermon and sermon notes
Route::get('/fetch/sermonNotes/{sermonId}', [MobileApiController::class, 'sermonAndNote']);