<?php
/**
 * Cart Page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
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
						<div class="article-header">
							<h2><?php _e('Shopping Cart', 'jeg_textdomain'); ?></h2>
						</div>
						<div class="article-content">
							<div class="jkreativ-woocommerce">
								<div class="cart_wrapper">
							        
							        <form action="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" method="post">
								        <div class="row-fluid">
									    	<div class="span8 cart_content">
											        <div class="shop_table_wrapper">
											            <?php
											            	do_action( 'woocommerce_before_cart' ); 
											            	wc_print_notices(); 
															do_action( 'woocommerce_before_cart_table' );
											            ?>
											            <table class="shop_table footable" cellspacing="0">
											                <thead>
											                    <tr>
											                        <th class="product-remove">&nbsp;</th>
											                        <th class="product-thumbnail">&nbsp;</th>
											                        <th class="product-name"><?php _e( 'Item', 'jeg_textdomain' ); ?></th>
											                        <th class="product-quantity"><?php _e( 'Quantity', 'jeg_textdomain' ); ?></th>
											                        <th class="product-subtotal"><?php _e('Total', 'jeg_textdomain'); ?></th>
											                    </tr>
											                </thead>
											                <tbody>
											                	<?php
																	if ( sizeof( WC()->cart->get_cart() ) > 0 ) {																	
																		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
																			$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
																			$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );																		
																			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
																?>
	
																<tr class="cart_table_item">
								                                    <!-- Remove from cart link -->
																	<td class="product-remove">
																		<?php
																			echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf( '<a href="%s" class="remove" title="%s">&times;</a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), __( 'Remove this item', 'woocommerce' ) ), $cart_item_key );
																		?>
																	</td>
	
								                                    <!-- The thumbnail -->
																	<td class="product-thumbnail">
																		<?php
																			$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
	
																			if ( ! $_product->is_visible() )
																				echo $thumbnail;
																			else
																				printf( '<a href="%s">%s</a>', $_product->get_permalink(), $thumbnail );
																		?>
																	</td>
	
																	<!-- Product Name -->
																	<td class="product-name">
																		<?php
																			if ( ! $_product->is_visible() )
																				echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
																			else
																				echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', $_product->get_permalink(), $_product->get_title() ), $cart_item, $cart_item_key );
												
																			// Meta data
																			echo WC()->cart->get_item_data( $cart_item );
												
												               				// Backorder notification
												               				if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) )
												               					echo '<p class="backorder_notification">' . __( 'Available on backorder', 'woocommerce' ) . '</p>';
																		?>
																		<div class="product-price">
																			<?php
																				echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
																			?>
																		</div>
																	</td>
	
																	<!-- Quantity inputs -->
																	<td class="product-quantity">
																		<?php
																			if ( $_product->is_sold_individually() ) {
																				$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
																			} else {
																				$product_quantity = woocommerce_quantity_input( array(
																					'input_name'  => "cart[{$cart_item_key}][qty]",
																					'input_value' => $cart_item['quantity'],
																					'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
																				), $_product, false );
																			}
												
																			echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key );
																		?>
																	</td>
	
																	<!-- Product subtotal -->
																	<td class="product-subtotal">
																		<?php
																			echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
																		?>
																	</td>
	
																</tr>
																<?php
																			}
																		}
																	}
											                	?>
											                </tbody>
											            </table>
											        </div>
									    	</div>
	
										    <div class="span4 cart_total">
										        <div class="left_column_cart">
	
									                <?php if ( WC()->cart->coupons_enabled() ) { ?>
													<div class="coupon">
														<h3><?php _e( 'Have a coupon?', 'jeg_textdomain' ); ?></h3>
														<div class="coupon_inputs_wrapper">
									                        <input name="coupon_code" class="input-text" id="coupon_code" placeholder="<?php _e('Enter coupon code', 'jeg_textdomain'); ?>" value="">
									                        <input type="submit" class="btn btn-primary" name="apply_coupon" value="<?php _e( 'Apply', 'jeg_textdomain' ); ?>" />
									                    </div>
									                    <div class="clearfix"></div>
														<?php do_action('woocommerce_cart_coupon'); ?>
													</div>
													<?php } ?>
	
													<?php woocommerce_cart_totals(); ?>
													<input type="submit" class="update-button btn" name="update_cart" value="<?php _e( 'Update Cart', 'jeg_textdomain' ); ?>" />
													<input type="submit" class="checkout-button btn btn-primary" name="proceed" value="<?php _e( 'Proceed to Checkout &rarr;', 'jeg_textdomain' ); ?>" />												
													<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
													<?php wp_nonce_field( 'woocommerce-cart' ); ?>
	
	
										        </div>
									    	</div>
									    </div>
									</form>
								    <div class="clearfix"></div>
								    <div class="row-fluid">
									    <div class="span8 cart_content">
									    </div>
									    <div class="span4 cart_total">
									    	<div class="left_column_cart_shipping">
												<?php woocommerce_shipping_calculator(); ?>
							                </div>
									  	</div>
									</div>
								    
								</div>
							</div>

						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
	</div>