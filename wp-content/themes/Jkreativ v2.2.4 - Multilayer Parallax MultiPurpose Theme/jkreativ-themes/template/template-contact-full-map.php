<?php
/** 
Template Name: Contact - Fullscreen Map
 */
get_header();

if ( ! post_password_required() ) 
{
    $location = apply_filters('generate_location', vp_metabox('jkreativ_page_fsmap.location'));
?>
<div class="headermenu">
	<?php jeg_get_template_part('template/rightheader'); ?>
</div> <!-- headermenu -->

<div class="fullbgcontainer">
	<div class="fullbgwrapper">
		<div class="mapoverlay"></div>
		<div class="mapcontainer" id="mapcontainer">
			<div class="maplist">
				<?php
					if(!empty($location)) {
						foreach($location as $idx => $loc) {
							echo jeg_info_window($idx + 1, $loc);
						}
					}
				?>
			</div>
		</div>								
	</div>
</div>

<div class="contentheaderspace"></div>
<div class="pagewrapper pageright halfwidth nosidebar">
	<div class="pageholder">
		<div class="pageholdwrapper">
			
			<div class="halfpage blog-normal-article">
				<div class="ltoogle contactheading" data-target=".lcontent" data-switcher="c">
					<i class="cicon"></i><span class="ocindicator"></span> <?php _e('Location', 'jeg_textdomain'); ?> 
				</div>
				<div class="pageinnerwrapper lcontent">
					<?php
						if(!empty($location)) {
							foreach($location as $idx => $loc) {
								echo jeg_location_block($idx + 1, $loc);
							}
						}
					?>
				</div>
				
				<div class="ctoogle contactheading active" data-target=".ccontent" data-switcher="l">
					<i class="cicon"></i><span class="ocindicator"></span><?php _e('Contact', 'jeg_textdomain'); ?>
				</div>
				<?php 
					if( have_posts() ) {
						while(have_posts()){
							the_post();	
				?>	
				<div class="pageinnerwrapper ccontent">
					<div class="article-header">
						<h2><?php the_title(); ?></h2>
					</div>
					<div class="article-content">							
						<?php the_content(); ?>
					</div>
					
					<div class="clearfix"></div>
				</div>
				<?php
						} 
					}
				?>					
			</div>
		
		</div>
	</div>
</div>

<script>
	(function($) {
		$(document).ready(function() {
			$(".halfpage").jnormalblog();
			$(".halfpage").jfsmap({
				zoomfactor : <?php echo vp_metabox('jkreativ_page_fsmap.mapzoom', 14) ?>
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