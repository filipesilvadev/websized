<?php

return array(
	'id'          => 'jkreativ_page_heading',
	'types'       => array('page'),
    'include_template'  => array(
        'default',
        'template/template-page-normal.php',
        'template/template-page-wide.php',
        'template/template-page-cover.php',
    ),
	'title'       => 'Jkreativ Page Heading',
	'priority'    => 'high',
	'template'    => array(
		
		
		array(
			'type' => 'radiobutton',
			'name' => 'heading_position',
			'label' => 'Choose Heading Position',
			'description' => 'your heading position',
			'items' => array(
				array(
					'value' => 'inside',
					'label' => 'Top Inside Post',
				),
				array(
					'value' => 'outside',
					'label' => 'Top Outside Post',
				),				
			),
			'default' => 'inside',
		),
		
		array(
			'type' => 'radiobutton',
			'name' => 'heading_type',
			'label' => 'Choose Heading Type',
			'description' => 'you can choose type of heading you want to use with this page',
			'items' => array(
				array(
					'value' => 'standard',
					'label' => 'Standard',
				),
				array(
					'value' => 'imgslider',
					'label' => 'Image Slider',
				),
				array(
					'value' => 'vimeo',
					'label' => 'Vimeo',
				),
				array(
					'value' => 'youtube',
					'label' => 'Youtube',
				),
				array(
					'value' => 'soundcloud',
					'label' => 'Soundcloud',
				),
				array(
					'value' => 'html5video',
					'label' => 'HTML 5 Video',
				),
			),
			'default' => 'standard',
		),
		
		array(
			'type'      => 'group',
			'repeating' => false,
			'length'    => 1,
			'name'      => 'standard',
			'title'     => 'Standard Type',
			'dependency' => array(
				'field'    => 'heading_type',
				'function' => 'jeg_heading_type_standard',
			),
			'fields'    => array(
				array(
					'type' => 'imageupload',
					'name' => 'image',
					'label' => 'Featured Image',
					'description' => 'image that will show on heading of your blog post',
				),
				array(
					'type' => 'textbox',
					'name' => 'image_name',
					'label' => 'Featured Image Name',
					'description' => 'When image expanded, this name will show',
				),
			)
		),
		
		
		array(
			'type'      => 'group',
			'repeating' => true,
			'sortable'  => true,
			'name'      => 'imageslider',
			'title'     => 'Image Item',
			'dependency' => array(
				'field'    => 'heading_type',
				'function' => 'jeg_heading_type_imageslider',
			),
			'fields'    => array(
				array(
					'type' => 'imageupload',
					'name' => 'image',
					'label' => 'Image',
					'description' => 'Upload your image',
				),
				array(
					'type' => 'textbox',
					'name' => 'image_name',
					'label' => 'Image Name',
					'description' => 'When image expanded, this name will shown',
				),
			),
		),
		
		
		array(
			'type'      => 'group',
			'repeating' => false,
			'length'    => 1,
			'name'      => 'vimeo',
			'title'     => 'Vimeo Type',
			'dependency' => array(
				'field'    => 'heading_type',
				'function' => 'jeg_heading_type_vimeo',
			),
			'fields'    => array(
				array(
					'type' => 'textbox',
					'name' => 'vimeo_video_url',
					'label' => 'Vimeo Video URL',
					'description' => 'url of your vimeo url, ex : http://vimeo.com/71536276',
				),
			)
		),
		
		array(
			'type'      => 'group',
			'repeating' => false,
			'length'    => 1,
			'name'      => 'youtube',
			'title'     => 'Youtube Type',
			'dependency' => array(
				'field'    => 'heading_type',
				'function' => 'jeg_heading_type_youtube',
			),
			'fields'    => array(
				array(
					'type' => 'textbox',
					'name' => 'youtube_video_url',
					'label' => 'Youtube Video URL',
					'description' => 'url of your youtube url, ex : http://www.youtube.com/watch?v=9B7UcTBJYCA',
				),
			)
		),
		
		array(
			'type'      => 'group',
			'repeating' => false,
			'length'    => 1,
			'name'      => 'soundcloud',
			'title'     => 'Soundcloud Type',
			'dependency' => array(
				'field'    => 'heading_type',
				'function' => 'jeg_heading_type_soundcloud',
			),
			'fields'    => array(
				array(
					'type' => 'textbox',
					'name' => 'soundcloud_url',
					'label' => 'Soundcloud URL',
					'description' => 'url of your Soundcloud, ex : http://api.soundcloud.com/users/1539950/favorites',
				),
			)
		),
		
		
		array(
			'type'      => 'group',
			'repeating' => false,
			'length'    => 1,
			'name'      => 'html5video',
			'title'     => 'HTML 5 video Type',
			'dependency' => array(
				'field'    => 'heading_type',
				'function' => 'jeg_heading_type_html5video',
			),
			'fields'    => array(
				array(
					'type' => 'imageupload',
					'name' => 'cover',
					'label' => 'Video Cover',
				),
				array(
					'type' => 'upload',
					'name' => 'videomp4',
					'label' => 'Video MP4',
				),
				array(
					'type' => 'upload',
					'name' => 'videowebm',
					'label' => 'Video WEBM',
				),
				array(
					'type' => 'upload',
					'name' => 'videoogg',
					'label' => 'Video OGG',
				),
			)
		),
		
	),
);