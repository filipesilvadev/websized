<?php
/**
Template Name: Blog - Normal Layout
 */
get_header();

if ( ! post_password_required() )
{
?>

<div class="headermenu">
	<?php jeg_get_template_part('template/rightheader'); ?>
</div> <!-- headermenu -->

<?php
	$blogwidth = vp_metabox('jkreativ_page_pageposition.page_width', 'fullwidth');
	$pageposition = vp_metabox('jkreativ_page_pageposition.page_position', 'pagecenter');
	$blogsidebar = vp_metabox('jkreativ_page_pageposition.blog_layout', 'nosidebar');
	
	if(is_null($blogwidth)) $blogwidth = 'fullwidth'; 
	if(is_null($pageposition)) $pageposition = 'pagecenter';
	if(is_null($blogsidebar)) $blogsidebar = 'nosidebar';
?>

<div class="contentheaderspace"></div>
<div class="pagewrapper <?php echo $blogwidth; ?>  <?php echo $pageposition; ?>  <?php echo $blogsidebar; ?>">
	<div class="pageholder">
		<div class="pageholdwrapper">
			<div class="mainpage blog-normal-article">
				<!-- article -->
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
							$blogitemtype = vp_metabox('jkreativ_blog_format.format', null);
                            jeg_get_template_part('template/blogpost/normal', $blogitemtype);
						}
					} else {
						echo
						"<div class='pageinnerwrapper postnotfound'>
							<div class='blognormalpagingwrapper'>
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