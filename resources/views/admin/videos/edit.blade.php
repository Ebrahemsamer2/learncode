@extends('layouts.admin_layout')

@section('title', 'Edit Video | Admin Dashboard')

@section('pagename')
	<a href="/admin/videos/{{$video->id}}/edit" class="navbar-brand">Edit Video </a>
@endsection

@section('content')
	
	@include('admin.videos.sessions')

	{!! Form::model($video, ['method' => 'PATCH', 'action' => ['Admin\VideoController@update', $video->id],'files' => true]) !!}

		<div class="form-group">
				
			{!! Form::label('course_title','Course Title') !!}
			{!! Form::text('course_title', $video->course->title,['class' => 'form-control', 'disabled' => 'disabled']) !!}
			{!! Form::hidden('course_id', $video->course->id) !!}

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
		<br>
		<div class="row">
			<div class="col-sm-6">
				
				{!! Form::submit('Update Video', ['class' => 'btn btn-primary']) !!}

			</div>

			<div class="col-sm">
				<h4>Video Image</h4>
				<img width="300" height="150" src="/images/{{ $video->photo->filename }}">
			</div>
		</div>
		

	{!! Form::close() !!}
	
@endsection