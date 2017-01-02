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

	    	// info
	    	Route::get('info/check', 'WelcomeController@info_check');
	    	Route::get('info/edit', 'WelcomeController@info_edit');
	    	Route::post('info/edit', 'UserController@editInfo');
	    	Route::get('info/password_edit', 'WelcomeController@info_password_edit');
		Route::post('info/password_edit', 'UserController@editPassword');

	    	// manage
	    	Route::group(['middleware' => 'isadmin'], function(){

	    		Route::get('/manage/notice', 'WelcomeController@manage_notice');
	    		Route::get('/manage/user', 'WelcomeController@manage_user');
	    		Route::any('/manage/form', 'WelcomeController@manage_form');

	    		//form
	    		Route::post('/manage/form/create', 'FormController@create');
				Route::get('/manage/form/getpluginset','FormController@getPluginSet');
				Route::post('/manage/form/getplugin','FormController@getPlugin');
				
	    		// Route::get('/manage/user/import_user', 'UserController@import_user');
	    		Route::get('/manage/user/import_users', 'UserController@importUsers');
	    		Route::any('/manage/user/userinfo', 'UserController@ajax_manage');

	    		Route::post('/excel/importUsers', 'ExcelController@importUsers');


	    	});

	    	// file
	    	Route::get('/download/{file_name}', 'FileController@download_file');

	    	// not finish
	    	Route::group(['middleware' => 'isnotpublic'], function(){
	    		Route::get('/life/fund', 'WelcomeController@life_fund');
	    		Route::get('/life/form', 'WelcomeController@life_form');
	    	});
	    	
	});

});
