@extends('layouts.paisMaster')

@section('title','Pais')
@endsection

@section('contenido')
    @if(Session::has('creacion'))
        @foreach(Session::get('creacion') as $dato)
            @if($dato->result == 1)
                <div class="alert alert-success alert-dismissible" role="alert" id="alerta_crea">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p>El pa&iacute;s ha sido creado exitosamente.</p>

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
                    <p>El pa&iacute;s ha sido actualizado exitosamente.</p>

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
                    <p>El pa&iacute;s ha sido eliminado exitosamente.</p>

                </div>
            @else
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p>{{$dato->msj}}</p>
                </div>
            @endif
        @endforeach
    @endif


    @if($resultado != null)
        <table data-toggle="table"
               data-classes="table table-bordered table-condensed"
               data-height="500"
               data-show-toggle="true"
               data-search="true"
        >
            <thead>
            <tr>
                <th data-sortable="true">ID</th>
                <th data-sortable="true">Pais</th>
                <th data-sortable="true">Activo</th>
                <th >Editar</th>
            </tr>
            </thead>
            <tbody>
            @foreach($resultado as $valor)
                <tr>
                    <td>{{$valor->codigo_pais}}</td>
                    <td>{{$valor->descripcion}}</td>
                    @if($valor->activo == 0 || $valor->activo == null)
                        <td>No</td>
                    @else
                        <td>Si</td>
                    @endif
                    <td>
                        {{--{!!link_to_route('usuario.edit', $title = 'Editar', $parameters = $valor->codigo_usuario, $attributes = ['class'=>'btn btn-primary btn-xs '])!!}--}}
                        <a href="{{ route('pais.edit', $valor->codigo_pais) }}" class="btn btn-default btn-xs" title="Editar datos de la empresa seleccionada."><i class="material-icons md-18 md-dark">mode_edit</i></a>
                        {{--{!!link_to_route('usuario.edit', $title = 'Eliminar', $parameters = $valor->codigo_usuario, $attributes = ['class'=>'btn btn-danger btn-sm link'])!!}--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
@section('scripts')
    <script>
        (function(yourcode) {

            // The global jQuery object is passed as a parameter
            yourcode(window.jQuery, window, document);

        }(function($, window, document) {

            // The $ is now locally scoped

            // Listen for the jQuery ready event on the document
            $(function() {
                $('table').bootstrapTable('resetView');
                $(window).resize(function () {
                    $('table').bootstrapTable('resetView');
                });
                $('#alerta_actualiza').hide();
                $('#alerta_elimina').hide();
                $('#alerta_crea').hide();
                if($('#alerta_actualiza p').text() != ''){
                    $( "#alerta_actualiza" ).show( "fast", function() {
                        setTimeout(function(){
                            $( "#alerta_actualiza" ).hide( "slow", function() {
                            });
                        }, 5000);
                    });
                }
                if($('#alerta_elimina p').text() != ''){
                    $( "#alerta_elimina" ).show( "fast", function() {
                        setTimeout(function(){
                            $( "#alerta_elimina" ).hide( "slow", function() {
                            });
                        }, 5000);
                    });
                }
                if($('#alerta_crea p').text() != ''){
                    $( "#alerta_crea" ).show( "fast", function() {
                        setTimeout(function(){
                            $( "#alerta_crea" ).hide( "slow", function() {
                            });
                        }, 5000);
                    });
                }

                // $icono = $('<i class="material-icons md-24">mode_edit</i>');
                // $('.link').append($icono);
            });

            //funciones
        }));
    </script>
@endsection