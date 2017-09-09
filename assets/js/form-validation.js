jQuery(document).ready( function( $ ) {

    "use strict";
   
    var mgjoform = {

        addEventListeners: function(){

            $('.mgjo__submit').click(function(e){

                // Variables
                var errorClass  = 'flderror';
                var name        = $('#txtname');
                var email       = $('#txtemail');
                var jobexp      = $('#txtdescription');
                var result      = true; // Flag for the form validation


                // Remove all error before checking again
                $(name).removeClass('flderror');


                // Check name field
                if( !$(name).val() ) {
                    $(name).addClass( errorClass );
                    $(name).next().addClass('visible');
                    result = false;
                }

                // Check email field
                if( !$(email).val() ) {
                    $(email).addClass( errorClass );
                    $(email).next().addClass('visible');
                    result = false;
                }
                else {

                    // Check if the email is valid
                    if( !mgjoform.validateEmail( $(email).val() ) ) {
                        $(email).addClass( errorClass );
                        $(email).next().addClass('visible');
                        result = false;
                    }

                }


                // Check Job Experience Field
                if( !$(jobexp).val() ) {
                    $(jobexp).addClass( errorClass );
                    $(jobexp).next().addClass('visible');
                    result = false;
                }

                // If the validation fails cancel the submit action
                if( !result ) {
                    e.preventDefault();
                }

                return result;
            });

        },
        init: function(){

            mgjoform.addEventListeners();

        },
        validateEmail: function (email) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        }

    };


    // Initialize the script
    mgjoform.init();
    
} );