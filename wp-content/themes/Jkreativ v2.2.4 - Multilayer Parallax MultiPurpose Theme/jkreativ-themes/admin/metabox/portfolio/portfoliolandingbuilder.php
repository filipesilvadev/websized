<?php

if(vp_option('joption.enable_section_builder')) {
    return array(
        'id' => 'jkreativ_portfolio_landing',
        'types' => array(JEG_PORTFOLIO_POST_TYPE),
        'title' => 'Jkreativ Extend Portfolio Builder',
        'priority' => 'high',
        'template' => array(

            array(
                'type' => 'notebox',
                'name' => 'nb_heading',
                'label' => 'Heading Element',
                'status' => 'info',
            ),

            array(
                'type' => 'select',
                'name' => 'heading_type',
                'label' => 'Section Heading Type',
                'default' => 'noheading',
                'items' => array(
                    array(
                        'value' => 'noheading',
                        'label' => 'No Heading',
                    ),
                    array(
                        'value' => 'slider',
                        'label' => 'Jkreativ Slider Format',
                    ),
                    array(
                        'value' => 'parallaxheading',
                        'label' => 'Normal Parallax Heading',
                    ),
                    array(
                        'value' => 'shortcode',
                        'label' => 'Shortcode ( you can enter rev slider or another slider shortcode right here )',
                    ),
                )
            ),

            array(
                'type' => 'select',
                'name' => 'heading_slider',
                'label' => 'Slider Element',
                'description' => 'choose slider that you have create previously from slider post type',
                'allowsingle' => true,
                'default' => '{{first}}',
                'dependency' => array(
                    'field' => 'heading_type',
                    'function' => 'jeg_heading_slider',
                ),
                'items' => array(
                    'data' => array(
                        array(
                            'source' => 'function',
                            'value' => 'jeg_get_slider_item',
                        ),
                    ),
                ),
            ),

            array(
                'type' => 'textarea',
                'name' => 'heading_shortcode',
                'label' => 'Shortcode as heading section',
                'description' => 'if you are want to use another external plugin as header(like rev slider), you can put it right here',
                'dependency' => array(
                    'field' => 'heading_type',
                    'function' => 'jeg_heading_shortcode',
                ),
            ),

            array(
                'type' => 'toggle',
                'name' => 'heading_shortcode_fullscreen',
                'label' => 'Enable fullscreen',
                'default' => '0',
                'dependency' => array(
                    'field' => 'heading_type',
                    'function' => 'jeg_heading_shortcode',
                ),
            ),

            array(
                'type' => 'group',
                'repeating' => false,
                'length' => 1,
                'name' => 'heading_normal',
                'title' => 'Normal Parallax Heading',
                'dependency' => array(
                    'field' => 'heading_type',
                    'function' => 'jeg_heading_normal',
                ),
                'fields' => array(
                    array(
                        'type' => 'textbox',
                        'name' => 'first_text_heading',
                        'label' => 'First text on heading',

                    ),
                    array(
                        'type' => 'textbox',
                        'name' => 'second_text_heading',
                        'label' => 'Second text on heading',
                    ),
                    array(
                        'type' => 'toggle',
                        'name' => 'light_heading',
                        'label' => 'Use light heading text color',
                        'default' => '1',
                    ),
                    array(
                        'type' => 'imageupload',
                        'name' => 'heading_background',
                        'label' => 'Heading Background',
                    ),
                    array(
                        'type' => 'toggle',
                        'name' => 'cover_parallax_background',
                        'label' => 'Use cover width & height parallax background',
                        'default' => '1',
                    ),
                    array(
                        'type' => 'color',
                        'name' => 'overlay_color',
                        'label' => 'Overlay Color',
                        'description' => 'Section heading overlay color',
                        'default' => 'rgba(0,0,0,0.3)',
                        'format' => 'rgba',
                    ),
                ),
            ),

            array(
                'type' => 'notebox',
                'name' => 'nb_footer',
                'label' => 'Footer Element',
                'status' => 'info',
            ),

            array(
                'type' => 'toggle',
                'name' => 'disable_landing_footer',
                'label' => 'Disable landing footer on this page',
                'description' => 'if you enable this option, you wont see any footer on single page even if you enable it on footer general setting',
                'default' => '0'
            ),


            /** navigation **/

            array(
                'type' => 'notebox',
                'name' => 'nb_navigation',
                'label' => 'Landing Navigation',
                'status' => 'info',
            ),


            array(
                'type' => 'toggle',
                'name' => 'enable_landingnav',
                'label' => 'Enable Landing Navigation',
                'default' => '1',
            ),

            array(
                'type' => 'select',
                'name' => 'landingnav_type',
                'label' => 'Landing Navigation Type',
                'default' => 'default',
                'dependency' => array(
                    'field' => 'enable_landingnav',
                    'function' => 'vp_dep_boolean',
                ),
                'items' => array(
                    array(
                        'value' => 'default',
                        'label' => 'Default',
                    ),
                    array(
                        'value' => 'circle',
                        'label' => 'Circle',
                    ),
                )
            ),


            /*** content ***/
            array(
                'type' => 'notebox',
                'name' => 'nb_body',
                'label' => 'Section Builder',
                'status' => 'info',
            ),

            array(
                'type' => 'group',
                'repeating' => true,
                'sortable' => true,
                'length' => 1,
                'name' => 'sectionbuilder',
                'title' => 'Section Builder',
                'fields' => array(


                    array(
                        'type' => 'textbox',
                        'name' => 'section_id',
                        'label' => 'Section ID',
                        'description' => 'Please provide section unique name for this section part',
                    ),

                    array(
                        'type' => 'textbox',
                        'name' => 'section_name',
                        'label' => 'Section Name (For Landing Navigation)',
                        'description' => 'Please provide section name for this section part (Leave this section empty, so it won\'t shown on Landing Navigator)',
                    ),

                    array(
                        'type' => 'select',
                        'name' => 'section_top_margin',
                        'label' => 'Section Top Margin',
                        'description' => 'setup top margin for section wrapper',
                        'default' => 'normaltopmargin',
                        'items' => array(
                            array(
                                'value' => 'notopmargin',
                                'label' => 'No Top Margin',
                            ),
                            array(
                                'value' => 'normaltopmargin',
                                'label' => '1x Top Margin',
                            ),
                            array(
                                'value' => 'doubletopmargin',
                                'label' => '2x Top Margin',
                            ),
                            array(
                                'value' => 'tripletopmargin',
                                'label' => '3x Top Margin',
                            ),
                            array(
                                'value' => 'forthtopmargin',
                                'label' => '4x Top Margin',
                            ),
                            array(
                                'value' => 'fifthtopmargin',
                                'label' => '5x Top Margin',
                            ),
                        )
                    ),

                    array(
                        'type' => 'select',
                        'name' => 'section_bottom_margin',
                        'label' => 'Section Bottom Margin',
                        'description' => 'setup bottom margin for section wrapper',
                        'default' => 'normalbottommargin',
                        'items' => array(
                            array(
                                'value' => 'nobottommargin',
                                'label' => 'No Bottom Margin',
                            ),
                            array(
                                'value' => 'normalbottommargin',
                                'label' => '1x Bottom Margin',
                            ),
                            array(
                                'value' => 'doublebottommargin',
                                'label' => '2x Bottom Margin',
                            ),
                            array(
                                'value' => 'triplebottommargin',
                                'label' => '3x Bottom Margin',
                            ),
                            array(
                                'value' => 'forthbottommargin',
                                'label' => '4x Bottom Margin',
                            ),
                            array(
                                'value' => 'fifthbottommargin',
                                'label' => '5x Bottom Margin',
                            ),
                        )
                    ),

                    array(
                        'type' => 'select',
                        'name' => 'section_schema',
                        'label' => 'Section Text Color Schema',
                        'description' => 'text schema that fit with background color',
                        'default' => 'normal',
                        'items' => array(
                            array(
                                'value' => 'normal',
                                'label' => 'Normal Text Color Schema ( fit for light background )',
                            ),
                            array(
                                'value' => 'light',
                                'label' => 'Light text color ( fit for dark background )',
                            ),
                        )
                    ),

                    array(
                        'type' => 'select',
                        'name' => 'section_background',
                        'label' => 'Section Background Type',
                        'description' => 'choose background type, color background or image background',
                        'default' => 'color',
                        'items' => array(
                            array(
                                'value' => 'color',
                                'label' => 'Color Background',
                            ),
                            array(
                                'value' => 'imagebg',
                                'label' => 'Image Background',
                            ),
                            array(
                                'value' => 'movingbg',
                                'label' => 'Moving Image Background',
                            ),
                            array(
                                'value' => 'parallaxbg',
                                'label' => 'Parallax Image Background',
                            ),
                            array(
                                'value' => 'video',
                                'label' => 'Video Background',
                            ),
                        )
                    ),

                    array(
                        'type' => 'color',
                        'name' => 'background_color',
                        'label' => 'Background Color',
                        'description' => 'Section background color',
                        'default' => 'rgba(248,248,248,1)',
                        'format' => 'rgba',
                        'dependency' => array(
                            'field' => 'section_background',
                            'function' => 'jeg_section_background_color',
                        ),
                    ),

                    array(
                        'type' => 'group',
                        'repeating' => false,
                        'name' => 'imagebg',
                        'title' => 'Image Background',
                        'dependency' => array(
                            'field' => 'section_background',
                            'function' => 'jeg_section_image_background',
                        ),
                        'fields' => array(
                            array(
                                'type' => 'imageupload',
                                'name' => 'image_background',
                                'label' => 'Image Background',
                                'description' => 'Upload your website image background',
                            ),

                            array(
                                'type' => 'color',
                                'name' => 'background_overlay',
                                'label' => 'Background Overlay',
                                'description' => 'put overlay element above your image',
                                'default' => 'rgba(0,0,0,0.3)',
                                'format' => 'rgba',
                            ),

                            array(
                                'type' => 'select',
                                'name' => 'background_vertical_position',
                                'label' => 'Image background vertical position',
                                'items' => array(
                                    array(
                                        'value' => 'left',
                                        'label' => 'Left',
                                    ),
                                    array(
                                        'value' => 'center',
                                        'label' => 'Center',
                                    ),
                                    array(
                                        'value' => 'right',
                                        'label' => 'Right',
                                    ),
                                ),
                                'default' => array(
                                    'center',
                                ),
                            ),

                            array(
                                'type' => 'select',
                                'name' => 'background_horizontal_position',
                                'label' => 'Image background horizontal position',
                                'items' => array(
                                    array(
                                        'value' => 'top',
                                        'label' => 'Top',
                                    ),
                                    array(
                                        'value' => 'center',
                                        'label' => 'Center',
                                    ),
                                    array(
                                        'value' => 'bottom',
                                        'label' => 'bottom',
                                    ),
                                ),
                                'default' => array(
                                    'center',
                                ),
                            ),

                            array(
                                'type' => 'select',
                                'name' => 'background_repeat',
                                'label' => 'Image background repeat',
                                'items' => array(
                                    array(
                                        'value' => 'repeat-x',
                                        'label' => 'Repeat Horizontal',
                                    ),
                                    array(
                                        'value' => 'repeat-y',
                                        'label' => 'Repeat Vertical',
                                    ),
                                    array(
                                        'value' => 'repeat',
                                        'label' => 'Repeat Image',
                                    ),
                                    array(
                                        'value' => 'no-repeat',
                                        'label' => 'No Repeat',
                                    ),
                                ),
                                'default' => array(
                                    'no-repeat',
                                ),
                            ),

                            array(
                                'type' => 'toggle',
                                'name' => 'background_fullscreen',
                                'label' => 'Enable fullscreen background',
                                'default' => '0',
                            ),

                        ),
                    ),

                    array(
                        'type' => 'group',
                        'repeating' => false,
                        'name' => 'movingbg',
                        'title' => 'Moving Image Background',
                        'dependency' => array(
                            'field' => 'section_background',
                            'function' => 'jeg_section_moving_background',
                        ),
                        'fields' => array(

                            array(
                                'type' => 'notebox',
                                'name' => 'nb_heading',
                                'label' => 'Moving Background',
                                'description' => 'Image will be repeated automatically, and will move from left to right overtime',
                                'status' => 'info',
                            ),
                            array(
                                'type' => 'color',
                                'name' => 'background_overlay',
                                'label' => 'Background Overlay',
                                'description' => 'put overlay element above your image',
                                'default' => 'rgba(0,0,0,0)',
                                'format' => 'rgba',
                            ),
                            array(
                                'type' => 'select',
                                'name' => 'direction',
                                'label' => 'Animation Direction',
                                'default' => 'horizontal',
                                'items' => array(
                                    array(
                                        'value' => 'horizontal',
                                        'label' => 'Horizontal',
                                    ),
                                    array(
                                        'value' => 'vertical',
                                        'label' => 'Vertical',
                                    ),
                                    array(
                                        'value' => 'diagonal',
                                        'label' => 'Diagonal',
                                    ),
                                ),
                            ),
                            array(
                                'type' => 'imageupload',
                                'name' => 'image_background',
                                'label' => 'Image Background',
                                'description' => 'Upload your website image background',
                            ),

                        ),
                    ),

                    array(
                        'type' => 'color',
                        'name' => 'parallax_overlay',
                        'label' => 'Background Overlay',
                        'description' => 'put overlay element above your parallax',
                        'default' => 'rgba(0,0,0,0)',
                        'format' => 'rgba',
                        'dependency' => array(
                            'field' => 'section_background',
                            'function' => 'jeg_section_parallax_background',
                        ),
                    ),

                    array(
                        'type' => 'group',
                        'repeating' => true,
                        'sortable' => true,
                        'length' => 1,
                        'name' => 'mparallax',
                        'title' => 'Parallax Background',
                        'dependency' => array(
                            'field' => 'section_background',
                            'function' => 'jeg_section_parallax_background',
                        ),
                        'fields' => array(
                            array(
                                'type' => 'imageupload',
                                'name' => 'image',
                                'label' => 'Parallax Image',
                            ),
                            array(
                                'type' => 'select',
                                'name' => 'position',
                                'label' => 'Background Align',
                                'default' => 'center',
                                'items' => array(
                                    array(
                                        'value' => 'center',
                                        'label' => 'Center',
                                    ),
                                    array(
                                        'value' => 'left',
                                        'label' => 'Left',
                                    ),
                                    array(
                                        'value' => 'right',
                                        'label' => 'Right',
                                    ),
                                ),
                            ),
                            array(
                                'type' => 'toggle',
                                'name' => 'fullscreen',
                                'label' => 'Enable cover background',
                                'default' => '0',
                            ),
                            array(
                                'type' => 'slider',
                                'name' => 'speed',
                                'label' => 'Parallax Speed',
                                'min' => '-2000',
                                'max' => '2000',
                                'step' => '50',
                                'default' => '300',
                            ),
                        ),
                    ),

                    array(
                        'type' => 'group',
                        'repeating' => false,
                        'length' => 1,
                        'name' => 'video',
                        'title' => 'Background Video',
                        'dependency' => array(
                            'field' => 'section_background',
                            'function' => 'jeg_section_background_video',
                        ),
                        'fields' => array(
                            array(
                                'type' => 'imageupload',
                                'name' => 'bgfallback',
                                'label' => 'Background Fallback Image',
                            ),
                            array(
                                'type' => 'upload',
                                'name' => 'videomp4',
                                'label' => 'MP4 format Video',
                            ),
                            array(
                                'type' => 'upload',
                                'name' => 'videowebm',
                                'label' => 'WEBM format Video',
                            ),
                            array(
                                'type' => 'upload',
                                'name' => 'videoogg',
                                'label' => 'OGG format Video',
                            ),
                            array(
                                'type' => 'color',
                                'name' => 'background_overlay',
                                'label' => 'Background Overlay',
                                'description' => 'put overlay element above your image',
                                'default' => 'rgba(0,0,0,0)',
                                'format' => 'rgba',
                            ),
                            array(
                                'type' => 'toggle',
                                'name' => 'enable_parallax',
                                'label' => 'Enable Video Parallax',
                                'default' => '0',
                            ),


                            array(
                                'type' => 'textbox',
                                'name' => 'videoheight',
                                'label' => 'Video Height',
                                'description' => 'please fill your video height, ex : 1080',
                            ),
                            array(
                                'type' => 'textbox',
                                'name' => 'videowidth',
                                'label' => 'Video Width',
                                'description' => 'please fill your video width, ex : 1920',
                            ),

                        ),
                    ),

                    array(
                        'type' => 'toggle',
                        'name' => 'enable_top_ribon',
                        'label' => 'Enable top ribon',
                        'default' => '0',
                    ),

                    array(
                        'type' => 'imageupload',
                        'name' => 'top_ribon_bg',
                        'label' => 'Top Ribon Image',
                        'description' => 'this image will be repeating on x axis, you can upload only small part of image',
                        'dependency' => array(
                            'field' => 'enable_top_ribon',
                            'function' => 'vp_dep_boolean',
                        ),
                    ),

                    array(
                        'type' => 'toggle',
                        'name' => 'enable_bottom_ribon',
                        'label' => 'Enable bottom ribon',
                        'default' => '0',
                    ),

                    array(
                        'type' => 'imageupload',
                        'name' => 'bottom_ribon_bg',
                        'label' => 'Bottom Ribon Image',
                        'description' => 'this image will be repeating on x axis, you can upload only small part of image',
                        'dependency' => array(
                            'field' => 'enable_bottom_ribon',
                            'function' => 'vp_dep_boolean',
                        ),
                    ),

                    array(
                        'type' => 'wpeditor',
                        'name' => 'content',
                        'label' => 'Section Content',
                        'use_external_plugins' => '1',
                        'disabled_externals_plugins' => '',
                        'disabled_internals_plugins' => '',
                    ),
                ),
            ),


        ),
    );
} else {
    return array(
        'id'          => 'jkreativ_legacy_page_builder',
        'types'       => array(JEG_PORTFOLIO_POST_TYPE),
        'title'       => 'Jkreativ Landing Page Builder',
        'priority'    => 'high',
        'template'    => array(

            array(
                'type' => 'notebox',
                'name' => 'nb_position',
                'label' => 'Legacy Section Builder is disabled to make backend faster, you can enabled this Section Builder from Jkreativ Dashboard > General Setting > Enable Legacy Section Builder (enable)',
                'status' => 'info',
            ),
        ),
    );
}