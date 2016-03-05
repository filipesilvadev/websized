<?php
	global $woocommerce;
	$navobj = jeg_get_navigation_setup();
?>

<div class="navigation-flag"></div>
<div class="topnavigation">

	<?php if($navobj['navtoptwoline']) { ?>
	<div class="twolinetop">
		<div class="<?php echo ( $navobj['navtopcenter'] ) ? "navigationcontainer" : ""; ?>">
			<div class="topnavmsg"> <?php echo get_theme_mod('jeg_top_sec_tagline', ''); ?> </div>
			<div class="topwrapperabove">
				<?php
                    jeg_get_template_part('template/navigation-top', 'social');
                    jeg_get_template_part('template/navigation-top', 'wpml');
                    jeg_get_template_part('template/navigation-top', 'woo');
				?>
			</div>
		</div>
	</div>
	<?php } ?>

	<div class="topwrapper <?php echo ( $navobj['navtopcenter'] ) ? "navigationcontainer" : ""; ?>">
		<div class="topwrapperbottom">

			<?php
				$topnavlogo = get_theme_mod('jeg_top_nav_logo', get_template_directory_uri() . '/public/img/logo.png');
				if(ctype_digit($topnavlogo) || is_int($topnavlogo)) {
					$topnavlogo = wp_get_attachment_image_src($topnavlogo, "full");
					$topnavlogo = $topnavlogo[0];
				}

				$topnavlogoretina = get_theme_mod('jeg_top_nav_logo_retina', get_template_directory_uri() . '/public/img/logo.png');
				if(ctype_digit($topnavlogoretina) || is_int($topnavlogoretina)) {
					$topnavlogoretina = wp_get_attachment_image_src($topnavlogoretina, "full");
					$topnavlogoretina = $topnavlogoretina[0];
				}

				if(empty($topnavlogoretina)) {
					$topnavlogoretina = $topnavlogo;
				}

				$topnavlogoimagesize = jeg_get_image_meta($topnavlogo);
				$topnavlogoimagesize = "width : {$topnavlogoimagesize['width']}px; height: {$topnavlogoimagesize['height']}px;";
			?>
			<div class="logo" style="padding-left: <?php echo get_theme_mod('jeg_top_nav_left_position', 20); ?>px;">
				<a href="<?php echo home_url();?>">
					<img style="margin-top: <?php echo get_theme_mod('jeg_top_nav_top_position', 15); ?>px; <?php echo $topnavlogoimagesize; ?>" data-at2x="<?php echo $topnavlogoretina; ?>" src="<?php echo $topnavlogo; ?>" alt="<?php bloginfo('name'); echo " "; bloginfo('description'); ?>"/>
				</a>
			</div>

			<?php
				if(!$navobj['navtoptwoline']) {
                    jeg_get_template_part('template/navigation-top', 'social');
                    jeg_get_template_part('template/navigation-top', 'wpml');
                    jeg_get_template_part('template/navigation-top', 'woo');
				}
			?>

			<div class="topnavigationsearch">
				<i class="fa fa-search"></i>

                <?php if($navobj['navpos'] === 'transparent') { ?>
                <div class="abs-search">
                    <?php get_search_form(); ?>
                </div>
                <?php } ?>

			</div>
            <?php jeg_get_template_part('template/navigation-top', 'menu'); ?>

            <?php if($navobj['navpos'] === 'top') { ?>
			<div class="topsearchwrapper">
				<?php get_search_form(); ?>
				<div class="closesearch">
					<i class="fa fa-times"></i>
				</div>
			</div>
            <?php } ?>

		</div>
	</div>

</div>
