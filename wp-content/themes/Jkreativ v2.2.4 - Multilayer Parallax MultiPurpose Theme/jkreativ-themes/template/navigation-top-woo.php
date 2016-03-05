<?php
	global $woocommerce;
?>

<?php if(function_exists('is_woocommerce'))  { ?>
	<div class="topnavigationwoo">
		<ul>
			<?php if(!is_user_logged_in()) { ?>
			<li class="toplogin">
				<a href="<?php echo get_page_link ( woocommerce_get_page_id( 'myaccount' ) ); ?>"></a>
			</li>
			<?php } else { ?>
			<li class="topaccount">
				<a href="#">
					<?php
						$current_user = wp_get_current_user();
						echo get_avatar( $current_user->user_email, 50 );
					?>
					<!-- <span><?php _e('Account', 'jeg_textdomain'); ?></span> -->
				</a>
				<div class="accountdrop ">
					<ul id="top-account-menu">
						<?php jeg_get_template_part('template/accountnavigation'); ?>
					</ul>
				</div>
			</li>
			<?php } ?>
			<li class="topcart">
				<a href="#">
					<?php
					$itemcount = $woocommerce->cart->cart_contents_count;
					?>
				</a>
				<div class="topcartcontent">
					<?php
						if ( sizeof( $woocommerce->cart->get_cart() ) > 0 ) {
					?>
					<h6 class="topcartheader"><?php echo sprintf(_n('An Item', '%s Items', $itemcount, 'jeg_textdomain'), $itemcount); ?> on Shopping Cart</h6>
					<div class="topcartlist">
						<?php
							foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $values ) {
								$_product = $values['data'];
								if ( $_product->exists() && $values['quantity'] > 0 ) {
						?>
						<div class="topcartlist_product">
							<?php
								$image = jeg_get_image_attachment(get_post_thumbnail_id($_product->id));
								$thumbnail = jeg_image_resizer($image, 65, 79);
								printf('<a href="%s" class="topcartlist_image"><img src="%s" alt="%s"/></a>', esc_url( get_permalink( apply_filters('woocommerce_in_cart_product_id', $values['product_id'] ) ) ),  $thumbnail, $_product->post->post_title);
							?>
							<div class="topcart_desc">
								<a href="<?php echo esc_url( get_permalink( apply_filters('woocommerce_in_cart_product_id', $values['product_id'] ) ) ); ?>"><strong><?php echo $_product->post->post_title; ?></strong></a>
								<span><?php _e('Quantity :','jeg_textdomain'); ?> <?php echo $values['quantity']; ?> </span>
								<?php echo $woocommerce->cart->get_item_data( $values ); ?>
							</div>
							<div class="topcart_price">
								<?php
									echo $woocommerce->cart->get_product_subtotal( $_product, $values['quantity'] );
								?>
							</div>
							<div class="topcart_product_remove"><a href="<?php echo esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ); ?>"> <?php _e("remove", "jeg_textdomain"); ?> </a></div>
							<div class="clearfix"></div>
						</div>
						<?php
								}
							}
						?>
					</div>
					<div class="topcart_subtotal">
						<?php _e('CART SUBTOTAL','jeg_textdomain'); ?>
						<strong><?php echo $woocommerce->cart->get_cart_subtotal(); ?></strong>
					</div>
					<div class="topcart_button clearfix">
						<a href="<?php echo get_page_link(woocommerce_get_page_id( 'cart' )); ?>" class="topcart_btn viewcart">
							<i class="button-text"><?php _e('View Cart','jeg_textdomain'); ?></i>
						</a>
						<a href="<?php echo get_page_link(woocommerce_get_page_id( 'checkout' )); ?>" class="topcart_btn">
							<i class="button-text"><?php _e('Checkout','jeg_textdomain'); ?></i>
						</a>
					</div>
					<?php
						} else {
					?>
						<div class="topemptycart">
							<h5><?php _e("Your cart is currently empty", "jeg_textdomain"); ?></h5>
							<a href="<?php echo get_permalink(woocommerce_get_page_id('shop')); ?>"><?php _e( '&larr; Return To Shop', 'jeg_textdomain' ) ?></a>
						</div>
					<?php
						}
					?>
				</div>
			</li>
		</ul>
	</div>
<?php } ?>