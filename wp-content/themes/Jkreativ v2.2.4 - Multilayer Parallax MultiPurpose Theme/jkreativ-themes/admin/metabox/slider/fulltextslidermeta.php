<?php

return array(
	'id'          => 'jkreativ_slider_fulltext',
	'types'       => array('slider'),
	'title'       => 'Jkreativ Full Screen Text Slider',
	'priority'    => 'high',
	'template'    => array(
		
		array(
			'type' => 	'select',
			'name' => 	'bg_type',
			'label' => 	'Background Type',
			'default'=> 'image',
			'items' => 	array(
				array(
					'value' => 'image',
					'label' => 'Image',
				),
				array(
					'value' => 'video',
					'label' => 'HTML 5 Video',
				),
                array(
                    'value' => 'youtube',
                    'label' => 'Youtube Video',
                ),
			),
		),

        array(
            'type'      => 'group',
            'repeating' => false,
            'length'    => 1,
            'name'      => 'youtube',
            'title'     => 'Youtube Video Background',
            'dependency' => array(
                'field'    => 'bg_type',
                'function' => 'jeg_slider_background_youtube',
            ),
            'fields' => 	array(
                array(
                    'type' => 'imageupload',
                    'name' => 'bgfallback',
                    'label' => 'Background Fallback Image',
                ),
                array(
                    'type' => 'textbox',
                    'name' => 'youtubeurl',
                    'label' => 'Youtube as slider background video',
                    'description' => 'insert vallid youtube url ex: http://youtube.com/watch?v=qjP4QdZK7tc',
                ),
                array(
                    'type' => 'toggle',
                    'name' => 'use_static',
                    'label' => 'Use Static Video Background instead Parallax',
                    'description' => 'when you using static video background, you can set your section (on section builder) as transparent, and you will still able to see video as background',
                ),
             )
        ),



		array(
			'type'      => 'group',
			'repeating' => false,
			'length'    => 1,
			'name'      => 'video',
			'title'     => 'Background Video',
			'dependency' => array(
				'field'    => 'bg_type',
				'function' => 'jeg_slider_background_video',
			),	
			'fields'    => array(
				array(
					'type' => 'imageupload',
				 	'name' => 'bgfallback',
					'label' => 'Background Fallback Image',					
				),
				array(
					'type' => 'upload',
				 	'name' => 'videomp4',
					'label' => 'MP4 format Video',					
				),
				array(
					'type' => 'upload',
				 	'name' => 'videowebm',
					'label' => 'WEBM format Video',					
				),
				array(
                    'type' => 'upload',
                    'name' => 'videoogg',
                    'label' => 'OGG format Video',
                ),

                array(
                    'type' => 'textbox',
                    'name' => 'videoheight',
                    'label' => 'Video Height',
                    'description' => 'please fill your video height, ex : 1080',
                ),
                array(
                    'type' => 'textbox',
                    'name' => 'videowidth',
                    'label' => 'Video Width',
                    'description' => 'please fill your video width, ex : 1920',
                ),

			),
		),
		
		array(
	        'type' => 'imageupload',
	        'name' => 'background',
	        'description' => 'upload your image background for slider',
	        'label' => 'Upload background',
	        'dependency' => array(
				'field'    => 'bg_type',
				'function' => 'jeg_slider_background_image',
			),	
	    ),
	    
		array(
	        'type' => 'color',
	        'name' => 'overlay_background',
	        'label' => 'Overlay Background Color',
	        'description' => 'overlay above image background',	        
	        'default' => 'rgba(0,0,0,0.5)',
	        'format' => 'rgba',
	    ),
		
		array(
			'type' => 'textbox',
			'name' => 'buttontext',		
			'label' => 'Button Text',
			'description' => 'Button text wording, this button if clicked will go to next element',
		),
		
		array(
	        'type' => 'toggle',
	        'name' => 'use_light',
	        'label' => 'Use light text color',
	        'description' => 'use light text color, fit for dark background',
	    ),
		
		
		array(
	    	'type'  => 'select',
			'name'  => 'effect',					
			'label' => 'Text Animation Effect',
			'default' => 'slide',
			'items' => array(
				array(
					'value' => 'slide',
					'label' => 'Slide',
				),
				array(
					'value' => 'type',
					'label' => 'Type',
				),						
			)
		),
		
		array(
	        'type' => 'slider',
	        'name' => 'slide_speed',
	        'label' => 'Text Slide Speed',	        
	        'min' => '1000',
	        'max' => '20000',
	        'step' => '1000',
	        'default' => '5000',
	        'dependency' => array(
				'field'    => 'effect',
				'function' => 'jeg_text_animation',
			),	
	    ),
		
		array(
			'type'      => 'group',
			'repeating' => true,
			'sortable'  => true,
			'length'    => 1,
			'name'      => 'slidingtext',
			'title'     => 'Sliding Text',
			'description' => 'sliding text above the background',
			'fields'    => array(				
				array(
					'type' => 'textbox',
					'name' => 'textcontent',
					'label' => 'Text Content',
				),				
			),
		),
		
	),
);