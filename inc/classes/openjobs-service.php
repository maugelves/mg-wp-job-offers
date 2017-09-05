<?php

use MGJO\models\OpenJob;
use MGJO\Helpers;

class OpenJobs extends Helpers\Singleton {

	/**
	 * Create a OpenJob entity from a WP_Post instance
	 *
	 * @author  Mauricio Gelves <mg@maugeles.com>
	 * @param   \WP_Post $post
	 * @param   $fill_fields    bool    if true the function fills all the object fields
	 * @return  OpenJob
	 * @since   1.0
	 */
	public function get_openjob_from_post( \WP_Post $post, $fill_fields = true ) {

		// Variable
		$openjob       = new OpenJob();

		// Set Values
		$openjob->set_ID( $post->ID );
		$openjob->set_title( $post->post_title );
		$openjob->set_link( get_permalink( $openjob->get_ID() ) );

		// Should the function complete the rest of the fields
		if( $fill_fields ):

			$openjob_meta  = get_fields( $post->ID );

			if( !empty( $openjob_meta['mgjo-place'] ) ) $openjob->set_place( esc_html( $openjob_meta['mgjo-place'] ) );
			if( !empty( $openjob_meta['mgjo-responsibility'] ) ) $openjob->set_responsabilities( $openjob_meta['mgjo-responsibility'] );
			if( !empty( $openjob_meta['mgjo-requirements'] ) ) $openjob->set_requirements( $openjob_meta['mgjo-requirements'] ) ;
			if( !empty( $openjob_meta['mgjo-salary-min'] ) ) $openjob->set_salarymin( esc_html( $openjob_meta['mgjo-salary-min'] ) );
			if( !empty( $openjob_meta['mgjo-salary-max'] ) ) $openjob->set_salarymin( esc_html( $openjob_meta['mgjo-salary-max'] ) );


		endif;

		return $openjob;

	}



	/**
	 * Return all the available OpenJobs
	 *
	 * @author  Mauricio Gelves <mg@maugelves.com>
	 * @param   $args   array
	 * @param   $fill_fields    bool    if true the function fills all the object fields
	 * @return  array   Array of OpenJob Objects
	 */
	public function get_all( $args = null, $fill_fields = true ) {

		// Variables
		$openjobs = array();

		// Parse Args
		$args = wp_parse_args( $args, array(
			'posts_per_page' => 10,
			'posts_per_archive_page' => 10
		));

		// Add basic filter
		$args['post_type']      = 'joboffer';
		$args['post_status']    = 'publish';

		// Execute the Query
		$query = new \WP_Query( $args );

		if( $query->have_posts() ):

			while( $query->have_posts() ): $query->the_post();

				$openjob = $this->get_openjob_from_post( $query->post, $fill_fields );
				array_push( $openjobs, $openjob );

			endwhile;

		endif;

		return $openjobs;

	}

}