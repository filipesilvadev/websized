<?php

/**
 * @author : jegbagus
 */

/** show message if sort by order not clicked **/
function alert_not_order_portfolio() {
	$screen = get_current_screen();
	if ( $screen->post_type === 'portfolio' && $screen->base === 'edit' ) {		
		if(class_exists('Simple_Page_Ordering')) {
			echo "<div class='updated' id='message'><p>You can <strong>Drag Portfolio</strong> to sort Position Order</p></div>";
		} else {			
			echo "<div class='updated' id='message'><p>Please Enable <strong>Simple Page Ordering Plugin</strong></p></div>";
		}
	} 
}

add_action('admin_notices', 'alert_not_order_portfolio');
 
 
/**
 * Portfolio
 */

// portfolio order

function jeg_portfolio_admin_order($wp_query) {
	if(is_admin()) {
		$post_type = $wp_query->query['post_type'];
		
		if($post_type === JEG_PORTFOLIO_POST_TYPE) {
			if(class_exists('Simple_Page_Ordering')) {
				// menu_order
				$wp_query->set('orderby', 'menu_order');  
				$wp_query->set('order', 'ASC');
			}
		}
	}
}

add_filter('pre_get_posts', 'jeg_portfolio_admin_order');  

function jeg_post_type_portfolio()
{
    $args =
    array(
    	'labels' 	=>
	    	array(
				'name' 				=> 'Portfolio',
				'singular_name' 	=> 'Portfolio Item',
				'add_new'			=> 'Add Portfolio',
				'add_new_item' 		=> 'Add Portfolio',
				'edit_item' 		=> 'Edit Portfolio',
				'new_item' 			=> 'New Portfolio',
				'view_item' 		=> 'View Item',
				'search_items' 		=> 'Search Portfolio Items',
				'not_found' 		=> 'No portfolio items found',
				'not_found_in_trash'=> 'No portfolio items found in Trash',
				'parent_item_colon' => ''
		    ),
		'description'			=> 'Portfolio Post type',
        'public' 				=> true,
        'show_ui' 				=> true,
    	'menu_icon'				=> get_template_directory_uri() . '/public/img/portfolio.png',
		'menu_position'			=> 6,
        'capability_type' 		=> 'post',
        'hierarchical' 			=> false,
		'supports' 				=> array('title' , 'editor', 'comments', 'page-attributes'),
	 	'rewrite' 				=> array('slug' => '%portfolio_page%','with_front'=>true),
	 	'taxonomies' 			=> array(JEG_PORTFOLIO_CATEGORY)
	);

	register_post_type( JEG_PORTFOLIO_POST_TYPE, $args);
	
	add_rewrite_tag( '%portfolio%', '([^/]+)' );
	add_permastruct('portfolio', '%portfolio_page%/%portfolio%/', false );
}

function jeg_add_portfolio_rewrite_rule() {
    global $wpdb;

    $querystr = "
	    SELECT $wpdb->posts.*
	    FROM $wpdb->posts, $wpdb->postmeta
	    WHERE $wpdb->posts.ID = $wpdb->postmeta.post_id
	    AND $wpdb->postmeta.meta_key = '_wp_page_template'
	    AND $wpdb->postmeta.meta_value = 'template/template-portfolio.php'
	    AND $wpdb->posts.post_status = 'publish'
	    AND $wpdb->posts.post_type = 'page'";

    $pageposts = $wpdb->get_results($querystr, OBJECT);

    foreach ($pageposts as $pagepost){
        add_rewrite_rule($pagepost->post_name.'/([^/]*)/?$','index.php?portfolio=$matches[1]','top');
        add_rewrite_rule($pagepost->post_name.'/([^/]+)/page/?([0-9]{1,})/?$','index.php?portfolio=$matches[1]&paged=$matches[2]','top');
    }
}

add_action('after_setup_theme', 'jeg_add_portfolio_rewrite_rule');

