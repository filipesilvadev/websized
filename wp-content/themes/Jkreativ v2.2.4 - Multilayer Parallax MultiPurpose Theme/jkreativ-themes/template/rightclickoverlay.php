<?php if(vp_option("joption.disable_rightclick") === "1") : ?>
<div class="rightclickoverlay">
	<div class="creditcontainer">
		<?php echo do_shortcode(vp_option('joption.msg_rightclick')); ?>
	</div>
	
	<div class="roverlayclose"></div>
	
	<?php if(vp_option("joption.rightclick_background_music") === "1") : ?>
	<div class="creditaudio">
		<audio id="creditaudioplayer" loop>
			<?php if(vp_option("joption.rightclick_mp3")) : ?>
			<source src="<?php echo vp_option("joption.rightclick_mp3"); ?>" type="audio/mpeg">
			<?php endif; ?>
						
			<?php if(vp_option("joption.rightclick_ogg")) : ?>
	  		<source src="<?php echo vp_option("joption.rightclick_ogg"); ?>" type="audio/ogg">
	  		<?php endif; ?>	  		
		</audio>
	</div> 
	<?php endif; ?>
</div>
<?php endif; ?>