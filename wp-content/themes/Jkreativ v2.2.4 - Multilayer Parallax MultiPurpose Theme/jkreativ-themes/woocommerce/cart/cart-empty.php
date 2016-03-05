<?php
/**
 * Empty cart page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<div class="contentheaderspace"></div>
<div class="pagewrapper pagecenter fullwidth nosidebar cartpage">	
	<div class="pageholder">		
		<div class="pageholdwrapper">										
			<div class="mainpage blog-normal-article">
				<div class="pageinnerwrapper">
						
					<div class="article-header">
						<h2><?php _e('Shopping Cart', 'jeg_textdomain'); ?></h2>
					</div>
					<div class="article-content">
						<?php wc_print_notices(); ?>
						
						<div class="woocommerce">
							<div class="empty_bag">															
							    <h3 class="empty_bag_message"><?php _e( 'Your cart is currently empty.', 'jeg_textdomain' ) ?></h3>
							    <a class="btn btn-primary" href="<?php echo apply_filters( 'woocommerce_return_to_shop_redirect', get_permalink( wc_get_page_id( 'shop' ) ) ); ?>"><?php _e( '&larr; Return To Shop', 'jeg_textdomain' ) ?></a>															    
								<?php do_action('woocommerce_cart_is_empty'); ?>													
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>		
		</div>									
	</div>
</div>