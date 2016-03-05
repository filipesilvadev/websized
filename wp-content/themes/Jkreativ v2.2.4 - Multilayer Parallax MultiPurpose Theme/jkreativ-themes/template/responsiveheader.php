<div class="responsiveheader">
	<div class="navleft mobile-menu-trigger" data-role="main-mobile-menu">
		<div class="navleftinner">
			<div class="navleftwrapper"><span class="iconlist"></span></div>
		</div>
	</div>
	<?php
		$mobilenavnormal  = get_theme_mod('mobile_nav_logo_image', get_template_directory_uri() . '/public/img/logo.png');
		if(ctype_digit($mobilenavnormal) || is_int($mobilenavnormal)) {
			$mobilenavnormal = wp_get_attachment_image_src($mobilenavnormal, "full");
			$mobilenavnormal = $mobilenavnormal[0];
		}

		$mobilenavlogoretina = get_theme_mod('mobile_nav_logo_image_retina', get_template_directory_uri() . '/public/img/logo@2x.png');
		if(ctype_digit($mobilenavlogoretina) || is_int($mobilenavlogoretina)) {
			$mobilenavlogoretina = wp_get_attachment_image_src($mobilenavlogoretina, "full");
			$mobilenavlogoretina = $mobilenavlogoretina[0];
		}


		if(empty($mobilenavlogoretina)) {
			$mobilenavlogoretina = $mobilenavnormal;
		}

		$mobilenavlogoimagesize = '';
		$mobilenavlogo = vp_option('joption.mobile_nav_logo_image');
		if(!empty($mobilenavnormal)&& !empty($mobilenavlogo)) {
			$mobilenavlogoimagesize = getimagesize($mobilenavlogo);
			$mobilenavlogoimagesize = "width : {$mobilenavlogoimagesize[0]}px; height: {$mobilenavlogoimagesize[1]}px;";
		}
	?>
	<div class="logo">
		<a href="<?php echo home_url();?>">
			<img style="<?php echo $mobilenavlogoimagesize; ?>" data-at2x="<?php echo $mobilenavlogoretina; ?>" src="<?php echo $mobilenavnormal; ?>" alt="<?php bloginfo('name'); echo " "; bloginfo('description'); ?>"/>
		</a>
	</div>
	<div class="navright mobile-search-trigger">
		<div class="navrightinner">
			<div class="navrightwrapper"><span class="iconlist"></span></div>
		</div>
	</div>

	<div class="mobilesearch">
		<?php get_search_form(); ?>
		<div class="closemobilesearch">
			<span class="fa fa-times"></span>
		</div>
	</div>
</div>
<div class="responsiveheader-wrapper"></div>