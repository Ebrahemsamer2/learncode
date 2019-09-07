@if(Session::get('created_question'))
	
	<div class="alert alert-primary">
		{{ Session::get('created_question') }}
	</div>

@endif

@if(Session::get('updated_question'))
	
	<div class="alert alert-info">
		{{ Session::get('updated_question') }}
	</div>

@endif

@if(Session::get('deleted_question'))
	
	<div class="alert alert-danger">
		{{ Session::get('deleted_question') }}
	</div>

@endif

@if(Session::get('nothing_changed'))
	
	<div class="alert alert-info">
		{{ Session::get('nothing_changed') }}
	</div>

@endif

