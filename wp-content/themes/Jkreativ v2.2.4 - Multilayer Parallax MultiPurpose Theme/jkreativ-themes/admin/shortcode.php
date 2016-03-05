<?php
/*
 * @author jegbagus
 */

function jeg_load_shortcode() {

    /** General shortcode */
    new VP_ShortcodeGenerator(array(
        'name'                  => 'generalshortcode',
        'template'              => locate_template(array('admin/shortcode/generalshortcode.php'), true, true),
        'modal_title'           =>  'Jkreativ General Shortocde',
        'button_title'          =>  'Jkreativ General Shortocde',
        'types'                 => array( 'post', 'page', 'portfolio' ),
        'included_pages'        => array( '' ),
        'main_image'            => get_template_directory_uri() . '/assets/img/jshortcode.png',
        'sprite_image'          => get_template_directory_uri() . '/assets/img/jshortcode.png',
    ));

    /** Page builder Shortcode **/
    if(vp_option('joption.enable_section_builder')) {
        new VP_ShortcodeGenerator(array(
            'name'                  => 'sectionshortcode',
            'template'              => locate_template(array('admin/shortcode/sectionshortcode.php'), true, true),
            'modal_title'           =>  'Jkreativ Section Shortcode',
            'button_title'          =>  'Jkreativ Section Shortcode',
            'types'                 => array( 'page', 'portfolio' ),
            'include_page_template' => array( 'template/template-landing-page.php' ),
            'main_image'            => get_template_directory_uri() . '/assets/img/sshortcode.png',
            'sprite_image'          => get_template_directory_uri() . '/assets/img/sshortcode.png',
        ));
    }

    /** Page builder Shortcode **/
    new VP_ShortcodeGenerator(array(
        'name'                      => 'creditshortcode',
        'template'                  => locate_template(array('admin/shortcode/creditshortcode.php'), true, true),
        'modal_title'               =>  'Jkreativ Credit Shortocde',
        'button_title'              =>  'Jkreativ Credit Shortocde',
        'types'                     => array(),
        'included_pages'            => array( 'toplevel_page_jeg_option' ),
        'main_image'                => get_template_directory_uri() . '/assets/img/cshortcode.png',
        'sprite_image'              => get_template_directory_uri() . '/assets/img/cshortcode.png',
    ));

}

add_action('after_setup_theme'	, 'jeg_load_shortcode');

function jeg_can_render_portfolio_shortcode($can, $screen)
{
    if($screen === 'portfolio')
    {
        $postid = jeg_get_post_id();
        $portfoliotype = get_post_meta($postid, 'portfolio_layout', true);
        if($portfoliotype === 'landingpage'){
            return true;
        } else {
            return false;
        }
    } else {
        return $can;
    }
}

add_filter('sectionshortcode_can_render_shortcode', 'jeg_can_render_portfolio_shortcode', null, 2);

/** hide section shortcode on page default rich div **/
function jeg_shortcode_button () {
	$screen = get_current_screen();
	if($screen->post_type === 'page') {
		wp_enqueue_style ('jeg-hideshortcode'	, 	get_template_directory_uri() . '/assets/css/hideshortcode.css');
	}
}
add_action('current_screen'	, 'jeg_shortcode_button');