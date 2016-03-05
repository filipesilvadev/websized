<?php
/** 
Template Name: Blog - Wide Layout
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
				$paged = jeg_get_query_paged();
				$statement = array(
					'post_type'				=> 'post', 								
				    'orderby'				=> "date",
				    'order'					=> "DESC",					    
					'paged' 				=> $paged,
					'posts_per_page'		=> vp_metabox('jkreativ_page_blogcontent.post_perpage')
				);
				
				if(vp_metabox('jkreativ_page_blogcontent.toggle_filtering') === '1')
				{
					$filter = vp_metabox('jkreativ_page_blogcontent.filtering_group.0');
					
					if($filter['filter_type'] === 'category') 
					{
						$statement['category__in'] = $filter['filter_category'];
					} else if($filter['filter_type'] === 'tags') 
					{
						$statement['tag__in'] = $filter['filter_tags'];
					}
				}
				
				$query = new WP_Query($statement);
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) 
					{
						$query->the_post();										
						$blogitemtype = vp_metabox('jkreativ_blog_format.format');
                        jeg_get_template_part('template/blogpost/wide', $blogitemtype);
					}
				} else {
					echo 
					"<div class='blog-normal-article postnotfound'>
						<div class='article'>
							<div class='pagetext'>
								<span class='pagetotal'>
								" . __('Post Not Found','jeg_textdomain') . "
								</span>
							</div>
						</div>
					</div>";
				}
				
				if($query->max_num_pages > 1) {
					echo 
					"<div class='blognormalpaging blogpagingholder'>
						<div class='blognormalpagingwrapper'>	
						" . jeg_new_pagination(get_the_ID(), $paged, $query->max_num_pages) . "
						</div>
					</div>";
				}
									
				wp_reset_postdata();
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
				followlike 	: 0
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