<?php

/**
 * This function renders the table with the Open Jobs
 */
function fn_xelio_open_jobs(){

	// Variables
	$output     = "";

	$args = array(
		'orderby'  => array( 'meta_value' => 'ASC', 'title' => 'ASC' ),
		'meta_key' => 'mgjo-place'
	);

	$openjobs = OpenJobs::getInstance()->get_all( $args, true );



	if( !empty( $openjobs ) ):

		$output .= '<table class="mgjotbl">';
		$output .= '<tr>';
		$output .= '<th class="mgjotbl__th">' . __("Nombre del puesto", "xelio-wp-projects") . '</th>';
		$output .= '<th class="mgjotbl__th mgjotbl__hidexs">' . __("Lugar", "xelio-wp-projects") . '</th>';
		$output .= '<th>' . __("Experiencia", "xelio-wp-projects") . '</th>';
		$output .= '<th class="mgjotbl__th"></th>';
		$output .= '</tr>';

		foreach( $openjobs as $openjob ): /* @var $openjob \MGJO\models\OpenJob */

			// Variables
			$taxlevels = wp_get_post_terms( $openjob->get_ID(), 'openjoblevel', ['fields' => 'names'] );
			$taxleves_str = empty( $taxlevels ) ? "" : implode( ", ", $taxlevels );

			$output .= '<tr>';
			$output .= '<td>' . $openjob->get_title() . '</td>';
			$output .= '<td class="mgjotbl__hidexs">' . $openjob->get_place() . '</td>';
			$output .= '<td>' . $taxleves_str . '</td>';
			$output .= '<td class="mgjotbl__tdright"><a href="' . $openjob->get_link() . '"><span class="icon-xe-plus-icon xepptbl__icon"></span></a></td>';
			$output .= '</tr>';

		endforeach;
		$output .= '</table>';

	endif;

	return $output;


}
add_shortcode('xelio-open-jobs', 'fn_xelio_open_jobs');