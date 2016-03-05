<?php

return array(
	'id'          => 'jkreativ_portfolio_ajax',
	'types'       => array(JEG_PORTFOLIO_POST_TYPE),
	'title'       => 'Jkreativ Portfolio Single Ajax Setting',
	'priority'    => 'high',
	'template'    => array(
		array(
			'type'  => 'select',
			'name'  => 'single_scale_mode',			
			'label' => 'Image Scale Method',
			'description' => 'image scale method when ajax expand mode used',			
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
		
		array(
			'type' => 'toggle',
			'name' => 'hide_image_title',
			'label' => 'Hide single image title',
			'description' => 'enable this option if you didnt want to show image title',				       
		),
		
	),
);