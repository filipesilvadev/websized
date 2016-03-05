<?php

return array(
	'id'                => 'jkreativ_page_share',
	'types'             => array('page'),
	'title'             => 'Jkreativ Page Meta (Share Button)',
    'include_template'  => array(
        'default',
        'template/template-blog.php',
        'template/template-blog-wide.php',
        'template/template-blog-clean.php',
        'template/template-page-normal.php',
        'template/template-page-wide.php',
        'template/template-page-cover.php',
        'template/template-media-gallery-content.php'
    ),
	'priority'          => 'high',
	'template'          => array(
		array(
			'type' => 'toggle',
			'name' => 'hide_share_button',
			'label' => 'Hide Share Button',
			'description' => 'hide share button',
		),
	),
);