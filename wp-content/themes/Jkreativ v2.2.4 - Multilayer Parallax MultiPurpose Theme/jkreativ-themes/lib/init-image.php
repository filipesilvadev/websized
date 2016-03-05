<?php
/**
 * All image functionality 
 * available hook :
 * 		- jeg_register_image_size (register / modify another image size)
 * 
 * @author jegbagus
 */

/** 
 * get post thumbnail image, and return array of attribute  
 **/
function j_get_post_header_image($post, $size){
	$attachment_id 	= get_post_thumbnail_id($post->ID);
	$image = wp_get_attachment_image_src($attachment_id, $size);	
	if ( $image ) {
		list($src, $width, $height) = $image;
		$attachment = get_post($attachment_id);
		$default_attr = array(
			'src'	=> $src,
			'class'	=> "attachment-$size",
			'alt'	=> trim(strip_tags( get_the_title() ))
		);
		if ( empty($default_attr['alt']) )
			$default_attr['alt'] = trim(strip_tags( $attachment->post_excerpt )); // If not, Use the Caption
		if ( empty($default_attr['alt']) )
			$default_attr['alt'] = trim(strip_tags( $attachment->post_title )); // Finally, use the title
			
		return $default_attr;
	} else {
		return NULL;
	}	
}


/**
 * Build image tag from array
 * 
 * @param array $arrs
 */
function j_build_image ($arrs) 
{
	$html = "<img ";
	
	foreach( $arrs as $name => $value ) {
		$html .= " $name=" . '"' . $value . '"';
	} 
	$html .= " />";
	
	return $html;
}

/**
 * Get image meta description for image ( basedir , baseurl , imgpath , extension , height , width , destpath , imagetype)
 * 
 * @param string $source URL source of image
 * @return array of image meta description 
 */
function jeg_get_image_meta ($source) 
{
	// meta image container
	$meta = array();
	
	// define upload path & dir
	$upload_info 		= wp_upload_dir();
	$meta['basedir'] 	= $upload_info['basedir'];
	$meta['baseurl'] 	= $upload_info['baseurl'];
	
	// check if image is local
	if(strpos( $source, $meta['baseurl'] ) === false) 
	{
		return false;
	} else 
	{
		$destpath 			= str_replace( $meta['baseurl'], '', $source);
		$meta['imgpath']	= $meta['basedir'] . $destpath;
		
		// check if img path exists, and is an image indeed
		if( !file_exists($meta['imgpath']) OR !getimagesize($meta['imgpath']) ) 
		{
			return false;
		} else 
		{
			// get image info
			$info = pathinfo($meta['imgpath']);			
			$meta['extension'] = $info['extension'];
			
			// get image size
			$imagesize = getimagesize($meta['imgpath']);			
			$meta['width']		= $imagesize[0];
			$meta['height']		= $imagesize[1];
			$meta['imagetype'] 	= image_type_to_mime_type($imagesize[2]);
			
			// now define dest path
			$meta['destpath']	= str_replace( '.' . $meta['extension'], '' , $destpath);
			
			// return this meta 
			return $meta;
		}
	}
}

/**
 * Jeg Custom Resizer function
 * 
 * @param string 	$source
 * @param int 		$w
 * @param int 		$h
 * @param boolean 	$crop
 * @param string of color hex
 */
function jeg_image_resizer ($source, $w = false, $h = false, $nocrop = false, $fillcolor = "000000") 
{
	$meta = jeg_get_image_meta($source);
	$imgpath = '';
	
	if($meta)
	{
		if ($nocrop) {
			// show all image without croping zone
			$imgpath = jeg_resize_nocrop($meta, $w, $h, $fillcolor);
		} else {
			// show image with croping zone to fill container
			$imgpath = jeg_resize_crop($meta, $w, $h);
		}
		return $imgpath;
	} else {
		return $source;
	}
}


/**
 * Show all image without croping zone
 * 
 * @param array of $meta image
 * @param int $w
 * @param int $h
 * @param string hext of color
 * @param int $quality
 */
