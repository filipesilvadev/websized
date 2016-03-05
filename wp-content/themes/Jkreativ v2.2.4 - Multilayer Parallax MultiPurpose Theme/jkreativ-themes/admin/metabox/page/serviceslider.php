<?php

return array(
	'id'          => 'jkreativ_page_sslider',
	'types'       => array('page'),
    'include_template'  => array(
        'template/template-fsslider-serviceslider.php'
    ),
	'title'       => 'Jkreativ Fullscreen Service Slider',
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
			        'type' => 'fontawesome',
			        'name' => 'iconfon',
			        'label' => 'Fontawesome Icon',
			        'description' => 'Fontawesome icon chooser with small preview.',
			        'default' => array(
			            '{{first}}',
			        ),
			    ),
				array(
					'type' => 'textbox',
					'name' => 'servicetext',
					'label' => 'Service Text',
					'description' => 'short service description ex : Photography, Makeup, etc',
				),
				array(
					'type' => 'textbox',
					'name' => 'detailtext',
					'label' => 'Service Detail Text',
				),
				array(
					'type' => 'textbox',
					'name' => 'url',
					'label' => 'Service URL',
				),
			),
		),
	),
);