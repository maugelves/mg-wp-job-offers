<?php
/*
 * Register the JS scripts
 */
function mgjo_site_scripts() {

	// REGISTER
	wp_register_script('mgjo-form-validation', MGJO_URL . '/assets/js/form-validation.js' , array('jquery'),'',true);


	// ENQUEUE
	wp_enqueue_script('mgjo-form-validation');


}
add_action( 'wp_enqueue_scripts', 'mgjo_site_scripts' );