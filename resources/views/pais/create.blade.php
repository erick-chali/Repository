@extends('layouts.paisMaster')
@section('title', 'Pais')
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
            {{--<form action="{{ route('usuario.update', $valor->codigo_usuario) }}" method="PUT">--}}
            {!! Form::open(['route' => ['pais.store'], 'method' => 'POST']) !!}

            <legend>Crear pa&iacute;s.</legend>
            <div class="form-group">
                <label>Pa&iacute;s</label>
                <input type="text" class="form-control input-sm" name="country" autofocus>
            </div>
            <div class="form-group">
                <label class="checkbox-inline">
                    <input type="checkbox" name="active" checked> Activo
                </label>
            </div>
            <button type="submit" class="btn btn-sm btn-primary" id="btn_guardar">Crear</button>

            {!!Form::close()!!}
            {{--</form>--}}
            {{--<form action="{{ route('usuario.destroy', $valor->codigo_usuario) }}" method="DELETE">--}}
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

    {{--<script type="text/javascript" src="{{ URL::asset('js/usuarioUpdate.js') }}"></script>--}}
@stop