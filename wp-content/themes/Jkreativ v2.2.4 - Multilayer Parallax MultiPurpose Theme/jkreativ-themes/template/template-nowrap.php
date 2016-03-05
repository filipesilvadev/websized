<?php
/** 
Template Name: No Wrapper
 */
get_header();

if(function_exists('is_woocommerce')) {
	if(is_account_page() && is_user_logged_in()) {
        jeg_get_template_part('template/nowrap', 'account');
	} else if(is_checkout()) {
        if(is_wc_endpoint_url('order-received')) {
            jeg_get_template_part('template/nowrap');
        } else {
            jeg_get_template_part('template/nowrap', 'checkout');
        }

	} else {
        jeg_get_template_part('template/nowrap');
	}	
} else {
    jeg_get_template_part('template/nowrap');
}
?>