function jeg_create_portfolio_rewrite_rule($post_id) {	
	$pagetype = get_post_type($post_id);	
	if($pagetype === 'page') {		
		$template = get_post_meta($post_id,'_wp_page_template',true);		
		if($template === 'template/template-portfolio.php') {
			$pagepost = get_post($post_id);
			add_rewrite_rule($pagepost->post_name.'/([^/]*)/?$','index.php?portfolio=$matches[1]','top');
			add_rewrite_rule($pagepost->post_name.'/([^/]+)/page/?([0-9]{1,})/?$','index.php?portfolio=$matches[1]&paged=$matches[2]','top');
			flush_rewrite_rules();
		} 
	}	
	return true;
}

add_action( 'save_post', 'jeg_create_portfolio_rewrite_rule' );

function jeg_assign_portfolio_order($data, $postarr) {
	$post_type = $data['post_type'];
	if ($data['menu_order'] === 0 && $data['post_type'] === JEG_PORTFOLIO_POST_TYPE) {
		global $wpdb;
		$data['menu_order'] = $wpdb->get_var("SELECT MAX(menu_order)+1 AS menu_order FROM {$wpdb->posts} WHERE post_type='{$post_type}'");
	}
	return $data;
}

add_action( 'wp_insert_post_data', 'jeg_assign_portfolio_order', 10, 2 );
 
function jeg_portfolio_taxonomy ()
{
	/** register portfolio category **/
	register_taxonomy(JEG_PORTFOLIO_CATEGORY, array(JEG_PORTFOLIO_POST_TYPE),
		array(
			'hierarchical' 		=> true,
			'label' 			=> 'Portfolio Categories',
			'singular_label' 	=> 'Portfolio Categories',
			'rewrite' 			=> true,
			'query_var' 		=> true
		));
}

function portfolio_permalink($permalink, $post_id, $leavename)
{
    if (strpos($permalink, '%portfolio_page%') === FALSE) {
    	return $permalink;
    } else {
    	// Get post
        global $wpdb;

 		$sql = "
  			SELECT $wpdb->postmeta.meta_value
			FROM $wpdb->postmeta
  			LEFT JOIN $wpdb->posts ON ($wpdb->posts.ID = $wpdb->postmeta.post_id)
  			WHERE $wpdb->posts.ID = '".$post_id->ID."'
   	  		AND $wpdb->postmeta.meta_key = 'portfolio_parent'
   	  		GROUP BY $wpdb->postmeta.meta_id";

	   	$pageid = $wpdb->get_var($sql);

		if(empty($pageid)) {
			$slugname = 'portfolio';
		} else {
			$page = get_post($pageid);
			$slugname = $page->post_name;
		}

		return str_replace('%portfolio_page%', $slugname, $permalink);
    }
}

function jeg_portfolio_columns($columns)
{
	unset($columns['date']);
	$columns['portfoliotemplate'] = 'Portfolio Template';
	$columns['thumbwidth'] = 'Thumb Width';
	$columns['thumbheight'] = 'Thumb Height';
	$columns['portfolioparent'] = 'Portfolio Page';
	unset($columns['date']);
	return $columns;
}

function jeg_add_portfolio_parent_query($query)
{
	global $pagenow;
	if ($pagenow=='edit.php') {
        $query[] = 'portfolio_parent';
    }
    return $query;
}

function jeg_portfolio_parent_filters($query)
{
	if(!is_admin())
		return;

	global $typenow;
	if($typenow === 'portfolio') {
		$portfolioparent = $query->get('portfolio_parent');
		if($portfolioparent !== '') {
			$query->set('meta_key', 'portfolio_parent');
			$query->set('meta_value', $portfolioparent);
		}
	}
}

function jeg_restrict_listings_by_portfolio_parent()
{
	global $typenow;
	if ($typenow=='portfolio') {
		global $wpdb;
		global $wp_query;

		$querystr = "
		    SELECT $wpdb->posts.*
		    FROM $wpdb->posts, $wpdb->postmeta
		    WHERE $wpdb->posts.ID = $wpdb->postmeta.post_id
		    AND $wpdb->postmeta.meta_key = '_wp_page_template'
		    AND $wpdb->postmeta.meta_value = 'template/template-portfolio.php'
		    AND $wpdb->posts.post_status = 'publish'
		    AND $wpdb->posts.post_type = 'page'";

		$pageposts = $wpdb->get_results($querystr, OBJECT);
				
		$html = "<select name='portfolio_parent'><option value=''>Show all portfolio page</option>";
		foreach($pageposts as $portfolio) {
			
			if( isset($wp_query->query['portfolio_parent']) && $portfolio->ID === $wp_query->query['portfolio_parent']) {
				$html .= "<option selected=\"selected\" value='{$portfolio->ID}'>Parent Page : {$portfolio->post_title}</option>";
			} else {
				$html .= "<option value='{$portfolio->ID}'>Parent Page : {$portfolio->post_title}</option>";
			}
		}
		$html .= "</select>";
		echo $html;
	}
}


