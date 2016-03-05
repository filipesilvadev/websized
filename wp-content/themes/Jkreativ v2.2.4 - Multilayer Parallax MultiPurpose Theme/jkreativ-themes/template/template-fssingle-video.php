<?php
/** 
Template Name: Fullscreen (Single) - Video
 */
get_header();

if ( ! post_password_required() ) 
{
?>
<div class="headermenu">
	<?php jeg_get_template_part('template/rightheader'); ?>
</div> <!-- headermenu -->

<!-- begin IOS Slider -->
<div class="fs-container">     			
	<?php
		$videotype = vp_metabox('jkreativ_page_fssingle_video.video_type');
		if($videotype === 'vimeo') {
			echo '<div class="fsvideo" data-type="' . $videotype . '" data-src="' . vp_metabox('jkreativ_page_fssingle_video.vimeo_video') . '"><div class="video-container"></div></div>';
		} else if($videotype === 'youtube') {
			echo '<div class="fsvideo" data-type="' . $videotype . '" data-src="' . vp_metabox('jkreativ_page_fssingle_video.youtube_video') . '"><div class="video-container"></div></div>';
		}
	?>
</div>

<script>
	(function($){
		$(document).ready(function(){
			/** Full screen **/
			if($(".fs-container").length) {
				$(".fs-container").fsfullheight(['.headermenu', '.responsiveheader', '.topnavigation']);
			}
			
			/** Fullscreen IOS Slider **/											
			if($(".fsvideo").length) {
				$(".fsvideo").jfsvideo(<?php echo ( vp_metabox('jkreativ_page_fssingle_video.enable_autoplay') === '1' ) ? "true" : "false"; ?>);
			}
		});		
	})(jQuery);
</script>				        		
<!-- end IOS Slider -->

<?php
} else {
    jeg_get_template_part('template/password-form');
} 

get_footer(); 
?>