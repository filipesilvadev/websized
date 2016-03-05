<?php
	$populatesocial = jeg_populate_social(); 
	if(!empty($populatesocial)) : 
?>
	<div class="footsocial">
		<?php echo jeg_social_icon(false); ?>
	</div>
<?php 
	endif; 
?>