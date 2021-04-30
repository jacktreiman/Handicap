<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//list every score

//$url = route('http://127.0.0.1:8001/home');
Route::redirect('home', '', 301);

Route::get('scores', 'App\http\Controllers\ScoresController@getAllScores');

Route::get('differentials', 'App\http\Controllers\ScoresController@getAllDifferentials');

//list single score
Route::get('scores/{id}', 'App\http\Controllers\ScoresController@show');

//post score
Route::post('score', 'App\http\Controllers\ScoresController@store');

//edit
Route::put('score', 'App\http\Controllers\ScoresController@store');

//delete
Route::delete('score/{id}', 'App\http\Controllers\ScoresController@destroy');