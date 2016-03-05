<?php
	$sliderid = jeg_get_slider_id();
?>
<div class="landingslider">
	<div class="splitslider">
		<div id="slider" class="sl-slider-wrapper">
			<div class="sl-slider">
				<?php
					$slideritem = vp_metabox('jkreativ_slider_splitslider.slideritem', null, $sliderid);
					foreach($slideritem as $id => $slider) {
						if($id % 2 == 0) {
							echo '<div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">';
						} else {
							echo '<div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">';
						}
						
						$pos = '';
						if($slider['text_align'] == 'center') {
							$pos = 'center';
						} else if($slider['text_align'] == 'left') {
							$pos = 'leftpos';
						} else if($slider['text_align'] == 'right') {
							$pos = 'rightpos';
						}
						
						$secondline = '';
						if($slider['show_secondline']) {
							$secondline = "<div class='text2'>{$slider['secondline']}</div>";
						}
						
						
						$thirdline = '';
						if($slider['show_thirdline']) {
							$thirdline = 
							"<div class='text3'>
								<a href='{$slider['buttonurl']}' class='slider-button'>													
									<span class='button-text'>{$slider['buttontext']}</span>
								</a>
							</div>";
						}
						
						
						echo "<div class='sl-slide-inner'>
								<div class='bg-img' style='background-image: url(" . jeg_get_image_attachment($slider['background']) . ")'></div>
								<div class='bg-overlay'></div>
								<div class='slidewrapper item {$pos}'>
									<div class='slidewrapcontainer'>
										<div class='slidewrappos'>
											<div class='text1'>" . do_shortcode($slider['firstline']) . "</div>
											{$secondline}
											{$thirdline}
										</div>
									</div>
								</div>
							</div>
						</div>";
					}
				?>
			</div>
			
			<nav id="nav-arrows" class="nav-arrows">
				<span class="nav-arrow-prev"></span>
				<span class="nav-arrow-next"></span>
			</nav>

			<nav id="nav-dots" class="nav-dots">
				<?php
					foreach($slideritem as $id => $slider) {
						if($id === 0) {
							echo '<span class="nav-dot-current"></span>';
						} else {
							echo '<span></span>';
						}
					} 
				?>
			</nav>
		</div>					
	</div>
	<div class="sliderloader bigloader"></div>	
</div>