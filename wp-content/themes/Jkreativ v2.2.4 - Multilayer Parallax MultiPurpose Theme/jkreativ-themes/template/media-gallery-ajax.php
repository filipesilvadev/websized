<?php

	$mediagallery 	= get_post_meta(JEG_PAGE_ID, 'jkreativ_gallery', true);
	$gallerylayout 	= vp_metabox('jkreativ_page_mediagallery.gallery_type', null, JEG_PAGE_ID);
	$itemwidthbase 	= vp_metabox('jkreativ_page_mediagallery.item_width', null, JEG_PAGE_ID);
	$itemheightdim 	= null;
	$itemheightbase = '';
	
	$overwritewidth = vp_metabox('jkreativ_page_mediagallerycontent.image_fullwidth', null, JEG_PAGE_ID);
	
	if($gallerylayout == 'normal') {
		$itemheightdim = floatval ( vp_metabox('jkreativ_page_mediagallery.item_height', null, JEG_PAGE_ID) );
		$itemheightbase = $itemheightdim * $itemwidthbase;
	} else if($gallerylayout === 'justified') {
		$itemheightbase = floatval ( vp_metabox('jkreativ_page_mediagallery.justified_item_height', null, JEG_PAGE_ID) );
	}
	
	$usemargin =  vp_metabox('jkreativ_page_mediagallery.use_margin', null, JEG_PAGE_ID);
	$marginsize = 0;
	$althidetitle = vp_metabox('jkreativ_page_mediagallery.photoswipe_setting.0.photoswipe_hide_title', null, JEG_PAGE_ID);
	$notloadedclass = 'notloaded';
    $showimagetitle = vp_metabox('jkreativ_page_mediagallery.show_image_title', 0, JEG_PAGE_ID);

	if($usemargin) {
		$marginsize = vp_metabox('jkreativ_page_mediagallery.margin_size',  null, JEG_PAGE_ID);	
		$additionalmarginclass = "marginimg";
	}
	
	$limitload = vp_metabox('jkreativ_page_mediagallery.load_limit', 50, JEG_PAGE_ID);
	
	if($mediagallery) {
		$bottomlimit = JEG_GALLERY_PAGE * $limitload;
		$uplimit = ( JEG_GALLERY_PAGE + 1 ) * $limitload;
		
		for($key = $bottomlimit ; $key < $uplimit ; $key++)
		{
			if(!isset($mediagallery[$key])) continue;
			$value = $mediagallery[$key];
			
			// calculate width & height cover
			if($gallerylayout === 'normal' || $gallerylayout === 'masonry') {
				$itw = $itemwidthbase * $value['width'] * 1.5;
				
				$ith = null;
				if($gallerylayout !== null) {
					$ith = $itemheightbase * $value['height'] * 1.5;
				}
			} else if($gallerylayout === 'justified') {
				$itw = null;
				$ith = $itemheightbase * 1.5;
			}
			
			
			if($value['type'] === 'image') {
				$image = jeg_get_image_attachment($value['imageid']);
				$thumbnail = jeg_image_resizer($image, $itw, $ith);
				
				if(!$althidetitle) {
					$imgname = $value['imagename'];								
				} else {
					$imgname = '';
				}

                $showimagetitletag = '';
                $showimagetitleclass = '';
                if($showimagetitle == 1) {
                    $showimagetitletag = '<div class="gallery-title"><span>'. $value['imagename'] .'</span></div>';
                    $showimagetitleclass = 'showimagetitle';
                }
				
				if($overwritewidth) {
                    echo
                        "<div class='imageholder $showimagetitleclass'><div class='fullimgwrapper'><img src='$image' alt='". $value['imagename'] ."'/>" . $showimagetitletag . "</div></div>";
				} else {
                    $galleryoverlay = "<div class='galoverlay'></div>";
                    if($showimagetitle == 1) {
                        $galleryoverlay = $showimagetitletag;
                    }
					echo 
					"<div class='imggalitem {$notloadedclass} {$showimagetitleclass}' data-width='{$value['width']}' data-height='{$value['height']}' style='padding: {$marginsize}px;'>
						<a href='{$image}' data-type='image' style='margin: 0px;' title='{$imgname}'>
							<img src='{$thumbnail}' alt='{$value['imagename']}'>
							{$galleryoverlay}
						</a>
					</div>";
				}
			} else if($value['type'] === 'youtube' || $value['type'] === 'vimeo' || $value['type'] === 'soundcloud') {
				$image = jeg_get_image_attachment($value['mediacover']);
				$thumbnail = jeg_image_resizer($image, $itw, $ith);
				
				if($overwritewidth) {
					echo 
					"<div class='imageholder'>
						<div data-type='{$value['type']}' data-src='{$value['mediaurl']}'>
							<div class='video-container'></div>
						</div>
					</div>";
				} else {
					echo 
					"<div class='imggalitem {$notloadedclass}'  data-width='{$value['width']}' data-height='{$value['height']}' style='padding: {$marginsize}px;'>
						<a href='{$value['mediaurl']}' data-type='{$value['type']}-gallery' style='margin: 0px;'>
							<img src='{$thumbnail}' alt=''>
							<div class='videooverlay'></div>
						</a>
					</div>";
				}
			} else if($value['type'] === 'html5video') {
				$image 		= jeg_get_image_attachment($value['mediacover']);
				$thumbnail 	= jeg_image_resizer($image, $itw, $ith);
				
				if($value['videomp4'] !== '') {
					$videomp4 = "<source type='video/mp4' src='{$value['videomp4']}' />";
				}
				
				if($value['videowebm'] !== '') {
					$videowebm = "<source type='video/webm' src='{$value['videowebm']}' />";
				}
		    	    	    	
				if($value['videoogg'] !== '') {
					$videoogg = "<source type='video/ogg' src='{$value['videoogg']}' />";
				}    	
		    	    	
		    	$html5video = 
		    	"<video id='player' poster='{$image}' controls='controls' preload='none'>
					{$videomp4} 
					{$videowebm} 
					{$videoogg} 						
					<object width='100%' height='100%' type='application/x-shockwave-flash' data='" . get_template_directory_uri() . "/public/mediaelementjs/flashmediaelement.swf'> 
						<param name='movie' value='" . get_template_directory_uri() . "/public/mediaelementjs/flashmediaelement.swf' />
						<param name='flashvars' value='controls=true&amp;file={$value['videomp4']}' />
						<img src='{$image}' alt='No video playback capabilities' title='No video playback capabilities' />
					</object>
				</video>";
				
				if($overwritewidth) {
					echo 
					"<div class='imageholder'>
						<div data-type='{$value['type']}'>
							<div class='video-container'>
								{$html5video}
							</div>
						</div>
					</div>";
				} else {
					$uniqueid = uniqid();
					echo 
					"<div class='imggalitem {$notloadedclass}' data-width='{$value['width']}' data-height='{$value['height']}' style='padding: {$marginsize}px;'>
						<a href='#html5popup" . $uniqueid . "' data-type='{$value['type']}' style='margin: 0px;'>
							<img src='{$thumbnail}' alt=''>
							<div class='videooverlay'></div>
						</a>
						<div id='html5popup" . $uniqueid . "' class='html5popup-wrapper mfp-hide'>
							<div class='mfp-html5video-scaler'>
								{$html5video}
							</div>
						</div>						
					</div>";
				}
			}
		}
	}
?>