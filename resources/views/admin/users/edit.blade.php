@extends('layouts.admin_layout')

@section('title', 'Edit User | Admin Dashboard')

@section('pagename')
	<a class="navbar-brand" href="/admin/users/{{ $user->id }}/edit">Edit User</a>
@endsection

@section('content')

	{!! Form::model($user, ['method' => 'PUT' ,'action' => ['Admin\UserController@update', $user->id]] ) !!}

		<div class="form-group">
			{!! Form::label('name', 'Name: ') !!}
			{!! Form::text('name', null, ['class' => 'form-control','type'=>'text','required'=>'required']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('email', 'Email Address: ') !!}
			{!! Form::text('email', null, ['class' => 'form-control', 'required'=>'required','type'=>'email']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('admin', 'Role: ') !!}
			{!! Form::text('admin', 1 ? 'Admin' : 'User', ['class' => 'form-control','readonly'=>'readonly','required'=>'required', 'type'=>'text']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('verified', 'Verified: ') !!}
			{!! Form::text('verified', 1 ? 'Verified' : 'UnVerified', ['class' => 'form-control' ,'readonly'=>'readonly','required'=>'required', 'type'=>'text']) !!}
		</div>
		
		{!! Form::submit('Update', ['class' => 'btn btn-info']) !!}

	{!! Form::close() !!}
@endsection