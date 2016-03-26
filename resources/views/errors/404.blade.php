<!DOCTYPE html>
<html>
<head>
    <title>Repositorio - Usuario/@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap-table.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/ripples.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/snackbar.min.css')}}">
</head>
<body>
<style>
    body {
        padding-top: 70px;
    }
    h1{
        font-family: Roboto;
    }
    /* Rules for sizing the icon. */
    .material-icons.md-12 { font-size: 12px; }
    .material-icons.md-18 { font-size: 18px; }
    .material-icons.md-24 { font-size: 24px; }
    .material-icons.md-36 { font-size: 36px; }
    .material-icons.md-48 { font-size: 48px; }

    /* Rules for using icons as black on a light background. */
    .material-icons.md-dark { color: rgba(0, 0, 0, 0.54); }
    .material-icons.md-dark.md-inactive { color: rgba(0, 0, 0, 0.26); }

    /* Rules for using icons as white on a dark background. */
    .material-icons.md-light { color: rgba(255, 255, 255, 1); }
    .material-icons.md-light.md-inactive { color: rgba(255, 255, 255, 0.3); }
</style>
<div class="container">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">

                <a class="navbar-brand" href="{{URL::to('/usuario')}}">Repositorio</a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="material-icons">menu</i>
                </button>
            </div>
            <div id="navbar" class="navbar-collapse collapse">

            </div><!--/.nav-collapse -->
        </div>
    </nav>
    <h1>404 P&aacute;gina no encontrada. <i class="material-icons md-48">block</i></h1>
    <h1 class="">Ups...! La p&aacute;gina que quiere visitar no existe.</h1>
</div>
</body>

<script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/bootstrap-table.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/ripples.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/snackbar.min.js') }}"></script>
</html>