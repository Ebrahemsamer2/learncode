@if(Session::get('created_track'))
	
	<div class="alert alert-primary">
		{{ Session::get('created_track') }}
	</div>

@endif

@if(Session::get('updated_track'))
	
	<div class="alert alert-info">
		{{ Session::get('updated_track') }}
	</div>

@endif

@if(Session::get('deleted_track'))
	
	<div class="alert alert-danger">
		{{ Session::get('deleted_track') }}
	</div>

@endif

@if(Session::get('nothing_changed'))
	
	<div class="alert alert-info">
		{{ Session::get('nothing_changed') }}
	</div>

@endif

