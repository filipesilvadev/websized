<?php
/**
 * vc remove element
 */
vc_remove_element("vc_wp_search");
vc_remove_element("vc_wp_meta");
vc_remove_element("vc_wp_recentcomments");
vc_remove_element("vc_wp_calendar");
vc_remove_element("vc_wp_pages");
vc_remove_element("vc_wp_tagcloud");
vc_remove_element("vc_wp_custommenu");
vc_remove_element("vc_wp_text");
vc_remove_element("vc_wp_posts");
vc_remove_element("vc_wp_links");
vc_remove_element("vc_wp_categories");
vc_remove_element("vc_wp_archives");
vc_remove_element("vc_wp_rss");
vc_remove_element("vc_cta_button");
vc_remove_element("vc_cta_button2");
vc_remove_element("vc_gmaps");
vc_remove_element("vc_carousel");

/**
 * vc text block
 */

vc_remove_param('vc_column_text', 'css');
vc_remove_param('vc_column_text', 'font_color');


/**
 * vc_row
 */

vc_remove_param('vc_row', 'css');
vc_remove_param('vc_row', 'font_color');
vc_remove_param('vc_row', 'el_class');


vc_add_param('vc_row', array(
    'type'          => 'sectionid',
    'heading'       => 'Section ID',
    'param_name'    => 'section_id',
    'description'   => 'Please provide section unique name for this section part, this ID also will become anchor id'
));


vc_add_param('vc_row', array(
    'type'          => 'textfield',
    'heading'       => 'Section Name',
    'param_name'    => 'section_name',
    'description'   => "Please provide section name for this section part (Leave this section empty, so it won't shown on Landing Navigator)"
));


vc_add_param('vc_row', array(
    'type'          => 'dropdown',
    'heading'       => 'Top Margin',
    'param_name'    => 'section_top_margin',
    'std'           => 'normaltopmargin',
    'value'         => array(
        'No Margin'         => 'notopmargin',
        '1x Margin'         => 'normaltopmargin',
        '2x Margin'         => 'doubletopmargin',
        '3x Margin'         => 'tripletopmargin',
        '4x Margin'         => 'forthtopmargin',
        '5x Margin'         => 'fifthtopmargin',
    ),
    'description'   => "setup top margin for section wrapper"
));

vc_add_param('vc_row', array(
    'type'          => 'dropdown',
    'heading'       => 'Bottom Margin',
    'param_name'    => 'section_bottom_margin',
    'std'           => 'normalbottommargin',
    'value'         => array(
        'No Margin'         => 'nobottommargin',
        '1x Margin'         => 'normalbottommargin',
        '2x Margin'         => 'doublebottommargin',
        '3x Margin'         => 'triplebottommargin',
        '4x Margin'         => 'forthbottommargin',
        '5x Margin'         => 'fifthbottommargin',
    ),
    'description'   => "setup top margin for section wrapper"
));

vc_add_param('vc_row', array(
    'type'          => 'dropdown',
    'heading'       => 'Section Text Color Schema',
    'param_name'    => 'section_schema',
    'std'           => 'normal',
    'value'         => array(
        'Normal - for lighter background'       => 'normal',
        'Light - for darker background'         => 'light'
    ),
    'description'   => "choose text schema that fit with background color"
));

vc_add_param('vc_row', array(
    'type'          => 'checkbox',
    'heading'       => 'Enable top ribon',
    'param_name'    => 'enable_top_ribon',
    'description'   => 'you can create ribon effect section, element height will automatically calculated and will repeated x axis',
    'value'         => array( "Enable Top Ribon" => 'yes' )
));

vc_add_param('vc_row', array(
    'type'          => 'attach_image',
    'heading'       => 'Top Ribon Background',
    'param_name'    => 'top_ribon_bg',
    'dependency'    => Array('element' => "enable_top_ribon", 'value' => array('yes'))
));

vc_add_param('vc_row', array(
    'type'          => 'checkbox',
    'heading'       => 'Enable bottom ribon',
    'param_name'    => 'enable_bottom_ribon',
    'description'   => 'you can create ribon effect section, element height will automatically calculated and will repeated x axis',
    'value'         => array( "Enable Bottom Ribon" => 'yes' )
));

vc_add_param('vc_row', array(
    'type'          => 'attach_image',
    'heading'       => 'Bottom Ribon Background',
    'param_name'    => 'bottom_ribon_bg',
    'dependency'    => Array('element' => "enable_bottom_ribon", 'value' => array('yes'))
));

vc_add_param('vc_row', array(
    'type'          => 'dropdown',
    'heading'       => 'Section Background',
    'param_name'    => 'section_background',
    'description'   => 'choose background type, color, image, video, or multilayer parallax',
    'std'           => '',
    'value'         => array(
        'None'                          => '',
        'Color'                         => 'color',
        'Image Background'              => 'imagebg',
        'Moving Background'             => 'movingbg',
        'Parallax Background'           => 'parallaxbg',
        'Video Background'              => 'video'
    )
));

/**
 * color picker
 **/
vc_add_param('vc_row', array(
    'type'          => 'colorpicker',
    'heading'       => 'Background Color',
    'param_name'    => 'background_color',
    'dependency'    => Array('element' => "section_background", 'value' => array('color'))
));


/**
 * image background
 **/
vc_add_param('vc_row', array(
    'type'          => 'colorpicker',
    'heading'       => 'Background Image - Overlay',
    'param_name'    => 'background_overlay',
    'dependency'    => Array('element' => "section_background", 'value' => array('imagebg'))
));


vc_add_param('vc_row', array(
    'type'          => 'attach_image',
    'heading'       => 'Background Image - Image',
    'param_name'    => 'image_background',
    'dependency'    => Array('element' => "section_background", 'value' => array('imagebg'))
));

vc_add_param('vc_row', array(
    'type'          => 'dropdown',
    'heading'       => 'Background Image - Vertical position',
    'param_name'    => 'background_vertical_position',
    'std'           => '',
    'value'         => array(
        ''                      => '',
        'Left'                  => 'left',
        'Center'                => 'center',
        'Right'                 => 'right'
    ),
    'dependency'    => Array('element' => "section_background", 'value' => array('imagebg'))
));

vc_add_param('vc_row', array(
    'type'          => 'dropdown',
    'heading'       => 'Background Image - Horizontal position',
    'param_name'    => 'background_horizontal_position',
    'std'           => '',
    'value'         => array(
        ''                      => '',
        'Top'                   => 'top',
        'Center'                => 'center',
        'Bottom'                => 'bottom'
    ),
    'dependency'    => Array('element' => "section_background", 'value' => array('imagebg'))
));

vc_add_param('vc_row', array(
    'type'          => 'dropdown',
    'heading'       => 'Background Image - Background Repeat',
    'param_name'    => 'background_repeat',
    'std'           => 'repeat',
    'value'         => array(
        ''                              => '',
        'Repeat Horizontal'             => 'repeat-x',
        'Repeat Vertical'               => 'repeat-y',
        'Repeat Image'                  => 'repeat',
        'No Repeat'                     => 'no-repeat'
    ),
    'dependency'    => Array('element' => "section_background", 'value' => array('imagebg'))
));

vc_add_param('vc_row', array(
    'type'          => 'checkbox',
    'heading'       => 'Background Image - Enable fullscreen background',
    'param_name'    => 'background_fullscreen',
    'value'         => array( "Enable fullscreen background" => 'yes' ),
    'dependency'    => Array('element' => "section_background", 'value' => array('imagebg'))
));


/**
 * moving image background
 **/
vc_add_param('vc_row', array(
    'type'          => 'colorpicker',
    'heading'       => 'Moving Background - Overlay',
    'param_name'    => 'moving_overlay',
    'description'   => 'put overlay background above your image, you can use alpha color option to make it transparent',
    'dependency'    => Array('element' => "section_background", 'value' => array('movingbg'))
));

