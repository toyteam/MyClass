<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
	
	// login
	Route::group(['middleware' => 'isnotlogin'],function(){
		Route::get('/', 'Login@index');
		Route::post('/', 'Login@check');
	});

	// system
	Route::group(['middleware' => 'islogin'],function(){
		// welcome
	    	Route::get('/welcome','Welcome@index');
	    	Route::get('/logout','Welcome@logout');

	    	// life
	    	Route::get('/life/fund', 'Welcome@life_fund');
	    	Route::get('/life/form', 'Welcome@life_form');

	    	// manage
	    	Route::group(['middleware' => 'isadmin'], function(){

	    		Route::get('/manage/notice', 'Welcome@manage_notice');
	    		Route::get('/manage/user', 'Welcome@manage_user');

	    	});
	    	
	});

});
