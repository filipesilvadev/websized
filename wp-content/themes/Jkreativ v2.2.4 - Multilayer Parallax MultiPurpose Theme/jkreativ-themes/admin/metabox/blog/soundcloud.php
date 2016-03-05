<?php

return array(
	'id'          => 'jkreativ_blog_soundcloud',
	'types'       => array('post'),
	'title'       => 'JKreativ Soundcloud format',
	'priority'    => 'high',
	'template'    => array(
		array(
			'type' => 'textbox',
			'name' => 'soundcloud_url',
			'label' => 'Soundcloud URL',
			'description' => 'url of your Soundcloud, ex : http://api.soundcloud.com/users/1539950/favorites',
		),
	),
);