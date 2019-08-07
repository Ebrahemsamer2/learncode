@extends('layouts.admin_layout')

@section('title', 'Edit Track | Admin Dashboard')

@section('pagename')
	<a class="navbar-brand" href="/admin/tracks/$track->id/edit">Edit Track</a>
@endsection

@section('content')
	
	{!! Form::model($track, ['method' => 'PATCH', 'action' => ['Admin\TrackController@update', $track->id], 'files' => true]) !!}

		<div class="form-group">
			{!! Form::label('name', 'Track Name: ') !!}
			{!! Form::text('name', null, ['class'=>'form-control','type' => 'text']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('filename', 'Track Image: ') !!}
			{!! Form::file('filename', ['class'=>'form-control']) !!}
		</div>
		{!! Form::submit('Update Track', ['class' => 'btn btn-info']) !!}

		<img style="float: right;" width="400" height="200" src="/images/{{ $track->photo->filename }}">

	{!! Form::close() !!}

@endsection