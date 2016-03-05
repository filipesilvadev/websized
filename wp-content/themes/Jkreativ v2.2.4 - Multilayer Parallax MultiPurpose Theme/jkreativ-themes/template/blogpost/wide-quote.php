<?php
	$featured = jeg_get_featured_heading(get_the_ID(), 1000, 625);
?>

<!-- blog wide article -->
<div class="blog-normal-article">
	<div class="article">
		<div class="article-inner-wrapper">
			<?php if(!vp_metabox('jkreativ_page_share.hide_share_button', null, JEG_PAGE_ID)) { ?>
			<div class="article-share">
				<?php jeg_get_template_part('template/blogpost/article-sharing-big'); ?>
			</div>
			<?php } ?>
			<div class="article-wrapper article-quote-valign">
				<div class="article-quote-wrapper">
					<quote>
	                    <sup class='fa fa-quote-left'></sup>
	                    <span><?php echo vp_metabox('jkreativ_blog_quote.quote_content'); ?></span>
	                    <sup class='fa fa-quote-right'></sup>
	                </quote>
					<div class="clearfix article-meta">
						<?php echo vp_metabox('jkreativ_blog_quote.quote_prefix'); ?>
						<?php
							if(vp_metabox('jkreativ_blog_quote.quote_author_url')) {
								echo "- <a target='_blank' href='" . vp_metabox('jkreativ_blog_quote.quote_author_url') . "' class='author'>" . vp_metabox('jkreativ_blog_quote.quote_author') .  "</a>";
							} else {
								echo "- ". vp_metabox('jkreativ_blog_quote.quote_author');
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- blog wide article end -->