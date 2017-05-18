<?php

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

Route::get('/', array('before' => 'guest', function()
{
	return View::make('hello');
}));

Route::get('/profile', array('before' => 'auth', function()
{
	return View::make('profile');
}));

Route::get('user/profile', array('as' => 'profile', 'uses' => 'UserController@showProfile'));


Route::post('/login', array('after' => 'checkAttempts', 'before' => 'checkLockAttempts', 'uses' => 'AuthController@login'));
Route::get('/logout', 'AuthController@logout');