function jeg_add_quick_edit($column_name, $post_type)
{
	if($column_name === 'thumbwidth') {
		?>
		    <fieldset class="inline-edit-col-right">
			    <div class="inline-edit-col">
					<span class="title">Thumb Width</span>
					<input type="hidden" name="jeg_widget_set_noncename" id="jeg_widget_set_noncename" value="" />
					<select name='post_portfolio_width' id='post_portfolio_width'>
						<option value="0.25">1/4x Width</option>
						<option value="0.5">1/2x Width</option>
						<option value="1">1x width</option>
						<option value="2">2x width</option>
						<option value="3">3x width</option>
					</select>
			    </div>
		    </fieldset>
		<?php
	}

	if($column_name === 'thumbheight') {
		?>
		    <fieldset class="inline-edit-col-right">
			    <div class="inline-edit-col">
					<span class="title">Thumb Height</span>
					<input type="hidden" name="jeg_widget_set_noncename" id="jeg_widget_set_noncename" value="" />
					<select name='post_portfolio_height' id='post_portfolio_height'>
						<option value="0.25">1/4x Width</option>
						<option value="0.5">1/2x Width</option>
						<option value="1">1x width</option>
						<option value="2">2x width</option>
						<option value="3">3x width</option>
					</select>
			    </div>
		    </fieldset>
		<?php
	}
}

function jeg_quick_edit_javascript()
{
    global $current_screen;
    if (($current_screen->id == 'edit-portfolio') && ($current_screen->post_type == 'portfolio')) {
    	?>
		    <script type="text/javascript">
		    <!--
		    function set_portfolio_inline_script(coverwidth, coverheight, nonce) {
		        // revert Quick Edit menu so that it refreshes properly
		        inlineEditPost.revert();
		        		        
		        jQuery('#post_portfolio_width').val(coverwidth);
		        jQuery('#post_portfolio_height').val(coverheight);
		        
		        setTimeout(function(){
		        	if(jQuery('#post_portfolio_width').val() !== coverwidth) {
		        		jQuery('#post_portfolio_width').val(coverwidth);
		        	}
		        	if(jQuery('#post_portfolio_height').val() !== coverheight) {
		        		jQuery('#post_portfolio_height').val(coverheight);
		        	}
		        }, 100);				
		    }
		    //-->
		    </script>
    	<?php
	}
}

function jeg_expand_quick_edit_link($actions, $post)
{
    if (get_post_type() == 'portfolio') {
		$nonce = wp_create_nonce( 'jeg_portfolio_set'.$post->ID);
	    $width = get_post_meta( $post->ID, 'coverwidth', TRUE);
		$height = get_post_meta( $post->ID, 'coverheight', TRUE);
	    $actions['inline hide-if-no-js'] = '<a href="#" class="editinline" title="';
	    $actions['inline hide-if-no-js'] .= esc_attr(  'Edit this item inline' ) . '" ';
	    $actions['inline hide-if-no-js'] .= " onclick=\"set_portfolio_inline_script('{$width}', '{$height}', '{$nonce}')\">";
	    $actions['inline hide-if-no-js'] .=  'Quick&nbsp;Edit';
	    $actions['inline hide-if-no-js'] .= '</a>';
	}
	return $actions;

}

add_action('after_setup_theme', 'jeg_post_type_portfolio');
add_action('after_setup_theme', 'jeg_portfolio_taxonomy');
add_filter('post_link', 'portfolio_permalink', 10, 3);
add_filter('post_type_link', 'portfolio_permalink', 10, 3);
add_filter('manage_edit-portfolio_columns', 'jeg_portfolio_columns');

