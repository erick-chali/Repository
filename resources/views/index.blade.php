<!DOCTYPE html>
<html>
<head>
    <title>Repositorio - Login</title>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap-table.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/ripples.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/snackbar.min.css')}}">
</head>
<body>
<div class="container">
    <style>
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #eee;
        }

        form {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }
        form .form-signin-heading,
        form .checkbox {
            margin-bottom: 10px;
        }
        form .checkbox {
            font-weight: normal;
        }
        form .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
        }
        form .form-control:focus {
            z-index: 2;
        }
        form input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
        form input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
    {!! Form::open(['route'=>'login.store', 'method'=>'POST']) !!}
    {{--<form class="form-signin">--}}
        <h2 class="form-signin-heading">Inicio de sesi&oacute;n</h2>
        <label for="inputEmail" class="sr-only">Usuario</label>
        <input type="text" id="inputEmail" name="username" class="form-control" placeholder="Ingrese usuario" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
        {{--<div class="checkbox">--}}
            {{--<label>--}}
                {{--<input type="checkbox" value="remember-me"> Remember me--}}
            {{--</label>--}}
        {{--</div>--}}
        <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
    @if(Session::has('loginfail'))
        <div class="alert alert-danger" role="alert">
            <label>{{Session::get('loginfail')}}</label>
        </div>
    @endif

    {{--</form>--}}
    {!! Form::close() !!}

</div> <!-- /container -->
</body>

<script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/bootstrap-table.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/ripples.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/snackbar.min.js') }}"></script>
</html>