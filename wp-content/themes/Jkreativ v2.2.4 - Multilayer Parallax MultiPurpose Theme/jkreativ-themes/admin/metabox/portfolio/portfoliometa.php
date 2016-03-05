<?php

return array(
	'id'          => 'jkreativ_portfolio_meta',
	'types'       => array(JEG_PORTFOLIO_POST_TYPE),
	'title'       => 'Jkreativ Portfolio Meta',
	'priority'    => 'high',
	'template'    => array(

		array(
			'type'      => 'group',
			'repeating' => true,
			'sortable'  => true,
			'length'    => 1,
			'name'      => 'portfolio_meta',
			'title'     => 'Portfolio meta',
			'fields'    => array(
				array(
					'type' => 'textbox',
					'name' => 'meta_title',
					'label' => 'Meta Title',
				),
				array(
					'type' => 'textbox',
					'name' => 'meta_content',
					'label' => 'Meta Content',
				),
				array(
					'type' => 'textbox',
					'name' => 'meta_content_url',
					'label' => 'Meta Content Link',
					'description' => 'leave empty if you don\'t have link to this portfolio meta',
				),
			),
		),

		array(
			'type' => 'toggle',
			'name' => 'enable_project_link',
			'label' => 'Enable Project Link',
			'description' => 'show or enabling project link',
		),

		array(
			'type'      => 'group',
			'repeating' => false,
			'length'    => 1,
			'name'      => 'project_link',
			'title'     => 'Project Link',
			'dependency' => array(
				'field'    => 'enable_project_link',
				'function' => 'vp_dep_boolean',
			),
			'fields'    => array(
				array(
					'type' => 'textbox',
					'name' => 'title',
					'label' => 'Portfolio Link Title',
				),
				array(
					'type' => 'textbox',
					'name' => 'content',
					'label' => 'Portfolio Link Content',
				),
				array(
					'type' => 'textbox',
					'name' => 'url',
					'label' => 'Portfolio link Content URL',
				),
			),
		),


	),
);