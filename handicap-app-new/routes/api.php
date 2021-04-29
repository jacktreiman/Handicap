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
Route::get('scores', 'App\http\Controllers\ScoresController@getAllScores');

//list single score
Route::get('scores/{id}', 'ScoresController@show');

//post score
//Route::post('scores', 'ScoresController@store');

//edit
//Route::put('scores', 'ScoresController@store');

//delete
//Route::delete('scores', 'ScoresController@destroy');