<?php

use Illuminate\Http\Request;

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

Route::post('colleague/create', 'ColleagueController@store');
Route::put('colleague/update/{id}', 'ColleagueController@addProject');
Route::get('colleague', 'ColleagueController@index');
Route::get('colleague/{id}', 'ColleagueController@show');
Route::get('projects', 'ProjectController@index');
Route::get('search', 'ProjectController@search');
Route::get('avg', 'ProjectController@avg');
