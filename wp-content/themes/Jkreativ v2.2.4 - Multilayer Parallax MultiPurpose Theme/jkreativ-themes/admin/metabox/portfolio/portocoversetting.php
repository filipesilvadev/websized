<?php

return array(
	'id'          => 'jkreativ_portfolio_cover',
	'types'       => array(JEG_PORTFOLIO_POST_TYPE),
	'title'       => 'Jkreativ Portfolio Cover Setting',
	'priority'    => 'high',
	'template'    => array(
		array(
			'type' => 'toggle',
			'name' => 'hide_top_meta',
			'label' => 'Hide Portfolio Top Meta',
			'description' => 'this meta can contain date, author, and other',
		),
		array(
			'type' => 'radiobutton',
			'name' => 'heading_position',
			'label' => 'Choose Heading Position',
			'description' => 'your heading position',
			'default' => 'inside',
			'items' => array(
				array(
					'value' => 'inside',
					'label' => 'Top Inside Post',
				),
				array(
					'value' => 'outside',
					'label' => 'Top Outside Post',
				),				
			),
			'default' => 'inside',
		),
		array(
			'name'  => 'sidebar_name',
			'type'  => 'select',
			'label' => 'Select Additional Sidebar',
			'items' => array(
				'data' => array(
					array(
						'source' => 'function',
						'value'  => 'jeg_plugin_get_sidebar',
					),
				),
			),
		),		
		array(
			'type' => 'textbox',
			'name' => 'pdtext',
			'label' => 'Portfolio Detail Text',
			'default' => 'Portfolio Detail'
		)
	),
);