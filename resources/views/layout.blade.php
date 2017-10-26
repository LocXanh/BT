<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.theme.min.css')}}">
</head>
<body>
	<header>
		<nav class="navbar navbar-default navbar-fixed-top">
		  <div class="container-fluid">
		    <!-- <div class="navbar-header">
		      <a class="navbar-brand" href="#">Quản Lý Nhân Sự</a>
		    </div> -->
		 <!-- 
		    @if(Auth::check())
		    <ul class="nav navbar-nav navbar-right" style="margin-right: -5px;">
				
				<li>
					@if(Auth::user()->password)
					<img class="avatar_user" src="{{url('images/'.Auth::user()->id.'/'.Auth::user()->avatar)}}" width="40px" height="40px" style="border-radius: 50%; margin-top: 5px;">
					@else
					<img class="avatar_user" src="{{Auth::user()->avatar}}" width="40px" height="40px" style="border-radius: 50%; margin-top: 5px;">
					@endif
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Xin Chào {{Auth::user()->name}} !<span class="caret"></span></a>
					<ul class="dropdown-menu" style="min-width: 144px;">
						<li><a href="{{url('/trang-ca-nhan')}}">Trang cá nhân</a></li>
						<li><a href="{{url('/thong-tin')}}">Thông tin</a></li>
						<li><a href="#">Đổi mật khẩu</a></li>
					</ul>
				</li>
				<li><a href="{{url('/dang-xuat')}}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
			</ul>
			@else

			<ul class="nav navbar-nav navbar-right">
				<li onclick=""><a href="#"><span class="glyphicon glyphicon-user"></span> Đăng Ký</a></li>
				<li onclick=""><a href="#"><span class="glyphicon glyphicon-log-in"></span> Đăng Nhập</a></li>
			</ul> -->
			<div class="navbar-header">
		      <a class="navbar-brand" href="#">WebSiteName</a>
		    </div>
		    <ul class="nav navbar-nav">
		      <li class="active"><a href="#">Home</a></li>
		      <li><a href="#">Page 1</a></li>
		      <li><a href="#">Page 2</a></li>
		      <li><a href="#">Page 3</a></li>
		    </ul>
		  </div>
		</nav>
	</header>
	
	<div class="container">
		@yield('content')
	</div>
	<footer>
		<div class="pull-right">
            Develope by <a href="#">Uyen</a>
          </div>
          <div class="clearfix"></div>
	</footer>
</body>
</html>