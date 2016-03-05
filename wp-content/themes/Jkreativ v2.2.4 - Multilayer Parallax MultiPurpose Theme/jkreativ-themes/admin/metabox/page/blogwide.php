<?php

return array(
	'id'          => 'jkreativ_page_blogwide',
	'types'       => array('page'),
    'include_template'  => array(
        'template/template-blog-wide.php',
        'template/template-page-wide.php',
        'template/template-page-cover.php',
    ),
	'title'       => 'Jkreativ Wide Blog Setup',
	'priority'    => 'high',
	'template'    => array(
		array(
			'name'  => 'sidebar_name',
			'type'  => 'select',
			'label' => 'Select Sidebar',
			'default' => '{{first}}',
			'items' => array(
				'data' => array(
					array(
						'source' => 'function',
						'value'  => 'jeg_plugin_get_sidebar',
					),
				),
			),
		),
	),
);