<?php

VP_Security::instance()->whitelist_function('vp_copy_content');

function vp_copy_content($value, $value2)
{
	$args = func_get_args();
	return implode('', $args);
}

VP_Security::instance()->whitelist_function('vp_simple_shortcode');

function vp_simple_shortcode($name = "", $url = "", $image = "")
{
	if(is_null($name))  $name = '';
	if(is_null($url))   $url = '';
	if(is_null($image)) $image = '';
	$result = "[shortcode name='$name' url='$url' image='$image']";
	return $result;
}

VP_Security::instance()->whitelist_function('vp_bind_bigcontinents');

function vp_bind_bigcontinents()
{
	$bigcontinents = array(
		'Eurafrasia',
		'America',
		'Oceania',
	);

	$result = array();

	foreach ($bigcontinents as $data)
	{
		$result[] = array('value' => $data, 'label' => $data, 'img' => 'http://placehold.it/100x100');
	}

	return $result;
}

VP_Security::instance()->whitelist_function('vp_bind_continents');

function vp_bind_continents($param = '')
{
	$continents = array(
		'Eurafrasia' => array(
			'Africa',
			'Asia',
			'Europe'
		),
		'America' => array(
			'North America',
			'Central America and the Antilles',
			'South America'
		),
		'Oceania' => array(
			'Australasia',
			'Melanesia',
			'Micronesia',
			'Polynesia',
		),
	);

	$result = array();
	$datas  = array();

	if(is_array($param))
		$param = reset($param);

	if(array_key_exists($param, $continents))
		$datas = $continents[$param];

	foreach ($datas as $data)
	{
		$result[] = array('value' => $data, 'label' => $data, 'img' => 'http://placehold.it/100x100');
	}

	return $result;
}

VP_Security::instance()->whitelist_function('vp_bind_countries');

function vp_bind_countries($param = '')
{
	$countries = array(
		'Africa' => array(
			'Algeria',
			'Nigeria',
			'Egypt',
		),
		'Asia' => array(
			'Indonesia',
			'Malaysia',
			'China',
			'Japan',
		),
		'Europe' => array(
			'France',
			'Germany',
			'Italy',
			'Netherlands',
		),
		'North America' => array(
			'United States',
			'Mexico',
			'Canada',
		),
		'Central America and the Antilles' => array(
			'Cuba',
			'Guatemala',
			'Haiti',
		),
		'South America' => array(
			'Argentina',
			'Brazil',
			'Paraguay',
		),
		'Australasia' => array(
			'Australia',
			'New Zealand',
			'Christmas Island',
		),
		'Melanesia' => array(
			'Fiji',
			'Papua New Guinea',
			'Vanuatu',
		),
		'Micronesia' => array(
			'Guam',
			'Nauru',
			'Palau'
		),
		'Polynesia' => array(
			'American Samoa',
			'Samoa',
			'Tokelau',
		),
	);
	$result = array();
	$datas  = array();

	if(is_null($param))
		$param = '';

	if(is_array($param) and !empty($param))
		$param = reset($param);

	if(empty($param))
		$param = '';

	if(array_key_exists($param, $countries))
		$datas = $countries[$param];

	foreach ($datas as $data)
	{
		$result[] = array('value' => $data, 'label' => $data, 'img' => 'http://placehold.it/100x100');
	}

	return $result;
}

VP_Security::instance()->whitelist_function('vp_dep_is_keyword');

function vp_dep_is_keyword($value)
{
	if($value === 'keyword')
		return true;
	return false;
}

VP_Security::instance()->whitelist_function('vp_dep_is_tags');

function vp_dep_is_tags($value)
{
	if($value === 'tags')
		return true;
	return false;
}

VP_Security::instance()->whitelist_function('vp_bind_color_accent');

function vp_bind_color_accent($preset)
{
	switch ($preset) {
		case 'red':
			return '#ff0000';
		case 'green':
			return '#00ff00';
		case 'blue':
			return '#0000ff';
		default:
			return '#000000';
	}
}

VP_Security::instance()->whitelist_function('vp_bind_color_subtle');

function vp_bind_color_subtle($preset)
{
	return vp_bind_color_accent($preset);
}

VP_Security::instance()->whitelist_function('vp_bind_color_background');

function vp_bind_color_background($preset)
{
	return vp_bind_color_accent($preset);
}

VP_Security::instance()->whitelist_function('vp_font_preview');

