@extends('layouts.admin_layout')

@section('title', 'Track | Dashboard')

@section('pagename')
	<a href="/admin/tracks/{{ $track->id }}" class="navbar-brand" >{{ $track->name }} Track</a>
@endsection



@section('content')
	
	<div class="track-container">
		<div class="track-image">
			<img height="300" src="/images/{{ $track->photo->filename }}" class="track-image">
		</div>

		<div class="track-courses">
			<h3>{{ $track->name }}'s Track has {{ count($track->courses) }} courses</h3>
			<div class="courses">
				<div class="row">
				@foreach($track->courses as $course)

					<div class="col-sm-4">
						
						<div class="card" style="width: 18rem;">
							<div class="admin-action">
								<a class="btn btn-info btn-sm" href="/admin/courses/{{ $course->id }}/edit">Edit</a>
								{!! Form::open(['method' => 'DELETE' , 'action' => ['Admin\CourseController@destroy', $course->id]]) !!}
			      				{!! Form::submit('Delete' , ['class' => 'btn btn-danger btn-sm']) !!}
			      				{!! Form::close() !!}
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

	</div>

@endsection
