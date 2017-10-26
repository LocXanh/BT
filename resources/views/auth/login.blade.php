<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.theme.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-xs-10 col-xs-offset-1">
                <div class="form-login">
                    <form class="form-horizontal" method="POST" action="/auth/login">
                        {!! csrf_field() !!}

                        <div  class="form-group">
                            <label class="col-xs-4 col-md-3">LoginID</label>
                            <input class="col-xs-8 col-md-9 form-control" name="loginID" value="{{ old('loginID') }}" required="required">
                        </div>

                        <div class="form-group">
                            <label class="col-xs-4 col-md-3">Password</label>
                            <input class="col-xs-8 col-md-9 form-control" type="password" name="password" id="password" required="required">
                        </div>
                        @include('blocks.errors')
                        @if(Session::has('flash_message'))
                                <div class="fade in alert alert-{!! Session::get('flash_level') !!}">
                                    {!!  Session::get('flash_message')!!}
                                </div>
                        @endif
                        <!-- <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember"> Remember Me
                            </label>
                            
                        </div>
 -->
                        
                        <button class="btn" type="submit">Login</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript" src="{{asset('/bootstrap/js/bootstrap.min.js')}}"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
</body>
</html>