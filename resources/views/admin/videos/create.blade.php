@extends('layouts.admin_layout')

@section('title', 'Courses | Admin Dashboard')

@section('pagename')
	<a href="/admin/videos/create" class="navbar-brand">New Video</a>
@endsection

@section('content')

	{!! Form::open(['method' => 'POST', 'action' => 'Admin\VideoController@store','files' => true]) !!}

		<div class="form-group">
				
			{!! Form::label('course_title','Course Title') !!}
			{!! Form::text('course_title', $course->title,['class' => 'form-control', 'disabled' => 'disabled']) !!}
			{!! Form::hidden('course_id', $course->id) !!}

		</div>

		<div class="form-group">
				
			{!! Form::label('title','Video Title') !!}
			{!! Form::text('title', null,['class' => 'form-control']) !!}

		</div>


		<div class="form-group">
			
			{!! Form::label('link', 'Video Link') !!}
			{!! Form::text('link', null , ['class' => 'form-control']) !!}

		</div>


		<div class="form-group">
			
			{!! Form::label('photo_id', 'Video Image') !!}
			{!! Form::file('photo_id', null , ['class' => 'form-control']) !!}

		</div>

		{!! Form::submit('Create Video', ['class' => 'btn btn-primary']) !!}

	{!! Form::close() !!}
	
@endsection