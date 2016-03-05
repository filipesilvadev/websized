<div class="article-masonry-container article-quote-container">
	<article class="article-masonry-box">
		<div class="article-masonry-wrapper clearfix">
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
	</article>
</div>