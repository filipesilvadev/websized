<?php

/**
* @author jegbagus
*/

function jeg_is_login_page()
{
    return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
}

function is_mega_menu_installed () {
	if(defined('MMPM_PLUGIN_VERSION')) {
		return true;
	}
	return false;
}

function jeg_music_bg_enabled () {
	if(vp_metabox('jkreativ_music_player.enable_music') && !wp_is_mobile()) {
		return true;
	} else {
		return false;
	}
}

function jeg_get_template_multisite_url() {
    return apply_filters('jeg_template_multisite_url', get_template_directory_uri());
}

function jeg_register_script()
{
    $templateurl = jeg_get_template_multisite_url();

    wp_register_script('jkreativ_maps'				, 'http://maps.google.com/maps/api/js?sensor=false', null, null, true);
	wp_register_script('jkreativ_sharrre'			, $templateurl . '/public/js/external/jquery.sharrre.min.js', null, JEG_VERSION, true);
	wp_register_script('jkreativ_plugin'			, $templateurl . '/public/js/external/essencialplugin.js', null, JEG_VERSION, true);
	wp_register_script('jkreativ_slitslider'		, $templateurl . '/public/js/external/jquery.slitslider.js', null, JEG_VERSION, true);
	wp_register_script('jkreativ_klass'				, $templateurl . '/public/js/external/klass.min.js', null, JEG_VERSION, true);
	wp_register_script('jkreativ_photoswipe'		, $templateurl . '/public/js/external/code.photoswipe.jquery-3.0.5.1.min.js', array('jkreativ_klass'), JEG_VERSION, true);
	wp_register_script('jkreativ_magnificpopup'		, $templateurl . '/public/js/external/jquery.magnific-popup.min.js', null, JEG_VERSION, true);
	wp_register_script('jkreativ_infobubble'		, $templateurl . '/public/js/external/infobubble.js', null, JEG_VERSION, true);
	wp_register_script('jkreativ_bootstrap'			, $templateurl . '/public/js/external/bootstrap.js', null, JEG_VERSION, true);
	wp_register_script('jkreativ_fotorama'			, $templateurl . '/public/js/external/fotorama.js', null, JEG_VERSION, true);
	wp_register_script('jkreativ_waypoint'			, $templateurl . '/public/js/external/waypoints.js', null, JEG_VERSION, true);
	wp_register_script('jkreativ_isotope'			, $templateurl . '/public/js/external/jquery.isotope.min.js', null, JEG_VERSION, true);
	wp_register_script('jkreativ_iosslider'			, $templateurl . '/public/js/external/jquery.iosslider.min.js', null, JEG_VERSION, true);
	wp_register_script('jkreativ_typer'				, $templateurl . '/public/js/external/jquery.typer.js', null, JEG_VERSION, true);
	wp_register_script('jkreativ_odometer'			, $templateurl . '/public/js/external/odometer.min.js', null, JEG_VERSION, true);
	wp_register_script('jkreativ_nprogress'			, $templateurl . '/public/js/external/nprogress.js', null, JEG_VERSION, true);
	wp_register_script('jkreativ_owlslider'			, $templateurl . '/public/js/external/owl.carousel.min.js', null, JEG_VERSION, true);
	wp_register_script('jkreativ_kenburn'			, $templateurl . '/public/js/external/kenburns.js', null, JEG_VERSION, true);
	wp_register_script('jkreativ_swipebox'			, $templateurl . '/public/js/external/jquery.swipebox.js', null, JEG_VERSION, true);
    wp_register_script('jkreativ_tubular'			, $templateurl . '/public/js/external/jquery.tubular.1.0.js', null, JEG_VERSION, true);
    wp_register_script('jkreativ_smoothscroll'		, $templateurl . '/public/js/external/smoothscroll.js', null, JEG_VERSION, true);
    wp_register_script('jkreativ_mediaelement'		, $templateurl . '/public/mediaelementjs/mediaelement-and-player.min.js', null, JEG_VERSION, true);

    // check if development mode enabled
    $folder = WP_DEBUG ? 'internal' : 'internalmin';
    
    wp_register_script('jkreativ_main'			, $templateurl . '/public/js/' . $folder . '/main.js', null, JEG_VERSION, true);
    wp_register_script('jkreativ_common'		, $templateurl . '/public/js/' . $folder . '/jquery.jcommon.js', null, JEG_VERSION, true);
    wp_register_script('jkreativ_kenburn'		, $templateurl . '/public/js/' . $folder . '/kenburns.js', null, JEG_VERSION, true);
    wp_register_script('jkreativ_pageload'		, $templateurl . '/public/js/' . $folder . '/jquery.jpageload.js', null, JEG_VERSION, true);
    wp_register_script('jkreativ_tooltip'		, $templateurl . '/public/js/' . $folder . '/jquery.jtooltip.js', null, JEG_VERSION, true);
    wp_register_script('jkreativ_360'			, $templateurl . '/public/js/' . $folder . '/jquery.jresponsive360.js', null, JEG_VERSION, true);
    wp_register_script('jkreativ_npslider'		, $templateurl . '/public/js/' . $folder . '/jquery.jnpslider.js', null, JEG_VERSION, true);
    wp_register_script('jkreativ_jmusic'		, $templateurl . '/public/js/' . $folder . '/jquery.jmusic.js', null, JEG_VERSION, true);

    wp_register_script('jkreativ_product'		, $templateurl . '/public/js/' . $folder . '/jquery.jproduct.js', array(
        'jkreativ_isotope', 'jkreativ_photoswipe'
    ), JEG_VERSION, true);

    wp_register_script('jkreativ_psinglepage'	, $templateurl . '/public/js/' . $folder . '/jquery.jportfoliosinglepage.js', array(
        'jkreativ_isotope', 'jkreativ_iosslider'
    ), JEG_VERSION, true);

    wp_register_script('jkreativ_psingle'		, $templateurl . '/public/js/' . $folder . '/jquery.jportfoliosingle.js', array(
        'jkreativ_isotope', 'jkreativ_iosslider'
    ), JEG_VERSION, true);

    wp_register_script('jkreativ_landing'		, $templateurl . '/public/js/' . $folder . '/jquery.jlanding.js', array(
        'jkreativ_tooltip', 'jkreativ_slitslider', 'jkreativ_infobubble',
        'jkreativ_owlslider', 'jkreativ_waypoint', 'jkreativ_isotope',
        'jkreativ_npslider', 'jkreativ_magnificpopup', 'jkreativ_typer', 'jkreativ_odometer',
        'jkreativ_tubular'
    ), JEG_VERSION, true);

    wp_register_script('jkreativ_portfolio'		, $templateurl . '/public/js/' . $folder . '/jquery.jportfolio.js', array(
        'jkreativ_iosslider', 'jkreativ_isotope'
    ), JEG_VERSION, true);

    wp_register_script('jkreativ_imggallery'	, $templateurl . '/public/js/' . $folder . '/jquery.jimggallery.js', array(
        'jkreativ_fotorama', 'jkreativ_isotope', 'jkreativ_photoswipe', 'jkreativ_magnificpopup', 'jkreativ_swipebox'
    ), JEG_VERSION, true);

    wp_register_script('jkreativ_fullscreen'	, $templateurl . '/public/js/' . $folder . '/jquery.jfullscreenios.js', array(
        'jkreativ_iosslider'
    ), JEG_VERSION, true);

    wp_register_script('jkreativ_fsmap'			, $templateurl . '/public/js/' . $folder . '/jquery.jfsmap.js', array(
        'jkreativ_maps', 'jkreativ_infobubble'
    ), JEG_VERSION, true);

    wp_register_script('jkreativ_masonryblog'	, $templateurl . '/public/js/' . $folder . '/jquery.jmasonryblog.js', array(
        'jkreativ_fotorama', 'jkreativ_isotope'
    ), JEG_VERSION, true);

    wp_register_script('jkreativ_normalblog'	, $templateurl . '/public/js/' . $folder . '/jquery.jnormalblog.js', array(
        'jkreativ_sharrre', 'jkreativ_fotorama',  'jkreativ_bootstrap',
        'jkreativ_photoswipe' , 'jkreativ_360'
    ), JEG_VERSION, true);
}