add_action('restrict_manage_posts','jeg_restrict_listings_by_portfolio_parent');
add_filter('query_vars', 'jeg_add_portfolio_parent_query');
add_action('pre_get_posts', 'jeg_portfolio_parent_filters' );
add_action('quick_edit_custom_box',  'jeg_add_quick_edit', 10, 2);
add_action('save_post', 'jeg_save_portfolio_size' );
add_action('admin_footer', 'jeg_quick_edit_javascript');
add_filter('post_row_actions', 'jeg_expand_quick_edit_link', 10, 2);


function jeg_save_portfolio_size( $post_id )
{
    // verify if this is an auto save routine. If it is our form has not been submitted, so we dont want
    // to do anything
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
        return $post_id;

	// Check permissions
	if ( isset($_REQUEST['post_type']) && $_REQUEST['post_type'] == 'page' ) {
        if ( !current_user_can( 'edit_page', $post_id ) )
            return $post_id;
    } else {
        if ( !current_user_can( 'edit_post', $post_id ) )
        return $post_id;
    }

	// OK, we're authenticated: we need to find and save the data
    $post = get_post($post_id);

	if (isset($_POST['post_portfolio_width']) && ($post->post_type != 'revision')) {
        $post_portfolio_width = esc_attr($_POST['post_portfolio_width']);
        if ($post_portfolio_width) {
            update_post_meta( $post_id, 'coverwidth', $post_portfolio_width);
		} 
    } 
	
	if (isset($_POST['post_portfolio_height']) && ($post->post_type != 'revision')) {
        $post_portfolio_height = esc_attr($_POST['post_portfolio_height']);
        if ($post_portfolio_height) {
            update_post_meta( $post_id, 'coverheight', $post_portfolio_height);
		}
    } 
	
	$post_id;
}


/***
 * additional information on post page
 */

function jeg_post_columns($columns)
{
	$columns['posttype'] = 'Blog Post Type';
	return $columns;
}

function jeg_post_custom_column ($name)
{
	global $post;
	global $typenow;

	switch ($name) {
		case 'posttype'	:
			$format = vp_metabox('jkreativ_blog_format.format', null, $post->ID);
			switch ($format) {
				case 'standard':
					echo "Standard";
					break;
				case 'ads':
					echo "Ads";
					break;
				case 'quote':
					echo "Quote";
					break;
				case 'soundcloud':
					echo "Soundcloud";
					break;
				case 'youtube':
					echo "Youtube";
					break;
				case 'vimeo':
					echo "Vimeo";
					break;
				case 'imgslider':
					echo "Image Slider";
					break;
				case 'html5video':
					echo "Self Hosted HTML 5 Video";
					break;
				default:
					break;
			}
			break;
		case 'portfoliotemplate'	:
			$layout = get_post_meta($post->ID, 'portfolio_layout', true);
			switch ($layout) {
				case 'ajax':
					echo "Ajax Portfolio";
					break;
				case 'cover':
					echo "Cover portfolio";
					break;
				case 'sidecontent':
					echo "Side content";
					break;
				case 'landingpage':
					echo "Landing page";
					break;
                case 'landingpagevc':
                    echo "Landing page";
                    break;
                case 'anotherpage':
                    echo "Link to another page";
                    break;
				default:
					break;
			}
			break;
		case 'thumbwidth'	:
			$coversize = get_post_meta($post->ID, 'coverwidth', true);
			switch ($coversize) {
				case '0.25':
					echo "1/4x width";
					break;
				case '0.5':
					echo "1/2x width";
					break;
				case '1':
					echo "1x width";
					break;
				case '2':
					echo "2x width";
					break;
				case '3':
					echo "3x width";
					break;
				default:
					break;
			}
			break;
		case 'thumbheight'	:
			$coversize = get_post_meta($post->ID, 'coverheight', true);
			switch ($coversize) {
				case '0.25':
					echo "1/4x height";
					break;
				case '0.5':
					echo "1/2x height";
					break;
				case '1':
					echo "1x height";
					break;
				case '2':
					echo "2x height";
					break;
				case '3':
					echo "3x height";
					break;
				default:
					break;
			}
			break;
		case 'portfolioparent'	:
			$id = get_post_meta($post->ID, 'portfolio_parent', true);
			$parent = get_post($id);
			$editlink = admin_url('edit.php') . "?post_type=portfolio&portfolio_parent=" . $id;
			echo "<a href='" . $editlink . "'>" . $parent->post_title . "</a>";
			break;
	}
}

