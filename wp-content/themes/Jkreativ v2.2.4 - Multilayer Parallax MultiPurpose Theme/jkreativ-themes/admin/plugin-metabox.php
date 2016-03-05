<?php

/**
 * @author jegbagus
 */


/*****
 * General Metabox (available on every page) & Music (only on page)
 * - navigation position
 * - background
 * - loader
 *****/
function jeg_general_metabox_setup()
{
    new VP_Metabox(get_template_directory() . '/admin/metabox/generalmetabox.php');
    new VP_Metabox(get_template_directory() . '/admin/metabox/musicmetabox.php');
}
add_action('after_setup_theme', 'jeg_general_metabox_setup');


/*****
 * Portfolio Metabox
 *****/

function jeg_check_output_metabox_portfolio($layoutstack){
    $postid = jeg_get_post_id();
    $portfoliolayout = get_post_meta($postid, 'portfolio_layout', true);

    if(in_array($portfoliolayout, $layoutstack)) {
        return true;
    } else {
        return false;
    }
}

function jeg_check_output_metabox_ajax(){ return jeg_check_output_metabox_portfolio(array('ajax')); }
function jeg_check_output_metabox_sidecontent(){ return jeg_check_output_metabox_portfolio(array('sidecontent')); }
function jeg_check_output_metabox_cover(){ return jeg_check_output_metabox_portfolio(array('cover')); }
function jeg_check_output_metabox_cover_sidecontent(){ return jeg_check_output_metabox_portfolio(array('cover', 'sidecontent')); }
function jeg_check_output_portfoliometa() { return jeg_check_output_metabox_portfolio(array('ajax', 'sidecontent')); }
function jeg_check_output_metabox_landing(){ return jeg_check_output_metabox_portfolio(array('landingpage','landingpagevc')); }
function jeg_check_output_metabox_landingvc(){ return jeg_check_output_metabox_portfolio(array('landingpagevc')); }
function jeg_check_output_metabox_anotherpage(){ return jeg_check_output_metabox_portfolio(array('anotherpage')); }


function jeg_portfolio_metabox_setup()
{
    new VP_Metabox(get_template_directory() . '/admin/metabox/page/switchtemplate.php');
    new VP_Metabox(get_template_directory() . '/admin/metabox/portfolio/portfoliosetting.php');

    new VP_Metabox(get_template_directory() . '/admin/metabox/portfolio/portosingleajax.php');
    add_filter('wpalchemy_filter_jkreativ_portfolio_ajax_output', 'jeg_check_output_metabox_ajax');

    new VP_Metabox(get_template_directory() . '/admin/metabox/portfolio/portosidecontent.php');
    add_filter('wpalchemy_filter_jkreativ_portfolio_sidecontent_output', 'jeg_check_output_metabox_sidecontent');

    new VP_Metabox(get_template_directory() . '/admin/metabox/portfolio/portocoversetting.php');
    add_filter('wpalchemy_filter_jkreativ_portfolio_cover_output', 'jeg_check_output_metabox_cover');

    new VP_Metabox(get_template_directory() . '/admin/metabox/portfolio/portfoliocovermeta.php');
    add_filter('wpalchemy_filter_jkreativ_portfolio_cover_meta_output', 'jeg_check_output_metabox_cover');

    new VP_Metabox(get_template_directory() . '/admin/metabox/portfolio/portfoliometa.php');
    add_filter('wpalchemy_filter_jkreativ_portfolio_meta_output', 'jeg_check_output_portfoliometa');

    new VP_Metabox(get_template_directory() . '/admin/metabox/portfolio/portfoliolandingbuilder.php');
    add_filter('wpalchemy_filter_jkreativ_portfolio_landing_output', 'jeg_check_output_metabox_landing');

    new VP_Metabox(get_template_directory() . '/admin/metabox/portfolio/portfoliolandingbuildervc.php');
    add_filter('wpalchemy_filter_jkreativ_portfolio_landing_vc_output', 'jeg_check_output_metabox_landingvc');

    new VP_Metabox(get_template_directory() . '/admin/metabox/portfolio/portfoliolink.php');
    add_filter('wpalchemy_filter_jkreativ_portfolio_link_output', 'jeg_check_output_metabox_anotherpage');
}

