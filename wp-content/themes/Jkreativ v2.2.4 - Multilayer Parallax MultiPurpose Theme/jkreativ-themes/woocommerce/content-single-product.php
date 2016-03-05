<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
?>

<?php
	$gallerydata = jeg_get_gallery_product_data(get_the_ID());
	
	$overwritewidth = $gallerydata['product_fullwidth'];
	$useisotope = 'isotopewrapper';
	$additionalmarginclass = "nomargin";
	$gallerylayout = '';
	
	if($overwritewidth) {
		$gallerylayout 	= $gallerydata['gallery_layout']. "_layout";
		$usemargin =  $gallerydata['user_margin'];
		$marginsize = 0;
		if($usemargin) {
			$marginsize = $gallerydata['margin_size'];
			$paddingsize = 1 * $marginsize;
			$additionalmarginclass = "marginimg";
		}
		
	} else {
		$useisotope = '';
	}
?>

<div class="contentheaderspace"></div>
<div itemscope itemtype="http://schema.org/Product" id="product-<?php the_ID(); ?>" <?php post_class('pagewrapper coverwidth productline jkreativ-woocommerce' . " {$gallerylayout}"); ?>>
	<div class="pageholder row-fluid">
		<div class="pageholdwrapper">

			<div class="mainsidebar">
				<div class="mainsidebar-wrapper">
					<div class="blog-sidebar">
						<div class="blog-sidebar-content">
							<?php
								do_action( 'woocommerce_before_single_product' );
								do_action( 'woocommerce_single_product_summary' );
								do_action( 'woocommerce_after_single_product_summary' );
							?>
						</div>
					</div>
				</div>
			</div>
			
			<div class="mainpage">
				<div class="imagelist-wrapper <?php echo $additionalmarginclass; ?>">
					<div class="imagelist-content-wrapper" style="padding :0; margin: -<?php echo $marginsize; ?>px; margin-bottom: 10px;">
						<div class="<?php echo $useisotope; ?>">
							<?php
								do_action( 'woocommerce_before_single_product_summary' );
							?>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div><!-- #product-<?php the_ID(); ?> -->

<script>
	(function($) {
		$(document).ready(function() {
			$(".mainpage").jnormalblog();
			$(".imagelist-wrapper").jimggallery({
				adminurl : '<?php echo admin_url("admin-ajax.php"); ?>',
				pageid : <?php echo get_the_ID() ?>,
				gallerytype : '<?php echo $gallerydata['gallery_layout'] ?>',
				totalpage : 1,
				loadcount : 1000,
				dimension : <?php echo $gallerydata['product_height']; ?>,
				tiletype : "<?php echo $gallerydata['gallery_layout'];  ?>",
				justifiedheight :  <?php echo $gallerydata['justified_height']; ?>,
				loadAnimation : 'randomfade',
				gallerysize : <?php echo $gallerydata['product_width']; ?>,
				galleryexpand : "<?php echo $gallerydata['expand_script']; ?>",
				margin : '<?php echo $marginsize ?>',
				photoswipeslideautoplay : 1,
				photoswipeslidedelay : 5000,
				photoswipehidetitle : 1,
				photoswipescale : '<?php echo $gallerydata['scale_mode'] ?>'
			});
		});
	})(jQuery);
</script>

<?php do_action( 'woocommerce_after_single_product' ); ?>