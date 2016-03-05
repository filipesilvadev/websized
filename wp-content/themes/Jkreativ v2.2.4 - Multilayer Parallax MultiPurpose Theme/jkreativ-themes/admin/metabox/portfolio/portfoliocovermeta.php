<?php

return array(
	'id'          => 'jkreativ_portfolio_cover_meta',
	'types'       => array(JEG_PORTFOLIO_POST_TYPE),
	'title'       => 'Jkreativ Portfolio Cover Meta',
	'priority'    => 'high',
	'template'    => array(		
		
		array(
			'type'      => 'group',
			'repeating' => true,
			'sortable'  => true,
			'length'    => 1,
			'name'      => 'portfolio_meta',
			'title'     => 'Portfolio meta',
			'fields'    => array(
				array(
					'type' => 'textbox',
					'name' => 'meta_title',
					'label' => 'Meta Title',					
				),
				array(
					'type' => 'wpeditor',
                    'name' => 'meta_content',
                    'label' => 'Meta Content',
                    'use_external_plugins' => '1',
                    'disabled_externals_plugins' => '',
                    'disabled_internals_plugins' => '',			
				),
			),
		),
		
		
	),
);