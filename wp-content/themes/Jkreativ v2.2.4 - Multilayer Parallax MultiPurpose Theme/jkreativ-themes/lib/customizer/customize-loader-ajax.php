<?php

/*** Navigation Styling **/
function jeg_customize_loader_ajax($wp_customize) 
{
	new Jeg_Customizer_Framework(array(
		'name'			=> 'jeg_ajax_loader',
		'title'			=> 'Portfolio / Gallery Loading Image',
		'priority' 		=> 21,
		'description'	=> 'Change your ajax loading image'
	), array(
		
		array(
			'type' 		=> 'newupload',
			'name' 		=> 'ajax_loading_big',
			'title' 	=> 'Circle big ajax loading image  (80x80px)',
			'transport' => 'postMessage',
			'default' 	=> get_template_directory_uri() . '/public/img/loading.gif'
		),
		
		array(
			'type' 		=> 'newupload',
			'name' 		=> 'ajax_loading_small',
			'title' 	=> 'Circle small ajax loading image  (32x32px)',
			'transport' => 'postMessage',
			'default' 	=> get_template_directory_uri() . '/public/img/loader.gif'
		),
		
		array(
			'type' 		=> 'newupload',
			'name' 		=> 'ajax_loading_horizontal',
			'title' 	=> 'Horizontal ajax loading image  (100x15px)',
			'transport' => 'postMessage',
			'default' 	=> get_template_directory_uri() . '/public/img/horizontal-loader.gif'
		),
				
	), $wp_customize);	
}