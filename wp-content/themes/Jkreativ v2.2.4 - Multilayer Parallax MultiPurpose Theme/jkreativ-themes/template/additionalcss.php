<?php
/***
 * top navigation
 ***/
?>

<?php
    // first font
    if(jeg_check_use_font_uploader('additional_font_1')) {
?>
@font-face {
    font-family: '<?php echo vp_option('joption.additional_font_1_fontname'); ?>';
    src: url('<?php echo vp_option('joption.additional_font_1_eot'); ?>');
    src: url('<?php echo vp_option('joption.additional_font_1_eot'); ?>?#iefix') format('embedded-opentype'),
        url('<?php echo vp_option('joption.additional_font_1_woff'); ?>') format('woff'),
        url('<?php echo vp_option('joption.additional_font_1_ttf'); ?>') format('truetype'),
        url('<?php echo vp_option('joption.additional_font_1_svg'); ?>#champagne__limousinesregular') format('svg');
}
<?php
    }
    if(jeg_check_use_font_uploader('additional_font_2')) {
?>
@font-face {
    font-family: '<?php echo vp_option('joption.additional_font_2_fontname'); ?>';
    src: url('<?php echo vp_option('joption.additional_font_2_eot'); ?>');
    src: url('<?php echo vp_option('joption.additional_font_2_eot'); ?>?#iefix') format('embedded-opentype'),
    url('<?php echo vp_option('joption.additional_font_2_woff'); ?>') format('woff'),
    url('<?php echo vp_option('joption.additional_font_2_ttf'); ?>') format('truetype'),
    url('<?php echo vp_option('joption.additional_font_2_svg'); ?>#champagne__limousinesregular') format('svg');
}
<?php
    }
    if(jeg_check_use_font_uploader('additional_font_3')) {
?>
@font-face {
    font-family: '<?php echo vp_option('joption.additional_font_3_fontname'); ?>';
    src: url('<?php echo vp_option('joption.additional_font_3_eot'); ?>');
    src: url('<?php echo vp_option('joption.additional_font_3_eot'); ?>?#iefix') format('embedded-opentype'),
    url('<?php echo vp_option('joption.additional_font_3_woff'); ?>') format('woff'),
    url('<?php echo vp_option('joption.additional_font_3_ttf'); ?>') format('truetype'),
    url('<?php echo vp_option('joption.additional_font_3_svg'); ?>#champagne__limousinesregular') format('svg');
}
<?php
    }
?>



<?php if(get_theme_mod('jeg_top_nav_background_color')) { ?>
	.horizontalnav .topnavigation { background : <?php echo get_theme_mod('jeg_top_nav_background_color') ?> }
<?php } if(get_theme_mod('jeg_top_menu_color')) { ?>
	.navcontent a,  .topnavigation .navcontent a, .topnavigationwoo .accountdrop li a, .topnavigationsearch i, .topnavigationwoo .topaccount span, .topnavigationwoo .topcart a, .topnavigation .footsocial i  { color : <?php echo get_theme_mod('jeg_top_menu_color') ?> }
<?php } if(get_theme_mod('jeg_top_nav_line_color')) { ?>
	.horizontalnav .topnavigationwoo > ul:before, .horizontalnav .footsocial > ul:before, .horizontalnav .twolinetop .topnavigationwoo > ul:before, .horizontalnav .twolinetop .footsocial > ul:before  { background-color : <?php echo get_theme_mod('jeg_top_nav_line_color') ?> }
<?php } if(get_theme_mod('jeg_top_nav_icon_color')) { ?>
	.topnavigationwoo .topaccount span, .topnavigationwoo .topcart a, .topnavigation .footsocial a { color : <?php echo get_theme_mod('jeg_top_nav_icon_color') ?> }
<?php } ?>

<?php if(get_theme_mod('jeg_top_hover_menu_color')) { ?>
	.navcontent > ul > li.hovered > a, .topnavigation #mega_main_menu.top_navigation > .menu_holder > .menu_inner > ul > li.hovered > .item_link * { color : <?php echo get_theme_mod('jeg_top_hover_menu_color') ?> }
<?php } if(get_theme_mod('jeg_top_hover_bg_color')) { ?>
	.navcontent > ul > li.hovered, .topnavigation #mega_main_menu.top_navigation ul.mega_main_menu_ul > li.hovered { background-color : <?php echo get_theme_mod('jeg_top_hover_bg_color') ?> }
<?php } ?>

<?php if(get_theme_mod('jeg_top_nav_drop_bg')) { ?>
	.navcontent .childmenu li, .topnavigationwoo .accountdrop li { background-color : <?php echo get_theme_mod('jeg_top_nav_drop_bg') ?> }
<?php } if(get_theme_mod('jeg_top_nav_drop_text')) { ?>
	.navcontent .childmenu li a, .topnavigationwoo .accountdrop li a { color : <?php echo get_theme_mod('jeg_top_nav_drop_text') ?> }
<?php } if(get_theme_mod('jeg_top_nav_drop_line')) { ?>
	.navcontent .childmenu, .navcontent .childmenu li, .topnavigationwoo .accountdrop li { border-color : <?php echo get_theme_mod('jeg_top_nav_drop_line') ?> }
<?php } ?>

<?php if(get_theme_mod('jeg_top_nav_hover_drop_bg')) { ?>
	.navcontent .childmenu li:hover, .topnavigationwoo .accountdrop li:hover { background-color : <?php echo get_theme_mod('jeg_top_nav_hover_drop_bg') ?> }
	.navcontent ul li > a:after {background-color: <?php echo get_theme_mod('jeg_top_nav_hover_drop_bg') ?>}
<?php } if(get_theme_mod('jeg_top_nav_hover_drop_text')) { ?>
	.navcontent .childmenu li:hover > a, .topnavigationwoo .accountdrop li:hover a { color : <?php echo get_theme_mod('jeg_top_nav_hover_drop_text') ?> }
<?php } if(get_theme_mod('jeg_top_nav_hover_drop_line')) { ?>
	.navcontent .childmenu li:hover, .topnavigationwoo .accountdrop li:hover { border-color : <?php echo get_theme_mod('jeg_top_nav_hover_drop_line') ?> }
<?php }  if(get_theme_mod('jeg_top_nav_show_search') === false) { ?>
	.topnavigationsearch { display: none; }
<?php } ?>

