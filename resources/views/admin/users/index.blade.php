@extends('layouts.admin_layout')

@section('title', 'Users | Learn Code')

@section('pagename')
	<a class="navbar-brand" href="/admin/users">Users</a>
@endsection

@section('content')

	<table id="users_table" class="table">
	  <thead>
	    <tr>
	      <th scope="col">#ID</th>
	      <th scope="col">Name</th>
	      <th scope="col">Email</th>
	      <th scope="col">Admin</th>
	      <th scope="col">Verified</th>
	      <th scope="col">Actions</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($users as $user)
	    <tr>
	      <th scope="row">{{ $user->id }}</th>
	      <td>{{ $user->name }}</td>
	      <td>{{ $user->email }}</td>
	      <td>{{ $user->admin ? 'Admin' : 'User'}}</td>
	      <td>{{ $user->verified == 1 ? 'Verified' : 'Unverified'}} </td>
	      <td><a class="btn btn-info btn-sm" href="/admin/users/{{ $user->id }}/edit"><i class="fa fa-edit fa-sm"></i> Edit</a></td>
	      <td>
	      	{!! Form::open(['method'=>'DELETE', 'action' => ['Admin\UserController@destroy', $user->id]]) !!}
	      		{!! Form::submit('Delete',['class' => 'btn btn-danger btn-sm delete', 'id' => $user->id]) !!}
	      	{!! Form::close() !!}
	      </td>
	    </tr>
	    @endforeach
	  </tbody>
	</table>
	{{ $users->links() }}
@endsection


@section('ajaxcalls')

	<script>

		

	</script>

@endsection