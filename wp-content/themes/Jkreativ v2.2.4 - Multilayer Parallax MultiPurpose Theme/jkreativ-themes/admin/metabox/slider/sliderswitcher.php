<?php

return array(
	'id'          	=> 'jkreativ_slider_setting',
	'types'       	=> array('slider'),
	'title'       	=> 'Jkreativ Slider Type',
	'priority'    	=> 'high',
	'context'     	=> 'side',
	'default'		=> 'splitslider',
	'template'    	=> array(
		array(
			'type' => 	'select',
			'name' => 	'slider_type',
			'label' => 	'Slider Type',
			'default'=> 'standard',
			'items' => 	array(
				array(
					'value' => 'splitslider',
					'label' => 'Split Slider',
				),
				array(
					'value' => 'fulltextslider',
					'label' => 'Fullscreen Text Slider',
				),
				array(
					'value' => 'parallaxslider',
					'label' => 'Parallax Slider',
				),	
			),
		),
	),
);
