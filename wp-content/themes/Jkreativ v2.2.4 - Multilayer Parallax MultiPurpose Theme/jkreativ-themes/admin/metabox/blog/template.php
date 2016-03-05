<?php

return array(
	'id'          => 'jkreativ_blog_template',
	'types'       => array('post'),
	'title'       => 'JKreativ Blog Template',
	'priority'    => 'high',
	'template'    => array(
		array(
			'type' => 'toggle',
			'name' => 'override_template',
			'label' => 'Override General blog setting',
			'description' => 'you can override general setting by enabling this option, and use unique setting for this blog page',
		),

		array(
			'type'      => 'group',
			'repeating' => false,
			'length'    => 1,
			'name'      => 'template',
			'title'     => 'Blog Template',
			'dependency' => array(
				'field'    => 'override_template',
				'function' => 'vp_dep_boolean',
			),
			'fields'    => array(
				array(
					'type' => 'select',
					'name' => 'single_blog_template',
					'label' => 'Blog Template',
					'description' => 'you can also override this from single blog page',
					'items' => array(
						array(
							'value' => 'normal',
							'label' => 'Normal Layout',
						),
						array(
							'value' => 'clean',
							'label' => 'Clean Layout',
						),
						array(
							'value' => 'coverwidth',
							'label' => 'Cover Layout',
						),
						array(
							'value' => 'extrawidth',
							'label' => 'Wide Layout',
						),
					),
					'default' => array(
						'normal',
					),
					'validation' => 'required',
				),



				array(
					'type'      => 'group',
					'repeating' => false,
					'length'    => 1,
					'name'      => 'general_blog_normal',
					'title'     => 'Normal Blog Template',
					'dependency' => array(
						'field'    => 'single_blog_template',
						'function' => 'jeg_choose_normal_template',
					),
					'fields'    => array(
						array(
							'name'  => 'general_blog_normal_page_position',
							'type'  => 'select',
							'label' => 'Blog Position',
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
							'name'  => 'general_blog_normal_page_width',
							'type'  => 'select',
							'label' => 'Blog width',
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
					        'type' => 'toggle',
					        'name' => 'general_blog_normal_show_sidebar',
					        'label' => 'Show sidebar for blog',
					        'description' => 'enable this option to show sidebar for general blog',
					        'default' => '0',
					    ),
					    array(
							'type' => 'select',
							'name' => 'general_blog_normal_sidebar',
							'label' => 'Blog Sidebar',
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
								'field'    => 'general_blog_normal_show_sidebar',
								'function' => 'vp_dep_boolean',
							),
						),

						array(
					        'type' => 'toggle',
					        'name' => 'general_blog_normal_hide_share',
					        'label' => 'Hide share blog',
					        'default' => '0',
					    ),
					    array(
					        'type' => 'toggle',
					        'name' => 'general_blog_normal_hide_meta',
					        'label' => 'Hide meta for blog',
					        'default' => '0',
					    ),

					),
				),


				array(
					'type'      => 'group',
					'repeating' => false,
					'length'    => 1,
					'name'      => 'general_blog_clean',
					'title'     => 'Clean Blog Template',
					'dependency' => array(
						'field'    => 'single_blog_template',
						'function' => 'jeg_choose_cleanblog_template',
					),
					'fields'    => array(
					    array(
					        'type' => 'toggle',
					        'name' => 'general_blog_clean_hide_top_meta',
					        'label' => 'Hide top meta for blog',
					        'default' => '0',
					    ),
					    array(
					        'type' => 'toggle',
					        'name' => 'general_blog_clean_hide_bottom_meta',
					        'label' => 'Hide bottom meta for blog',
					        'default' => '0',
					    ),
					    array(
					        'type' => 'toggle',
					        'name' => 'general_blog_clean_hide_share',
					        'label' => 'Hide share blog',
					        'default' => '0',
					    ),
					),
				),


				array(
					'type'      => 'group',
					'repeating' => false,
					'length'    => 1,
					'name'      => 'general_blog_cover',
					'title'     => 'Cover Blog Template',
					'dependency' => array(
						'field'    => 'single_blog_template',
						'function' => 'jeg_choose_cover_template',
					),
					'fields'    => array(
					    array(
							'type' => 'select',
							'name' => 'general_blog_cover_sidebar',
							'label' => 'Cover Sidebar',
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
						array(
					        'type' => 'toggle',
					        'name' => 'general_blog_cover_hide_share',
					        'label' => 'Hide share blog',
					        'default' => '0',
					    ),
					    array(
					        'type' => 'toggle',
					        'name' => 'general_blog_cover_hide_meta',
					        'label' => 'Hide meta for blog',
					        'default' => '0',
					    ),
					),
				),


				array(
					'type'      => 'group',
					'repeating' => false,
					'length'    => 1,
					'name'      => 'general_blog_wide',
					'title'     => 'Wide Blog',
					'dependency' => array(
						'field'    => 'single_blog_template',
						'function' => 'jeg_choose_extra_template',
					),
					'fields'    => array(
					    array(
							'type' => 'select',
							'name' => 'general_blog_wide_sidebar',
							'label' => 'Wide Sidebar',
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

						array(
					        'type' => 'toggle',
					        'name' => 'general_blog_extra_hide_share',
					        'label' => 'Hide share blog',
					        'default' => '0',
					    ),
					    array(
					        'type' => 'toggle',
					        'name' => 'general_blog_extra_hide_meta',
					        'label' => 'Hide meta for blog',
					        'default' => '0',
					    ),
					),
				),


			),
		),
	),
);