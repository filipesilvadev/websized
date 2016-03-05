<?php

if (class_exists('WPBakeryVisualComposerAbstract')) {
    return array(
        'id' => 'jkreativ_portfolio_landing_vc',
        'types' => array(JEG_PORTFOLIO_POST_TYPE),
        'title' => 'Jkreativ Extend Portfolio Setting & Header',
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

        ),
    );
} else {
    return array(
        'id'        => 'jkreativ_portfolio_landing_vc',
        'types'     => array(JEG_PORTFOLIO_POST_TYPE),
        'title'     => 'Jkreativ Extend Portfolio Setting & Header',
        'priority'  => 'high',
        'template'    => array(
            array(
                'type' => 'notebox',
                'name' => 'nb_position',
                'label' => 'We detect that you havent install/activate visual composer yet, please activate your visual composer to use this feature',
                'status' => 'info',
            ),
        ),
    );
}