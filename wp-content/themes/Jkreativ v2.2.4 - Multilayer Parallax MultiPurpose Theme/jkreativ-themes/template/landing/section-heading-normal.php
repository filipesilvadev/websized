<?php
	 $uselight 			= ( vp_metabox('jkreativ_page_landing.heading_normal.0.light_heading') == 1 ) ? 'light' : '';
	 $coverbg 			= ( vp_metabox('jkreativ_page_landing.heading_normal.0.cover_parallax_background') == '1' ) ? 'cover' : 'auto' ;
	 $backgroundimage 	= jeg_get_image_attachment ( vp_metabox('jkreativ_page_landing.heading_normal.0.heading_background') );
	 $overlaycolor 		= vp_metabox('jkreativ_page_landing.heading_normal.0.overlay_color');
?>
<section class="nomargin nopadding headingparallax <?php echo $uselight ?>">
	<div class="bgholder">
		<div class="bgitem" style="background-image: url('<?php echo $backgroundimage ?>'); background-size: <?php echo $coverbg ?>"></div>
	</div>
	<div class="heading-background" style="background-color: <?php echo $overlaycolor; ?>;"></div>
	<div class="sectioncontainer sectionheading parallaxtext">
		<div class="span6">
			<h2><?php echo vp_metabox('jkreativ_page_landing.heading_normal.0.first_text_heading'); ?></h2>
			<span><?php echo vp_metabox('jkreativ_page_landing.heading_normal.0.second_text_heading'); ?></span>
		</div>
	</div>
</section>