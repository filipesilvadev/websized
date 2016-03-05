<div class="blog-masonry-wrapper">
	<div class="isotopewrapper">
		<?php
			add_filter( 'excerpt_length', 'jeg_excerpt_masonry_length' );

			$paged = $_REQUEST['paged'];
			$statement = array(
				'post_type'				=> 'post',
				'post_status'			=> array('publish'),
			    'orderby'				=> "date",
			    'order'					=> "DESC",
				'paged' 				=> $paged,
				'posts_per_page'		=> vp_metabox('jkreativ_page_blogcontent.post_perpage', null, $_REQUEST['blogid'])
			);


			if(vp_metabox('jkreativ_page_blogcontent.toggle_filtering', null, $_REQUEST['blogid']) === '1')
			{
				$filter = vp_metabox('jkreativ_page_blogcontent.filtering_group.0', null, $_REQUEST['blogid']);

				if($filter['filter_type'] === 'category')
				{
					$statement['category__in'] = $filter['filter_category'];
				} else if($filter['filter_type'] === 'tags')
				{
					$statement['tag__in'] = $filter['filter_tags'];
				}
			} else {
				if(!empty($_REQUEST['category'])) {
					$statement['category__in'] = $_REQUEST['category'];
				}
			}

			if(!empty($_REQUEST['sort'])) {
				if($_REQUEST['sort'] === 'date') {
					$statement['orderby'] = "date";
					$statement['order'] = "DESC";
				} else {
					$statement['meta_key'] = "post_views_count";
					$statement['orderby'] = "meta_value_num";
					$statement['order'] = "DESC";
				}
			}

			$query = new WP_Query($statement);
			if ( $query->have_posts() ) {
				while ( $query->have_posts() )
				{
					$query->the_post();
					$blogitemtype = vp_metabox('jkreativ_blog_format.format');
                    jeg_get_template_part('template/blogpost/masonry', $blogitemtype);
				}
			} else {
			}

			wp_reset_postdata();
		?>
	</div>
	<?php
		if($query->max_num_pages > 1) {
			echo
			"<div class='blogpagingholder'>
				<div class='blogpagingwrapper hideme'>
				" . jeg_new_pagination(JEG_PAGE_ID, $paged, $query->max_num_pages) . "
				</div>
			</div>";
		}
	?>
</div>