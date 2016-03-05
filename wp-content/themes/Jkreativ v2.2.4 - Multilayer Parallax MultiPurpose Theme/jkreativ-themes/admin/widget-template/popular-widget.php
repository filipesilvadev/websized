<?php

$statement = array(
	'post_type'				=> 'post', 
    'orderby'				=> "meta_value_num",
    'meta_key'				=> "post_views_count",
    'order'					=> "DESC",	    
	'posts_per_page'		=> $numberpost
);

$query = new WP_Query($statement);

echo "<div class='blog-popular-post'>";

if ( $query->have_posts() ) 
{
	while ( $query->have_posts() ) 
	{
		$query->the_post();
				
		$catlink = array();
		
		foreach(get_the_category() as $category) { $catlink[] = $category->name ; }
		$featured = jeg_get_featured_heading(get_the_ID(), 800, 400);
		$featuredhtml = '';
		if($featured !== '') {
			$featuredhtml = "<div class='article-image'>" . $featured . "</div>"; 
		}
		
		$blogitemtype = vp_metabox('jkreativ_blog_format.format');
		
		if($blogitemtype === 'quote') {
			
			$link = '';
			if(vp_metabox('jkreativ_blog_quote.quote_author_url')) {
				$link = "<a href='" . vp_metabox('jkreativ_blog_quote.quote_author_url') . "' class='author'>" . vp_metabox('jkreativ_blog_quote.quote_author') .  "</a>";
			} else {
				$link = vp_metabox('jkreativ_blog_quote.quote_author');
			}
			
			echo "
			<div class='article-sidebar'>
				<div class='article-quote-wrapper'>
					<quote>
						" . vp_metabox('jkreativ_blog_quote.quote_content') . "
					</quote>
					<div class='clearfix article-meta'>
						". vp_metabox('jkreativ_blog_quote.quote_prefix') . $link . " 						
					</div>
				</div>	
			</div>
			";
		} else if ($blogitemtype === 'ads') {
			echo "";
		} else {
			echo "
			<div class='article-sidebar'>
				{$featuredhtml}
				<div class='article-category'>
					" . implode(" ,", $catlink) . "
				</div>
				<h2><a href='"  . get_permalink(get_the_ID()) . "'>" . get_the_title()  . "</a></h2>
				<div class='clearfix article-meta'>
					" . get_the_date()  . "
				</div>
			</div>";
		}
		
	}
} 

echo "</div>";

wp_reset_postdata();