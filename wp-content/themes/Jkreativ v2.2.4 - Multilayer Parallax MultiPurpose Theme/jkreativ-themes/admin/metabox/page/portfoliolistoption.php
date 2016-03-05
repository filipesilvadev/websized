<?php

return array(
	'id'          => 'jkreativ_portfolio_list_option',
	'types'       => array('page'),
    'include_template'  => array(
        'template/template-portfolio.php'
    ),
	'title'       => 'Jkreativ Portfolio List Option',
	'priority'    => 'high',
	'template'    => array(
		
		array(
			'type'  => 'select',
			'name'  => 'expand_type',			
			'label' => 'Portfolio expand mode',
			'description' => 'portfolio expand mode',
			'default' => 'normal',
			'items' => array(
				array(
					'value' => 'normal',
					'label' => 'Normal ajax expand mode',
				),
				array(
					'value' => 'theather',
					'label' => 'Theater ajax expand mode',
				),
				array(
					'value' => 'noexpand',
					'label' => 'No Expand (No Ajax)',
				),
			)	
		),
		
		array(
			'type'  => 'select',
			'name'  => 'load_animation',			
			'label' => 'Portfolio gallery load animation style',
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
			'type' => 'slider',
			'name' => 'load_limit',
			'label' => 'Portfolio load per page',
			'description' => 'set your loaded portfolio page counter',
			'min' => '1',
	        'max' => '250',
	        'step' => '1',
	        'default' => '50',
		),
		
		array(
			'type' => 'slider',
			'name' => 'item_width',
			'label' => 'Portfolio item width',
			'description' => 'set your portfolio item default width, you can also change size of item width on every portfolio item setting',
			'min' => '200',
	        'max' => '1000',
	        'step' => '20',
	        'default' => '400',
		),
		
		array (
			'type' => 'radiobutton',
			'name' => 'portfolio_type',
			'label' => 'Portfolio layout type',
			'description' => 'choose between normal or pinterest layout',
			'default' => 'normal',
			'items' => array(
				array(
					'value' => 'normal',
					'label' => 'Normal',
				),
				array(
					'value' => 'masonry',
					'label' => 'Masonry',
				),
				array(
					'value' => 'pinterest',
					'label' => 'Pinterest',
				),
			),
		),		
		
		array(
			'type' => 'slider',
			'name' => 'item_height',
			'label' => 'Portfolio item height dimension',
			'description' => 'item height dimension base on item width size',
			'min' => '0.1',
			'max' => '3',
			'step' => '0.1',
			'default' => '1',
			'dependency' => array(
				'field'    => 'portfolio_type',
				'function' => 'jeg_portfolio_height_value',
			),
		),
		
		array(
			'type' => 'toggle',
			'name' => 'use_margin',
			'label' => 'Use portfolio margin',
			'description' => 'enable portfolio item margin on this page',
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
			'type' => 'textbox',
			'name' => 'filtertitle',
			'label' => 'Filter Title',
			'default' => 'Portfolio List',
		),
	),
);