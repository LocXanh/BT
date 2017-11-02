@extends('layouts.layout')

@section('content')

@include('blocks.errors')

<div class="row">
	<div class="row">
		<div class="title_panel col-xs-12">
		<h3> Employee <small> @section('subtitle') Add @show </small></h3>
	</div>
	</div>
	
	<div class="row">
		<div class="col-xs-12"><hr></div>
	</div>
</div>
<div class="row">

	<div class="col-md-10 col-md-offset-1 col-xs-12">

		<form class="form-horizontal" @section('action') action="{{ route('employees.register') }}" @show method="POST"  enctype="multipart/form-data">
			{!! csrf_field() !!}

			@section('value') @show

			<div class="row">
			
				<div class="col-xs-12 col-md-4 ">
					<div class="choose-avatar">
						<div class="form-avatar">
			                <div class="fileUpload">
			                    <img id="avatar-img"  @section('value_src') src="{{url('upload/image/avatar/user.png')}}" @show  alt="Avatar" class="insert-avatar" />
			                </div> 
			            </div>
			            <button type="button" class="btn-style btn-file" onclick="document.getElementById('input-img').click();">Choose Image </button>
			            <input id="input-img" type="file" name="avatar" style="text-align: center;display: none;" onchange="changeImage(this)">
			        </div>
				</div>

				<div class=" col-xs-12 col-md-8 ">
				    <div  class="form-group">
				        <label class="col-xs-4 col-md-3">Full name :</label>
				        <input class="col-xs-8 col-md-9 form-control" id="name" type="text" placeholder="e.g. john" name="name" @section('value_name') value="{{ old('name') }}" @show required="required">
				    </div>
				    <div  class="form-group">
				        <label class="col-xs-4 col-md-3">Email :</label>
				        <input class="col-xs-8 col-md-9 form-control" type="text"  id="email" @section('value_email') value="{{ old('email') }}"  @show  placeholder="example@gmail.com"  name="email"  required="required">
				    </div>
				    <div  class="form-group">
				        <label class="col-xs-4 col-md-3">Address :</label>
				        <input class="col-xs-8 col-md-9 form-control" id="address" placeholder="e.g. Paris" type="text" name="address" @section('value_address') value="{{ old('address') }}"  @show required="required">
				    </div>
				    <div  class="form-group">
				        <label class="col-xs-4 col-md-3"> Phone  :</label>
				        <input class="col-xs-8 col-md-9 form-control" id="phone" placeholder="XXXX-XXXX-XXXX" type="text" name="phone" @section('value_phone') value="{{ old('phone') }}"  @show required="required">
				    </div>
				</div>
			</div>

			<div class="row">
				<div class="form-group" style="text-align: center">
					@section('button_bottom')
					<a class="btn-style" href="{{route('employees.index')}}"> <  Back</a>
					<input type="submit"  class="btn-style" value="Register >"> 
					@show
				</div>
			</div>

		</form>
	</div>
</div>
<script type="text/javascript">
    function changeImage(f) {
        var reader = new FileReader();
        reader.onload = function (e) {
            var img = document.getElementById("avatar-img");
            img.src = e.target.result;
            img.style.display = "inline";
        };
        reader.readAsDataURL(f.files[0]);
    }

 
</script>
@endsection