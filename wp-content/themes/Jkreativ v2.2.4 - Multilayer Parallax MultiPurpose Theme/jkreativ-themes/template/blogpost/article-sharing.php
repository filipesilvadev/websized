<?php
    global $post;
    $postid = get_the_ID();

    if(is_single()) {
        /** portfolio **/
        if($post->post_type === 'portfolio') {
            $coverimage = jeg_get_image_attachment(get_post_meta($post->ID, "coverimage", true));
        } else
        /** post **/
        if($post->post_type === 'post') {
            $cover = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );
            $coverimage = '';
            if(is_array($cover)) {
                $coverimage = $cover[0];
            }
        }
    }
?>
<div class="normal-sharrre-container normal-post-sharrre">
	<div class="twitter-share-block" 
		data-url="<?php echo get_permalink($postid); ?>"
		data-text="<?php echo get_the_title(); ?>" 
		data-title="<?php _e('Tweet','jeg_textdomain') ?>"></div>
	<div class="facebook-share-block" 
		data-url="<?php echo get_permalink($postid); ?>"
		data-text="<?php echo get_the_title(); ?>" 
		data-title="<?php _e('Like','jeg_textdomain') ?>"></div>
	<div class="googleplus-share-block" 
		data-url="<?php echo get_permalink($postid); ?>"
		data-text="<?php echo get_the_title(); ?>" 
		data-title="<?php _e('Share','jeg_textdomain') ?>"></div>
	<div class="pinterest-share-block" 
		data-url="<?php echo get_permalink($postid); ?>"
		data-text="<?php echo get_the_title(); ?>"
        data-image="<?php echo $coverimage; ?>"
		data-title="<?php _e('Pin It','jeg_textdomain') ?>"></div>
</div>
<div class='clearfix'></div>