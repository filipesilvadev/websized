<?php
/**
 * Thankyou page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;
?>

<div class="contentheaderspace"></div>
<div class="pagewrapper pagecenter fullwidth nosidebar cartpage">
	<div class="pageholder">		
		<div class="pageholdwrapper">										
			<div class="mainpage blog-normal-article">
				<div class="pageinnerwrapper">

<?php if ( $order ) : ?>

	<?php if ( in_array( $order->status, array( 'failed' ) ) ) : ?>

		<p><?php _e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction.', 'jeg_textdomain' ); ?></p>

		<p><?php
			if ( is_user_logged_in() )
				_e( 'Please attempt your purchase again or go to your account page.', 'jeg_textdomain' );
			else
				_e( 'Please attempt your purchase again.', 'jeg_textdomain' );
		?></p>

		<p>
			<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php _e( 'Pay', 'jeg_textdomain' ) ?></a>
			<?php if ( is_user_logged_in() ) : ?>
			<a href="<?php echo esc_url( get_permalink( woocommerce_get_page_id( 'myaccount' ) ) ); ?>" class="button pay"><?php _e( 'My Account', 'jeg_textdomain' ); ?></a>
			<?php endif; ?>
		</p>

	<?php else : ?>

		<div class="article-header">	
			<h2><?php _e('Thank You','jeg_textdomain'); ?></h2>
		</div>

		<p><?php _e( 'Thank you. Your order has been received.', 'jeg_textdomain' ); ?></p>

		<ul class="order_details">
			<li class="order">
				<?php _e( 'Order:', 'jeg_textdomain' ); ?>
				<strong><?php echo $order->get_order_number(); ?></strong>
			</li>
			<li class="date">
				<?php _e( 'Date:', 'jeg_textdomain' ); ?>
				<strong><?php echo date_i18n( get_option( 'date_format' ), strtotime( $order->order_date ) ); ?></strong>
			</li>
			<li class="total">
				<?php _e( 'Total:', 'jeg_textdomain' ); ?>
				<strong><?php echo $order->get_formatted_order_total(); ?></strong>
			</li>
			<?php if ( $order->payment_method_title ) : ?>
			<li class="method">
				<?php _e( 'Payment method:', 'jeg_textdomain' ); ?>
				<strong><?php echo $order->payment_method_title; ?></strong>
			</li>
			<?php endif; ?>
		</ul>
		<div class="clear"></div>

	<?php endif; ?>

	<?php do_action( 'woocommerce_thankyou_' . $order->payment_method, $order->id ); ?>
	<?php do_action( 'woocommerce_thankyou', $order->id ); ?>

<?php else : ?>
	<div class="article-header">	
		<h2><?php _e('Thank You','jeg_textdomain'); ?></h2>
	</div>
	<p><?php _e( 'Thank you. Your order has been received.', 'jeg_textdomain' ); ?></p>

<?php endif; ?>

				</div>
			</div>
		</div>									
	</div>
</div>