<?php
/**
 * Login Form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<div class="contentheaderspace"></div>
<div class="pagewrapper pagecenter halfwidth nosidebar registerpage">
	<div class="pageholder">
		<div class="pageholdwrapper">
			<div class="mainpage blog-normal-article">
				<div class="accordion-wrapper">
					<div class="halfpagepanel">

						<?php if (get_option('woocommerce_enable_myaccount_registration') == 'yes') : ?>
						<div class="halfpagepanel-header">
							<i class="fa fa-key halfpage-icon"></i>
							<span class="ocindicator"></span>
							<?php _e('Customer Login', 'jeg_textdomain') ?>
						</div>
						<?php endif; ?>

						<div class="halfpagepanel-body">
							<div class="pageinnerwrapper">
								<div class="article-header">
									<h3><?php _e('Customer Login', 'jeg_textdomain') ?></h3>
								</div>

								<?php
									wc_print_notices();
									do_action('woocommerce_before_customer_login_form');
								?>

								<div class="article-content">
									<form method="post" class="login">
										<?php do_action( 'woocommerce_login_form_start' ); ?>
										<p class="form-row">
											<label for="username"><?php _e( 'Username or email', 'jeg_textdomain' ); ?> <span class="required">*</span></label>
											<input type="text" class="input-text" name="username" id="username" />
										</p>
										<p class="form-row">
											<label for="password"><?php _e( 'Password', 'jeg_textdomain' ); ?> <span class="required">*</span></label>
											<input class="input-text" type="password" name="password" id="password">
										</p>
										<?php do_action( 'woocommerce_login_form' ); ?>
										<div class="clearfix"></div>
	
										
										<p class="form-row">
											<?php wp_nonce_field( 'woocommerce-login' ); ?>
											<input type="submit" class="btn btn-primary" name="login" value="<?php _e( 'Login', 'woocommerce' ); ?>" /> 
											<label for="rememberme" class="inline">
												<input name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php _e( 'Remember me', 'woocommerce' ); ?>
											</label>
										</p>
										<p class="lost_password">
											<a href="<?php echo esc_url( wc_lostpassword_url() ); ?>"><?php _e( 'Lost your password?', 'woocommerce' ); ?></a>
										</p>
									</form>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>


					<?php if (get_option('woocommerce_enable_myaccount_registration') == 'yes') : ?>
					<div class="halfpagepanel">
						<div class="halfpagepanel-header">
							<i class="fa fa-lock halfpage-icon"></i>
							<span class="ocindicator"></span>
							<?php _e('Register New Account', 'jeg_textdomain') ?>
						</div>

						<div class="halfpagepanel-body">
							<div class="pageinnerwrapper">
								<div class="article-header">
									<h3><?php _e('Register New Account', 'jeg_textdomain') ?></h3>
								</div>
								<div class="article-content">
									<form method="post" class="login">

										<?php if ( get_option( 'woocommerce_registration_email_for_username' ) == 'no' ) : ?>
										<p class="form-row">
											<label for="reg_username"><?php _e( 'Username', 'jeg_textdomain' ); ?> <span class="required">*</span></label>
											<input type="text" class="input-text" name="username" id="reg_username" value="<?php if (isset($_POST['username'])) echo esc_attr($_POST['username']); ?>" />
										</p>
										<?php endif; ?>
										<p class="form-row">
											<label for="reg_email"><?php _e( 'Email', 'jeg_textdomain' ); ?> <span class="required">*</span></label>
											<input type="email" class="input-text" name="email" id="reg_email" value="<?php if (isset($_POST['email'])) echo esc_attr($_POST['email']); ?>" />
										</p>

										<p class="form-row">
											<label for="reg_password"><?php _e( 'Password', 'jeg_textdomain' ); ?> <span class="required">*</span></label>
											<input type="password" class="input-text" name="password" id="reg_password" value="<?php if (isset($_POST['password'])) echo esc_attr($_POST['password']); ?>" />
										</p>
										<p class="form-row">
											<label for="reg_password2"><?php _e( 'Re-enter password', 'jeg_textdomain' ); ?> <span class="required">*</span></label>
											<input type="password" class="input-text" name="password2" id="reg_password2" value="<?php if (isset($_POST['password2'])) echo esc_attr($_POST['password2']); ?>" />
										</p>
										<?php do_action( 'register_form' ); ?>
										<div class="clearfix"></div>

										<p class="form-row form-row-login">
											<?php wp_nonce_field('register', 'register') ?>
											<input type="submit" class="btn btn-primary" name="register" value="<?php _e( 'Register', 'jeg_textdomain' ); ?>" />
										</p>
									</form>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
					<?php endif; ?>

					<?php do_action('woocommerce_after_customer_login_form'); ?>

				</div>
			</div>
		</div>
	</div>
</div>
<script>
	(function($) {
		$(document).ready(function() {
			$(".mainpage").jnormalblog();
			$(".mainpage").jaccordionpage();
		});
	})(jQuery);
</script>