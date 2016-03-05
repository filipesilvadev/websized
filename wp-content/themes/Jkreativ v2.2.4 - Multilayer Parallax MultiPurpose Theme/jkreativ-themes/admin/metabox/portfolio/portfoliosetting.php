<?php

return array(
	'id'          => 'jkreativ_portfolio_setting',
	'types'       => array(JEG_PORTFOLIO_POST_TYPE),
	'title'       => 'Jkreativ Portfolio Setting',
	'priority'    => 'high',
	'context'     => 'side',
	'mode'			=> WPALCHEMY_MODE_EXTRACT,
	'template'    => array(
		array(
			'type'  => 'select',
			'name'  => 'portfolio_layout',
			'label' => 'Choose your portfolio layout (for single portfolio)',
			'default' => 'ajax',
			'allowsingle' => true,
			'items' => array(
				array(
					'value' => 'ajax',
					'label' => 'Ajax portfolio',
				),
				array(
					'value' => 'cover',
					'label' => 'Cover portfolio',
				),
				array(
					'value' => 'sidecontent',
					'label' => 'Side content portfolio',
				),
                array(
                    'value' => 'landingpage',
                    'label' => 'Extend portfolio - Legacy Section Builder',
                ),
                array(
                    'value' => 'landingpagevc',
                    'label' => 'Extend portfolio - Visual Composer',
                ),
                array(
                    'value' => 'anotherpage',
                    'label' => 'To another page (Link)',
                ),
			)
		),
		array(
			'type'  => 'select',
			'name'  => 'portfolio_parent',
			'label' => 'Choose your portfolio parent',
			'allowsingle' => true,
			'default' => '{{first}}',
			'items' => array(
				'data' => array(
					array(
						'source' => 'function',
						'value'  => 'jeg_get_portfolio_page',
					),
				),
			),
		),

		array(
			'type' => 'imageupload',
			'name' => 'coverimage',
			'label' => 'Image Cover',
		),

		array(
			'type'  => 'select',
			'name'  => 'coverwidth',
			'label' => 'Thumb Width',
			'default' => '1',
			'allowsingle' => true,
			'description' => 'Only if you are using normal mode on portfolio list',
			'items' => array(
				array(
					'value' => '0.25',
					'label' => '1/4x width',
				),
				array(
					'value' => '0.5',
					'label' => '1/2x width',
				),
				array(
					'value' => '1',
					'label' => '1x width',
				),
				array(
					'value' => '2',
					'label' => '2x width',
				),
				array(
					'value' => '3',
					'label' => '3x width',
				),
			)
		),


		array(
			'type'  => 'select',
			'name'  => 'coverheight',
			'label' => 'Thumb Height',
			'default' => '1',
			'allowsingle' => true,
			'description' => 'Only if you are using normal mode on portfolio list',
			'items' => array(
				array(
					'value' => '0.25',
					'label' => '1/4x height',
				),
				array(
					'value' => '0.5',
					'label' => '1/2x height',
				),
				array(
					'value' => '1',
					'label' => '1x height',
				),
				array(
					'value' => '2',
					'label' => '2x height',
				),
				array(
					'value' => '3',
					'label' => '3x height',
				),
			)
		),

		array(
			'type' => 'toggle',
			'name' => 'override_overlay',
			'label' => 'Override Overlay Color',
			'description' => 'only if you are using masonry & normal portfolio layout on page parent. this option will be ignored if you using pinterest layout',
		),

		array(
			'type'      => 'group',
			'repeating' => false,
			'length'    => 1,
			'name'      => 'portfolio_overlay',
			'title'     => 'Portfolio Overlay',
			'dependency' => array(
				'field'    => 'override_overlay',
				'function' => 'vp_dep_boolean',
			),
			'fields'    => array(
				array(
			        'type' => 'color',
			        'name' => 'color',
			        'label' => 'Overlay Color',
			        'description' => 'Portfolio Overlay Color',
			        'default' => 'rgba(0,0,0,0.6)',
			        'format' => 'rgba'
			    ),
				array(
					'type' => 'toggle',
					'name' => 'switch_text',
					'label' => 'Switch Text Color'
				),
			)
		),

	),
);