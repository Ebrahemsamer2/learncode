@if(Session::get('updated_user'))
	
	<div class="alert alert-info">
		{{ Session::get('updated_user') }}
	</div>

@endif
@if(Session::get('deleted_user'))
	
	<div class="alert alert-danger">
		{{ Session::get('deleted_user') }}
	</div>

@endif

@if(Session::get('nothing_changed'))
	
	<div class="alert alert-info">
		{{ Session::get('nothing_changed') }}
	</div>

@endif