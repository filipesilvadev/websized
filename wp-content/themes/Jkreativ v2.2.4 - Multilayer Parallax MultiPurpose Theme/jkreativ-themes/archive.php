<?php
/** 
 * @author Jegbagus
 */

$template = vp_option('joption.archive_template', 'masonry');

$title = '';
if (function_exists('is_tag') && is_tag()) {
	$title =  sprintf( __('Tag archive for : <b>%s</b>', 'jeg_textdomain') , single_tag_title('', false) ); 
} elseif (is_category()){
	$title =  sprintf( __('Post filled under : <b>%s</b>', 'jeg_textdomain') , single_cat_title('', false) ); 
} elseif (is_author()){
	$title =  sprintf( __('Post written by : <b>%s</b>', 'jeg_textdomain') , get_userdata(get_query_var('author'))->display_name );	
} elseif (is_archive()) {
	$title =  sprintf( __('%s - Archive', 'jeg_textdomain'),  wp_title('', false)) ;
} 


if($template === 'masonry') {
	$pageoption = array(
		'title' => $title,
	);
	locate_template(array('template/additional/masonry-layout.php'), true, true);
} else if($template === 'normal') {
	$pageoption = array(
		'usesidebar' => vp_option('joption.archieve_normal_show_sidebar'),
		'sidebarname' => vp_option('joption.archieve_normal_sidebar'),
		'title' => $title,
	);
	
	locate_template(array('template/additional/normal-layout.php'), true, true);
}
