<?php

return array(
	'id'          => 'jkreativ_blog_quote',
	'types'       => array('post'),
	'title'       => 'JKreativ Quote format',
	'priority'    => 'high',
	'template'    => array(
		array(
			'type' => 'textarea',
			'name' => 'quote_content',
			'label' => 'Quote content',
			'description' => 'content of your quote',
		),	
		array(
			'type' => 'textbox',
			'name' => 'quote_author',
			'label' => 'Quote Author',			
			'description' => 'name of author of quote / twitter status / etc',
		),
		array(
			'type' => 'textbox',
			'name' => 'quote_author_url',
			'label' => 'Quote Author URL',
			'description' => 'url of author quote, can be your twitter url too',
		),
		array(
			'type' => 'textbox',
			'name' => 'quote_prefix',
			'label' => 'Text in front of quote',
			'description' => 'ex : twitter status from (author), quote from (author), etc',
		),
	),
);

/**
 * EOF
 */