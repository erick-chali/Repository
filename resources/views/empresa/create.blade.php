@extends('layouts/empresaMaster')
@section('title', 'Crear')
@stop

@section('contenido')
    <style>
        .col-centered{
            float: none;
            margin: 0 auto;
        }
    </style>
    <div class="col-lg-6 col-centered">

        <div class="well">
            {!! Form::open(['route'=> 'empresa.store', 'method'=>'post']) !!}
            <legend>Agregar nueva empresa.</legend>
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" class="form-control input-sm" name="name" id="name">
            </div>
            <div class="form-group">
                <label>Pais</label>
                <select class="form-control input-sm" id="country" name="country"></select>
            </div>
            <div class="form-group">
                <label class="checkbox-inline">
                    <input type="checkbox" name="active" id="active"> Activo
                </label>
            </div>

            <button type="submit" class="btn btn-sm btn-primary">Crear</button>
            {!! Form::close() !!}
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
    <script type="text/javascript" src="{{ URL::asset('js/empresaCreate.js') }}"></script>
@stop