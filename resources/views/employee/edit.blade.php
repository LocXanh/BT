@extends('employee.add')
@section('subtitle')
Edit
@stop

@section('action')
action = "{{route('employees.save', [$emp->id])}}"
@stop

@section('value')
<input type="hidden" name="_method" value="PATCH">
@stop

@section('value_src')

src = {{url('upload/image/avatar/'.$emp->avatar)}}
@stop

@section('value_name')
value = "{{$emp->name}}"
@stop


@section('value_address')
value = "{{$emp->address}}"
@stop

@section('value_email')
value = "{{$emp->email}}"
@stop

@section('value_phone')
value = "{{$emp->phone}}"
@stop


@section('button_bottom')
<a href="{{route('employees.index')}}" class="btn-style">< Back </a>
<a class="btn-style" href="{{route('employees.delete',[$emp->id])}}"  ><span class="glyphicon glyphicon-trash"></span> Delete</a>
<input type="submit" class="btn-style" value="Update >" >

@stop




