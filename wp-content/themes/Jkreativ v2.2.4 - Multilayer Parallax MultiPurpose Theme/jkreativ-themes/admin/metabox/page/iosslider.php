<?php

return array(
	'id'          => 'jkreativ_page_iosslider',
	'types'       => array('page'),
    'include_template'  => array(
        'template/template-fsslider-iosslider.php'
    ),
	'title'       => 'Jkreativ Fullscreen IOS Slider setup',
	'priority'    => 'high',
	'template'    => array(
		array(
			'type' => 'toggle',
			'name' => 'autoplay',
			'label' => 'Auutoplay Slider',			
		),
		array(
			'type' => 'slider',
			'name' => 'sliderdelay',
			'label' => 'Slider Delay',			
			'min' => '1000',
	        'max' => '20000',
	        'step' => '1000',
	        'default' => '5000',
	        'dependency' => array(
				'field'    => 'autoplay',
				'function' => 'vp_dep_boolean',
			),
		),
		 
	),
);