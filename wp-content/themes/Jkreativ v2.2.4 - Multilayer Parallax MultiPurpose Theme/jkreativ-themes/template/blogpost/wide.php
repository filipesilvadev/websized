<?php
	$featured = jeg_get_featured_heading(get_the_ID(), 1200, 750);
	$postid = get_the_ID();
?>

<!-- blog wide article -->
<div class="blog-normal-article">
	<div class="article">
		<div class="article-header">
			<a href="<?php echo get_permalink($postid) ?>"><h2><?php echo get_the_title(); ?></h2></a>
			<?php if(!vp_metabox('jkreativ_page_meta_top.hide_top_meta', null, JEG_PAGE_ID) && !post_password_required() ) { ?>
			<span class="meta-top">by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a>, <?php echo get_the_date(); ?></span>
			<?php } ?>
		</div>

		<div class="article-inner-wrapper">
			<?php if(!vp_metabox('jkreativ_page_share.hide_share_button', null, JEG_PAGE_ID)) { ?>
			<div class="article-share">
				<?php jeg_get_template_part('template/blogpost/article-sharing-big'); ?>
			</div>
			<?php } ?>
			<div class="article-wrapper">
				<?php if(!post_password_required()) { ?>
				<div class='featured'>
					<?php echo $featured ?>
				</div>
				<?php } ?>
				<div class="article-content">
					<p class="post-excerpt">
						<?php echo get_the_excerpt() ?>
					</p>
				</div>
				<?php
					if(!vp_metabox('jkreativ_page_meta_btm.hide_bottom_meta', null, JEG_PAGE_ID) && !post_password_required() ) {
                        jeg_get_template_part('template/blogpost/article-bottom-meta');
					}
				?>
			</div>
		</div>
	</div>
</div>
<!-- blog wide article end -->