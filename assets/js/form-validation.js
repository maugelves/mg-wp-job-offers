jQuery(document).ready( function( $ ) {

    "use strict";
   
    var mgjoform = {

        addEventListeners: function(){

            // The user click the Submit button
            $('.mgjo__submit').click(function(e){

                // Variables
                var errorClass  = 'flderror';
                var name        = $('#txtname');
                var email       = $('#txtemail');
                var jobexp      = $('#txtdescription');
                var birthdate   = $('#txtbirthdate');
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

                // Check the birthdate field
                if( !$(birthdate).val() ) {
                    $(birthdate).addClass( errorClass );
                    $(birthdate).next().addClass('visible');
                    result = false;
                }
                else {

                    if( !mgjoform.validateBirthdate( $(birthdate).val() ) ) {

                        $(birthdate).addClass( errorClass );
                        $(birthdate).next().addClass('visible');
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


            // The user checks the Terms and Conditions
            $('#chklegal').change( function(){

                if( $(this).is(':checked') ) {

                    $('.mgjo__submit').removeAttr('disabled');

                }
                else {

                    $('.mgjo__submit').attr('disabled', 'disabled');

                }

            });


            // The user clickr on "Inscribirme" button
            $('.mgjo__button').click(function(){

                $('html, body').animate({
                    scrollTop: $('#mgform').offset().top
                }, 500);
                return false;

            });

        },
        init: function(){

            mgjoform.addEventListeners();

        },
        validateBirthdate: function(date) {

            var reg = /(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d/;
            return date.match(reg);

        },
        validateEmail: function (email) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        }

    };


    // Initialize the script
    mgjoform.init();
    
} );