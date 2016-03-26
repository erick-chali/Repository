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
        $(window).resize(function () {
            $('table').bootstrapTable('resetView');
        });
        $('#alerta_actualiza').hide();
        $('#alerta_elimina').hide();
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

        // $icono = $('<i class="material-icons md-24">mode_edit</i>');
        // $('.link').append($icono);
    });

    //funciones
}));