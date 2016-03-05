<?php

/*** Top Navigation Styling **/
function jeg_customize_top_nav($wp_customize)
{
	new Jeg_Customizer_Framework(array(
		'name'			=> 'jeg_top_nav_section',
		'title'			=> 'Navigation - Top',
		'priority' 		=> 22,
		'description'	=> 'All option will only affected if you are using Top Navigation'
	), array(

		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_top_nav_background_color',
			'title' 	=>  'Background Color',
			'transport'	=> 'postMessage',
			'default' 	=> null
		),

		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_top_nav_line_color',
			'title' 	=>  'Separator line Color',
			'transport'	=> 'postMessage',
			'default' 	=> null
		),

		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_top_nav_icon_color',
			'title' 	=>  'Icon Color',
			'transport'	=> 'postMessage',
			'default' 	=> null
		),

		array(
			'type' 		=> 'flag',
			'name' 		=> 'jeg_top_nav_flag',
			'title' 	=> 'Top Navigation Logo'
		),

		array(
			'type' 		=> 'newupload',
			'name' 		=> 'jeg_top_nav_logo',
			'title' 	=>  'Logo',
			'transport' => 'postMessage',
			'default' 	=> get_template_directory_uri() . '/public/img/logo.png'
		),

		array(
			'type' 		=> 'newupload',
			'name' 		=> 'jeg_top_nav_logo_retina',
			'title' 	=>  'Logo Retina (2x size of normal logo)',
			'transport' => 'postMessage',
			'default' 	=> get_template_directory_uri() . '/public/img/logo@2x.png'
		),

		array(
			'type' 		=> 'slider',
			'name' 		=> 'jeg_top_nav_top_position',
			'title' 	=>  'Logo top position',
			'transport' => 'postMessage',
			'default' 	=> 15,
			'min'		=> -150,
			'max'		=> 150,
			'step'		=> 1
		),

		array(
			'type' 		=> 'slider',
			'name' 		=> 'jeg_top_nav_left_position',
			'title' 	=>  'Logo left position',
			'transport' => 'postMessage',
			'default' 	=> 20,
			'min'		=> 0,
			'max'		=> 200,
			'step'		=> 1
		),

		array(
			'type' 		=> 'slider',
			'name' 		=> 'jeg_top_nav_height',
			'title' 	=>  'Navigation Height',
			'transport' => 'postMessage',
			'default' 	=> 60,
			'min'		=> 60,
			'max'		=> 200,
			'step'		=> 1
		),


		array(
			'type' 		=> 'flag',
			'name' 		=> 'jeg_top_nav_menu_flag',
			'title' 	=>  'Navigation Menu',
		),

		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_top_menu_color',
			'title' 	=>  'Menu text color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_top_hover_menu_color',
			'title' 	=>  'Hover menu text color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_top_hover_bg_color',
			'title' 	=>  'Hover menu background color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),


		array(
			'type' 		=> 'flag',
			'name' 		=> 'jeg_top_nav_drop_menu_flag',
			'title' 	=>  'Drop Navigation Menu',
		),

		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_top_nav_drop_bg',
			'title' 	=> 'Drop menu background color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),

		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_top_nav_drop_text',
			'title' 	=> 'Drop menu text color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),

		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_top_nav_drop_line',
			'title' 	=> 'Drop menu line color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),


		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_top_nav_hover_drop_bg',
			'title' 	=> 'Drop menu hovered background',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_top_nav_hover_drop_text',
			'title' 	=> 'Drop menu hovered text color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_top_nav_hover_drop_line',
			'title' 	=> 'Drop menu hovered line color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),


		// search
		array(
			'type' 		=> 'flag',
			'name' 		=> 'jeg_top_nav_search',
			'title' 	=>  'Top navigation search',
		),
		array(
			'type' 		=> 'checkbox',
			'name' 		=> 'jeg_top_nav_show_search',
			'title' 	=> 'Show Search',
			'transport'	=> 'postMessage',
			'default' 	=> true
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_top_nav_search_bg_color',
			'title' 	=> 'Search background color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_top_nav_search_text_color',
			'title' 	=> 'Search text color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_top_nav_search_icon_color',
			'title' 	=> 'Search close icon color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),

		// fb
		array(
			'type' 		=> 'flag',
			'name' 		=> 'jeg_top_nav_search',
			'title' 	=>  'Social Icon',
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_top_nav_social_hover_border',
			'title' 	=> 'Social hover border color',
			'transport'	=> 'postMessage',
			'default' 	=> null
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_top_nav_social_hover_color',
			'title' 	=> 'Social hover color',
			'transport'	=> 'postMessage',
			'default' 	=> null
		),

		// two line styling
		array(
			'type' 		=> 'flag',
			'name' 		=> 'jeg_top_nav_sec',
			'title' 	=>  'Top nav Two line option Only',
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_top_sec_background',
			'title' 	=> 'Background',
			'transport'	=> 'postMessage',
			'default' 	=> null
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_top_sec_border',
			'title' 	=> 'Border Color',
			'transport'	=> 'postMessage',
			'default' 	=> null
		),
		array(
			'type' 		=> 'textarea',
			'name' 		=> 'jeg_top_sec_tagline',
			'title' 	=> 'Tagline',
			'transport'	=> 'refresh',
			'default' 	=> null
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_top_sec_tagline_color',
			'title' 	=> 'Tagline color',
			'transport'	=> 'postMessage',
			'default' 	=> null
		),

	), $wp_customize);
}