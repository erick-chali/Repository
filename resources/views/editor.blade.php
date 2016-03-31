<!DOCTYPE html>
<html>
    <head>
        <title>Edicion Documento</title>
    </head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Formulario con ckeditor</div>

                <div class="panel-body">
                    {!! Form::open(['method'=>'post']) !!}
                            <textarea class="ckeditor" name="editor1" id="editor1" rows="10" cols="80">
                                Este es el textarea que es modificado por la clase ckeditor
                            </textarea>
                    {!! Form::close() !!}
                </div>
                <button type="button" id="btn_save" class="btn btn-sm">SAVE</button>
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

