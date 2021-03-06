<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => 'auth'], function()
{
    Route::resource('winners', 'WinnerController');
    Route::resource('contests', 'ContestController');
    Route::resource('gratifications', 'GratificationController');
    Route::resource('shows', 'ShowController');
    Route::controller('shows', 'ShowController');
    Route::get('/', 'GratificationController@welcome');
    Route::get('report/shows/{id}', 'ShowController@exportPDF');
    Route::get('report/contests/{id}', 'ContestController@exportPDF');

});



Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::resource('auth', 'Auth\AuthController');