function vp_font_preview($face, $style, $weight, $size, $line_height)
{
	$gwf   = new VP_Site_GoogleWebFont();
	$gwf->add($face, $style, $weight);
	$links = $gwf->get_font_links();
	$link  = reset($links);
	$dom   = <<<EOD
<link href='$link' rel='stylesheet' type='text/css'>
<p style="padding: 0 10px 0 10px; font-family: $face; font-style: $style; font-weight: $weight; font-size: {$size}px; line-height: {$line_height}em;">
	Grumpy wizards make toxic brew for the evil Queen and Jack
</p>
EOD;
	return $dom;
}


VP_Security::instance()->whitelist_function('jeg_check_navigation_value');

function jeg_check_navigation_value($value)
{
	if($value === "top") {
		return false;
	} else {
		return true;
	}
}

VP_Security::instance()->whitelist_function('jeg_check_navigation_top_value');

function jeg_check_navigation_top_value($value)
{
	if($value === "top") {
		return true;
	} else {
		return false;
	}
}


VP_Security::instance()->whitelist_function('jeg_check_use_default_navigation');

function jeg_check_use_default_navigation($value)
{
	return $value;
}



VP_Security::instance()->whitelist_function('jeg_choose_normal_template');

function jeg_choose_normal_template($value)
{
	if($value === 'normal') return true;
	return false;
}


VP_Security::instance()->whitelist_function('jeg_choose_cleanblog_template');

function jeg_choose_cleanblog_template($value)
{
	if($value === 'clean') return true;
	return false;
}

VP_Security::instance()->whitelist_function('jeg_choose_cover_template');

function jeg_choose_cover_template($value)
{
	if($value === 'coverwidth') return true;
	return false;
}

VP_Security::instance()->whitelist_function('jeg_choose_extra_template');

function jeg_choose_extra_template($value)
{
	if($value === 'extrawidth') return true;
	return false;
}



VP_Security::instance()->whitelist_function('jeg_get_sidebar');

function jeg_get_sidebar()
{
	$widgetlist = jeg_get_all_widget_list();
	$result = array();
	if($widgetlist) {
		foreach ($widgetlist as $widget)
		{
			$result[] = array(
				'value' => $widget,
				'label' => $widget
			);
		}
		return $result;
	}
return null;
}


VP_Security::instance()->whitelist_function('jeg_check_expand_photoswipe');

function jeg_check_expand_photoswipe($value)
{
	if($value === 'photoswipe') return true;
	return false;
}


VP_Security::instance()->whitelist_function('jeg_font_preview');
function jeg_font_preview($face)
{
	$gwf   = new VP_Site_GoogleWebFont();
	$gwf->add($face);
	$links = $gwf->get_font_links();
	$link  = reset($links);
	$dom   = <<<EOD
<link href='$link' rel='stylesheet' type='text/css'>
<p style="padding: 0 10px 0 10px; font-family: $face; font-weight: $weight; font-size: 20px;">
	Grumpy wizards make toxic brew for the evil Queen and Jack
</p>
EOD;
	return $dom;
}



VP_Security::instance()->whitelist_function('jeg_portfolio_themes_width_value');

function jeg_portfolio_themes_width_value($value)
{
	if($value === 'normal' || $value === 'masonry')
		return true;
	return false;	
}


VP_Security::instance()->whitelist_function('jeg_portfolio_themes_height_value');

function jeg_portfolio_themes_height_value($value)
{
	if($value === 'normal')
		return true;
	return false;	
}

VP_Security::instance()->whitelist_function('jeg_portfolio_themes_justified_value');

function jeg_portfolio_themes_justified_value($value)
{
	if($value === 'justified')
		return true;
	return false;	
}




/********************* admin plugin metabox **************************/



VP_Security::instance()->whitelist_function('jeg_plugin_get_sidebar');

function jeg_plugin_get_sidebar()
{
    $widgetlist = jeg_get_all_widget_list_plugin();
    $result = array();
    if($widgetlist) {
        foreach ($widgetlist as $widget)
        {
            $result[] = array(
                'value' => $widget,
                'label' => $widget
            );
        }
        return $result;
    }
    return null;
}

VP_Security::instance()->whitelist_function('jeg_get_portfolio_page');

function jeg_get_portfolio_page()
{
    $result = array();

    $pages = get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => 'template/template-portfolio.php'
    ));

    foreach($pages as $page){
        $result[] = array(
            'value' => $page->ID,
            'label' => $page->post_title
        );
    }

    return $result;
}



