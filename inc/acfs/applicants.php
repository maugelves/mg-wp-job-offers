<?php

if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array (
		'key' => 'group_597af78def82c',
		'title' => __('Applicants', MGJO_TDOMAIN),
		'fields' => array (
			array (
				'key' => 'field_597af823a02b4',
				'label' => __('Datos personales', MGJO_TDOMAIN),
				'name' => '',
				'type' => 'tab',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'placement' => 'top',
				'endpoint' => 0,
			),
			array (
				'key' => 'field_597b08a55102a',
				'label' => __('Oferta de trabajo', MGJO_TDOMAIN),
				'name' => 'mgjoapp-joboffer',
				'type' => 'post_object',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '40',
					'class' => '',
					'id' => '',
				),
				'post_type' => array (
					0 => 'joboffer',
				),
				'taxonomy' => array (
				),
				'allow_null' => 0,
				'multiple' => 0,
				'return_format' => 'object',
				'ui' => 1,
			),
			array (
				'key' => 'field_597af834a02b5',
				'label' => __('Nombre Completo', MGJO_TDOMAIN),
				'name' => 'mgjoapp',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'block',
				'sub_fields' => array (
					array (
						'ID' => 169,
						'key' => 'field_597af8e8a02b6',
						'label' => __('Nombre', MGJO_TDOMAIN),
						'name' => 'name',
						'prefix' => 'acf',
						'type' => 'text',
						'value' => NULL,
						'menu_order' => 0,
						'instructions' => '',
						'required' => 0,
						'id' => '',
						'class' => '',
						'conditional_logic' => 0,
						'parent' => 168,
						'wrapper' => array (
							'width' => '33',
							'class' => '',
							'id' => '',
						),
						'_name' => 'name',
						'_prepare' => 0,
						'_valid' => 1,
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
					array (
						'ID' => 170,
						'key' => 'field_597af8f2a02b7',
						'label' => __('Apellido', MGJO_TDOMAIN),
						'name' => 'lastname',
						'prefix' => 'acf',
						'type' => 'text',
						'value' => NULL,
						'menu_order' => 1,
						'instructions' => '',
						'required' => 0,
						'id' => '',
						'class' => '',
						'conditional_logic' => 0,
						'parent' => 168,
						'wrapper' => array (
							'width' => '33',
							'class' => '',
							'id' => '',
						),
						'_name' => 'lastname',
						'_prepare' => 0,
						'_valid' => 1,
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
					array (
						'ID' => 173,
						'key' => 'field_597af9b3a02ba',
						'label' => __('Email', MGJO_TDOMAIN),
						'name' => 'email',
						'prefix' => 'acf',
						'type' => 'email',
						'value' => NULL,
						'menu_order' => 2,
						'instructions' => '',
						'required' => 0,
						'id' => '',
						'class' => '',
						'conditional_logic' => 0,
						'parent' => 168,
						'wrapper' => array (
							'width' => '33',
							'class' => '',
							'id' => '',
						),
						'_name' => 'email',
						'_prepare' => 0,
						'_valid' => 1,
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
					array (
						'ID' => 177,
						'key' => 'field_597afa6ea02be',
						'label' => __('Número de móvil', MGJO_TDOMAIN),
						'name' => 'mobile',
						'prefix' => 'acf',
						'type' => 'text',
						'value' => NULL,
						'menu_order' => 3,
						'instructions' => '',
						'required' => 0,
						'id' => '',
						'class' => '',
						'conditional_logic' => 0,
						'parent' => 168,
						'wrapper' => array (
							'width' => '33',
							'class' => '',
							'id' => '',
						),
						'_name' => 'mobile',
						'_prepare' => 0,
						'_valid' => 1,
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
					array (
						'ID' => 175,
						'key' => 'field_597afa07a02bc',
						'label' => __('Sexo', MGJO_TDOMAIN),
						'name' => 'gender',
						'prefix' => 'acf',
						'type' => 'select',
						'value' => NULL,
						'menu_order' => 4,
						'instructions' => '',
						'required' => 0,
						'id' => '',
						'class' => '',
						'conditional_logic' => 0,
						'parent' => 168,
						'wrapper' => array (
							'width' => '33',
							'class' => '',
							'id' => '',
						),
						'_name' => 'gender',
						'_prepare' => 0,
						'_valid' => 1,
						'choices' => array (
							1 => __('Masculino', MGJO_TDOMAIN),
							2 => __('Femenino', MGJO_TDOMAIN),
						),
						'default_value' => array (
							0 => 1,
						),
						'allow_null' => 0,
						'multiple' => 0,
						'ui' => 0,
						'ajax' => 0,
						'return_format' => 'value',
						'placeholder' => '',
					),
					array (
						'ID' => 176,
						'key' => 'field_597afa50a02bd',
						'label' => __('Fecha de nacimiento', MGJO_TDOMAIN),
						'name' => 'birthdate',
						'prefix' => 'acf',
						'type' => 'date_picker',
						'value' => NULL,
						'menu_order' => 5,
						'instructions' => '',
						'required' => 0,
						'id' => '',
						'class' => '',
						'conditional_logic' => 0,
						'parent' => 168,
						'wrapper' => array (
							'width' => '33',
							'class' => '',
							'id' => '',
						),
						'_name' => 'birthdate',
						'_prepare' => 0,
						'_valid' => 1,
						'display_format' => 'd/m/Y',
						'return_format' => 'd/m/Y',
						'first_day' => 1,
					),
				),
			),
			array (
				'key' => 'field_597b028befcbe',
				'label' => __('Dirección', MGJO_TDOMAIN),
				'name' => 'mgjoapp',
				'type' => 'group',
				'instructions' => '',
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
						'ID' => 210,
						'key' => 'field_597b02b6efcbf',
						'label' => __('País de residencia', MGJO_TDOMAIN),
						'name' => 'country',
						'prefix' => 'acf',
						'type' => 'text',
						'value' => NULL,
						'menu_order' => 0,
						'instructions' => '',
						'required' => 0,
						'id' => '',
						'class' => '',
						'conditional_logic' => 0,
						'parent' => 209,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'_name' => 'country',
						'_prepare' => 0,
						'_valid' => 1,
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
					array (
						'ID' => 211,
						'key' => 'field_597b02c3efcc0',
						'label' => __('Ciudad', MGJO_TDOMAIN),
						'name' => 'city',
						'prefix' => 'acf',
						'type' => 'text',
						'value' => NULL,
						'menu_order' => 1,
						'instructions' => '',
						'required' => 0,
						'id' => '',
						'class' => '',
						'conditional_logic' => 0,
						'parent' => 209,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'_name' => 'city',
						'_prepare' => 0,
						'_valid' => 1,
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
					array (
						'ID' => 212,
						'key' => 'field_597b02daefcc1',
						'label' => __('Nacionalidad', MGJO_TDOMAIN),
						'name' => 'nationality',
						'prefix' => 'acf',
						'type' => 'text',
						'value' => NULL,
						'menu_order' => 2,
						'instructions' => '',
						'required' => 0,
						'id' => '',
						'class' => '',
						'conditional_logic' => 0,
						'parent' => 209,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'_name' => 'nationality',
						'_prepare' => 0,
						'_valid' => 1,
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
					array (
						'ID' => 213,
						'key' => 'field_597b02f3efcc2',
						'label' => __('Movilidad Geográfica', MGJO_TDOMAIN),
						'name' => 'geographical-mobility',
						'prefix' => 'acf',
						'type' => 'true_false',
						'value' => NULL,
						'menu_order' => 3,
						'instructions' => '',
						'required' => 0,
						'id' => '',
						'class' => '',
						'conditional_logic' => 0,
						'parent' => 209,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'_name' => 'geographical-mobility',
						'_prepare' => 0,
						'_valid' => 1,
						'message' => '',
						'default_value' => 0,
						'ui' => 0,
						'ui_on_text' => '',
						'ui_off_text' => '',
					),
				),
			),
			array (
				'key' => 'field_597afa97a02bf',
				'label' => __('Experiencia', MGJO_TDOMAIN),
				'name' => '',
				'type' => 'tab',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'placement' => 'top',
				'endpoint' => 0,
			),
			array (
				'key' => 'field_597afaf8a02c1',
				'label' => __('Años de experiencia', MGJO_TDOMAIN),
				'name' => 'mgjoapp-years-of-experience',
				'type' => 'number',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '20',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array (
				'key' => 'field_597afb10a02c2',
				'label' => __('Descripción de experiencia', MGJO_TDOMAIN),
				'name' => 'mgjoapp-experience-description',
				'type' => 'textarea',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '100',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => 5,
				'new_lines' => '',
			),
			array (
				'key' => 'field_597b093939367',
				'label' => __('CV', MGJO_TDOMAIN),
				'name' => 'mgjoapp-cv',
				'type' => 'file',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'url',
				'library' => 'all',
				'min_size' => '',
				'max_size' => '',
				'mime_types' => '',
			),
			array (
				'key' => 'field_597afc5ea02c3',
				'label' => __('Conocimientos', MGJO_TDOMAIN),
				'name' => '',
				'type' => 'tab',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'placement' => 'top',
				'endpoint' => 0,
			),
			array (
				'key' => 'field_597afc72a02c4',
				'label' => __('Idiomas', MGJO_TDOMAIN),
				'name' => 'mgjoapp-languages',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'collapsed' => 'field_597afc84a02c5',
				'min' => 0,
				'max' => 0,
				'layout' => 'table',
				'button_label' => __('Agregar idioma', MGJO_TDOMAIN),
				'sub_fields' => array (
					array (
						'key' => 'field_597afc84a02c5',
						'label' => __('Idioma', MGJO_TDOMAIN),
						'name' => 'mgjoapp-language',
						'type' => 'select',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array (
							1 => __('English', MGJO_TDOMAIN),
							2 => __('Español', MGJO_TDOMAIN),
							3 => __('中文', MGJO_TDOMAIN),
							4 => __('Français', MGJO_TDOMAIN),
							5 => __('العربية', MGJO_TDOMAIN),
							6 => __('Русский', MGJO_TDOMAIN),
							7 => __('Deutsch', MGJO_TDOMAIN),
							8 => __('にほんご', MGJO_TDOMAIN),
							9 => __('Português', MGJO_TDOMAIN),
							10 => __('Italiano', MGJO_TDOMAIN),
						),
						'default_value' => array (
							0 => 2,
						),
						'allow_null' => 0,
						'multiple' => 0,
						'ui' => 0,
						'ajax' => 0,
						'return_format' => 'value',
						'placeholder' => '',
					),
					array (
						'key' => 'field_597afdd2a02c6',
						'label' => __('Nivel', MGJO_TDOMAIN),
						'name' => 'mgjoapp-level',
						'type' => 'select',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array (
							1 => __('Nativo', MGJO_TDOMAIN),
							2 => __('Avanzado', MGJO_TDOMAIN),
							3 => __('Intermedio', MGJO_TDOMAIN),
							4 => __('Básico', MGJO_TDOMAIN),
						),
						'default_value' => array (
						),
						'allow_null' => 0,
						'multiple' => 0,
						'ui' => 0,
						'ajax' => 0,
						'return_format' => 'value',
						'placeholder' => '',
					),
				),
			),
			array (
				'key' => 'field_597afed8a02c7',
				'label' => __('Conocimientos informáticos', MGJO_TDOMAIN),
				'name' => 'mgjoapp-it',
				'type' => 'textarea',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'new_lines' => '',
			),
			array (
				'key' => 'field_597affb5a02c9',
				'label' => __('Educación', MGJO_TDOMAIN),
				'name' => '',
				'type' => 'tab',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'placement' => 'top',
				'endpoint' => 0,
			),
			array (
				'key' => 'field_597b0082a02ca',
				'label' => __('Títulos', MGJO_TDOMAIN),
				'name' => 'mgjoapp-degrees',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'collapsed' => 'field_597b0102a02cc',
				'min' => 0,
				'max' => 0,
				'layout' => 'table',
				'button_label' => __('Agregar título', MGJO_TDOMAIN),
				'sub_fields' => array (
					array (
						'key' => 'field_597b00d1a02cb',
						'label' => __('Centro Educativo', MGJO_TDOMAIN),
						'name' => 'mgjoapp-educenter',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
					array (
						'key' => 'field_597b0102a02cc',
						'label' => __('Título Académico', MGJO_TDOMAIN),
						'name' => 'mgjoapp-degree',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
				),
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'jobapplicant',
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
			11 => 'featured_image',
			12 => 'categories',
			13 => 'tags',
			14 => 'send-trackbacks',
		),
		'active' => 1,
		'description' => '',
	));

endif;