<?php if(get_theme_mod('jeg_top_nav_search_bg_color')) { ?>
	.topsearchwrapper input { background-color : <?php echo get_theme_mod('jeg_top_nav_search_bg_color') ?> }
<?php } if(get_theme_mod('jeg_top_nav_search_text_color')) { ?>
	.topsearchwrapper input { color : <?php echo get_theme_mod('jeg_top_nav_search_text_color') ?> }
<?php } if(get_theme_mod('jeg_top_nav_search_icon_color')) { ?>
	.topsearchwrapper .closesearch i { color : <?php echo get_theme_mod('jeg_top_nav_search_icon_color') ?> }
<?php } ?>

<?php if(get_theme_mod('jeg_top_nav_social_hover_border')) { ?>
	.topnavigation .footsocial a:hover { border-color : <?php echo get_theme_mod('jeg_top_nav_social_hover_border') ?> }
<?php } if(get_theme_mod('jeg_top_nav_social_hover_color')) { ?>
	.topnavigation .footsocial a:hover i { color : <?php echo get_theme_mod('jeg_top_nav_social_hover_color') ?> }
<?php } ?>


<?php if(get_theme_mod('jeg_top_sec_background')) { ?>
	.twolinetop { background-color : <?php echo get_theme_mod('jeg_top_sec_background') ?> }
<?php } if(get_theme_mod('jeg_top_sec_tagline_color')) { ?>
	.topnavmsg { color : <?php echo get_theme_mod('jeg_top_sec_tagline_color') ?> }
<?php } if(get_theme_mod('jeg_top_sec_border')) { ?>
	.twolinetop { border-color : <?php echo get_theme_mod('jeg_top_sec_border') ?> }
<?php } ?>


<?php if(get_theme_mod('jeg_side_header_menu_color')) { ?>
	.portfoliofilterbutton, .blogfilterbutton, .headermenu .toplink li a { color : <?php echo get_theme_mod('jeg_side_header_menu_color') ?> }
<?php } if(get_theme_mod('jeg_side_header_menu_drop_bg')) { ?>
	.portfoliofilterlist, .blogfilterlist, .portfoliofilterlist ul, .blogfilterlist ul { background-color : <?php echo get_theme_mod('jeg_side_header_menu_drop_bg') ?> }
<?php } if(get_theme_mod('jeg_side_header_menu_drop_text')) { ?>
	.portfoliofilterlist li, .blogfilterlist li { color : <?php echo get_theme_mod('jeg_side_header_menu_drop_text') ?> }
<?php } if(get_theme_mod('jeg_side_header_menu_drop_text_hovered')) { ?>
	.portfoliofilterlist li:hover, .portfoliofilterlist li.active, .blogfilterlist li:hover, .blogfilterlist li.active { color : <?php echo get_theme_mod('jeg_side_header_menu_drop_text_hovered') ?> }
<?php } if(get_theme_mod('jeg_side_header_menu_color_bg_active')) { ?>
	.portfoliofilter.active .portfoliofilterbutton, .blogfilter.active .blogfilterbutton, .headermenu .toplink li.active, .headermenu .toplink li.active > a { background-color : <?php echo get_theme_mod('jeg_side_header_menu_color_bg_active') ?> }
<?php } if(get_theme_mod('jeg_side_header_menu_color_text_active')) { ?>
	.portfoliofilter.active .portfoliofilterbutton, .blogfilter.active .blogfilterbutton, .headermenu .toplink li.active, .headermenu .toplink li.active > a { color : <?php echo get_theme_mod('jeg_side_header_menu_color_text_active') ?> }
<?php } ?>

<?php
/***
 * side navigation
 ***/
?>

<?php if(get_theme_mod('jeg_side_bg')) { ?>
	#leftsidebar { background-color : <?php echo get_theme_mod('jeg_side_bg') ?> }
<?php } if(get_theme_mod('jeg_side_link_color')) { ?>
	#leftsidebar a, .mainnavigation li .arrow { color : <?php echo get_theme_mod('jeg_side_link_color') ?> }
<?php } if(get_theme_mod('jeg_side_link_color_hover')) { ?>
	#leftsidebar a:hover, .mainnavigation li:hover .arrow { color : <?php echo get_theme_mod('jeg_side_link_color_hover') ?> }
<?php } ?>