vc_add_param('vc_row', array(
    'type'          => 'dropdown',
    'heading'       => 'Moving Background - Animation Direction',
    'param_name'    => 'moving_direction',
    'std'           => '',
    'value'         => array(
        'Horizontal'              => 'horizontal',
        'Vertical'                => 'vertical',
        'Diagonal'                => 'diagonal'
    ),
    'dependency'    => Array('element' => "section_background", 'value' => array('movingbg'))
));

vc_add_param('vc_row', array(
    'type'          => 'attach_image',
    'heading'       => 'Moving Background - Background Image',
    'param_name'    => 'moving_image_background',
    'dependency'    => Array('element' => "section_background", 'value' => array('movingbg'))
));


/**
 * background video
 **/
vc_add_param('vc_row', array(
    'type'          => 'attach_image',
    'heading'       => 'Video Background - Fallback Image',
    'param_name'    => 'video_fallback_background',
    'dependency'    => Array('element' => "section_background", 'value' => array('video'))
));

vc_add_param('vc_row', array(
    'type'          => 'attach_file',
    'heading'       => 'Video Background - MP4 format',
    'param_name'    => 'video_mp4',
    'dependency'    => Array('element' => "section_background", 'value' => array('video'))
));

vc_add_param('vc_row', array(
    'type'          => 'attach_file',
    'heading'       => 'Video Background - WEBM format',
    'param_name'    => 'video_webm',
    'dependency'    => Array('element' => "section_background", 'value' => array('video'))
));

vc_add_param('vc_row', array(
    'type'          => 'attach_file',
    'heading'       => 'Video Background - OGG format',
    'param_name'    => 'video_ogg',
    'dependency'    => Array('element' => "section_background", 'value' => array('video'))
));

vc_add_param('vc_row', array(
    'type'          => 'colorpicker',
    'heading'       => 'Video Background - Overlay',
    'param_name'    => 'video_overlay',
    'dependency'    => Array('element' => "section_background", 'value' => array('video'))
));

vc_add_param('vc_row', array(
    'type'          => 'checkbox',
    'heading'       => 'Video Background - Parallax',
    'param_name'    => 'video_parallax',
    'value'         => array( "Enable Parallax" => 'yes' ),
    'dependency'    => Array('element' => "section_background", 'value' => array('video'))
));

vc_add_param('vc_row', array(
    'type'          => 'textfield',
    'heading'       => 'Video Background - Height (pixel)',
    'param_name'    => 'video_height',
    'dependency'    => Array('element' => "section_background", 'value' => array('video'))
));

vc_add_param('vc_row', array(
    'type'          => 'textfield',
    'heading'       => 'Video Background - Width (pixel)',
    'param_name'    => 'video_width',
    'dependency'    => Array('element' => "section_background", 'value' => array('video'))
));

/**
 * parallax background
 **/

vc_add_param('vc_row', array(
    'type'          => 'colorpicker',
    'heading'       => 'Parallax Overlay',
    'param_name'    => 'parallax_overlay',
    'dependency'    => Array('element' => "section_background", 'value' => array('parallaxbg'))
));

for($i = 1; $i <= 10; $i++){
    vc_add_param('vc_row', array(
        'type'          => "checkbox",
        'heading'       => "Enable Parallax Layer $i",
        'param_name'    => "parallax_enable_$i",
        'value'         => array( "Enable Parallax Layer $i" => 'yes' ),
        'dependency'    => Array('element' => "section_background", 'value' => array('parallaxbg'))
    ));

    vc_add_param('vc_row', array(
        'type'          => "attach_image",
        'heading'       => "Parallax Layer $i - Image",
        'param_name'    => "parallax_image_$i",
        'dependency'    => Array('element' => "parallax_enable_$i", 'value' => array('yes'))
    ));

    vc_add_param('vc_row', array(
        'type'          => 'dropdown',
        'heading'       => "Parallax Layer $i - Background Align",
        'param_name'    => "parallax_background_$i",
        'std'           => "",
        'value'         => array(
            ''                      => '',
            'Center'                => 'center',
            'Left'                  => 'left',
            'Right'                 => 'right'
        ),
        'dependency'    => Array('element' => "parallax_enable_$i", 'value' => array('yes'))
    ));

    vc_add_param('vc_row', array(
        'type'          => 'checkbox',
        'heading'       => "Parallax Layer $i - Cover Background",
        'param_name'    => "parallax_cover_$i",
        'value'         => array( "Parallax Cover Background" => 'yes' ),
        'dependency'    => Array('element' => "parallax_enable_$i", 'value' => array('yes'))
    ));

    vc_add_param('vc_row', array(
        'type'          => 'slider',
        'min'           => -2000,
        'max'           => 2000,
        'step'          => 1,
        'std'           => 300,
        'heading'       => "Parallax Layer $i - Parallax Speed",
        'param_name'    => "parallax_speed_$i",
        'dependency'    => Array('element' => "parallax_enable_$i", 'value' => array('yes')),
        'description'   => "Speed between (-2000 to 2000)<br/>Speed 0 - make background static<br/>Speed Negative - scroll will be reverse of scroll",
    ));
}


/**
 * vc_row_inner
 */
vc_remove_param('vc_row_inner', 'css');

vc_add_param('vc_row_inner', array(
    'type'          => "checkbox",
    'heading'       => "Enable Grid Animation",
    'param_name'    => "enable_animation",
    'value'         => array( "Enable Grid Animation" => 'yes' ),
));

vc_add_param('vc_row_inner', array(
    'type'          => 'dropdown',
    'heading'       => 'Animation Speed',
    'param_name'    => 'animspeed',
    'std'           => 'slow',
    'value'         => array(
        'Fast'              => 'fast',
        'Slow'              => 'slow',
        'Slower'            => 'slower'
    )
));

vc_add_param('vc_row_inner', array(
    'type'          => 'slider',
    'min'           => 50,
    'max'           => 2000,
    'step'          => 1,
    'std'           => 150,
    'heading'       => "Animation Sequence Speed",
    'param_name'    => "seqspeed"
));



/**
 * vc_column_inner
 */


vc_remove_param('vc_column_inner', 'css');

vc_add_param('vc_column_inner', array(
    'type'          => 'checkbox',
    'heading'       => 'hide on iPad (resolution bellow 1024)',
    'param_name'    => 'hideipad',
    'value'         => array( "Hide on iPad" => 'yes' )
));

vc_add_param('vc_column_inner', array(
    'type'          => 'checkbox',
    'heading'       => 'hide on iPhone (resolution bellow 480)',
    'param_name'    => 'hideiphone',
    'value'         => array( "Hide on iPhone" => 'yes' )
));

vc_add_param('vc_column_inner', array(
    'type'          => 'checkbox',
    'heading'       => 'Enable fadein animation',
    'param_name'    => 'fadein',
    'value'         => array( "Enable fadein animation" => 'yes' ),
    'description'   => "If you enable this option, you will also need to enable grid animation on row wrapper"
));

vc_add_param('vc_column_inner', array(
    'type'          => 'checkbox',
    'heading'       => 'Enable scale animation',
    'param_name'    => 'scale',
    'value'         => array( "Enable scale animation" => 'yes' ),
    'description'   => "If you enable this option, you will also need to enable grid animation on row wrapper"
));

vc_add_param('vc_column_inner', array(
    'type'          => 'dropdown',
    'heading'       => 'Animation Position',
    'param_name'    => 'position',
    'std'           => 'none',
    'value'         => array(
        'None'          => 'none',
        'Top'           => 'top',
        'Bottom'        => 'bottom',
        'Left'          => 'left',
        'Right'         => 'right',
    ),
    'description'   => "If you enable this option, you will also need to enable grid animation on row wrapper"
));


/**
 * jeg_hr
 */

