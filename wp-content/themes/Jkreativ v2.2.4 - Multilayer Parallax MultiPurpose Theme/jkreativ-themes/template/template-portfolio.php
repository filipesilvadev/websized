<?php 
/** 
Template Name: Portfolio - Portfolio List Page
 */
get_header();

if ( ! post_password_required() ) 
{
	$category = jeg_get_all_portfolio_category(JEG_PAGE_ID);
	$query = new WP_Query(array(
		'post_type' => 'portfolio',
		'meta_query' => array(
			array(
	           'key' => 'portfolio_parent',
	           'value' => array(JEG_PAGE_ID),
	           'compare' => 'IN',
	       )
	   	),
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'posts_per_page' => vp_metabox('jkreativ_portfolio_list_option.load_limit'),
		'paged' => 1	
	));
	
	$result = $query->posts;
?>
<div class="headermenu">
	<?php  if(sizeof($category) > 0) : ?>
	<div class="portfoliofilter topleftmenu">
		<div class="portfoliofilterbutton" data-text="<?php echo vp_metabox('jkreativ_portfolio_list_option.filtertitle'); ?>">
			<span><?php echo vp_metabox('jkreativ_portfolio_list_option.filtertitle'); ?></span>
		</div>
		<div class="portfoliofilterlist">
			<ul>
				<li data-filter=""><?php _e('All Category','jeg_textdomain'); ?></li>
				<?php 
					foreach($category as $key => $cat) :
						echo "<li data-filter='$key'>$cat</li>";
					endforeach;  
				?>
			</ul>
		</div>
	</div>
	<?php  endif; ?>
	<?php jeg_get_template_part('template/rightheader'); ?>
</div> <!-- headermenu -->


<?php
	$pinterestclass = '';
	$usepinterest = vp_metabox('jkreativ_portfolio_list_option.portfolio_type');
	
	$marginsize = '';
	$marginportfolioclass = '';
	
	if($usepinterest == 'pinterest') {
		$pinterestclass = 'pinterestportfolio';
	}

	$usemargin =  vp_metabox('jkreativ_portfolio_list_option.use_margin');
	if($usemargin) {
		$marginsize = vp_metabox('jkreativ_portfolio_list_option.margin_size');			
		$marginportfolioclass = 'marginportfolio';
	}
	
?>
<div class="portfoliowrapper <?php echo $pinterestclass ?>">
	<div class="contentheaderspace"></div>
	
	<?php  if(sizeof($category) > 0) : ?>
	<div class="filterfloat">
		<div class="filterfloatbutton">
			<span><?php echo vp_metabox('jkreativ_portfolio_list_option.filtertitle'); ?></span>
		</div>
		<div class="filterfloatlist">
			<ul>
				<li data-filter=""><?php _e('All Category','jeg_textdomain'); ?></li>
				<?php 
					foreach($category as $key => $cat) :
						echo "<li data-filter='$key'>$cat</li>";
					endforeach;  
				?>
			</ul>
		</div>
	</div>	
	<?php  endif; ?>
	
	<div class="portfoliocontentwrapper <?php echo $marginportfolioclass; ?>" style="<?php echo "padding: {$marginsize}px"; ?>">
		<div class="isotopewrapper">			
			<?php
				$itemwidthbase = vp_metabox('jkreativ_portfolio_list_option.item_width', null, JEG_PAGE_ID);
				$portfoliolayout = vp_metabox("jkreativ_portfolio_list_option.portfolio_type", null, JEG_PAGE_ID);
				$itemheightdim = null;
				$itemheightbase = '';
				
				if($portfoliolayout == 'normal') {
					$itemheightdim = floatval ( vp_metabox('jkreativ_portfolio_list_option.item_height', null, JEG_PAGE_ID) );
					$itemheightbase = $itemheightdim * $itemwidthbase;
				}
				
				foreach($result as $key => $value) {
					$coverwidth = get_post_meta($value->ID, "coverwidth", true);
					$coverheight = get_post_meta($value->ID, "coverheight", true);									
					
					// calculate width & height cover
					$itw = $itemwidthbase * $coverwidth * 1.5;
					
					$ith = null;					
					if($portfoliolayout == 'normal') {
						$ith = $itemheightbase * $coverheight * 1.5;
					}
					
					$coverimage = jeg_get_image_attachment(get_post_meta($value->ID, "coverimage", true));
					$thumbnail = jeg_image_resizer($coverimage, $itw, $ith);	
					
					$portfoliotype = get_post_meta($value->ID, "portfolio_layout", true);
					
					if($portfoliotype === 'anotherpage') {
						$portfoliolink = vp_metabox('jkreativ_portfolio_link.portfolio_link', null, $value->ID);
					} else {
						$portfoliolink = get_permalink($value->ID);
					}
					
					
					/** term list / category **/
					$termlist = get_the_terms($value->ID, JEG_PORTFOLIO_CATEGORY);
					$termstring = array();
					
					if($termlist) {
						foreach($termlist as $term) {
							$termstring[] = $term->name;
						}
					}
					
					$categorystring = '';
					if(!empty($termstring)) {
						$categorystring = "<span></span><p>" . implode(', ', $termstring)  . "</p>";
					}
					
					/** overlay **/
					$overrideoverlay = get_post_meta($value->ID, "override_overlay", true);
					$overlaycss = '';
					$overlaytextswitch = '';
					if($overrideoverlay) {
						$overlaydata = get_post_meta($value->ID, "portfolio_overlay", true);
						$overlaycss = "background-color: {$overlaydata[0]['color']}";
						if($overlaydata[0]['switch_text']) {
							$overlaytextswitch = 'textswitch';
						}
					}
					
					echo 
					"<div class='portfolioitem' style='padding: {$marginsize}px;' data-width='{$coverwidth}' data-height='{$coverheight}'>
						<a href='{$portfoliolink}' data-type='{$portfoliotype}' data-id='{$value->ID}' style='margin: 0;'>
							<img alt='{$value->post_title}' src='{$thumbnail}'>
							<div class='mask {$overlaytextswitch}' style='{$overlaycss}'>					
								<div class='info'>
									<h2>{$value->post_title}</h2>
									{$categorystring}
								</div>												
							</div>
						</a>
					</div>\n";
				}
			?>
		</div>
		<div class="portfoliopagingholder">
			<div class="portfoliopagingwrapper hideme">										
				<div class="pagedot">
					<ul>
						<?php
							$maxnum = $query->max_num_pages;
							for($i = 1; $i <= $maxnum; $i++) {
								$activeclass = '';
								if($i === 1) $activeclass = 'active';
								echo "<li data-page='$i' class='" . $activeclass . "'><span>$i</span></li>";
							} 
						?>
					</ul>
				</div>
				<div class="pagetext">
					<span class="pagenow"><?php _e('Page','jeg_textdomain'); ?> <strong class="curpage">1</strong></span>
					<span class="pagetotal"><?php _e('From','jeg_textdomain'); ?> <strong class="totalpage"><?php echo $query->max_num_pages; ?></strong></span>
				</div> 
			</div>
		</div>
	</div>	
	<div class="portfolioinputfilter">
		<form>
			<input type="hidden" name="portfolioid" value="<?php echo get_the_ID(); ?>"/>
			<input type="hidden" name="category"/>
			<input type="hidden" name="page"/>
			<input type="hidden" name="action" value="get_portfolio_filter"/>
		</form>
	</div>
</div>


<?php
	if(vp_metabox("jkreativ_portfolio_list_option.expand_type") === 'normal') {
        jeg_get_template_part('template/portfolio/portfolio-fragment-content');
	}
?>
<div class="portfolioloader bigloader"></div>
<script>
	(function($){
		$(document).ready(function(){
			$(".portfoliowrapper").jportfolio({
				adminurl : '<?php echo admin_url("admin-ajax.php"); ?>',
				loadAnimation : '<?php echo vp_metabox("jkreativ_portfolio_list_option.load_animation") ; ?>',
				portfoliosize : <?php echo vp_metabox("jkreativ_portfolio_list_option.item_width") ; ?>,
				expandtype : '<?php echo vp_metabox("jkreativ_portfolio_list_option.expand_type"); ?>',
				tiletype : '<?php echo vp_metabox("jkreativ_portfolio_list_option.portfolio_type"); ?>',
				dimension : '<?php echo floatval ( vp_metabox('jkreativ_portfolio_list_option.item_height') ) ?>',
				margin: '<?php echo $marginsize ?>'
			});
		});		
	})(jQuery);
</script>

<?php
} else {
    jeg_get_template_part('template/password-form');
} 
get_footer('portfolio'); 
?>