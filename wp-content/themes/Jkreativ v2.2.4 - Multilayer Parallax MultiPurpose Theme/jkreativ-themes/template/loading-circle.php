<div id="loading" data-type="circle">
	<div class="relative" id="loader">
		<?php
			$circleloadernormal = get_theme_mod('circle_loader_image', get_template_directory_uri() . '/public/img/logo_loading.png');
			if(ctype_digit($circleloadernormal) || is_int($circleloadernormal)) {
				$circleloadernormal = wp_get_attachment_image_src($circleloadernormal, "full");
				$circleloadernormal = $circleloadernormal[0];
			}
			
			$circleloaderretina = get_theme_mod('circle_loader_retina', get_template_directory_uri() . '/public/img/logo_loading@2x.png');
			if(ctype_digit($circleloaderretina) || is_int($circleloaderretina)) {
				$circleloaderretina = wp_get_attachment_image_src($circleloaderretina, "full");
				$circleloaderretina = $circleloaderretina[0];
			}
			
			if(empty($circleloaderretina)) {
				$circleloaderretina = $circleloadernormal;
			}
		?>
		<div class="" id="imgLoading">
			<img style="width: 270px; height: 270px;" alt="" data-at2x="<?php echo $circleloaderretina; ?>" src="<?php echo $circleloadernormal; ?>">
		</div>
		<canvas height="276" width="400" id="canvas">
			<?php _e('Loading...', 'jeg_textdomain'); ?>
		</canvas>
	</div>
</div>		
<div id="loadingbg"><canvas id="mask"></canvas></div>