function jeg_get_js_option()
{
	$ismobile = wp_is_mobile();

	// populate option array
	$option = array();
    $option['currenturl'] = get_permalink(JEG_PAGE_ID);
	$option['adminurl'] = admin_url("admin-ajax.php");
	$option['themesurl'] = get_template_directory_uri();
	$option['ismobile'] = $ismobile;
	$option['rightclick'] = vp_option('joption.disable_rightclick');
	$option['rightclickmsg'] = vp_option('joption.msg_rightclick');
	$option['enablemegamenu'] = 0;
    $option['menucollapsed'] = 300;
    $option['smallmenuheight'] = 50;

    $option['loaderbackground'] = get_theme_mod('loader_background', '#FFF');
    $option['loaderlinecolor'] = get_theme_mod('linear_color', '#000');

	if(jeg_music_bg_enabled()) {
        $option['musicbg'] = true;
	}

	return $option;
}

function jeg_init_script ()
{
	jeg_register_script();

	if(!jeg_is_login_page()) {
		wp_enqueue_script('jquery');
		wp_enqueue_script('jkreativ_common');
		wp_enqueue_script('jkreativ_main');
        wp_enqueue_script('jkreativ_mediaelement');

		wp_enqueue_script('jkreativ_plugin');
		wp_localize_script('jkreativ_plugin', 'joption', jeg_get_js_option());

        // smooth scroll
        if(!vp_option('joption.disable_smoothscroll')) {
            wp_enqueue_script('jkreativ_smoothscroll');
        }

		if(jeg_is_using_loading()) {
			wp_enqueue_script('jkreativ_pageload');
			wp_enqueue_script('jkreativ_nprogress');
		}
		if ( is_singular() ) {
			wp_enqueue_script( 'comment-reply' );
		}

		if(jeg_music_bg_enabled()) {
			wp_enqueue_script( 'jkreativ_jmusic' );
		}

		jeg_load_page_spesific_script();
	}
}

