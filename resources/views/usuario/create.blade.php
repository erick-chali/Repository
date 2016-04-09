@extends('layouts/usuarioMaster')
@section('title', 'Crear')
@stop

@section('contenido')
    <style>
        .col-centered{
            float: none;
            margin: 0 auto;
        }
    </style>
    @if(Session::has('datos'))
        @foreach(Session::get('datos') as $dato)
            @if($dato->result == 1)
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p>El usuario ha sido creado exitosamente.</p>

                </div>
            @else
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p>{{$dato->msj}}</p>
                </div>
            @endif
        @endforeach
    @endif
    <div class="col-lg-6 col-centered">

        <div class="well">
            {{--{!! Form::open(['route'=> 'usuario.store', 'method'=>'post']) !!}--}}

            {{--<form action="{{ route('usuario.store') }}" method="post">--}}
            {!! Form::open() !!}
                {{--<input type="hidden" name="_token" value="{!! csrf_token() !!}">--}}
                <legend>Agregar nuevo usuario.</legend>

                <div class="form-group">
                    <label>Empresa</label>
                    <select class="form-control input-sm" name="enterprise" id="enterprise"></select>
                    {{--<input type="number" class="form-control input-sm" name="enterprise" id="enterprise">--}}
                </div>
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" class="form-control input-sm" name="name" id="name">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control input-sm" name="email" id="email">
                </div>
                <div class="form-group">
                    <label>Usuario</label>
                    <input type="text" class="form-control input-sm" name="username" id="username">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control input-sm" name="password" id="password">
                </div>
                <div class="form-group">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="create_content" id="create_content"> Crea contenido
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="active" id="active"> Activo
                    </label>
                </div>

                <button type="submit" class="btn btn-sm btn-primary" id="btn_Crear">Crear</button>
            {!! Form::close() !!}
            {{--</form>--}}
            {{--{!! Form::close() !!}--}}
            <div class="alert alert-danger alert-dismissible" role="alert" id="alertaErrores">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                <ul>
                </ul>
            </div>
        </div>
    </div>

@stop
@section('scripts')
    <script type="text/javascript" >
        (function(yourcode) {

            // The global jQuery object is passed as a parameter
            yourcode(window.jQuery, window, document);

        }(function($, window, document) {

            // The $ is now locally scoped

            // Listen for the jQuery ready event on the document
            $(function() {
                $('#alertaErrores').hide();
                //Cargar empresas utilizando ajax
                $.ajax({
                    url: '{{URL::to('/empresas')}}',
                    type: 'get',
                    dataType: 'json',
                    success: function (data) {
                        $.each(data, function (i, empresas) {
                            $('#enterprise').append($('<option>', {
                                value: empresas.codigo_empresa,
                                text: empresas.nombre
                            }));
                        });
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });

                $('form').submit(function (e) {
                    var create_content = 0, active = 0;
                    if ($('#create_content').is(':checked')) {
                        create_content = 1;
                    }
                    if ($('#active').is(':checked')) {
                        active = 1;
                    }
                    $.ajax({
                        url: '{{route('usuario.store')}}',
                        headers: {'X-CSRF-TOKEN': $('input[name=_token]').val()},
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            enterprise: $('#enterprise').val(),
                            name : $('#name').val(),
                            email: $('#email').val(),
                            username: $('#username').val(),
                            password: $('#password').val(),
                            create_content: create_content,
                            active: active,

                            _token: $('input [name = _token]').val()
                        },
                        success: function (data) {
                            $('#alertaErrores ul').empty();
                            var obj = JSON.stringify(data);
                            console.log(data[0].result);
                            if(data[0].result == 1){
                                console.log('contenido: '+ data[0].contenido + ' activo: ' + data[0].activo);
                                window.location = "{{url('/usuario')}}";
                            }else if(data[0].result == 0){
                                $('#alertaErrores ul').append('<li>'+ data[0].msj +'</li>');
                                $('#alertaErrores').show();
                            }
                        },
                        error: function (data) {

                            $('#alertaErrores ul').empty();
                            console.log(data.responseJSON);
                            $.each(data.responseJSON, function (key, value) {
                                console.log(key + ' // ' + value);
                            });
                            if(data.responseJSON != ''){
                                $.each(data.responseJSON, function (key, value) {
                                    $('#alertaErrores ul').append('<li>'+value+'</li>');
                                });
                                $('#alertaErrores').show();
                            }

                        }
                    });
                    return false;
                });
            });

        }));
    </script>
@stop