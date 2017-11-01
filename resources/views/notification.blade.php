@extends('layouts.layout')

@section('content')

<div class="row confirm">
	@if(Session::has('notification'))
	 <h4> {{Session::get('notification')}} </h4>

	@endif
	<div class="form-group">
		<a class="btn-style" href="{{route('employees.index')}}"> OK </a>
	</div>

</div>

@endsection