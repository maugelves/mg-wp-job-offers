<?php

namespace MGJO\cpts;

class JobOffers
{
	/**
	 * Personal constructor.
	 */
	public function __construct() {

		add_action( 'init', array( $this, 'create_cpt_joboffer' ), 11 );

		add_filter( 'enter_title_here', array( $this, 'change_title_placeholder' ) );

		add_filter( 'post_updated_messages', array($this, 'updated_messages_cb' ) );

		if( !taxonomy_exists('openjoblevel') )
			add_action( 'init', array( $this, 'create_tax_openjoblevel' ), 10 );

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
	function create_tax_openjoblevel() {
		$args = array(
			'label'         => __('Nivel de Experiencia', MGJO_TDOMAIN),
			'labels'        => array(
				'name'                          => __('Nivel', MGJO_TDOMAIN),
				'singular_name'                 => __('Nivel', MGJO_TDOMAIN),
				'all_items'                     => __('Todas las niveles', MGJO_TDOMAIN),
				'edit_item'                     => __('Editar nivel', MGJO_TDOMAIN),
				'view_item'                     => __('Ver nivel', MGJO_TDOMAIN),
				'update_item'                   => __('Actualizar nivel', MGJO_TDOMAIN),
				'add_new_item'                  => __('Agregar nuevo nivel', MGJO_TDOMAIN),
				'new_item_name'                 => __('Nueva nivel', MGJO_TDOMAIN),
				'search_items'                  => __('Buscar niveles', MGJO_TDOMAIN),
				'separate_items_with_commas'    => __('Separar niveles por coma', MGJO_TDOMAIN),
				'add_or_remove_items'           => __('Agregar o quitar niveles', MGJO_TDOMAIN),
				'not_found'                     => __('Nivel no encontrado', MGJO_TDOMAIN)
			),
			'hierarchical'  => true
		);

		register_taxonomy( 'openjoblevel', 'joboffer', $args );
	}





	/**
	 * This function creates the CPT JobOffer/Trabajo
	 */
	public function create_cpt_joboffer() {

		$capabilities = array(
			'edit_post'             => 'edit_joboffer',
			'edit_posts'            => 'edit_joboffers',
			'edit_others_posts'     => 'edit_others_joboffers',
			'read_post'             => 'read_joboffer',
			'delete_post'           => 'delete_joboffers',
			'delete_posts'          => 'delete_joboffers',
			'publish_posts'         => 'publish_joboffers',
			'read_private_posts'    => 'read_private_joboffers',
		);

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
			'supports'              => array( 'title' ),
			'has_archive'           => true,
			'capabilities'          => $capabilities,
			'mat_meta_cap'          => true,
			'taxonomies'            => array('openjoblevel')
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