<?php

return array(
	'id'          => 'jkreativ_page_blogcontent',
	'types'       => array('page'),
    'include_template'  => array(
        'template/template-blog.php',
        'template/template-blog-masonry.php',
        'template/template-blog-wide.php',
        'template/template-blog-clean.php'
    ),
	'title'       => 'Jkreativ Blog Content',
	'priority'    => 'high',
	'template'    => array(
		
		array(
			'type' => 'toggle',
			'name' => 'toggle_filtering',
			'label' => 'Filter Content',
			'description' => 'If in any case you want to show only several blog content, you can use this option',
		),
		
		array(
			'type'      => 'group',
			'repeating' => false,
			'length'    => 1,
			'name'      => 'filtering_group',
			'title'     => 'Filtering',
			'dependency' => array(
				'field'    => 'toggle_filtering',
				'function' => 'vp_dep_boolean',
			),
			'fields'    => array(
				array(
					'type' => 'radiobutton',
					'name' => 'filter_type',
					'label' => 'Filter By',
					'description' => 'Different type will show different type of field',
					'items' => array(
						array(
							'value' => 'category',
							'label' => 'Category',
						),
						array(
							'value' => 'tags',
							'label' => 'Tags',
						),
					),
				),
				
				array(
					'type' => 'multiselect',
					'name' => 'filter_category',
					'label' => 'Category',
					'description' => 'Include this category',
					'items' => array(
						'data' => array(
							array(
								'source' => 'function',
								'value'  => 'vp_get_categories',
							),
						),
					),
					'dependency' => array(
						'field'    => 'filter_type',
						'function' => 'jeg_dep_is_category',
					),
				),
				array(
					'type' => 'multiselect',
					'name' => 'filter_tags',
					'label' => 'Include Tag(s)',
					'description' => 'Tag(s) to filter.',
					'items' => array(
						'data' => array(
							array(
								'source' => 'function',
								'value'  => 'vp_get_tags',
							),
						),
					),
					'dependency' => array(
						'field'    => 'filter_type',
						'function' => 'vp_dep_is_tags',
					),
				),
				
				array(
					'type' => 'radiobutton',
					'name' => 'filter_rule',
					'label' => 'Filter Rule',
					'description' => 'filter content by this rule',
					'default' => 'include',
					'items' => array(
						array(
							'value' => 'include',
							'label' => 'Include',
						),
						array(
							'value' => 'exclude',
							'label' => 'Exclude',
						),
					),
				),
				
			),
		),
		
		array(
			'type' => 'slider',
			'name' => 'post_perpage',
			'label' => 'Number of post',
			'description' => 'Total post number per page',
			'min' => '1',
	        'max' => '20',
	        'step' => '1',
	        'default' => '5',
		),
	),
);