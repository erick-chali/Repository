@extends('layouts/empresaMaster')
@section('title', 'Mi Perfil')
@stop

@section('contenido')
    <style>
        .col-centered{
            float: none;
            margin: 0 auto;
        }
    </style>

    <div class="col-lg-6 col-centered">
        @if(Session::has('actualizacion'))
            @foreach(Session::get('actualizacion') as $dato)
                @if($dato->result == 1)
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <p>El usuario ha sido actualizado exitosamente.</p>

                    </div>
                @else
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <p>{{$dato->msj}}</p>
                    </div>
                @endif
            @endforeach
        @endif
        <div class="well">
            @foreach($datos as $valor)
                {{--<form action="{{ route('usuario.update', $valor->codigo_usuario) }}" method="PUT">--}}
                {!! Form::open(['route' => ['empresa.update', $valor->codigo_empresa], 'method' => 'PUT']) !!}

                <legend>Editar empresa.</legend>
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" class="form-control input-sm" name="name" value="{{$valor->nombre}}">
                </div>
                <div class="form-group">
                    <label>Pais</label>
                    <input type="text" id="codigo_pais" value="{{$valor->pais}}" hidden>
                    <select class="form-control input-sm" id="country", name="country"></select>
                </div>
                <div class="form-group">
                    <label class="checkbox-inline">
                        @if($valor->activo== 0 || $valor->activo == '')
                            <input type="checkbox" name="active"> Activo
                        @else
                            <input type="checkbox" name="active" checked> Activo
                        @endif
                    </label>
                </div>
                <button type="submit" class="btn btn-sm btn-primary" id="btn_guardar">Guardar</button>

                {!!Form::close()!!}
                {{--</form>--}}
                {{--<form action="{{ route('usuario.destroy', $valor->codigo_usuario) }}" method="DELETE">--}}

                {!! Form::open(['route'=> ['empresa.destroy', $valor->codigo_empresa], 'method' => 'DELETE']) !!}
                <button type="submit" class="btn btn-sm btn-danger" id="btn_eliminar">Eliminar</button>
                {{--</form>--}}
                {!!Form::close()!!}
            @endforeach
            @if(count($errors) > 0)
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

@stop
@section('scripts')
    <script>
        (function(yourcode) {
            yourcode(window.jQuery, window, document);

        }(function($, window, document) {
            $(function() {
                $.ajax({
                    url: '/paises',
                    type: 'get',
                    dataType: 'json',
                    success: function (data) {
                        $.each(data, function (i, paises) {
                            $('#country').append($('<option>', {
                                value: paises.codigo_pais,
                                text: paises.descripcion
                            }));
                        });
                    },
                    error: function (data) {
                        alert('Los paises no fueron cargados correctamente.');
                    }
                }).done(function (data) {
                    $('#country').val($('#codigo_pais').val());
                });
            });

            //funciones
        }));
    </script>
    {{--<script type="text/javascript" src="{{ URL::asset('js/usuarioUpdate.js') }}"></script>--}}
@stop