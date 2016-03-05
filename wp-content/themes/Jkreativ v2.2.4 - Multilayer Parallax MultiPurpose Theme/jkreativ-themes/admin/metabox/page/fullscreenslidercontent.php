<?php

return array(
	'id'          => 'jkreativ_page_fsslider_content',
	'types'       => array('page'),
    'include_template'  => array(
        'template/template-fsslider-iosslider.php',
        'template/template-fsslider-kenburn.php'
    ),
	'title'       => 'Jkreativ Fullscreen Slider Content',
	'priority'    => 'high',
	'template'    => array(
		 array(
			'type'      => 'group',
			'repeating' => true,
			'sortable'  => true,
			'length'    => 1,
			'name'      => 'slideritem',
			'title'     => 'Slider Item',
			'fields'    => array(
				array(
					'type' => 'imageupload',
					'name' => 'background',
					'label' => 'Background Image',
					'description' => 'upload your slider background image',
				),
				array(
					'type' => 'textarea',
					'name' => 'firstline',
					'label' => 'First Line Text',
					'description' => 'you can also use shortcode to make your font italic and set the color. <br> ex : [em color="a9865e"]This is text[/em]',
				),
				array(
					'type' => 'toggle',
					'name' => 'show_secondline',
					'label' => 'Show second line text',
					'description' => 'show second line smaller italic text',			
				),
				array(
					'type' => 'textbox',
					'name' => 'secondline',
					'label' => 'Second additional Text',					
			        'dependency' => array(
						'field'    => 'show_secondline',
						'function' => 'vp_dep_boolean',
					),					
				),
				array(
					'type' => 'toggle',
					'name' => 'show_thirdline',
					'label' => 'Show button',
					'description' => 'show button on slider',			
				),
				array(
					'type' => 'textbox',
					'name' => 'buttontext',
					'label' => 'Button text',					
			        'dependency' => array(
						'field'    => 'show_thirdline',
						'function' => 'vp_dep_boolean',
					),					
				),
				array(
					'type' => 'textbox',
					'name' => 'buttonurl',
					'label' => 'Button URL',					
			        'dependency' => array(
						'field'    => 'show_thirdline',
						'function' => 'vp_dep_boolean',
					),					
				),
				array(
			        'type' => 'color',
			        'name' => 'overlay_color',
			        'label' => 'Overlay Color',
			        'description' => 'Overlay color',
			        'default' => 'rgba(0,0,0,0.3)',
			        'format' => 'rgba',			        
			    ),
			),
		),
	),
);