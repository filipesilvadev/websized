<?php
/**
Template Name: Landing Page Builder - Visual Composer
 */

get_header();

if ( ! post_password_required() )
{

    $navobj = jeg_get_navigation_setup();
    $bottomnav = 0;
    $bottomnavclass = '';
    if(vp_metabox('jkreativ_page_landing_vc.bottom_menu', 0) == 1 && $navobj['navpos'] === 'top') {
        $bottomnav = 1;
        $bottomnavclass = 'bottomnav';
    }
?>

<div class="headermenu">
    <?php jeg_get_template_part('template/rightheader'); ?>
</div> <!-- headermenu -->

<div class="landingpagewrapper <?php echo $bottomnavclass; ?>">
    <div class="contentheaderspace"></div>

    <?php
    /******
     * build heading page
     **/
    $headingtype = vp_metabox('jkreativ_page_landing_vc.heading_type');
    switch ($headingtype) {
        case 'slider':
            $sliderid = vp_metabox('jkreativ_page_landing_vc.heading_slider');
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
            $uselight        = ( vp_metabox('jkreativ_page_landing_vc.heading_normal.0.light_heading') == 1 ) ? 'light' : '';
            $coverbg         = ( vp_metabox('jkreativ_page_landing_vc.heading_normal.0.cover_parallax_background') == '1' ) ? 'cover' : 'auto' ;
            $backgroundimage = jeg_get_image_attachment ( vp_metabox('jkreativ_page_landing_vc.heading_normal.0.heading_background') );
            $overlaybgimage  = "<div class='parallaxoverlay' style='background-color: " . vp_metabox('jkreativ_page_landing_vc.heading_normal.0.overlay_color') . ";'></div>";
            ?>

            <section class="nomargin nopadding headingparallax <?php echo $uselight ?>">
                <div class="bgholder">
                    <div class="bgitem" style="background-image: url('<?php echo $backgroundimage ?>'); background-size: <?php echo $coverbg ?>"></div>
                </div>
                <?php echo $overlaybgimage ?>
                <div class="sectioncontainer sectionheading parallaxtext">
                    <div class="span6">
                        <h2><?php echo vp_metabox('jkreativ_page_landing_vc.heading_normal.0.first_text_heading'); ?></h2>
                        <span><?php echo vp_metabox('jkreativ_page_landing_vc.heading_normal.0.second_text_heading'); ?></span>
                    </div>
                </div>
            </section>

            <?php
            break;
        case 'shortcode':
            $fscontainer = !vp_metabox('jkreativ_page_landing_vc.heading_shortcode_fullscreen') ? '' : 'fs-container ';
            echo  "<section id='slidershortcode' class='". $fscontainer ."nomargin nopadding'>" . vp_metabox('jkreativ_page_landing_vc.heading_shortcode') . "</section>";
            break;
        case 'noheading':
        default:
            break;
    }
    ?>

    <?php
    if(vp_metabox('jkreativ_page_landing_vc.bottom_menu', 0) == 1 && $navobj['navpos'] === 'top') {
        echo "<div class='landing-bottom-nav'><div class='landing-bottom-space'></div>";
        jeg_get_template_part('template/navigation', 'top');
        echo "</div>";
    }
    ?>

    <?php
        the_post();
        the_content();
    ?>


    <?php if(vp_option('joption.enable_footer_landing') && !vp_metabox('jkreativ_page_landing_vc.disable_landing_footer')) : ?>
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

<?php  if(vp_metabox('jkreativ_page_landing_vc.enable_landingnav', '1') === '1') : ?>
<div class="landing-navigator <?php echo vp_metabox('jkreativ_page_landing_vc.landingnav_type', 'default') ?>">
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