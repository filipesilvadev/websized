<?php

return array(
	'id'          => 'jkreativ_page_fssingle_video',
	'types'       => array('page'),
    'include_template'  => array(
        'template/template-fssingle-video.php'
    ),
	'title'       => 'Jkreativ Fullscreen Single video',
	'priority'    => 'high',
	'template'    => array(
		 array(
			'name'  => 'video_type',
			'type'  => 'select',
			'label' => 'Video Type',
			'default' => 'youtube',
			'items' => array(
				array(
					'value' => 'youtube',
					'label' => 'Youtube',
				),				
				array(
					'value' => 'vimeo',
					'label' => 'Vimeo',
				)
			)	
		),
		array(
	        'type' => 'textbox',
	        'name' => 'youtube_video',
	        'label' => 'Youtube Video',
	        'description' => 'url of your youtube url, ex : http://www.youtube.com/watch?v=9B7UcTBJYCA',	
	        'dependency' => array(
				'field'    => 'video_type',
				'function' => 'jeg_heading_type_youtube',
			),		        
	    ),
	    array(
	        'type' => 'textbox',
	        'name' => 'vimeo_video',
	        'label' => 'Vimeo Video',
	        'description' => 'url of your vimeo url, ex : http://vimeo.com/71536276',
	        'dependency' => array(
				'field'    => 'video_type',
				'function' => 'jeg_heading_type_vimeo',
			),			        
	    ),
	    
		array(
			'type' => 'toggle',
			'name' => 'enable_autoplay',
			'label' => 'Enable Video Autoplay'
		),
		
	),
);