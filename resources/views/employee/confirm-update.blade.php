@extends('employee.confirm-register')

@section('action')
action = "{{ route('employees.update',[$id])}}";
@stop
@section('value')
<input type="hidden" name="_method" value="PATCH">
@stop

