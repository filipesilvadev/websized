<?php
/**
 * Pay for order form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;
?>

<div class="headermenu">
	<?php get_template_part('template/rightheader'); ?>
</div> <!-- headermenu -->

<div class="contentheaderspace"></div>
<div class="pagewrapper pagecenter fullwidth nosidebar cartpage">
	<div class="pageholder">
		
		<div class="pageholdwrapper">										
			<div class="mainpage blog-normal-article">
				<div class="pageinnerwrapper">
					<div class="article-header">	
						<h2><?php _e('Checkout', 'jeg_textdomain') ?></h2>
					</div>
					<div class="article-content">						
						<div class="jkreativ-woocommerce">
							<div class="cart_wrapper">
						        <div class="row-fluid">
									<form id="order_review" method="post">
										<table class="shop_table">
											<thead>
												<tr>
													<th class="product-name"><?php _e( 'Product', 'jeg_textdomain' ); ?></th>
													<th class="product-total"><?php _e( 'Totals', 'jeg_textdomain' ); ?></th>
												</tr>
											</thead>
											<tfoot>
											<?php
												if ( $totals = $order->get_order_item_totals() ) foreach ( $totals as $total ) :
													?>
													<tr>
														<th scope="row"><?php echo $total['label']; ?></th>
														<td class="product-total"><?php echo $total['value']; ?></td>
													</tr>
													<?php
												endforeach;
											?>
											</tfoot>
											<tbody>
												<?php
												if (sizeof($order->get_items())>0) :
													foreach ($order->get_items() as $item) :
														echo '
															<tr>
																<td class="product-name">'.$item['name'].' <strong>x'.$item['qty'].'</strong> </td>																
																<td class="product-subtotal">' . $order->get_formatted_line_subtotal($item) . '</td>
															</tr>';
													endforeach;
												endif;
												?>
											</tbody>
										</table>
									
										<div id="payment">
											<?php if ( $order->needs_payment() ) : ?>
											<ul class="payment_methods methods">
												<?php
													if ( $available_gateways = $woocommerce->payment_gateways->get_available_payment_gateways() ) {
														// Chosen Method
														if ( sizeof( $available_gateways ) )
															current( $available_gateways )->set_current();
									
														foreach ( $available_gateways as $gateway ) {
															?>
															<li>
																<input type="radio" id="payment_method_<?php echo $gateway->id; ?>" class="input-radio" name="payment_method" value="<?php echo esc_attr( $gateway->id ); ?>" <?php if ($gateway->chosen) echo 'checked="checked"'; ?> />
																<label for="payment_method_<?php echo $gateway->id; ?>"><?php echo $gateway->get_title(); ?> <?php echo $gateway->get_icon(); ?></label>
																<?php
																	if ( $gateway->has_fields() || $gateway->get_description() ) {
																		echo '<div class="payment_box payment_method_' . $gateway->id . '" style="display:none;">';
																		$gateway->payment_fields();
																		echo '</div>';
																	}
																?>
															</li>
															<?php
														}
													} else {
									
														echo '<p>'.__( 'Sorry, it seems that there are no available payment methods for your location. Please contact us if you require assistance or wish to make alternate arrangements.', 'jeg_textdomain' ).'</p>';
									
													}
												?>
											</ul>
											<?php endif; ?>
									
											<div class="form-row">
												<?php wp_nonce_field('pay')?>												
												<input type="submit" class="btn btn-primary" id="place_order" value="<?php _e( 'Pay for order', 'jeg_textdomain' ); ?>" />
												<input type="hidden" name="woocommerce_pay" value="1" />
											</div>
										</div>
									</form>
								</div>
							    <div class="clearfix"></div>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>									
	</div>
</div>
