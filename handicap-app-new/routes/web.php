<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/picture', function () {
    return view('image-upload');
});

Auth::routes();

// Route::get('/home/stats', function () {
//     return view('layouts.vue');
// });

// Route::get('/home/post-score', function () {
//     return view('layouts.vue');
// });

Route::get('/home/{any}', function () {
    return view('layouts.vue');
})->where('any', '.*');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    //added
    Auth::routes();
    //added
    Route::get('/api/userScores', [App\Http\Controllers\userScoreController::class, 'index'])->name('home');
    //Auth::routes();
    Route::get('/api/userDifferentials', [App\Http\Controllers\userScoreController::class, 'index'])->name('home');
    Route::get('/api/group_usrs', [App\Http\Controllers\group_usrController::class, 'index'])->name('home');


    Route::get('image', [App\Http\Controllers\ImageUploadController::class, 'index']);
    Route::post('upload', [App\Http\Controllers\ImageUploadController::class, 'upload']);