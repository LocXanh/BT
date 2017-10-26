@extends('employee.add')

@section('title')
Update Employee Information
@stop

@section('action')
action = "{{route('employees.update', [$emp->id])}}"
@stop

@section('value')
<input type="hidden" name="_method" value="PATCH">
@stop

@section('value_src')
<?php if ($emp->avatar==null)$image = 'user.png'; 
else $image = $emp->avatar; ?>
src = {{asset('upload/image/avatar/'.$image)}}
@stop

@section('value_avatar')
<?php if ($emp->avatar !=null) $image = $emp->avatar;
else $image = 'user.png'; ?>
value = "{{$image}}"
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
<a href="" class="btn-style">< Back </a>
<button type="button" class="btn-style" data-toggle="modal" data-target="#confirmDelete"  ><span class="glyphicon glyphicon-trash"></span> Delete</button>
<input type="submit" class="btn-style" value="Update >" >

<div id="confirmDelete" class="modal fade" rol="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Confirm Delete</h4>
	      </div>
	      <div class="modal-body">
	        <p> Do you want to delete information from database ?</p>
	      </div>
	      <div class="modal-footer">
	            <a href="{{route('employees.delete',$emp->id)}}" class="btn-style"> Yes</a>
		        <button type="button" class="btn-style" data-dismiss="modal">No</button>
	      </div>
	    </div>
	</div>
</div>
@stop




