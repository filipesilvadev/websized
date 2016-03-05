<?php

/*** Navigation Styling **/
function jeg_customize_general($wp_customize) 
{
	new Jeg_Customizer_Framework(array(
		'name'			=> 'jeg_general_setup',
		'title'			=> 'General color setup',
		'priority' 		=> 20,
		'description'	=> 'General themes color setup'
	), array(
		
		array(
			'type' 		=> 'color',
			'name' 		=> 'general_color',
			'title' 	=> 'General Text Color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'general_heading_color',
			'title' 	=> 'Heading Color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'general_link_color',
			'title' 	=> 'Link Color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'general_hover_link_color',
			'title' 	=> 'Hover Link Color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		
	), $wp_customize);	
}