<?php if(get_theme_mod('jeg_side_bottom_bg')) { ?>
	.leftfooter { background-color : <?php echo get_theme_mod('jeg_side_bottom_bg') ?> }
<?php } if(get_theme_mod('jeg_side_bottom_copyright')) { ?>
	.footcopy { color : <?php echo get_theme_mod('jeg_side_bottom_copyright') ?> }
<?php } if(get_theme_mod('jeg_side_social')) { ?>
	#leftsidebar .footsocial a i, .csbwrapper li a i { color : <?php echo get_theme_mod('jeg_side_social') ?> }
<?php } if(get_theme_mod('jeg_side_social_border')) { ?>
	#leftsidebar .footsocial a, .csbwrapper li a { border-color : <?php echo get_theme_mod('jeg_side_social_border') ?> }
<?php } if(get_theme_mod('jeg_side_social_hover')) { ?>
	#leftsidebar .footsocial a:hover i, .csbwrapper li a:hover i { color : <?php echo get_theme_mod('jeg_side_social_hover') ?> }
<?php } if(get_theme_mod('jeg_side_social_border_hovered')) { ?>
	#leftsidebar .footsocial a:hover, .csbwrapper li a:hover { border-color : <?php echo get_theme_mod('jeg_side_social_border_hovered') ?> }
<?php } if(get_theme_mod('jeg_side_btm_link_color')) { ?>
	#leftsidebar .footlink li a { color : <?php echo get_theme_mod('jeg_side_btm_link_color') ?> }
<?php } if(get_theme_mod('jeg_side_btm_link_color_hover')) { ?>
	#leftsidebar .footlink li a:hover { color : <?php echo get_theme_mod('jeg_side_btm_link_color_hover') ?> }
<?php } if(get_theme_mod('jeg_side_btm_separator')) { ?>
	#leftsidebar .footlink .separator { color :  <?php echo get_theme_mod('jeg_side_btm_separator') ?> }
<?php } ?>


<?php if(get_theme_mod('jeg_side_nav_top_border')) { ?>
	.mainnavigation, #leftsidebar #mega_main_menu.direction-vertical { border-color : <?php echo get_theme_mod('jeg_side_nav_top_border') ?> }
<?php } if(get_theme_mod('jeg_side_nav_color')) { ?>
	.mainnav > li > a > h2,
	.mainnav .childmenu h2, .mainnavigation li:hover .arrow,
	#leftsidebar #mega_main_menu.side_navigation > .menu_holder > .menu_inner > ul > li > .item_link > span > span { color : <?php echo get_theme_mod('jeg_side_nav_color'); ?> !important ; }
<?php } if(get_theme_mod('jeg_side_nav_color_active')) { ?>
	.mainnav li.active > a > h2,
	.mainnav  li:hover > a > h2,
	.mainnav .menudown > a > h2,
	.mainnav li[class^="current"] > a > h2,
	.mainnav li[class*="current_"] > a > h2,
	.menu-top-navigation li[class^="current"] > a > h2,
	.menu-top-navigation li[class*="current_"] > a > h2,
	li.current-menu-parent > a > h2,
	.mainnav  li.active > a > span.arrow,
	.mainnav  li:hover > a > span.arrow,
	.menudown > a > span.arrow,
	.mainnav li[class^="current"] > a > span.arrow,
	.mainnav li[class*="current_"] > a > span.arrow,
	.menu-top-navigation li[class^="current"] > a > span.arrow,
	.menu-top-navigation li[class*="current_"] > a > span.arrow,
	li.current-menu-parent > a > span.arrow,
	#leftsidebar #mega_main_menu.side_navigation > .menu_holder > .menu_inner > ul > li:hover > .item_link > span > span,
	#leftsidebar #mega_main_menu.side_navigation > .menu_holder > .menu_inner > ul > li.current-menu-parent > .item_link > span > span,
	#leftsidebar #mega_main_menu.side_navigation > .menu_holder > .menu_inner > ul > li.current_page_item > .item_link > span > span
	{ color : <?php echo get_theme_mod('jeg_side_nav_color_active') ?> }
<?php } if(get_theme_mod('jeg_side_nav_bottom_border')) { ?>
	.mainnav > li > a > h2:after, .mainnav .childmenu h2:after, #leftsidebar #mega_main_menu.side_navigation > .menu_holder > .menu_inner > ul > li > .item_link > span > span:after { background-color : <?php echo get_theme_mod('jeg_side_nav_bottom_border') ?> }
<?php } ?>


<?php if(get_theme_mod('jeg_side_additional_top_border')) { ?>
	.additionalblock { border-top-color : <?php echo get_theme_mod('jeg_side_additional_top_border') ?> }
<?php } if(get_theme_mod('jeg_side_additional_bottom_border')) { ?>
	.additionalblock:last-child { border-bottom-color : <?php echo get_theme_mod('jeg_side_additional_bottom_border') ?> }
<?php } if(get_theme_mod('jeg_side_additional_title')) { ?>
	.additionalblock h3 { color : <?php echo get_theme_mod('jeg_side_additional_title') ?> }
<?php } if(get_theme_mod('jeg_side_additional_title_border')) { ?>
	.additionalblock .line { background-color : <?php echo get_theme_mod('jeg_side_additional_title_border') ?> }
<?php } if(get_theme_mod('jeg_side_additional_text_color')) { ?>
	.additionalblock { color : <?php echo get_theme_mod('jeg_side_additional_text_color') ?> }
<?php } ?>

<?php if(get_theme_mod('jeg_side_collapse_icon_color')) { ?>
	.cbsheader .csbhicon { color : <?php echo get_theme_mod('jeg_side_collapse_icon_color') ?> }
<?php } ?>

<?php
/**
 * Side navigation - Header menu
 */
?>

<?php if(get_theme_mod('jeg_side_header_bg_color')) { ?>
	.headermenu { background-color : <?php echo get_theme_mod('jeg_side_header_bg_color') ?> }
<?php } if(get_theme_mod('jeg_side_header_border_color')) { ?>
	.headermenu { border-color :  <?php echo get_theme_mod('jeg_side_header_border_color') ?> }
<?php } if(get_theme_mod('jeg_side_header_show_search', true) === false ) { ?>
	.headermenu .searchheader { display : none; }
<?php } if(get_theme_mod('jeg_side_header_search_bg_color')) { ?>
	.headermenu .searchcontent input { background-color : <?php echo get_theme_mod('jeg_side_header_search_bg_color') ?> }
<?php } if(get_theme_mod('jeg_side_header_text_color')) { ?>
	.headermenu .searchcontent input, .closesearch i { color : <?php echo get_theme_mod('jeg_side_header_text_color') ?> }
<?php } if(get_theme_mod('jeg_side_header_search_icon_color')) { ?>
	.searchheader i { color : <?php echo get_theme_mod('jeg_side_header_search_icon_color') ?> }
<?php } ?>


