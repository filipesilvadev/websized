<?php
    global $is_IE;

    $sliderid = jeg_get_slider_id();

	$uselight 			= ( vp_metabox('jkreativ_slider_fulltext.use_light', null, $sliderid) == 1 ) ? 'light' : '';
	$backgroundimage 	= jeg_get_image_attachment(vp_metabox('jkreativ_slider_fulltext.background', null, $sliderid));
	$overlaybackground 	= vp_metabox('jkreativ_slider_fulltext.overlay_background', null, $sliderid);
	$buttontext 		= vp_metabox('jkreativ_slider_fulltext.buttontext', null, $sliderid);
	$slidingtext 		= vp_metabox('jkreativ_slider_fulltext.slidingtext', null, $sliderid);

	$bgtype 			= vp_metabox('jkreativ_slider_fulltext.bg_type', null, $sliderid);
	$bgfallback			= '';

	if($bgtype === 'image') {
		$backgroundimage 	= "background-image: url('$backgroundimage')";
	} else if($bgtype === 'video'){
		$bgfallback			= jeg_get_image_attachment(vp_metabox('jkreativ_slider_fulltext.video.0.bgfallback', null, $sliderid));
	} else if($bgtype === 'youtube') {
        $bgfallback			= jeg_get_image_attachment(vp_metabox('jkreativ_slider_fulltext.youtube.0.bgfallback', null, $sliderid));
    }

    if($is_IE && ( $bgtype === 'video' || $bgtype === 'youtube')) {
        $bgtype = 'image';
        $backgroundimage	= "background-image: url('" . jeg_get_image_attachment(vp_metabox('jkreativ_slider_fulltext.video.0.bgfallback', null, $sliderid)) . "')";
    }
?>
<section class="fs-videobg  fs-container nomargin nopadding headingparallax <?php echo $uselight; ?>" style="" data-slider-type="<?php echo $bgtype; ?>">
	<?php if($bgtype === 'video') { ?>
	<div class="video-wrap video-fixed video-fullscreen bgholder">
		<div class="video-fallback" style="background-image: url('<?php echo $bgfallback; ?>')"></div>
		<video autoplay="autoplay" loop="loop" autobuffer="autobuffer" poster="<?php echo $bgfallback; ?>"
               data-height="<?php echo vp_metabox('jkreativ_slider_fulltext.video.0.videoheight', null, $sliderid); ?>"
               data-width="<?php echo vp_metabox('jkreativ_slider_fulltext.video.0.videowidth', null, $sliderid); ?>">
			<?php if(vp_metabox('jkreativ_slider_fulltext.video.0.videomp4', null, $sliderid)) : ?>
		    <source src="<?php echo vp_metabox('jkreativ_slider_fulltext.video.0.videomp4', null, $sliderid); ?>" type="video/mp4" />
		    <?php endif; ?>

		    <?php if(vp_metabox('jkreativ_slider_fulltext.video.0.videowebm', null, $sliderid)) : ?>
		    <source src="<?php echo vp_metabox('jkreativ_slider_fulltext.video.0.videowebm', null, $sliderid); ?>" type="video/webm" />
		    <?php endif; ?>

		    <?php if(vp_metabox('jkreativ_slider_fulltext.video.0.videoogg', null, $sliderid)) : ?>
		    <source src="<?php echo vp_metabox('jkreativ_slider_fulltext.video.0.videoogg', null, $sliderid); ?>" type="video/ogg" />
		    <?php endif; ?>
		</video>
	</div>
	<?php } else if($bgtype === 'image'){ ?>
	<div class="bgholder">
		<div class="bgitem" style="<?php echo $backgroundimage ?>"></div>
	</div>
	<?php } else if($bgtype === 'youtube'){ ?>
    <div class="bgholder">
        <div class="video-fallback" style="background-image: url('<?php echo $bgfallback; ?>')"></div>
        <div class="youtubefullscreen" data-static="<?php echo vp_metabox('jkreativ_slider_fulltext.youtube.0.use_static', null, $sliderid); ?>" data-url="<?php echo vp_metabox('jkreativ_slider_fulltext.youtube.0.youtubeurl', null, $sliderid); ?>"></div>
    </div>
    <?php } ?>
    <div class="parallaxoverlay" style="background-color: <?php echo $overlaybackground; ?>;"></div>
	<div class="fslandingslider parallaxtext">
		<div class="text-slider">
			<div class="text-slider-wrap">
				
				<?php if(vp_metabox('jkreativ_slider_fulltext.effect', null, $sliderid) === 'slide') { ?>
					
					<ul data-speed="<?php echo vp_metabox('jkreativ_slider_fulltext.slide_speed', null, $sliderid); ?>">
						<?php
							foreach($slidingtext as $text) :
								echo "<li><h2 class='slider-header'>". do_shortcode($text['textcontent']) ."</h2></li>";
							endforeach
						?>
					</ul>
				
				<?php } else if(vp_metabox('jkreativ_slider_fulltext.effect', null, $sliderid) === 'type') { ?>
					
					<?php
						$slidearea = array();
						for($i = 1; $i < sizeof($slidingtext); $i++) {
							$slidearea[] = $slidingtext[$i]['textcontent'];
						} 
						$slidearea[] = $slidingtext[0]['textcontent'];					
					?>
					<h2 class="slider-header" data-typer-targets='<?php echo json_encode(array('targets' => $slidearea)); ?>'><?php echo $slidingtext[0]['textcontent'] ?></h2>
					
				<?php } ?>
				
			</div>
			<div class="callout"> <div class="btn"><?php echo $buttontext; ?></div> </div>
		</div>
	</div>
	<?php if($bgtype === 'video' || $bgtype === 'youtube') { ?>
	<div data-off="fa-volume-off" data-on="fa-volume-up" data-toogle="on" class="video_toggle">
		<i class="fa fa-volume-up"></i>
	</div>
	<?php } ?>
</section>