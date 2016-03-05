<?php

$blogitemtype = vp_metabox('jkreativ_blog_format.format');

if($blogitemtype === 'ads') {
	$linkpage = vp_metabox('jkreativ_blog_ads.ads_url');
	header("Location: {$linkpage}");
	exit();
} else {
	if(vp_metabox('jkreativ_blog_template.override_template')) {
		$template = vp_metabox('jkreativ_blog_template.template.0.single_blog_template');
		if($template === 'normal') {
			$pageoption = array(
				'hideshare' => vp_metabox('jkreativ_blog_template.template.0.general_blog_normal.0.general_blog_normal_hide_share'),
				'hidemeta' => vp_metabox('jkreativ_blog_template.template.0.general_blog_normal.0.general_blog_normal_hide_meta'),
				'pageposition' => vp_metabox('jkreativ_blog_template.template.0.general_blog_normal.0.general_blog_normal_page_position'),
				'blogwidth' => vp_metabox('jkreativ_blog_template.template.0.general_blog_normal.0.general_blog_normal_page_width'),
				'usesidebar' => vp_metabox('jkreativ_blog_template.template.0.general_blog_normal.0.general_blog_normal_show_sidebar'),
				'sidebarname' => vp_metabox('jkreativ_blog_template.template.0.general_blog_normal.0.general_blog_normal_sidebar'),
			);
			get_template_part('template/blogpost/single-normal-layout');
		} else if ($template === 'clean') {
			$pageoption = array(
				'hideshare' => vp_option('jkreativ_blog_template.general_blog_clean_hide_share', 0),
				'hidetopmeta' => vp_option('jkreativ_blog_template.general_blog_clean_hide_top_meta', 0),
				'hidebottommeta' => vp_option('jkreativ_blog_template.general_blog_clean_hide_bottom_meta'),
			);
			get_template_part('template/blogpost/single-clean-layout');			
		} else if ($template === 'coverwidth') {
			$pageoption = array(
				'sidebarname' => vp_metabox('jkreativ_blog_template.template.0.general_blog_cover.0.general_blog_cover_sidebar'),
				'hideshare' => vp_metabox('jkreativ_blog_template.template.0.general_blog_cover.0.general_blog_cover_hide_share'),
				'hidemeta' => vp_metabox('jkreativ_blog_template.template.0.general_blog_cover.0.general_blog_cover_hide_meta'),
			);
	
			get_template_part('template/blogpost/single-cover-layout');
		} else if ($template === 'extrawidth') {
			$pageoption = array(
				'sidebarname' => vp_metabox('jkreativ_blog_template.template.0.general_blog_wide.0.general_blog_wide_sidebar'),
				'hideshare' => vp_metabox('jkreativ_blog_template.template.0.general_blog_wide.0.general_blog_extra_hide_share'),
				'hidemeta' => vp_metabox('jkreativ_blog_template.template.0.general_blog_wide.0.general_blog_extra_hide_meta'),
			);
			get_template_part('template/blogpost/single-extra-layout');
		}
	} else {
		$template = vp_option('joption.single_blog_template', 'normal');
		if($template === 'normal') {
			$pageoption = array(
				'hideshare' => vp_option('joption.general_blog_normal_hide_share', 0),
				'hidemeta' => vp_option('joption.general_blog_normal_hide_meta', 0),
				'pageposition' => vp_option('joption.general_blog_normal_page_position', 'pagecenter'),
				'blogwidth' => vp_option('joption.general_blog_normal_page_width', 'fullwidth'),
				'usesidebar' => vp_option('joption.general_blog_normal_show_sidebar', 0),
				'sidebarname' => vp_option('joption.general_blog_normal_sidebar'),
			);
			get_template_part('template/blogpost/single-normal-layout');
		} else if ($template === 'clean') {
			$pageoption = array(
				'hideshare' => vp_option('joption.general_blog_clean_hide_share', 0),
				'hidetopmeta' => vp_option('joption.general_blog_clean_hide_top_meta', 0),
				'hidebottommeta' => vp_option('joption.general_blog_clean_hide_bottom_meta'),
			);
			get_template_part('template/blogpost/single-clean-layout');
		} else if ($template === 'coverwidth') {
			$pageoption = array(
				'hideshare' => vp_option('joption.general_blog_cover_hide_share', 0),
				'hidemeta' => vp_option('joption.general_blog_cover_hide_meta', 0),
				'sidebarname' => vp_option('joption.general_blog_normal_sidebar'),
			);
			get_template_part('template/blogpost/single-cover-layout');
		} else if ($template === 'extrawidth') {
			$pageoption = array(
				'hideshare' => vp_option('joption.general_blog_extra_hide_share', 0),
				'hidemeta' => vp_option('joption.general_blog_extra_hide_meta', 0),
				'sidebarname' => vp_option('joption.general_blog_normal_sidebar'),
			);
			get_template_part('template/blogpost/single-extra-layout');
		}
	}
}
