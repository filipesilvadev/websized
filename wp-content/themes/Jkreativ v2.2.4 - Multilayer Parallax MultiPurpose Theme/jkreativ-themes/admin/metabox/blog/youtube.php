<?php

return array(
	'id'          => 'jkreativ_blog_youtube',
	'types'       => array('post'),
	'title'       => 'JKreativ Youtube format',
	'priority'    => 'high',
	'template'    => array(
		array(
			'type' => 'textbox',
			'name' => 'youtube_video_url',
			'label' => 'Youtube Video URL',
			'description' => 'url of your youtube url, ex : http://www.youtube.com/watch?v=9B7UcTBJYCA',
		),
	),
);