<?php
/**
 * Mobile Navigation menu
 */
?>

<?php if(get_theme_mod('mobile_nav_bg_color')) { ?>
	.responsiveheader { background-color : <?php echo get_theme_mod('mobile_nav_bg_color') ?> }
<?php } if(get_theme_mod('mobile_nav_icon_color')) { ?>
	.navleftwrapper span, .navrightwrapper span { color :  <?php echo get_theme_mod('mobile_nav_icon_color') ?> }
<?php } if(get_theme_mod('mobile_nav_show_search') === false ) { ?>
	.navright.mobile-search-trigger { display : none; }
<?php } if(get_theme_mod('mobile_nav_search_bg_color')) { ?>
	.mobilesearch input { background-color : <?php echo get_theme_mod('mobile_nav_search_bg_color') ?> }
<?php } if(get_theme_mod('mobile_nav_search_text_color')) { ?>
	.mobilesearch input { color : <?php echo get_theme_mod('mobile_nav_search_text_color') ?> }
<?php } if(get_theme_mod('mobile_nav_search_icon_color')) { ?>
	.closemobilesearch span { color : <?php echo get_theme_mod('mobile_nav_search_icon_color') ?> }
<?php } ?>

<?php if(get_theme_mod('mobile_nav_col_bg_color')) { ?>
	.mobile-float { background-color : <?php echo get_theme_mod('mobile_nav_col_bg_color') ?> }
<?php } if(get_theme_mod('mobile_nav_col_menu_color')) { ?>
	.mobile-menu h2 { color : <?php echo get_theme_mod('mobile_nav_col_menu_color') ?> }
<?php } if(get_theme_mod('mobile_nav_col_list_bg') ) { ?>
	.mobile-menu li a { background-color :<?php echo get_theme_mod('mobile_nav_col_list_bg') ?> }
<?php } if(get_theme_mod('mobile_nav_col_list_color')) { ?>
	.mobile-menu li a { color :<?php echo get_theme_mod('mobile_nav_col_list_color') ?> }
<?php } if(get_theme_mod('mobile_nav_col_list_border_top')) { ?>
	.mobile-menu li a { border-top-color :<?php echo get_theme_mod('mobile_nav_col_list_border_top') ?> }
<?php } if(get_theme_mod('mobile_nav_col_list_border_bottom')) { ?>
	.mobile-menu li a { border-bottom-color :<?php echo get_theme_mod('mobile_nav_col_list_border_bottom') ?> }
<?php } ?>

<?php if(get_theme_mod('mobile_nav_col_list_bg_hovered')) { ?>
	.mobile-menu li a:hover, .mobile-menu li[class^='current'] > a, .mobile-menu li[class*='current_'] > a { background-color : <?php echo get_theme_mod('mobile_nav_col_list_bg_hovered') ?> }
<?php } if(get_theme_mod('mobile_nav_col_list_color_hovered')) { ?>
	.mobile-menu li a:hover, .mobile-menu li[class^='current'] > a, .mobile-menu li[class*='current_'] > a { color : <?php echo get_theme_mod('mobile_nav_col_list_color_hovered') ?> }
<?php } if(get_theme_mod('mobile_nav_col_list_border_top_hovered') ) { ?>
	.mobile-menu li a:hover, .mobile-menu li[class^='current'] > a, .mobile-menu li[class*='current_'] > a { border-top-color : <?php echo get_theme_mod('mobile_nav_col_list_border_top_hovered') ?> }
<?php } if(get_theme_mod('mobile_nav_col_list_border_bottom_hovered')) { ?>
	.mobile-menu li a:hover, .mobile-menu li[class^='current'] > a, .mobile-menu li[class*='current_'] > a { border-bottom-color : <?php echo get_theme_mod('mobile_nav_col_list_border_bottom_hovered') ?> }
<?php } if(get_theme_mod('mobile_nav_col_list_border_left_hovered')) { ?>
	.mobile-menu li a:hover, .mobile-menu li[class^='current'] > a, .mobile-menu li[class*='current_'] > a { border-left-color : <?php echo get_theme_mod('mobile_nav_col_list_border_left_hovered') ?> }
<?php } ?>


<?php
/**
 * Mega Menu
 */
?>

