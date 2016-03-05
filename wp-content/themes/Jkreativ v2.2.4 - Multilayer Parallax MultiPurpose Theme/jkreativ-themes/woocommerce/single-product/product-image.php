<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.14
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $post, $woocommerce, $product;
$attachment_ids = $product->get_gallery_attachment_ids();

if ( $attachment_ids ) {
	$gallerydata = jeg_get_gallery_product_data($post->ID);
	$overwritewidth = $gallerydata['product_fullwidth'];
	
	// resize image
	if($overwritewidth) {
		$itemwidth = $gallerydata['product_width'];	
		$itw = $itemwidth * 1.5;
		$ith = null;
		if($gallerydata['gallery_layout'] == 'normal') {
			$ith = $itw * floatval ( $gallerydata['product_height'] );
		} else if($gallerydata['gallery_layout'] === 'justified') {
			$ith = $gallerydata['justified_height'] * 1.5;
			$itw = null;
		}
	}
	
	foreach($attachment_ids as $attachment){
		$image = jeg_get_image_attachment($attachment);
		if($overwritewidth) {
			// actual resize
				
			$thumbnail = jeg_image_resizer($image, $itw, $ith);
			
			// title		
			$title = get_the_title($attachment);
			
			// margin
			$marginsize = 0;
			if($gallerydata['user_margin']) {
				$marginsize = $gallerydata['margin_size'];
			}
					
			// echo
			echo 
			"<div class='imggalitem notloaded' data-width='1' data-height='1' style='padding: {$marginsize}px;'>
				<a href='{$image}' data-type='image' style='margin: 0px;'>
					<img src='{$thumbnail}' alt='" . $title . "'>
					<div class='galoverlay'></div>
				</a>
			</div>";
		} else {
			echo 
			"<div class='imageholder'>
				<img src='$image'/>													
			</div>";
		}
		
	}
}
?>