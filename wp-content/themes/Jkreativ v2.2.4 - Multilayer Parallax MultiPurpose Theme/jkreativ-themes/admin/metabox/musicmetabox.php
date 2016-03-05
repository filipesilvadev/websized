<?php

return array(
	'id'          => 'jkreativ_music_player',
	'types'       => array('page'),
	'title'       => 'Jkreativ Music Player',
	'priority'    => 'low',
	'context'     => 'side',
	'template'    => array(
		
		array(
			'type' => 'toggle',
			'name' => 'enable_music',
			'label' => 'Enable Music on this Page',
			'description' => 'if you want this page having music background, you can enable this option',
		),
		
		array(
			'type'      => 'group',
			'repeating' => false,
			'sortable'  => true,
			'length'    => 1,
			'name'      => 'music_bg_group',
			'title'     => 'Music Background',
			'dependency' => array(
				'field'    => 'enable_music',
				'function' => 'vp_dep_boolean',
			),
			'fields'    => array(				
				array(
			        'type' => 'upload',
			        'name' => 'music_mp3',
			        'label' => 'MP3 File Type',					        
			    ),
			    array(
			        'type' => 'upload',
			        'name' => 'music_ogg',
			        'label' => 'OGG File Type',
			    ),				
			),
		),
	),
);