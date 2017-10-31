@extends('layouts.layout')

@section('content')

@if(Session::has('flash_message'))
        <div class="fade in alert alert-{!! Session::get('flash_level') !!} ">
            {!!  Session::get('flash_message')!!}
        </div>
@endif

<div class="row">
	<div class="row">
		<div class="title_panel col-xs-12">
		<h3> Employee <small> List </small></h3>
	</div>
	</div>
	
	<div class="row"><hr></div>
</div>

<div class="row">
	<div class="head-table">
		<div class="col-md-4 col-lg-4 col-xs-12 col-sm-10 left">
			<div class="form-group">
				<a class="btn-style" href="{!! url('/employees/create') !!}"> Add</a>
			</div>	
		</div>
		<div class="col-md-8 col-lg8 col-xs-12 col-sm-12 right">
			<div class="search">
				<form method="get">
					<div class="col-xs-10">
						<input class="form-control" type="search" name="search">
					</div>
					<div class="col-xs-2">
						<button class="btn-style" type="submit" > Search</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="table-responsive">          
	<table class="table table-bordered">
		<thead>
		  <tr>
		    <th>#</th>
		    <th>Name</th>
		    <th>Address</th>
		    <th>Avatar</th>
		    <th>Email</th>
		    <th>Phone</th>
		    <th>Action</th>
		  </tr>
		</thead>
		<tbody>

	    @if(count($emps) == 0)
	      <tr>
	        <td colspan="7" style="text-align: center;"> No employee</td>
	      </tr>
	    @else
			 @foreach ($emps as $item_employee)
			 <?php
			   // if($item_employee["avatar"]==null) $image = "user.png" ;
	     //            else 
	                	$image = $item_employee['avatar'] ;?>

	         <?php if($item_employee['is_delete'] == '1') continue; ?>
		        <tr>
		          <td>{{$item_employee['id']}}</td>
		          <td>{{$item_employee['name']}}</td>
		          <td>{{$item_employee['address']}}</td>
		          <td>
		          	<img src="{{url('upload/image/avatar/'.$image)}}" class="avatar">
		          </td>
		          <td>{{$item_employee['email']}}</td>
		          <td>{{$item_employee['phone']}}</td>
		          <td class="center"> <a  class="btn btn-warning btn-xs" href="{!!  URL::route('employees.edit', $item_employee['id'])  !!}"> <span class="glyphicon glyphicon-pencil"></span></span> Edit</a></td>
		        </tr>
		      @endforeach
		  
		 @endif
		</tbody>
	</table>
</div>

<div class="tablenav">
   {!! $employees->render() !!}
</div>


@endsection