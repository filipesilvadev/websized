<?php

return array(
	'id'          => 'jkreativ_page_pageposition',
	'types'       => array('page'),
    'include_template'  => array(
        'default',
        'template/template-blog.php',
        'template/template-page-normal.php'
    ),
	'title'       => 'Jkreativ Page Position, Layout and Size',
	'priority'    => 'high',
	'template'    => array(
		array(
			'name'  => 'page_position',
			'type'  => 'select',
			'label' => 'Page Position',
			'default' => 'pagecenter',
			'items' => array(
				array(
					'value' => 'pageleft',
					'label' => 'Float Left',
				),
				array(
					'value' => 'pageright',
					'label' => 'Float Right',
				),
				array(
					'value' => 'pagecenter',
					'label' => 'Centering',
				),
			)			
		),
		
		array(
			'name'  => 'page_width',
			'type'  => 'select',
			'label' => 'Page width',
			'default' => 'fullwidth',
			'items' => array(
				array(
					'value' => 'fullwidth',
					'label' => 'Full Width',
				),
				array(
					'value' => 'halfwidth',
					'label' => 'Half Width',
				)
			)			
		),
		
		array(
			'type' => 'radiobutton',
			'name' => 'blog_layout',
			'label' => 'Blog Layout',
			'description' => 'Set your blog lalyout',
			'default' => 'nosidebar',
			'items' => array(
				array(
					'value' => 'nosidebar',
					'label' => 'Without sidebar layout',
				),
				array(
					'value' => 'withsidebar',
					'label' => 'Blog with sidebar layout',
				),				
			),
		),
		
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
			'dependency' => array(
				'field'    => 'blog_layout',
				'function' => 'jeg_check_blog_layout',
			),
		),
		
		
		
	),
);