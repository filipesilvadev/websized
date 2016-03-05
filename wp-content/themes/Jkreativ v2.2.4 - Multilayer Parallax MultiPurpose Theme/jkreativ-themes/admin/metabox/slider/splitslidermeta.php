<?php

return array(
	'id'          => 'jkreativ_slider_splitslider',
	'types'       => array('slider'),
	'title'       => 'Jkreativ Split Splider',
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
					'type'  => 'select',
					'name'  => 'text_align',			
					'label' => 'Section Text Align',
					'default' => 'center',
					'items' => array(
						array(
							'value' => 'center',
							'label' => 'Center Align',
						),				
						array(
							'value' => 'left',
							'label' => 'Left Align',
						),
						array(
							'value' => 'right',
							'label' => 'Right Align',
						),						
					)	
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
			),
		),
	),
);