add_action('after_setup_theme', 'jeg_portfolio_metabox_setup');

/** portfolio templates */
function load_additional_script_for_portfolio() {
	$screen = get_current_screen();
	if($screen->post_type === 'portfolio' && is_admin()) {
		wp_enqueue_script('jquery');
		wp_enqueue_script('jeg-portfolio-metabox', get_template_directory_uri() . '/assets/js/portfoliometabox.js', null, null);

        $option = array();
        $postid = jeg_get_post_id();
        $option['portfoliolayout'] = get_post_meta($postid, 'portfolio_layout', true);
        wp_localize_script('jeg-portfolio-metabox', 'jpageoption', $option);

		wp_enqueue_style ('jeg-blog-css', get_template_directory_uri() . '/assets/css/pagemetabox.css', null, null);
	}
}

add_action('current_screen', 'load_additional_script_for_portfolio');


/**
 * landing page slider
 */
function jeg_landingslider_metabox_setup()
{
    new VP_Metabox(get_template_directory() . '/admin/metabox/slider/sliderswitcher.php');
    new VP_Metabox(get_template_directory() . '/admin/metabox/slider/splitslidermeta.php');
    new VP_Metabox(get_template_directory() . '/admin/metabox/slider/fulltextslidermeta.php');
    new VP_Metabox(get_template_directory() . '/admin/metabox/slider/parallaxslidermeta.php');
}
add_action('after_setup_theme', 'jeg_landingslider_metabox_setup');

function load_additional_script_for_slider() {
	$screen = get_current_screen();
	if($screen->post_type === 'slider' && is_admin()) {
		wp_enqueue_script('jquery');
		wp_enqueue_script('jeg-slider-metabox', get_template_directory_uri() . '/assets/js/slidermetabox.js', null, null);
	}
}

add_action('current_screen', 'load_additional_script_for_slider');



/*****
 * Blog Metabox
 *****/

function jeg_blogmetabox_setup()
{
    new VP_Metabox(get_template_directory() . '/admin/metabox/blog/template.php');
    new VP_Metabox(get_template_directory() . '/admin/metabox/blog/format.php');
    new VP_Metabox(get_template_directory() . '/admin/metabox/blog/quote.php');
    new VP_Metabox(get_template_directory() . '/admin/metabox/blog/imageslider.php');
    new VP_Metabox(get_template_directory() . '/admin/metabox/blog/vimeo.php');
    new VP_Metabox(get_template_directory() . '/admin/metabox/blog/youtube.php');
    new VP_Metabox(get_template_directory() . '/admin/metabox/blog/soundcloud.php');
    new VP_Metabox(get_template_directory() . '/admin/metabox/blog/html5video.php');
    new VP_Metabox(get_template_directory() . '/admin/metabox/blog/ads.php');
}
add_action('after_setup_theme', 'jeg_blogmetabox_setup');

function load_additional_script_for_blog() {
	$screen = get_current_screen();
	if($screen->post_type === 'post' && is_admin()) {
		wp_enqueue_script('jquery');
		wp_enqueue_script('jeg-blog-metabox', get_template_directory_uri() . '/assets/js/blogmetabox.js', null, null);
		wp_enqueue_style ('jeg-blog-css', get_template_directory_uri() . '/assets/css/blog.css', null, null);
	}
}

add_action('current_screen', 'load_additional_script_for_blog');


/*****
 * Page Metabox
 *****/

