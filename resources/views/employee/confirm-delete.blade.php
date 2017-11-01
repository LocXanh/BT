@extends('layouts.layout')

@section('content')

<div class="col confirm">
	<h3> Xác nhận thông tin </h3>
	<p> Ấn nút OK để xóa thông tin từ DB </p>
	
	<form action="{{ route('employees.destroy', [$id]) }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="DELETE">
        <div class="form-group">
	        <input type="submit" class="btn-style" value="OK">
	        <a class="btn-style" href="{{route('employees.edit',[$id])}}"> Back </a>
	    </div>
    </form>
</div>

@endsection