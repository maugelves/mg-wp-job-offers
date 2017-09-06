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

	<form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post" class="mgjoform">

		<div class="mgjoform__row">
			<label for="txtname"><?php _e("Nombre completo","mg-wp-job-offers"); ?>:</label>
			<input type="text" id="txtname" name="txtname">
		</div>

        <div class="mgjoform__row">
            <label for="txtemail"><?php _e("Correo electrónico","mg-wp-job-offers"); ?>:</label>
            <input type="text" id="txtemail" name="txtemail">
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
            <input type="text" id="txtbirthdate" name="txtbirthdate" placeholder="dd/mm/aaaa">
        </div>

        <div class="mgjoform__row">
            <label for="ddlgender"><?php _e("Sexo","mg-wp-job-offers"); ?>:</label>
            <select name="ddlgender" id="ddlgender">
                <option value="f"><?php _e('Femenino', 'mg-wp-job-offers'); ?></option>
                <option value="m"><?php _e('Masculino', 'mg-wp-job-offers'); ?></option>
            </select>
        </div>

        <div class="mgjoform__row">
            <label for="ddlmovility"><?php _e("Movilidad geográfica","mg-wp-job-offers"); ?>:</label>
            <select name="ddlmovility" id="ddlmovility">
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
        </div>


        <div class="mgjoform__row">
            <label for="ddlmovility"><?php _e("Años de experiencia","mg-wp-job-offers"); ?>:</label>
            <?php
                $args = array(
                    'name'          => 'ddlmovility',
                    'hide_empty'    => 0,
                    'id'            => 'ddlmovility',
                    'taxonomy'      => 'jobexperience'
                );

                wp_dropdown_categories( $args );

            ?>
        </div>

        <?php //TODO: Agregar el ID de la oferta de trabajo en un hidden ?>

		<input type="hidden" name="action" value="newapplicant">

		<input type="submit" value="Enviar">
	</form>
	

	<?php
	$output = ob_get_contents();
	ob_end_clean();
	return $output;

}
add_shortcode( 'mgjoapplicantform', 'fn_mgjo_applicant_form' );