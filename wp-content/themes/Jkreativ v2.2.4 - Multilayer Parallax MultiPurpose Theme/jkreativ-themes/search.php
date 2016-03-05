<?php
/** 
 * @author Jegbagus
 */

$template = vp_option('joption.search_template', 'masonry');
$title = sprintf( __('Search for : <b>%s</b>', 'jeg_textdomain') , get_search_query() ); 

if($template === 'masonry') {
	$pageoption = array(
		'title' => $title,
	);
	get_template_part('template/additional/masonry-layout');	
} else if($template === 'normal') {
	$pageoption = array(
		'usesidebar' => vp_option('joption.search_normal_show_sidebar'),
		'sidebarname' => vp_option('joption.search_normal_sidebar'),
		'title' => $title,
	);	
	get_template_part('template/additional/normal-layout');
}
