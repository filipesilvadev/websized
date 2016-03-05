<!-- mobile menu -->
<?php global $woocommerce; ?>
<div id="main-mobile-menu" class="mobile-menu" data-position="left">
    <?php jeg_get_template_part('template/navigation-mobile'); ?>

	<?php if(function_exists('is_woocommerce'))  { ?>
	<div class="mobile-account mobile-menu-content">
		<h2><?php _e('My Account', 'jeg_textdomain'); ?></h2>
		<ul>
			<?php jeg_get_template_part('template/accountnavigation'); ?>
		</ul>
	</div>
	<?php } ?>

	<?php if(function_exists('is_woocommerce'))  { ?>
	<div class="mobile-main-menu mobile-menu-content">
		<h2><?php _e('Shop', 'jeg_textdomain'); ?></h2>
		<ul>
			<?php
				if(!is_user_logged_in()) {
			?>
			<li><a href="<?php echo get_page_link ( woocommerce_get_page_id( 'myaccount' ) ); ?>"><?php _e('Login or Register', 'jeg_textdomain'); ?></a></li>
			<?php
				} else {
					$itemcount = $woocommerce->cart->cart_contents_count;
					if ( sizeof( $woocommerce->cart->get_cart() ) > 0 ) {
			?>
			<li>
				<a href="<?php echo get_page_link ( woocommerce_get_page_id( 'cart' ) ); ?>">
				<?php
					if ( sizeof( $woocommerce->cart->get_cart() ) > 0 ) {
						echo sprintf(_n('An Item', '%s Items', $itemcount, 'jeg_textdomain'), $itemcount);
						echo " / ";
						echo $woocommerce->cart->get_cart_subtotal();
					}
				?>
				</a>
			</li>
			<li><a href="<?php echo get_page_link ( woocommerce_get_page_id( 'logout' ) ); ?>"><?php echo _e('Logout', 'jeg_textdomain'); ?></a></li>
			<?php
					} else {
			?>
			<li><a href="<?php echo get_permalink(woocommerce_get_page_id('shop')); ?>"><?php _e('Begin Shopping','jeg_textdomain'); ?></a></li>
			<?php
					}
				}
			?>
		</ul>
	</div>
	<?php } ?>

	<div class="mobile-social mobile-menu-content">
		<h2><?php _e('Social Link', 'jeg_textdomain'); ?></h2>
		<?php echo jeg_social_icon(true); ?>
	</div>
	<div class="mobile-float"></div>
</div>
<!-- mobile menu end -->