/**
 * reduce bandwidth with only load necessary script
 */
function jeg_load_page_spesific_script()
{
	global $post;

	if(is_home()) {
		// default blog listing (index.php)
		wp_enqueue_script('jkreativ_normalblog');
	} else if(is_page()) {
		if(function_exists('is_woocommerce') && is_account_page()) {
			wp_enqueue_script('jkreativ_normalblog');
		} else {
			$template = get_post_meta($post->ID,'_wp_page_template',true);
			switch ($template) {
				case 'default':
				case 'template-single-wide.php' :
				case 'template/template-page-cover.php' :
				case 'template/template-page-normal.php' :
				case 'template/template-page-wide.php' :
				case 'template/template-blog-wide.php' :
				case 'template/template-blog.php' :
				case 'template/template-blog-clean.php' :
					wp_enqueue_script('jkreativ_normalblog');
					break;
				case 'template/template-blog-masonry.php' :
					wp_enqueue_script('jkreativ_masonryblog');
					break;
				case 'template/template-contact-full-map.php' :
					wp_enqueue_script('jkreativ_fsmap');
					wp_enqueue_script('jkreativ_normalblog');
					break;
				case 'template/template-fsslider-iosslider.php' :
					wp_enqueue_script('jkreativ_fullscreen');
					break;
				case 'template/template-fsslider-kenburn.php' :
					wp_enqueue_script('jkreativ_kenburn');
					break;
				case 'template/template-fsslider-serviceslider.php' :
					wp_enqueue_script('jkreativ_slitslider');
					break;
				case 'template/template-fsslider-media.php' :
					wp_enqueue_script('jkreativ_fotorama');
					break;
				case 'template/template-media-gallery.php' :
					wp_enqueue_script('jkreativ_imggallery');
					break;
			 	case 'template/template-media-gallery-content.php' :
					wp_enqueue_script('jkreativ_imggallery');
					wp_enqueue_script('jkreativ_normalblog');
					break;
				case 'template/template-portfolio.php' :
					wp_enqueue_script('jkreativ_portfolio');
					wp_enqueue_script('jkreativ_normalblog');
					break;
				case 'template/template-landing-page.php' :
                case 'template/template-landing-page-vc.php' :
                    wp_enqueue_script('jkreativ_normalblog');
                    wp_enqueue_script('jkreativ_landing');
                    break;
				case 'template/template-nowrap.php' :
					wp_enqueue_script('jkreativ_normalblog');
					break;
				default:
					break;
			}
		}
	} else if(is_single()) {
		if($post->post_type === 'portfolio') {
			$layout = get_post_meta($post->ID, 'portfolio_layout', true);
			switch ($layout) {
				case 'ajax':
					wp_enqueue_script('jkreativ_psingle');
					wp_enqueue_script('jkreativ_normalblog');
					break;
				case 'cover':
					wp_enqueue_script('jkreativ_psinglepage');
					wp_enqueue_script('jkreativ_normalblog');
					break;
				case 'sidecontent':
					wp_enqueue_script('jkreativ_imggallery');
					wp_enqueue_script('jkreativ_normalblog');
					break;
                case 'landingpagevc':
				case 'landingpage':
					wp_enqueue_script('jkreativ_normalblog');
					wp_enqueue_script('jkreativ_landing');
					break;
				default:
					break;
			}
		}
		else if($post->post_type === 'post')
		{
			wp_enqueue_script('jkreativ_normalblog');
		}
		else if($post->post_type === 'product')
		{
			wp_enqueue_script('jkreativ_imggallery');
			wp_enqueue_script('jkreativ_normalblog');
		}
		else {
			wp_enqueue_script('jkreativ_normalblog');
		}
	} else if(is_archive()) {
		global $wp_query;
		if(function_exists('is_shop') && is_shop()) {
			wp_enqueue_script('jkreativ_product');
		} else if(isset($wp_query->query_vars['taxonomy']) && ( $wp_query->query_vars['taxonomy'] === 'product_cat' || $wp_query->query_vars['taxonomy'] === 'product_tag')) {
			wp_enqueue_script('jkreativ_product');
		} else {
			$template = vp_option('joption.archive_template');
			if($template === 'masonry') {
				wp_enqueue_script('jkreativ_masonryblog');
			} else if($template === 'normal') {
				wp_enqueue_script('jkreativ_normalblog');
			}
		}
	} else if(is_search()) {
		$template = vp_option('joption.search_template', 'masonry');
		if($template === 'masonry') {
			wp_enqueue_script('jkreativ_masonryblog');
		} else if($template === 'normal') {
			wp_enqueue_script('jkreativ_normalblog');
		}
	}
}

