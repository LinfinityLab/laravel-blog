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

Route::group(array('before'=>'auth'), function(){

    Route::get('/', array('as'=>'home','uses'=>'UserController@home'));
});

Route::get('/login', array('as'=>'login', 'uses'=>'UserController@getLogin'));

Route::post('/login', array('as'=>'login-post', 'uses'=>'UserController@postLogin'));

Route::get('/register', array('as'=>'register', 'uses'=>'UserController@getRegister'));

Route::post('/register', array('as'=>'register-post', 'uses'=>'UserController@postRegister'));

Route::get('/logout', array('as'=>'logout','uses'=>'UserController@logout'));

Route::get('/post', array('as'=>'post-detail','uses'=>'UserController@postDetail'));

Route::get('/editpost', array('as'=>'editPost','uses'=>'UserController@editPost'));

Route::post('/updatepost', array('as'=>'update-post','uses'=>'UserController@updatePost'));

Route::get('/newpost', array('as'=>'newPost','uses'=>'UserController@getNewPost'));

Route::post('/newpost', array('as'=>'newPost-post','uses'=>'UserController@postNewPost'));