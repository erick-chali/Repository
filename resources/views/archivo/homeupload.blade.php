<!DOCTYPE html>
<html>
<head>
    <title>Subir Documentos</title>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.1/bootstrap-table.min.css">
</head>
<body>
<style>
    body {
        padding-top: 70px;
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
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Formulario para subir archivos</div>

                <div class="panel-body">
                    @if(Session::has('success'))
                        <div class="alert-box success">
                            <h2>{!! Session::get('success') !!}</h2>
                        </div>
                    @endif
                    {!! Form::open(array('route'=>'ftp.store','method'=>'POST', 'files'=>true)) !!}
                        {!! Form::file('images[]', array('multiple'=>true)) !!}
                        {!! Form::submit('Subir archivos', array('class'=>'send-btn')) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    @if($listing != null)
        <table id="#tableFiles" data-toggle="table" data-classes="table table-bordered table condensed table-hover" data-height="400">
            <thead>
                <tr>
                    <th data-sortable="true">Archivo</th>
                    <th>Descargar/Ver</th>
                </tr>
            </thead>
            <tbody>
            @foreach($listing as $dato)
                <?php
                    $nombre = explode("/", $dato);
                $extension = new SplFileInfo($nombre[2]);
                ?>
                <tr>
                    <td>{{$nombre[2]}}</td>
                    <td>
                        <a href="{{ route('download', $nombre[1].'/'.$nombre[2]) }}" class="btn btn-default btn-xs" title="Descargar Archivo"><i class="material-icons md-18">file_download</i></a>
                        @if($extension->getExtension() == 'pdf')
                            <a href="{{ route('view', $nombre[1].'/'.$nombre[2]) }}#page=4" class="btn btn-default btn-xs" title="Ver Archivo" target="_blank"><i class="material-icons md-18">remove_red_eye</i></a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif

</div>
</body>
<script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/bootstrap-table.js') }}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.1/bootstrap-table.min.js"></script>
<script src="//cdn.ckeditor.com/4.5.7/full/ckeditor.js"></script>
<script type="text/javascript">
    (function(yourcode) {
        yourcode(window.jQuery, window, document);

    }(function($, window, document) {
        $(function() {
            $.ajax({
                url: '/archivos',
                type: 'get',
                dataType: 'json',
                success: function (data) {
                    console.log(data);

                },
                error: function (data) {
                    alert('Los archivos no fueron cargados correctamente.');
                }
            }).done(function (data) {

            });
        });

        //funciones
    }));
</script>
{{--<script type="text/javascript" src="{{ URL::asset('js/ckeditor.js') }}"></script>--}}
</html>

