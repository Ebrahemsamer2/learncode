@extends('layouts.admin_layout')

@section('title', 'Edit Question | Admin Dashboard')

@section('pagename')
	<a href="/admin/questions/create" class="navbar-brand">Edit Question</a>
@endsection

@section('content')
	<!-- JS Validation Errors -->
	<div class="alert alert-danger errors"></div>
	<!-- PHP Validation Errors -->
	@if($errors->any())
		@foreach($errors->all() as $error)
			<div class="alert alert-danger">
				{{ $error }}
			</div>
		@endforeach
	@endif

	{!! Form::model($question,['method' => 'PATCH', 'action' => ['Admin\QuestionController@update',$question->id], 'class' => 'question-form']) !!}
		<div class="form-group">
			{!! Form::label('title', 'Question Title') !!}
			{!! Form::text('title', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('answers', 'Question Answers') !!}
			{!! Form::text('answers', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('right_answer', 'Right Answer') !!}
			{!! Form::text('right_answer', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('score', 'Question Score') !!}
			{!! Form::select('score', ['5' => '5', '10' => '10', '15' => '15', '20' => '20'],null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('quiz_id', 'Quiz') !!}
			{!! Form::select('quiz_id', $quizzes, $question->quiz_id, ['class' => 'form-control']) !!}
		</div>
		{!! Form::submit('Update Question', ['class' => 'btn btn-primary']) !!}
	{!! Form::close() !!}
@endsection