@extends('layouts.admin_layout')

@section('title', 'Show Course | Admin Dashboard')

@section('pagename')
	<a href="/admin/courses/{{ $course->id }}" class="navbar-brand">{{ $course->title }} Course</a>
@endsection


@section('content')

	<div class="row">
		@foreach($course->videos as $video)

			<div class="col-sm-12">
				<div class="video-container">
					<p class="lead">{{ $video->title }} </p>
					<div class="video-actions">
						<a data-toggle="modal" data-target="#preview" class="btn btn-primary btn-sm" href=""> Preview Video </a>
						<a class="btn btn-info btn-sm" href="/admin/videos/{{ $video->id }}/edit"> Edit Video </a>
						{!! Form::open(['method' => 'DELETE' , 'action' => ['Admin\VideoController@destroy', $video->id]]) !!}
		      			{!! Form::submit('Delete' , ['class' => 'btn btn-danger btn-sm']) !!}
		      			{!! Form::close() !!}
	      			</div>
				</div>
			</div>
		
			<div id="preview" class="modal fade" tabindex="-1" role="dialog">
			  	<div class="modal-dialog" role="document">
			    	<div class="modal-content">
			      		<div class="modal-header">
			        	<h5 class="modal-title">{{ $video->title }}</h5>
			        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          		<span aria-hidden="true">&times;</span>
			        	</button>
			      	</div>
			      	<div class="modal-body embed-responsive embed-responsive-16by9">
			        	<iframe class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/K7s1IYVfvSA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			     	</div>
			      	<div class="modal-footer">
			        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			      	</div>
			    </div>
			  </div>
			</div>
		@endforeach

	</div>

@endsection