<?php

return array(
	'id'          => 'jkreativ_general',
	'types'       => array('post', 'page', JEG_PORTFOLIO_POST_TYPE, 'product'),
	'title'       => 'Jkreativ General Option',
	'priority'    => 'low',
	'context'     => 'side',
	'template'    => array(

		array(
			'type' => 'toggle',
			'name' => 'override_navigation',
			'label' => 'Override Default Navigation Setup',
			'description' => 'if you want this page having different kind of navigation, you can check this option',
		),

		array(
			'type'      => 'group',
			'repeating' => false,
			'length'    => 1,
			'name'      => 'override_navigation_group',
			'title'     => 'Override Navigation Position',
			'dependency' => array(
				'field'    => 'override_navigation',
				'function' => 'vp_dep_boolean',
			),
			'fields'    => array(
				array (
					'type' => 'radiobutton',
					'name' => 'navigation_position',
					'label' => 'Navigation Position',
					'items' => array(
						array(
							'value' => 'side',
							'label' => 'Side Navigation',
						),
						array(
							'value' => 'top',
							'label' => 'Top Navigation',
						),
                        array(
                            'value' => 'transparent',
                            'label' => 'Transparent Navigation'
                        ),
					),
				),

                /* side content */
				array(
					'type' => 'toggle',
					'name' => 'default_collapse_navigator',
					'label' => 'Collapse Navigator',
					'default' => '0',
					'dependency' => array(
						'field' => 'navigation_position',
						'function' => 'jeg_plugin_check_navigation_value',
					),
				),

				array(
					'type' => 'toggle',
					'name' => 'default_menuheader_navigator',
					'label' => 'Show top menu navigator',
					'default' => '1',
					'dependency' => array(
						'field' => 'navigation_position',
						'function' => 'jeg_plugin_check_navigation_value',
			    	),
				),

                /* top content */
				array(
					'type' => 'toggle',
					'name' => 'centering_top_navigator',
					'label' => 'Put Navigator on narrow size',
					'description' => 'disable wide navigation, but use narrow instead',
					'default' => '0',
					'dependency' => array(
						'field' => 'navigation_position',
						'function' => 'jeg_check_navigation_top_value',
					),
				),
				array(
					'type' => 'toggle',
					'name' => 'twoline_top_navigator',
					'label' => 'Use two line top navigation instead of one line',
					'description' => '',
					'default' => '0',
					'dependency' => array(
						'field' => 'navigation_position',
						'function' => 'jeg_check_navigation_top_value',
			    	),
				),
				array(
					'type' => 'toggle',
					'name' => 'smaller_navigator',
					'label' => 'Make menu smaller when scrolling',
					'description' => '',
					'default' => '0',
					'dependency' => array(
						'field' => 'navigation_position',
						'function' => 'jeg_check_navigation_top_value',
			    	),
				),
                array(
                    'type' => 'toggle',
                    'name' => 'boxed_content',
                    'label' => 'Boxed Content',
                    'description' => '',
                    'default' => '0',
                    'dependency' => array(
                        'field' => 'navigation_position',
                        'function' => 'jeg_check_navigation_top_value',
                    ),
                ),

                /* top transparent */
                array(
                    'type' => 'toggle',
                    'name' => 'centering_top_navigator_transparent',
                    'label' => 'Put Navigator on narrow size',
                    'description' => 'disable wide navigation, but use narrow instead',
                    'default' => '0',
                    'dependency' => array(
                        'field' => 'navigation_position',
                        'function' => 'jeg_plugin_check_transparent_navigation_value',
                    ),
                ),
                array(
                    'type' => 'toggle',
                    'name' => 'smaller_navigator_transparent',
                    'label' => 'Make menu smaller when scrolling',
                    'description' => '',
                    'default' => '0',
                    'dependency' => array(
                        'field' => 'navigation_position',
                        'function' => 'jeg_plugin_check_transparent_navigation_value',
                    ),
                ),
                array(
                    'type' => 'toggle',
                    'name' => 'boxed_content_transparent',
                    'label' => 'Boxed Content',
                    'description' => '',
                    'default' => '0',
                    'dependency' => array(
                        'field' => 'navigation_position',
                        'function' => 'jeg_plugin_check_transparent_navigation_value',
                    ),
                ),


			),
		),

		array(
			'type' => 'toggle',
			'name' => 'override_loader',
			'label' => 'Override Default Loader Setup',
			'description' => 'if you want this page having different loader element, you can check this option',
		),

		array(
			'type'      => 'group',
			'repeating' => false,
			'length'    => 1,
			'name'      => 'override_loader_group',
			'title'     => 'Override Loader',
			'dependency' => array(
				'field'    => 'override_loader',
				'function' => 'vp_dep_boolean',
			),
			'fields'    => array(
				array(
					'type' => 'radiobutton',
					'name' => 'page_loader',
					'label' => 'Page loader',
					'items' => array(
						array(
							'value' => 'none',
							'label' => 'None',
						),
						array(
							'value' => 'linear',
							'label' => 'Linear',
						),
						array(
							'value' => 'circle',
							'label' => 'Circle',
						),
						array(
							'value' => 'linearinline',
							'label' => 'Inner Linear (Youtube style)',
						),
					),
					'default' => array(
						'none',
					),
				),
			),
		),

		array(
			'type' => 'toggle',
			'name' => 'override_background',
			'label' => 'Override Default Background Setup',
			'description' => 'if you want this page having different background',
		),


		array(
			'type'      => 'group',
			'repeating' => false,
			'length'    => 1,
			'name'      => 'override_background_group',
			'title'     => 'Override Background',
			'dependency' => array(
				'field'    => 'override_background',
				'function' => 'vp_dep_boolean',
			),
			'fields'    => array(
				array(
			        'type' => 'color',
			        'name' => 'color_background',
			        'label' => 'Background color',
			        'description' => 'Background Color',
			        'default' => '#FFF',
			        'format' => 'HEX',
			    ),

				array(
			        'type' => 'imageupload',
			        'name' => 'image_background',
			        'label' => 'Image Background',
			        'description' => 'Upload your website image background',
			    ),

			    array(
					'type' => 'select',
					'name' => 'background_vertical_position',
					'label' => 'Image background vertical position',
					'items' => array(
						array(
							'value' => 'left',
							'label' => 'Left',
						),
						array(
							'value' => 'center',
							'label' => 'Center',
						),
						array(
							'value' => 'right',
							'label' => 'right',
						),
					),
					'default' => array(
						'center',
					),
				),

			    array(
					'type' => 'select',
					'name' => 'background_horizontal_position',
					'label' => 'Image background horizontal position',
					'items' => array(
						array(
							'value' => 'top',
							'label' => 'top',
						),
						array(
							'value' => 'center',
							'label' => 'Center',
						),
						array(
							'value' => 'bottom',
							'label' => 'bottom',
						),
					),
					'default' => array(
						'center',
					),
				),

				array(
					'type' => 'select',
					'name' => 'background_repeat',
					'label' => 'Image background repeat',
					'items' => array(
						array(
							'value' => 'repeat-x',
							'label' => 'Repeat Horizontal',
						),
						array(
							'value' => 'repeat-y',
							'label' => 'Repeat Vertical',
						),
						array(
							'value' => 'repeat',
							'label' => 'Repeat Image',
						),
						array(
							'value' => 'no-repeat',
							'label' => 'No Repeat',
						),
					),
					'default' => array(
						'no-repeat',
					),
				),

				array(
			        'type' => 'toggle',
			        'name' => 'background_fullscreen',
			        'label' => 'Enable fullscreen background',
			        'default' => '0',
			    ),
			),
		),

	),
);