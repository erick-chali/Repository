@extends('layouts/usuarioMaster')
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
                {!! Form::open(['route' => ['usuario.update', $valor->codigo_usuario], 'method' => 'PUT']) !!}

                    <legend>Editar usuario.</legend>
                    <div class="form-group">
                        <label>C&oacute;digo empresa</label>
                        <select class="form-control input-sm" name="enterprise" id="enterprise"></select>
                        <input type="number" class="form-control input-sm" id="codigo_empresa" value="{{$valor->codigo_empresa}}">
                    </div>
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control input-sm" name="name" value="{{$valor->nombre}}">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control input-sm" name="email" value="{{$valor->e_mail}}">
                    </div>
                    <div class="form-group">
                        <label>Usuario</label>
                        <input type="text" class="form-control input-sm" name="username" value="{{$valor->usuario}}">
                    </div>
                    <div class="form-group">
                        <label class="checkbox-inline">
                            @if($valor->crea_contenido == 0 || $valor->crea_contenido == 0)
                                <input type="checkbox" name="create_content"> Crea contenido
                            @else
                                <input type="checkbox" name="create_content" checked> Crea contenido
                            @endif
                        </label>
                        <label class="checkbox-inline">
                            @if($valor->activo== 0 || $valor->activo == 0)
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

                {!! Form::open(['route'=> ['usuario.destroy', $valor->codigo_usuario], 'method' => 'DELETE']) !!}
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
    <script type="text/javascript" src="{{ URL::asset('js/usuarioUpdate.js') }}"></script>
@stop