<?php if(get_theme_mod('mega_arrow_color')) { ?>
	/** mega_arrow_color **/
	#leftsidebar #mega_main_menu.direction-vertical > .menu_holder > .menu_inner > ul > li > .mega_dropdown:before { border-right-color : <?php echo get_theme_mod('mega_arrow_color') ?> }
	.topnavigation #mega_main_menu > .menu_holder > .menu_inner > ul > li > .mega_dropdown:before { border-bottom-color : <?php echo get_theme_mod('mega_arrow_color') ?> }
<?php } if(get_theme_mod('mega_bg_color')) { ?>
	/** mega_bg_color **/
    #mega_main_menu #mega_main_menu_ul > li > ul
	{ background : <?php echo get_theme_mod('mega_bg_color') ?> }
<?php } if(get_theme_mod('mega_text_color') ) { ?>
	/** mega_text_color **/
	#leftsidebar #mega_main_menu.side_navigation ul li.default_dropdown .mega_dropdown > li > .item_link *,
	#leftsidebar #mega_main_menu.side_navigation ul li.multicolumn_dropdown .mega_dropdown > li > .item_link *,
	#leftsidebar #mega_main_menu.side_navigation ul li.multicolumn_dropdown .mega_dropdown > li > .item_link *,
	.topnavigation #mega_main_menu.top_navigation ul li.default_dropdown .mega_dropdown > li > .item_link *,
	.topnavigation #mega_main_menu.top_navigation ul li.multicolumn_dropdown .mega_dropdown > li > .item_link *,
	.topnavigation #mega_main_menu.top_navigation ul li.multicolumn_dropdown .mega_dropdown > li > .item_link *
	{ color : <?php echo get_theme_mod('mega_text_color') ?> }
<?php } if(get_theme_mod('mega_text_hover_color')) { ?>
	/** mega_text_hover_color **/
	#leftsidebar #mega_main_menu.side_navigation ul li.default_dropdown .mega_dropdown > li:hover > .item_link *,
	#leftsidebar #mega_main_menu.side_navigation ul li.default_dropdown .mega_dropdown > li.current-menu-item > .item_link *,
	#leftsidebar #mega_main_menu.side_navigation ul li.multicolumn_dropdown .mega_dropdown > li > .item_link:hover *,
	#leftsidebar #mega_main_menu.side_navigation ul li.multicolumn_dropdown .mega_dropdown > li.current-menu-item > .item_link *,
	.topnavigation #mega_main_menu.top_navigation ul li.default_dropdown .mega_dropdown > li:hover > .item_link *,
	.topnavigation #mega_main_menu.top_navigation ul li.default_dropdown .mega_dropdown > li.current-menu-item > .item_link *,
	.topnavigation #mega_main_menu.top_navigation ul li.multicolumn_dropdown .mega_dropdown > li > .item_link:hover *,
	.topnavigation #mega_main_menu.top_navigation ul li.multicolumn_dropdown .mega_dropdown > li.current-menu-item > .item_link *
	{ color : <?php echo get_theme_mod('mega_text_hover_color') ?> }
<?php } if(get_theme_mod('mega_heading_color')) { ?>
	/** mega_heading_color **/
	#leftsidebar #mega_main_menu > .menu_holder > .menu_inner > ul > li.multicolumn_dropdown > .mega_dropdown > li > a > span > span,
	#leftsidebar #mega_main_menu > .menu_holder > .menu_inner > ul > li.multicolumn_dropdown > .mega_dropdown > li > span > span > span,
	.topnavigation #mega_main_menu > .menu_holder > .menu_inner > ul > li.multicolumn_dropdown > .mega_dropdown > li > a > span > span,
	.topnavigation #mega_main_menu > .menu_holder > .menu_inner > ul > li.multicolumn_dropdown > .mega_dropdown > li > span > span > span
	{ color : <?php echo get_theme_mod('mega_heading_color') ?> }
<?php } if(get_theme_mod('mega_border_color')) { ?>
	/** mega_border_color **/
	#mega_main_menu > .menu_holder > .menu_inner > ul > li.default_dropdown .mega_dropdown > li > .item_link { border-color : <?php echo get_theme_mod('mega_border_color') ?> }

<?php } ?>


<?php
/**
 * footer landing
 */
?>

<?php if(get_theme_mod('footer_background')) { ?>
	.landing-footer { background-color :  <?php echo get_theme_mod('footer_background') ?> }
<?php } if(get_theme_mod('footer_text_color')) { ?>
	 .landing-footer { color : <?php echo get_theme_mod('footer_text_color') ?> }
<?php } if(get_theme_mod('footer_heading_color') ) { ?>
	 .footerwidget-title h3 { color : <?php echo get_theme_mod('footer_heading_color') ?> }
<?php } if(get_theme_mod('footer_link_color')) { ?>
	 .landing-footer a { color : <?php echo get_theme_mod('footer_link_color') ?> }
<?php } if(get_theme_mod('footer_hover_color')) { ?>
	 .landing-footer li a:hover { color :<?php echo get_theme_mod('footer_hover_color') ?> }
<?php } if(get_theme_mod('footer_copyright_background')) { ?>
	 .landing-btm-footer { background-color : <?php echo get_theme_mod('footer_copyright_background') ?> }
<?php } if(get_theme_mod('footer_copyright_color')) { ?>
	 .landing-footer-copyright { color : <?php echo get_theme_mod('footer_copyright_color') ?> }
<?php } ?>



<?php
/**
 * mini cart
 */
?>


<?php if(get_theme_mod('mini_woo_bg')) { ?>
	.topcartcontent { background-color : <?php echo get_theme_mod('mini_woo_bg') ?> }
<?php } if(get_theme_mod('mini_woo_text')) { ?>
	 .topcartheader, .topcart_desc a strong, .topcart_price span.amount, .topcart_subtotal, .topcart_subtotal strong .amount { color : <?php echo get_theme_mod('mini_woo_text') ?> }
<?php } if(get_theme_mod('mini_woo_alt_text') ) { ?>
	 .topcart_desc > span, .topcartlist .variation, .toplink li .topcart_product_remove > a, .topnavigationwoo li .topcart_product_remove > a { color : <?php echo get_theme_mod('mini_woo_alt_text') ?> }
<?php } if(get_theme_mod('mini_woo_line_color')) { ?>
	 .topcartheader, .topcartlist_product, .topcart_subtotal { border-color : <?php echo get_theme_mod('mini_woo_line_color') ?> }
<?php } if(get_theme_mod('mini_woo_btn_bg')) { ?>
	 .toplink li a.topcart_btn, .topnavigationwoo li a.topcart_btn { background-color : <?php echo get_theme_mod('mini_woo_btn_bg') ?> }
<?php } if(get_theme_mod('mini_woo_btn_text')) { ?>
	 .toplink li a.topcart_btn, .topnavigationwoo li a.topcart_btn { color : <?php echo get_theme_mod('mini_woo_btn_text') ?> }
<?php } if(get_theme_mod('mini_woo_btn_border')) { ?>
	 .toplink li a.topcart_btn, .topnavigationwoo li a.topcart_btn { border-color : <?php echo get_theme_mod('mini_woo_btn_border') ?> }
<?php } ?>


