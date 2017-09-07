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

	$openjobs = \MGJO\Service\OpenJobs::getInstance()->get_all( $args, true );



	if( !empty( $openjobs ) ):

		$output .= '<table class="mgjotbl">';
		$output .= '<tr>';
		$output .= '<th class="mgjotbl__th">' . __("Nombre del puesto", "xelio-wp-projects") . '</th>';
		$output .= '<th class="mgjotbl__th mgjotbl__visiblelg">' . __("Lugar", "xelio-wp-projects") . '</th>';
		$output .= '<th class="mgjotbl__th mgjotbl__hidexs">' . __("Experiencia", "xelio-wp-projects") . '</th>';
		$output .= '<th class="mgjotbl__th"></th>';
		$output .= '</tr>';

		foreach( $openjobs as $openjob ): /* @var $openjob \MGJO\models\OpenJob */

			// Variables
			$taxlevels      = wp_get_post_terms( $openjob->get_ID(), 'openjoblevel', ['fields' => 'names'] );
			$taxleves_str   = empty( $taxlevels ) ? "" : implode( ", ", $taxlevels );
			$link           = apply_filters( 'mgjo_joboffer_link', $openjob->get_link(), $openjob->get_ID() );


			$output .= '<tr onclick="window.location.href = \'' . $link . '\';">';
			$output .= '<td>' . $openjob->get_title() . '</td>';
			$output .= '<td class="mgjotbl__visiblelg">' . $openjob->get_place() . '</td>';
			$output .= '<td class="mgjotbl__hidexs">' . $taxleves_str . '</td>';
			$output .= '<td class="mgjotbl__tdright"><a href="' . $link . '"><span class="icon-xe-plus-icon mgjotbl__icon"></span></a></td>';
			$output .= '</tr>';

		endforeach;
		$output .= '</table>';

	endif;

	return $output;


}
add_shortcode('xelio-open-jobs', 'fn_xelio_open_jobs');