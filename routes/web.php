<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Admin Controllers

Route::namespace('Admin')->group(function() {

	Route::resource('admin/users','UserController');

	Route::resource('admin/photos','PhotoController');

	Route::resource('admin/questions','QuestionController', ['except' => ['show']]);

	Route::resource('admin/videos','VideoController');

	Route::resource('admin/tracks','TrackController');

	Route::resource('admin/courses','CourseController');

});

// User Controllers