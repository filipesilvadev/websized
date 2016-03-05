<?php

/*** Navigation Styling **/
function jeg_customize_mega($wp_customize) 
{
	new Jeg_Customizer_Framework(array(
		'name'			=> 'jeg_mega_menu',
		'title'			=> 'Navigation - Mega Menu',
		'priority' 		=> 26,
		'description'	=> 'If you use mega menu, you can use this customizer to change style & color of mega menu'
	), array(		
				
		array(
			'type' 		=> 'color',
			'name' 		=> 'mega_arrow_color',
			'title' 	=>  'Arrow Color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'mega_bg_color',
			'title' 	=>  'Background Color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'mega_text_color',
			'title' 	=>  'Text Color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'mega_text_hover_color',
			'title' 	=>  'Text Hover Color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'mega_heading_color',
			'title' 	=>  'Heading Color (if you are using multi column)',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'mega_border_color',
			'title' 	=>  'Bottom Border Color (if you are using single column)',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		
	), $wp_customize);	
}