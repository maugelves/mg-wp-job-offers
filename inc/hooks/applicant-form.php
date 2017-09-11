<?php

use Carbon\Carbon;

/**
 * Funcion que captura los valores del
 * formulario de aplicantes
 */
function fn_newapplicant(){

	// Verify Nonce
	if( isset( $_POST['_wpnonce'] ) ) {

		if( !wp_verify_nonce( $_POST['_wpnonce'], 'newapplicantnone' ) ) return false;

	}
	else {
		return false;
	}

	// Variables
	$birthdate = false;

	// Check Name Field
	if( !isset( $_POST['txtname'] ) || empty( $_POST['txtname'] ) ) return false;

	// Check Email Field
	if( !isset( $_POST['txtemail'] )  || empty( $_POST['txtemail'] ) || !is_email( $_POST['txtemail'] ) ) return false;

	// Check Professiona Experience
	if( !isset( $_POST['txtdescription'] ) || empty( $_POST['txtdescription'] ) ) return false;

	// Check Birthdate
	if( isset( $_POST['txtbirthdate'] ) && !empty( $_POST['txtbirthdate'] ) ):

		// Check if birthdate is valid
		$birthdate = Carbon::createFromFormat( 'd/m/Y', $_POST['txtbirthdate'] );
		if( $birthdate === false ):
			return false;
		else:
			$birthdate = $birthdate->format('Ymd');
		endif;

	else:

		return false;

	endif;

	// If everything is OK save the JobApplicant post and its metadata
	$postarr = array(
		'post_title'        => sanitize_text_field( $_POST['txtname'] ),
		'post_status'       => 'publish',
		'post_type'         => 'jobapplicant',
		'comment_status'    => 'closed',
		'ping_status'       => 'closed',
		'tax_input'         => array()
	);

	$post_id = wp_insert_post( $postarr );

	// Check the applicant saving status
	if( is_wp_error( $post_id ) ) return false;

	// Save the metadata
	if( isset( $_POST['jobofferid'] ) ) update_field('mgjoapp-joboffer', sanitize_text_field( $_POST['jobofferid'] ), $post_id );               // Job Id
	update_field( 'mgjoapp-user_email', sanitize_email( $_POST['txtemail'] ), $post_id );                                                       // Email
	if( isset( $_POST['txtmobile'] ) ) update_field('mgjoapp-user_mobile', sanitize_text_field( $_POST['txtmobile'] ), $post_id);               // Mobile
	if( isset( $_POST['ddlgender'] ) ) update_field('mgjoapp-user_gender', sanitize_text_field( $_POST['ddlgender'] ), $post_id);               // Gender
	update_field('mgjoapp-user_birthdate', $birthdate, $post_id );                                                                            // Birthdate
	if( isset( $_POST['txtcity'] ) ) update_field('mgjoapp-address_city', sanitize_text_field( $_POST['txtcity'] ), $post_id );                 // City
	if( isset( $_POST['txtcountry'] ) ) update_field('mgjoapp-address_country', sanitize_text_field( $_POST['txtcountry'] ), $post_id );        // Country
	if( isset( $_POST['txtnationality'] ) ) update_field('mgjoapp-address_nationality', sanitize_text_field( $_POST['txtnationality'] ), $post_id );      // Nationality
	update_field('mgjoapp-years-of-experience', sanitize_text_field( $_POST['jobexperience'] ), $post_id );                                     // Job Experience
	if( isset( $_POST['txtdescription'] ) ) update_field('mgjoapp-experience-description', sanitize_text_field( $_POST['txtdescription'] ), $post_id );   // Job Experience Description
	if( isset( $_POST['mgjo-languages'] ) ) update_field('mgjoapp-languages', $_POST['mgjo-languages'], $post_id );      // Languages
	if( isset( $_POST['txtitknow'] ) ) update_field('mgjoapp-it', sanitize_text_field( $_POST['txtitknow'] ), $post_id );                       // IT Knowledge
	if( isset( $_POST['txteducation'] ) ) update_field('mgjoapp-degrees', sanitize_text_field( $_POST['txteducation'] ), $post_id );            // Education
	if( isset( $_POST['ddlmovility'] ) ) update_field('mgjoapp-movility', sanitize_text_field( $_POST['ddlmovility'] ), $post_id );            // Movility

	// Redirect the user to the same page with a Query String with Succes or Error
	$redirect = add_query_arg( 'success', '1', $_SERVER['HTTP_REFERER'] );
	wp_redirect( $redirect . ";#mgform" ); exit;

}
add_action('admin_post_nopriv_newapplicant', 'fn_newapplicant'); // Para usuarios no logueados
add_action('admin_post_newapplicant', 'fn_newapplicant'); // Para usuarios logueados