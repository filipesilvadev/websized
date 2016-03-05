<?php
/**
 * Single Product Rating
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product;

if ( get_option( 'woocommerce_enable_review_rating' ) === 'no' )
	return;

$count   = $product->get_rating_count();
$average = $product->get_average_rating();

if ( $count > 0 ) : ?>
	
	<div class="review-box" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
		<div itemprop="ratingValue" title="<?php echo sprintf(__( 'Rated %.2f out of 5', 'jeg_textdomain' ), $average) ?>" class="star-rating">
			<span style="width:<?php echo ($average / 5 * 100) ?>%"></span>												
		</div>
		<div class="reviews_no">
			<?php echo sprintf( _n('%s review', '%s reviews', $count, 'jeg_textdomain'), $count); ?>
		</div>
	</div>

<?php endif; ?>