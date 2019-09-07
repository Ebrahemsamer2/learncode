@extends('layouts.admin_layout')

@section('title', 'Edit Quiz | Admin Dashboard')

@section('pagename')
	<a class="navbar-brand" href="/admin/quizzes/{{ $quiz->id }}/edit">Edit Quiz</a>
@endsection

@section('content')
		
	
	{!! Form::model($quiz, ['method' => 'PATCH', 'action' => ['Admin\QuizController@update',$quiz] ]) !!}

		<div class="form-group">
			
			{!! Form::label('course_id', 'Course Title') !!}
			{!! Form::select('course_id', $courses,$quiz->course_id, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			
			{!! Form::label('title', 'Quiz Title') !!}
			{!! Form::text('title', null , ['class' => 'form-control']) !!}

		</div>

		{!! Form::submit('Update Quiz', ['class' => 'btn btn-info']) !!}

	{!! Form::close() !!}

@endsection