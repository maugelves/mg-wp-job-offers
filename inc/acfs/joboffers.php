<?php

if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array (
		'key' => 'group_5979d17e0f4ad',
		'title' => __('Trabajos', 'xelio-wp-projects'),
		'fields' => array (
			array (
				'key' => 'field_5979d19f45d37',
				'label' => __('Responsabilidades', MGJO_TDOMAIN),
				'name' => 'mgjo-responsibility',
				'type' => 'wysiwyg',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'tabs' => 'all',
				'toolbar' => 'full',
				'media_upload' => 0,
				'delay' => 0,
			),
			array (
				'key' => 'field_5979d1f445d38',
				'label' => __('Requisitos', MGJO_TDOMAIN),
				'name' => 'mgjo-requirements',
				'type' => 'wysiwyg',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'tabs' => 'all',
				'toolbar' => 'full',
				'media_upload' => 0,
				'delay' => 0,
			),
			array (
				'key' => 'field_5979d2bf8dd5f',
				'label' => __('Rango Salarial', MGJO_TDOMAIN),
				'name' => 'mgjo',
				'type' => 'group',
				'instructions' => __('Indique el rango salarial mínimo y máximo para el puesto de trabajo', MGJO_TDOMAIN),
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'table',
				'sub_fields' => array (
					array (
						'ID' => 132,
						'key' => 'field_5979d2da8dd60',
						'label' => __('Salario mínimo', MGJO_TDOMAIN),
						'name' => 'salary-min',
						'prefix' => 'acf',
						'type' => 'number',
						'value' => NULL,
						'menu_order' => 0,
						'instructions' => '',
						'required' => 0,
						'id' => '',
						'class' => '',
						'conditional_logic' => 0,
						'parent' => 131,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'_name' => 'salary-min',
						'_prepare' => 0,
						'_valid' => 1,
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'min' => '',
						'max' => '',
						'step' => '',
					),
					array (
						'ID' => 133,
						'key' => 'field_5979d3008dd61',
						'label' => __('Salario máximo', MGJO_TDOMAIN),
						'name' => 'salary-max',
						'prefix' => 'acf',
						'type' => 'number',
						'value' => NULL,
						'menu_order' => 1,
						'instructions' => '',
						'required' => 0,
						'id' => '',
						'class' => '',
						'conditional_logic' => 0,
						'parent' => 131,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'_name' => 'salary-max',
						'_prepare' => 0,
						'_valid' => 1,
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'min' => '',
						'max' => '',
						'step' => '',
					),
				),
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'joboffer',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => array (
			0 => 'permalink',
			1 => 'the_content',
			2 => 'excerpt',
			3 => 'custom_fields',
			4 => 'discussion',
			5 => 'comments',
			6 => 'revisions',
			7 => 'slug',
			8 => 'author',
			9 => 'format',
			10 => 'page_attributes',
			11 => 'categories',
			12 => 'tags',
			13 => 'send-trackbacks',
		),
		'active' => 1,
		'description' => '',
	));

endif;