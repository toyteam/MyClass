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
		Route::get('/', 'LoginController@index');
		Route::post('/', 'LoginController@check');
	});

	// system
	Route::group(['middleware' => 'islogin'],function(){
		// welcome
	    	Route::get('/welcome','WelcomeController@index');
	    	Route::get('/logout','WelcomeController@logout');

	    	// life
	    	Route::get('/life/fund', 'WelcomeController@life_fund');
	    	Route::get('/life/form', 'WelcomeController@life_form');

	    	//file
	    	Route::get('/download/{file_name}', 'FileController@download_file');

	    	// manage
	    	Route::group(['middleware' => 'isadmin'], function(){

	    		Route::get('/manage/notice', 'WelcomeController@manage_notice');
	    		Route::get('/manage/user', 'WelcomeController@manage_user');

	    		// Route::get('/manage/user/import_user', 'UserController@import_user');
	    		Route::get('/manage/user/import_users', 'UserController@import_users');

	    		Route::post('/excel/importUsers', 'ExcelController@importUsers');

	    	});
	    	
	});

});
