@extends('layouts.admin_layout')

@section('title', 'Edit User | Admin Dashboard')

@section('pagename')
	<a class="navbar-brand" href="/admin/users/{{ $user->id }}/edit"><strong>{{ $user->name }}</strong></a>
@endsection


@section('content')
	
	<div class="user-courses">
		
		<h3><strong>{{ $user->name }}</strong> enrolled in</h3>
		<div class="courses">
			
			<div class="row">
				@foreach($user->courses as $course)

					<div class="col-sm-4">
						
						<div class="card" style="width: 18rem;">
							<div class="admin-action">
								<a class="btn btn-info btn-sm" href="/admin/courses/{{ $course->id }}/edit">Edit</a>
								{!! Form::open(['method' => 'DELETE' , 'action' => ['Admin\CourseController@destroy', $course->id]]) !!}
			      				{!! Form::submit('Delete' , ['class' => 'btn btn-danger btn-sm']) !!}
			      				{!! Form::close() !!}
			      				<a class="btn btn-success btn-sm" href="/admin/courses/{{ $course->id }}">Show</a>
							</div>
						  	<img class="img-fluid course-image" src="/images/{{ $course->photo->filename }}" class="card-img-top" alt="...">
						  	<div class="card-body">
						    <p class="card-text">{{ $course->title }}</p>
						    <div class="row">
						    	<div class="col-sm-9">
						    		<p class="badge badge-primary"><a class="course-track-name" href="/admin/tracks/{{ $course->track->id }}">{{ $course->track->name }}</a></p>
						    	</div>
						    	<div class="col-sm-3">
						    		<p class="badge badge-{{ $course->paid?'danger':'success'}}">{{ $course->paid?'PAID':'FREE' }}</p>
						    	</div>
						    </div>
						    
						  </div>
						</div>

					</div>

				@endforeach
			</div>

		</div>
	</div>

@endsection