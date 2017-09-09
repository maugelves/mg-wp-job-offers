<?php

function get_terms_chekboxes($taxonomies, $args) {
	// Variables
	$output = "";

	$terms = get_terms($taxonomies, $args);

	foreach( $terms as $term ):

		$output .= '<input type="checkbox" id="'.$term->slug.'" name="'.$term->taxonomy.'" value="'.$term->slug.'"><label for="'.$term->slug.'">'.$term->name.'</label>';

	endforeach;

	return $output;

}