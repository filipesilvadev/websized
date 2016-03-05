<?php

return array(
	'id'          => 'jkreativ_slider_parallaxslider',
	'types'       => array('slider'),
	'title'       => 'Jkreativ Parallax Slider',
	'priority'    => 'high',
	'template'    => array(		
		
		array(
			'type' => 'toggle',
			'name' => 'ps_fullscreen',
			'label' => 'Fullscreen Parallax Slider',
			'description' => 'switch to fullscreen parallax slider',
			'default' => '0',
		),
		array(
			'type' => 'toggle',
			'name' => 'ps_autoplay',
			'label' => 'Autoplay Parallax Slider',
			'description' => 'check this option to enable autoplay on parallax slider',
			'default' => '1',
		),	
		array(
	        'type' => 'color',
	        'name' => 'overlay_background',
	        'label' => 'Overlay Background Color',
	        'description' => 'overlay above image background',	        
	        'default' => 'rgba(0,0,0,0.1)',
	        'format' => 'rgba',
	    ),
		array(
	        'type' => 'slider',
	        'name' => 'ps_autoplay_delay',
	        'label' => 'Autoplay delay (in ms)',	        
	        'min' => '1000',
	        'max' => '20000',
	        'step' => '500',
	        'default' => '8000',
	    ),
		
		array(
			'type'      => 'group',
			'repeating' => true,
			'sortable'  => true,
			'length'    => 1,
			'name'      => 'ps',
			'title'     => 'Parallax Slider Item',			
			'fields'    => array(
				array(
			        'type' => 'imageupload',
			        'name' => 'imgbg',
			        'description' => 'Upload your image background for parallax slider',
			        'label' => 'Parallax Image Background',
			        			        
			    ),
			    array(
			    	'type'  => 'select',
					'name'  => 'textposition',					
					'label' => 'Text Position',
					'default' => 'center',
					'items' => array(
						array(
							'value' => 'center',
							'label' => 'Center',
						),
						array(
							'value' => 'left',
							'label' => 'Left',
						),						
					)
				),
				array(
					'type' => 'textarea',
					'name' => 'maintext',
					'label' => 'Main Text',
					'description' => 'you can also use shortcode to make your font italic and set the color. ex : [em color="a9865e"]This is text[/em]'					
				),
				array(
					'type' => 'textarea',
					'name' => 'alttext',
					'label' => 'Alternate Text',									
				),
				array(
					'type' => 'toggle',
					'name' => 'ps_show_button',
					'label' => 'Show button on this slider item',					
					'default' => '0',
				),
				array(
					'type'      => 'group',
					'repeating' => false,
					'length'    => 1,
					'name'      => 'ps_button',
					'title'     => 'Slider Button',	
					'dependency' => array(
						'field'    => 'ps_show_button',
						'function' => 'vp_dep_boolean',
					),			
					'fields'    => array(							
						array(
							'type' => 'textbox',
							'name' => 'ps_button_wording',
							'label' => 'Button Wording',
						),
						array(
							'type' => 'textbox',
							'name' => 'ps_button_url',
							'label' => 'Button URL',
						),
					),
				),	
				array(
					'type' => 'toggle',
					'name' => 'ps_show_video',
					'label' => 'Show video on parallax slider',					
					'default' => '0',
				),
				array(
					'type'      => 'group',
					'repeating' => false,
					'length'    => 1,
					'name'      => 'ps_video',
					'title'     => 'Video',	
					'dependency' => array(
						'field'    => 'ps_show_video',
						'function' => 'vp_dep_boolean',
					),
					'fields'    => array(
						array(
							'name'  => 'ps_video_type',
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
								),
								array(
									'value' => 'html5video',
									'label' => 'HTML 5 Video',
								),
							)
						),
						array(
					        'type' => 'imageupload',
					        'name' => 'ps_video_image',
					        'label' => 'Video Image',
					        'description' => 'video image slider cover',
					    ),
					    array(
							'type' => 'textbox',
							'name' => 'ps_video_youtube',
							'label' => 'Youtube URL',
							'dependency' => array(
								'field'    => 'ps_video_type',
								'function' => 'jeg_heading_type_youtube',
							),
						),
						array(
							'type' => 'textbox',
							'name' => 'ps_video_vimeo',
							'label' => 'Vimeo URL',
							'dependency' => array(
								'field'    => 'ps_video_type',
								'function' => 'jeg_heading_type_vimeo',
							),
						),
						array(
							'type'      => 'group',
							'repeating' => false,
							'length'    => 1,
							'name'      => 'ps_video_html',
							'title'     => 'Video HTML 5',	
							'dependency' => array(
								'field'    => 'ps_video_type',
								'function' => 'jeg_heading_type_html5video',
							),			
							'fields'    => array(							
								array(
									'type' => 'upload',
									'name' => 'ps_video_html_mp4',
									'label' => 'Video MP4',
								),
								array(
									'type' => 'upload',
									'name' => 'ps_video_html_webm',
									'label' => 'Video WEBM',
								),
								array(
									'type' => 'upload',
									'name' => 'ps_video_html_ogg',
									'label' => 'Video OGG',
								),
							),
						),	
					),
				),	
			),
		),
		
		
		
	),
);