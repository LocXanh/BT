<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.theme.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
</head>
<body>
	<header>
		<nav class="navbar navbar-default navbar-fixed-top">
		  <div class="container-fluid">
			<div class="navbar-header">
		      <a class="navbar-brand" href="#">WebSiteName</a>
		    </div>
		    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
	            @if (Auth::guest())
	                <li><a href="{{ url('/auth/login') }}">Login</a></li>
	            @else
	                <li class="dropdown">
	                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
	                        {{ Auth::user()->name }} <span class="caret"></span>
	                    </a>

	                    <ul class="dropdown-menu" role="menu">
	                        <li>
	                            <a href="{{ route('logout') }}">
	                                Logout
	                            </a>
	                        </li>
	                    </ul>
	                </li>
	            @endif
	        </ul>
		  </div>
		</nav>
	</header>
	<div class="container">
		<div class="x_panel">
			@yield('content')
		</div>	
	</div>
	<footer>
	</footer>

	<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="{{asset('js/app.js')}}"></script>

</body>
</html>