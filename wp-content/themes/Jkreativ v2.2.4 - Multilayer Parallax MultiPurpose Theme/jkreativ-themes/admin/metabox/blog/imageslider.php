<?php

return array(
	'id'          => 'jkreativ_blog_slider',
	'types'       => array('post'),
	'title'       => 'JKreativ Image Slider',
	'priority'    => 'high',
	'template'    => array(
		array(
			'type'      => 'group',
			'repeating' => true,
			'sortable'  => true,
			'name'      => 'binding_group',
			'title'     => 'Image Item',
			'fields'    => array(
				array(
					'type' => 'imageupload',
					'name' => 'image',
					'label' => 'Image',
					'description' => 'Upload your image',
				),
				array(
					'type' => 'textbox',
					'name' => 'image_name',
					'label' => 'Image Name',
					'description' => 'When image expanded, this name will shown',
				),
			),
		),
	),
);