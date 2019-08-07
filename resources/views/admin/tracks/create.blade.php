@extends('layouts.admin_layout')

@section('title', 'Tracks | Admin Dashboard')

@section('pagename')
	<a class="navbar-brand" href="/admin/tracks/create">Create Track</a>
@endsection

@section('content')
	
	{!! Form::open(['method' => 'POST', 'action' => 'Admin\TrackController@store', 'files' => true]) !!}

		<div class="form-group">
			{!! Form::label('name', 'Track Name: ') !!}
			{!! Form::text('name', null, ['class'=>'form-control', 'required' => 'required', 'type' => 'text']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('filename', 'Track Image: ') !!}
			{!! Form::file('filename', ['class'=>'form-control', 'required', 'required']) !!}
		</div>

		{!! Form::submit('Create Track', ['class' => 'btn btn-primary']) !!}
	{!! Form::close() !!}
@endsection