class WPBakeryShortCode_Jeg_Hr  extends WPBakeryShortCode {}
vc_map(array(
    "name"                      => 'Jkreativ - HR (line)',
    "base"                      => 'jeg_hr',
    "category"                  => 'Jkreativ',
    "icon"                      => 'jeg_hr_icon',
    "allowed_container_element" => 'vc_row',
    "params" => array(
        array(
            'type'          => 'dropdown',
            'heading'       => 'HR Type',
            'param_name'    => 'hr_type',
            'std'           => 'singlehr',
            'value'         => array(
                'Single HR'         => 'singlehr',
                'Double HR'         => 'doubleline',
                'Short HR'          => 'shorthr',
            ),
            'holder'        => 'div'
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Extra class name',
            'param_name'    => 'el_class',
            'description'   => 'f you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.'
        ),
    )
));


/**
 * jeg_spacing
 */
class WPBakeryShortCode_Jeg_Spacing  extends WPBakeryShortCode {}
vc_map(array(
    "name"                      => 'Jkreativ - Spacing & Clearing Float',
    "base"                      => 'jeg_spacing',
    "category"                  => 'Jkreativ',
    "icon"                      => 'jeg_spacing_icon',
    "allowed_container_element" => 'vc_row',
    "params" => array(
        array(
            'type'          => 'slider',
            'min'           => 10,
            'max'           => 200,
            'step'          => 1,
            'std'           => 10,
            'heading'       => "Spacing Size",
            'param_name'    => "size",
            'holder'        => "div"
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Extra class name',
            'param_name'    => 'el_class',
            'description'   => 'f you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.'
        ),
    )
));




/**
 * jeg_singleimage
 */
class WPBakeryShortCode_Jeg_Singleimage  extends WPBakeryShortCode {}
vc_map(array(
    "name"                      => 'Jkreativ - Single Image',
    "base"                      => 'jeg_singleimage',
    "category"                  => 'Jkreativ',
    "icon"                      => 'jeg_singleimage_icon',
    "allowed_container_element" => 'vc_row',
    "params" => array(
        array(
            'type'          => 'attach_image',
            'heading'       => 'Image',
            'param_name'    => 'image',
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Image Title',
            'param_name'    => 'title',
            'holder'        => 'div'
        ),
        array(
            'type'          => 'dropdown',
            'heading'       => 'Image Floating',
            'param_name'    => 'float',
            'std'           => 'center',
            'value'         => array(
                'Center'            => 'center',
                'Left'              => 'left',
                'Right'             => 'right',
            ),
        ),
        array(
            'type'          => 'slider',
            'min'           => 1,
            'max'           => 12,
            'step'          => 1,
            'std'           => 12,
            'heading'       => "Image Width",
            'param_name'    => "size"
        ),
        array(
            'type'          => 'checkbox',
            'heading'       => 'Use themes zoom script',
            'param_name'    => 'zoom',
            'value'         => array( "Enable themes zoom script" => 'yes' )
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Extra class name',
            'param_name'    => 'el_class',
            'description'   => 'f you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.'
        ),
    )
));


/**
 * jeg_googlemap
 */
class WPBakeryShortCode_Jeg_Googlemap  extends WPBakeryShortCode {}
vc_map(array(
    "name"                      => 'Jkreativ - Google Map',
    "base"                      => 'jeg_googlemap',
    "category"                  => 'Jkreativ',
    "icon"                      => 'jeg_googlemap_icon',
    "allowed_container_element" => 'vc_row',
    "params" => array(

        array(
            'type'          => 'textfield',
            'heading'       => 'Map Title',
            'param_name'    => 'title',
            'holder'        => 'div'
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Latitude',
            'param_name'    => 'lat',
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Longitude',
            'param_name'    => 'lng',
        ),
        array(
            'type'          => 'slider',
            'min'           => 1,
            'max'           => 21,
            'step'          => 1,
            'std'           => 14,
            'heading'       => "Map Zoom",
            'param_name'    => "zoom"
        ),
        array(
            'type'          => 'slider',
            'min'           => 0.1,
            'max'           => 2,
            'step'          => 1,
            'std'           => 0.6,
            'heading'       => "Map Ratio",
            'param_name'    => "ratio"
        ),
        array(
            'type'          => 'checkbox',
            'heading'       => 'Show popup',
            'param_name'    => 'popup',
            'value'         => array( "Show Map popup" => 'true' )
        ),
        array(
            'type'          => 'textarea_html',
            'heading'       => 'Google Map Content Popup',
            'param_name'    => 'map_content',
            'dependency'    => Array('element' => "popup", 'value' => array('true'))
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Extra class name',
            'param_name'    => 'el_class',
            'description'   => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.'
        ),
    )
));

/**
 * jeg_testimonial
 */
class WPBakeryShortCode_Jeg_Testimonial  extends WPBakeryShortCode {}
vc_map(array(
    "name"                      => 'Jkreativ - Single Testimonial',
    "base"                      => 'jeg_testimonial',
    "category"                  => 'Jkreativ',
    "icon"                      => 'jeg_testimonial_icon',
    "allowed_container_element" => 'vc_row',
    "params" => array(
        array(
            'type'          => 'attach_image',
            'heading'       => 'Testimonial Image',
            'param_name'    => 'image',
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Testimonial Author',
            'param_name'    => 'author',
            'holder'        => 'span',
            'class'         => 'additionaldash'
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Testimonial Author Additional Title',
            'param_name'    => 'author_position',
            'holder'        => 'span'
        ),
        array(
            'type'          => 'dropdown',
            'heading'       => 'Image Floating',
            'param_name'    => 'float',
            'std'           => 'left',
            'value'         => array(
                'Left'              => 'left',
                'Right'             => 'right',
            ),
        ),
        array(
            'type'          => 'textarea',
            'heading'       => 'Testimonial Content',
            'param_name'    => 'text',
        ),

        array(
            'type'          => 'textfield',
            'heading'       => 'Extra class name',
            'param_name'    => 'el_class',
            'description'   => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.'
        ),
    )
));


/**
 * jeg_alert
 */
class WPBakeryShortCode_Jeg_Alert  extends WPBakeryShortCode {}
vc_map(array(
    "name"                      => 'Jkreativ - Alert',
    "base"                      => 'jeg_alert',
    "category"                  => 'Jkreativ',
    "icon"                      => 'jeg_alert_icon',
    "allowed_container_element" => 'vc_row',
    "params" => array(
        array(
            'type'          => 'dropdown',
            'heading'       => 'Alert Type',
            'param_name'    => 'type',
            'std'           => 'success',
            'value'         => array(
                'Success'               => 'success',
                'Info'                  => 'info',
                'Warning'               => 'warning',
                'Danger'                => 'danger',
            ),
            'holder'        => 'span',
            'class'         => 'additionaldash bolder'
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Main Text',
            'param_name'    => 'main_text',
            'holder'        => 'span',
            'class'         => 'additionaldash'
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Second Text',
            'param_name'    => 'second_text',
            'holder'        => 'span'
        ),
        array(
            'type'          => 'checkbox',
            'heading'       => 'Show Close Button',
            'param_name'    => 'show_close',
            'value'         => array( "Show Close Button" => 'yes' )
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Extra class name',
            'param_name'    => 'el_class',
            'description'   => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.'
        ),
    )
));



/**
 * jeg_button
 */
class WPBakeryShortCode_Jeg_Button  extends WPBakeryShortCode {}
vc_map(array(
    "name"                      => 'Jkreativ - Button',
    "base"                      => 'jeg_button',
    "category"                  => 'Jkreativ',
    "icon"                      => 'jeg_button_icon',
    "allowed_container_element" => 'vc_row',
    "params" => array(
        array(
            'type'          => 'dropdown',
            'heading'       => 'Button Type',
            'param_name'    => 'type',
            'std'           => 'default',
            'value'         => array(
                'Default'               => 'default',
                'Primary'               => 'primary',
                'Success'               => 'success',
                'Info'                  => 'info',
                'Warning'               => 'warning',
                'Danger'                => 'danger',
            ),
            'holder'        => 'span',
            'class'         => 'additionaldash bolder'
        ),
        array(
            'type'          => 'dropdown',
            'heading'       => 'Button Align',
            'param_name'    => 'align',
            'std'           => 'center',
            'value'         => array(
                'Left'                  => 'left',
                'Center'                => 'center',
                'Right'                 => 'right'
            ),
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Button Text',
            'param_name'    => 'text',
            'holder'        => 'span',
            'class'         => 'additionaldash'
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Button URL',
            'param_name'    => 'url',
            'std'           => '#',
            'holder'        => 'span',
        ),
        array(
            'type'          => 'checkbox',
            'heading'       => 'Open on new tab',
            'param_name'    => 'open_new_tab',
            'value'         => array( "Open on new tab" => 'yes' )
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Extra class name',
            'param_name'    => 'el_class',
            'description'   => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.'
        ),
    )
));