function jeg_init_style()
{
	if(!jeg_is_login_page()) {

        $templateurl = jeg_get_template_multisite_url();

        wp_enqueue_style ('jeg-fontawesome'     ,   $templateurl . '/public/fontawesome/font-awesome.min.css', null, JEG_VERSION);
        wp_enqueue_style ('jeg-jkreativ-icon'	, 	$templateurl . '/public/jkreativ-icon/jkreativ-icon.min.css', null, JEG_VERSION);
		wp_enqueue_style ('jeg-normalize'		, 	get_stylesheet_uri() , null, JEG_VERSION);
		wp_enqueue_style ('jeg-plugin'			, 	$templateurl . '/public/css/plugin.css', null, JEG_VERSION);
		wp_enqueue_style ('jeg-maincss'			, 	$templateurl . '/public/css/main.css', null, JEG_VERSION);
        wp_enqueue_style ('jeg-boxed'			, 	$templateurl . '/public/css/boxed.css', null, JEG_VERSION);
        wp_enqueue_style ('jeg-transparent'		, 	$templateurl . '/public/css/transparent.css', null, JEG_VERSION);

		if(is_mega_menu_installed()) {
			wp_enqueue_style ('jeg-megamenu'	, 	$templateurl . '/public/css/jmegamenu.css', null, JEG_VERSION);
		}

        wp_enqueue_style ('jeg-mediaelement'	, 	$templateurl . '/public/mediaelementjs/mediaelementplayer.min.css', null, JEG_VERSION);
		wp_enqueue_style ('jeg-responsive'		, 	$templateurl . '/public/css/responsive.css', null, JEG_VERSION);

		// style schema
		$style = get_theme_mod('switch_style');
		switch ($style) {
			case 'normal' :
				// do nothing
				break;
			case 'hotel' :
				wp_enqueue_style ('switch_style' , $templateurl . '/public/css/clean-hotel.css', null, JEG_VERSION);
				break;
			case 'flat':
				wp_enqueue_style ('switch_style' , $templateurl . '/public/css/flat.css', null, JEG_VERSION);
				break;
			case 'dark':
				wp_enqueue_style ('switch_style' , $templateurl . '/public/css/dark.css', null, JEG_VERSION);
				break;
			default:
                wp_enqueue_style ('switch_style' , $templateurl . '/public/css/normal.css', null, JEG_VERSION);
				break;
		}

        $additionalcss = jeg_additional_style();
        wp_add_inline_style( 'switch_style',  $additionalcss);
	}
}


