<?php 
/**
 * @author Jegbagus
 */
get_header(); 
?>

<div class="headermenu">
	<?php jeg_get_template_part('template/rightheader'); ?>
</div> <!-- headermenu -->

<?php
	if( have_posts() ) {
		while(have_posts()) {
			the_post();
			the_content();
		}
	}
?>

<?php
get_footer(); 
?>