<?php
/** portfolio gallery **/
?>

<?php if(get_theme_mod('jeg_pl_filter_color')) { ?>
	.filterfloatbutton { color : <?php echo get_theme_mod('jeg_pl_filter_color') ?> }
<?php } if(get_theme_mod('jeg_pl_filter_bg')) { ?>
	 .filterfloatbutton { background-color : <?php echo get_theme_mod('jeg_pl_filter_bg') ?> }
<?php } if(get_theme_mod('jeg_pl_active_filter_color') ) { ?>
	 .filterfloat.active .filterfloatbutton { color : <?php echo get_theme_mod('jeg_pl_active_filter_color') ?> }
<?php } if(get_theme_mod('jeg_pl_active_filter_bg')) { ?>
	 .filterfloat.active .filterfloatbutton { background-color : <?php echo get_theme_mod('jeg_pl_active_filter_bg') ?> }
<?php } if(get_theme_mod('jeg_pl_filter_drop_color')) { ?>
	 .filterfloatlist li { color : <?php echo get_theme_mod('jeg_pl_filter_drop_color') ?> }
<?php } if(get_theme_mod('jeg_pl_filter_drop_hover_color')) { ?>
	 .filterfloatlist li:hover, .filterfloatlist li.active { color : <?php echo get_theme_mod('jeg_pl_filter_drop_hover_color') ?> }
<?php } if(get_theme_mod('jeg_pl_filter_drop_bg')) { ?>
	 .filterfloatlist, .filterfloatlist ul { background-color : <?php echo get_theme_mod('jeg_pl_filter_drop_bg') ?> }
<?php } ?>


<?php if(get_theme_mod('jeg_pl_pin_border_color')) { ?>
	.pinterestportfolio .portfolioitem a { border-color : <?php echo get_theme_mod('jeg_pl_pin_border_color') ?> }
<?php } if(get_theme_mod('jeg_pl_pin_background')) { ?>
	 .pinterestportfolio .portfolioitem .mask { background-color : <?php echo get_theme_mod('jeg_pl_pin_background') ?> }
<?php } if(get_theme_mod('jeg_pl_pin_title') ) { ?>
	 .pinterestportfolio .portfolioitem .mask .info h2 { color : <?php echo get_theme_mod('jeg_pl_pin_title') ?> }
<?php } if(get_theme_mod('jeg_pl_pin_border')) { ?>
	 .pinterestportfolio .portfolioitem .mask .info span { background-color : <?php echo get_theme_mod('jeg_pl_pin_border') ?> }
<?php } if(get_theme_mod('jeg_pl_pin_alt')) { ?>
	 .pinterestportfolio .portfolioitem .mask .info p { color : <?php echo get_theme_mod('jeg_pl_pin_alt') ?> }
<?php } ?>

<?php if(get_theme_mod('jeg_pl_page_bg')) { ?>
	.portfoliopagingwrapper { background-color : <?php echo get_theme_mod('jeg_pl_page_bg') ?> }
<?php } if(get_theme_mod('jeg_pl_page_text')) { ?>
	 .pagetext { color : <?php echo get_theme_mod('jeg_pl_page_text') ?> }
<?php } if(get_theme_mod('jeg_pl_page_dot') ) { ?>
	 .pagedot li span { background-color : <?php echo get_theme_mod('jeg_pl_page_dot') ?> }
<?php } if(get_theme_mod('jeg_pl_page_dot_active')) { ?>
	 .pagedot li.active span { background-color : <?php echo get_theme_mod('jeg_pl_page_dot_active') ?> }
<?php } if(get_theme_mod('jeg_pl_page_line')) { ?>
	 .pagetext, .pagedot { border-color : <?php echo get_theme_mod('jeg_pl_page_line') ?> }
<?php } ?>

<?php
/** loading ajax image ***/
?>

<?php if(get_theme_mod('general_color')) { ?>
	body { color : <?php echo get_theme_mod('general_color') ?> }
<?php } if(get_theme_mod('general_heading_color')) { ?>
	 h1 , h2 , h3 , h4 , h5 , h6 { color : <?php echo get_theme_mod('general_heading_color') ?> }
<?php } if(get_theme_mod('general_link_color') ) { ?>
	 a, .jkreativ .jkreativ-woocommerce .star-rating span:after, .replycomment, .closecommentform, .slide-dot.selected { color : <?php echo get_theme_mod('general_link_color') ?> }
<?php } if(get_theme_mod('general_hover_link_color') ) { ?>
	 a:hover { color : <?php echo get_theme_mod('general_hover_link_color') ?> }
<?php } ?>


<?php
/** general option **/
?>

<?php
	if(get_theme_mod('ajax_loading_big')) {
		$ajax_loading_big = get_theme_mod('ajax_loading_big');
		if(ctype_digit($ajax_loading_big) || is_int($ajax_loading_big)) {
			$ajax_loading_big = wp_get_attachment_image_src($ajax_loading_big, "full");
			$ajax_loading_big = $ajax_loading_big[0];
		}
?>
	.bigloader, .portfolio-content-holder, .article-slider-wrapper.loading, .mapoverlay:after, div.ps-carousel-item-loading, .mejs-overlay-loading span { background-image : url("<?php echo $ajax_loading_big ?>"); }
<?php
	}
?>

<?php
	if(get_theme_mod('ajax_loading_small')) {
		$ajax_loading_small = get_theme_mod('ajax_loading_small');
		if(ctype_digit($ajax_loading_small) || is_int($ajax_loading_small)) {
			$ajax_loading_small = wp_get_attachment_image_src($ajax_loading_small, "full");
			$ajax_loading_small = $ajax_loading_small[0];
		}
?>
	 .galleryloaderinner, div.ps-carousel-item-loading { background-image : url("<?php echo $ajax_loading_small ?>"); }
<?php
	}
