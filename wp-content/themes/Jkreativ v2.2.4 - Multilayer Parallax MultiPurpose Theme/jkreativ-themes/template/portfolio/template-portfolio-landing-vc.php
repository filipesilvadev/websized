<?php
get_header();


if ( ! post_password_required() )
{
    global $post;
    ?>
    <div class="headermenu">
        <?php jeg_get_template_part('template/rightheader'); ?>
    </div> <!-- headermenu -->

    <div class="landingpagewrapper">
        <div class="contentheaderspace"></div>
        <div class="post-header clearfix">
            <div class="sectioncontainer">
                <div class="post-header-inner">
                    <div class="post-title">
                        <h1><?php the_title() ?></h1>
                    </div>

                    <?php
                    $filter = isset($_REQUEST['filter']) ? $_REQUEST['filter'] : "";

                    $currentparentid = get_post_meta($post->ID, 'portfolio_parent', true);

                    $prevlink = jeg_next_prev_portfolio($currentparentid, $post->ID, 'prev', $filter);
                    $prevpagelink = get_page_link($prevlink);
                    if($filter !== '') $prevpagelink .= "?filter=" . $filter ;

                    $nextlink = jeg_next_prev_portfolio($currentparentid, $post->ID, 'next', $filter);
                    $nextpagelink = get_page_link($nextlink);
                    if($filter !== '') $nextpagelink .= "?filter=" . $filter ;
                    ?>
                    <div class="post-nav ppopup clearfix">

                        <div class="post-nav-list">
                            <a href="<?php echo get_page_link( $currentparentid ) ?>"><i class="fa fa-bars"></i></a>
                            <div class="portfoliopopup ppopup-left">
                                <div class="popuparrow"></div>
                                <div class="popuptext"><?php echo vp_metabox('jkreativ_portfolio_list_option.filtertitle', 'Portfolio List', $currentparentid); ?></div>
                            </div>
                        </div>

                        <div class="post-nav-controls">
                            <?php if (!empty( $prevlink ) && $prevlink != $post->ID): ?>
                                <div class="prev-link">
                                    <a href="<?php echo $prevpagelink; ?>"><i class="fa fa-angle-left"></i></a>
                                    <div class="portfoliopopup">
                                        <div class="popuparrow"></div>
                                        <div class="popuptext"><?php _e('Previous: ', 'jeg_textdomain'); echo get_the_title( $prevlink ) ?></div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty( $nextlink ) && $prevlink != $post->ID): ?>
                                <div class="next-link">
                                    <a href="<?php echo $nextpagelink; ?>"><i class="fa fa-angle-right"></i></a>
                                    <div class="portfoliopopup">
                                        <div class="popuparrow"></div>
                                        <div class="popuptext"><?php _e('Next: ', 'jeg_textdomain'); echo get_the_title( $nextlink ) ?></div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        /******
         * build heading page
         **/
        $headingtype = vp_metabox('jkreativ_portfolio_landing_vc.heading_type');
        switch ($headingtype) {
            case 'slider':
                $sliderid = vp_metabox('jkreativ_portfolio_landing_vc.heading_slider');
                $slidertype = vp_metabox('jkreativ_slider_setting.slider_type', null, $sliderid);

                if($slidertype == 'fulltextslider') {
                    jeg_get_template_part('template/landing/section-heading-slider-fulltext');
                } else if ($slidertype == 'splitslider') {
                    jeg_get_template_part('template/landing/section-heading-slider-split');
                } else if($slidertype == 'parallaxslider') {
                    jeg_get_template_part('template/landing/section-heading-parallax-slider');
                }
                break;
            case 'parallaxheading':

                $uselight        = ( vp_metabox('jkreativ_portfolio_landing_vc.heading_normal.0.light_heading') == 1 ) ? 'light' : '';
                $coverbg         = ( vp_metabox('jkreativ_portfolio_landing_vc.heading_normal.0.cover_parallax_background') == '1' ) ? 'cover' : 'auto' ;
                $backgroundimage = jeg_get_image_attachment ( vp_metabox('jkreativ_portfolio_landing_vc.heading_normal.0.heading_background') );
                $overlaybgimage  = "<div class='parallaxoverlay' style='background-color: " . vp_metabox('jkreativ_portfolio_landing_vc.heading_normal.0.overlay_color') . ";'></div>";
                ?>

                <section class="nomargin nopadding headingparallax <?php echo $uselight ?>">
                    <div class="bgholder">
                        <div class="bgitem" style="background-image: url('<?php echo $backgroundimage ?>'); background-size: <?php echo $coverbg ?>"></div>
                    </div>
                    <?php echo $overlaybgimage ?>
                    <div class="sectioncontainer sectionheading parallaxtext">
                        <div class="span6">
                            <h2><?php echo vp_metabox('jkreativ_portfolio_landing_vc.heading_normal.0.first_text_heading'); ?></h2>
                            <span><?php echo vp_metabox('jkreativ_portfolio_landing_vc.heading_normal.0.second_text_heading'); ?></span>
                        </div>
                    </div>
                </section>

                <?php
                break;
            case 'shortcode':
                echo  "<section class='nomargin nopadding'>" . apply_filters('the_content', vp_metabox('jkreativ_portfolio_landing_vc.heading_shortcode')) . "</section>";
                break;
            case 'noheading':
            default:
                break;
        }

        /******
         * build section page
         **/
        the_post();
        the_content();
        ?>


        <?php if(vp_option('joption.enable_footer_landing')) : ?>
            <div class="section-footer">
                <div class="landing-footer">
                    <div class="sectioncontainer">
                        <?php
                        jeg_get_template_part('template/landing-footer');
                        ?>
                    </div>
                </div>
                <div class="landing-btm-footer">
                    <div class="sectioncontainer">
                        <div class="landing-footer-copyright">
                            <?php echo vp_option('joption.website_copyright', '&copy; Jegtheme 2013. All Rights Reserved.'); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>


    <?php  if(vp_metabox('jkreativ_portfolio_landing_vc.enable_landingnav', '1') === '1') : ?>
    <div class="landing-navigator <?php echo vp_metabox('jkreativ_portfolio_landing_vc.landingnav_type', 'default') ?>">
        <ul>
            <?php
            global $sectionnavigator;
            foreach($sectionnavigator as $secid => $section) {
                if(!empty($section['section_name'])) {
                    ?>
                    <li data-for="<?php echo jeg_to_slug($section['section_id']) ?>" data-title="<?php echo $section['section_name'] ?>">
                        <div class="navigator-block-fill"></div>
                    </li>
                <?php
                }
            }
            ?>
        </ul>
    </div>
    <?php endif; ?>


    <script>
	(function($) {
		$(document).ready(function() {
			$(".landingpagewrapper").jnormalblog();
			$(".landingpagewrapper").jlanding();
		});
	})(jQuery);
</script>

<?php
} else {
    jeg_get_template_part('template/password-form');
}

get_footer();
?>