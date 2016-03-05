<?php
	global $post;
	$sectionbuilder = null;
	
	if($post->post_type === 'portfolio') {
		$sectionbuilder = vp_metabox('jkreativ_portfolio_landing.sectionbuilder');
	} else if($post->post_type === 'page') {
		$sectionbuilder = vp_metabox('jkreativ_page_landing.sectionbuilder');
	}

    if(vp_option('joption.enable_section_builder')) {
        foreach($sectionbuilder as $secid => $section) {
            $additionalstyle = '';
            $overlaybackground = '';
            $additionalclass = '';
            $additionalsectiondata = '';
            $parallaxhtml = '';

            $sectionid = jeg_to_slug($section['section_id']);

            $textschema = ' light ';
            if($section['section_schema'] === 'normal') {
                $textschema = ' ';
            }

            switch($section['section_background']) {
                case 'color' :
                    $additionalstyle .= " background-color: {$section['background_color']}; ";
                    break;
                case 'imagebg' :
                    $additionalstyle .= "background-image : url(" . jeg_get_image_attachment($section['imagebg'][0]['image_background']) . ");";
                    $additionalstyle .= "background-position : {$section['imagebg'][0]['background_vertical_position']} {$section['imagebg'][0]['background_horizontal_position']};";
                    $additionalstyle .= "background-repeat	: {$section['imagebg'][0]['background_repeat']};";
                    $additionalstyle .=  ( $section['imagebg'][0]['background_fullscreen'] ) ? "background-size : cover;" : "" ;

                    if($section['imagebg'][0]['background_overlay']) {
                        $overlaybackground = "<div class='parallaxoverlay' style='background:" . $section['imagebg'][0]['background_overlay'] . ";'></div>";
                    }
                    break;
                case 'movingbg' :
                    $additionalstyle .= " background-image : url(" . jeg_get_image_attachment($section['movingbg'][0]['image_background']) . ");";
                    if(wp_is_mobile()) {
                        $additionalclass .= " movingbgmobile ";
                    } else {
                        $additionalclass .= " movingbg ";
                    }
                    $additionalsectiondata .= " data-direction='" . $section['movingbg'][0]['direction']  . "' ";

                    if($section['movingbg'][0]['background_overlay']) {
                        $overlaybackground = "<div class='parallaxoverlay' style='background: " . $section['movingbg'][0]['background_overlay'] . ";'></div>";
                    }
                    break;
                case 'parallaxbg' :
                    $mp = $section['mparallax'];

                    if(!wp_is_mobile()) {

                        global $is_IE;
                        $mode =  $is_IE ? 1 : 2;

                        if($mode == 1) {
                            $additionalclass 		= " parallax parallaxbackground ";
                            $additionalsectiondata 	= " data-speed='" . $mp[0]['speed'] . "' data-position='" . $mp[0]['position'] . "' ";

                            $additionalstyle 	    .= "background-image : url(" . jeg_get_image_attachment($mp[0]['image']) . ");";
                            $additionalstyle 		.=  ( $mp[0]['fullscreen'] ) ? "background-size : cover;" : "" ;

                            if($section['parallax_overlay']) {
                                $overlaybackground = "<div class='parallaxoverlay' style='background: " . $section['parallax_overlay'] . ";'></div>";
                            }

                            if( sizeof($mp) > 1) {
                                $sizemp = sizeof($mp);
                                for($i = 1; $i < $sizemp; $i++) {
                                    $parallaxstlye 	= '';
                                    $parallaxstlye	.= "background-image : url(". jeg_get_image_attachment($mp[$i]['image']) .");";
                                    $parallaxstlye	.=  ( $mp[$i]['fullscreen'] ) ? "background-size : cover;" : "" ;

                                    $parallaxsection = " data-speed='" . $mp[$i]['speed'] . "' data-position='" . $mp[$i]['position'] . "' ";
                                    $parallaxhtml .= "<div class='parallax parallaxbackground' style='" . $parallaxstlye . "' " . $parallaxsection . "></div>";
                                }
                            }
                        } else {
                            for($i = 0; $i < sizeof($mp); $i++) {
                                $datasize = ( $mp[$i]['fullscreen'] ) ? "cover;" : "nostretch";
                                $parallaxhtml .= "<img class='newparallax' alt='" . __("parallax layer", "jeg_textdomain") . "' src='" . jeg_get_image_attachment($mp[$i]['image']) . "' data-speed='{$mp[$i]['speed']}' data-sizemode='{$datasize}' data-position='{$mp[$i]['position']}'/>";
                            }

                            if($section['parallax_overlay']) {
                                $overlaybackground = "\n\t<div class='parallaxoverlay' style='background: " . $section['parallax_overlay'] . ";'></div>";
                            }
                        }

                    } else {
                        // switch to this background
                        $additionalclass .= " parallaxfallback ";
                        $additionalstyle .= " background-image : url(" . jeg_get_image_attachment($mp[0]['image']) . "); ";

                        if($section['parallax_overlay']) {
                            $overlaybackground = "\n\t<div class='parallaxoverlay' style='background: " . $section['parallax_overlay'] . ";'></div>";
                        }
                    }
                    break;
                case 'video' :
                    if($section['video'][0]['background_overlay']) {
                        $overlaybackground = "<div class='parallaxoverlay' style='background: " . $section['video'][0]['background_overlay'] . ";'></div>";
                    }
                    break;
            }
?>
	<section 
		class="<?php echo $section['section_top_margin']; ?> <?php echo $section['section_bottom_margin']; ?> <?php echo $textschema ?> <?php echo $additionalclass ?> " 
		data-id="<?php echo $sectionid; ?>" 
		data-title="<?php echo $section['section_name'] ?>"
		<?php echo $additionalsectiondata; ?> 
		style="<?php echo $additionalstyle ?>">
		
		<?php if($section['section_background'] === 'video') { ?>	
		<div class="video-wrap video-fixed video-fullscreen <?php echo ( $section['video'][0]['enable_parallax'] ) ? "parallaxvideo" : "" ?>">
			<div class="video-fallback" style="background-image: url('<?php echo jeg_get_image_attachment($section['video'][0]['bgfallback']); ?>')"></div>
			<video autoplay="autoplay" loop="loop" autobuffer="autobuffer" poster="<?php echo jeg_get_image_attachment($section['video'][0]['bgfallback']); ?>" muted
                   data-height="<?php echo $section['video'][0]['videoheight']; ?>"
                   data-width="<?php echo $section['video'][0]['videowidth']; ?>">
				<?php if($section['video'][0]['videomp4']) : ?>
			    <source src="<?php echo $section['video'][0]['videomp4'] ?>" type="video/mp4" />
			    <?php endif; ?>
			    
			    <?php if($section['video'][0]['videowebm']) : ?>
			    <source src="<?php echo $section['video'][0]['videowebm'] ?>" type="video/webm" />
			    <?php endif; ?>
			    
			    <?php if($section['video'][0]['videoogg']) : ?>
			    <source src="<?php echo $section['video'][0]['videoogg'] ?>" type="video/ogg" />
			    <?php endif; ?>		    
			</video>
		</div>
		<?php } ?>
		
		<?php echo $parallaxhtml; ?>
		<?php echo $overlaybackground; ?>
		
		<?php 
			if(isset($section['enable_top_ribon']) && $section['enable_top_ribon']) {
				$topribonsize = wp_get_attachment_image_src($section['top_ribon_bg']);
				echo "<div class='section-top-ribon' style='background-image:url(" . jeg_get_image_attachment($section['top_ribon_bg']) . "); height: {$topribonsize[2]}px;'></div>";
			}
			
			if(isset($section['enable_bottom_ribon']) && $section['enable_bottom_ribon']) {
				$bottomribonsize = wp_get_attachment_image_src($section['bottom_ribon_bg']);
				echo "<div class='section-bottom-ribon' style='background-image:url(" . jeg_get_image_attachment ( $section['bottom_ribon_bg'] ) . "); height: {$bottomribonsize[2]}px;'></div>";
			}
		?>	
		
		<div class="sectioncontainer">		
			<?php echo apply_filters('the_content', $section['content']); ?>
		</div>
		
	</section>
<?php
	    }
    } else {
?>
        <section style=" background-color: #FFFFFF; " data-title="Here is the section" data-id="testing-section" class="doubletopmargin doublebottommargin">
            <div class="sectioncontainer">
                <div class=" alert alert-info alert-dismissable">
                    <strong>Legacy Section Builder</strong>
                    <ul>
                        <li>You see this message because you updating themes into version 2.0.0</li>
                        <li>If you need to enable legacy section builder, go to Jkreativ Dashboard > General Setting > Enable Legacy Section Builder (Enable this option)</li>
                        <li>On Update 2.0.0 We are including Visual Composer into Themes, and we encourage you to use Visual Commposer instead Legacy Section Builder </li>
                    </ul>
                </div>
            </div>
        </section>
<?php
    }
?>
