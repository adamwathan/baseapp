<?php

require_once __DIR__.'/filters.php';

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('sign-in', 'AuthController@showSignIn');
Route::post('sign-in', 'AuthController@attemptSignIn');
Route::get('sign-up', 'AuthController@showSignUp');
Route::post('sign-up', 'AuthController@attemptSignUp');
Route::any('sign-out', 'AuthController@signOut');
