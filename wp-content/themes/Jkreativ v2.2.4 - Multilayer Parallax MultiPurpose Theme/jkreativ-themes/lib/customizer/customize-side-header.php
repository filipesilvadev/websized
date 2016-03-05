<?php

/*** Navigation Styling **/
function jeg_customize_side_header($wp_customize) 
{
	new Jeg_Customizer_Framework(array(
		'name'			=> 'jeg_side_header',
		'title'			=> 'Navigation - Side (Header Menu)',
		'priority' 		=> 24,
		'description'	=> 'Live preview will only work if you not overwrite option on single page'
	), array(
		
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_side_header_bg_color',
			'title' 	=>  'Header menu background',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_side_header_border_color',
			'title' 	=>  'Header menu bottom border',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		
		array(
			'type' 		=> 'flag',
			'name' 		=> 'jeg_side_header_search_flag',
			'title' 	=>  'Header menu search',
		),
		array(
			'type' 		=> 'checkbox',
			'name' 		=> 'jeg_side_header_show_search',
			'title' 	=> 'Show Search',
			'transport'	=> 'postMessage',
			'default' 	=> true
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_side_header_search_bg_color',
			'title' 	=> 'Search background color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_side_header_text_color',
			'title' 	=> 'Search text color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_side_header_search_icon_color',
			'title' 	=> 'Search close icon color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		
		array(
			'type' 		=> 'flag',
			'name' 		=> 'jeg_side_header_menu_flag',
			'title' 	=>  'Header menu - Menu',
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_side_header_menu_color',
			'title' 	=> 'Menu Color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_side_header_menu_color_bg_active',
			'title' 	=> 'Menu Active Background Color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_side_header_menu_color_text_active',
			'title' 	=> 'Menu Active Text Color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		
		
		array(
			'type' 		=> 'flag',
			'name' 		=> 'jeg_side_header_menu_filter_flag',
			'title' 	=>  'Header menu - Menu (Filter)',
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_side_header_menu_drop_bg',
			'title' 	=> 'Menu drop background color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_side_header_menu_drop_text',
			'title' 	=> 'Menu drop text color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_side_header_menu_drop_text_hovered',
			'title' 	=> 'Menu drop text hovered color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		
		array(
			'type' 		=> 'flag',
			'name' 		=> 'jeg_side_header_menu_account_flag',
			'title' 	=>  'Header menu - Menu (Account)',
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_side_header_menu_drop_acc_text',
			'title' 	=> 'Account Menu drop text color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_side_header_menu_drop_acc_bg',
			'title' 	=> 'Account menu drop background',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_side_header_menu_drop_acc_border',
			'title' 	=> 'Account menu drop border',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_side_header_menu_drop_acc_text_hover',
			'title' 	=> 'Account Menu drop hovered text color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_side_header_menu_drop_acc_bg_hover',
			'title' 	=> 'Account menu drop hovered background',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_side_header_menu_drop_acc_border_hover',
			'title' 	=> 'Account menu drop hovered border',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		
	), $wp_customize);	
}