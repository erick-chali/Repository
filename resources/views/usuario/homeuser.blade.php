@extends('layouts/usuarioMaster')
@section('title', 'Crear')
@stop

@section('contenido')
    <style>
        .col-centered{
            float: none;
            margin: 0 auto;
        }

        table a{
            background-color: #fff;
        }
    </style>
    <div class="col-lg-12 col-centered">
        {{--@if(Session::has('resultado'))--}}
        @if(Session::has('creacion'))
            @foreach(Session::get('creacion') as $dato)
                @if($dato->result == 1)
                    <div class="alert alert-success alert-dismissible" role="alert" id="alerta_actualiza">
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
        @if(Session::has('actualizacion'))
            @foreach(Session::get('actualizacion') as $dato)
                @if($dato->result == 1)
                    <div class="alert alert-success alert-dismissible" role="alert" id="alerta_actualiza">
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
        @if(Session::has('eliminacion'))
            @foreach(Session::get('eliminacion') as $dato)
                @if($dato->result == 1)
                    <div class="alert alert-success alert-dismissible" role="alert" id="alerta_elimina">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <p>El usuario ha sido eliminado exitosamente.</p>

                    </div>
                @else
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <p>{{$dato->msj}}</p>
                    </div>
                @endif
            @endforeach
        @endif
            <table data-toggle="table"
                   data-classes="table table-bordered table-condensed"
                   data-height="500"
                   data-show-toggle="true"
            >
                <thead>
                    <tr>
                        <th data-sortable="true">ID</th>
                        <th>Pais</th>
                        <th>Empresa</th>
                        <th data-sortable="true">Nombre</th>
                        <th>Usuario</th>
                        <th>Email</th>
                        <th>Contenido</th>
                        <th>Activo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($resultado as $valor)
                        <tr>
                            <td class="codigo_usuario">{{$valor->codigo_usuario}}</td>
                            <td>{{$valor->pais}}</td>
                            <td>{{$valor->empresa}}</td>
                            <td>{{$valor->nombre}}</td>
                            <td>{{$valor->usuario}}</td>
                            <td>{{$valor->e_mail}}</td>
                            @if($valor->crea_contenido == 0 || $valor->crea_contenido == null)
                                <td>No</td>
                            @else
                                <td>Si</td>
                            @endif
                            @if($valor->activo == 0 || $valor->activo == null)
                                <td>No</td>
                            @else
                                <td>Si</td>
                            @endif
                            <td>
                                {{--{!!link_to_route('usuario.edit', $title = 'Editar', $parameters = $valor->codigo_usuario, $attributes = ['class'=>'btn btn-primary btn-xs '])!!}--}}
                                <a href="{{ route('usuario.edit', $valor->codigo_usuario) }}" class="btn btn-default btn-xs" title="Editar datos del usuario seleccionado."><i class="material-icons md-18 md-dark">mode_edit</i></a>
                                <a href="{{ route('restore', $valor->codigo_usuario) }}" class="btn btn-default btn-xs" title="Re-establecer contrase&ntilde;a del usuario seleccionado."><i class="material-icons md-18 md-dark">lock_outline</i></a>
                                {{--{!!link_to_route('usuario.edit', $title = 'Eliminar', $parameters = $valor->codigo_usuario, $attributes = ['class'=>'btn btn-danger btn-sm link'])!!}--}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        {{--@endif--}}
    </div>

@stop
@section('scripts')
    <script type="text/javascript" src="{{ URL::asset('js/homeUser.js') }}"></script>
@stop