@extends('layouts.admin_layout')

@section('title', 'Create Course | Admin Dashboard')

@section('pagename')
	
	<a href="/admin/courses/create" class="navbar-brand">New Course</a>

@endsection

@section('content')

	{!! Form::open(['method' => 'POST', 'action' => 'Admin\CourseController@store', 'files' => true]) !!}
		
		<div class="form-group">
			{!! Form::label('title', 'Course Title') !!}
			{!! Form::text('title',null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('description', 'Course Description') !!}
			{!! Form::textarea('description', null,['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('track_id', 'Track Name') !!}
			{!! Form::select('track_id', \App\Track::pluck('name', 'id'), null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('paid', 'Course Status') !!}
			{!! Form::select('paid', ["1" => "PAID","0" => "FREE"], null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('photo_id', 'Course Image') !!}
			{!! Form::file('photo_id',null, ['class' => 'form-control']) !!}
		</div>

		{!! Form::submit('Create Course', ['class' => 'btn btn-primary']) !!}

	{!! Form::close() !!}
@endsection