/**
 * jeg_youtube
 */
class WPBakeryShortCode_Jeg_Youtube  extends WPBakeryShortCode {}
vc_map(array(
    "name"                      => 'Jkreativ - Youtube',
    "base"                      => 'jeg_youtube',
    "category"                  => 'Jkreativ',
    "icon"                      => 'jeg_youtube_icon',
    "allowed_container_element" => 'vc_row',
    "params" => array(
        array(
            'type'          => 'textfield',
            'heading'       => 'Youtube video url',
            'param_name'    => 'url',
            'holder'        => 'div'
        ),
        array(
            'type'          => 'checkbox',
            'heading'       => 'Enable autoplay video',
            'param_name'    => 'autoplay',
            'value'         => array( "Enable autoplay" => 'true' )
        ),
        array(
            'type'          => 'checkbox',
            'heading'       => 'Enable repeating video',
            'param_name'    => 'repeat',
            'value'         => array( "Enable repeating" => 'true' )
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Extra class name',
            'param_name'    => 'el_class',
            'description'   => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.'
        ),
    )
));


/**
 * jeg_vimeo
 */
class WPBakeryShortCode_Jeg_Vimeo  extends WPBakeryShortCode {}
vc_map(array(
    "name"                      => 'Jkreativ - Vimeo',
    "base"                      => 'jeg_vimeo',
    "category"                  => 'Jkreativ',
    "icon"                      => 'jeg_vimeo_icon',
    "allowed_container_element" => 'vc_row',
    "params" => array(
        array(
            'type'          => 'textfield',
            'heading'       => 'Vimeo url',
            'param_name'    => 'url',
            'holder'        => 'div'
        ),
        array(
            'type'          => 'checkbox',
            'heading'       => 'Enable autoplay video',
            'param_name'    => 'autoplay',
            'value'         => array( "Enable autoplay" => 'true' )
        ),
        array(
            'type'          => 'checkbox',
            'heading'       => 'Enable repeating video',
            'param_name'    => 'repeat',
            'value'         => array( "Enable repeating" => 'true' )
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Extra class name',
            'param_name'    => 'el_class',
            'description'   => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.'
        ),
    )
));



/**
 * jeg_soundcloud
 */
class WPBakeryShortCode_Jeg_Soundcloud  extends WPBakeryShortCode {}
vc_map(array(
    "name"                      => 'Jkreativ - Soundcloud',
    "base"                      => 'jeg_soundcloud',
    "category"                  => 'Jkreativ',
    "icon"                      => 'jeg_soundcloud_icon',
    "allowed_container_element" => 'vc_row',
    "params" => array(
        array(
            'type'          => 'textfield',
            'heading'       => 'Soundcloud url',
            'param_name'    => 'url',
            'holder'        => 'div'
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Extra class name',
            'param_name'    => 'el_class',
            'description'   => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.'
        ),
    )
));



/**
 * jeg_soundcloud
 */
class WPBakeryShortCode_Jeg_Html5video  extends WPBakeryShortCode {}
vc_map(array(
    "name"                      => 'Jkreativ - HTML5 Video',
    "base"                      => 'jeg_html5video',
    "category"                  => 'Jkreativ',
    "icon"                      => 'jeg_html5video_icon',
    "allowed_container_element" => 'vc_row',
    "params" => array(
        array(
            'type'          => 'attach_image',
            'heading'       => 'Video Cover',
            'param_name'    => 'cover',
        ),
        array(
            'type'          => 'attach_file',
            'heading'       => 'Video MP4',
            'param_name'    => 'videomp4',
            'holder'        => 'div'
        ),
        array(
            'type'          => 'attach_file',
            'heading'       => 'Video WEBM',
            'param_name'    => 'videowebm',
        ),
        array(
            'type'          => 'attach_file',
            'heading'       => 'Video OGG',
            'param_name'    => 'videoogg',
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Extra class name',
            'param_name'    => 'el_class',
            'description'   => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.'
        ),
    )
));


class WPBakeryShortCode_Jeg_Imgslider_Wrapper extends WPBakeryShortCodesContainer {}
vc_map( array(
    "name"                      => "Jkreativ - Imageslider Wrapper",
    "base"                      => "jeg_imgslider_wrapper",
    "as_parent"                 => array('only' => 'jeg_imgslider'),
    "icon"                      => 'jeg_imgslider_wrapper_icon',
    "category"                  => 'Jkreativ',
    "content_element"           => true,
    "show_settings_on_create"   => false,
    "params" => array(
        array(
            'type'          => 'textfield',
            'heading'       => 'Extra class name',
            'param_name'    => 'el_class',
            'description'   => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.'
        ),
    ),
    "js_view" => 'VcColumnView'
));

class WPBakeryShortCode_Jeg_Imgslider extends WPBakeryShortCode {}
vc_map( array(
    "name"                      => "Jkreativ - Imageslider",
    "base"                      => "jeg_imgslider",
    "content_element"           => true,
    "as_child"                  => array('only' => 'jeg_imgslider_wrapper'),
    "icon"                      => 'jeg_imgslider_icon',
    "category"                  => 'Jkreativ',
    "params" => array(
        array(
            'type'          => 'attach_image',
            'heading'       => 'Image',
            'param_name'    => 'imgurl',
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Image Alternate',
            'param_name'    => 'alt',
            'holder'        => 'div'
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Extra class name',
            'param_name'    => 'el_class',
            'description'   => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.'
        ),
    )
) );


class WPBakeryShortCode_Jeg_360view extends WPBakeryShortCode {}
vc_map(array(
    "name"                      => 'Jkreativ - 360 Image view',
    "base"                      => 'jeg_360view',
    "category"                  => 'Jkreativ',
    "icon"                      => 'jeg_360view_icon',
    "allowed_container_element" => 'jeg_imgslider',
    "params" => array(
        array(
            'type'          => 'textfield',
            'heading'       => 'Image URL Pattern',
            'param_name'    => 'urlpattern',
            'description'   => 'Image URL Pattern, use url pattern with format : http://yourdomain.com/images/##.jpg<br/>' .
                '## will be replaced with image sequence. so if you having more than 99 image, you will need to increase to 3 (###)<br/>'.
                'Image number will begin from 01, and give your image name in sequence',
            'holder'        => 'div'
        ),
        array(
            'type'          => 'slider',
            'min'           => 30,
            'max'           => 200,
            'step'          => 1,
            'std'           => 60,
            'heading'       => "Number of image",
            'param_name'    => "numberimage",
            'description'   => "for more smooth animation, please provide more than 60 image"
        ),
        array(
            'type'          => 'checkbox',
            'heading'       => 'Enable autoplay animation',
            'param_name'    => 'autoplay',
            'value'         => array( "Enable autoplay" => 'true' )
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Extra class name',
            'param_name'    => 'el_class',
            'description'   => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.'
        ),
    )
));


class WPBakeryShortCode_Jeg_Team_Wrapper extends WPBakeryShortCodesContainer {}
vc_map( array(
    "name"                      => "Jkreativ - Team Wrapper",
    "base"                      => "jeg_team_wrapper",
    "as_parent"                 => array('only' => 'jeg_team_member'),
    "icon"                      => 'jeg_team_wrapper_icon',
    "category"                  => 'Jkreativ',
    "content_element"           => true,
    "show_settings_on_create"   => false,
    "params" => array(
        array(
            'type'          => 'textfield',
            'heading'       => 'Extra class name',
            'param_name'    => 'el_class',
            'description'   => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.'
        ),
    ),
    "js_view" => 'VcColumnView'
));


