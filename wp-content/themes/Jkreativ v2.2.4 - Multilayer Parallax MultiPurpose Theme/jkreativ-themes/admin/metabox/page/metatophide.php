<?php

return array(
	'id'          => 'jkreativ_page_meta_top',
	'types'       => array('page'),
    'include_template'  => array(
        'default',
        'template/template-blog.php',
        'template/template-blog-masonry.php',
        'template/template-blog-wide.php',
        'template/template-blog-clean.php',
        'template/template-page-normal.php',
        'template/template-page-wide.php',
        'template/template-page-cover.php',
        'template/template-media-gallery-content.php'
    ),
	'title'       => 'Jkreativ Page Meta (Top Meta)',
	'priority'    => 'high',
	'template'    => array(
		array(
			'type' => 'toggle',
			'name' => 'hide_top_meta',
			'label' => 'Hide Page Top Meta',
			'description' => 'this meta can contain date, author, and other',
		),
	),
);