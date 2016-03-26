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
            {!! Form::open(['route'=> 'usuario.store', 'method'=>'post']) !!}
                {{--<input type="hidden" name="_token" value="{!! csrf_token() !!}">--}}
                <legend>Agregar nuevo usuario.</legend>

                <div class="form-group">
                    <label>C&oacute;digo empresa</label>
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
    <script type="text/javascript" src="{{ URL::asset('js/usuarioCreate.js') }}"></script>
@stop