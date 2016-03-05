<?php
	$navobj = jeg_get_navigation_setup();
	if($navobj['navpos'] == 'side' && $navobj['navtopmenu'] ) {
?>
<div class="searchcontent">
	<?php get_search_form(); ?>
	<div class="closesearch">
		<i class="fa fa-times"></i>
	</div>
</div>
<div class="searchheader">
	<i class="fa fa-search"></i>
</div>
<?php
	if(function_exists('is_woocommerce'))  {
        jeg_get_template_part('template/navigation-side', 'woo');
	}
}
?>