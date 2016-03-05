<?php

/*** Navigation Styling **/
function jeg_customize_woo_minicart($wp_customize) 
{
	new Jeg_Customizer_Framework(array(
		'name'			=> 'jeg_mini_cart',
		'title'			=> 'Woocommerce - Minicart',
		'priority' 		=> 30,
		'description'	=> 'this option will only available if you are using woocommerce'
	), array(
	
		array(
			'type' 		=> 'color',
			'name' 		=> 'mini_woo_bg',
			'title' 	=>  'Background Color',
			'transport'	=> 'postMessage',
			'default' 	=> null
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'mini_woo_text',
			'title' 	=>  'Text Color',
			'transport'	=> 'postMessage',
			'default' 	=> null
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'mini_woo_alt_text',
			'title' 	=>  'Alternate Text Color',
			'transport'	=> 'postMessage',
			'default' 	=> null
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'mini_woo_line_color',
			'title' 	=> 'Line Color',
			'transport'	=> 'postMessage',
			'default' 	=> null
		),
		
		array(
			'type' 		=> 'flag',
			'name' 		=> 'mini_woo_button',
			'title' 	=> 'Button Style',
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'mini_woo_btn_bg',
			'title' 	=> 'Button Background',
			'transport'	=> 'postMessage',
			'default' 	=> null
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'mini_woo_btn_text',
			'title' 	=> 'Button text color',
			'transport'	=> 'postMessage',
			'default' 	=> null
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'mini_woo_btn_border',
			'title' 	=> 'Button Border',
			'transport'	=> 'postMessage',
			'default' 	=> null
		),
	), $wp_customize);	
}