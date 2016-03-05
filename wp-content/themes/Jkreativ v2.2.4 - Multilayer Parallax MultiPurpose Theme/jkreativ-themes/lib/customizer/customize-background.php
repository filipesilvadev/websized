<?php

/*** Navigation Styling **/
function jeg_customize_background($wp_customize)
{
	new Jeg_Customizer_Framework(array(
		'name'			=> 'jeg_background',
		'title'			=> 'Website Background',
		'priority' 		=> 31,
		'description'	=> 'This option will only valid if you are not overwrite background option on single post'
	), array(

		array(
			'type' 		=> 'color',
			'name' 		=> 'website_color_background',
			'title' 	=> 'Website background color',
			'transport'	=> 'postMessage',
			'default' 	=> '#FFFFFF',
		),

		array(
			'type' 		=> 'newupload',
			'name' 		=> 'website_image_background',
			'title' 	=> 'Website Image Background',
			'transport'	=> 'postMessage',
			'default' 	=> get_template_directory_uri() . '/public/img/pattern/grid_noise.png',
		),

		array(
			'type' 		=> 'select',
			'name' 		=> 'website_background_vertical_position',
			'title' 	=> 'Website image background vertical position',
			'transport'	=> 'refresh',
			'default' 	=> 'center',
			'choices'	=> array(
				'left'		=> 'Left',
				'center'	=> 'Center',
				'right'		=> 'Right',
			)
		),

		array(
			'type' 		=> 'select',
			'name' 		=> 'website_background_horizontal_position',
			'title' 	=> 'Website image background horizontal position',
			'transport'	=> 'refresh',
			'default' 	=> 'center',
			'choices'	=> array(
				'top'		=> 'Top',
				'center'	=> 'Center',
				'bottom'	=> 'Bottom',
			)
		),

		array(
			'type' 		=> 'select',
			'name' 		=> 'website_background_repeat',
			'title' 	=> 'Website image background repeat',
			'transport'	=> 'postMessage',
			'default' 	=> 'repeat',
			'choices'	=> array(
				'repeat-x'		=> 'Repeat Horizontal',
				'repeat-y'		=> 'Repeat Vertical',
				'repeat'		=> 'Repeat Image',
				'no-repeat'		=> 'No Repeat'
			)
		),

		array(
			'type' 		=> 'checkbox',
			'name' 		=> 'website_background_fullscreen',
			'title' 	=> 'Enable fullscreen background',
			'transport'	=> 'postMessage',
			'default' 	=> false
		),

	), $wp_customize);
}