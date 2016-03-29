/**
 * Created by Erick on 3/28/2016.
 */
(function(yourcode) {
    yourcode(window.jQuery, window, document);

}(function($, window, document) {

    $(function() {
        $.ajax({
            url: '/paises',
            type: 'get',
            dataType: 'json',
            success: function (data) {
                $.each(data, function (i, paises) {
                    $('#country').append($('<option>', {
                        value: paises.codigo_pais,
                        text: paises.descripcion
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