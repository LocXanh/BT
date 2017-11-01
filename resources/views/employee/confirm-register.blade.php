@extends('layouts.layout')



@section('content')

@include('blocks.errors')

<div class="confirm">
	<h3> Xác nhận thông tin nhân viên </h3>
	<p> Ấn nút OK để lưu thông tin vào DB </p>

	<form class="form-horizontal" method="POST" @section('action') action="{{route('employees.store')}}" @show enctype="multipart/form-data">
		{!! csrf_field() !!}
		@section('value') @show
		<input type="hidden" name="avatar" @if(Session::has('avatar')) value="{!!  Session::get('avatar')!!}" @endif>
		<input type="hidden" name="name" @if(Session::has('name')) value="{!!  Session::get('name')!!}" @endif>
		<input type="hidden" name="email" @if(Session::has('email')) value="{!!  Session::get('email')!!}" @endif>
		<input type="hidden" name="address" @if(Session::has('address')) value="{!!  Session::get('address')!!}" @endif>
		<input type="hidden" name="phone" @if(Session::has('phone')) value="{!!  Session::get('phone')!!}" @endif>
		<div class="form-group">
			<a class="btn-style" href="{{route('employees.create')}}"> Back </a>
			<input type="submit" class="btn-style" value="OK" name="">
		</div>

	</form>
</div>
@endsection