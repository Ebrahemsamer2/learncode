@extends('layouts.admin_layout')

@section('title', 'Create Quiz | Admin Dashboard')

@section('pagename')
	<a class="navbar-brand" href="/admin/quizzes/{{ $course->id }}/create">Create Quiz</a>
@endsection

@section('content')
		
	
	{!! Form::open(['method' => 'POST', 'action' => 'Admin\QuizController@store']) !!}

		<div class="form-group">
			
			{!! Form::label('course_title', 'Course Title') !!}
			{!! Form::text('course_title', $course->title, ['class' => 'form-control', 'disabled'=>'disabled']) !!}
			{!! Form::hidden('course_id', $course->id) !!}
		</div>

		<div class="form-group">
			
			{!! Form::label('title', 'Quiz Title') !!}
			{!! Form::text('title', null , ['class' => 'form-control']) !!}

		</div>

		{!! Form::submit('Create Quiz', ['class' => 'btn btn-primary']) !!}

	{!! Form::close() !!}

@endsection