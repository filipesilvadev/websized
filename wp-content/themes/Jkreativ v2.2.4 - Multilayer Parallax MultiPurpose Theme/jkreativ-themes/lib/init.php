<?php
/**
* @author jegbagus
*/

function jeg_init_variable()
{
	/* jkreativ */
	defined( 'JEG_THEMENAME' ) or define("JEG_THEMENAME", 'Jkreativ');
	defined( 'JEG_SHORTNAME' ) or define("JEG_SHORTNAME", 'jkreativ');
	defined( 'JEG_THEME' ) or define("JEG_THEME", 'jegtheme');

    /* url */
    defined( 'JEG_SERVER_URL' ) or define( "JEG_SERVER_URL", "http://jegtheme.com");
    defined( 'JEG_PURCHASE_URL') or define( "JEG_PURCHASE_URL", "http://jegtheme.com/ads/jkreativ.html" );
    defined( 'JEG_VALIDATION_URL' ) or define( "JEG_VALIDATION_URL", "http://jegtheme.com/client/validate/license");
    defined( 'JEG_SUPPORT_FORUM_URL' ) or define( "JEG_SUPPORT_FORUM_URL", "http://support.jegtheme.com");
    defined( 'JEG_LICENSE_NAME' ) or define( "JEG_LICENSE_NAME", "jkreativ_license" );

	/* themes version */
	$themeData			= wp_get_theme();
	$themeVersion 		= trim($themeData['Version']);
	if (!$themeVersion)   $themeVersion = "1.0.0";
	define("JEG_VERSION"	, $themeVersion);

	// support woocommerce
	add_theme_support('woocommerce');

	// support feed link
	add_theme_support( 'automatic-feed-links' );

	// featured image
	add_theme_support( 'post-thumbnails' );

	// unnecesary add
	if ( ! isset( $content_width ) ) $content_width = 900;
}

jeg_init_variable();


/**
 * jeg_themes_posttype_meta
 */
function jeg_themes_posttype_meta ()
{
	// portfolio
	defined( 'JEG_PORTFOLIO_POST_TYPE' ) 	or define('JEG_PORTFOLIO_POST_TYPE', 'portfolio');
	defined( 'JEG_PORTFOLIO_CATEGORY' ) 	or define('JEG_PORTFOLIO_CATEGORY'	, 'portfolio_category');
	defined( 'JEG_PORTFOLIO_TAG' ) 			or define('JEG_PORTFOLIO_TAG', 'portfolio_tag');
}

jeg_themes_posttype_meta();

/**
 * setup page id
 */

function jeg_init_page_variable() {
	global $post;
	if($post !== null) {
		if(!is_404()) {
			defined( 'JEG_PAGE_ID' ) or define('JEG_PAGE_ID', $post->ID);
			jeg_set_post_views($post->ID);	
		}
		if(function_exists('is_woocommerce')) {
			if(is_shop()) {
				defined( 'JEG_PAGE_ID' ) or define('JEG_PAGE_ID', woocommerce_get_page_id('shop'));
				jeg_set_post_views($post->ID);
			}
		} 
	} else {
		defined( 'JEG_PAGE_ID' ) or define('JEG_PAGE_ID', 0);
	}
	 
}

add_action('get_header', 'jeg_init_page_variable');

add_filter('upload_mimes','jeg_add_custom_mime_types');
function jeg_add_custom_mime_types($mimes){
	return array_merge($mimes,array (
		'webm' => 'video/webm',
        'ico' 	=> 'image/vnd.microsoft.icon',
        'ttf'	=> 'application/octet-stream',
        'otf'	=> 'application/octet-stream',
        'woff'	=> 'application/x-font-woff',
        'svg'	=> 'image/svg+xml',
        'eot'	=> 'application/vnd.ms-fontobject',
        'ogg'   => 'audio/ogg',
        'ogv'   => 'video/ogg'
	));
}

add_filter('widget_text', 'do_shortcode');

/**
 * Load Languages
 */
function jeg_tb_load_textdomain()
{
    load_theme_textdomain('jeg_textdomain', get_template_directory() . '/lang/');
}
add_action('after_setup_theme', 'jeg_tb_load_textdomain');


/** rewrite on themes activation */
function jeg_rewrite_rules_on_theme_activation() {
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'jeg_rewrite_rules_on_theme_activation' );

