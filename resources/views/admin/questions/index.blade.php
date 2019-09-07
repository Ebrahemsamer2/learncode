@extends('layouts.admin_layout')

@section('title', 'Questions | Admin Dashboard')

@section('pagename')
	<a href="/admin/questions" class="navbar-brand">Questions</a>
@endsection

@section('content')
@include('admin.questions.sessions')
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">Question</th>
      <th scope="col">Answers</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($questions as $question)
    <tr>
      <th scope="row">{{ $question->id }}</th>
      <td>{{ $question->title }}</td>
      <td>
      	@foreach(explode(' ', $question->answers) as $answer)
      		@if($answer == $question->right_answer)
      		  - <span class="btn-primary">{{ $question->right_answer }}</span>
      		@else
            - <span class="">{{ $answer }}</span>
          @endif
      	@endforeach	
      </td>
      <td>
      	<a class="btn btn-info btn-sm" href="/admin/questions/{{ $question->id }}/edit">Edit</a>

      	{!! Form::open(['method' => 'DELETE', 'action' => ['Admin\QuestionController@destroy', $question->id]]) !!}
      		{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
      	{!! Form::close() !!}
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<a href="/admin/questions/create" class="btn btn-primary">New Question</a>
{{ $questions->links() }}
@endsection