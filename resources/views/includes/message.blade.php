@if($errors->any())
<div class="alert alert-danger">
	@foreach($errors->all() as $error)
		
			<li>
				{{$error}}
			</li>
	@endforeach
		</div>
	
@endif


@if(session('success'))
	<div class="alert alert-success">
		{{session('success')}}
	</div>
@endif


@if(session('error'))
	<div class="alert alert-danger">
		{{session('error')}}
	</div>
@endif


@if(session('warning'))
	<div class="alert alert-warning">
		{{session('warning')}}
	</div>
@endif