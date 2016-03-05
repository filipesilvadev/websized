<?php

return array(
	'id'          => 'jkreativ_blog_html5video',
	'types'       => array('post'),
	'title'       => 'JKreativ HTML 5 format',
	'priority'    => 'high',
	'template'    => array(
		array(
			'type' => 'imageupload',
			'name' => 'cover',
			'label' => 'Video Cover',
		),
		array(
			'type' => 'upload',
			'name' => 'videomp4',
			'label' => 'Video MP4',
		),
		array(
			'type' => 'upload',
			'name' => 'videowebm',
			'label' => 'Video WEBM',
		),
		array(
			'type' => 'upload',
			'name' => 'videoogg',
			'label' => 'Video OGG',
		),
	),
);