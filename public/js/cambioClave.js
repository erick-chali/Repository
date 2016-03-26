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



    });

    //funciones
}));