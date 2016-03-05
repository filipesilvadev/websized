<?php
/**
 * Displayed when no products are found matching the current query.
 *
 * Override this template by copying it to yourtheme/woocommerce/loop/no-products-found.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<div class="headermenu">
	<?php get_template_part('template/rightheader'); ?>
</div> <!-- headermenu -->

<div class="contentheaderspace"></div>
<div class="pagewrapper pagecenter fullwidth nosidebar">
	<div class="pageholder">
		<div class="pageholdwrapper">
			<div class="mainpage blog-normal-article product-not-found">
				<div class="pageinnerwrapper notfound">
					<h1><?php _e("Sorry",'jeg_textdomain'); ?>	</h1>
					<div class="notfoundsec">
						<div class="notfoundtext">
							<?php _e('No product found at this time.','jeg_textdomain') ?>
						</div>
						<div>
							<form method="get" id="searchform" action="<?php echo home_url(); ?>/">
								<input type="text" placeholder="<?php _e('Type and Enter to Search', 'jeg_textdomain'); ?>" id="s" name="s" class="field">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>