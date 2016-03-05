<?php
/** 
Template Name: Page - Wide Page Layout
 */
get_header(); 
if ( ! post_password_required() ) 
{
	$shareclass = ( vp_metabox('jkreativ_page_share.hide_share_button', null, JEG_PAGE_ID) === '1') ? "hideshare" : "";
?>
<div class="headermenu">
	<?php jeg_get_template_part('template/rightheader'); ?>
</div> <!-- headermenu -->

<div class="blog-normal-wrapper">
	<div class="blog-big-wrapper">
		<div class="blog-main-content <?php echo $shareclass; ?>">
			<?php 
				if( have_posts() ) {
					while(have_posts()){
						the_post();
						$featured = jeg_get_page_featured_heading(1200, 750);						
			?>
			<div class="blog-normal-article">
				<div class="article">
					<?php							
					if($featured !== '' && vp_metabox('jkreativ_page_heading.heading_position', 'inside') === 'outside' && !post_password_required()) {
						echo "<div class='featured'>{$featured}</div>";
					} 
					?>
					<div class="article-header">
						<h2><?php echo get_the_title(); ?></h2>
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
							<?php							
							if($featured !== '' && vp_metabox('jkreativ_page_heading.heading_position', 'inside') === 'inside' && !post_password_required()) {
								echo "<div class='featured'>{$featured}</div>";
							} 
							?>
							<div class="article-content">
								<?php the_content() ?>
								<?php wp_link_pages(array('before'=>'<div class="post-pages">'.__('Pages:','jeg_textdomain'),'after'=>'</div>')); ?>
							</div>							
						</div>
					</div>
					
				</div>
			</div>			
			<?php
						comments_template();
					}
				}
			?>
			
			<div class="blog-right-content-float"></div>
		</div>
		<div class="blog-right-content">
			<div class="blog-right-content-wrapper">
				<?php  
					if(function_exists('dynamic_sidebar')) {
						$sidebarname = vp_metabox('jkreativ_page_blogwide.sidebar_name');
						dynamic_sidebar($sidebarname); 
					} 
				?>
			</div>
			<div class="blog-right-content-float"></div>
		</div>
	</div>
</div>
<script>
	(function($) {
		$(document).ready(function() {			
			$(".blog-normal-wrapper").jnormalblog({				
				followlike : 1
			});
		});
	})(jQuery);
</script>

<?php
} else {
    jeg_get_template_part('template/password-form');
} 

get_footer(); 
?>