<div class="clean-blog-article">
    <div class="clean-blog-content">
        <div class="clean-blog-content-wrapper article-quote-wrapper">
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
    <div class="clean-blog-meta">
        <div class="clean-blog-meta-wrapper">
            <div class="clean-meta-top"><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a>, <?php echo get_the_date(); ?></div>

            <?php if(!vp_metabox('jkreativ_page_share.hide_share_button', null, JEG_PAGE_ID) && !post_password_required() ) { ?>
                <div class="article-sharing">
                    <?php jeg_get_template_part('template/blogpost/article-sharing-clean'); ?>
                </div> <!-- article sharing -->
            <?php } ?>
        </div>
    </div>
</div>