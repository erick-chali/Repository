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
        $.ajax({
            url: '/empresas',
            type: 'get',
            dataType: 'json',
            success: function (data) {
                $.each(data, function (i, empresas) {
                    $('#enterprise').append($('<option>', {
                        value: empresas.codigo_empresa,
                        text: empresas.nombre
                    }));
                });
            },
            error: function (data) {
                console.log(data);
            }
        });
    });

    //funciones
}));