<?php

return array(
	'id'          => 'jkreativ_blog_ads',
	'types'       => array('post'),
	'title'       => 'JKreativ Advertisement format',
	'priority'    => 'high',
	'template'    => array(
		array(
			'type' => 'notebox',
			'name' => 'notebox',
			'label' => 'Announcement',
			'description' => 'This blog post will only show if you are choosing masonry blog format',
			'status' => 'info',
		),
		array(
			'type' => 'imageupload',
			'name' => 'image',
			'label' => 'Image',
			'description' => 'Source Image',
		),
		array(
			'type' => 'textbox',
			'name' => 'ads_url',
			'label' => 'Advertisement URL',
			'description' => 'URL if user click your advertisement',
		),
	),
);