class WPBakeryShortCode_Jeg_Team_Item extends WPBakeryShortCode {}
vc_map( array(
    "name"                      => "Jkreativ - Team Member",
    "base"                      => "jeg_team_member",
    "content_element"           => true,
    "as_child"                  => array('only' => 'jeg_team_wrapper'),
    "icon"                      => 'jeg_team_member_icon',
    "category"                  => 'Jkreativ',
    "params" => array(
        array(
            'type'          => 'attach_image',
            'heading'       => 'Team Member Image',
            'param_name'    => 'image',
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Member Name',
            'param_name'    => 'name',
            'holder'        => 'div'
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Team Member Sub Text',
            'param_name'    => 'subtext',
            'description'   => 'ex : founder of SomeCompany.com'
        ),
        array(
            'type'          => 'textarea',
            'heading'       => 'Description',
            'param_name'    => 'description',
            'description'   => 'Team Member Short Description'
        ),

        array(
            'type'          => "checkbox",
            'heading'       => "Team Member Social 1",
            'param_name'    => "enable_team_1",
            'value'         => array( "Enable Team Member Social 1" => 'true' ),
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Social Name',
            'param_name'    => 'socialname_1',
            'description'   => 'ex : facebook, twiter, linkedin',
            'dependency'    => Array('element' => "enable_team_1", 'value' => array('true')),
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Social URL',
            'param_name'    => 'socialurl_1',
            'dependency'    => Array('element' => "enable_team_1", 'value' => array('true')),
        ),


        array(
            'type'          => "checkbox",
            'heading'       => "Team Member Social 2",
            'param_name'    => "enable_team_2",
            'value'         => array( "Enable Team Member Social 2" => 'true' ),
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Social Name',
            'param_name'    => 'socialname_2',
            'description'   => 'ex : facebook, twiter, linkedin',
            'dependency'    => Array('element' => "enable_team_2", 'value' => array('true')),
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Social URL',
            'param_name'    => 'socialurl_2',
            'dependency'    => Array('element' => "enable_team_2", 'value' => array('true')),
        ),


        array(
            'type'          => "checkbox",
            'heading'       => "Team Member Social 3",
            'param_name'    => "enable_team_3",
            'value'         => array( "Enable Team Member Social 3" => 'true' ),
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Social Name',
            'param_name'    => 'socialname_3',
            'description'   => 'ex : facebook, twiter, linkedin',
            'dependency'    => Array('element' => "enable_team_3", 'value' => array('true')),
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Social URL',
            'param_name'    => 'socialurl_3',
            'dependency'    => Array('element' => "enable_team_3", 'value' => array('true')),
        ),


    )
) );


class WPBakeryShortCode_Jeg_Heading extends WPBakeryShortCode {}
vc_map( array(
    "name"                      => "Jkreativ - Section Title",
    "base"                      => "jeg_heading",
    "icon"                      => 'jeg_heading_icon',
    "category"                  => 'Jkreativ',
    "params" => array(
        array(
            'type'          => 'dropdown',
            'heading'       => 'Heading Type',
            'param_name'    => 'type',
            'std'           => 'h1',
            'value'         => array(
                'H1'               => 'h1',
                'H2'               => 'h2',
                'H3'               => 'h3',
                'H4'               => 'h4',
                'H5'               => 'h5',
                'H6'               => 'h6',
            ),
        ),
        array(
            'type'          => 'dropdown',
            'heading'       => 'Heading Position',
            'param_name'    => 'float',
            'std'           => 'center',
            'value'         => array(
                'Center'            => 'center',
                'Left'              => 'left',
                'Right'             => 'right',
            ),
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Heading Title',
            'param_name'    => 'title',
            'holder'        => 'span',
            'class'         => 'additionaldash'
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Title Alternate',
            'param_name'    => 'alt',
            'holder'        => 'span'
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Extra class name',
            'param_name'    => 'el_class',
            'description'   => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.'
        ),
    )
));


class WPBakeryShortCode_Jeg_Landing_Quote extends WPBakeryShortCode {}
vc_map( array(
    "name"                      => "Jkreativ - Landing Quote",
    "base"                      => "jeg_landing_quote",
    "icon"                      => 'jeg_landing_quote_icon',
    "category"                  => 'Jkreativ',
    "params" => array(
        array(
            'type'          => 'textfield',
            'heading'       => 'Quote Author',
            'param_name'    => 'author',
            'holder'        => 'span',
            'class'         => 'additionaldash'
        ),
        array(
            'type'          => 'textarea',
            'heading'       => 'Quote Text',
            'param_name'    => 'text',
            'holder'        => 'span'
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Extra class name',
            'param_name'    => 'el_class',
            'description'   => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.'
        ),
    )
));


class WPBakeryShortCode_Jeg_Callout extends WPBakeryShortCode {}
vc_map( array(
    "name"                      => "Jkreativ - Callout",
    "base"                      => "jeg_callout",
    "icon"                      => 'jeg_callout_icon',
    "category"                  => 'Jkreativ',
    "params" => array(
        array(
            'type'          => 'textfield',
            'heading'       => 'Callout text',
            'param_name'    => 'text',
            'holder'        => 'span',
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Callout button text',
            'param_name'    => 'buttontext',
        ),
        array(
            'type'          => 'textarea',
            'heading'       => 'Callout button url',
            'param_name'    => 'buttonurl',
        ),
        array(
            'type'          => 'dropdown',
            'heading'       => 'Button style',
            'param_name'    => 'buttonstyle',
            'std'           => 'default',
            'value'         => array(
                'Default'               => 'default',
                'Primary'               => 'primary',
                'Success'               => 'success',
                'Info'                  => 'info',
                'Warning'               => 'warning',
                'Danger'                => 'danger',
            ),
        ),
        array(
            'type'          => 'checkbox',
            'heading'       => 'Center text on callout',
            'param_name'    => 'center',
            'value'         => array( "Centering Text" => 'true' )
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Extra class name',
            'param_name'    => 'el_class',
            'description'   => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.'
        ),
    )
));

class WPBakeryShortCode_Jeg_Iframe extends WPBakeryShortCode {}
vc_map( array(
    "name"                      => "Jkreativ - Iframe",
    "base"                      => "jeg_iframe",
    "icon"                      => 'jeg_iframe_icon',
    "category"                  => 'Jkreativ',
    "params" => array(
        array(
            'type'          => 'textfield',
            'heading'       => 'Iframe URL',
            'param_name'    => 'url',
            'holder'        => 'span',
        ),
        array(
            'type'          => 'slider',
            'min'           => 100,
            'max'           => 2000,
            'step'          => 50,
            'std'           => 650,
            'heading'       => "Iframe Height",
            'param_name'    => "height",
        ),
    )
));


class WPBakeryShortCode_Jeg_Fullwidth_Map_Wrapper extends WPBakeryShortCodesContainer {}
vc_map( array(
    "name"                      => "Jkreativ - Fullwidth Map Wrapper",
    "base"                      => "jeg_fullwidth_map_wrapper",
    "as_parent"                 => array('only' => 'jeg_fullwidth_map_detail'),
    "icon"                      => 'jeg_fullwidth_map_wrapper_icon',
    "category"                  => 'Jkreativ',
    "content_element"           => true,
    "show_settings_on_create"   => true,
    "params" => array(
        array(
            'type'          => 'textfield',
            'heading'       => 'Map Title',
            'param_name'    => 'title',
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Latitude',
            'param_name'    => 'lat',
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Longitude',
            'param_name'    => 'lng',
        ),
        array(
            'type'          => 'slider',
            'min'           => 1,
            'max'           => 21,
            'step'          => 1,
            'std'           => 14,
            'heading'       => "Map Zoom",
            'param_name'    => "zoom",
        ),
        array(
            'type'          => 'slider',
            'min'           => 300,
            'max'           => 800,
            'step'          => 1,
            'std'           => 550,
            'heading'       => "Container Height",
            'param_name'    => "height",
        ),
        array(
            'type'          => "checkbox",
            'heading'       => "Don't use full width map",
            'param_name'    => "nofullwidth",
            'value'         => array( "Use Boxed Map" => 'true' ),
        ),
    ),
    "js_view" => 'VcColumnView'
));


