<?php

/**
 * This shortcode gets all the offices and load them into
 * a Google Map with the specific offices markers.
 *
 * @return string
 */
function fn_mgjo_applicant_form() {

	// Variables
	$output = "";
	$name               = ( isset( $_POST['txtname'] ) ) ? $_POST['txtname'] : "";
	$yearsexp           = ( isset( $_POST['txtyearsexp'] ) ) ? $_POST['txtyearsexp'] : "";
	$expdescripciont    = ( isset( $_POST['txtexpdescription'] ) ) ? $_POST['txtexpdescription'] : "";

	ob_start(); ?>

    <?php
	// Show the Form only if we don't have a $_GET success parameter(?success=1)
    if( ! isset( $_GET['success'] ) ):
    ?>
	<form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post" class="mgjoform">

		<div class="mgjoform__row">
			<label for="txtname"><?php _e("Nombre completo","mg-wp-job-offers"); ?>:</label>
			<input type="text" id="txtname" name="txtname">
            <span class="mgjo__errmsg"><?php _e('Campo inválido. Revista este dato.','mg-wp-job-offers'); ?></span>
		</div>

        <div class="mgjoform__row">
            <label for="txtemail"><?php _e("Correo electrónico","mg-wp-job-offers"); ?>:</label>
            <input type="email" id="txtemail" name="txtemail">
            <span class="mgjo__errmsg"><?php _e('Campo inválido. Revista este dato.','mg-wp-job-offers'); ?></span>
        </div>

        <div class="mgjoform__row">
            <label for="txtmobile"><?php _e("Teléfono móvil","mg-wp-job-offers"); ?>:</label>
            <input type="text" id="txtmobile" name="txtmobile">
        </div>

        <div class="mgjoform__row">
            <label for="txtcity"><?php _e("Ciudad","mg-wp-job-offers"); ?>:</label>
            <input type="text" id="txtcity" name="txtcity">
        </div>

        <div class="mgjoform__row">
            <label for="txtcountry"><?php _e("País de residencia","mg-wp-job-offers"); ?>:</label>
            <input type="text" id="txtcountry" name="txtcountry">
        </div>

        <div class="mgjoform__row">
            <label for="txtnationality"><?php _e("Nacionalidad","mg-wp-job-offers"); ?>:</label>
            <input type="text" id="txtnationality" name="txtnationality">
        </div>

        <div class="mgjoform__row">
            <label for="txtbirthdate"><?php _e("Fecha de nacimiento","mg-wp-job-offers"); ?>:</label>
            <input type="text" id="txtbirthdate" name="txtbirthdate" placeholder="dd/mm/aaaa" maxlength="10">
            <span class="mgjo__errmsg"><?php _e('Completa la fecha con el formato dd/mm/aaaa.','mg-wp-job-offers'); ?></span>
        </div>

        <div class="mgjoform__row">
            <label for="ddlgender"><?php _e("Sexo","mg-wp-job-offers"); ?>:</label>
            <div class="select-style">
                <select name="ddlgender" id="ddlgender">
                    <option value="2"><?php _e('Femenino', 'mg-wp-job-offers'); ?></option>
                    <option value="1"><?php _e('Masculino', 'mg-wp-job-offers'); ?></option>
                </select>
            </div>
        </div>

        <div class="mgjoform__row">
            <label for="ddlmovility"><?php _e("Movilidad geográfica","mg-wp-job-offers"); ?>:</label>
            <div class="select-style">
                <select name="ddlmovility" id="ddlmovility">
                    <option value="0">No</option>
                    <option value="1">Sí</option>
                </select>
            </div>
        </div>


        <div class="mgjoform__row">
            <label for="jobexperience"><?php _e("Años de experiencia","mg-wp-job-offers"); ?>:</label>
            <div class="select-style">
                <?php
                    $args = array(
                        'name'          => 'jobexperience',
                        'hide_empty'    => 0,
                        'id'            => 'jobexperience',
                        'taxonomy'      => 'jobexperience'
                    );

                    wp_dropdown_categories( $args );
                ?>
            </div>
        </div>

        <div class="mgjoform__row">
            <label for="txtdescription"><?php _e("Experiencia profesional","mg-wp-job-offers"); ?>:</label>
            <textarea name="txtdescription" id="txtdescription" cols="30" rows="10"></textarea>
            <span class="mgjo__errmsg"><?php _e('Campo inválido. Revista este dato.','mg-wp-job-offers'); ?></span>
        </div>

        <div class="mgjoform__row">
            <label for="txtlanguages"><?php _e("Idiomas","mg-wp-job-offers"); ?>:</label>
            <?php echo get_terms_chekboxes('mgjo-languages', $args = array('hide_empty'=>false)); ?>
        </div>


        <div class="mgjoform__row">
            <label for="txtitknow"><?php _e("Conocimientos informáticos","mg-wp-job-offers"); ?>:</label>
            <textarea name="txtitknow" id="txtitknow" cols="30" rows="10"></textarea>
        </div>


        <div class="mgjoform__row">
            <label for="txteducation"><?php _e("Educación","mg-wp-job-offers"); ?>:</label>
            <textarea name="txteducation" id="txteducation" cols="30" rows="10"></textarea>
        </div>


        <div class="mgjoform__row">
            <?php
            // Create a Filter to apply changes on the Legal Page URL
            $legalurl = apply_filters('mgjo_legal_page_link', '/legal');
            ?>
            <input id="chklegal" name="chklegal" type="checkbox"><label for="chklegal" class="mgjoform__legal"><?php printf( __('Aceptación de las <a href="%s">Condiciones Legales</a>.', 'mg-wp-job-offers'), pll_get_page_url('aviso-legal-y-condiciones-generales-de-uso') ); ?></label>
        </div>

        <?php if( isset( $_GET['jid'] ) && !empty( $_GET['jid'] ) ): ?>
        <input type="hidden" name="jobofferid" value="<?php echo urlencode( base64_decode( $_GET['jid'] ) ); ?>">
        <?php endif; ?>

		<input type="hidden" name="action" value="newapplicant">

        <?php
            // WP NONCE FIELD
            wp_nonce_field( 'newapplicantnone' );
        ?>

        <div class="mgjoform__row mgjoform__row--center">
		    <input type="submit" class="xe-button mgjo__submit" disabled="disabled" value="<?php _e("Enviar candidatura","mg-wp-job-offers"); ?>">
        </div>

	</form>
    <?php endif; ?>


    <?php
    // Show the Success message if the $_GET parameter exists.
	if( isset( $_GET['success'] )  &&  $_GET['success'] == 1 ): ?>
        <div class="mgjoform__success">
            <img class="mgjoform__success__i" src="<?php echo MGJO_URL; ?>/assets/img/formulario-exito.svg">
            <h2 class="mgjoform__success__h"><?php _e('¡Formulario recibido con éxito!','mg-wp-job-offers'); ?></h2>
            <p class="mgjoform__success__b"><?php _e('Muchas gracias por tomar parte de tu tiempo en escribirnos.', 'mg-wp-job-offers'); ?></p>
        </div>
    <?php endif; ?>



	<?php
	$output = ob_get_contents();
	ob_end_clean();
	return $output;

}
add_shortcode( 'mgjoapplicantform', 'fn_mgjo_applicant_form' );