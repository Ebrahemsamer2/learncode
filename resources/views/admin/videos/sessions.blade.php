@if(Session::get('created_video'))
	
	<div class="alert alert-primary">
		{{ Session::get('created_video') }}
	</div>

@endif

@if(Session::get('updated_video'))
	
	<div class="alert alert-info">
		{{ Session::get('updated_video') }}
	</div>

@endif

@if(Session::get('deleted_video'))
	
	<div class="alert alert-danger">
		{{ Session::get('deleted_video') }}
	</div>

@endif

@if(Session::get('nothing_changed'))
	
	<div class="alert alert-info">
		{{ Session::get('nothing_changed') }}
	</div>

@endif

