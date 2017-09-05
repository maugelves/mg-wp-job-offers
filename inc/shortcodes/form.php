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
			<label for="txtadress"><?php _e("Dirección","mg-wp-job-offers"); ?>:</label>
			<input type="text" id="txtname" name="txtname" value="<?php echo $name; ?>">
		</div>

		<div class="mgjoform__row">
			<label for="txtyearsexp"><?php _e("Años de experiencia","mg-wp-job-offers"); ?>:</label>
			<input type="text" id="txtyearsexp" name="txtyearsexp" value="<?php echo $yearsexp; ?>">
		</div>

		<div class="mgjoform__row">
			<label for="txtexpdescription"><?php _e("Descripción de la experiencia","mg-wp-job-offers"); ?>:</label>
			<textarea id="txtexpdescription" name="txtexpdescription"><?php echo $expdescripciont; ?></textarea>
		</div>

		<div class="mgjoform__row">
			<label for="txtcv"><?php _e("CV","mg-wp-job-offers"); ?>:</label>
			<input type="file" id="txtcv" name="txtcv">
		</div>

		<?php
		// Todo: Si existen valores en la variable post, hacer un bucle para crear el formulario y pintar los valoes
		?>
		<div class="mgjoform__row">
			<label for="txtidioma_1"><?php _e("Idioma","mg-wp-job-offers"); ?>:</label>
			<input type="text" id="txtidioma_2" name="txtidioma_2">
			<input type="text" id="txtidioma_1" name="txtidioma_1">
		</div>

		<?php
		// Todo: Si existen valores en la variable post, hacer un bucle para crear el formulario y pintar los valoes
		?>
		<div class="mgjoform__row">
			<label for="txtit"><?php _e("Conocimientos informáticos","mg-wp-job-offers"); ?>:</label>
			<textarea id="txtit" name="txtit"></textarea>
		</div>

		<div class="mgjoform__row">
			<label for="txtdegree_1"><?php _e("Educación","mg-wp-job-offers"); ?>:</label>
			<input type="text" id="txtdegree_1" name="txtdegree_1">
			<input type="text" id="txtdegree_2" name="txtdegree_2">
		</div>

		<input type="hidden" name="action" value="newapplicant">

		<input type="submit" value="Enviar">
	</form>
	

	<?php
	$output = ob_get_contents();
	ob_end_clean();
	return $output;

}
add_shortcode( 'mgjoapplicantform', 'fn_mgjo_applicant_form' );


/**
 * This function renders the table with the Open Jobs
 */
function fn_xelio_open_jobs(){

	// Variables
	$output     = "";

	/*$args = array(
		'orderby'  => array( 'meta_value' => 'ASC', 'title' => 'ASC' ),
		'meta_key' => 'xep_country'
	);

	$projects   = \XEP\Service\Projects::getInstance()->get_all( $args );



	if( !empty( $projects ) ):

		$output .= '<table class="xepptbl">';
		$output .= '<tr>';
		$output .= '<th class="xepptbl__th">' . __("Nombre", "xelio-wp-projects") . '</th>';
		$output .= '<th class="xepptbl__th xepptbl__hidexs">' . __("Lugar", "xelio-wp-projects") . '</th>';
		$output .= '<th class="xepptbl__th xepptbl__hidexs">' . __("País", "xelio-wp-projects") . '</th>';
		$output .= '<th class="xepptbl__th xepptbl__hidexs xepptbl__tdright">' . __("Superficie", "xelio-wp-projects") . '</th>';
		$output .= '<th class="xepptbl__th xepptbl__tdright">' . __("Producción", "xelio-wp-projects") . '</th>';
		$output .= '<th class="xepptbl__th"></th>';
		$output .= '</tr>';

		foreach( $projects as $project ):

			$output .= '<tr>';
			$output .= '<td>' . $project->get_name() . '</td>';
			$output .= '<td class="xepptbl__hidexs">' . $project->get_city() . '</td>';
			$output .= '<td class="xepptbl__hidexs">' . $project->get_country() . '</td>';
			$output .= '<td class="xepptbl__hidexs xepptbl__tdright">' . $project->get_surface() . '</td>';
			$output .= '<td class="xepptbl__tdright">' . $project->get_annual_production() . 'MWh</td>';
			$output .= '<td class="xepptbl__tdright"><a href="' . $project->get_link() . '"><span class="icon-xe-plus-icon xepptbl__icon"></span></a></td>';

			$output .= '</tr>';

		endforeach;
		$output .= '</table>';

	endif;

	return $output;*/


}
add_shortcode('xelio-open-jobs', 'fn_xelio_open_jobs');