<?php
/**
 * Single portfolio template
 *
 * @author Jegbagus
 */

global $post;

$layout = get_post_meta($post->ID, 'portfolio_layout', true);
switch ($layout) {
	case 'ajax':
		get_template_part('template/portfolio/template-portfolio-ajax');
		break;
	case 'cover':
		get_template_part('template/portfolio/template-portfolio-cover');
		break;
	case 'sidecontent':
		get_template_part('template/portfolio/template-portfolio-side');
		break;
	case 'landingpage':
		get_template_part('template/portfolio/template-portfolio-landing');
		break;
    case 'landingpagevc':
        get_template_part('template/portfolio/template-portfolio-landing-vc');
        break;
	case 'anotherpage':
		$linkpage = vp_metabox('jkreativ_portfolio_link.portfolio_link', null);
		header("Location: {$linkpage}");
		exit();
		break;
	default:
		break;
}