@extends('layouts.usuarioMaster')

@section('title' , 'Cambiar Clave')
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
{{--                    {!! Form::open(['route' => ['changepassword', $dato->codigo_usuario], 'method' => 'PUT']) !!}--}}
                    {!! Form::open(['route'=>['changepassword', Auth::user()->codigo_usuario], 'method'=>'POST']) !!}
                    <legend>Cambiar Contrase&ntilde;a</legend>
                    <div class="form-group">
                        <label>Contrase&ntilde;a Nueva</label>
                        <input type="password" class="form-control input-sm" name="password" id="password">
                    </div>
                    <div class="form-group">
                        <label>Repetir Contrase&ntilde;a</label>
                        <input type="password" class="form-control input-sm" name="password_confirmation" id="password_confirmation">
                    </div>
                    <div class="form-group">
                        {{--<div class="g-recaptcha" data-sitekey="6LdynBoTAAAAAD0jC4SqZEJ0aM8upZrdIJmhIybb" id="captchadiv" name="recaptcha"></div>--}}
                        {!! Recaptcha::render() !!}
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary" id="btn_guardar">Restablecer</button>

                    {!!Form::close()!!}
                @endforeach
            @else
                <div>
                    <p>Su usuario no fue encontrado.</p>
                    <a href="{{URL::to('/usuario')}}">Regresar a p&aacute;gina principal</a>
                </div>
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
            {{--@if(count($errors) > 0)--}}
                {{----}}
            {{--@endif--}}
        </div>
    </div>
@endsection
@section('scripts')
    {{--<script src="https://www.google.com/recaptcha/api.js" async defer></script>--}}
    <script type="text/javascript">
        (function(yourcode) {

            // The global jQuery object is passed as a parameter
            yourcode(window.jQuery, window, document);

        }(function($, window, document) {

            // The $ is now locally scoped

            // Listen for the jQuery ready event on the document
            $(function() {

            });

        }));
    </script>
@endsection