function jeg_build_font($fontarray) {
	$fonturl = "https://fonts.googleapis.com/css?family=";

	foreach($fontarray as $idx => $font)
	{
		$fontname = str_replace(' ', '+', $font['fontname']);
		$farray = array();

		if(!empty($font['fontstyle'])) {
			foreach($font['fontstyle'] as $fontstyle) {
				// font normal
				if($fontstyle == 'normal') $fontstyle = '';

				if(!empty($font['fontweight'])) {
					foreach($font['fontweight'] as $fontweight) {
						// font weight
						if($fontweight == 'normal') $fontweight = 400;
						$farray[] = $fontweight . $fontstyle;
					}
				}

			}
		}

		if(empty($farray)) {
			$fullfonturl = $fonturl . $fontname;
		} else {
			$fullfonturl = $fonturl . $fontname . ":" . implode(',', $farray);
		}

		wp_enqueue_style ('jeg_font_' . $idx, $fullfonturl , null, null);
	}
}

function jeg_check_use_font_uploader($option) {
    $fontname = vp_option('joption.' . $option . '_fontname');
    if( !empty($fontname) ) {
        return true;
    }
    return false;
}

function jeg_font_setup () {
	$fontarray = array();

	// style schema
	$style = get_theme_mod('switch_style');
	switch ($style) {
		case 'flat':
			// flat
            $fontarray[0] = array(
                'fontname' => 'Open Sans',
                'fontstyle' => array('normal'),
                'fontweight' => array( '300', '400', '700')
            );
			$fontarray[1] = array(
				'fontname' => 'Raleway',
				'fontstyle' => array('normal', 'italic'),
				'fontweight' => array('300', '400', '700')
			);
			break;
		case 'dark':
			// dark
			break;
		case 'hotel' :
		case 'normal' :
		default:
            $fontarray[0] = array(
                'fontname' => 'Open Sans',
                'fontstyle' => array('normal'),
                'fontweight' => array( '300', '400', '700')
            );
			$fontarray[1] = array(
				'fontname' => 'Lato',
				'fontstyle' => array('normal'),
				'fontweight' => array( '400', '700')
			);
			$fontarray[2] = array(
				'fontname' => 'Playfair Display',
				'fontstyle' => array('normal, italic'),
				'fontweight' => array('400')
			);
			break;
	}

    if(!jeg_check_use_font_uploader('additional_font_1')){
        $firstfont = get_theme_mod('first_font');
        if(!empty($firstfont)) {
            $fontarray[0] = array(
                'fontname' => $firstfont,
                'fontstyle' => jeg_extract_value(vp_get_gwf_style($firstfont)),
                'fontweight' => jeg_extract_value(vp_get_gwf_weight($firstfont))
            );
        }
    }

    if(!jeg_check_use_font_uploader('additional_font_2')) {
        $secondfont = get_theme_mod('second_font');
        if (!empty($secondfont)) {
            $fontarray[1] = array(
                'fontname' => $secondfont,
                'fontstyle' => jeg_extract_value(vp_get_gwf_style($secondfont)),
                'fontweight' => jeg_extract_value(vp_get_gwf_weight($secondfont))
            );
        }
    }

    if(!jeg_check_use_font_uploader('additional_font_3')) {
        $thirdfont = get_theme_mod('third_font');
        if (!empty($thirdfont)) {
            $fontarray[2] = array(
                'fontname' => $thirdfont,
                'fontstyle' => jeg_extract_value(vp_get_gwf_style($thirdfont)),
                'fontweight' => jeg_extract_value(vp_get_gwf_weight($thirdfont))
            );
        }
    }

	jeg_build_font($fontarray);
}

add_action('wp_enqueue_scripts', 'jeg_init_style');
add_action('wp_enqueue_scripts', 'jeg_font_setup');
add_action('wp_enqueue_scripts', 'jeg_init_script');

/*** additional script ****/


