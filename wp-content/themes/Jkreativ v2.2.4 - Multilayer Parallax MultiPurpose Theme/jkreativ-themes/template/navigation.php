<?php
	$navobj = jeg_get_navigation_setup();
	if($navobj['navpos'] == 'side') {
        jeg_get_template_part('template/navigation', 'side');
	} else if($navobj['navpos'] == 'top') {
        global $post;
        $template = get_post_meta($post->ID,'_wp_page_template',true);

        if($template === 'template/template-landing-page.php') {
            if(vp_metabox('jkreativ_page_landing.bottom_menu', 0) == 1) {
                // empty, do nothing
            } else {
                jeg_get_template_part('template/navigation', 'top');
            }
        } else if($template === 'template/template-landing-page-vc.php'){
            if(vp_metabox('jkreativ_page_landing_vc.bottom_menu', 0) == 1) {
                // empty, do nothing
            } else {
                jeg_get_template_part('template/navigation', 'top');
            }
        } else {
            jeg_get_template_part('template/navigation', 'top');
        }

	} else if($navobj['navpos'] == 'transparent') {
        jeg_get_template_part('template/navigation', 'top');
    }
?>