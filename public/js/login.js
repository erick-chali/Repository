// IIFE - Immediately Invoked Function Expression
(function(yourcode) {

    // The global jQuery object is passed as a parameter
yourcode(window.jQuery, window, document);

}(function($, window, document) {

    // The $ is now locally scoped 

   // Listen for the jQuery ready event on the document
$(function() {

    $.material.init()
    $('#loginNotificacionAlerta').hide();
    $('#loginUsuario').focus();
       
    $('#btnLogin').click(function(){
        if(verificarCampoVacio('loginUsuario')){
            usuarioVacio();
            ponerTextosAlerta('loginNotificacionAlerta','Error Usuario', 'Verfique Usuario');
            $('#loginNotificacionAlerta').toggle('slow').delay(5000).toggle('slow');
        }else if(verificarCampoVacio('loginClave')){
            claveVacia();
            ponerTextosAlerta('loginNotificacionAlerta', 'Error Clave', 'No puede estar vacia');
            $('#loginNotificacionAlerta').toggle('slow').delay(5000).toggle('slow');
        }
    });
    
    
    //validacion de usuario -- que no quede vacio.
    $(document).on('keyup','#loginUsuario', function(e){
        if(!verificarCampoVacio('loginUsuario')){
            removerError('divUsuario');
            limpiarHelper('helperUsuario');
        }else{
            usuarioVacio();
        }
    }); 
    $(document).on('keyup','#loginClave', function(e){
        if(!verificarCampoVacio('loginClave')){
            removerError('loginClave');
            limpiarHelper('helperClave');
        }else{
            claveVacia();
        }
    }); 
});

   // The rest of the code goes here!
    function verificarCampoVacio(idElemento){
        if($.trim($('#'+idElemento).val()) == ''){
            return true;
        }else{
            return false;
        }
    }
    function usuarioVacio(){
        $('#loginUsuario').val('');
        $('#divUsuario').addClass('has-error');
        $('#helperUsuario').text('El usuario no puede quedar vacio.');
        $('#loginUsuario').focus();
    }
    function claveVacia(){
        $('#loginClave').val('');
        $('#divClave').addClass('has-error');
        $('#helperClave').text('La clave no puede estar vacia.');
        $('#loginClave').focus();
    }
    function removerError(idElemento){
        $('#'+idElemento).removeClass('has-error');
    }
    function limpiarHelper(idHelper){
        $('#'+idHelper).text('');
    }
    function ponerTextosAlerta(idAlerta, titulo, mensaje){
        $('#' +idAlerta +  ' h4').text(titulo);
        $('#' +idAlerta +  ' p').text(mensaje);
    }
}));