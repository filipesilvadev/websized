<div class="span3 accountnavigation">
	<div class="account-user">
		<?php
			$current_user = wp_get_current_user(); 
			echo get_avatar( $current_user->user_email, 50 ); 
		?>
	    <span class="user-name"><?php echo $current_user->user_login ?></span>
	   	<span class="logout-link"><a href="<?php echo wp_logout_url( get_permalink( wc_get_page_id( 'myaccount' ) ) ); ?>"><?php _e('Sign out', 'jeg_textdomain') ?></a></span>		 																	
	    <br>
	</div>
	<ul id="menu-account-menu">
		<?php get_template_part('template/accountnavigation'); ?>
	</ul>
</div>