@extends('layouts.usuarioMaster')

@section('title' , 'Restablecer Clave')
@endsection

@section('contenido')
    <style>
        .col-centered{
            float: none;
            margin: 0 auto;
        }
    </style>
    <div class="col-lg-6 col-centered">
        <div class="well">
            {{--<form action="{{ route('usuario.update', $valor->codigo_usuario) }}" method="PUT">--}}
            @if($user != null)
                @foreach($user as $dato)
                    {!! Form::open(['route' => ['reset', $dato->codigo_usuario], 'method' => 'GET']) !!}

                    <legend>Restablecer Contrase&ntilde;a</legend>
                    <div class="form-group">
                        <label>Usuario</label>
                        <input type="text" class="form-control input-sm" name="username" value="{{$dato->usuario}}">
                    </div>
                    <div class="form-group">
                        {{--<div class="g-recaptcha" data-sitekey="6LdynBoTAAAAAD0jC4SqZEJ0aM8upZrdIJmhIybb"></div>--}}
                        {!! Recaptcha::render() !!}
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary" id="btn_guardar">Restablecer</button>

                    {!!Form::close()!!}
                @endforeach
            @else
                {!! Form::open(['route' => ['reset', ''], 'method' => 'GET']) !!}

                <legend>Restablecer Contrase&ntilde;a</legend>
                <div class="form-group">
                    <label>Usuario</label>
                    <input type="text" class="form-control input-sm" name="username" value="">
                </div>
                <div class="form-group">
                    {{--<div class="g-recaptcha" data-sitekey="6LdynBoTAAAAAD0jC4SqZEJ0aM8upZrdIJmhIybb"></div>--}}
                    {!! Recaptcha::render() !!}
                </div>
                <button type="submit" class="btn btn-sm btn-primary" id="btn_guardar">Restablecer</button>

                {!!Form::close()!!}
            @endif

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
@endsection
@section('scripts')
    {{--<script src="https://www.google.com/recaptcha/api.js" async defer></script>--}}
@endsection