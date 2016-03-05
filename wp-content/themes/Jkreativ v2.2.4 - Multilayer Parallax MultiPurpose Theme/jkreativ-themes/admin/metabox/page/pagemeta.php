<?php

return array(
	'id'          => 'jkreativ_page_meta',
	'types'       => array('page'),
	'title'       => 'Jkreativ Page Meta',
	'priority'    => 'high',
	'template'    => array(
		array(
			'type' => 'toggle',
			'name' => 'hide_top_meta',
			'label' => 'Hide Page Top Meta',
			'description' => 'this meta can contain date, author, and other',
		),
		
		array(
			'type' => 'toggle',
			'name' => 'hide_bottom_meta',
			'label' => 'Hide Page Bottom Meta',
			'description' => 'this meta can contain category, comment number, tag, and other',
		),
	),
);