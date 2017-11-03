@extends('layouts.layout')

@section('content')

<div class="row">
	<div class="title_panel col-xs-12">
	<h3> Employee <small> @section('subtitle') Show @show </small></h3>
</div>
</div>

<div class="row">
	<div class="col-xs-12"><hr></div>
</div>
<div class="row">
	<div class="col-md-10 col-md-offset-1 col-xs-12">
		<div class="row">
		
			<div class="col-xs-12 col-md-4 ">
                <div class="fileUpload">
                    <img id="avatar-img"  src = "{{url('upload/image/avatar/'.$emp->avatar)}}" alt="Avatar" class="insert-avatar" />
                </div>
			</div>

			<div class=" col-xs-12 col-md-8 ">
			    <div  class="form-group">
			        <label class="row">Full name : {{$emp->name}}</label>
			    </div>
			    <div  class="form-group">
			        <label class="row">Email : {{$emp->email}}</label>
			    </div>
			    <div  class="form-group">
			        <label class="row">Address : {{$emp->address }}</label>
			    </div>
			    <div  class="form-group">
			        <label class="row"> Phone  : {{$emp->phone}}</label>
			    </div>
			</div>
		</div>

		<div class="row">
			<div class="form-group" style="text-align: center">
				<a class="btn-style" href="{{route('employees.index')}}"> OK</a>
			</div>
		</div>

		
	</div>
</div>

@endsection