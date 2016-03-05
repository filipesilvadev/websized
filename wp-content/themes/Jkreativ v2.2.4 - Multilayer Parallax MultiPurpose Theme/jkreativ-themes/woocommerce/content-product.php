<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop;

if ( ! $product || ! $product->is_visible() )
	return;

if(isset($woocommerce_loop['loop'])) {
	$woocommerce_loop['loop']++;
} else {
	$woocommerce_loop['loop'] = 0;
}


/** image **/
$itemwidth = vp_option('joption.product_width', 500);
$itw = $itemwidth * 1.5;
$ith = null;
if(vp_option('joption.product_type', 'normal') == 'normal') {
	$ith = $itw * floatval ( vp_option('joption.item_height') );
}
$image = jeg_get_image_attachment(get_post_thumbnail_id($product->id));
$thumbnail = jeg_image_resizer($image, $itw, $ith);

/** category **/
$terms = get_the_terms( $product->id, 'product_cat' );
$termarray = array();
if (!empty($terms)) {
	foreach ($terms as $term) {
		$termarray[] = $term->name;
	    break;
	}
}

/** margin size **/
$marginsize = 0;
if(vp_option('joption.product_use_margin', 0) == 1) {
	$marginsize = vp_option('joption.product_margin_size', 5);
}
?>

<a href="<?php the_permalink(); ?>" class="productitem" data-width="1">
	<div class="productcontent" style='margin: <?php echo $marginsize ?>px'>
		<img src="<?php echo $thumbnail; ?>" alt="<?php echo the_title(); ?>">
		<div class="pmask">
			<div class="pmask-border">
				<div class="pinfo">
					<small><?php echo implode(', ', $termarray); ?></small>
					<h2><?php echo the_title(); ?></h2>
					<span class="line"></span>
					<div class="price">
						<span class="amount"><?php echo $product->get_price_html(); ?></span>
					</div>
					<div class="slider-button">
						<i class="button-text"><?php _e('View Detail', 'jeg_textdomain'); ?></i>
					</div>
				</div>
			</div>
		</div>
	</div>
</a>