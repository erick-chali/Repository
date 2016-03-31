<!DOCTYPE html>
<html>
<head>
    <title>Subir Documentos</title>
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Formulario para subir archivos</div>

                <div class="panel-body">
                    @if(Session::has('success'))
                        <div class="alert-box success">
                            <h2>{!! Session::get('success') !!}</h2>
                        </div>
                    @endif
                    {!! Form::open(array('route'=>'ftp.store','method'=>'POST', 'files'=>true)) !!}
                        {!! Form::file('images[]', array('multiple'=>true)) !!}
                        {!! Form::submit('Subir archivos', array('class'=>'send-btn')) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>
<script src="//cdn.ckeditor.com/4.5.7/full/ckeditor.js"></script>
<script type="text/javascript">
    $("document").ready(function() {
        var editor = CKEDITOR.replace( 'editor1', {
            language: 'es',
            uiColor: '#9AB8F3',
            filebrowserBrowseUrl: '/browser/browse.php',
            filebrowserUploadUrl: '/uploader/upload.php'
        });

        // The "change" event is fired whenever a change is made in the editor.
        editor.on( 'change', function( evt ) {
            // getData() returns CKEditor's HTML content.
            console.log( 'Total bytes: ' + evt.editor.getData().length );
        });
        $('#btn_save').click(function () {
            var datos = editor.getData();
            console.log(datos);
        })
    });


</script>
{{--<script type="text/javascript" src="{{ URL::asset('js/ckeditor.js') }}"></script>--}}
</html>