add_filter('manage_edit-post_columns'	, 'jeg_post_columns');
add_action('manage_posts_custom_column'	 , 'jeg_post_custom_column');




/**
 * Slider Post Type
 */
function jeg_post_type_slider()
{
	$args =
    array(
    	'labels' 	=>
	    	array(
				'name' 				=> 'Landing Slider',
				'singular_name' 	=> 'Slider Item',
				'add_new'			=> 'Add Slider',
				'add_new_item' 		=> 'Add Slider',
				'edit_item' 		=> 'Edit Slider',
				'new_item' 			=> 'New Slider',
				'view_item' 		=> 'View Item',
				'search_items' 		=> 'Search Slider Items',
				'not_found' 		=> 'No Slider items found',
				'not_found_in_trash'=> 'No Slider items found in Trash',
				'parent_item_colon' => ''
		    ),
		'description'			=> 'Slider Post type',
        'public' 				=> false,
        'show_ui' 				=> true,
    	'menu_icon'				=> get_template_directory_uri() . '/public/img/slider.png',
		'menu_position'			=> 6,
        'capability_type' 		=> 'post',
        'hierarchical' 			=> false,
		'supports' 				=> array('title')
	);

	register_post_type( 'slider', $args);
}

add_action('after_setup_theme', 'jeg_post_type_slider');


/**
 * Team Post Type
 */
function jeg_post_type_team()
{
    if(vp_option('joption.enable_section_builder')) {
        $args =
            array(
                'labels' 	=>
                    array(
                        'name' 				=> 'Team Member',
                        'singular_name' 	=> 'Team Item',
                        'add_new'			=> 'Add Team',
                        'add_new_item' 		=> 'Add Team',
                        'edit_item' 		=> 'Edit Team Entry',
                        'new_item' 			=> 'New Team Member',
                        'view_item' 		=> 'View Team',
                        'search_items' 		=> 'Search Team Items',
                        'not_found' 		=> 'No Team items found',
                        'not_found_in_trash'=> 'No Team items found in Trash',
                        'parent_item_colon' => ''
                    ),
                'description'			=> 'Team Post type',
                'public' 				=> false,
                'show_ui' 				=> true,
                'menu_icon'				=> get_template_directory_uri() . '/public/img/user.png',
                'menu_position'			=> 6,
                'capability_type' 		=> 'post',
                'hierarchical' 			=> true,
                'supports' 				=> array('title')
            );

        register_post_type( 'team', $args);
    }
}

add_action('after_setup_theme', 'jeg_post_type_team');



/**
 * Pricing Table
 */
function jeg_post_type_pricing()
{
    if(vp_option('joption.enable_section_builder')) {
        $args =
            array(
                'labels' 	=>
                    array(
                        'name' 				=> 'Pricing Table',
                        'singular_name' 	=> 'Pricing Item',
                        'add_new'			=> 'Add Pricing',
                        'add_new_item' 		=> 'Add Pricing',
                        'edit_item' 		=> 'Edit Pricing Entry',
                        'new_item' 			=> 'New Pricing Entry',
                        'view_item' 		=> 'View Pricing',
                        'search_items' 		=> 'Search Pricing Items',
                        'not_found' 		=> 'No Pricing items found',
                        'not_found_in_trash'=> 'No Pricing items found in Trash',
                        'parent_item_colon' => ''
                    ),
                'description'			=> 'Pricing Post type',
                'public' 				=> false,
                'show_ui' 				=> true,
                'menu_icon'				=> get_template_directory_uri() . '/public/img/pricing.png',
                'menu_position'			=> 6,
                'capability_type' 		=> 'post',
                'hierarchical' 			=> true,
                'supports' 				=> array('title')
            );

        register_post_type( 'pricing', $args);
    }
}

add_action('after_setup_theme', 'jeg_post_type_pricing');


/** rss feed to include portfolio */
function jeg_rss_request($qv) {
    if (isset($qv['feed']) && !isset($qv['post_type']))
        $qv['post_type'] = array('post', 'portfolio');
    return $qv;
}
add_filter('request', 'jeg_rss_request');
