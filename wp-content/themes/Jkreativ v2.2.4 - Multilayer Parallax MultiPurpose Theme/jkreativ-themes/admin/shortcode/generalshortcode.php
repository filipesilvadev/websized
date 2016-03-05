<?php

return array(

	'Layout' => array(
		'elements' => array(
			'gridwrapper'  => array(
				'title' => 'Grid row (grid wrapper)',
				'code'  => '[row][/row]',
				'attributes' => array(
					array(
						'name'  => 'class',
						'type'  => 'textbox',
						'label' => 'CSS Class (Optional)',
					),
					array(
						'type' => 'notebox',
						'name' => 'notebox_animation',
						'label' => 'Enable animation on grid group of this row wrapper',
						'status' => 'normal',
					),
					array(
						'name'  => 'enable_animation',
						'type'  => 'toggle',
						'label' => 'Enable Grid Animation',
					),
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
						'max'   => 2000,
					),
				)
			),
			'grid'  => array(
				'title' => 'Grid column',
				'code'  => '[column][/column]',
				'attributes' => array(
					array(
						'name'  => 'size',
						'type'  => 'slider',
						'label' => 'Column',
						'default' => 6,
						'min'   => 1,
						'max'   => 12,
					),
					array(
						'name'  => 'offset',
						'type'  => 'slider',
						'label' => 'Offset',
						'default' => 0,
						'min'   => 0,
						'max'   => 12,
					),
					array(
						'name'  => 'class',
						'type'  => 'textbox',
						'label' => 'CSS Class (Optional)',
					),
                    array(
                        'name'  => 'hideipad',
                        'type'  => 'toggle',
                        'label' => 'hide on ipad (resolution bellow 1024)',
                    ),
                    array(
                        'name'  => 'hideiphone',
                        'type'  => 'toggle',
                        'label' => 'hide on iphone (resolution bellow 480)',
                    ),


					array(
						'type' => 'notebox',
						'name' => 'notebox_animation',
						'label' => 'Enable bellow option only if you enabling grid animation',
						'status' => 'normal',
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


				)
			),
		),
	),

	'Formating' => array(
		'elements' => array(
			'dropcap'  => array(
				'title' => 'Drop Cap',
				'code'  => '[dropcap][/dropcap]',
				'attributes' => array(
					array(
						'name'  => 'class',
						'type'  => 'textbox',
						'label' => 'CSS Class (Optional)',
					),
				)
			),
			'hr'  => array(
				'title' => 'HR',
				'code'  => '[hr]',
			),
			'shorthr'  => array(
				'title' => 'Short HR',
				'code'  => '[shorthr]',
			),
			'doublehr'  => array(
				'title' => 'Double HR',
				'code'  => '[doublehr]',
			),
			'highlight'  => array(
				'title' => 'Highlight',
				'code'  => '[highlight][/highlight]',
				'attributes' => array(
					array(
						'name'  => 'text_color',
						'type'  => 'color',
						'label' => 'Text Color',
					),
					array(
						'name'  => 'bg_color',
						'type'  => 'color',
						'label' => 'Background Color',
					),
					array(
						'name'  => 'class',
						'type'  => 'textbox',
						'label' => 'CSS Class (Optional)',
					),
				)
			),
			'tooltips'  => array(
				'title' => 'Tooltip',
				'code'  => '[tooltip][/tooltip]',
				'attributes' => array(
					array(
						'name'  => 'text',
						'type'  => 'textbox',
						'label' => 'Tooltip Text',
					),
					array(
						'name'  => 'url',
						'type'  => 'textbox',
						'label' => 'Tooltip URL',
					),
					array(
						'name'  => 'class',
						'type'  => 'textbox',
						'label' => 'CSS Class (Optional)',
					),
				)
			),
			'spacing'  => array(
				'title' => 'Clear Spacing',
				'code'  => '[spacing]',
				'attributes' => array(
					array(
						'name'  => 'size',
						'type'  => 'slider',
						'label' => 'Spacing Size',
						'default' => 10,
						'min'   => 1,
						'max'   => 200

					),
				)
			),
			'em'  => array(
				'title' => 'Emphasis',
				'code'  => '[em][/em]',
			),
		)
	),

	'Icon' => array(
		'elements' => array(
			'icon'  => array(
				'title' => 'Single Icon',
				'code'  => '[singleicon]',
				'attributes' => array(
					array(
				        'type' => 'fontawesome',
				        'name' => 'id',
				        'label' => 'Select Icon',
				        'default' => array(
				            '{{first}}',
				        ),
				    ),
				    array(
						'name'  => 'color',
						'type'  => 'color',
						'label' => 'Color',
					),
					array(
						'name'  => 'size',
						'type'  => 'slider',
						'label' => 'Size',
						'default' => 1,
						'min'   => 1,
						'max'   => 10,
						'step'	=> 0.1
					),
				)
			),

			'iconlistwrapper'  => array(
				'title' => 'Icon List Wrapper',
				'code'  => '[iconlistwrapper]
				<br/> => insert List with Icon Here
				<br/>[/iconlistwrapper]',
			),

			'iconlist'  => array(
				'title' => 'Icon List',
				'code'  => '[iconlist][/iconlist]',
				'attributes' => array(
					array(
				        'type' => 'fontawesome',
				        'name' => 'id',
				        'label' => 'Select Icon',
				        'default' => array(
				            '{{first}}',
				        ),
				    ),
				    array(
						'name'  => 'color',
						'type'  => 'color',
						'label' => 'Icon Color',
					),
					array(
						'name'  => 'spin',
						'type'  => 'toggle',
						'label' => 'Spin Icon',
					),
				)
			),

		),
	),

	'Element' => array(
		'elements'=> array(
			'singleimage'  => array(
				'title' => 'Single Image',
				'code'  => '[singleimage]',
				'attributes' => array(
					array(
						'name'  => 'image',
						'type'  => 'imageupload',
						'label' => 'Image',
					),
					array(
						'name'  => 'title',
						'type'  => 'textbox',
						'label' => 'Image Title',
					),
					array(
						'name'  => 'float',
						'type'  => 'select',
						'label' => 'Image Floating',
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
						'name'  => 'size',
						'type'  => 'slider',
						'label' => 'Image Width',
						'default' => 6,
						'min'   => 1,
						'max'   => 12,
					),
					array(
						'name'  => 'zoom',
						'type'  => 'toggle',
						'label' => 'Use themes zoom script',
					),
					array(
						'name'  => 'class',
						'type'  => 'textbox',
						'label' => 'CSS Class (Optional)',
					),
				)
			),
			'googlemap'  => array(
				'title' => 'Google Maps',
				'code'  => '[googlemap][/googlemap]',
				'attributes' => array(
					array(
						'name'  => 'title',
						'type'  => 'textbox',
						'label' => 'Map Title',
					),
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
						'name'  => 'zoom',
						'type'  => 'slider',
						'label' => 'Map Zoom',
						'default' => 14,
						'min'   => 1,
						'max'   => 21,
					),
					array(
						'name'  => 'ratio',
						'type'  => 'slider',
						'label' => 'Map Ratio',
						'default' => 0.5,
						'min'   => 0.1,
						'max'   => 2,
						'step'	=> 0.1
					),
					array(
						'name'  => 'popup',
						'type'  => 'toggle',
						'label' => 'Show popup',
					),
					array(
						'name'  => 'class',
						'type'  => 'textbox',
						'label' => 'CSS Class (Optional)',
					),
				)
			),
			'testimonial'  => array(
				'title' => 'Testimonial',
				'code'  => '[testimonial]',
				'attributes' => array(
					array(
						'name'  => 'image',
						'type'  => 'imageupload',
						'label' => 'Testimonial Image',
					),
					array(
						'name'  => 'author',
						'type'  => 'textbox',
						'label' => 'Testimonial Author',
					),
					array(
						'name'  => 'author_position',
						'type'  => 'textbox',
						'label' => 'Testimonial Author Additional Title',
					),
					array(
						'name'  => 'float',
						'type'  => 'select',
						'label' => 'Image Floating',
						'default' => 'left',
						'items' => array(
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
						'name'  => 'text',
						'type'  => 'textarea',
						'label' => 'Testimonial Content'
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
				'code'  => '[quote]',
				'attributes' => array(
					array(
						'name'  => 'text',
						'type'  => 'textarea',
						'label' => 'Quote text'
					),
					array(
						'name'  => 'author',
						'type'  => 'textbox',
						'label' => 'Quote Author',
					),
					array(
						'name'  => 'author_additional',
						'type'  => 'textbox',
						'label' => 'Quote Author Additional Text',
					),
					array(
						'name'  => 'float',
						'type'  => 'select',
						'label' => 'Quote Floating',
						'default' => 'left',
						'items' => array(
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
						'name'  => 'size',
						'type'  => 'slider',
						'label' => 'Quote size',
						'default' => 6,
						'min'   => 1,
						'max'   => 12,
					),
					array(
						'name'  => 'class',
						'type'  => 'textbox',
						'label' => 'CSS Class (Optional)',
					),
				),
			),
			'alert'  => array(
				'title' => 'Alert',
				'code'  => '[alert]',
				'attributes' => array(
					array(
						'name'  => 'type',
						'type'  => 'select',
						'label' => 'Alert Type',
						'default' => 'success',
						'items' => array(
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
						'name'  => 'main_text',
						'type'  => 'textbox',
						'label' => 'Main Text'
					),
					array(
						'name'  => 'second_text',
						'type'  => 'textbox',
						'label' => 'Second Text',
					),
					array(
						'name'  => 'show_close',
						'type'  => 'toggle',
						'label' => 'Show Close Button',
					),
					array(
						'name'  => 'class',
						'type'  => 'textbox',
						'label' => 'CSS Class (Optional)',
					),
				),
			),
			'button'  => array(
				'title' => ' Button',
				'code'  => '[button]',
				'attributes' => array(
					array(
						'name'  => 'type',
						'type'  => 'select',
						'label' => 'Button Type',
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
						'name'  => 'text',
						'type'  => 'textbox',
						'label' => 'Button Text'
					),
					array(
						'name'  => 'url',
						'type'  => 'textbox',
						'label' => 'Button URL',
						'default' => '#',
					),
					array(
						'name'  => 'open_new_tab',
						'type'  => 'toggle',
						'label' => 'Open on new tab',
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
	'Accordion' => array(
		'elements' => array(
			'example'  => array(
				'title' => 'Example',
				'code'  => "[accordion]
					<br/>[accordion-element title='First Accordion' collapsed='true']
					<br/>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec posuere aliquam vestibulum. Aenean id feugiat tortor, faucibus posuere ante. Aliquam ornare diam quis sem consequat, ac consequat massa pretium. Phasellus ac nisl vel libero tempor hendrerit et vel magna. Pellentesque semper, velit id bibendum pharetra, justo urna aliquam turpis, vel consectetur sapien odio id erat. Aenean dolor elit, elementum quis feugiat mattis, vehicula in arcu. Etiam pellentesque rhoncus risus vel elementum. Nam aliquam sagittis elementum.
					<br/>[/accordion-element]
					<br/>[accordion-element title='Second Accordion' collapsed='false']
					<br/>Praesent luctus mattis mi, ut condimentum neque cursus sed. Etiam at metus vel odio porttitor condimentum nec ut erat. Pellentesque semper elit et metus tempus, dictum consectetur diam congue. In cursus, augue non dignissim ullamcorper, purus lorem blandit leo, ut facilisis tellus tortor tincidunt nibh. Pellentesque ullamcorper posuere orci, vitae interdum tellus pellentesque ut. Integer eu ipsum sit amet sem lobortis volutpat eu mollis dui. Curabitur nec tortor vitae sapien auctor commodo. Praesent ut eros sed est fermentum consectetur. Ut quis quam ut lacus varius rutrum. Nullam scelerisque sodales lacinia.
					<br/>[/accordion-element]
					<br/>[/accordion]",
			),
			'accordion'  => array(
				'title' => 'Wrapper',
				'code'  => "[accordion]<br/>->> Replace this text with accordion content shortcode<br/>[/accordion]",
				'attributes' => array(
					array(
						'name'  => 'class',
						'type'  => 'textbox',
						'label' => 'CSS Class (Optional)',
					),
				)
			),
			'accordioncontent'  => array(
				'title' => 'Content',
				'code'  => "[accordion-element]Enter your content here[/accordion-element]",
				'attributes' => array(
					array(
						'name'  => 'title',
						'type'  => 'textbox',
						'label' => 'Accordion Title'
					),
					array(
						'name'  => 'collapsed',
						'type'  => 'toggle',
						'label' => 'Collapse Accordion',
					),
					array(
						'name'  => 'class',
						'type'  => 'textbox',
						'label' => 'CSS Class (Optional)',
					),
				),
			),

		)
	),
	'Tabbing' => array(
		'elements' => array(
			'example'  => array(
				'title' => 'Example',
				'code'  => "[tab-heading-wrapper]
					<br/>[tab-heading id='firstid' title='First Tab' active='true']
					<br/>[tab-heading id='secondid' title='Second Tab' active='false']
					<br/>[/tab-heading-wrapper]
					<br/>
					<br/>[tab-content-wrapper]
					<br/>[tab-content id='firstid' active='true']Praesent luctus mattis mi, ut condimentum neque cursus sed. Etiam at metus vel odio porttitor condimentum nec ut erat. Pellentesque semper elit et metus tempus, dictum consectetur diam congue. In cursus, augue non dignissim ullamcorper, purus lorem blandit leo, ut facilisis tellus tortor tincidunt nibh. Pellentesque ullamcorper posuere orci, vitae interdum tellus pellentesque ut. Integer eu ipsum sit amet sem lobortis volutpat eu mollis dui. Curabitur nec tortor vitae sapien auctor commodo. Praesent ut eros sed est fermentum consectetur. Ut quis quam ut lacus varius rutrum. Nullam scelerisque sodales lacinia.[/tab-content]
					<br/>[tab-content id='secondid' active='false']Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec ut libero at ante cursus congue. Praesent vitae tellus mauris. Nullam at iaculis quam. Aenean justo ipsum, convallis ut dui non, accumsan elementum diam. Vivamus vestibulum pretium adipiscing. Aliquam molestie, elit eget ultricies facilisis, elit neque lacinia purus, sit amet vulputate justo dui et nunc. Nam vehicula turpis odio, ut bibendum enim blandit eget. Phasellus sit amet dolor a leo placerat mollis sed sit amet sem.[/tab-content]
					<br/>[/tab-content-wrapper]",
			),
			'tabheadingwrapper'  => array(
				'title' => 'Heading Wrapper',
				'code'  => '[tab-heading-wrapper]<br/>-->> Replace this content with tab heading shortcode<br/>[/tab-heading-wrapper]',
				'attributes' => array(
					array(
						'name'  => 'class',
						'type'  => 'textbox',
						'label' => 'CSS Class (Optional)',
					),
				),
			),
			'tabheading'  => array(
				'title' => 'Heading Content',
				'code'  => '[tab-heading]',
				'attributes' => array(
					array(
						'name'  => 'id',
						'type'  => 'textbox',
						'label' => 'Tab Unique ID',
					),
					array(
						'name'  => 'title',
						'type'  => 'textbox',
						'label' => 'Tab Text',
					),
					array(
						'name'  => 'active',
						'type'  => 'toggle',
						'label' => 'This tab is currently active',
					),
				)
			),
			'tabcontentwrapper'  => array(
				'title' => 'Content Wrapper',
				'code'  => '[tab-content-wrapper]<br/>-->> Replace this content with tab content shortcode<br/>[/tab-content-wrapper]',
				'attributes' => array(
					array(
						'name'  => 'class',
						'type'  => 'textbox',
						'label' => 'CSS Class (Optional)',
					),
				),
			),
			'tabcontent'  => array(
				'title' => 'Content',
				'code'  => '[tab-content]Enter your content here[/tab-content]',
				'attributes' => array(
					array(
						'name'  => 'id',
						'type'  => 'textbox',
						'label' => 'Tab Unique ID',
					),
					array(
						'name'  => 'active',
						'type'  => 'toggle',
						'label' => 'This tab is currently active',
					),
				)
			),
		)
	),
	'Image Slider' => array(
		'elements' => array(
			'example'  => array(
				'title' => 'Example',
				'code'  => "[imgslider-wrapper]
					<br/>[imgslider imgurl='http://placehold.it/1280x800']
					<br/>[imgslider imgurl='http://placehold.it/1280x800']
					<br/>[imgslider imgurl='http://placehold.it/1280x800']
					<br/>[/imgslider-wrapper]",
			),
			'imgslider'  => array(
				'title' => 'Wrapper',
				'code'  => '[imgslider-wrapper]<br/>->> Replace this text with image slider content shortcode<br/>[/imgslider-wrapper]',
				'attributes' => array(
					array(
						'name'  => 'class',
						'type'  => 'textbox',
						'label' => 'CSS Class (Optional)',
					),
				),
			),
			'imgslidercontent'  => array(
				'title' => 'Content',
				'code'  => '[imgslider]',
				'attributes' => array(
					array(
						'name'  => 'imgurl',
						'type'  => 'imageupload',
						'label' => 'Insert your image',
					),
				)
			),
		)
	),
	'Team' => array(
		'elements' => array(
            'teamblock'  => array(
                'title' => 'Team Block',
                'code'  => '[teamblock]',
                'attributes' => array(
                    array(
                        'type' => 'multiselect',
                        'name' => 'member',
                        'label' => 'Team Member <br><small>(Press CTRL to multi selection)</small>',
                        'items' => array(
                            'data' => array(
                                array(
                                    'source' => 'function',
                                    'value'  => 'jeg_get_team_member',
                                ),
                            ),
                        ),
                    ),
                )
            ),
            /*
			'example' => array(
				'title' => 'Example',
				'code' => '[team-wrapper]
					<br/>[team-row]
					<br/>[team-content imgurl="http://placehold.it/110x110" teamname="John Doe" secondline="CEO of SomeCompany.com"]
					<br/>[team-content-text]Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec ut libero at ante cursus congue. Praesent vitae tellus mauris. Nullam at iaculis quam. Aenean justo ipsum, convallis ut dui non, accumsan elementum diam. Vivamus vestibulum pretium adipiscing. [/team-content-text]
					<br/>[team-social]
					<br/>[team-social-item url="http://facebook.com" text="facebook"]
					<br/>[team-social-item url="http://twitter.com" text="twitter"]
					<br/>[/team-social]
					<br/>[/team-content]

					<br/>[team-content imgurl="http://placehold.it/110x110" teamname="John Doe" secondline="CEO of SomeCompany.com"]
					<br/>[team-content-text]Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec ut libero at ante cursus congue. Praesent vitae tellus mauris. Nullam at iaculis quam. Aenean justo ipsum, convallis ut dui non, accumsan elementum diam. Vivamus vestibulum pretium adipiscing. [/team-content-text]
					<br/>[team-social]
					<br/>[team-social-item url="http://facebook.com" text="facebook"]
					<br/>[team-social-item url="http://twitter.com" text="twitter"]
					<br/>[/team-social]
					<br/>[/team-content]
					<br/>[/team-row]

					<br/>[team-row]
					<br/>[team-content imgurl="http://placehold.it/110x110" teamname="John Doe" secondline="CEO of SomeCompany.com"]
					<br/>[team-content-text]Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec ut libero at ante cursus congue. Praesent vitae tellus mauris. Nullam at iaculis quam. Aenean justo ipsum, convallis ut dui non, accumsan elementum diam. Vivamus vestibulum pretium adipiscing. [/team-content-text]
					<br/>[team-social]
					<br/>[team-social-item url="http://facebook.com" text="facebook"]
					<br/>[team-social-item url="http://twitter.com" text="twitter"]
					<br/>[/team-social]
					<br/>[/team-content]

					<br/>[team-content imgurl="http://placehold.it/110x110" teamname="John Doe" secondline="CEO of SomeCompany.com"]
					<br/>[team-content-text]Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec ut libero at ante cursus congue. Praesent vitae tellus mauris. Nullam at iaculis quam. Aenean justo ipsum, convallis ut dui non, accumsan elementum diam. Vivamus vestibulum pretium adipiscing. [/team-content-text]
					<br/>[team-social]
					<br/>[team-social-item url="http://facebook.com" text="facebook"]
					<br/>[team-social-item url="http://twitter.com" text="twitter"]
					<br/>[/team-social]
					<br/>[/team-content]
					<br/>[/team-row]

					<br/>[/team-wrapper]'
			),
			'teamwrapper'  => array(
				'title' => 'Wrapper',
				'code'  => '[team-wrapper]<br/>-->> Replace this content with team row shortcode<br/>[/team-wrapper]',
			),
			'teamrow'  => array(
				'title' => 'Team Row',
				'code'  => '[team-row]<br/>-->> Replace this content with 2 (two) team content wrapper<br/>[/team-row]',
			),
			'teamcontent'  => array(
				'title' => 'Content Wrapper',
				'code'  => '[team-content]
					<br/>-->> Replace this content with Team Content Shortcode
					<br/>-->> Replace this content with Team Social Wrapper
					<br/>[/team-content]',
				'attributes' => array(
					array(
						'name'  => 'imgurl',
						'type'  => 'imageupload',
						'label' => 'Team Image',
					),
					array(
						'name'  => 'teamname',
						'type'  => 'textbox',
						'label' => 'Team name',
					),
					array(
						'name'  => 'secondline',
						'type'  => 'textbox',
						'label' => 'Team Second Line',
					),
				)
			),
			'teamcontenttext'  => array(
				'title' => 'Team Content',
				'code'  => '[team-content-text]Put your content right here[/team-content-text]',
			),
			'teamsocialwrapper'  => array(
				'title' => 'Team Social Wrapper',
				'code'  => '[team-social]
				<br/>-->put your Team Social Item right here
				<br/>[/team-social]',
			),
			'teamsocialitem'  => array(
				'title' => 'Team Social Item',
				'code'  => '[team-social-item]',
				'attributes' => array(
					array(
						'name'  => 'url',
						'type'  => 'textbox',
						'label' => 'Social URL',
					),
					array(
						'name'  => 'text',
						'type'  => 'textbox',
						'label' => 'Social URL Text',
					),
				)
			),
            */
		),
	),
	'Media Embeed' => array(
		'elements' => array(
            'youtube'  => array(
                'title' => 'Youtube',
                'code'  => '[youtube]',
                'attributes' => array(
                    array(
                        'name'  => 'url',
                        'type'  => 'textbox',
                        'label' => 'Youtube video url',
                    ),
                    array(
                        'name'  => 'autoplay',
                        'type'  => 'toggle',
                        'label' => 'Enable autoplay video',
                    ),
                    array(
                        'name'  => 'repeat',
                        'type'  => 'toggle',
                        'label' => 'Enable repeating vimeo',
                    ),
                    array(
                        'name'  => 'class',
                        'type'  => 'textbox',
                        'label' => 'CSS Class (Optional)',
                    ),
                )
            ),
			'vimeo'  => array(
				'title' => 'Vimeo',
				'code'  => '[vimeo]',
				'attributes' => array(
					array(
						'name'  => 'url',
						'type'  => 'textbox',
						'label' => 'Vimeo video url',
					),
                    array(
                        'name'  => 'autoplay',
                        'type'  => 'toggle',
                        'label' => 'Enable autoplay video',
                    ),
                    array(
                        'name'  => 'repeat',
                        'type'  => 'toggle',
                        'label' => 'Enable repeating vimeo',
                    ),
					array(
						'name'  => 'class',
						'type'  => 'textbox',
						'label' => 'CSS Class (Optional)',
					),
				)
			),
			'soundcloud'  => array(
				'title' => 'Soundcloud',
				'code'  => '[soundcloud]',
				'attributes' => array(
					array(
						'name'  => 'url',
						'type'  => 'textbox',
						'label' => 'Soundcloud video url',
					),
					array(
						'name'  => 'class',
						'type'  => 'textbox',
						'label' => 'CSS Class (Optional)',
					),
				)
			),
			'html5video'  => array(
				'title' => 'HTML 5 Video',
				'code'  => '[html5video]',
				'attributes' => array(
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
					array(
						'name'  => 'class',
						'type'  => 'textbox',
						'label' => 'CSS Class (Optional)',
					),
				)
			),
		)
	),
	'360 View' => array(
		'elements' => array(
			'element'  => array(
				'title' => '360 View',
				'code'  => '[360view]',
				'attributes' => array(
					array(
				        'type' => 'notebox',
				        'name' => 'nb_body',
				        'label' => '360 Image viewer',
				        'description' =>
				        "<b>URL PATTERN :</b> <ol><li>Image URL Pattern, use url pattern with format : http://yourdomain.com/images/##.jpg </li><li> ## will be replaced with image sequence. so if you having more than 99 image, you will need to increase to 3 (###) </li><li>Image number will begin from 01, and give your image name in sequence</li></ol>
				        	<b>NUMBER OF IMAGE :</b> <ol><li>for more smooth animation, please provide more than 60 image</li></ol>",
				        'status' => 'success',
				    ),
					array(
						'name'  => 'urlpattern',
						'type'  => 'textbox',
						'label' => 'Image URL Pattern',
					),
					array(
						'name'  => 'numberimage',
						'type'  => 'slider',
						'label' => 'Number of image',
						'default' => 60,
						'min'   => 30,
						'max'   => 200,
					),
					array(
						'name'  => 'autoplay',
						'type'  => 'toggle',
						'label' => 'Enable autoplay animation',
					),
					array(
						'name'  => 'class',
						'type'  => 'textbox',
						'label' => 'CSS Class (Optional)',
					),
				)
			),
		)
	)

);

/**
 * EOF
 */