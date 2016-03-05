<?php

return array(
	'id'          => 'jkreativ_portfolio_sidecontent',
	'types'       => array(JEG_PORTFOLIO_POST_TYPE),
	'title'       => 'Jkreativ Portfolio Side Content Setting',
	'priority'    => 'high',
	'template'    => array(
		array(
			'type' => 'toggle',
			'name' => 'hide_top_meta',
			'label' => 'Hide top meta',
			'description' => 'hide top meta on sidebar content',				       
		),
		
		array(
			'type' => 'slider',
			'name' => 'load_limit',
			'label' => 'Loaded image count',
			'description' => 'set your loaded image count, this option will enable you to load image step by step',
			'min' => '5',
	        'max' => '250',
	        'step' => '1',
	        'default' => '7',
		),

        array(
            'type' 			=> 'toggle',
            'name' 			=> 'show_image_title',
            'label' 		=> 'Show image caption',
            'description' 	=> 'show image caption instead of + (plus) sign when hovered',
        ),

        array(
            'type' => 'toggle',
            'name' => 'switch_media_textposition',
            'label' => 'Switch Media Content Position',
            'description' => 'on mobile, image will placed on top and content placed on bottom of page, you can switch position of media & content using this option',
        ),
		
		array(
			'type' => 'toggle',
			'name' => 'image_fullwidth',
			'label' => 'Use fullwidth image',
			'description' => 'overwrite setting of gallery and use fullwidth media content (image width on media library will be ignored)',				       
		),
		
		
		array(
			'type'      => 'group',
			'repeating' => false,
			'length'    => 1,
			'name'      => 'grid',
			'title'     => 'Grid Layout',
			'dependency' => array(
				'field'    => 'image_fullwidth',
				'function' => 'jeg_plugin_use_fullwidth',
			),
			'fields'    => array(
				array (
					'type' => 'radiobutton',
					'name' => 'gallery_type',
					'label' => 'Gallery layout type',
					'description' => 'choose between normal or masonry layout',
					'default' => 'normal',
					'items' => array(
						array(
							'value' => 'normal',
							'label' => 'Normal Layout',
						),
						array(
							'value' => 'masonry',
							'label' => 'Masonry Layout',
						),
						array(
							'value' => 'justified',
							'label' => 'Justified Layout (Flickr or Google image)',
						),
					),
				),
				
				
				array(
					'type' => 'slider',
					'name' => 'item_width',
					'label' => 'Gallery item width',
					'description' => 'set your gallery item defaul width, you can also change size of item width on every content of media gallery',
					'min' => '200',
			        'max' => '1000',
			        'step' => '5',
			        'default' => '400',
			        'dependency' => array(
						'field'    => 'gallery_type',
						'function' => 'jeg_portfolio_width_value',
					),
				),
				
				array(
					'type' => 'slider',
					'name' => 'item_height',
					'label' => 'Gallery item height dimension',
					'description' => 'item height dimension base on item width size',
					'min' => '0.1',
			        'max' => '3',
			        'step' => '0.1',
			        'default' => '1',
			        'dependency' => array(
						'field'    => 'gallery_type',
						'function' => 'jeg_portfolio_height_value',
					),
				),
				
				array(
					'type' => 'slider',
					'name' => 'justified_item_height',
					'label' => 'Justified Image Height',
					'description' => 'height of image on justfied gallery',
					'min' => '150',
			        'max' => '500',
			        'step' => '10',
			        'default' => '250',
			        'dependency' => array(
						'field'    => 'gallery_type',
						'function' => 'jeg_portfolio_justified_value',
					),
				),
				
				array(
					'type'  => 'select',
					'name'  => 'load_animation',			
					'label' => 'Gallery load animation style',
					'description' => 'select your animation load sytle',
					'default' => 'randomfade',
					'items' => array(
						array(
							'value' => 'normal',
							'label' => 'Normal',
						),
						array(
							'value' => 'fade',
							'label' => 'Fade',
						),
						array(
							'value' => 'seqfade',
							'label' => 'Sequence Fade',
						),
						array(
							'value' => 'upfade',
							'label' => 'Up Fade',
						),
						array(
							'value' => 'sequpfade',
							'label' => 'Sequence Up Fade',
						),
						array(
							'value' => 'randomfade',
							'label' => 'Random Fade',
						),
					)	
				),
				
				array(
					'type'  => 'select',
					'name'  => 'expand_mode',			
					'label' => 'Gallery Expand Script',
					'description' => 'script that will used when user click the image thumbnail',
					'default' => 'magnific',
					'items' => array(
						array(
							'value' => 'photoswipe',
							'label' => 'Use Photoswipe (Photo only, with double click zoom image capability)',
						),				
						array(
							'value' => 'magnific',
							'label' => 'Use magnific (Play youtube, vimeo, html 5 video, and soundcloud media)',
						),
						array(
							'value' => 'swipebox',
							'label' => 'Use Swipebox (Play youtube, vimeo, and soundcloud media)',
						),
					),
				),
				
				
				array(
					'type'      => 'group',
					'repeating' => false,
					'length'    => 1,
					'name'      => 'photoswipe_setting',
					'title'     => 'Photoswipe Setting',
					'dependency' => array(
						'field'    => 'expand_mode',
						'function' => 'jeg_plugin_check_expand_photoswipe',
					),
					'fields'    => array(
						array(
							'type' => 'toggle',
							'name' => 'photoswipe_autoplay',
							'label' => 'Enable photoswipe autoplay',
						),
						array(
							'type' => 'slider',
							'name' => 'photoswipe_autoplay_delay',
							'label' => 'Photoswipe autoplay delay',						
							'description' => 'in milli second',				
							'min' => '200',
					        'max' => '10000',
					        'step' => '100',
					        'default' => '3000',
					        'dependency' => array(
								'field'    => 'photoswipe_autoplay',
								'function' => 'vp_dep_boolean',
							),
						),
						array(
							'type' => 'toggle',
							'name' => 'photoswipe_hide_title',
							'label' => 'Photoswipe hide title',
							'description' => 'enable to hide photoswipe title',
						),
						array(
							'type'  => 'select',
							'name'  => 'single_scale_mode',			
							'label' => 'Image Scale Method',
							'description' => 'image scale method',
							'default' => 'fit',
							'items' => array(
								array(
									'value' => 'fit',
									'label' => 'Image always fits the screen',
								),				
								array(
									'value' => 'fitNoUpscale',
									'label' => 'Image always fits the screen, but never upscale the image',
								),
								array(
									'value' => 'zoom',
									'label' => 'image to be zoomed in and cropped',
								)
							)	
						),
					),
				),
				
				array(
					'type' => 'toggle',
					'name' => 'use_margin',
					'label' => 'Use portfolio margin',
					'description' => 'enable item margin on this page',
				),
				
				array(
					'type' => 'slider',
					'name' => 'margin_size',
					'label' => 'Margin size',						
					'description' => 'in pixel',				
					'min' => '2',
			        'max' => '20',
			        'step' => '1',
			        'default' => '5',
			        'dependency' => array(
						'field'    => 'use_margin',
						'function' => 'vp_dep_boolean',
					),
				),
				
				array(
					'type' => 'toggle',
					'name' => 'override_overlay',
					'label' => 'Override Overlay Color',
					'description' => 'Override default overlay color',
				),
				
				
				array(
					'type'      => 'group',
					'repeating' => false,
					'length'    => 1,
					'name'      => 'gallery_overlay',
					'title'     => 'Gallery Overlay',
					'dependency' => array(
						'field'    => 'override_overlay',
						'function' => 'vp_dep_boolean',
					),
					'fields'    => array(
						array(
					        'type' => 'color',
					        'name' => 'color',
					        'label' => 'Overlay Color',
					        'description' => 'Default Gallery Overlay Color',
					        'default' => 'rgba(0,0,0,0.6)',
					        'format' => 'rgba'
					    ),
						
						array(
							'type' => 'toggle',
							'name' => 'dark_sign',
							'label' => 'Use Dark Sign Color',
					        'description' => 'use dark plus sign on overlay',
						),
					)
				),
				
			)
		),

		
	),
);