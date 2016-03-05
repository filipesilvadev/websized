<li>
	<a href="<?php echo get_permalink( wc_get_page_id( 'myaccount' ) ); ?>">
		<?php _e('My Account', 'jeg_textdomain'); ?>
	</a>
</li>
<li>
	<a href="<?php echo wc_customer_edit_account_url(); ?>">
		<?php _e('Edit Account', 'jeg_textdomain'); ?>
	</a>
</li>
<li>
	<a href="<?php echo wc_get_endpoint_url('edit-address'); ?>">
		<?php _e('Edit Address', 'jeg_textdomain'); ?>
	</a>
</li>
<?php echo jeg_account_navigation(); ?>
<li>
	<a href="<?php echo wp_logout_url( get_permalink( wc_get_page_id( 'myaccount' ) ) ); ?>">
		<?php _e('Sign Out', 'jeg_textdomain'); ?>
	</a>
</li>