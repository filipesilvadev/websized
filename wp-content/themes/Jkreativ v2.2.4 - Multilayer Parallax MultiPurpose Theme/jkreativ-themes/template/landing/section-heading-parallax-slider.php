<?php
    $sliderid = jeg_get_slider_id();
	
	$fullsize 			= ( vp_metabox('jkreativ_slider_parallaxslider.ps_fullscreen', null, $sliderid) == '0') ? "fixsize" : "";
	$overlaybackground 	= vp_metabox('jkreativ_slider_parallaxslider.overlay_background', null, $sliderid);
	$ps 				= vp_metabox('jkreativ_slider_parallaxslider.ps', null, $sliderid);	
?>
<div class="parallaxslider">
	<div class="sliderContainer <?php echo $fullsize ?>">
		<div class="jnpslider <?php echo $fullsize ?>" 
			data-autoplay="<?php echo vp_metabox('jkreativ_slider_parallaxslider.ps_autoplay', null, $sliderid) ?>" 
			data-timeout="<?php echo vp_metabox('jkreativ_slider_parallaxslider.ps_autoplay_delay', null, $sliderid) ?>">			
			
			<div class="bgslider-holder">
				<?php 
					foreach($ps as $pslider) {
						echo "<div class='bgslider' style='background-image : url(" . jeg_get_image_attachment($pslider['imgbg']) . ")'></div>";
					}
				?>
			</div>
			<div class="parallaxoverlay" style="z-index: 3;  background-color: <?php echo $overlaybackground; ?>;"></div>			
			<div class="text-holder">
				<?php 
					foreach($ps as $pslider) {						 
						if($pslider['ps_show_video']) {
							$pslider['textposition'] = '';
						}
				?>
					<div class="text-wrapper">
			 			<div class="container jcontainer <?php echo $pslider['textposition']; ?>">
			 				<div class="row-fluid">
			 					<?php 
			 						if($pslider['ps_show_video']) {
			 							 $imageposter = jeg_get_image_attachment($pslider['ps_video'][0]['ps_video_image']);
										 $poster = jeg_image_resizer($imageposter, 1200, 900);
			 					?>			 									 					
									<div class="slider-video span6 ">
										
										<?php if($pslider['ps_video'][0]['ps_video_type'] === 'youtube') { ?>
											
										<a class="imggalitem jvideo" data-video-type="<?php echo $pslider['ps_video'][0]['ps_video_type'] ?>" href="<?php echo $pslider['ps_video'][0]['ps_video_youtube'] ?>">
											<img src='<?php echo $poster; ?>' alt=''>
											<div class='videooverlay'></div>
										</a>
										
										<?php } else if($pslider['ps_video'][0]['ps_video_type'] === 'vimeo') { ?>
											
										<a class="imggalitem jvideo" data-video-type='<?php echo $pslider['ps_video'][0]['ps_video_type'] ?>' href='<?php echo $pslider['ps_video'][0]['ps_video_vimeo'] ?>'>
											<img src='<?php echo $poster; ?>' alt=''>
											<div class='videooverlay'></div>
										</a>
										
										<?php  } else if($pslider['ps_video'][0]['ps_video_type'] === 'html5video') {
												 
											$uniqueid = uniqid();
											$html5video = '';
											
											if($pslider['ps_video'][0]['ps_video_html'][0]['ps_video_html_mp4'] !== '') {
												$videomp4 = "<source type='video/mp4' src='{$pslider['ps_video'][0]['ps_video_html'][0]['ps_video_html_mp4']}' />";
											}
											
											if($pslider['ps_video'][0]['ps_video_html'][0]['ps_video_html_webm'] !== '') {
												$videowebm = "<source type='video/webm' src='{$pslider['ps_video'][0]['ps_video_html'][0]['ps_video_html_webm']}' />";
											}
									    	    	    	
											if($pslider['ps_video'][0]['ps_video_html'][0]['ps_video_html_ogg'] !== '') {
												$videoogg = "<source type='video/ogg' src='{$pslider['ps_video'][0]['ps_video_html'][0]['ps_video_html_ogg']}' />";
											}    	
									    	    	
									    	$html5video = 
									    	"<video id='player' poster='{$poster}' controls='controls' preload='none'>
												{$videomp4} 
												{$videowebm} 
												{$videoogg} 						
												<object width='100%' height='100%' type='application/x-shockwave-flash' data='" . get_template_directory_uri() . "/public/mediaelementjs/flashmediaelement.swf'> 
													<param name='movie' value='" . get_template_directory_uri() . "/public/mediaelementjs/flashmediaelement.swf' />
													<param name='flashvars' value='controls=true&amp;file={$pslider['ps_video'][0]['ps_video_html'][0]['ps_video_html_mp4']}' />
													<img src='{$poster}' alt='No video playback capabilities' title='No video playback capabilities' />
												</object>
											</video>";
										?>
										
										<a href="#html5popup" class="imggalitem jvideo" data-video-type='<?php echo $pslider['ps_video'][0]['ps_video_type'] ?>'>
											<img src='<?php echo $poster ?>' alt=''>
											<div class='videooverlay'></div>
										</a>
										<div id="html5popup" class='html5popup-wrapper mfp-hide'>
											<div class='mfp-html5video-scaler'>
												<?php echo $html5video ?>
											</div>
										</div>
										<?php } ?>
										
									</div>
									<div class="span6">
						 				<h2 class="slider-header"><span><?php echo do_shortcode($pslider['maintext']) ?> </span></h2>
						 				<p class="slider-alternate"><?php echo do_shortcode($pslider['alttext']) ?></p>
						 				<?php if($pslider['ps_show_button']) { ?>
				 						<a class="slider-button" href="<?php echo $pslider['ps_button'][0]['ps_button_url'] ?>">
											<span class="button-background"></span>
											<span class="button-text"><?php echo $pslider['ps_button'][0]['ps_button_wording'] ?></span>
										</a>
										<?php } ?>
																				
										<div class="additional-slider-video">
											<?php if($pslider['ps_video'][0]['ps_video_type'] === 'youtube') { ?>
											<a class="slider-button jvideo" data-video-type="<?php echo $pslider['ps_video'][0]['ps_video_type'] ?>" href="<?php echo $pslider['ps_video'][0]['ps_video_youtube'] ?>">
												<span class="button-background"></span>
												<span class="button-text"><?php _e("View Video", 'jeg_textdomain') ?></span>
											</a>
											<?php } else if($pslider['ps_video'][0]['ps_video_type'] === 'vimeo') { ?>
											<a class="slider-button jvideo" data-video-type="<?php echo $pslider['ps_video'][0]['ps_video_type'] ?>" href="<?php echo $pslider['ps_video'][0]['ps_video_vimeo'] ?>">
												<span class="button-background"></span>
												<span class="button-text"><?php _e("View Video", 'jeg_textdomain') ?></span>
											</a>
											<?php } else if($pslider['ps_video'][0]['ps_video_type'] === 'html5video') { ?>
											<a class="slider-button jvideo" href="#html5popup" data-video-type='<?php echo $pslider['ps_video'][0]['ps_video_type'] ?>'>
												<span class="button-background"></span>
												<span class="button-text"><?php _e("View Video", 'jeg_textdomain') ?></span>
											</a>
											<?php } ?>
										</div>
										
									</div>
			 					<?php } else { ?>			 						
			 						<div class="span12">
				 						<h2 class="slider-header"><span><?php echo do_shortcode($pslider['maintext']) ?> </span></h2>
				 						<p class="slider-alternate"><?php echo do_shortcode($pslider['alttext']) ?></p>
				 						<?php if($pslider['ps_show_button']) { ?>
				 						<a class="slider-button" href="<?php echo $pslider['ps_button'][0]['ps_button_url'] ?>">
											<span class="button-background"></span>
											<span class="button-text"><?php echo $pslider['ps_button'][0]['ps_button_wording'] ?></span>
										</a>
										<?php } ?>
				 					</div>
			 					<?php } ?>
			 				</div>				 				
			 			</div>			 			
					</div>
				<?php } ?>
				
				
				<?php if(sizeof($ps) > 1) { ?>
			 	<nav class="nav-arrows navigation" id="nav-arrows">
					<span class="nav-arrow-prev prev-slide"></span>
					<span class="nav-arrow-next next-slide"></span>
				</nav>
				<?php } ?>
				
			</div>			
		 	
		 	
			
			<nav class="nav-dots" id="nav-dots">
				<?php foreach($ps as $idx => $pslider) { ?>
				<span data-id="<?php echo $idx ?>" class=" <?php echo ($idx === 0) ? "nav-dot-current" : ""; ?>"></span>
				<?php } ?>				
			</nav>
		 	
		</div>
	</div>
</div>