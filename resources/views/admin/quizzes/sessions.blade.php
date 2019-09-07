@if(Session::get('created_quiz'))
	
	<div class="alert alert-primary">
		{{ Session::get('created_quiz') }}
	</div>

@endif

@if(Session::get('updated_quiz'))
	
	<div class="alert alert-info">
		{{ Session::get('updated_quiz') }}
	</div>

@endif

@if(Session::get('deleted_quiz'))
	
	<div class="alert alert-danger">
		{{ Session::get('deleted_quiz') }}
	</div>

@endif

@if(Session::get('nothing_changed'))
	
	<div class="alert alert-info">
		{{ Session::get('nothing_changed') }}
	</div>

@endif

