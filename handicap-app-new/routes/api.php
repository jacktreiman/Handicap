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
//middleware('auth:api')->
Route::get('user', function (Request $request) {
    return $request->user()->id();
});

//list every score

//$url = route('http://127.0.0.1:8001/home');
//Route::redirect('home', '', 301);

Route::get('scores', 'App\http\Controllers\ScoresController@getAllScores');

Route::get('userid', 'App\http\Controllers\ScoresController@getUserId');

Route::get('userScores', 'App\http\Controllers\ScoresController@getUserScores');

Route::get('differentials', 'App\http\Controllers\ScoresController@getAllDifferentials');

//list single score
Route::get('scores/{id}', 'App\http\Controllers\ScoresController@show');

//post score
Route::post('score', 'App\http\Controllers\ScoresController@store');

//edit
Route::put('score', 'App\http\Controllers\ScoresController@store');

//delete
Route::delete('score/{id}', 'App\http\Controllers\ScoresController@destroy');



Route::get('groups', 'App\http\Controllers\GroupsController@index');
Route::delete('group/{groupid}', 'App\http\Controllers\GroupsController@destroy');
Route::post('group', 'App\http\Controllers\GroupsController@store');

Route::get('group_usrs', 'App\http\Controllers\group_usrController@index');
Route::post('group_usr', 'App\http\Controllers\group_usrController@store');