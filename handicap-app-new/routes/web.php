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
    Route::get('/home', [App\Http\Controllers\userScoreController::class, 'index'])->name('home');

