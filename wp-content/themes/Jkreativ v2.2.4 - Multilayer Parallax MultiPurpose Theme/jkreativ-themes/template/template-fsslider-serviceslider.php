<?php
/** 
Template Name: Fullscreen (Slider) - Service Slider
 */
get_header();

if ( ! post_password_required() ) 
{
?>
<div class="headermenu">
	<?php jeg_get_template_part('template/rightheader'); ?>
</div> <!-- headermenu -->


<!-- begin Slit Slider -->
<div class="fs-container">
	<div class="splitslider">
		
		<div id="slider" class="sl-slider-wrapper">
			<div class="sl-slider">
				
				<?php
					$slideritem = vp_metabox('jkreativ_page_sslider.slideritem');
					foreach($slideritem as $id => $slider) {
						if($id % 2 == 0) {
							echo '<div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">';
						} else {
							echo '<div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">';
						}
						
							echo '<div class="sl-slide-inner">';
								echo '<div class="bg-img" style="background-image: url(' .  jeg_get_image_attachment($slider['background']) . ')"></div>';
								echo '<a href="' . $slider['url']  .'" class="tile-wrapper">';
									echo '<div class="slider-content">';
										echo '<i class="fa ' . $slider['iconfon'] . '"></i>';
										echo '<h2>' . $slider['servicetext']  . '</h2>';
										echo '<span class="sl-line"></span>';
										echo '<p>' . $slider['detailtext']  . '</p>';
									echo '</div>';
								echo '</a>';
							echo '</div>';
						echo '</div>';
					}
				?>
				
			</div><!-- /sl-slider -->
			
			<nav id="nav-arrows" class="nav-arrows">
				<span class="nav-arrow-prev"></span>
				<span class="nav-arrow-next"></span>
			</nav>

			<nav id="nav-dots" class="nav-dots">
				<?php
					foreach($slideritem as $id => $slider) {
						if($id === 0) {
							echo '<span class="nav-dot-current"></span>';
						} else {
							echo '<span></span>';
						}
					} 
				?>
			</nav>

		</div><!-- /slider-wrapper -->
		
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
		
		/** Fullscreen Service Slider **/	
		$(".sliderloader").fadeIn();
		
		var Page = (function() {
			var $navArrows = $( '#nav-arrows' ),
				$nav = $( '#nav-dots > span' ),
				slitslider = $( '#slider' ).slitslider({
					onBeforeChange : function( slide, pos ) {
						$nav.removeClass( 'nav-dot-current' );
						$nav.eq( pos ).addClass( 'nav-dot-current' );
					}
				}),
				init = function() {
					initEvents();
				},
				initEvents = function() {
					// add navigation events
					$navArrows.children( ':last' ).on( 'click', function() {
						slitslider.next();
						return false;
					} );

					$navArrows.children( ':first' ).on( 'click', function() {
						slitslider.previous();
						return false;
					});
					
					$nav.each( function( i ) {
						$( this ).on( 'click', function( event ) {
							var $dot = $( this );
							if( !slitslider.isActive() ) {
								$nav.removeClass( 'nav-dot-current' );
								$dot.addClass( 'nav-dot-current' );
							}
							slitslider.jump( i + 1 );
							return false;
						} );
					});
				};
				return { init : init };
		})();
		
		function done_loading() {
			$(".sl-slider-wrapper").fadeIn();
			$(".sliderloader").fadeOut();
			Page.init();	
			$(window).trigger('resize');	
		}
		
		function load_background(i) {
			if($('.sl-slide').length > i){													
				var bg = $($('.sl-slide').get(i)).find('.bg-img ').css('background-image');
				bg = bg.replace('url(','').replace(')','');
				bg = bg.replace('"','').replace('"','');
				var img = new Image();

    			$(img).load(function(){
					load_background(++i);
				}).attr('src', bg);
			} else {
				done_loading();
			}
		}															
		load_background(0);	
	});		
})(jQuery);
</script>				        		
<!-- end Slit Slider -->


<?php
} else {
    jeg_get_template_part('template/password-form');
} 

get_footer(); 
?>