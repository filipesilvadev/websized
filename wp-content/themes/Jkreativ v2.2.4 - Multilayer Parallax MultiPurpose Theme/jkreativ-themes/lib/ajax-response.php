<?php

/** get image **/
function jeg_get_image() 
{
	$imageid = $_REQUEST['imageid'];
	$size = $_REQUEST['size'];	
	$imageresponse = wp_get_attachment_image_src($imageid, $size);
	echo $imageresponse[0];
	exit;
}

add_action('wp_ajax_jeg_get_image'				, 'jeg_get_image');
add_action('wp_ajax_nopriv_jeg_get_image'		, 'jeg_get_image');


/** blog filter **/
function jeg_get_blog_filter() 
{
	defined( 'JEG_PAGE_ID' ) 	or define('JEG_PAGE_ID', $_REQUEST['blogid']);
	get_template_part('template/blogpost/ajax-masonry');
	exit;
}

add_action('wp_ajax_get_blog_filter'			, 'jeg_get_blog_filter');
add_action('wp_ajax_nopriv_get_blog_filter'		, 'jeg_get_blog_filter');

/** gallery page more **/
function get_gallery_pagemore() 
{
	defined( 'JEG_PAGE_ID' ) 	or define('JEG_PAGE_ID', $_REQUEST['pageid']);
	defined( 'JEG_GALLERY_PAGE' ) 	or define('JEG_GALLERY_PAGE', $_REQUEST['page']);
	get_template_part('template/media-gallery-ajax');
	exit;
}


add_action('wp_ajax_get_gallery_pagemore'			, 'get_gallery_pagemore');
add_action('wp_ajax_nopriv_get_gallery_pagemore'	, 'get_gallery_pagemore');

/** gallery page more portfolio**/
function get_gallery_pagemore_portfolio() 
{
	defined( 'JEG_PAGE_ID' ) or define('JEG_PAGE_ID', $_REQUEST['pageid']);
	defined( 'JEG_GALLERY_PAGE' ) or define('JEG_GALLERY_PAGE', $_REQUEST['page']);
	get_template_part('template/portfolio/portfolio-gallery');
	exit;
}

add_action('wp_ajax_get_gallery_pagemore_portfolio'			, 'get_gallery_pagemore_portfolio');
add_action('wp_ajax_nopriv_get_gallery_pagemore_portfolio'	, 'get_gallery_pagemore_portfolio');


/** portfolio  **/
function jeg_get_portfolio_filter() 
{
	defined( 'JEG_PAGE_ID' ) or define('JEG_PAGE_ID', $_REQUEST['portfolioid']);
	defined( 'JEG_PORTFOLIO_PAGE' ) or define('JEG_PORTFOLIO_PAGE', $_REQUEST['page']);	
	defined( 'JEG_CATEGORY' ) or define('JEG_CATEGORY', $_REQUEST['category']);	
	get_template_part('template/portfolio/portfolio-filter');
	exit;
}

add_action('wp_ajax_get_portfolio_filter'				, 'jeg_get_portfolio_filter');
add_action('wp_ajax_nopriv_get_portfolio_filter'		, 'jeg_get_portfolio_filter');


/** portfolio single **/
function jeg_get_single_portfolio_page() 
{
	defined( 'JEG_PAGE_ID' ) or define('JEG_PAGE_ID', $_REQUEST['pageid']);
	defined( 'JEG_PORTFOLIO_ID' ) or define('JEG_PORTFOLIO_ID', $_REQUEST['portfolioid']);
	defined( 'JEG_CATEGORY' ) or define('JEG_CATEGORY', $_REQUEST['category']);
	get_template_part('template/portfolio/portfolio-single');	
	exit;
}

add_action('wp_ajax_get_single_portfolio_page'				, 'jeg_get_single_portfolio_page');
add_action('wp_ajax_nopriv_get_single_portfolio_page'		, 'jeg_get_single_portfolio_page');


function jeg_extract_value($value) {
	$arr = array();
	if(!empty($value)) {
		foreach($value as $val) {
			$arr[] = $val['value'];
		}
	}
	
	return $arr;
}

function jeg_get_font_string() 
{
	$fontname = $_REQUEST['fontname'];
	$styles = jeg_extract_value(vp_get_gwf_style($fontname));	
	$weight = jeg_extract_value(vp_get_gwf_weight($fontname));	
	
	$fonturl = "https://fonts.googleapis.com/css?family=";
	$farray = array();
	
	foreach($styles as $fontstyle) {
		foreach($weight as $fontweight){
			if($fontweight == 'normal') $fontweight = 400;
			$farray[] = $fontweight . $fontstyle;
		}
	}

	if(empty($farray)) {
		$fullfonturl = $fonturl . $fontname;
	} else {
		$fullfonturl = $fonturl . $fontname . ":" . implode(',', $farray);
	}
	
	echo $fullfonturl;
	exit;
}

add_action('wp_ajax_get_font_string'				, 'jeg_get_font_string');
add_action('wp_ajax_nopriv_get_font_string'			, 'jeg_get_font_string');
