@extends('layouts.layout')

@section('content')

@if(Session::has('flash_message'))
        <div class="fade in alert alert-{!! Session::get('flash_level') !!} ">
            {!!  Session::get('flash_message')!!}
        </div>
@endif
@include('blocks.errors')
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
		<div class="col-md-4 left">
			<div class="form-group">
				<a href="{!! url('/export') !!}" class="btn-style"> Export File</a>
			</div>
		</div>
		<div class="col-md-8 right">
		</div>
		<div class="row">
			<div class="col-md-6">
				
				<form class="form-horizontal" method="post" action="{{ route('import')}}" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="col-md-6">
						<input type="file" name="file" />
					</div>
					<div class="col-md-4">
				        <input type="submit" class="btn-style" name="" value="Import">
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
		    <th>View</th>
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
	         <?php 
	               $view = \Redis::get('employee'.$item_employee->id.'view');
	         ?>
		        <tr>
		          <td>{{$item_employee['id']}}</td>
		          <td>{{$item_employee['name']}}</td>
		          <td>{{$item_employee['address']}}</td>
		          <td>
		          	<img src="{{url('upload/image/avatar/'.$image)}}" class="avatar">
		          </td>
		          <td>{{$item_employee['email']}}</td>
		          <td>{{$item_employee['phone']}}</td>
		          <td class="center">
		           <a  class="btn btn-warning btn-xs" href="{!!  URL::route('employees.edit', $item_employee['id'])  !!}"> <span class="glyphicon glyphicon-pencil"></span></span> Edit</a>
		           <a  class="btn btn-primary btn-xs" href="{!!  URL::route('employees.show', $item_employee['id'])  !!}"> <span class="glyphicon glyphicon-eye-open"></span></span> Views</a>
				   </td>
				   <td>
				   	@if($view)
				   {{$view}}
				   @else {{0}}
				   @endif
					</td>
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