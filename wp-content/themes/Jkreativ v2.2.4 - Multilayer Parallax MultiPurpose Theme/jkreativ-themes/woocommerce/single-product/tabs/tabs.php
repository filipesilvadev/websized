<?php
/**
 * Single Product tabs
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

global $product;

if ( ! empty( $tabs ) ) : ?>
	
	<div class="panel-group" id="accordion">
		<?php 
			$counttab = 0;
			foreach ( $tabs as $key => $tab ) :
				
				$additionalclass = '';
				if($counttab == 0) {
					$additionalclass = 'in';					
				}
				$counttab++;
				
				$heading = apply_filters( 'woocommerce_product_' . $key . '_tab_title', $tab['title'], $key );
			
		?>
			<div class="panel panel-default">
				<div class="panel-heading">
			  		<h4 class="panel-title">
			    		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#tab-<?php echo $key ?>">
			      			<?php echo $heading ?>
			    		</a>
			  		</h4>
				</div>
				<div id="tab-<?php echo $key ?>" class="panel-collapse collapse <?php echo $additionalclass ?>">
		  			<div class="panel-body">
		  				<?php call_user_func( $tab['callback'], $key, $tab ) ?>
					</div>
				</div>
		  	</div>
		<?php 
			endforeach; 
		?>
	</div>
	

<?php endif; ?>