?>

<?php
	if(get_theme_mod('ajax_loading_horizontal') ) {
		$ajax_loading_horizontal = get_theme_mod('ajax_loading_horizontal');
		if(ctype_digit($ajax_loading_horizontal) || is_int($ajax_loading_horizontal)) {
			$ajax_loading_horizontal = wp_get_attachment_image_src($ajax_loading_horizontal, "full");
			$ajax_loading_horizontal = $ajax_loading_horizontal[0];
		}
?>
	 .galleryloaderinner { background-image : url("<?php echo $ajax_loading_horizontal ?>"); }
<?php
	}
?>

<?php
/** linear loader **/
?>

<?php if(get_theme_mod('linear_color')) { ?>
#nprogress .bar {
	background: <?php echo get_theme_mod('linear_color') ?>;
}

#nprogress .peg {
	box-shadow: 0 0 10px <?php echo get_theme_mod('linear_color') ?>, 0 0 5px <?php echo get_theme_mod('linear_color') ?>;
}

#nprogress .spinner-icon {
	border-top-color: <?php echo get_theme_mod('linear_color') ?>;
  	border-left-color: <?php echo get_theme_mod('linear_color') ?>;
}

#loading .line {
    background: <?php echo get_theme_mod('linear_color') ?>;
}
<?php } ?>

<?php if(get_theme_mod('loader_background')) { ?>
#loading .loadingwrapper { background-color : <?php echo get_theme_mod('loader_background') ?> }
#loading { background-color : <?php echo get_theme_mod('loader_background') ?> }
<?php } if(get_theme_mod('linear_text_color')) { ?>
#loading .percentage span { color : <?php echo get_theme_mod('linear_text_color') ?> }
<?php } ?>

<?php
/*** navigation height and mode ***/
?>

<?php
	$navobj = jeg_get_navigation_setup();

	if($navobj['navpos'] == 'top' || $navobj['navpos'] == 'transparent') {
		$navheight = get_theme_mod('jeg_top_nav_height', 60);
		if(!$navobj['navtoptwoline']) {
?>

/* one line top menu*/
.topsearchwrapper, .horizontalnav .contentheaderspace, .horizontalnav .topnavigation, .navcontent li, .topnavigationsearch {
	height: <?php echo $navheight; ?>px;
}

.topsearchwrapper .closesearch, .horizontalnav .contentheaderspace, .horizontalnav .topnavigation, .navcontent > ul > li, .topnavigationsearch {
	line-height: <?php echo $navheight + 2; ?>px;
}

.topnavigation .footsocial, .topnavigation .topnavigationwoo, .topsearchwrapper input, .horizontalnav .langwrapper, .horizontalnav .langwrapper ul li {
	line-height: <?php echo $navheight; ?>px;
	height: <?php echo $navheight; ?>px;
}

.horizontalnav .portfolioholderwrap {
	margin-top: <?php echo $navheight; ?>px;
}

.horizontalnav .filterfloat, .horizontalnav .portfolionavbar {
	top: <?php echo $navheight; ?>px;
}

.horizontalnav .fs-container {
	margin-top: <?php echo $navheight; ?>px;
}

.horizontalnav .blog-normal-wrapper {
	padding-top: <?php echo $navheight; ?>px;
}

.landing-bottom-space {
	height : <?php echo $navheight ?>px;
}

.topnavigation #mega_main_menu > .menu_holder > .menu_inner > ul > li {
	line-height: <?php echo $navheight ?>px;
}

.topnavigation #mega_main_menu.top_navigation > .menu_holder > .menu_inner > .nav_logo > .logo_link,
.topnavigation #mega_main_menu.top_navigation > .menu_holder > .menu_inner > .nav_logo > .mobile_toggle,
.topnavigation #mega_main_menu.top_navigation > .menu_holder > .menu_inner > ul > li > .item_link,
.topnavigation #mega_main_menu.top_navigation > .menu_holder > .menu_inner > ul > li > .item_link > span,
.topnavigation #mega_main_menu.top_navigation > .menu_holder > .menu_inner > ul > li.nav_search_box,
.topnavigation #mega_main_menu.top_navigation.icons-left > .menu_holder > .menu_inner > ul > li > .item_link > i,
.topnavigation #mega_main_menu.top_navigation.icons-right > .menu_holder > .menu_inner > ul > li > .item_link > i,
.topnavigation #mega_main_menu.top_navigation.icons-top > .menu_holder > .menu_inner > ul > li > .item_link.disable_icon > span,
.topnavigation #mega_main_menu.top_navigation.icons-top > .menu_holder > .menu_inner > ul > li > .item_link.menu_item_without_text > i {
	line-height: <?php echo $navheight ?>px;
	height: <?php echo $navheight ?>px;
}

<?php
		} else {
			$additionalheight = 40;
			$toptotal = $navheight + $additionalheight;
?>

/* two line top menu */

.topwrapperbottom {
  	height: <?php echo $navheight ?>px;
}

.topwrapperabove, .topnavigation .topnavigationwoo {
  	height: <?php echo $additionalheight ?>px;
  	line-height: <?php echo $additionalheight ?>px;
}

.horizontalnav .contentheaderspace, .horizontalnav .topnavigation  {
	height : <?php echo $toptotal + 1; ?>px;
	line-height: <?php echo $toptotal + 1; ?>px;
}

.topnavigation .logo {
	line-height: <?php echo $navheight; ?>px;
}

.navcontent > ul > li, .topsearchwrapper, .topsearchwrapper .closesearch, .topnavigationsearch, .topsearchwrapper input {
	line-height: <?php echo $navheight; ?>px;
	height: <?php echo $navheight; ?>px
}

.topnavigation .footsocial {
	height: <?php echo $additionalheight ?>px;
	line-height: <?php echo $additionalheight ?>px;
	padding-right: 10px;
}

.topnavmsg {
  	line-height: <?php echo $additionalheight ?>px;
}

.horizontalnav .portfolioholderwrap {
	margin-top: <?php echo $toptotal; ?>px;
}

.horizontalnav .filterfloat, .horizontalnav .portfolionavbar {
	top: <?php echo $toptotal; ?>px;
}

.horizontalnav .fs-container {
	margin-top: <?php echo $toptotal + 1; ?>px;
}

.horizontalnav .blog-normal-wrapper {
	padding-top: <?php echo $toptotal + 1; ?>px;
}

.landing-bottom-space {
	height : <?php echo $navheight ?>px;
}

.topnavigation #mega_main_menu > .menu_holder > .menu_inner > ul > li {
	line-height: <?php echo $navheight ?>px;
}

