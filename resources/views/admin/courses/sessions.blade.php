@if(Session::get('created_course'))
	
	<div class="alert alert-primary">
		{{ Session::get('created_course') }}
	</div>

@endif

@if(Session::get('updated_course'))
	
	<div class="alert alert-info">
		{{ Session::get('updated_course') }}
	</div>

@endif

@if(Session::get('deleted_course'))
	
	<div class="alert alert-danger">
		{{ Session::get('deleted_course') }}
	</div>

@endif

@if(Session::get('nothing_changed'))
	
	<div class="alert alert-info">
		{{ Session::get('nothing_changed') }}
	</div>

@endif

