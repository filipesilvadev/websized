<?php

return array(

	'Section Builder' => array(
		'elements' => array(
			'heading'  => array(
				'title' => 'Section Title Heading',
				'code'  => '[heading]',
				'attributes' => array(
					array(
						'name'  => 'type',
						'type'  => 'select',
						'label' => 'Heading Type',
						'default' => 'h1',
						'items' => array(
							array(
								'value' => 'h1',
								'label' => 'H1'
							),
							array(
								'value' => 'h2',
								'label' => 'H2'
							),
							array(
								'value' => 'h3',
								'label' => 'H3'
							),
							array(
								'value' => 'h4',
								'label' => 'H4'
							),
							array(
								'value' => 'h5',
								'label' => 'H5'
							),
							array(
								'value' => 'h6',
								'label' => 'H6'
							),
						),
					),
					array(
						'name'  => 'float',
						'type'  => 'select',
						'label' => 'Heading Position',
						'default' => 'center',
						'items' => array(
							array(
								'value' => 'center',
								'label' => 'Center'
							),
							array(
								'value' => 'left',
								'label' => 'Left'
							),
							array(
								'value' => 'right',
								'label' => 'Right'
							),
						),
					),
					array(
						'name'  => 'title',
						'type'  => 'textbox',
						'label' => 'Heading Title',
					),
					array(
						'name'  => 'alt',
						'type'  => 'textbox',
						'label' => 'Title Alternate',
					),
					array(
						'name'  => 'class',
						'type'  => 'textbox',
						'label' => 'CSS Class (Optional)',
					),
				),
			),


			'quote'  => array(
				'title' => 'Quote',
				'code'  => '[landing-quote]',
				'attributes' => array(
					array(
						'name'  => 'text',
						'type'  => 'textbox',
						'label' => 'Quote Text',
					),
					array(
						'name'  => 'author',
						'type'  => 'textbox',
						'label' => 'Quote Author',
					),
					array(
						'name'  => 'class',
						'type'  => 'textbox',
						'label' => 'CSS Class (Optional)',
					),
				),
			),


			'callout'  => array(
				'title' => 'Callout',
				'code'  => '[callout]',
				'attributes' => array(
					array(
						'name'  => 'text',
						'type'  => 'textbox',
						'label' => 'Callout text',
					),
					array(
						'name'  => 'buttontext',
						'type'  => 'textbox',
						'label' => 'Callout button text',
					),
					array(
						'name'  => 'buttonurl',
						'type'  => 'textbox',
						'label' => 'Callout button url',
					),
					array(
						'name'  => 'buttonstyle',
						'type'  => 'select',
						'label' => 'Button style',
						'default' => 'default',
						'items' => array(
							array(
								'value' => 'default',
								'label' => 'Default'
							),
							array(
								'value' => 'primary',
								'label' => 'Primary'
							),
							array(
								'value' => 'success',
								'label' => 'Success'
							),
							array(
								'value' => 'info',
								'label' => 'Info'
							),
							array(
								'value' => 'warning',
								'label' => 'Warning'
							),
							array(
								'value' => 'danger',
								'label' => 'Danger'
							),
						),
					),
					array(
						'name'  => 'center',
						'type'  => 'toggle',
						'label' => 'Center text on callout',
					),
					array(
						'name'  => 'class',
						'type'  => 'textbox',
						'label' => 'CSS Class (Optional)',
					),
				),
			),


			'iframe'  => array(
				'title' => 'Fullwidth Iframed Content',
				'code'  => '[iframe]',
				'attributes' => array(
					array(
						'name'  => 'text',
						'type'  => 'textbox',
						'label' => 'Iframe URL',
					),
					array(
						'name'  => 'width',
						'type'  => 'slider',
						'label' => 'Iframe Height',
						'default' => 650,
						'min'   => 100,
						'max'   => 2000,
						'step' => 50
					),
				),
			),

		),
	),

	'Fullwidth Map' => array(
		'elements' => array(
			'fullwidthmapexample'  => array(
				'title' => 'Fullwidth Map - Example',
				'code'  => '[fullwidthmap lat="-8.692904" lng="115.218347" title="Denpasar Studio" zoom="14" height="500"]
					<br/>[fullwidthmapdetail text="Jl.R. Sesetan No 100"]
					<br/>[fullwidthmapdetail text="Denpasar, Bali, Indonesia"]
					<br/>[fullwidthmapdetail text="+62 8788 123 4567"]
					<br/>[fullwidthmapdetail text="http://jegtheme.com" url="http://jegtheme.com"]
					<br/>[/fullwidthmap]',
			),
			'fullwidthmap'  => array(
				'title' => 'Fullwidth Google Map',
				'code'  => '[fullwidthmap][/fullwidthmap]',
				'attributes' => array(
					array(
						'name'  => 'lat',
						'type'  => 'textbox',
						'label' => 'Latitude',
					),
					array(
						'name'  => 'lng',
						'type'  => 'textbox',
						'label' => 'Longitude',
					),
					array(
						'name'  => 'title',
						'type'  => 'textbox',
						'label' => 'Title',
					),
					array(
						'name'  => 'zoom',
						'type'  => 'slider',
						'label' => 'Map Zoom',
						'default' => 14,
						'min'   => 1,
						'max'   => 21,
					),
					array(
						'name'  => 'height',
						'type'  => 'slider',
						'label' => 'Container Height',
						'default' => 550,
						'min'   => 300,
						'max'   => 800,
					),
					array(
						'name'  => 'nofullwidth',
						'type'  => 'toggle',
						'label' => 'Don\'t use full width map',
					),
				),
			),

			'fullwidthmapdetail'  => array(
				'title' => 'Fullwidth Google Map Detail',
				'code'  => '[fullwidthmapdetail]',
				'attributes' => array(
					array(
						'name'  => 'text',
						'type'  => 'textbox',
						'label' => 'Text',
					),
					array(
						'name'  => 'url',
						'type'  => 'textbox',
						'label' => 'URL',
					),
				),
			),

		),
	),

	'Service Element' => array(
		'elements' => array(
			'serviceimageexample'  => array(
				'title' => 'Service image - Example',
				'code'  => '[service-wrap]
					<br/>[service-item image="http://placehold.it/440x440" title="PHOTOGRAPHY" alt=" Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec ut libero at ante cursus congue. Praesent vitae tellus mauris."]
					<br/>[service-item image="http://placehold.it/440x440" title="WEB DESIGN" alt=" Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec ut libero at ante cursus congue. Praesent vitae tellus mauris."]
					<br/>[service-item image="http://placehold.it/440x440" title="ICON CREATOR" alt=" Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec ut libero at ante cursus congue. Praesent vitae tellus mauris."]
					<br/>[service-item image="http://placehold.it/440x440" title="SCRIPT TESTING" alt=" Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec ut libero at ante cursus congue. Praesent vitae tellus mauris."]
					<br/>[/service-wrap]',
			),
			'serviceimage'  => array(
				'title' => 'Service image - Wrapper',
				'code'  => "[service-wrap]
				<br>--> insert another service item
				<br>[/service-wrap]",
				'attributes' => array(
					array(
						'name'  => 'class',
						'type'  => 'textbox',
						'label' => 'CSS Class (Optional)',
					),
				),
			),
			'serviceimageitem'  => array(
				'title' => 'Service image - Item',
				'code'  => '[service-item]',
				'attributes' => array(
					array(
						'name'  => 'image',
						'type'  => 'imageupload',
						'label' => 'Service Image (upload 440x440 pixel image)',
					),
					array(
						'name'  => 'title',
						'type'  => 'textbox',
						'label' => 'Service Title',
					),
					array(
						'name'  => 'alt',
						'type'  => 'textbox',
						'label' => 'Service Description',
					),
					array(
						'name'  => 'background_color',
						'type'  => 'color',
						'label' => 'Background Color',
					),
					array(
						'name'  => 'text_color',
						'type'  => 'color',
						'label' => 'Text Color',
					),
					array(
						'name'  => 'class',
						'type'  => 'textbox',
						'label' => 'CSS Class (Optional)',
					),
				),
			),

			'serviceiconexample'  => array(
				'title' => 'Service icon - Example',
				'code'  => '[service-icon-wrap itemwidth="3"]
					<br/>[service-icon-item icon="fa-location-arrow" title="Web Development" desc="Phasellus enim libero, blandit vel sapien vitae, condimentum ultricies magna et. Quisque euismod orci ut et lobortis aliquam. Aliquam in tortor enim"]
					<br/>[service-icon-item icon="fa-envelope-o" title="Social Marketing" desc="Phasellus enim libero, blandit vel sapien vitae, condimentum ultricies magna et. Quisque euismod orci ut et lobortis aliquam. Aliquam in tortor enim"]
					<br/>[service-icon-item icon="fa-qrcode" title="Modern Graphic Design" desc="Phasellus enim libero, blandit vel sapien vitae, condimentum ultricies magna et. Quisque euismod orci ut et lobortis aliquam. Aliquam in tortor enim"]
					<br/>[service-icon-item icon="fa-camera" title="Cloud Hosting" desc="Phasellus enim libero, blandit vel sapien vitae, condimentum ultricies magna et. Quisque euismod orci ut et lobortis aliquam. Aliquam in tortor enim"]
					<br/>[service-icon-item icon="fa-picture-o" title="Responsive Web Design" desc="Phasellus enim libero, blandit vel sapien vitae, condimentum ultricies magna et. Quisque euismod orci ut et lobortis aliquam. Aliquam in tortor enim"]
					<br/>[service-icon-item icon="fa-leaf" title="Server Configuration" desc="Phasellus enim libero, blandit vel sapien vitae, condimentum ultricies magna et. Quisque euismod orci ut et lobortis aliquam. Aliquam in tortor enim"]
					<br/>[/service-icon-wrap]',
			),
			'serviceicon'  => array(
				'title' => 'Service icon - Wrapper',
				'code'  => '[service-icon-wrap]
					<br>--> insert another Service with icon item
					<br>[/service-icon-wrap]',
				'attributes' => array(
					array(
						'name'  => 'itemwidth',
						'type'  => 'slider',
						'label' => 'Service item width',
						'default' => 3,
						'min'   => 2,
						'max'   => 3,
					),
					array(
						'name'  => 'class',
						'type'  => 'textbox',
						'label' => 'CSS Class (Optional)',
					),
				),
			),
			'serviceiconitem'  => array(
				'title' => 'Service icon - Item',
				'code'  => '[service-icon-item]',
				'attributes' => array(
					array(
				        'type' => 'fontawesome',
				        'name' => 'icon',
				        'label' => 'Service Icon',
				        'default' => array(
				            '{{first}}',
				        ),
				    ),
					array(
						'name'  => 'title',
						'type'  => 'textbox',
						'label' => 'Service Title',
					),
					array(
						'name'  => 'desc',
						'type'  => 'textbox',
						'label' => 'Service Description',
					),
					array(
						'name'  => 'class',
						'type'  => 'textbox',
						'label' => 'CSS Class (Optional)',
					),
				),
			),


			'serviceblockexample'  => array(
				'title' => 'Service block - Example',
				'code'  => '[service-block-wrap itemwidth="4"]
					<br/>[service-block-item icon="fa-location-arrow" title="Web Development" desc="Phasellus enim libero, blandit vel sapien vitae, condimentum ultricies magna et. Quisque euismod orci ut et lobortis aliquam. Aliquam in tortor enim"]
					<br/>[service-block-item icon="fa-envelope-o" title="Social Marketing" desc="Phasellus enim libero, blandit vel sapien vitae, condimentum ultricies magna et. Quisque euismod orci ut et lobortis aliquam. Aliquam in tortor enim"]
					<br/>[service-block-item icon="fa-qrcode" title="Modern Graphic Design" desc="Phasellus enim libero, blandit vel sapien vitae, condimentum ultricies magna et. Quisque euismod orci ut et lobortis aliquam. Aliquam in tortor enim"]
					<br/>[service-block-item icon="fa-camera" title="Cloud Hosting" desc="Phasellus enim libero, blandit vel sapien vitae, condimentum ultricies magna et. Quisque euismod orci ut et lobortis aliquam. Aliquam in tortor enim"]
					<br/>[/service-block-wrap]',
			),
			'serviceblock'  => array(
				'title' => 'Service block - Wrapper',
				'code'  => '[service-block-wrap]
					<br>--> insert another Service with icon item
					<br>[/service-block-wrap]',
				'attributes' => array(
					array(
						'name'  => 'itemwidth',
						'type'  => 'slider',
						'label' => 'Service item width',
						'default' => 3,
						'min'   => 2,
						'max'   => 4,
					),
					array(
						'name'  => 'class',
						'type'  => 'textbox',
						'label' => 'CSS Class (Optional)',
					),
				),
			),
			'serviceblockitem'  => array(
				'title' => 'Service block - Item',
				'code'  => '[service-block-item]',
				'attributes' => array(
					array(
				        'type' => 'fontawesome',
				        'name' => 'icon',
				        'label' => 'Service Icon',
				        'default' => array(
				            '{{first}}',
				        ),
				    ),
					array(
						'name'  => 'title',
						'type'  => 'textbox',
						'label' => 'Service Title',
					),
					array(
						'name'  => 'desc',
						'type'  => 'textbox',
						'label' => 'Service Description',
					),
					array(
						'name'  => 'class',
						'type'  => 'textbox',
						'label' => 'CSS Class (Optional)',
					),
				),
			),
		),
	),

    'Blog Post List' => array(
        'elements' => array(
            'blogpostlist'  => array(
                'title' => 'Blog Post List',
                'code'  => '[jeg-blog-list]',
                'attributes' => array(
                    array(
                        'name'  => 'number',
                        'type'  => 'slider',
                        'label' => 'Counter block number',
                        'default' => 5,
                        'min'   => 2,
                        'max'   => 10,
                    ),
                    array(
                        'name'  => 'readmorepage',
                        'type'  => 'select',
                        'label' => 'Blog List Page',
                        'default' => '{{first}}',
                        'items' => array(
                            'data' => array(
                                array(
                                    'source' => 'function',
                                    'value'  => 'jeg_get_all_page',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),

    'Counter' => array(
		'elements' => array(
			'counterblockexample'  => array(
				'title' => 'Example',
				'code'  => '[counter-block itemwidth="4"]
						<br/>[counter-item number="3210" text="Number of Buyers"]
						<br/>[counter-item number="670" text="SVN Commit"]
						<br/>[counter-item number="3400" text="Support Resolved"]
						<br/>[counter-item number="365" text="Day of service"]
						<br/>[/counter-block]',
			),
			'counterblockwrapper'  => array(
				'title' => 'Counter Block Wrapper',
				'code'  => "[counter-block]
				<br>--> insert another counter item here
				<br>[/counter-block]",
				'attributes' => array(
					array(
						'name'  => 'itemwidth',
						'type'  => 'slider',
						'label' => 'Counter block number',
						'default' => 4,
						'min'   => 3,
						'max'   => 4,
					),
					array(
						'name'  => 'class',
						'type'  => 'textbox',
						'label' => 'CSS Class (Optional)',
					),
				),
			),
			'counterblockitem'  => array(
				'title' => 'Counter Block item',
				'code'  => '[counter-item]',
				'attributes' => array(
					array(
						'name'  => 'text',
						'type'  => 'textbox',
						'label' => 'Counter Text',
					),
					array(
						'name'  => 'number',
						'type'  => 'textbox',
						'label' => 'Counter Number',
					),
					array(
						'name'  => 'class',
						'type'  => 'textbox',
						'label' => 'CSS Class (Optional)',
					),
				),
			),
		),
	),

	'Skill Animation' => array(
		'elements' => array(
			'skillanimationexample'  => array(
				'title' => 'Example',
				'code'  => '[skill-bar-wrap]
					<br/>[skill-bar-item title="HTML & CSS" percentage="70"]
					<br/>[skill-bar-item title="Logo Design" percentage="80"]
					<br/>[skill-bar-item title="Wordpress" percentage="100"]
					<br/>[skill-bar-item title="Photoshop" percentage="90"]
					<br/>[skill-bar-item title="Illustrator" percentage="75"]
					<br/>[/skill-bar-wrap]',
			),
			'skillanimation'  => array(
				'title' => 'Skill bar animation wrapper',
				'code'  => "[skill-bar-wrap]
				<br>--> insert another skill bar item
				<br>[/skill-bar-wrap]",
				'attributes' => array(
					array(
						'name'  => 'class',
						'type'  => 'textbox',
						'label' => 'CSS Class (Optional)',
					),
				),
			),
			'skillanimationitem'  => array(
				'title' => 'Skill bar animation item',
				'code'  => '[skill-bar-item]',
				'attributes' => array(
					array(
						'name'  => 'title',
						'type'  => 'textbox',
						'label' => 'Skill title',
					),
					array(
						'name'  => 'percentage',
						'type'  => 'slider',
						'label' => 'Skill percentage',
						'default' => 100,
						'min'   => 1,
						'max'   => 100,
					),
					array(
						'name'  => 'graphcolor',
						'type'  => 'color',
						'label' => 'Graph Color',
					),
					array(
						'name'  => 'class',
						'type'  => 'textbox',
						'label' => 'CSS Class (Optional)',
					),
				),
			),
		),
	),

	'Testimonial Slide' => array(
		'elements' => array(
			'testimonialexample'  => array(
				'title' => 'Example',
				'code'  => '[testi-slide-wrap]
					<br/>[testi-slide-item text="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec posuere aliquam vestibulum. Aenean id feugiat tortor, faucibus posuere ante." image="http://placehold.it/160x160" name="Agung Bayu" position="CEO of Jegtheme"]
					<br/>[testi-slide-item text="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec posuere aliquam vestibulum. Aenean id feugiat tortor, faucibus posuere ante." image="http://placehold.it/160x160" name="Agung Bayu" position="CEO of Jegtheme"]
					<br/>[testi-slide-item text="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec posuere aliquam vestibulum. Aenean id feugiat tortor, faucibus posuere ante." image="http://placehold.it/160x160" name="Agung Bayu" position="CEO of Jegtheme"]
					<br/>[testi-slide-item text="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec posuere aliquam vestibulum. Aenean id feugiat tortor, faucibus posuere ante." image="http://placehold.it/160x160" name="Agung Bayu" position="CEO of Jegtheme"]
					<br/>[/testi-slide-wrap]',
			),
			'testimonial'  => array(
				'title' => 'Testimonial Wrapper',
				'code'  => '[testi-slide-wrap]
				<br>--> insert another skill bar item
				<br>[/testi-slide-wrap]',
				'attributes' => array(
					array(
						'name'  => 'class',
						'type'  => 'textbox',
						'label' => 'CSS Class (Optional)',
					),
				),
			),

			'testimonialitem'  => array(
				'title' => 'Testimonial Item',
				'code'  => '[testi-slide-item]',
				'attributes' => array(
					array(
						'name'  => 'text',
						'type'  => 'textbox',
						'label' => 'Testimonial Text',
					),
					array(
						'name'  => 'image',
						'type'  => 'imageupload',
						'label' => 'Upload image (160x160 px)',
					),
					array(
						'name'  => 'name',
						'type'  => 'textbox',
						'label' => 'Name',
					),
					array(
						'name'  => 'position',
						'type'  => 'textbox',
						'label' => 'Company Name or Position',
					),
					array(
						'name'  => 'class',
						'type'  => 'textbox',
						'label' => 'CSS Class (Optional)',
					),
				),
			),
		),
	),

	'Client List' => array(
		'elements' => array(
			'clientexample'  => array(
				'title' => 'Example',
				'code'  => '[client-list number="5"]
					<br/>[client-image image="http://placehold.it/325x130"]
					<br/>[client-image image="http://placehold.it/325x130"]
					<br/>[client-image image="http://placehold.it/325x130"]
					<br/>[client-image image="http://placehold.it/325x130"]
					<br/>[client-image image="http://placehold.it/325x130"]
					<br/>[client-image image="http://placehold.it/325x130"]
					<br/>[client-image image="http://placehold.it/325x130"]
					<br/>[client-image image="http://placehold.it/325x130"]
					<br/>[/client-list]',
			),
			'client'  => array(
				'title' => 'Client List',
				'code'  => '[client-list]
				<br>--> insert another client image
				<br>[/client-list]',
				'attributes' => array(
					array(
						'name'  => 'number',
						'type'  => 'slider',
						'label' => 'Number Of Item',
						'default' => 5,
						'min'   => 2,
						'max'   => 10,
					),
					array(
						'name'  => 'class',
						'type'  => 'textbox',
						'label' => 'CSS Class (Optional)',
					),
				),
			),
			'clientchild'  => array (
				'title' => 'Client image',
				'code'  => '[client-image]',
				'attributes' => array(
					array(
						'name'  => 'name',
						'type'  => 'textbox',
						'label' => 'Client name',
					),
					array(
						'name'  => 'image',
						'type'  => 'imageupload',
						'label' => 'Upload image (160x160 px)',
					),
					array(
						'name'  => 'class',
						'type'  => 'textbox',
						'label' => 'CSS Class (Optional)',
					),
				),
			),
		),
	),


	'Image Animation' => array(
		'elements' => array(
			'imageanimation'  => array(
				'title' => 'Image Animation Sequence Wrap',
				'code'  => '[image-seq]
				<br> --> insert your image item
				<br>[/image-seq]',
				'attributes' => array(
					array(
						'name'  => 'animspeed',
						'type'  => 'select',
						'label' => 'Animation Speed',
						'default' => 'left',
						'items' => array(
							array(
								'value' => 'fast',
								'label' => 'Fast'
							),
							array(
								'value' => 'slow',
								'label' => 'Slow'
							),
							array(
								'value' => 'slower',
								'label' => 'Slower'
							),
						),
					),
					array(
						'name'  => 'seqspeed',
						'type'  => 'slider',
						'label' => 'Sequence Speed',
						'default' => 150,
						'min'   => 50,
						'max'   => 2000
					),
				),
			),
			'imageanimationitem'  => array(
				'title' => 'Image Animation Item',
				'code'  => '[image-seq-item]',
				'attributes' => array(
					array(
						'name'  => 'image',
						'type'  => 'imageupload',
						'label' => 'Upload your image sequence',
					),
					array(
						'name'  => 'fadein',
						'type'  => 'toggle',
						'label' => 'Enable fadein animation',
					),
					array(
						'name'  => 'scale',
						'type'  => 'toggle',
						'label' => 'Enable scale animation',
					),
					array(
						'name'  => 'position',
						'type'  => 'select',
						'label' => 'Animation Position',
						'default' => 'none',
						'items' => array(
							array(
								'value' => 'none',
								'label' => 'None'
							),
							array(
								'value' => 'top',
								'label' => 'Top'
							),
							array(
								'value' => 'bottom',
								'label' => 'Bottom'
							),
							array(
								'value' => 'left',
								'label' => 'Left'
							),
							array(
								'value' => 'right',
								'label' => 'Right'
							),
						),
					),
				),
			),
		),
	),

	'Portfolio block' => array(
		'elements' => array(
			'portfolio'  => array(
				'title' => 'Portfolio block wrapper',
				'code'  => '[portfolio-wrapper]
				<br/> ->> insert your portfolio item
				<br/>[/portfolio-wrapper]',
				'attributes' => array(
					array(
						'name'  => 'parent',
						'type'  => 'select',
						'label' => 'Portfolio Parent',
						'default' => '{{first}}',
						'items' => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'jeg_get_portfolio_page',
								),
							),
						),
					),
					array(
						'name'  => 'buttontext',
						'type'  => 'textbox',
						'label' => 'Button portfolio parent link text',
					),
				),
			),
			'portfolioitem'  => array(
				'title' => 'Portfolio block item',
				'code'  => '[portfolio-item]',
				'attributes' => array(
					array(
						'name'  => 'id',
						'type'  => 'select',
						'label' => 'Portfolio Item',
						'default' => '{{first}}',
						'items' => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'jeg_get_portfolio_item',
								),
							),
						),
					),
					array(
						'name'  => 'image',
						'type'  => 'imageupload',
						'label' => 'Portfolio image (Leave empty to use default portfolio cover)',
						'description' => '',
					),
					array(
						'name'  => 'width',
						'type'  => 'select',
						'label' => 'Block Width',
						'default' => '{{first}}',
						'items' => array(
							array(
								'value' => '1/3',
								'label' => '1/3'
							),
							array(
								'value' => '2/3',
								'label' => '2/3'
							),
							array(
								'value' => '1/2',
								'label' => '1/2'
							),
						),
					),

					array(
						'name'  => 'height',
						'type'  => 'select',
						'label' => 'Block Height',
						'default' => '{{first}}',
						'items' => array(
							array(
								'value' => '1',
								'label' => '1'
							),
							array(
								'value' => '2',
								'label' => '2'
							),
						),
					),

				),
			),
		),
	),

	'Pricing Table' => array(
		'elements' => array(
            'pricingblock'  => array(
                'title' => 'Pricing Block',
                'code'  => '[pricingblock]',
                'attributes' => array(
                    array(
                        'type' => 'multiselect',
                        'name' => 'content',
                        'label' => 'Content (CTRL to Add More)',
                        'items' => array(
                            'data' => array(
                                array(
                                    'source' => 'function',
                                    'value'  => 'jeg_get_pricing',
                                ),
                            ),
                        ),
                    ),
                )
            ),

            /*
			'pricing3col'  => array(
				'title' => 'Pricing 3 Column template',
				'code'  => '[pricing-table column="3"]

					<br/>[pricing-column title="Basic" alt="" sign="$" price="99" duration="Per month" highlight="false"]
						<br/>[pricing-list-wrap]
						<br/>[pricing-list title="This is included"]
						<br/>[pricing-list title="You even get this"]
						<br/>[pricing-list title="Yes, this too!"]
						<br/>[pricing-list title="You even get this"]
						<br/>[pricing-list title="Yes, this too"]
						<br/>[/pricing-list-wrap]
						<br/>[pricing-button url="http://google.com" text="BUY NOW"]
					<br/>[/pricing-column]

					<br/>[pricing-column title="Standard" alt="best option" sign="$" price="199" duration="Per month" highlight="true"]
						<br/>[pricing-list-wrap]
						<br/>[pricing-list title="This is included"]
						<br/>[pricing-list title="You even get this"]
						<br/>[pricing-list title="Yes, this too!"]
						<br/>[pricing-list title="You even get this"]
						<br/>[pricing-list title="Yes, this too"]
						<br/>[/pricing-list-wrap]
						<br/>[pricing-button url="http://google.com" text="BUY NOW"]
					<br/>[/pricing-column]

					<br/>[pricing-column title="Premium" alt="" sign="$" price="299" duration="Per month" highlight="false"]
						<br/>[pricing-list-wrap]
						<br/>[pricing-list title="This is included"]
						<br/>[pricing-list title="You even get this"]
						<br/>[pricing-list title="Yes, this too!"]
						<br/>[pricing-list title="You even get this"]
						<br/>[pricing-list title="Yes, this too"]
						<br/>[/pricing-list-wrap]
						<br/>[pricing-button url="http://google.com" text="BUY NOW"]
					<br/>[/pricing-column]

				<br/>[/pricing-table]',
			),

			'pricing4col'  => array(
				'title' => 'Pricing 4 Column template',
				'code'  => '[pricing-table column="4"]

					<br/>[pricing-column title="Basic" alt="" sign="$" price="99" duration="Per month" highlight="false"]
						<br/>[pricing-list-wrap]
						<br/>[pricing-list title="This is included"]
						<br/>[pricing-list title="You even get this"]
						<br/>[pricing-list title="Yes, this too!"]
						<br/>[pricing-list title="You even get this"]
						<br/>[pricing-list title="Yes, this too"]
						<br/>[/pricing-list-wrap]
						<br/>[pricing-button url="http://google.com" text="BUY NOW"]
					<br/>[/pricing-column]

					<br/>[pricing-column title="Standard" alt="best option" sign="$" price="199" duration="Per month" highlight="true"]
						<br/>[pricing-list-wrap]
						<br/>[pricing-list title="This is included"]
						<br/>[pricing-list title="You even get this"]
						<br/>[pricing-list title="Yes, this too!"]
						<br/>[pricing-list title="You even get this"]
						<br/>[pricing-list title="Yes, this too"]
						<br/>[/pricing-list-wrap]
						<br/>[pricing-button url="http://google.com" text="BUY NOW"]
					<br/>[/pricing-column]

					<br/>[pricing-column title="Premium" alt="" sign="$" price="299" duration="Per month" highlight="false"]
						<br/>[pricing-list-wrap]
						<br/>[pricing-list title="This is included"]
						<br/>[pricing-list title="You even get this"]
						<br/>[pricing-list title="Yes, this too!"]
						<br/>[pricing-list title="You even get this"]
						<br/>[pricing-list title="Yes, this too"]
						<br/>[/pricing-list-wrap]
						<br/>[pricing-button url="http://google.com" text="BUY NOW"]
					<br/>[/pricing-column]

					<br/>[pricing-column title="Super" alt="" sign="$" price="399" duration="Per month" highlight="false"]
						<br/>[pricing-list-wrap]
						<br/>[pricing-list title="This is included"]
						<br/>[pricing-list title="You even get this"]
						<br/>[pricing-list title="Yes, this too!"]
						<br/>[pricing-list title="You even get this"]
						<br/>[pricing-list title="Yes, this too"]
						<br/>[/pricing-list-wrap]
						<br/>[pricing-button url="http://google.com" text="BUY NOW"]
					<br/>[/pricing-column]

				<br/>[/pricing-table]',
			),

			'pricing5col'  => array(
				'title' => 'Pricing 5 Column template',
				'code'  => '[pricing-table column="5"]

					<br/>[pricing-column title="Basic" alt="" sign="$" price="99" duration="Per month" highlight="false"]
						<br/>[pricing-list-wrap]
						<br/>[pricing-list title="This is included"]
						<br/>[pricing-list title="You even get this"]
						<br/>[pricing-list title="Yes, this too!"]
						<br/>[pricing-list title="You even get this"]
						<br/>[pricing-list title="Yes, this too"]
						<br/>[/pricing-list-wrap]
						<br/>[pricing-button url="http://google.com" text="BUY NOW"]
					<br/>[/pricing-column]

					<br/>[pricing-column title="Standard" alt="best option" sign="$" price="199" duration="Per month" highlight="true"]
						<br/>[pricing-list-wrap]
						<br/>[pricing-list title="This is included"]
						<br/>[pricing-list title="You even get this"]
						<br/>[pricing-list title="Yes, this too!"]
						<br/>[pricing-list title="You even get this"]
						<br/>[pricing-list title="Yes, this too"]
						<br/>[/pricing-list-wrap]
						<br/>[pricing-button url="http://google.com" text="BUY NOW"]
					<br/>[/pricing-column]

					<br/>[pricing-column title="Premium" alt="" sign="$" price="299" duration="Per month" highlight="false"]
						<br/>[pricing-list-wrap]
						<br/>[pricing-list title="This is included"]
						<br/>[pricing-list title="You even get this"]
						<br/>[pricing-list title="Yes, this too!"]
						<br/>[pricing-list title="You even get this"]
						<br/>[pricing-list title="Yes, this too"]
						<br/>[/pricing-list-wrap]
						<br/>[pricing-button url="http://google.com" text="BUY NOW"]
					<br/>[/pricing-column]

					<br/>[pricing-column title="Super" alt="" sign="$" price="399" duration="Per month" highlight="false"]
						<br/>[pricing-list-wrap]
						<br/>[pricing-list title="This is included"]
						<br/>[pricing-list title="You even get this"]
						<br/>[pricing-list title="Yes, this too!"]
						<br/>[pricing-list title="You even get this"]
						<br/>[pricing-list title="Yes, this too"]
						<br/>[/pricing-list-wrap]
						<br/>[pricing-button url="http://google.com" text="BUY NOW"]
					<br/>[/pricing-column]

					<br/>[pricing-column title="Gold" alt="" sign="$" price="499" duration="Per month" highlight="false"]
						<br/>[pricing-list-wrap]
						<br/>[pricing-list title="This is included"]
						<br/>[pricing-list title="You even get this"]
						<br/>[pricing-list title="Yes, this too!"]
						<br/>[pricing-list title="You even get this"]
						<br/>[pricing-list title="Yes, this too"]
						<br/>[/pricing-list-wrap]
						<br/>[pricing-button url="http://google.com" text="BUY NOW"]
					<br/>[/pricing-column]

				<br/>[/pricing-table]',
			),
            */
		),
	),

	'Product' => array(
		'elements' => array(
			'product'  => array(
				'title' => 'Latest Product Slider',
				'code'  => '[product-slider]',
				'attributes' => array(
					array(
						'name'  => 'number',
						'type'  => 'slider',
						'label' => 'Product Number',
						'default' => 8,
						'min'   => 3,
						'max'   => 20,
						'step' => 1
					),
					array(
						'name'  => 'column',
						'type'  => 'select',
						'label' => 'Column Number',
						'default' => '4',
						'items' => array(
							array(
								'value' => '3',
								'label' => '3'
							),
							array(
								'value' => '4',
								'label' => '4'
							),
						),
					),
					array(
						'name'  => 'image_dimension',
						'type'  => 'slider',
						'label' => 'Product Image Dimension',
						'default' => 1,
						'min'   => 0.4,
						'max'   => 2,
						'step' => 0.1
					),
					array(
						'type' => 'multiselect',
						'name' => 'filter_category',
						'label' => 'Filter By Category (leave empty to include all)',
						'items' => array(
							'data' => array(
								array(
									'source' => 'function',
									'value'  => 'jeg_get_product_category',
								),
							),
						),
					),
				),
			),
		),
	),



);

/**
 * EOF
 */