<?php 
/**
 * @author Jegbagus
 */
get_header(); 
?>

<div class="headermenu">
	<?php jeg_get_template_part('template/rightheader'); ?>
</div> <!-- headermenu -->

<div class="contentheaderspace"></div>
<div class="pagewrapper pagecenter fullwidth nosidebar cartpage">
	<div class="pageholder">
		
		<div class="pageholdwrapper">										
			<div class="mainpage blog-normal-article">
				<div class="pageinnerwrapper">
					<div class="article-header">	
						<h2><?php _e('checkout','jeg_textdomain'); ?></h2>
					</div>
					<div class="article-content">						
						<div class="jkreativ-woocommerce">
							<div class="cart_wrapper">						        
							    <?php
									if( have_posts() ) {
										while(have_posts()) {
											the_post();
											the_content();
										}
									}
								?>
							    <div class="clearfix"></div>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>									
	</div>
</div>




<?php
get_footer(); 
?>