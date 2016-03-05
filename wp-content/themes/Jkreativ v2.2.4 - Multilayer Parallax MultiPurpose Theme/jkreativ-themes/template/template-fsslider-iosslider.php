<?php
/** 
Template Name: Fullscreen (Slider) - IOS Slider
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
	<div class="sliderContainer">
		<div class="iosSlider" data-autoplay="<?php echo vp_metabox('jkreativ_page_iosslider.autoplay', 'false');  ?>" data-delay="<?php echo vp_metabox('jkreativ_page_iosslider.sliderdelay', '5000'); ?>">
			<div class="slider sliderhold">
				<?php 
					$slideritem = vp_metabox('jkreativ_page_fsslider_content.slideritem');
					foreach($slideritem as $slider) {
						echo "<div class='item'>";
							echo "<img src='" . jeg_get_image_attachment($slider['background']) . "'/>\n";
							echo "<div class='iosoverlay' style='background-color: " . $slider['overlay_color'] . "'></div>";
							echo "<div class='ioscontainer'>\n";
								echo "<div class='text1'>" . do_shortcode($slider['firstline']) . "</div>\n";
								if($slider['show_secondline']) {
									echo "<div class='text2'>{$slider['secondline']}</div>\n";
								}
								if($slider['show_thirdline']) {
									echo "<div class='text3'><a class='slider-button' href='{$slider['buttonurl']}'><span class='button-text'>{$slider['buttontext']}</span></a></div>\n";
								}
							echo "</div>\n";
						echo "</div>\n";
					} 
				?>
			</div>
			<div class="navigationdot">
				<?php
					foreach($slideritem as $slider) {
						echo '<div class="slide-dot"></div>';
					}
				?>
			</div>
		</div>
	</div>
</div>
<div class="sliderloader bigloader"></div>	
    		
<script>
	(function($){
		$(document).ready(function(){
			/** Full screen **/
			if($(".fs-container").length) {
				$(".fs-container").fsfullheight(['.headermenu', '.responsiveheader', '.topnavigation']);
				$(".sliderloader").show();
			}
			
			/** Fullscreen IOS Slider **/											
			if($(".iosSlider").length) {
				$(".iosSlider").jfullscreenios();
			}
		});		
	})(jQuery);
</script>				 

<?php
} else {
    jeg_get_template_part('template/password-form');
} 

get_footer(); 
?>