<?php
/** 
Template Name: Fullscreen (Slider) - Video & image
 */
get_header();

if ( ! post_password_required() ) 
{
?>
<div class="headermenu">
	<?php jeg_get_template_part('template/rightheader'); ?>
</div> <!-- headermenu -->

<div class="fs-container">				        			
	<div class="slideshowgallery" style='opacity: 0;' data-loop="true" data-autoplay="<?php echo vp_metabox('jkreativ_page_slidermedia.toggle_autoplay') === "1" ? vp_metabox('jkreativ_page_slidermedia.autoplay_delay') : false; ?>">
		<?php 
			$mediagallery = get_post_meta(get_the_ID(), 'postgallery', true);
			foreach ($mediagallery as $key => $value) {
				if($value['type'] === 'image') {
					$image = jeg_get_image_attachment($value['imageid']);
					$thumbnail = jeg_image_resizer($image, 144, 96);
					echo "<a href='{$image}'><img src='{$thumbnail}' width='144' height='96'></a>";
				} else if($value['type'] === 'youtube' || $value['type'] === 'vimeo') {
					$mediaurl = $value['mediaurl'];
					$image = jeg_get_image_attachment($value['mediacover']);
					$thumbnail = jeg_image_resizer($image, 144, 96);
					echo "<a href='{$mediaurl}' data-img='{$image}'><img src='{$thumbnail}' width='144' height='96'></a>";
				}
			}
		?>
	</div>
</div>
<div class="sliderloader bigloader"></div>

<script>
	(function($){
		$(document).ready(function(){
			/** Full screen **/
			if($(".fs-container").length) {
				$(".fs-container").fsfullheight(['.headermenu', '.responsiveheader', '.topnavigation']);
			}
			
			/** Fullscreen Fotorama **/											
			$(".slideshowgallery").fotorama({
				allowfullscreen: false,
				arrows: <?php echo vp_metabox('jkreativ_page_slidermedia.show_arrow') === "1" ? "true" : "false" ?>,
				width: '100%',
				maxWidth: '100%',
				height : '100%',
				minheight : '100%',
				maxheight : '100%',
				nav: "<?php echo vp_metabox('jkreativ_page_slidermedia.show_thumb') === "1" ? "thumbs" : "false"  ?>",
				fit : "<?php echo vp_metabox('jkreativ_page_slidermedia.fit_mode') ?>"
			});
			
			$(".slideshowgallery").on('fotorama:load', function(){});
			
			$(window).load(function(){
				$(".slideshowgallery").animate({
					'opacity' : 1
				}, 300);
				$(".sliderloader").fadeOut();
			});
		});		
	})(jQuery);
</script>

<?php
} else {
    jeg_get_template_part('template/password-form');
} 

get_footer(); 
?>