<?php

namespace MGJO\cpts;

class JobApplicants
{
	/**
	 * Personal constructor.
	 */
	public function __construct() {

		add_action( 'init', array( $this, 'create_cpt_applicants' ), 12 );

		add_action('admin_menu', array($this, 'add_applicants_menu_link') );

		add_filter( 'post_updated_messages', array($this, 'updated_messages_cb' ) );

	}



	function add_applicants_menu_link() {
		global $submenu;
		$permalink  = admin_url() . 'edit.php?post_type=jobapplicant';
		$submenu['edit.php?post_type=joboffer'][] = array( __('Postulantes', MGJO_TDOMAIN ), 'edit_applicant', $permalink );
	}


	/**
	 * This function creates the CPT Applicant/Postulantes
	 */
	public function create_cpt_applicants() {

		$labels = array(
			'name'                  => _x( 'Postulantes', 'Post Type General Name', MGJO_TDOMAIN ),
			'singular_name'         => _x( 'Postulante', 'Post Type Singular Name', MGJO_TDOMAIN ),
			'menu_name'             => __( 'Postulantes', MGJO_TDOMAIN ),
			'name_admin_bar'        => __( 'Postulantes', MGJO_TDOMAIN ),
			'archives'              => __( 'Postulantes', MGJO_TDOMAIN ),
			'attributes'            => __( 'Item Attributes', MGJO_TDOMAIN ),
			'parent_item_colon'     => __( 'Parent Item:', MGJO_TDOMAIN ),
			'all_items'             => __( 'Todos los postulantes', MGJO_TDOMAIN ),
			'add_new_item'          => __( 'Agregar nuevo postulante', MGJO_TDOMAIN ),
			'add_new'               => __( 'Agregar nuevo', MGJO_TDOMAIN ),
			'new_item'              => __( 'Nuevo Postulante', MGJO_TDOMAIN ),
			'edit_item'             => __( 'Editar Postulante', MGJO_TDOMAIN ),
			'update_item'           => __( 'Actualizar Postulante', MGJO_TDOMAIN ),
			'view_item'             => __( 'Ver Postulante', MGJO_TDOMAIN ),
			'view_items'            => __( 'Ver Postulantes', MGJO_TDOMAIN ),
			'search_items'          => __( 'Buscar Postulantes', MGJO_TDOMAIN ),
			'not_found'             => __( 'No encontrado', MGJO_TDOMAIN ),
			'not_found_in_trash'    => __( 'No encontrado en la papelera', MGJO_TDOMAIN )
		);
		$rewrite = array(
			'slug'                  => 'applicant',
			'with_front'            => true,
			'pages'                 => true,
			'feeds'                 => true,
		);
		$capabilities = array(
			'create_posts'          => 'create_applicants',
			'edit_post'             => 'edit_applicant',
			'edit_posts'            => 'edit_applicants',
			'edit_others_posts'     => 'edit_others_applicants',
			'read_post'             => 'read_applicant',
			'delete_post'           => 'delete_applicants',
			'delete_posts'          => 'delete_applicants',
			'publish_posts'         => 'publish_applicants',
			'read_private_posts'    => 'read_private_applicants',
		);
		$args = array(
			'label'                 => __( 'Postulantes', MGJO_TDOMAIN ),
			'labels'                => $labels,
			'supports'              => array('title'),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => false,
			'menu_position'         => 20,
			'menu_icon'             => 'dashicons-welcome-learn-more',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'rewrite'               => $rewrite,
			'capabilities'          => $capabilities,
		);

		register_post_type( 'jobapplicant', $args );

	}



	/**
	 * Customized messages for Sponsor Custom Post Type
	 *
	 * @param   array $messages Default messages.
	 * @return  array 			Returns an array with the new messages
	 */
	public function updated_messages_cb( $messages ) {

		$messages['<CPT Name>'] = array(
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
$jobapplicant = new JobApplicants();