.topnavigation #mega_main_menu.top_navigation > .menu_holder > .menu_inner > .nav_logo > .logo_link,
.topnavigation #mega_main_menu.top_navigation > .menu_holder > .menu_inner > .nav_logo > .mobile_toggle,
.topnavigation #mega_main_menu.top_navigation > .menu_holder > .menu_inner > ul > li > .item_link,
.topnavigation #mega_main_menu.top_navigation > .menu_holder > .menu_inner > ul > li > .item_link > span,
.topnavigation #mega_main_menu.top_navigation > .menu_holder > .menu_inner > ul > li.nav_search_box,
.topnavigation #mega_main_menu.top_navigation.icons-left > .menu_holder > .menu_inner > ul > li > .item_link > i,
.topnavigation #mega_main_menu.top_navigation.icons-right > .menu_holder > .menu_inner > ul > li > .item_link > i,
.topnavigation #mega_main_menu.top_navigation.icons-top > .menu_holder > .menu_inner > ul > li > .item_link.disable_icon > span,
.topnavigation #mega_main_menu.top_navigation.icons-top > .menu_holder > .menu_inner > ul > li > .item_link.menu_item_without_text > i {
	line-height: <?php echo $navheight ?>px;
	height: <?php echo $navheight ?>px;
}

<?php
		}

        if($navobj['navtopsmaller']) {
?>

.landing-bottom-space {
    height: 50px;
}

<?php
        }

	}
?>

/** font setup **/

<?php
	// first font
	$firstfont = get_theme_mod('first_font');
    if(jeg_check_use_font_uploader('additional_font_1')){
        $firstfont = vp_option('joption.additional_font_1_fontname');
    }

	if(!empty($firstfont)) {
?>
body,
.mainnav li a h2,
.footcopy,
.slider-button .button-text,
.jnpslider .slider-alternate,
.mainnav .childmenu h2 {
	font-family : "<?php echo $firstfont ?>";
}
<?php
	}
	// second font
	$secondfont = get_theme_mod('second_font');
    if(jeg_check_use_font_uploader('additional_font_2')){
        $secondfont = vp_option('joption.additional_font_2_fontname');
    }

	if(!empty($secondfont)) {
?>
h1 , h2 , h3 , h4 , h5 , h6,
.portfolioitem .info h2,
.productitem .pinfo h2,
.productitem .price > span.amount,
.jkreativ table.shop_table th,
.jkreativ .totals_table,
.blog-normal-article .readmore,
.blog-sidebar-title h3,
.highlight,
.jnpslider h2,
.item .text1, .item .text3,
.iosSlider .slider .item .text1, .iosSlider .slider .item .text2, .iosSlider .slider .item .text3,
.kenburntextcontent.item .text1, .kenburntextcontent.item .text2, .kenburntextcontent.item .text3,
.section-blog-list .note-title {
	font-family : "<?php echo $secondfont ?>";
}
<?php
	}
	// third font
	$thirdfont = get_theme_mod('third_font');
    if(jeg_check_use_font_uploader('additional_font_3')){
        $thirdfont = vp_option('joption.additional_font_3_fontname');
    }

	if(!empty($thirdfont)) {
?>
.mainnav .childmenu .childmenu h2,
.additionalblock p,
.filterfloatbutton,
.filterfloatlist h3,
.blogfilter h3,
.portfoliofilterbutton, .blogfilterbutton,
.portfolio-date,
.portfolio-meta-desc,
.portfolio-link > span, .portfolio-single-nav > span,
.portfolioitem .info p,
.productitem .pinfo > small,
.jkreativ .jkreativ-woocommerce .article-header > span,
.clean-blog-wrapper .article-header h2, .article-header h1,
.jnpslider .amp,
.item .text2,
.creditcontainer .top,
.slidewrapper .item em,
.blog-normal-article .article-quote-wrapper quote,
.clean-blog-article .article-quote-wrapper quote,
.article-sidebar .article-category,
.notfoundtext,
.dropcaps,
blockquote p,
.testimonialblock p,
.imageholderdesc,
.contactheading,
.teammeta > span,
.pricing-table .price > em,
.price-heading span,
.landingmasonryitem .info p,
section quote,
.sectioncontainer .serviceitem h3, .kenburntextcontent em,
.section-header > em,
.iosSlider em,
.sl-slider em,
div.ps-caption-content,
.topnavmsg,
.headermenu .searchcontent input,
.counterblock .title,
#leftsidebar .footlink li a,
.article-quote-wrapper quote span,
.slider-header em, em, em > *, i, i > * ,
.item .text2,
.footcopy,
.section-blog-list .note-author, .section-blog-list .note-readmore,
#leftsidebar .langwrapper {
	font-family : "<?php echo $thirdfont ?>";
}
<?php
	}
?>

/*** additional css ***/
<?php echo vp_option('joption.styleeditor'); ?>