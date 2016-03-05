<?php

return array(
	'id'                => 'jkreativ_page_meta_btm',
	'types'             => array('page'),
	'title'             => 'Jkreativ Page Meta (Bottom Meta)',
    'include_template'  => array(
        'template/template-blog.php',
        'template/template-blog-masonry.php',
        'template/template-blog-wide.php',
        'template/template-blog-clean.php',
    ),
    'priority'          => 'high',
	'template'          => array(
		array(
			'type' => 'toggle',
			'name' => 'hide_bottom_meta',
			'label' => 'Hide Page Bottom Meta',
			'description' => 'this meta can contain category, comment number, tag, and other',
		),
	),
);