class WPBakeryShortCode_Jeg_Fullwidth_Map_Detail extends WPBakeryShortCode {}
vc_map( array(
    "name"                      => "Jkreativ - Fullwidth Map Detail",
    "base"                      => "jeg_fullwidth_map_detail",
    "content_element"           => true,
    "as_child"                  => array('only' => 'jeg_fullwidth_map_wrapper'),
    "icon"                      => 'jeg_fullwidth_map_detail_icon',
    "category"                  => 'Jkreativ',
    "params" => array(
        array(
            'type'          => 'textfield',
            'heading'       => 'Text',
            'param_name'    => 'text',
            'description'   => 'ex : Your address, your website, or your phone',
            'holder'        => 'div'
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'URL',
            'param_name'    => 'url',
            'description'   => 'leave empty if not having url',
        ),
    )
));



class WPBakeryShortCode_Jeg_Service_Image_Wrapper extends WPBakeryShortCodesContainer {}
vc_map( array(
    "name"                      => "Jkreativ - Service Image Wrapper",
    "base"                      => "jeg_service_image_wrapper",
    "as_parent"                 => array('only' => 'jeg_service_image_item'),
    "icon"                      => 'jeg_service_image_wrapper_icon',
    "category"                  => 'Jkreativ',
    "content_element"           => true,
    "show_settings_on_create"   => false,
    "params" => array(
        array(
            'type'          => 'textfield',
            'heading'       => 'Extra class name',
            'param_name'    => 'el_class',
            'description'   => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.'
        ),
    ),
    "js_view" => 'VcColumnView'
));


class WPBakeryShortCode_Jeg_Service_Image_Item extends WPBakeryShortCode {}
vc_map( array(
    "name"                      => "Jkreativ - Service Image Item",
    "base"                      => "jeg_service_image_item",
    "content_element"           => true,
    "as_child"                  => array('only' => 'jeg_service_image_wrapper'),
    "icon"                      => 'jeg_service_image_item_icon',
    "category"                  => 'Jkreativ',
    "params" => array(
        array(
            'type'          => 'attach_image',
            'heading'       => 'Service Image',
            'param_name'    => 'image',
            'description'   => 'upload 440x440 pixel image'
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Service Title',
            'param_name'    => 'title',
            'holder'        => 'div'
        ),
        array(
            'type'          => 'textarea',
            'heading'       => 'Service Description',
            'param_name'    => 'alt',
        ),
        array(
            'type'          => 'colorpicker',
            'heading'       => 'Background Color',
            'param_name'    => 'background_color',
        ),
        array(
            'type'          => 'colorpicker',
            'heading'       => 'Text Color',
            'param_name'    => 'text_color',
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Extra class name',
            'param_name'    => 'el_class',
            'description'   => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.'
        ),
    )
) );


class WPBakeryShortCode_Jeg_Service_Icon_Wrapper extends WPBakeryShortCodesContainer {}
vc_map( array(
    "name"                      => "Jkreativ - Service Icon Wrapper",
    "base"                      => "jeg_service_icon_wrapper",
    "as_parent"                 => array('only' => 'jeg_service_icon_item'),
    "icon"                      => 'jeg_service_image_wrapper_icon',
    "category"                  => 'Jkreativ',
    "content_element"           => true,
    "show_settings_on_create"   => true,
    "params" => array(
        array(
            'type'          => 'slider',
            'min'           => 1,
            'max'           => 3,
            'step'          => 1,
            'std'           => 3,
            'heading'       => "Service item width",
            'param_name'    => "itemwidth",
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Extra class name',
            'param_name'    => 'el_class',
            'description'   => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.'
        ),
    ),
    "js_view" => 'VcColumnView'
));


class WPBakeryShortCode_Jeg_Service_Icon_Item extends WPBakeryShortCode {}
vc_map( array(
    "name"                      => "Jkreativ - Service Icon Item",
    "base"                      => "jeg_service_icon_item",
    "content_element"           => true,
    "as_child"                  => array('only' => 'jeg_service_icon_wrapper'),
    "icon"                      => 'jeg_service_icon_item_icon',
    "category"                  => 'Jkreativ',
    "params" => array(
        array(
            'type'          => 'fontawesome',
            'heading'       => 'Service Icon',
            'param_name'    => 'icon',
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Service Title',
            'param_name'    => 'title',
            'holder'        => 'div'
        ),
        array(
            'type'          => 'textarea',
            'heading'       => 'Service Description',
            'param_name'    => 'desc',
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Extra class name',
            'param_name'    => 'el_class',
            'description'   => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.'
        ),
    )
));


class WPBakeryShortCode_Jeg_Service_Block_Wrapper extends WPBakeryShortCodesContainer {}
vc_map( array(
    "name"                      => "Jkreativ - Service Block Wrapper",
    "base"                      => "jeg_service_block_wrapper",
    "as_parent"                 => array('only' => 'jeg_service_block_item'),
    "icon"                      => 'jeg_service_image_wrapper_block',
    "category"                  => 'Jkreativ',
    "content_element"           => true,
    "show_settings_on_create"   => true,
    "params" => array(
        array(
            'type'          => 'slider',
            'min'           => 2,
            'max'           => 3,
            'step'          => 1,
            'std'           => 3,
            'heading'       => "Service item width",
            'param_name'    => "itemwidth",
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Extra class name',
            'param_name'    => 'el_class',
            'description'   => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.'
        ),
    ),
    "js_view" => 'VcColumnView'
));


class WPBakeryShortCode_Jeg_Service_Block_Item extends WPBakeryShortCode {}
vc_map( array(
    "name"                      => "Jkreativ - Service Block Item",
    "base"                      => "jeg_service_block_item",
    "content_element"           => true,
    "as_child"                  => array('only' => 'jeg_service_block_wrapper'),
    "icon"                      => 'jeg_service_block_item_icon',
    "category"                  => 'Jkreativ',
    "params" => array(
        array(
            'type'          => 'fontawesome',
            'heading'       => 'Service Icon',
            'param_name'    => 'icon',
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Service Title',
            'param_name'    => 'title',
            'holder'        => 'div'
        ),
        array(
            'type'          => 'textarea',
            'heading'       => 'Service Description',
            'param_name'    => 'desc',
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Extra class name',
            'param_name'    => 'el_class',
            'description'   => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.'
        ),
    )
));


class WPBakeryShortCode_Jeg_Blog_List  extends WPBakeryShortCode {}
$pagelist = jeg_get_all_page_vc();
vc_map(array(
    "name"                      => 'Jkreativ - Blog List',
    "base"                      => 'jeg_blog_list',
    "category"                  => 'Jkreativ',
    "icon"                      => 'jeg_blog_list_icon',
    "allowed_container_element" => 'vc_row',
    "params" => array(
        array(
            'type'          => 'slider',
            'min'           => 2,
            'max'           => 5,
            'step'          => 1,
            'std'           => 10,
            'heading'       => "Counter block number",
            'param_name'    => "number",
        ),
        array(
            'type'          => 'dropdown',
            'heading'       => 'Read More Page Link',
            'param_name'    => 'readmorepage',
            'value'         => $pagelist,
        ),
    )
));



class WPBakeryShortCode_Jeg_Counter_Block_Wrapper extends WPBakeryShortCodesContainer {}
vc_map( array(
    "name"                      => "Jkreativ - Counter Block Wrapper",
    "base"                      => "jeg_counter_block_wrapper",
    "as_parent"                 => array('only' => 'jeg_counter_block_item'),
    "icon"                      => 'jeg_counter_block_wrapper_block',
    "category"                  => 'Jkreativ',
    "content_element"           => true,
    "show_settings_on_create"   => true,
    "params" => array(
        array(
            'type'          => 'slider',
            'min'           => 3,
            'max'           => 4,
            'step'          => 1,
            'std'           => 4,
            'heading'       => "Service item width",
            'param_name'    => "itemwidth",
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Extra class name',
            'param_name'    => 'el_class',
            'description'   => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.'
        ),
    ),
    "js_view" => 'VcColumnView'
));


