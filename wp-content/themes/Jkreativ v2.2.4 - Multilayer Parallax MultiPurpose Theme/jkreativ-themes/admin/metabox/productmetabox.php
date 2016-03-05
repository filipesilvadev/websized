<?php

return array(
	'id'          => 'jkreativ_product',
	'types'       => array('product'),
	'title'       => 'Product Gallery Setting',
	'priority'    => 'low',
	'template'    => array(
		
		array(
			'type' => 'toggle',
			'name' => 'overwrite_gallery',
			'label' => 'Overwrite Single Product Gallery Setting',
			'description' => 'overwrite single product galelry setting and use bellow setting instead',
		),
		
		
		array(
			'type'      => 'group',
			'repeating' => false,
			'length'    => 1,
			'name'      => 'gallery',
			'title'     => 'Select Portfolio Layout',
			'dependency' => array(
				'field'    => 'overwrite_gallery',
				'function' => 'vp_dep_boolean',
			),
			'fields'    => array(
				
				array(
					'type' => 'toggle',
					'name' => 'single_product_fullwidth',
					'label' => 'Disable Fullwidth Image and Use Masonry or Grid Layout',
					'description' => 'turn on this option to see more option on single product page layout',
				),
				
				array(
					'type'      => 'group',
					'repeating' => false,
					'length'    => 1,
					'name'      => 'grid_gallery',
					'title'     => 'Grid Gallery Setting',
					'dependency' => array(
						'field'    => 'single_product_fullwidth',
						'function' => 'vp_dep_boolean',
					),
					'fields'    => array(
						
						array (
							'type' => 'radiobutton',
							'name' => 'product_single_type',
							'label' => 'Product layout type',
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
									'label' => 'Justified Layout',
								),
							),
						),
						
						array(
							'type' => 'slider',
							'name' => 'single_product_width',
							'label' =>  'Image thumbnail size (width)' ,
							'description' =>  'set your image width thumbnail size on single product page' ,
							'min' => '200',
					        'max' => '1000',
					        'step' => '20',
					        'default' => '400',
					        'dependency' => array(
								'field'    => 'product_single_type',
								'function' => 'jeg_portfolio_themes_width_value',
							),
						),
						
						array(
							'type' => 'slider',
							'name' => 'single_item_height',
							'label' =>  'Product image thumbnail height dimension' ,
							'description' =>  'Product image height dimension base on Product thumbnail size' ,
							'min' => '0.1',
					        'max' => '3',
					        'step' => '0.1',
					        'default' => '1',
					        'dependency' => array(
								'field'    => 'product_single_type',
								'function' => 'jeg_portfolio_themes_height_value',
							),
						),
						
						array(
							'type' => 'slider',
							'name' => 'single_justified_height',
							'label' =>  'Justified Product Image Height' ,
							'description' =>  'Justified Product image height' ,
							'min' => '150',
					        'max' => '500',
					        'step' => '10',
					        'default' => '250',
					        'dependency' => array(
								'field'    => 'product_single_type',
								'function' => 'jeg_portfolio_themes_justified_value',
							),
						),
						
						array(
							'type' => 'toggle',
							'name' => 'single_product_use_margin',
							'description' =>  'use margin on product image' ,
							'label' =>  'Use margin' ,
							'default' => '1',
						),
						array(
							'type' => 'slider',
							'name' => 'single_product_margin_size',
							'label' =>  'Product Margin size' ,
							'description' =>  'in pixel' ,
							'min' => '2',
					        'max' => '20',
					        'step' => '1',
					        'default' => '5',
					        'dependency' => array(
								'field'    => 'single_product_use_margin',
								'function' => 'vp_dep_boolean',
							),
						),
						array(
							'type'  => 'select',
							'name'  => 'single_expand_mode',
							'label' =>  'Image Expand Script' ,
							'description' =>  'script that will used when user click the image thumbnail' ,
							'default' => 'magnific',
							'items' => array(
								array(
									'value' => 'photoswipe',
									'label' => 'Use Photoswipe (double click zoom image capability)',
								),				
								array(
									'value' => 'magnific',
									'label' => 'Use magnific',
								),
								array(
									'value' => 'swipebox',
									'label' => 'Use Swipebox',
								),
							)
						),
						array(
							'type'  => 'select',
							'name'  => 'single_scale_mode',
							'label' =>  'Image Scale Method' ,
							'description' =>  'image scale method' ,
							'default' => 'fit',
							'dependency' => array(
								'field'    => 'single_expand_mode',
								'function' => 'jeg_check_expand_photoswipe',
							),
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
					
					)
				),
			
			)
		),
		
		
		
	),
);