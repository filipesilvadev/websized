<?php

return array(
	'id'          => 'jkreativ_blog_vimeo',
	'types'       => array('post'),
	'title'       => 'JKreativ Vimeo format',
	'priority'    => 'high',
	'template'    => array(
		array(
			'type' => 'textbox',
			'name' => 'vimeo_video_url',
			'label' => 'Vimeo Video URL',
			'description' => 'url of your vimeo url, ex : http://vimeo.com/71536276',
		),
	),
);