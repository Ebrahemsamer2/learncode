@extends('layouts.admin_layout')

@section('title', 'Courses | Admin Dashboard')

@section('pagename')
	<a href="/admin/courses" class="navbar-brand">Courses</a>
@endsection

@section('content')

	<div class="row">
		
		@foreach($courses as $course)

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
	{{ $courses->links() }}
	<a href="/admin/courses/create" class="btn btn-primary">New Course</a>
	<div class="clear"></div>
@endsection