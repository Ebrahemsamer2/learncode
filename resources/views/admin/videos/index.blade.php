@extends('layouts.admin_layout')

@section('title', 'Videos | Admin Dashboard')

@section('pagename')
	<a href="/admin/videos" class="navbar-brand">Videos</a>
@endsection

@section('content')
	
	@include('admin.videos.sessions')
	
	@foreach($courses as $course)

		<div class="alert alert-primary">
			<div class="course-title">
				
				{{ $course->title . " ( " . count($course->videos) ." Videos )"}}

			</div>
		</div>
		<div class="course-videos">
			<div class="row">
				@foreach($course->videos as $video)
						
					<div class="col-sm-3">
						<div class="video">

							<div class="card" style="width: 18rem;">
								
								<img class="card-img-top" src="{{ asset('/images/' . $video->photo->filename ) }}">

								<div class="card-body">
								    <h5 class="card-title">{{ Str::limit($video->title, 50) }}</h5>
								    <a href="#" class="btn btn-primary btn-sm">Review</a>
								    <a href="/admin/videos/{{ $video->id }}/edit" class="btn btn-info btn-sm">Edit</a>
								    <a href="#" class="btn btn-danger btn-sm">DELETE</a>
								    <a href="/admin/videos/{{ $video->id }}" class="btn btn-success btn-sm">show</a>
								</div>
							
							</div>
						</div>
					</div>
				@endforeach
				<div>
					<a class="btn btn-primary" href="/admin/videos/{{ $course->id }}/create">New Video</a>
				</div>
			</div>
		</div>

	@endforeach
	{{ $courses->links() }}

@endsection