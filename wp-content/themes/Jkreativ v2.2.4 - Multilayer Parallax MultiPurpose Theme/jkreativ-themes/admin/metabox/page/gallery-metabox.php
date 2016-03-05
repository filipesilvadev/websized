<?php

/** 
 * slider metabox 
 ***/

function jkreativ_slider_gallery() 
{
	return array(
		array(
			'id'			=> 'postgallery',
			'type'			=> 'mediagallery',
			'title'			=> 'Media Builder',			
			'description'	=> 'Build Media Content ( you can use drag to change sequence )',
			'multi'			=> true,					
			'default'		=> '',
			'option'			=> array(
				'nowidth'		=> true,
				'include'		=> array('image', 'youtube', 'vimeo'),
				'videocover' 	=> true
			)
		),
	);
}

$slidermetabox = new jeg_metabox_panel(array(
	'panelid'		=> 'jkreativ_slider_gallery',
	'screen'		=> array('page'),
    'template'      => array('template/template-fsslider-media.php'),
	'pagetitle'		=> 'Jkreativ Media Metabox',
	'context'		=> 'normal',
	'priority'		=> 'high',
	'metacontent'	=> 'jkreativ_slider_gallery'
));


/** 
 * Media Gallery 
 ***/
 
function jkreativ_media_gallery() 
{
	return array(
		array(
			'id'			=> 'jkreativ_gallery',
			'type'			=> 'mediagallery',
			'title'			=> 'Media Builder',			
			'description'	=> 'Build Media Gallery Content ( you can use drag to change sequence )',
			'multi'			=> true,					
			'default'		=> '',
			'option'			=> array(
				'nowidth'		=> false,
				'include'		=> array('image', 'youtube', 'vimeo', 'soundcloud', 'html5video'),
				'videocover' 	=> true
			)
		),
	);
}

$slidermetabox = new jeg_metabox_panel(array(
	'panelid'		=> 'jkreativ_media_gallery',
	'screen'		=> array('page'),
    'template'      => array('template/template-media-gallery.php', 'template/template-media-gallery-content.php'),
	'pagetitle'		=> 'Jkreativ Media Gallery Builder',
	'context'		=> 'normal',
	'priority'		=> 'high',
	'metacontent'	=> 'jkreativ_media_gallery'
));
 
 
/** 
 * Portfolio Gallery 
*/
 
function jkreativ_portfolio_media_gallery() 
{
	return array(
		array(
			'id'			=> 'jkreativ_portfolio_gallery',
			'type'			=> 'mediagallery',
			'title'			=> 'Media Builder',			
			'description'	=> 'Build Media Gallery Content ( you can use drag to change sequence )',
			'multi'			=> true,					
			'default'		=> '',
			'option'			=> array(
				'nowidth'		=> false,
				'include'		=> array('image', 'youtube', 'vimeo', 'soundcloud', 'html5video'),
				'videocover' 	=> true
			)
		),
	);
}

$portfoliometabox = new jeg_metabox_panel(array(
	'panelid'		=> 'jkreativ_portfolio_media_gallery',
	'screen'		=> array('portfolio'), 
	'pagetitle'		=> 'Jkreativ Media Gallery Builder',
	'context'		=> 'normal',
	'priority'		=> 'high',
	'metacontent'	=> 'jkreativ_portfolio_media_gallery'
));