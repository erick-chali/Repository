/**
 * Created by Erick on 3/11/2016.
 */
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
        $('#recuperarCorreo').focus();


    });
    //Declaracion de ids de los elementos que cambian de texto constantemente
    //inputs
    var inputCorreo = 'recuperarCorreo';
    var inputClaveNueva = 'recuperarClaveNueva';
    var inputClaveNuevaRepetida = 'recuperarClaveNuevaRepetir';
    //helpers
    var helperCorreo = 'helperRecuperarCorreo';
    var helperClaveNueva = 'helperRecuperarClaveNueva';
    var helperClaveNuevaRepetida = 'helperRecuperarClaveNuevaRepetir';
    //divs
    var divCorreo = 'divCorreo';
    var divClaveNueva = 'divClaveNueva';
    var divClaveNuevaRepetir = 'divClaveNuevaRepetir';

    function validarCorreo(email) {
        // http://stackoverflow.com/a/46181/11236

        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }
}));