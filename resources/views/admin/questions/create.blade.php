@extends('layouts.admin_layout')

@section('title', 'Create Question | Admin Dashboard')

@section('pagename')
	<a href="/admin/questions/create" class="navbar-brand">New Question</a>
@endsection

@section('content')
	
	{!! Form::open(['method' => 'POST', 'action' => 'Admin\QuestionController@store']) !!}
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
			{!! Form::label('track_id', 'Treack') !!}
			{!! Form::select('track_id', \App\Track::pluck('name', 'id') , null, ['class' => 'form-control']) !!}
		</div>
		{!! Form::submit('Create Question', ['class' => 'btn btn-primary']) !!}
	{!! Form::close() !!}
@endsection