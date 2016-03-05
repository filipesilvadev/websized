<?php
/**
Template Name: Blog - Clean Layout
 */
get_header();

if ( ! post_password_required() )
{
?>
<div class="headermenu">
	<?php jeg_get_template_part('template/rightheader'); ?>
</div> <!-- headermenu -->
<div id="main" class="clean-blog-wrapper">
	<div class="contentheaderspace"></div>

	<?php
		$paged = jeg_get_query_paged();
		$statement = array(
			'post_type'				=> "post",
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
                jeg_get_template_part('template/blogpost/clean', $blogitemtype);
			}
		} else {
		}

		if($query->max_num_pages > 1) { ?>

		<div class="blogcleanpaging">
			<div class="pagination-wrapper clearfix">
				<div class="nav-prev"><?php previous_posts_link('&larr; Older Entries', $query->max_num_pages); ?></div>
				<div class="nav-next"><?php next_posts_link('Next Entries &rarr;', $query->max_num_pages); ?></div>
			</div>
		</div>

		<?php }

		wp_reset_postdata();
	?>

</div>
<script>
	(function($) {
		$(document).ready(function() {
			$("#main").jnormalblog();
		});
	})(jQuery);
</script>

<?php
} else {
    jeg_get_template_part('template/password-form');
}

get_footer();
?>