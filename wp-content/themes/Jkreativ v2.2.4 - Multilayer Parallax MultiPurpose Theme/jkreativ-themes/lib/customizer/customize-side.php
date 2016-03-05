<?php

/*** Navigation Styling **/
function jeg_customize_side_nav($wp_customize)
{
	new Jeg_Customizer_Framework(array(
		'name'			=> 'jeg_side_nav',
		'title'			=> 'Navigation - Side (Main Navigation)',
		'priority' 		=> 23,
		'description'	=> 'All option will only affected if you are using side navigation'
	), array(

		array(
			'type' 		=> 'flag',
			'name' 		=> 'jeg_top_logo_flag',
			'title' 	=> 'Side Navigation Logo'
		),
		array(
			'type' 		=> 'newupload',
			'name' 		=> 'side_nav_logo_image',
			'title' 	=>  'Logo',
			'transport' => 'postMessage',
			'default' 	=> get_template_directory_uri() . '/public/img/logo.png',
		),
		array(
			'type' 		=> 'newupload',
			'name' 		=> 'side_nav_logo_retina',
			'title' 	=>  'Logo Retina (2x size of normal logo)',
			'transport' => 'postMessage',
			'default' 	=> get_template_directory_uri() . '/public/img/logo@2x.png',
		),
		array(
			'type' 		=> 'slider',
			'name' 		=> 'side_nav_top_padding',
			'title' 	=> 'Logo top padding',
			'transport' => 'postMessage',
			'default' 	=> 30,
			'min'		=> 0,
			'max'		=> 150,
			'step'		=> 1
		),
		array(
			'type' 		=> 'slider',
			'name' 		=> 'side_nav_bottom_padding',
			'title' 	=> 'Logo Bottom Padding',
			'transport' => 'postMessage',
			'default' 	=> 30,
			'min'		=> 0,
			'max'		=> 150,
			'step'		=> 1
		),

		array(
			'type' 		=> 'flag',
			'name' 		=> 'jeg_side_style_flag',
			'title' 	=> 'Side Style'
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_side_bg',
			'title' 	=>  'Menu Background',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),

		array(
			'type' 		=> 'flag',
			'name' 		=> 'jeg_side_main_flag',
			'title' 	=> 'Main Navigation Style'
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_side_nav_top_border',
			'title' 	=>  'Top Border',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_side_nav_color',
			'title' 	=>  'Side navigation color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_side_nav_color_active',
			'title' 	=>  'Side navigation active color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_side_nav_bottom_border',
			'title' 	=>  'Side navigation bottom border',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),


		array(
			'type' 		=> 'flag',
			'name' 		=> 'jeg_side_bottom_style_flag',
			'title' 	=> 'Side Bottom'
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_side_bottom_bg',
			'title' 	=>  'Bottom Background',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),

		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_side_link_color',
			'title' 	=>  'Bottom Link Color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_side_link_color_hover',
			'title' 	=>  'Bottom hover link color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_side_bottom_copyright',
			'title' 	=>  'Copyright color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_side_social',
			'title' 	=>  'Side social',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_side_social_border',
			'title' 	=>  'Side social border',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_side_social_hover',
			'title' 	=>  'Side social hovered',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_side_social_border_hovered',
			'title' 	=>  'Side social border_hovered',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_side_btm_link_color',
			'title' 	=>  'Bottom link color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_side_btm_link_color_hover',
			'title' 	=>  'Bottom link hover color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_side_btm_separator',
			'title' 	=>  'Bottom separator',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),


		array(
			'type' 		=> 'flag',
			'name' 		=> 'jeg_side_additional_flag',
			'title' 	=> 'Additional Block (widget)'
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_side_additional_top_border',
			'title' 	=>  'Additional top border',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_side_additional_bottom_border',
			'title' 	=>  'Additional bottom border',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_side_additional_title',
			'title' 	=>  'Additional title color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_side_additional_title_border',
			'title' 	=>  'Additional title border',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_side_additional_text_color',
			'title' 	=>  'Additional text color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),

		array(
			'type' 		=> 'flag',
			'name' 		=> 'jeg_side_collapse',
			'title' 	=> 'Collapse side'
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_side_collapse_icon_color',
			'title' 	=>  'Side collapse icon color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
	), $wp_customize);
}