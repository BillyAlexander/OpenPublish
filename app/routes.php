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

// Route::get('/', function()
// {
// 	return View::make('hello');
// });

//rutear a index
Route::get('/',array('as' => 'index', 'uses' => 'HomeController@showIndex'));

Route::get('/login',array('as' => 'login', 'uses' => 'HomeController@showLogin'));

Route::post('/login',array('as' => 'makelogin', 'uses' => 'AuthController@makeLogin'));

Route::get('/logout',array('as' => 'makelogout', 'uses' => 'AuthController@makeLogout'));

Route::get('/welcome',array('as' => 'showwelcome', 'uses' => 'AuthController@showWelcome'));