<?php
// margin
$marginsize = 0;
$marginadditional = 0;
if(vp_option('joption.product_use_margin', 0) == 1) {
	$marginsize = vp_option('joption.product_margin_size', 5);
	$marginadditional = $marginsize + 2;
}
?>
<div class="productwrapper">
	<div class="contentheaderspace"></div>
	<div class="product-content-wrapper" style="padding : <?php echo ( $marginadditional ) ?>px;">
		<div class="isotopewrapper <?php if(vp_option('joption.override_overlay') && vp_option("joption.product_overlay_text_switch")) { echo "switchproducttext"; } ?>">
			<?php
				if(have_posts()) {
					
					global $wp_query;
					
					$title = '';
					if(isset($wp_query->query_vars['taxonomy']) && $wp_query->query_vars['taxonomy'] === 'product_cat') {
						$title =  sprintf( __('Product Category : <b>%s</b>', 'jeg_textdomain') , single_cat_title('', false) ); 
					} else if(isset($wp_query->query_vars['taxonomy']) && $wp_query->query_vars['taxonomy'] === 'product_tag') {
						$title =  sprintf( __('Product Tag : <b>%s</b>', 'jeg_textdomain') , single_tag_title('', false) ); 
					} 
					
					if($title !== '') {
						echo 
						"<a href='#' class='productitem productcategorywrapout' data-width='1'>
							<div class='productcontent productcategorywrap' style='margin: {$marginsize}px'>
								<div class='article-head-wrapper'>
									<span>{$title}</span>									
								</div>
							</div>												
						</a>";											
					}
					
					while(have_posts()) {
						the_post();
						woocommerce_get_template_part( 'content', 'product' );
					}
				} else {
					woocommerce_get_template( 'loop/no-products-found.php' );
				}
			?>
		</div>
		<?php
			global $wp_query;
			$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
			
			if($wp_query->max_num_pages > 1) {
				echo 
				"<div class='blogpagingholder'>
					<div class='blogpagingwrapper'>
					" . jeg_new_pagination(get_the_ID(), $paged, $wp_query->max_num_pages) . "
					</div>
				</div>";
			}
			wp_reset_postdata();
		?>		
		
	</div>	
</div>
<div class="productloader bigloader"></div>
<style>
	<?php if(vp_option('joption.override_overlay')) { ?>
	.productitem .pmask {
		background : <?php echo vp_option('joption.product_overlay_color'); ?> 
	}
	<?php } ?>
</style>
<script>
	(function($){
		$(document).ready(function(){
			$(".productwrapper").jproduct({
				loadAnimation : 'randomfade',
				portfoliosize : <?php echo vp_option('joption.product_width', 500) ?>,
				tiletype : 'masonry'
			});
		});		
	})(jQuery);
</script>