VP_Security::instance()->whitelist_function('jeg_get_portfolio_page_vc');

function jeg_get_portfolio_page_vc()
{
    $result = array();

    $pages = get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => 'template/template-portfolio.php'
    ));

    foreach($pages as $page){
        $result[$page->post_title] = $page->ID;
    }

    return $result;
}




VP_Security::instance()->whitelist_function('jeg_get_all_page');

function jeg_get_all_page()
{
    $result = array();

    $pages = get_pages();

    foreach($pages as $page){
        $result[] = array(
            'value' => $page->ID,
            'label' => $page->post_title
        );
    }

    return $result;
}

VP_Security::instance()->whitelist_function('jeg_get_all_page_vc');

function jeg_get_all_page_vc()
{
    $result = array();

    $pages = get_pages();

    foreach($pages as $page){
        $result[$page->post_title] = $page->ID;
    }

    return $result;
}


VP_Security::instance()->whitelist_function('jeg_get_product_category');

function jeg_get_product_category()
{
    $result = array();

    $termlist = get_terms('product_cat');

    foreach($termlist as $term){
        $result[] = array(
            'value' => $term->term_id,
            'label' => $term->name
        );
    }

    return $result;
}


VP_Security::instance()->whitelist_function('jeg_get_portfolio_item');

function jeg_get_portfolio_item()
{
    $result = array();

    $pages = new WP_Query(array(
        'post_type'	=> 'portfolio',
        'nopaging' => true
    ));

    $pages = $pages->posts;

    foreach($pages as $page){
        $result[] = array(
            'value' => $page->ID,
            'label' => $page->post_title
        );
    }

    return $result;
}


VP_Security::instance()->whitelist_function('jeg_get_portfolio_item_vc');

function jeg_get_portfolio_item_vc()
{
    $result = array();

    $pages = new WP_Query(array(
        'post_type'	=> 'portfolio',
        'nopaging' => true
    ));

    $pages = $pages->posts;

    foreach($pages as $page){
        $result[$page->post_title] = $page->ID;
    }

    return $result;
}


VP_Security::instance()->whitelist_function('jeg_get_slider_item');

function jeg_get_slider_item()
{
    $result = array();

    $pages = new WP_Query(array(
        'post_type'	=> 'slider',
        'nopaging' => true
    ));

    $pages = $pages->posts;

    foreach($pages as $page){
        $result[] = array(
            'value' => $page->ID,
            'label' => $page->post_title
        );
    }

    return $result;
}



VP_Security::instance()->whitelist_function('jeg_check_blog_layout');

function jeg_check_blog_layout($value)
{
    if($value === 'nosidebar') {
        return false;
    } else {
        return true;
    }
}


VP_Security::instance()->whitelist_function('jeg_dep_is_category');

function jeg_dep_is_category($value)
{
    if($value === 'category')
        return true;
    return false;
}


VP_Security::instance()->whitelist_function('jeg_plugin_check_navigation_value');

function jeg_plugin_check_navigation_value($value)
{
    if($value === "top" || $value === 'transparent') {
        return false;
    } else {
        return true;
    }
}


VP_Security::instance()->whitelist_function('jeg_plugin_check_transparent_navigation_value');

function jeg_plugin_check_transparent_navigation_value($value)
{
    if($value === "transparent") {
        return true;
    } else {
        return false;
    }
}


VP_Security::instance()->whitelist_function('jeg_plugin_check_use_default_navigation');

function jeg_plugin_check_use_default_navigation($value)
{
    return $value;
}



VP_Security::instance()->whitelist_function('jeg_heading_type_standard');

function jeg_heading_type_standard($value)
{
    if($value === 'standard') return true;
    return false;
}



VP_Security::instance()->whitelist_function('jeg_heading_type_imageslider');

function jeg_heading_type_imageslider($value)
{
    if($value === 'imgslider') return true;
    return false;
}



VP_Security::instance()->whitelist_function('jeg_heading_type_youtube');

function jeg_heading_type_youtube($value)
{
    if($value === 'youtube') return true;
    return false;
}


VP_Security::instance()->whitelist_function('jeg_heading_type_vimeo');

function jeg_heading_type_vimeo($value)
{
    if($value === 'vimeo') return true;
    return false;
}

VP_Security::instance()->whitelist_function('jeg_heading_type_html5video');