class WPBakeryShortCode_Jeg_Counter_Block_Item extends WPBakeryShortCode {}
vc_map( array(
    "name"                      => "Jkreativ - Counter Block Item",
    "base"                      => "jeg_counter_block_item",
    "content_element"           => true,
    "as_child"                  => array('only' => 'jeg_counter_block_wrapper'),
    "icon"                      => 'jeg_counter_block_item_icon',
    "category"                  => 'Jkreativ',
    "params" => array(
        array(
            'type'          => 'textfield',
            'heading'       => 'Counter Text',
            'param_name'    => 'text',
            'holder'        => 'span',
            'class'         => 'additionaldash'
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Counter Number',
            'param_name'    => 'number',
            'holder'        => 'span'
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Extra class name',
            'param_name'    => 'el_class',
            'description'   => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.'
        ),
    )
));




class WPBakeryShortCode_Jeg_Skill_Bar_Wrapper extends WPBakeryShortCodesContainer {}
vc_map( array(
    "name"                      => "Jkreativ - Skill Bar Wrapper",
    "base"                      => "jeg_skill_bar_wrapper",
    "as_parent"                 => array('only' => 'jeg_skill_bar_item'),
    "icon"                      => 'jeg_skill_bar_wrapper_block',
    "category"                  => 'Jkreativ',
    "content_element"           => true,
    "show_settings_on_create"   => false,
    "params" => array(
        array(
            'type'          => 'textfield',
            'heading'       => 'Extra class name',
            'param_name'    => 'el_class',
            'description'   => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.'
        ),
    ),
    "js_view" => 'VcColumnView'
));


class WPBakeryShortCode_Jeg_Skill_Bar_Item extends WPBakeryShortCode {}
vc_map( array(
    "name"                      => "Jkreativ - Skill Bar Item",
    "base"                      => "jeg_skill_bar_item",
    "content_element"           => true,
    "as_child"                  => array('only' => 'jeg_skill_bar_wrapper'),
    "icon"                      => 'jeg_skill_bar_item_icon',
    "category"                  => 'Jkreativ',
    "params" => array(
        array(
            'type'          => 'textfield',
            'heading'       => 'Skill title',
            'param_name'    => 'title',
            'holder'        => 'span',
            'class'         => 'additionaldash'
        ),
        array(
            'type'          => 'slider',
            'min'           => 1,
            'max'           => 100,
            'step'          => 1,
            'std'           => 100,
            'heading'       => "Skill percentage",
            'param_name'    => "percentage",
            'holder'        => 'span'
        ),
        array(
            'type'          => 'colorpicker',
            'heading'       => 'Graph Color',
            'param_name'    => 'graphcolor',
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Extra class name',
            'param_name'    => 'el_class',
            'description'   => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.'
        ),
    )
));





class WPBakeryShortCode_Jeg_Testi_Slider_Wrapper extends WPBakeryShortCodesContainer {}
vc_map( array(
    "name"                      => "Jkreativ - Testimonial Slider Wrapper",
    "base"                      => "jeg_testi_slider_wrapper",
    "as_parent"                 => array('only' => 'jeg_testi_slider_item'),
    "icon"                      => 'jeg_testi_slider_wrapper_block',
    "category"                  => 'Jkreativ',
    "content_element"           => true,
    "show_settings_on_create"   => false,
    "params" => array(
        array(
            'type'          => 'textfield',
            'heading'       => 'Extra class name',
            'param_name'    => 'el_class',
            'description'   => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.'
        ),
    ),
    "js_view" => 'VcColumnView'
));


class WPBakeryShortCode_Jeg_Testi_Slider_Item extends WPBakeryShortCode {}
vc_map( array(
    "name"                      => "Jkreativ - Testimoni Slider Item",
    "base"                      => "jeg_testi_slider_item",
    "content_element"           => true,
    "as_child"                  => array('only' => 'jeg_testi_slider_wrapper'),
    "icon"                      => 'jeg_testi_slider_item_icon',
    "category"                  => 'Jkreativ',
    "params" => array(
        array(
            'type'          => 'attach_image',
            'heading'       => 'Testimonial image',
            'param_name'    => 'image',
            'description'   => 'Upload 160x160 pixel image'
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Name',
            'param_name'    => 'name',
            'holder'        => 'span',
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Company Name or Position',
            'param_name'    => 'position',
        ),
        array(
            'type'          => 'textarea',
            'heading'       => 'Testimonial Content',
            'param_name'    => 'text',
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Extra class name',
            'param_name'    => 'el_class',
            'description'   => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.'
        ),
    )
));




class WPBakeryShortCode_Jeg_Client_List_Wrapper extends WPBakeryShortCodesContainer {}
vc_map( array(
    "name"                      => "Jkreativ - Client List Wrapper",
    "base"                      => "jeg_client_list_wrapper",
    "as_parent"                 => array('only' => 'jeg_client_list_item'),
    "icon"                      => 'jeg_client_list_wrapper_block',
    "category"                  => 'Jkreativ',
    "content_element"           => true,
    "show_settings_on_create"   => false,
    "params" => array(
        array(
            'type'          => 'slider',
            'min'           => 2,
            'max'           => 10,
            'step'          => 1,
            'std'           => 5,
            'heading'       => "Number Of Item",
            'param_name'    => "number",
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Extra class name',
            'param_name'    => 'el_class',
            'description'   => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.'
        ),
    ),
    "js_view" => 'VcColumnView'
));


class WPBakeryShortCode_Jeg_Client_List_Item extends WPBakeryShortCode {}
vc_map( array(
    "name"                      => "Jkreativ - Client List Item",
    "base"                      => "jeg_client_list_item",
    "content_element"           => true,
    "as_child"                  => array('only' => 'jeg_client_list_wrapper'),
    "icon"                      => 'jeg_client_list_item_icon',
    "category"                  => 'Jkreativ',
    "params" => array(
        array(
            'type'          => 'textfield',
            'heading'       => 'Client name',
            'param_name'    => 'name',
            'holder'        => 'span',
        ),
        array(
            'type'          => 'attach_image',
            'heading'       => 'Upload client image',
            'param_name'    => 'image',
            'description'   => 'Upload Identical Image Size with another Client Image'
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Extra class name',
            'param_name'    => 'el_class',
            'description'   => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.'
        ),
    )
));



class WPBakeryShortCode_Jeg_Image_Sequence_Wrapper extends WPBakeryShortCodesContainer {}
vc_map( array(
    "name"                      => "Jkreativ - Image Animation Sequence Wrapper",
    "base"                      => "jeg_image_sequence_wrapper",
    "as_parent"                 => array('only' => 'jeg_image_sequence_item'),
    "icon"                      => 'jeg_image_sequence_wrapper_block',
    "category"                  => 'Jkreativ',
    "content_element"           => true,
    "show_settings_on_create"   => false,
    "params" => array(
        array(
            'type'          => 'dropdown',
            'heading'       => 'Animation Speed',
            'param_name'    => 'animspeed',
            'std'           => 'slow',
            'value'         => array(
                'Fast'              => 'fast',
                'Slow'              => 'slow',
                'Slower'            => 'slower'
            )
        ),
        array(
            'type'          => 'slider',
            'min'           => 50,
            'max'           => 2000,
            'step'          => 1,
            'std'           => 150,
            'heading'       => "Animation Sequence Speed",
            'param_name'    => "seqspeed"
        )
    ),
    "js_view" => 'VcColumnView'
));


