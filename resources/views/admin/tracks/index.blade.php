@extends('layouts.admin_layout')

@section('title', 'Tracks | Admin Dashboard')

@section('pagename')
	<a class="navbar-brand" href="/admin/tracks">Tracks</a>
@endsection

@section('content')
	@include('admin.tracks.sessions')
	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">#ID</th>
	      <th scope="col">Image</th>
	      <th scope="col">Name</th>
	      <th scope="col">N.O.Courses</th>
	      <th scope="col">Actions</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($tracks as $track)
	    <tr>
	      <th scope="row">{{ $track->id }}</th>
	      <td><img width="150" height="110" src="/images/{{ $track->photo->filename }} "></td>
	      <td>{{ $track->name }}</td>
	      <td>{{ count($track->courses) }}</td>
	      <td><a class="btn btn-info btn-sm" href="/admin/tracks/{{ $track->id }}/edit">Edit</a></td>
	      <td>
	      	{!! Form::open(['method' => 'DELETE' , 'action' => ['Admin\TrackController@destroy', $track]]) !!}
	      		{!! Form::submit('Delete' , ['class' => 'btn btn-danger btn-sm']) !!}
	      	{!! Form::close() !!}
	      </td>
	      <td><a href="/admin/tracks/{{ $track->id }}" class="btn btn-info btn-sm">show</a></td>
	    </tr>
	    @endforeach
	  </tbody>
	</table> 
	{{ $tracks->links() }}
	<a href="/admin/tracks/create" class="btn btn-primary new">New Track</a>
@endsection