<?php

namespace MGJO\cpts;

class JobOffers
{
	/**
	 * Personal constructor.
	 */
	public function __construct() {

		if( !taxonomy_exists('jobexperience') )
			add_action( 'init', array( $this, 'create_tax_expertise' ), 10 );

		register_activation_hook( MGJO_FILE, array( $this, 'create_level_terms' ) );

		add_action( 'init', array( $this, 'create_cpt_joboffer' ), 11 );

		add_filter( 'enter_title_here', array( $this, 'change_title_placeholder' ) );

		add_filter( 'post_updated_messages', array($this, 'updated_messages_cb' ) );

	}

	/**
	 *  Change the Post Title placeholder
	 *  @param $title
	 *
	 *  @return string
	 */
	public function change_title_placeholder( $title ) {
		$screen = get_current_screen();

		if  ( 'joboffer' == $screen->post_type )
			$title = __('Especifica el título del trabajo', MGJO_TDOMAIN );


		return $title;
	}


	/**
	 * Create Level Hierarchichal taxonomy
	 */
	public function create_tax_expertise(){

		$args = array(
			'label'         => __('Experiencias', MGJO_TDOMAIN),
			'labels'        => array(
								'name'                          => __('Experiencias', MGJO_TDOMAIN),
								'singular_name'                 => __('Experiencia', MGJO_TDOMAIN),
								'all_items'                     => __('Todas las experiencias', MGJO_TDOMAIN),
								'edit_item'                     => __('Editar experiencia', MGJO_TDOMAIN),
								'view_item'                     => __('Ver experiencia', MGJO_TDOMAIN),
								'update_item'                   => __('Actualizar experiencia', MGJO_TDOMAIN),
								'add_new_item'                  => __('Agregar nueva experiencia', MGJO_TDOMAIN),
								'new_item_name'                 => __('Nueva experiencia', MGJO_TDOMAIN),
								'search_items'                  => __('Buscar experiencias', MGJO_TDOMAIN),
								'separate_items_with_commas'    => __('Separar experiencias por coma', MGJO_TDOMAIN),
								'add_or_remove_items'           => __('Agregar o quitar experiencias', MGJO_TDOMAIN),
								'not_found'                     => __('Experiencia no encontrada', MGJO_TDOMAIN)
							),
			'hierarchical'  => true
		);

		register_taxonomy( 'jobexperience', 'joboffer', $args );

	}


	/**
	 * Create terms for jobexperience taxonomy
	 */
	public function create_level_terms(){

		if( !taxonomy_exists('jobexperience') )
			$this->create_tax_expertise();

		if( !term_exists('Con experiencia', 'jobexperience' ) )
			wp_insert_term('Con experiencia', 'jobexperience');
		if( !term_exists('Recién licenciados', 'jobexperience' ) )
			wp_insert_term('Recién licenciados', 'jobexperience');
		if( !term_exists('Becarios', 'jobexperience' ) )
			wp_insert_term('Becarios', 'jobexperience');

	}


	/**
	 * This function creates the CPT JobOffer/Trabajo
	 */
	public function create_cpt_joboffer() {

		$args = array(
			'label'                 => __( 'Trabajos', MGJO_TDOMAIN ),
			'labels'                => array (

				// Labels values
				'name'                  => __( 'Trabajos', MGJO_TDOMAIN ),
				'singular'              => __( 'Trabajo', MGJO_TDOMAIN ),
				'add_new'               => __( 'Agregar un trabajo', MGJO_TDOMAIN ),
				'add_new_item'          => __( 'Agregar un trabajo', MGJO_TDOMAIN ),
				'edit_item'             => __( 'Editar trabajo', MGJO_TDOMAIN ),
				'new_item'              => __( 'Nuevo trabajo', MGJO_TDOMAIN ),
				'view_item'             => __( 'Ver trabajo', MGJO_TDOMAIN ),
				'view_items'            => __( 'Ver trabajos', MGJO_TDOMAIN ),
				'search_items'          => __( 'Buscar trabajos', MGJO_TDOMAIN ),
				'not_found'             => __( 'No se encontraron trabajos', MGJO_TDOMAIN ),
				'not_found_in_trash'    => __( 'No hay registros eliminados', MGJO_TDOMAIN ),
				'all_items'             => __( 'Todos los trabajos', MGJO_TDOMAIN ),
				'archives'              => __( 'Trabajos', MGJO_TDOMAIN )

			),
			'public'                => true,
			'exclude_from_search'   => true,
			'show_ui'               => true,
			'menu_position'         => 19,
			'menu_icon'             => MGJO_URL . '/assets/img/joboffer-icon.png',
			'supports'              => array( 'title', 'thumbnail' ),
			'has_archive'           => true,
			'capability_type'       => 'joboffer',
			'mat_meta_cap'          => true,
			'taxonomies'            => array('jobexperience')
		);


		register_post_type( 'joboffer', $args );

	}






	/**
	 * Customized messages for Sponsor Custom Post Type
	 *
	 * @param   array $messages Default messages.
	 * @return  array 			Returns an array with the new messages
	 */
	public function updated_messages_cb( $messages ) {

		$messages['joboffer'] = array(
			0  => '', // Unused. Messages start at index 1.
			1 => __( 'Trabajo actualizado.', MGJO_TDOMAIN ),
			4 => __( 'Trabajo actualizado.', MGJO_TDOMAIN ),
			/* translators: %s: date and time of the revision */
			5 => isset( $_GET['revision']) ? sprintf( __( 'Trabajo recuperado de la revisión %s.', MGJO_TDOMAIN ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			6 => __( 'Trabajo publicado.', MGJO_TDOMAIN ),
			7 => __( 'Trabajo guardado.', MGJO_TDOMAIN ),
			9 => __('Trabajo programador', MGJO_TDOMAIN ),
			10 => __( 'Borrador de trabajo actualizado.', MGJO_TDOMAIN ),
		);

		return $messages;
	}

}
$joboffer = new JobOffers();