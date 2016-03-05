<?php
/**
Template Name: Landing Page Builder - Legacy Section Builder
 */

get_header();

if ( ! post_password_required() )
{

    $navobj = jeg_get_navigation_setup();
	$bottomnav = 0;
	$bottomnavclass = '';
	if(vp_metabox('jkreativ_page_landing.bottom_menu', 0) == 1 && $navobj['navpos'] === 'top') {
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
		$headingtype = vp_metabox('jkreativ_page_landing.heading_type');
		switch ($headingtype) {
			case 'slider':
				$sliderid = vp_metabox('jkreativ_page_landing.heading_slider');
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
                jeg_get_template_part('template/landing/section-heading-normal');
				break;
			case 'shortcode':
				$fscontainer = !vp_metabox('jkreativ_page_landing.heading_shortcode_fullscreen') ? '' : 'fs-container ';
				echo  "<section id='slidershortcode' class='". $fscontainer ."nomargin nopadding'>" . vp_metabox('jkreativ_page_landing.heading_shortcode') . "</section>";
				break;
			case 'noheading':
			default:
				break;
		}
	?>

	<?php
		if(vp_metabox('jkreativ_page_landing.bottom_menu', 0) == 1 && $navobj['navpos'] === 'top') {
			echo "<div class='landing-bottom-nav'><div class='landing-bottom-space'></div>";
            jeg_get_template_part('template/navigation', 'top');
			echo "</div>";
		}
	?>

	<?php
		/******
		 * build section page
		 **/
    jeg_get_template_part('template/landing/section-content-builder');
	?>

	<?php if(vp_option('joption.enable_footer_landing') && !vp_metabox('jkreativ_page_landing.disable_landing_footer')) : ?>
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
<?php
    if(vp_option('joption.enable_section_builder') && vp_metabox('jkreativ_page_landing.enable_landingnav', '1') === '1') :
?>
<div class="landing-navigator <?php echo vp_metabox('jkreativ_page_landing.landingnav_type', 'default') ?>">
    <ul>
        <?php
        	$sectionbuilder = vp_metabox('jkreativ_page_landing.sectionbuilder');
            foreach($sectionbuilder as $secid => $section) {
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
<?php
    endif;
?>

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