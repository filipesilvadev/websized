<?php

return array(
	'id'                => 'jkreativ_page_mediagallerycontent',
	'types'             => array('page'),
    'include_template'  => array(
        'template/template-media-gallery-content.php'
    ),
    'title'             => 'Jkreativ Media Gallery Content Detail',
	'priority'          => 'high',
	'template'          => array(
		array(
			'name'  => 'sidebar_name',
			'type'  => 'select',
			'label' => 'Add sidebar bellow content',
			'default' => '',
			'items' => array(
				'data' => array(
					array(
						'source' => 'function',
						'value'  => 'jeg_plugin_get_sidebar',
					),
				),
			),
		),
		array(
			'type' => 'toggle',
			'name' => 'image_fullwidth',
			'label' => 'Use fullwidth image',
			'description' => 'overwrite setting of gallery and use fullwidth media content',				       
		),
        array(
            'type' => 'toggle',
            'name' => 'switch_media_textposition',
            'label' => 'Switch Media Content Position',
            'description' => 'on mobile, image will placed on top and content placed on bottom of page, you can switch position of media & content using this option',
        )
	),
);