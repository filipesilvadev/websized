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
						<h2><?php echo the_title(); ?></h2>
					</div>
					<div class="article-content">						
						<div class="jkreativ-woocommerce">
							<div class="cart_wrapper">
						        <div class="row-fluid">
							    	<?php woocommerce_get_template( 'myaccount/account-navigation.php' ); ?>							    	
								    <div class="span9 accountcontent">								    	
								    	<?php
											if( have_posts() ) {
												while(have_posts()) {
													the_post();
													the_content();
												}
											}
										?>								    	
							    	</div>
							    </div>
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