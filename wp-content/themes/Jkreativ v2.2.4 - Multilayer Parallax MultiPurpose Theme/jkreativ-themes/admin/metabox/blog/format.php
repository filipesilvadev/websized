<?php

return array(
	'id'          => 'jkreativ_blog_format',
	'types'       => array('post'),
	'title'       => 'JKreativ Blog Format',
	'priority'    => 'high',
	'context'     => 'side',
	'template'    => array(
		array(
			'type' => 	'radiobutton',
			'name' => 	'format',
			'label' => 	'Blog Format',
			'default'=> 'standard',
			'items' => 	array(
				array(
					'value' => 'standard',
					'label' => 'Standard',
				),
				array(
					'value' => 'quote',
					'label' => 'Quote',
				),
				array(
					'value' => 'imgslider',
					'label' => 'Image Slider',
				),
				array(
					'value' => 'vimeo',
					'label' => 'Vimeo',
				),
				array(
					'value' => 'youtube',
					'label' => 'Youtube',
				),
				array(
					'value' => 'soundcloud',
					'label' => 'Soundcloud',
				),
				array(
					'value' => 'html5video',
					'label' => 'HTML 5 Video',
				),
				array(
					'value' => 'ads',
					'label' => 'Advertisement',
				),
			),
		),
	),
);

/**
 * EOF
 */