function jeg_pagemetabox_setup()
{
    new VP_Metabox(get_template_directory() . '/admin/metabox/page/landingpagebuilder.php');
    new VP_Metabox(get_template_directory() . '/admin/metabox/page/landingpagebuildervc.php');
    new VP_Metabox(get_template_directory() . '/admin/metabox/page/metasharehide.php');
    new VP_Metabox(get_template_directory() . '/admin/metabox/page/metatophide.php');
    new VP_Metabox(get_template_directory() . '/admin/metabox/page/metatopbtmhide.php');
    new VP_Metabox(get_template_directory() . '/admin/metabox/page/mediagallerycontent.php');
    new VP_Metabox(get_template_directory() . '/admin/metabox/page/mediagalleryoption.php');
    new VP_Metabox(get_template_directory() . '/admin/metabox/page/fsmediaoption.php');
    new VP_Metabox(get_template_directory() . '/admin/metabox/page/fssinglevideo.php');
    new VP_Metabox(get_template_directory() . '/admin/metabox/page/serviceslider.php');
    new VP_Metabox(get_template_directory() . '/admin/metabox/page/kenburnslider.php');
    new VP_Metabox(get_template_directory() . '/admin/metabox/page/iosslider.php');
    new VP_Metabox(get_template_directory() . '/admin/metabox/page/fullscreenslidercontent.php');
    new VP_Metabox(get_template_directory() . '/admin/metabox/page/fsmap.php');
    new VP_Metabox(get_template_directory() . '/admin/metabox/page/singleheading.php');
    new VP_Metabox(get_template_directory() . '/admin/metabox/page/blogwide.php');
    new VP_Metabox(get_template_directory() . '/admin/metabox/page/blogmasonry.php');
    new VP_Metabox(get_template_directory() . '/admin/metabox/page/pageposition.php');
    new VP_Metabox(get_template_directory() . '/admin/metabox/page/blogcontent.php');
    new VP_Metabox(get_template_directory() . '/admin/metabox/page/portfoliolistoption.php');
    new VP_Metabox(get_template_directory() . '/admin/metabox/page/switchtemplate.php');
}
add_action('after_setup_theme', 'jeg_pagemetabox_setup');


function load_additional_script_for_page() {
	$screen = get_current_screen();
	if($screen->post_type === 'page' && is_admin()) {
		wp_enqueue_script('jquery');
		wp_enqueue_script('jeg-page-metabox', get_template_directory_uri() . '/assets/js/pagemetabox.js', null, null);

        $option = array();
        $option['pagetemplate'] = jeg_get_current_page_template_name();
        wp_localize_script('jeg-page-metabox', 'jpageoption', $option);

		wp_enqueue_style ('jeg-blog-css', get_template_directory_uri() . '/assets/css/pagemetabox.css', null, null);
	}
}

add_action('current_screen', 'load_additional_script_for_page');

/**
 * Team & Pricing Metabox
 */
function jeg_team_pricing_metabox_setup()
{
    new VP_Metabox(get_template_directory() . '/admin/metabox/teammember.php');
    new VP_Metabox(get_template_directory() . '/admin/metabox/pricingmetabox.php');
}
add_action('after_setup_theme', 'jeg_team_pricing_metabox_setup');

/***
 * Gallery - Metabox
 */
function jeg_gallery_metabox_setup() {
    require_once get_template_directory() . '/admin/metabox/page/gallery-metabox.php';
}
add_action('after_setup_theme', 'jeg_gallery_metabox_setup');

/****
 * Product Metabox
 */
function jeg_product_metabox_setup()
{
    new VP_Metabox(get_template_directory() . '/admin/metabox/productmetabox.php');
}
add_action('after_setup_theme', 'jeg_product_metabox_setup');

/** global css script **/

function load_additional_style() {	
	if(is_admin()) {
		wp_enqueue_style ('jeg-global-css', get_template_directory_uri() . '/assets/css/global.css', null, null);
	}
}

add_action('current_screen', 'load_additional_style');

