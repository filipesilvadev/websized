<?php

return array(
	'title' =>  'Jkreativ' ,
	'logo' => '',
	'menus' => array(
		array(
			'title' =>  'General Setting' ,
			'name' => 'generalsetting',
			'icon' => 'font-awesome:fa-check',
			'menus' => array(

				array(
					'title' =>  'General Setting' ,
					'name' => 'generalsetting',
					'icon' => 'font-awesome:fa-asterisk',
					'controls' => array(
						array(
					        'type' => 'textarea',
					        'name' => 'website_copyright',
					        'label' =>  'Website Copyright' ,
					        'default' => '&copy; Jegtheme 2013. All Rights Reserved. ',
					    ),
                        array(
                            'type' => 'upload',
                            'name' => 'website_favico',
                            'label' =>  'Favico' ,
                            'description' => 'Upload your favico with .ico extension'
                        ),
                        array(
                            'type' => 'toggle',
                            'name' => 'enable_section_builder',
                            'label' =>  'Enable Legacy Section Builder' ,
                            'description' =>  'if you are already using section builder from previous version of jkreativ (bellow version 2.0.0), you can enable this option to use legacy section builder.' ,
                        ),
                        array(
                            'type' => 'toggle',
                            'name' => 'disable_smoothscroll',
                            'label' =>  'Disable smooth scroll' ,
                            'description' =>  'enable this option to disable smooth scroll effect' ,
                        ),
					)
				),

				array(
					'title' =>  'Right Click Behaviour' ,
					'name' => 'rightclick',
					'icon' => 'font-awesome:fa-shield',
					'controls' => array(

						array(
					        'type' => 'toggle',
					        'name' => 'disable_rightclick',
					        'label' =>  'Disable Right Mouse click' ,
					        'description' =>  'when user right click your website, they will get bellow message' ,
					    ),

						array(
							'type' => 'section',
							'title' =>  'Right mouse click behaviour' ,
							'name' => 'right_mouse_click_behaviour',
							'description' =>  'You can disable mouse click right here and give apropriate message' ,
							'dependency' => array(
								'field'    => 'disable_rightclick',
								'function' => 'vp_dep_boolean',
							),
							'fields' => array(
							    array(
							        'type' => 'wpeditor',
							        'name' => 'msg_rightclick',
							        'label' =>  'Credit' ,
							        'description' =>  'Please use shortcode to build content of credit' ,
							        'use_external_plugins' => '1',
									'disabled_externals_plugins' => '',
									'disabled_internals_plugins' => '',
							    ),

								array(
							        'type' => 'toggle',
							        'name' => 'rightclick_background_music',
							        'label' =>  'Use Background Music' ,
							        'description' =>  'when user right click your website, it will automatically play music player' ,
							        'default' => '0',
							    ),

								array(
							        'type' => 'upload',
							        'name' => 'rightclick_mp3',
							        'label' =>  'MP3 File for music background' ,
							        'dependency' => array(
										'field'    => 'rightclick_background_music',
										'function' => 'vp_dep_boolean',
									),
							    ),

								array(
							        'type' => 'upload',
							        'name' => 'rightclick_ogg',
							        'label' =>  'OGG File for music background' ,
							        'dependency' => array(
										'field'    => 'rightclick_background_music',
										'function' => 'vp_dep_boolean',
									),
							    ),
							)
						),

					)
				),

				array(
					'title' =>  'Social Icon' ,
					'name' => 'social_icon',
					'icon' => 'font-awesome:fa-share',
					'controls' => array(
						array(
							'type' => 'section',
							'title' =>  'Insert URL of your social profile' ,
							'name' => 'right_mouse_click_behaviour',
							'description' =>  'Social profile will only shown if you are adding url inside this page' ,
							'fields' => array(
								array(
							        'type' => 'textbox',
							        'name' => 'social_facebook',
							        'label' =>  'Facebook'
							    ),
							    array(
							        'type' => 'textbox',
							        'name' => 'social_twitter',
							        'label' =>  'Twitter'
							    ),
							    array(
							        'type' => 'textbox',
							        'name' => 'social_linkedin',
							        'label' =>  'Linkedin'
							    ),
							    array(
							        'type' => 'textbox',
							        'name' => 'social_googleplus',
							        'label' =>  'Google Plus'
							    ),
							    array(
							        'type' => 'textbox',
							        'name' => 'social_pinterest',
							        'label' =>  'Pinterest'
							    ),
							    array(
							        'type' => 'textbox',
							        'name' => 'social_github',
							        'label' =>  'Github'
							    ),
							    array(
							        'type' => 'textbox',
							        'name' => 'social_flickr',
							        'label' =>  'Flickr'
							    ),
							    array(
							        'type' => 'textbox',
							        'name' => 'social_tumblr',
							        'label' =>  'Tumblr'
							    ),
							    array(
							        'type' => 'textbox',
							        'name' => 'social_dribbble',
							        'label' =>  'Dribbble'
							    ),
							    array(
							        'type' => 'textbox',
							        'name' => 'social_soundcloud',
							        'label' =>  'Soundcloud'
							    ),
							    array(
							        'type' => 'textbox',
							        'name' => 'social_lastfm',
							        'label' =>  'Fastfm'
							    ),
							    array(
							        'type' => 'textbox',
							        'name' => 'social_behance',
							        'label' =>  'Behance'
							    ),
							    array(
							        'type' => 'textbox',
							        'name' => 'social_instagram',
							        'label' =>  'Instagram'
							    ),
							    array(
							        'type' => 'textbox',
							        'name' => 'social_vimeo',
							        'label' =>  'Vimeo'
							    ),
                                array(
                                    'type' => 'textbox',
                                    'name' => 'social_youtube',
                                    'label' =>  'Youtube'
                                ),
							    array(
							        'type' => 'textbox',
							        'name' => 'social_500px',
							        'label' =>  '500px'
							    ),
                                array(
                                    'type' => 'textbox',
                                    'name' => 'social_vk',
                                    'label' =>  'VK'
                                ),
							)
						),
					)
				),

				array(
					'title' =>  'Footer for landing page and Extended Portfolio' ,
					'name' => 'pagetemplate',
					'icon' => 'font-awesome:fa-sun-o',
					'controls' => array(
						array(
							'type' => 'notebox',
							'name' => 'landing_footer_info',
							'label' =>  'Footer for landing and extended portfolio' ,
							'description' =>  'Enable this option, and you will have additional menu for landing page and extended portfolio' ,
							'status' => 'info',
						),

						array(
					        'type' => 'toggle',
					        'name' => 'enable_footer_landing',
					        'label' =>  'Enable footer for landing &amp; portfolio' ,
					        'default' => false,
					    ),

						array(
							'type' => 'section',
							'title' =>  'Footer Section' ,
							'name' => 'footer_section',
							'dependency' => array(
								'field'    => 'enable_footer_landing',
								'function' => 'vp_dep_boolean',
							),
							'fields' => array(
								 array(
									'type' 				=> 'radioimage',
									'name' 				=> 'footerlayout',
									'label' 			=> 'Choose your footer layout',
									'description' 		=> 'you can assign content of footer from widget area',
									'item_max_height' 	=> '80',
									'item_max_width' 	=> '80',
									'items' => array(
										array(
											'value' => '3column',
											'label' => '3 Column Layout',
											'img' => get_template_directory_uri() . '/public/img/footerlayout/1.png',
										),
										array(
											'value' => '4column',
											'label' => '4 Column Layout',
											'img' => get_template_directory_uri() . '/public/img/footerlayout/2.png',
										),
										array(
											'value' => '3column1',
											'label' => '3 Column Layout Left Big',
											'img' => get_template_directory_uri() . '/public/img/footerlayout/3.png',
										),
										array(
											'value' => '3column2',
											'label' => '3 Column Layout Center Big',
											'img' => get_template_directory_uri() . '/public/img/footerlayout/4.png',
										),
										array(
											'value' => '3column3',
											'label' => '3 Column Layout Right Big',
											'img' => get_template_directory_uri() . '/public/img/footerlayout/5.png',
										),
									),
									'default' => array('4column'),
								),
							)
						),


					)
				),

				array(
					'title' =>  'Blog General Template' ,
					'name' => 'singleblog',
					'icon' => 'font-awesome:fa-thumb-tack',
					'controls' => array(

						array(
							'type' => 'select',
							'name' => 'single_blog_template',
							'label' =>  'Single Blog Template' ,
							'description' =>  'you can also override this from single blog page' ,
							'items' => array(
								array(
									'value' => 'normal',
									'label' =>  'Normal Layout' ,
								),
								array(
									'value' => 'clean',
									'label' =>  'Clean Layout' ,
								),
								array(
									'value' => 'coverwidth',
									'label' =>  'Cover Layout' ,
								),
								array(
									'value' => 'extrawidth',
									'label' =>  'Wide Layout' ,
								),
							),
							'default' => array(
								'normal',
							),
							'validation' => 'required',
						),

						array(
							'type' => 'section',
							'title' =>  'Single - Normal Blog' ,
							'name' => 'general_blog_normal',
							'dependency' => array(
								'field'    => 'single_blog_template',
								'function' => 'jeg_choose_normal_template',
							),
							'fields' => array(
								array(
									'name'  => 'general_blog_normal_page_position',
									'type'  => 'select',
									'label' =>  'General Blog Position' ,
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
									'label' =>  'General Blog width' ,
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
							        'label' =>  'Show sidebar for general blog' ,
							        'description' =>  'enable this option to show sidebar for general blog' ,
							        'default' => '0',
							    ),
							    array(
									'type' => 'select',
									'name' => 'general_blog_normal_sidebar',
									'label' =>  'General Blog Sidebar' ,
									'default' => '{{first}}',
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value'  => 'jeg_get_sidebar',
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
							        'label' =>  'Hide share general blog' ,
							        'default' => '0',
							    ),
							    array(
							        'type' => 'toggle',
							        'name' => 'general_blog_normal_hide_meta',
							        'label' =>  'Hide meta for general blog' ,
							        'default' => '0',
							    ),

							),
						),


						array(
							'type' => 'section',
							'title' =>  'Single - Clean Blog' ,
							'name' => 'general_blog_clean',
							'dependency' => array(
								'field'    => 'single_blog_template',
								'function' => 'jeg_choose_cleanblog_template',
							),
							'fields' => array(
								array(
							        'type' => 'toggle',
							        'name' => 'general_blog_clean_hide_top_meta',
							        'label' =>  'Hide top meta for blog' ,
							        'default' => '0',
							    ),
							    array(
							        'type' => 'toggle',
							        'name' => 'general_blog_clean_hide_bottom_meta',
							        'label' =>  'Hide bottom meta for blog' ,
							        'default' => '0',
							    ),
							    array(
							        'type' => 'toggle',
							        'name' => 'general_blog_clean_hide_share',
							        'label' =>  'Hide share blog' ,
							        'default' => '0',
							    ),
							),
						),


						array(
							'type' => 'section',
							'title' =>  'Single - Cover Blog' ,
							'name' => 'general_blog_cover',
							'dependency' => array(
								'field'    => 'single_blog_template',
								'function' => 'jeg_choose_cover_template',
							),
							'fields' => array(
							    array(
									'type' => 'select',
									'name' => 'general_blog_cover_sidebar',
									'label' =>  'General Cover Sidebar' ,
									'default' => '{{first}}',
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value'  => 'jeg_get_sidebar',
											),
										),
									),
								),
								array(
							        'type' => 'toggle',
							        'name' => 'general_blog_cover_hide_share',
							        'label' =>  'Hide share general blog' ,
							        'default' => '0',
							    ),
							    array(
							        'type' => 'toggle',
							        'name' => 'general_blog_cover_hide_meta',
							        'label' =>  'Hide meta for general blog' ,
							        'default' => '0',
							    ),
							),
						),


						array(
							'type' => 'section',
							'title' =>  'Single - Wide Blog' ,
							'name' => 'general_blog_wide',
							'dependency' => array(
								'field'    => 'single_blog_template',
								'function' => 'jeg_choose_extra_template',
							),
							'fields' => array(
							    array(
									'type' => 'select',
									'name' => 'general_blog_wide_sidebar',
									'label' =>  'General Wide Sidebar' ,
									'default' => '{{first}}',
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value'  => 'jeg_get_sidebar',
											),
										),
									),
								),

								array(
							        'type' => 'toggle',
							        'name' => 'general_blog_extra_hide_share',
							        'label' =>  'Hide share general blog' ,
							        'default' => '0',
							    ),
							    array(
							        'type' => 'toggle',
							        'name' => 'general_blog_extra_hide_meta',
							        'label' =>  'Hide meta for general blog' ,
							        'default' => '0',
							    ),
							),
						),


					)
				),

				array(
					'title' =>  'Additional Template' ,
					'name' => 'additionaltemplate',
					'icon' => 'font-awesome:fa-bookmark',
					'controls' => array(

						array(
							'type' => 'select',
							'name' => 'archive_template',
							'description' =>  'this will include date archive, author post, category, and tag' ,
							'label' =>  'Archive Template' ,
							'items' => array(
								array(
									'value' => 'normal',
									'label' =>  'Normal Layout' ,
								),
								array(
									'value' => 'masonry',
									'label' =>  'Masonry Layout' ,
								),
							),
							'default' => array(
								'masonry',
							),
							'validation' => 'required',
						),

						array(
							'type' => 'section',
							'title' =>  'Archieve Normal Template' ,
							'name' => 'archieve_normal_template',
							'dependency' => array(
								'field'    => 'archive_template',
								'function' => 'jeg_choose_normal_template',
							),
							'fields' => array(
								array(
							        'type' => 'toggle',
							        'name' => 'archieve_normal_show_sidebar',
							        'label' =>  'Show sidebar for archieve' ,
							        'description' =>  'enable this option to show sidebar for archieve page' ,
							        'default' => '0',
							    ),
							    array(
									'type' => 'select',
									'name' => 'archieve_normal_sidebar',
									'label' =>  'Archieve Sidebar' ,
									'default' => '{{first}}',
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value'  => 'jeg_get_sidebar',
											),
										),
									),
									'dependency' => array(
										'field'    => 'archieve_normal_show_sidebar',
										'function' => 'vp_dep_boolean',
									),
								),
							),
						),

						array(
							'type' => 'select',
							'name' => 'search_template',
							'label' =>  'Search Template' ,
							'items' => array(
								array(
									'value' => 'normal',
									'label' =>  'Normal Layout' ,
								),
								array(
									'value' => 'masonry',
									'label' =>  'Masonry Layout' ,
								),
							),
							'default' => array(
								'masonry',
							),
							'validation' => 'required',
						),

						array(
							'type' => 'section',
							'title' =>  'Search Normal Template' ,
							'name' => 'searchnormaltemplate',
							'dependency' => array(
								'field'    => 'search_template',
								'function' => 'jeg_choose_normal_template',
							),
							'fields' => array(
								array(
							        'type' => 'toggle',
							        'name' => 'search_normal_show_sidebar',
							        'label' =>  'Show sidebar for search result' ,
							        'description' =>  'enable this option to show sidebar for search result' ,
							        'default' => '0',
							    ),
							    array(
									'type' => 'select',
									'name' => 'search_normal_sidebar',
									'label' =>  'Search Sidebar' ,
									'default' => '{{first}}',
									'items' => array(
										'data' => array(
											array(
												'source' => 'function',
												'value'  => 'jeg_get_sidebar',
											),
										),
									),
									'dependency' => array(
										'field'    => 'search_normal_show_sidebar',
										'function' => 'vp_dep_boolean',
									),
								),
							),
						),
					)
				),

				array(
					'title' =>  'Additional Style' ,
					'name' => 'styleadditional',
					'icon' => 'font-awesome:fa-code',
					'controls' => array(
						array(
							'type' => 'notebox',
							'name' => 'additionalinfo',
							'label' =>  'Info' ,
							'description' =>  'put your additional css right here. so if you updating themes, you wont lose any of your additonal css' ,
							'status' => 'info',
						),
						array(
							'type' => 'codeeditor',
							'name' => 'styleeditor',
							'label' =>  'Custom CSS' ,
							'description' =>  'Put your custom css right here.' ,
							'theme' => 'github',
							'mode' => 'css',
						),
					)
				),

				array(
					'title' =>  'Additional Javascript' ,
					'name' => 'scriptadditional',
					'icon' => 'font-awesome:fa-code',
					'controls' => array(
						array(
							'type' => 'notebox',
							'name' => 'additionalinfo',
							'label' =>  'Info' ,
							'description' =>  'put your additional javascript right here. You can use it for your tracking (like google analytic or else)' ,
							'status' => 'info',
						),
						array(
							'type' => 'codeeditor',
							'name' => 'jseditor',
							'label' =>  'Additional Javascript' ,
							'description' =>  'Put your additional javascript right here. You don\'t need to include script tag' ,
							'theme' => 'github',
							'mode' => 'javascript',
						),
					)
				),


                array(
                    'title' =>  'Additional Font' ,
                    'name' => 'fontadditioanl',
                    'icon' => 'font-awesome:fa-font',
                    'controls' => array(
                        array(
                            'type' => 'notebox',
                            'name' => 'additionalfontinfo',
                            'label' =>  'Info',
                            'description' =>
                                "<ol>
                                    <li>If you upload font on this additional font block, google font on customizer will be disabled and overwrited by this item setup</li>
                                    <li>Please fill all font. if you having only one kind of font, you can geenerate all of font combination on : <a href='http://www.fontsquirrel.com/tools/webfont-generator' target='_blank'>font squirrel generator</a></li>
                                </ol>",
                            'status' => 'info',
                        ),

                        array(
                            'type' => 'section',
                            'title' =>  'First Additional Font Block' ,
                            'name' => 'additional_font_1',
                            'fields' => array(

                                array(
                                    'type' => 'textbox',
                                    'name' => 'additional_font_1_fontname',
                                    'label' =>  'Font Name' ,
                                    'description' =>  'please fill your font name...' ,
                                ),

                                array(
                                    'type' => 'upload',
                                    'name' => 'additional_font_1_eot',
                                    'label' =>  'EOT File' ,
                                ),

                                array(
                                    'type' => 'upload',
                                    'name' => 'additional_font_1_woff',
                                    'label' =>  'WOFF File' ,
                                ),

                                array(
                                    'type' => 'upload',
                                    'name' => 'additional_font_1_ttf',
                                    'label' =>  'TTF File' ,
                                ),

                                array(
                                    'type' => 'upload',
                                    'name' => 'additional_font_1_svg',
                                    'label' =>  'SVG File' ,
                                ),
                            )
                        ),


                        array(
                            'type' => 'section',
                            'title' =>  'Second Additional Font Block' ,
                            'name' => 'additional_font_2',
                            'fields' => array(

                                array(
                                    'type' => 'textbox',
                                    'name' => 'additional_font_2_fontname',
                                    'label' =>  'Font Name' ,
                                    'description' =>  'please fill your font name...' ,
                                ),

                                array(
                                    'type' => 'upload',
                                    'name' => 'additional_font_2_eot',
                                    'label' =>  'EOT File' ,
                                ),

                                array(
                                    'type' => 'upload',
                                    'name' => 'additional_font_2_woff',
                                    'label' =>  'WOFF File' ,
                                ),

                                array(
                                    'type' => 'upload',
                                    'name' => 'additional_font_2_ttf',
                                    'label' =>  'TTF File' ,
                                ),

                                array(
                                    'type' => 'upload',
                                    'name' => 'svg',
                                    'label' =>  'SVG File' ,
                                ),
                            )
                        ),


                        array(
                            'type' => 'section',
                            'title' =>  'Third Additional Font Block' ,
                            'name' => 'additional_font_3',
                            'fields' => array(

                                array(
                                    'type' => 'textbox',
                                    'name' => 'additional_font_3_fontname',
                                    'label' =>  'Font Name' ,
                                    'description' =>  'please fill your font name...' ,
                                ),

                                array(
                                    'type' => 'upload',
                                    'name' => 'additional_font_3_eot',
                                    'label' =>  'EOT File' ,
                                ),

                                array(
                                    'type' => 'upload',
                                    'name' => 'additional_font_3_woff',
                                    'label' =>  'WOFF File' ,
                                ),

                                array(
                                    'type' => 'upload',
                                    'name' => 'additional_font_3_ttf',
                                    'label' =>  'TTF File' ,
                                ),

                                array(
                                    'type' => 'upload',
                                    'name' => 'additional_font_3_svg',
                                    'label' =>  'SVG File' ,
                                ),
                            )
                        ),
                    )
                ),

			)
		),

		array(
			'title' =>  'Woocomerce Setting' ,
			'name' => 'woosetting',
			'icon' => 'font-awesome:fa-shopping-cart',
			'menus' => array(
				array(
					'title' =>  'Shop Page' ,
					'name' => 'shoppage',
					'icon' => 'font-awesome:fa-star',
					'controls' => array(

						array (
							'type' => 'radiobutton',
							'name' => 'product_type',
							'label' => 'Product layout type',
							'description' => 'choose between normal or masonry layout',
							'default' => 'normal',
							'items' => array(
								array(
									'value' => 'normal',
									'label' => 'Normal',
								),
								array(
									'value' => 'masonry',
									'label' => 'Masonry',
								),
							),
						),

						array(
							'type' => 'slider',
							'name' => 'product_width',
							'label' =>  'Product thumbnail size (width)' ,
							'description' =>  'set your product width thumbnail size on shop page' ,
							'min' => '450',
					        'max' => '1000',
					        'step' => '10',
					        'default' => '500',
						),

						array(
							'type' => 'slider',
							'name' => 'item_height',
							'label' =>  'Product thumbnail height dimension' ,
							'description' =>  'product height dimension base on Product thumbnail size' ,
							'min' => '0.1',
					        'max' => '3',
					        'step' => '0.1',
					        'default' => '1',
					        'dependency' => array(
								'field'    => 'product_type',
								'function' => 'jeg_portfolio_themes_height_value',
							),
						),
						array(
							'type' => 'toggle',
							'name' => 'product_use_margin',
							'label' =>  'Use image product margin' ,
						),

						array(
							'type' => 'slider',
							'name' => 'product_margin_size',
							'label' =>  'Product Margin size' ,
							'description' =>  'in pixel' ,
							'min' => '2',
					        'max' => '20',
					        'step' => '1',
					        'default' => '5',
					        'dependency' => array(
								'field'    => 'product_use_margin',
								'function' => 'vp_dep_boolean',
							),
						),


						array(
							'type' => 'toggle',
							'name' => 'override_overlay',
							'label' =>  'Override Product Overlay' ,
						),

						array(
							'type' => 'section',
							'title' =>  'Product Overlay' ,
							'name' => 'product_overlay',
							'dependency' => array(
								'field'    => 'override_overlay',
								'function' => 'vp_dep_boolean',
							),
							'fields' => array(
								array(
							        'type' => 'color',
							        'name' => 'product_overlay_color',
							        'label' => 'Product Overlay Color',
							        'format' => 'rgba',
							    ),
							    array(
									'type' => 'toggle',
									'name' => 'product_overlay_text_switch',
									'label' =>  'Switch product text color on overlay' ,
								),
							)
						),
					)
				),
				array(
					'title' =>  'Single Product Page' ,
					'name' => 'singleshop',
					'icon' => 'font-awesome:fa-sun-o',
					'controls' => array(
						array(
					        'type' => 'toggle',
					        'name' => 'single_product_fullwidth',
					        'label' =>  'Disable Fullwidth Image and Use Masonry or Grid Layout' ,
					        'description' =>  'turn on this option to see more option on single product page layout' ,
					    ),

						array(
							'type' => 'section',
							'title' =>  'Single Product Setting' ,
							'name' => 'single_product_setting',
							'dependency' => array(
								'field'    => 'single_product_fullwidth',
								'function' => 'vp_dep_boolean',
							),
							'fields' => array(
								array (
									'type' => 'radiobutton',
									'name' => 'product_single_type',
									'label' => 'Product layout type',
									'description' => 'choose between normal or masonry layout',
									'default' => 'normal',
									'items' => array(
										array(
											'value' => 'normal',
											'label' => 'Normal Layout',
										),
										array(
											'value' => 'masonry',
											'label' => 'Masonry Layout',
										),
										array(
											'value' => 'justified',
											'label' => 'Justified Layout',
										),
									),
								),

								array(
									'type' => 'slider',
									'name' => 'single_product_width',
									'label' =>  'Image thumbnail size (width)' ,
									'description' =>  'set your image width thumbnail size on single product page' ,
									'min' => '200',
							        'max' => '1000',
							        'step' => '20',
							        'default' => '400',
							        'dependency' => array(
										'field'    => 'product_single_type',
										'function' => 'jeg_portfolio_themes_width_value',
									),
								),

								array(
									'type' => 'slider',
									'name' => 'single_item_height',
									'label' =>  'Product image thumbnail height dimension' ,
									'description' =>  'Product image height dimension base on Product thumbnail size' ,
									'min' => '0.1',
							        'max' => '3',
							        'step' => '0.1',
							        'default' => '1',
							        'dependency' => array(
										'field'    => 'product_single_type',
										'function' => 'jeg_portfolio_themes_height_value',
									),
								),

								array(
									'type' => 'slider',
									'name' => 'single_justified_height',
									'label' =>  'Justified Product Image Height' ,
									'description' =>  'Justified Product image height' ,
									'min' => '150',
							        'max' => '500',
							        'step' => '10',
							        'default' => '250',
							        'dependency' => array(
										'field'    => 'product_single_type',
										'function' => 'jeg_portfolio_themes_justified_value',
									),
								),

								array(
									'type' => 'toggle',
									'name' => 'single_product_use_margin',
									'label' =>  'Use margin' ,
									'default' => '1',
								),
								array(
									'type' => 'slider',
									'name' => 'single_product_margin_size',
									'label' =>  'Product Margin size' ,
									'description' =>  'in pixel' ,
									'min' => '2',
							        'max' => '20',
							        'step' => '1',
							        'default' => '5',
							        'dependency' => array(
										'field'    => 'single_product_use_margin',
										'function' => 'vp_dep_boolean',
									),
								),
								array(
									'type'  => 'select',
									'name'  => 'single_expand_mode',
									'label' =>  'Image Expand Script' ,
									'description' =>  'script that will used when user click the image thumbnail' ,
									'default' => 'magnific',
									'items' => array(
										array(
											'value' => 'photoswipe',
											'label' => 'Use Photoswipe (double click zoom image capability)',
										),
										array(
											'value' => 'magnific',
											'label' => 'Use magnific',
										),
										array(
											'value' => 'swipebox',
											'label' => 'Use Swipebox',
										),
									)
								),
								array(
									'type'  => 'select',
									'name'  => 'single_scale_mode',
									'label' =>  'Image Scale Method' ,
									'description' =>  'image scale method' ,
									'default' => 'fit',
									'dependency' => array(
										'field'    => 'single_expand_mode',
										'function' => 'jeg_check_expand_photoswipe',
									),
									'items' => array(
										array(
											'value' => 'fit',
											'label' => 'Image always fits the screen',
										),
										array(
											'value' => 'fitNoUpscale',
											'label' => 'Image always fits the screen, but never upscale the image',
										),
										array(
											'value' => 'zoom',
											'label' => 'image to be zoomed in and cropped',
										)
									)
								),
							),
						),
					)
				),
			)
		),


		array(
			'title' =>  'Support' ,
			'name' => 'support',
			'icon' => 'font-awesome:fa-medkit',
			'menus' => array(
				array(
					'title' =>  'Tips & Support' ,
					'name' => 'support',
					'icon' => 'font-awesome:fa-h-square',
					'controls' => array(

						array(
							'type' => 'notebox',
							'name' => 'support_request',
							'label' =>  'How to requesting support' ,
							'description' =>  'if you have question related with this themes, please send your question to <a href="http://support.jegtheme.com/" target="_blank">our forum support</a>' ,
							'status' => 'info',
						),
					)
				),
			)
		)

	)
);