function jeg_heading_type_html5video($value)
{
    if($value === 'html5video') return true;
    return false;
}


VP_Security::instance()->whitelist_function('jeg_heading_type_soundcloud');

function jeg_heading_type_soundcloud($value)
{
    if($value === 'soundcloud') return true;
    return false;
}

VP_Security::instance()->whitelist_function('jeg_plugin_check_expand_photoswipe');

function jeg_plugin_check_expand_photoswipe($value)
{
    if($value === 'photoswipe') return true;
    return false;
}


VP_Security::instance()->whitelist_function('jeg_portfolio_width_value');

function jeg_portfolio_width_value($value)
{
    if($value === 'normal' || $value === 'masonry')
        return true;
    return false;
}


VP_Security::instance()->whitelist_function('jeg_portfolio_height_value');

function jeg_portfolio_height_value($value)
{
    if($value === 'normal')
        return true;
    return false;
}

VP_Security::instance()->whitelist_function('jeg_portfolio_justified_value');

function jeg_portfolio_justified_value($value)
{
    if($value === 'justified')
        return true;
    return false;
}




VP_Security::instance()->whitelist_function('jeg_heading_slider');

function jeg_heading_slider($value)
{
    if($value === 'slider')
        return true;
    return false;
}


VP_Security::instance()->whitelist_function('jeg_heading_normal');

function jeg_heading_normal($value)
{
    if($value === 'parallaxheading')
        return true;
    return false;
}


VP_Security::instance()->whitelist_function('jeg_heading_shortcode');

function jeg_heading_shortcode($value)
{
    if($value === 'shortcode')
        return true;
    return false;
}


VP_Security::instance()->whitelist_function('jeg_section_background_color');

function jeg_section_background_color($value)
{
    if($value === 'color')
        return true;
    return false;
}


VP_Security::instance()->whitelist_function('jeg_section_image_background');

function jeg_section_image_background($value)
{
    if($value === 'imagebg')
        return true;
    return false;
}


VP_Security::instance()->whitelist_function('jeg_section_moving_background');

function jeg_section_moving_background($value)
{
    if($value === 'movingbg')
        return true;
    return false;
}


VP_Security::instance()->whitelist_function('jeg_section_parallax_background');

function jeg_section_parallax_background($value)
{
    if($value === 'parallaxbg')
        return true;
    return false;
}


VP_Security::instance()->whitelist_function('jeg_section_background_video');

function jeg_section_background_video($value)
{
    if($value === 'video')
        return true;
    return false;
}

VP_Security::instance()->whitelist_function('jeg_slider_background_image');

function jeg_slider_background_image($value)
{
    if($value === 'image')
        return true;
    return false;
}

VP_Security::instance()->whitelist_function('jeg_slider_background_video');

function jeg_slider_background_video($value)
{
    if($value === 'video')
        return true;
    return false;
}

VP_Security::instance()->whitelist_function('jeg_slider_background_youtube');

function jeg_slider_background_youtube($value)
{
    if($value === 'youtube')
        return true;
    return false;
}


VP_Security::instance()->whitelist_function('jeg_portfolio_expand_ajax');

function jeg_portfolio_expand_ajax($value)
{
    if($value === 'normal' || $value === 'theather') {
        return true;
    } else {
        return false;
    }
}


VP_Security::instance()->whitelist_function('jeg_text_animation');

function jeg_text_animation($value)
{
    if($value === 'slide') {
        return true;
    } else {
        return false;
    }
}


VP_Security::instance()->whitelist_function('jeg_plugin_use_fullwidth');

function jeg_plugin_use_fullwidth($value)
{
    return !$value;
}


VP_Security::instance()->whitelist_function('jeg_get_team_member');

function jeg_get_team_member() {
    $result = array();

    $pages = new WP_Query(array(
        'post_type'	=> 'team',
        'nopaging' => true
    ));

    $pages = $pages->posts;

    foreach($pages as $page){
        $result[] = array(
            'value' => $page->ID,
            'label' => $page->post_title
        );
    }

    return $result;
}



VP_Security::instance()->whitelist_function('jeg_get_pricing');

function jeg_get_pricing () {
    $result = array();

    $pages = new WP_Query(array(
        'post_type'	=> 'pricing',
        'nopaging' => true
    ));

    $pages = $pages->posts;

    foreach($pages as $page){
        $result[] = array(
            'value' => $page->ID,
            'label' => $page->post_title
        );
    }

    return $result;
}