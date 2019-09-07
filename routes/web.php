<?php


// Admin Controllers

Route::namespace('Admin')->group(function() {

	Route::resource('admin/users','UserController', ['except' =>['create']]);

	Route::resource('admin/photos','PhotoController');

	Route::get('admin/question/{id}/create', 'QuestionController@addQuestion');
	
	Route::resource('admin/questions','QuestionController', ['except' => ['show']]);

	// Add Video For a Specific Course
	Route::get('admin/videos/{id}/create', 'VideoController@addVideo');

	Route::resource('admin/videos','VideoController', ['except' => 'create']);


	Route::resource('admin/tracks','TrackController');
	

	Route::resource('admin/courses','CourseController');

	// Add Quiz for a specific Course 
	Route::get('admin/quizzes/{id}/create', 'QuizController@addQuiz');

	Route::resource('admin/quizzes','QuizController');

});

// User Controllers

