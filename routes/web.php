<?php


// Admin Controllers

Route::namespace('Admin')->group(function() {

	Route::resource('admin/users','UserController', ['except' =>['create']]);

	Route::resource('admin/photos','PhotoController');

	Route::resource('admin/questions','QuestionController', ['except' => ['show']]);

	Route::resource('admin/videos','VideoController', ['except' => 'create']);

	Route::get('admin/videos/{id}/create', 'VideoController@addVideo');


	Route::resource('admin/tracks','TrackController');

	Route::resource('admin/courses','CourseController');

	Route::resource('admin/quizzes','QuizController');

});

// User Controllers

