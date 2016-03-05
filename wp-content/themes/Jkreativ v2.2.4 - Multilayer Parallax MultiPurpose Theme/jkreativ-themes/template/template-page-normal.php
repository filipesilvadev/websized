<?php
/** 
Template Name: Page - Normal Page Layout
 */
get_header(); 
if ( ! post_password_required() ) 
{
	$featured = jeg_get_page_featured_heading(1200, 750);
?>
<div class="headermenu">
	<?php jeg_get_template_part('template/rightheader'); ?>
</div> <!-- headermenu -->

<div class="contentheaderspace"></div>
<div class="pagewrapper <?php echo vp_metabox('jkreativ_page_heading.heading_position', 'inside'); ?> <?php echo vp_metabox('jkreativ_page_pageposition.page_width', 'fullwidth'); ?>  <?php echo vp_metabox('jkreativ_page_pageposition.page_position', 'pagecenter'); ?>  <?php echo vp_metabox('jkreativ_page_pageposition.blog_layout', 'nosidebar'); ?>">	
	<div class="pageholder">
		
		<?php 
			if($featured !== '' && vp_metabox('jkreativ_page_heading.heading_position', 'inside') === 'outside' && !post_password_required()) {
				echo "<div class='featured'>{$featured}</div>";
			}
		?>
		
		<div class="pageholdwrapper">
			<div class="mainpage blog-normal-article">
				<!-- article -->
				<?php 
					if( have_posts() ) {
						while(have_posts()){
							the_post();	
				?>		
				<div class="pageinnerwrapper">
					
					<?php 
						if($featured !== '' && vp_metabox('jkreativ_page_heading.heading_position', 'inside') === 'inside' && !post_password_required()) {
							echo "<div class='featured'>{$featured}</div>";
						}
					?>
					
					<div class="article-header">
						<h2><?php echo get_the_title(); ?></h2>
						<?php if(!vp_metabox('jkreativ_page_meta_top.hide_top_meta', null, JEG_PAGE_ID) && !post_password_required() ) { ?>
						<span class="meta-top">by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a>, <?php the_date(); ?></span>
						<?php } ?>
					</div> <!-- article header -->
					
					<div class="article-content">							
						<?php the_content() ?>
						<?php wp_link_pages(array('before'=>'<div class="post-pages">'.__('Pages:','jeg_textdomain'),'after'=>'</div>')); ?>		
					</div> <!-- article content -->
						
					<?php
						if(!vp_metabox('jkreativ_page_share.hide_share_button', null, JEG_PAGE_ID) && !post_password_required() ) {
							echo "<div class='article-sharing'>" . jeg_get_template_part('template/blogpost/article-sharing') .  "</div>";
						} 
					?>
					
					<div class="clearfix"></div>
					<?php comments_template(); ?>												
				</div> <!-- page inner wrapper -->
				<?php
						} 
					}
				?>
			</div>
			<?php
				if(vp_metabox('jkreativ_page_pageposition.blog_layout') === 'withsidebar') {
                    jeg_get_template_part('template/blogpost/sidebar');
				}
			?>
		</div>
	</div>
</div>

<script>
	(function($) {
		$(document).ready(function() {
			$(".mainpage").jnormalblog();
		});
	})(jQuery);
</script>

<?php
} else {
    jeg_get_template_part('template/password-form');
} 

get_footer(); 
?>