function jeg_resize_nocrop($meta, $w, $h, $fillcolor, $quality = 100) 
{
 	/* 
     * Do some math to figure out which way we'll need to crop the image
     * to get it proportional to the new size, then crop or adjust as needed
     */  
	$x_ratio = $w / $meta['width'];
    $y_ratio = $h / $meta['height'];

    if (($meta['width'] <= $w) && ($meta['height'] <= $h)) {
        $new_w = $meta['width'];
        $new_h = $meta['height'];
    } elseif (($x_ratio * $meta['height']) < $h) {
        $new_h = ceil($x_ratio * $meta['height']);
        $new_w = $w;
    } else {
        $new_w = ceil($y_ratio * $meta['width']);
        $new_h = $h;
    }
	
	$destination = $meta['basedir'] . $meta['destpath'] . '-' . $new_w . 'x' . $new_h . '-nocrop' . '.' . $meta['extension'] ;
	$desturl	= $meta['baseurl'] . $meta['destpath'] . '-' . $new_w . 'x' . $new_h . '-nocrop' . '.' . $meta['extension'] ;
	
	// check if file exist
	if( file_exists($destination) ) {
		return $desturl;
	}
	
	switch ($meta['imagetype']) {
        case 'image/jpeg':
            $source = imagecreatefromjpeg($meta['imgpath']);
            break;
        case 'image/gif':
            $source = imagecreatefromgif($meta['imgpath']);
            break;
        case 'image/png':
            $source = imagecreatefrompng($meta['imgpath']);
            break;
        default:
        	return;
    }
	    
    // do resizing and add background to fill
	$newpic = imagecreatetruecolor(round($new_w), round($new_h));
	imagecopyresampled($newpic, $source, 0, 0, 0, 0, $new_w, $new_h, $meta['width'], $meta['height']);
	$final = imagecreatetruecolor($w, $h);
       
	$fillbg = jeg_hex2RGB($fillcolor);
	$backgroundColor = imagecolorallocate($final, $fillbg['red'], $fillbg['green'], $fillbg['blue']);
	imagefill($final, 0, 0, $backgroundColor);
	imagecopy($final, $newpic, (($w - $new_w)/ 2), (($h - $new_h) / 2), 0, 0, $new_w, $new_h);
          
	if (imagejpeg($final, $destination, $quality)) {
		return $desturl;
	}
		
    return false;    
}


/** new resize dimension algorithm **/
function jeg_image_resize_dimensions($none, $orig_w, $orig_h, $dest_w, $dest_h, $crop) 
{
	if ($orig_w <= 0 || $orig_h <= 0)
		return false;
	// at least one of dest_w or dest_h must be specific
	if ($dest_w <= 0 && $dest_h <= 0)
		return false;	
	
	if($crop) {
		
		if(!empty($dest_w) && !empty($dest_h) && ( $orig_h < $dest_h || $orig_w < $dest_w )) 
		{
			$aspect_ratio_dest = $dest_w / $dest_h;
			
			$dump_h_result = $orig_w / $aspect_ratio_dest;
			$dump_w_result = $orig_h * $aspect_ratio_dest ;
			
			if($dump_h_result < $orig_h) {
				$crop_w = $orig_w;				// dest_w
				$crop_h = $dump_h_result;		// dest_h
			} else {
				$crop_w = $dump_w_result;		// dest_w
				$crop_h = $orig_h;				// dest_h
			}
			
			$new_h = $crop_h;
			$new_w = $crop_w;
			
			$s_x = floor( ($orig_w - $crop_w) / 2 );
			$s_y = floor( ($orig_h - $crop_h) / 2 );
									
			return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );
		} else {			
			// use default functionality at this stage
			return null;
		}
	} else {
		// use default functionality if not cropped
		return null;
	}
}

add_action('image_resize_dimensions', 'jeg_image_resize_dimensions', 10, 6);


/**
 * Build image that will fill the container
 * 
 * @todo : check kalau image lebih kecil, maka pake jeg_resize_nocrop 
 * 
 * @param array $meta of meta image
 * @param int $w
 * @param int $h
 * @return string of url path
 */
function jeg_resize_crop ($meta, $w, $h) 
{
	//get image size after cropping
	$dims = image_resize_dimensions($meta['width'], $meta['height'], $w, $h, true);
	$new_w = $dims[4];
	$new_h = $dims[5];		
	
	if($dims) {

        // create 2x file
        $destination2x  = $meta['basedir'] . $meta['destpath'] . '-' . $new_w . 'x' . $new_h . '@2x.' . $meta['extension'] ;
        if(!file_exists($destination2x)) {
            $dims2x = image_resize_dimensions($meta['width'], $meta['height'], $w*2, $h*2, true);
            jeg_image_resize_hub( $meta['imgpath'], $dims2x, null, $destination2x);
        }

		// create normal file
		$destination = $meta['basedir'] . $meta['destpath'] . '-' . $new_w . 'x' . $new_h . '.' . $meta['extension'] ;
		$desturl	= $meta['baseurl'] . $meta['destpath'] . '-' . $new_w . 'x' . $new_h . '.' . $meta['extension'] ;

		if(file_exists($destination) && getimagesize($destination)) {
			return $desturl;
		} else {
			$resized_img_path = jeg_image_resize_hub( $meta['imgpath'], $dims );
			$resized_rel_path = str_replace( $meta['basedir'], '', $resized_img_path);
			return ( $meta['baseurl'] . $resized_rel_path );
		}
		
		return $desturl;
	} else {
		return $meta['baseurl'] . $meta['destpath'] . '.' . $meta['extension'] ;
	}
}


/**
 * this function allow user to use themes bellow version 3.4
 */
function jeg_image_resize_hub($img_path, $dims, $crop = false, $resized_img_path = '') {
	if(function_exists('wp_get_image_editor')) {
		$image = wp_get_image_editor($img_path);
		$image->crop($dims[2], $dims[3], $dims[6], $dims[7], $dims[4], $dims[5]);

        if($resized_img_path == '') {
            $resized_img_path = $image->generate_filename();
        }
		$image->save($resized_img_path);	
	} 
	
	return $resized_img_path;
}