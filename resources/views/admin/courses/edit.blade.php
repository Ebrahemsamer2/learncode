@extends('layouts.admin_layout')

@section('title', 'Edit Course | Admin Dashboard')

@section('pagename')
	<a href="/admin/courses/create" class="navbar-brand">Edit Course</a>
@endsection

@section('content')

	{!! Form::model($course, ['method'=>'PATCH','action'=> ['Admin\CourseController@update',$course->id],'files' => true]) !!}
		
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
			{!! Form::select('track_id', \App\Track::pluck('name', 'id'),$course->track->id, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('paid', 'Course Status') !!}
			{!! Form::select('paid', ['1' => 'PAID', '0' => 'FREE'] ,$course->paid, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('photo_id', 'Course Image') !!}
			{!! Form::file('photo_id',null, ['class' => 'form-control']) !!}
		</div>

		{!! Form::submit('Update Course', ['class' => 'btn btn-primary']) !!}

	{!! Form::close() !!}
@endsection