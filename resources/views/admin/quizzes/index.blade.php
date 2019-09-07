@extends('layouts.admin_layout')

@section('title', 'Quiz | Admin Dashboard')

@section('pagename')
	<a class="navbar-brand" href="/admin/quizzes">Quizzes</a>
@endsection

@section('content')
		
	@foreach($courses as $course)

		<div class="card">
			<div class="row">
				
				<div class="col-sm-5">
					<img class="card-img-top" src="/images/{{ $course->photo->filename }}" alt="Card image cap">
			  		<div class="card-body">
			    		<p class="card-text">{{ $course->title }}</p>
			    		<a href="/admin/courses/{{ $course->id }}" class="btn btn-primary">Show</a>
			  		</div>
				</div>

				<div class="col-sm">
					<h4>Related Quizzes</h4>
					@foreach($course->quizzes as $quiz)
						<p><a href="/admin/quizzes/{{ $quiz->id }}" class="">- {{ $quiz->title }}</a>
							<a href="/admin/quizzes/{{ $quiz->id }}/edit" class="btn btn-info btn-sm">Edit</a>
							{!! Form::open(['method' => 'DELETE', 'action' => ['Admin\QuizController@destroy', $quiz] ]) !!}
								{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
							{!! Form::close() !!}
							<a href="/admin/quizzes/{{ $quiz->id }}" class="btn btn-default btn-sm">show</a>

						</p>
						
					@endforeach
					<a href="/admin/quizzes/{{ $course->id }}/create" class="btn btn-primary btn-sm">New Quiz</a>
				</div>
			</div>
	  		
		</div>

	@endforeach
	{{ $courses->links() }}

@endsection