class WPBakeryShortCode_Jeg_Image_Sequence_Item extends WPBakeryShortCode {}
vc_map( array(
    "name"                      => "Jkreativ - Image Animation Sequence Item",
    "base"                      => "jeg_image_sequence_item",
    "content_element"           => true,
    "as_child"                  => array('only' => 'jeg_image_sequence_wrapper'),
    "icon"                      => 'jeg_image_sequence_item_icon',
    "category"                  => 'Jkreativ',
    "params" => array(
        array(
            'type'          => 'attach_image',
            'heading'       => 'Upload client image',
            'param_name'    => 'image',
            'description'   => 'Upload Identical Image Size with another Client Image'
        ),
        array(
            'type'          => 'checkbox',
            'heading'       => 'Enable fadein animation',
            'param_name'    => 'fadein',
            'value'         => array( "Enable fadein animation" => 'yes' ),
            'description'   => "If you enable this option, you will also need to enable grid animation on row wrapper"
        ),
        array(
            'type'          => 'checkbox',
            'heading'       => 'Enable scale animation',
            'param_name'    => 'scale',
            'value'         => array( "Enable scale animation" => 'yes' ),
            'description'   => "If you enable this option, you will also need to enable grid animation on row wrapper"
        ),
        array(
            'type'          => 'dropdown',
            'heading'       => 'Animation Position',
            'param_name'    => 'position',
            'std'           => 'none',
            'value'         => array(
                'None'          => 'none',
                'Top'           => 'top',
                'Bottom'        => 'bottom',
                'Left'          => 'left',
                'Right'         => 'right',
            ),
            'description'   => "If you enable this option, you will also need to enable grid animation on row wrapper"
        )

    )
));



class WPBakeryShortCode_Jeg_Product_Slider extends WPBakeryShortCode {}
vc_map( array(
    "name"                      => "Jkreativ - Latest Product Slider",
    "base"                      => "jeg_product_slider",
    "icon"                      => 'jeg_product_slider_icon',
    "category"                  => 'Jkreativ',
    "params" => array(
        array(
            'type'          => 'slider',
            'min'           => 3,
            'max'           => 20,
            'step'          => 1,
            'std'           => 8,
            'heading'       => "Product Number",
            'param_name'    => "number"
        ),
        array(
            'type'          => 'slider',
            'min'           => 3,
            'max'           => 4,
            'step'          => 1,
            'std'           => 4,
            'heading'       => "Column Number",
            'param_name'    => "column"
        ),
        array(
            'type'          => 'slider',
            'min'           => 0.4,
            'max'           => 2,
            'step'          => 0.1,
            'std'           => 1,
            'heading'       => "Product Image Dimension",
            'param_name'    => "image_dimension"
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Extra class name',
            'param_name'    => 'el_class',
            'description'   => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.'
        ),
    )
));




class WPBakeryShortCode_Jeg_Portfolio_Wrapper extends WPBakeryShortCodesContainer {}
$portfoliopagelist = jeg_get_portfolio_page_vc();
vc_map( array(
    "name"                      => "Jkreativ - Portfolio block wrapper",
    "base"                      => "jeg_portfolio_wrapper",
    "as_parent"                 => array('only' => 'jeg_portfolio_item'),
    "icon"                      => 'jeg_portfolio_wrapper_block',
    "category"                  => 'Jkreativ',
    "content_element"           => true,
    "show_settings_on_create"   => true,
    "params" => array(
        array(
            'type'          => 'dropdown',
            'heading'       => 'Portfolio Parent',
            'param_name'    => 'parent',
            'value'         => $portfoliopagelist
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Button portfolio parent link text',
            'param_name'    => 'buttontext',
            'description'   => 'ex : SHOW ALL PORTFOLIO'
        ),
    ),
    "js_view" => 'VcColumnView'
));


class WPBakeryShortCode_Jeg_Portfolio_Item extends WPBakeryShortCode {}
$portfolioitemlist = jeg_get_portfolio_item_vc();
vc_map( array(
    "name"                      => "Jkreativ - Portfolio block Item",
    "base"                      => "jeg_portfolio_item",
    "content_element"           => true,
    "as_child"                  => array('only' => 'jeg_portfolio_wrapper'),
    "icon"                      => 'jeg_portfolio_item_icon',
    "category"                  => 'Jkreativ',
    "params" => array(
        array(
            'type'          => 'dropdown',
            'heading'       => 'Portfolio Item',
            'param_name'    => 'id',
            'value'         => $portfolioitemlist,
            'holder'        => 'span',
            'class'         => 'additionaldash bolder'
        ),
        array(
            'type'          => 'attach_image',
            'heading'       => 'Portfolio image',
            'param_name'    => 'image',
            'description'   => 'Leave empty to use default portfolio cover'
        ),
        array(
            'type'          => 'dropdown',
            'heading'       => 'Block Width',
            'param_name'    => 'blockwidth',
            'value'         => array(
                '1/3'           => '1/3',
                '1/2'           => '1/2',
                '2/3'           => '2/3',
            ),
            'holder'        => 'span',
            'class'         => 'additionaldash'
        ),
        array(
            'type'          => 'dropdown',
            'heading'       => 'Block Height',
            'param_name'    => 'blockheight',
            'value'         => array(
                '1'           => '1',
                '2'           => '2',
            ),
            'holder'        => 'span'
        ),
    )
));




class WPBakeryShortCode_Jeg_Pricing_Wrapper extends WPBakeryShortCodesContainer {}
vc_map( array(
    "name"                      => "Jkreativ - Pricing Wrapper",
    "base"                      => "jeg_pricing_wrapper",
    "as_parent"                 => array('only' => 'jeg_pricing_item'),
    "icon"                      => 'jeg_pricing_wrapper_block',
    "category"                  => 'Jkreativ',
    "content_element"           => true,
    "show_settings_on_create"   => true,
    "params" => array(
        array(
            'type'          => 'slider',
            'min'           => 3,
            'max'           => 5,
            'step'          => 1,
            'std'           => 3,
            'heading'       => "Pricing Column Number",
            'param_name'    => "column",
            'holder'        => 'span',
        ),
    ),
    "js_view" => 'VcColumnView'
));

class WPBakeryShortCode_Jeg_Pricing_Item extends WPBakeryShortCode {}
vc_map( array(
    "name"                      => "Jkreativ - Pricing Item",
    "base"                      => "jeg_pricing_item",
    "content_element"           => true,
    "as_child"                  => array('only' => 'jeg_pricing_wrapper'),
    "icon"                      => 'jeg_pricing_item_icon',
    "category"                  => 'Jkreativ',
    "params" => array(
        array(
            'type'          => 'textfield',
            'heading'       => 'Pricing Title',
            'param_name'    => 'title',
            'description'   => 'example : Basic Plan',
            'holder'        => 'div',
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Currency',
            'param_name'    => 'sign',
            'description'   => 'example : $'
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Price',
            'param_name'    => 'price',
            'description'   => 'example : 50'
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Duration',
            'param_name'    => 'duration',
            'description'   => 'example : per month'
        ),
        array(
            'type'          => "checkbox",
            'heading'       => "Hightlight this Pricing Block",
            'param_name'    => "highlight",
            'value'         => array( "Highlight Pricing" => 'true' ),
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Additional Alternate Text',
            'param_name'    => 'alt',
            'description'   => 'example : Best Option',
            'dependency'    => Array('element' => "highlight", 'value' => array('true'))
        ),
        array(
            'type'          => "checkbox",
            'heading'       => "Show Button",
            'param_name'    => "showbutton",
            'value'         => array( "Show Pricing Button" => 'true' ),
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Button Text',
            'param_name'    => 'buttontext',
            'dependency'    => Array('element' => "showbutton", 'value' => array('true'))
        ),
        array(
            'type'          => 'textfield',
            'heading'       => 'Button URL',
            'param_name'    => 'buttonurl',
            'dependency'    => Array('element' => "showbutton", 'value' => array('true'))
        ),
        array(
            'type'          => 'textarea_html',
            'heading'       => 'Pricing Detail Content',
            'param_name'    => 'content',
            'std'           => '<ul><li>Pricing Detail Content</li><li>Pricing Detail Content</li><li>Pricing Detail Content</li></ul>'
        ),
    )
));