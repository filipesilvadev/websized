<div id="leftsidebar">
	<div class="lefttop">
		<?php
			$sidenavlogonormal = get_theme_mod('side_nav_logo_image', get_template_directory_uri() . '/public/img/logo.png');
			if(ctype_digit($sidenavlogonormal) || is_int($sidenavlogonormal)) {
				$sidenavlogonormal = wp_get_attachment_image_src($sidenavlogonormal, "full");
				$sidenavlogonormal = $sidenavlogonormal[0];
			}

			$sidenavlogoretina = get_theme_mod('side_nav_logo_retina', get_template_directory_uri() . '/public/img/logo@2x.png');
			if(ctype_digit($sidenavlogoretina) || is_int($sidenavlogoretina)) {
				$sidenavlogoretina = wp_get_attachment_image_src($sidenavlogoretina, "full");
				$sidenavlogoretina = $sidenavlogoretina[0];
			}

			if(empty($sidenavlogoretina)) {
				$sidenavlogoretina = $sidenavlogonormal;
			}

			if(!empty($sidenavlogonormal)) {
				$sidenavlogoimagesize = jeg_get_image_meta($sidenavlogonormal);
				$sidenavlogoimagesize = "width : {$sidenavlogoimagesize['width']}px; height: {$sidenavlogoimagesize['height']}px;";
			}

		?>
		<div class="logo" style="padding-top: <?php echo get_theme_mod('side_nav_top_padding', 30); ?>px; padding-bottom: <?php echo get_theme_mod('side_nav_bottom_padding', 30); ?>px;">
			<a href="<?php echo home_url();?>">
				<img style="<?php echo $sidenavlogoimagesize; ?>" data-at2x="<?php echo $sidenavlogoretina; ?>" src="<?php echo $sidenavlogonormal; ?>" alt="<?php bloginfo('name'); echo " "; bloginfo('description'); ?>"/>
			</a>
		</div>
		<?php
			jeg_main_side_navigation();
			dynamic_sidebar(JEG_NAVI_WIDGET);
		?>
	</div>

	<div class="leftfooter">
		<div class="leftfooterwrapper">
			<?php jeg_side_bottom_navigation(); ?>

            <?php jeg_get_template_part('template/navigation-top', 'wpml'); ?>

			<?php jeg_get_template_part('template/navigation-top', 'social');  ?>
			<div class="footcopy">
				<?php echo vp_option('joption.website_copyright', '&copy; Jegtheme 2013. All Rights Reserved.'); ?>
			</div>
		</div>
	</div>

	<div class="csbwrapper">
		<div class="cbsheader">
			<div class="csbhicon"></div>
		</div>
		<div class="csbfooter">
			<?php echo jeg_social_icon(false); ?>
		</div>
	</div>

</div>