function jeg_get_body_background() {
	$bgobj = array();
	$bgobj['color'] 		= get_theme_mod('website_color_background', '#ffffff');
	$bgobj['imgbg'] 		= get_theme_mod('website_image_background', get_template_directory_uri() . '/public/img/pattern/grid_noise.png');

	if(ctype_digit($bgobj['imgbg']) || is_int($bgobj['imgbg'])) {
		$bgobj['imgbg'] = wp_get_attachment_image_src($bgobj['imgbg'], "full");
		$bgobj['imgbg'] = $bgobj['imgbg'][0];
	}

	$bgobj['bgvertical'] 	= get_theme_mod('website_background_vertical_position', 'center');
	$bgobj['bghorizontal'] 	= get_theme_mod('website_background_horizontal_position', 'center');
	$bgobj['bgrepeat'] 		= get_theme_mod('website_background_repeat', 'repeat');
	$bgobj['bgfullscreen'] 	= get_theme_mod('website_background_fullscreen', false);

	// alter page id
	global $post;
	$pageid = ($post !== null) ? jeg_alter_woo_page_id(get_the_ID()) : null;

	if(vp_metabox('jkreativ_general.override_background', null, $pageid)) {
		$bgobj = array();
		$bgobj['color'] 		= vp_metabox('jkreativ_general.override_background_group.0.color_background', null, $pageid);
		$bgobj['imgbg'] 		= jeg_get_image_attachment(vp_metabox('jkreativ_general.override_background_group.0.image_background', null, $pageid));
		$bgobj['bgvertical'] 	= vp_metabox('jkreativ_general.override_background_group.0.background_vertical_position', null, $pageid);
		$bgobj['bghorizontal'] 	= vp_metabox('jkreativ_general.override_background_group.0.background_horizontal_position', null, $pageid);
		$bgobj['bgrepeat'] 		= vp_metabox('jkreativ_general.override_background_group.0.background_repeat', null, $pageid);
		$bgobj['bgfullscreen'] 	= vp_metabox('jkreativ_general.override_background_group.0.background_fullscreen', null, $pageid);
	}

	return $bgobj;
}

function jeg_generate_body_background() {
	$bgobj = jeg_get_body_background();

	$css = "body { ";
	if(!empty($bgobj['color'])) $css .= "\n\tbackground-color: {$bgobj['color']};";
	if(!empty($bgobj['imgbg'])) {
		$css .= "\n\tbackground-image: url('{$bgobj['imgbg']}');";
		$css .= "\n\tbackground-position: {$bgobj['bgvertical']} {$bgobj['bghorizontal']};";
		$css .= "\n\tbackground-repeat: {$bgobj['bgrepeat']};";
		if($bgobj['bgfullscreen']) {
			$css .= "\n\tbackground-attachment: fixed;";
			$css .= "\n\tbackground-size: cover;";
		}
	}
	$css .= "\n}";
	return $css;
}

function jeg_additional_style() {
	$additionalcss = '';
	$additionalcss .= jeg_generate_body_background();
    ob_start();
	get_template_part('template/additionalcss');
	echo $additionalcss;
    return ob_get_clean();
}

/** admin style ***/
function jeg_get_admin_js_option() {
	$option = array();
	$option['adminurl'] = admin_url("admin-ajax.php");
	$option['imageurl'] = 'jeg_get_image';

	return $option;
}

function jeg_init_load_script() {
	wp_localize_script('jquery', 'jkreativoption', jeg_get_admin_js_option());
}

function jeg_admin_theme_style() {
    wp_enqueue_style ('jeg-admin-style', get_template_directory_uri() . '/public/css/admin-style.css', null, JEG_VERSION);

}

add_action('admin_enqueue_scripts', 'jeg_admin_theme_style');
add_action('wp_enqueue_scripts', 'jeg_init_load_script');

/** additional javascript **/
function jeg_additional_script() {
	$script = "<script>\n" . vp_option('joption.jseditor') . "\n</script>\n";
	echo $script;
}

add_action('wp_footer', 'jeg_additional_script');


/** favico header **/
function jeg_favico_header() {
    $favico = vp_option('joption.website_favico');
    if($favico) {
        echo '<link rel="shortcut icon" type="image/x-icon" href="' . $favico . '" />';
    }
}

add_action('wp_enqueue_scripts', 'jeg_favico_header');
