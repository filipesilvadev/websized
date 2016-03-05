<?php
	$featured = jeg_get_featured_masonry_heading(get_the_ID(), 500, 500);
?>
<div class="article-masonry-container">
	<article class="article-masonry-box">
		<div class="article-masonry-wrapper clearfix">
			<?php
				if(!post_password_required()) {
					echo $featured;
				}
			?>
			<h2><a href="<?php echo get_permalink() ?>"><?php echo get_the_title(); ?></a></h2>

			<?php if(!vp_metabox('jkreativ_page_meta_top.hide_top_meta', null, JEG_PAGE_ID) && !post_password_required() ) { ?>
			<div class="clearfix article-meta"><?php echo get_the_date(); ?></div>
			<?php } ?>

			<?php if ( get_the_excerpt() != "" ): ?>
			<div class="article-masonry-summary">
				<p class="post-excerpt">
					<?php echo get_the_excerpt() ?>
				</p>
			</div>
			<?php endif; ?>

			<?php
				if(!vp_metabox('jkreativ_page_meta_btm.hide_bottom_meta', null, JEG_PAGE_ID) && !post_password_required() ) {
                    jeg_get_template_part('template/blogpost/article-masonry-bottom-meta');
				}
			?>
		</div>
	</article>
</div>