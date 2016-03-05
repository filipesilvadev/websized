<?php

/**
 * @author : jegbagus
 */

if(!function_exists('jeg_print_block_size')) {
	function jeg_print_block_size() {
		return 
		"<div class='portfolioinputtitle'>Thumb Width :</div>
		<select class='width'>
			<option value='0.25'>1/4x width</option>
			<option value='0.5'>1/2x width</option>
			<option selected='selected' value='1'>1x width</option>
			<option value='2'>2x width</option>
			<option value='3'>3x width</option>
		</select>
		<span class='portfoliodesc'>On fullwidth layout, justified gallery, single ajax portfolio or cover portfolio, this option will be ignored</span>
		
		<div class='portfolioinputtitle'>Thumb Height :</div>
		<select class='height'>
			<option value='0.25'>1/4x height</option>
			<option value='0.5'>1/2x height</option>
			<option selected='selected' value='1'>1x height</option>
			<option value='2'>2x height</option>
			<option value='3'>3x height</option>
		</select>
		<span class='portfoliodesc'>On fullwidth layout, justified gallery, single ajax portfolio or cover portfolio, this option will be ignored</span>";
	};
}

if(!function_exists('jeg_check_block_size'))
{
	function jeg_check_block_size($blocksize, $compare) {
		if($blocksize == $compare) {
			return "selected=selected";
		}
	}
}

if(!function_exists('jeg_build_width_option'))
{
	function jeg_build_width_option($mbid, $seq, $width, $height) {
		return
		"<div class='postoption widthsize'>
			<h4>Thumb Width</h4>
			<select name='{$mbid}[$seq][width]' class='replaceindex'>
				<option value='0.25' " 	. jeg_check_block_size($width, "0.25") . ">1/4x width</option>
				<option value='0.5'	 " 	. jeg_check_block_size($width, "0.5") . ">1/2x width</option>
				<option value='1'	 " 	. jeg_check_block_size($width, "1") . ">1x width</option>
				<option value='2'	 " 	. jeg_check_block_size($width, "2") . ">2x width</option>
				<option value='3'	 " 	. jeg_check_block_size($width, "3") . ">3x width</option>
			</select>
			<span>On fullwidth layout, justified gallery, single ajax portfolio or cover portfolio, this option will be ignored</span>
		</div>
		<div class='postoption heightsize'>
			<h4>Thumb Height</h4>
			<select name='{$mbid}[$seq][height]' class='replaceindex'>
				<option value='0.25' " 	. jeg_check_block_size($height, "0.25") . ">1/4x height</option>
				<option value='0.5'	 " 	. jeg_check_block_size($height, "0.5") . ">1/2x height</option>
				<option value='1'	 " 	. jeg_check_block_size($height, "1") . ">1x height</option>
				<option value='2'	 " 	. jeg_check_block_size($height, "2") . ">2x height</option>
				<option value='3'	 " 	. jeg_check_block_size($height, "3") . ">3x height</option>
			</select>
			<span>On fullwidth layout, justified gallery, single ajax portfolio or cover portfolio, this option will be ignored</span>
		</div>";
	}
}

if(!function_exists('jeg_media_image_template'))
{
	function jeg_media_image_template($mbid, $seq = 0, $value = null, $option = null)
	{

		if($value !== 'null') {
			$imageid = isset($value['imageid']) ? $value['imageid'] : '';
			$thumbimage = wp_get_attachment_image_src($value['imageid'], 'thumbnail');
			$thumbimage = $thumbimage[0];
			$imagetitle = isset($value['imagename']) ? $value['imagename'] : '';
			$thumbwidth = isset($value['width']) ? $value['width'] : 1;
			$thumbheight = isset($value['height']) ? $value['height'] : 1;
		}
		
		$sizeblock = '';
		if(!$option['nowidth']) {
			$sizeblock = jeg_build_width_option($mbid, $seq, $thumbwidth, $thumbheight);
		}

		return
		"<div class='imageresult-list' data-result='image' data-index='{$seq}'>
			<div class='imageresult-header'>
				<img class='imageresult-header-thumb' src='{$thumbimage}'/>
				<a class='imageresult-header-toogle' href='#'>detail</a>
				<a class='imageresult-header-delete' href='#'>delete</a>
				<div class='imageresult-header-title'>{$imagetitle}</div>
			</div>
			<div class='imageresult-body'>
				<table>
					<tr>
						<td><img class='imageresult-body-thumb' src='{$thumbimage}'/></td>
						<td class='imgresult-body-desc'>
							<input name='{$mbid}[$seq][imageid]' class='replaceindex image-index' type='hidden' value='{$imageid}'>
							<input name='{$mbid}[$seq][type]' class='replaceindex' type='hidden' value='image'>
							<h4>Image Title</h4>
							<input name='{$mbid}[$seq][imagename]' class='replaceindex showonlist image-title' type='text' value='{$imagetitle}'>
							{$sizeblock}
						</td>
					</tr>
				</table>
			</div>
		</div>";
	}
}


if(!function_exists('jeg_media_youtube_template'))
{
	function jeg_media_youtube_template($mbid, $seq, $value, $option)
	{
		if($value !== 'null') {
			$mediaurl = isset($value['mediaurl']) ? $value['mediaurl'] : '';
			$mediacover = isset($value['mediacover']) ? $value['mediacover'] : '';
			$mediatitle = isset($value['title']) ? $value['title'] : '';
			$thumbwidth = isset($value['width']) ? $value['width'] : 1;
			$thumbheight = isset($value['height']) ? $value['height'] : 1;
		}
		
		$sizeblock = '';
		if(!$option['nowidth']) {
			$sizeblock = jeg_build_width_option($mbid, $seq, $thumbwidth, $thumbheight);
		}

		if($option['videocover']) {
			$mediaposter 	= wp_get_attachment_image_src($mediacover, "thumbnail");
			$videocover 	=
			"<tr>
				<td class='imgresult-body-desc uploadfile'>
					<h4>Image Cover</h4>
					<div class='jimg'>
						<img src='{$mediaposter[0]}'>
					</div>
					<input type='hidden' name='{$mbid}[$seq][mediacover]' class='videocover uploadtext replaceindex' value='{$mediacover}' />
					<div class='buttons'>
						<input type='button' value='Select Image' class='selectfileimage btn'/>
						<input type='button' value='x' class='removefile btn'/>
					</div> 
				</td>
			</tr>";
		}

		return "
		<div class='imageresult-list videoresult' data-result='youtube' data-index='{$seq}'>
			<div class='imageresult-header'>
				<div class='imageresult-header-thumb portfolioyoutube'></div>
				<a class='imageresult-header-toogle' href='#'>detail</a>
				<a class='imageresult-header-delete' href='#'>delete</a>
				<div class='imageresult-header-title'>{$mediaurl}</div>
			</div>
			<div class='imageresult-body'>
				<table>
					<tr>
						<td class='imgresult-body-desc'>
							<h4>Youtube URL</h4>
							<input name='{$mbid}[$seq][type]' class='replaceindex' type='hidden' value='youtube'>
							<input name='{$mbid}[$seq][mediaurl]' class='replaceindex showonlist youtube-url' type='text' value='{$mediaurl}'>
						</td>
					</tr>
					<tr>
						<td class='imgresult-body-desc'>
							<h4>Youtube Title</h4>
							<input name='{$mbid}[$seq][title]' class='replaceindex videotitle' type='text' value='{$mediatitle}'>
						</td>
					</tr>
					{$videocover}
					<tr>
						<td class='imgresult-body-desc'>
							{$sizeblock}
						</td>
					</tr>
				</table>
			</div>
		</div>
		";
	}
}


if(!function_exists('jeg_media_vimeo_template'))
{
	function jeg_media_vimeo_template($mbid, $seq, $value, $option)
	{
		if($value !== 'null') {
			$mediaurl = $value['mediaurl'];
			$mediacover = $value['mediacover'];			
			$mediatitle = $value['title'];
			$thumbwidth = isset($value['width']) ? $value['width'] : 1;
			$thumbheight = isset($value['height']) ? $value['height'] : 1;
		}

		if(!$option['nowidth']) {
			$sizeblock = jeg_build_width_option($mbid, $seq, $thumbwidth, $thumbheight);
		}
		
		if($option['videocover']) {
			$mediaposter 	= wp_get_attachment_image_src($mediacover, "thumbnail");
			$videocover 	=
			"<tr>
				<td class='imgresult-body-desc uploadfile'>
					<h4>Image Cover</h4>
					<div class='jimg'>
						<img src='{$mediaposter[0]}'>
					</div>
					<input type='hidden' name='{$mbid}[$seq][mediacover]' class='videocover uploadtext replaceindex' value='{$mediacover}' />
					<div class='buttons'>
						<input type='button' value='Select Image' class='selectfileimage btn'/>
						<input type='button' value='x' class='removefile btn'/>
					</div> 
				</td>
			</tr>";
		}

		return "
		<div class='imageresult-list videoresult' data-result='vimeo' data-index='{$seq}'>
			<div class='imageresult-header'>
				<div class='imageresult-header-thumb portfoliovimeo'></div>
				<a class='imageresult-header-toogle' href='#'>detail</a>
				<a class='imageresult-header-delete' href='#'>delete</a>
				<div class='imageresult-header-title'>{$mediaurl}</div>
			</div>
			<div class='imageresult-body'>
				<table>
					<tr>
						<td class='imgresult-body-desc'>
							<h4>Vimeo URL</h4>
							<input name='{$mbid}[$seq][type]' class='replaceindex' type='hidden' value='vimeo'>
							<input name='{$mbid}[$seq][mediaurl]' class='replaceindex showonlist vimeo-url' type='text' value='{$mediaurl}'>
						</td>
					</tr>
					<tr>
						<td class='imgresult-body-desc'>
							<h4>Vimeo Title</h4>
							<input name='{$mbid}[$seq][title]' class='replaceindex videotitle' type='text' value='{$mediatitle}'>
						</td>
					</tr>
					{$videocover}
					<tr>
						<td class='imgresult-body-desc'>
							{$sizeblock}
						</td>
					</tr>
				</table>
			</div>
		</div>
		";
	}
}



if(!function_exists('jeg_media_soundcloud_template'))
{
	function jeg_media_soundcloud_template($mbid, $seq, $value, $option)
	{
		if($value !== 'null') {
			$mediaurl = $value['mediaurl'];
			$mediacover = $value['mediacover'];
			$mediatitle = $value['title'];
			$thumbwidth = isset($value['width']) ? $value['width'] : 1;
			$thumbheight = isset($value['height']) ? $value['height'] : 1;
		}

		if(!$option['nowidth']) {
			$sizeblock = jeg_build_width_option($mbid, $seq, $thumbwidth, $thumbheight);
		}

		if($option['videocover']) {
			$mediaposter 	= wp_get_attachment_image_src($mediacover, "thumbnail");
			$videocover 	=
			"<tr>
				<td class='imgresult-body-desc uploadfile'>
					<h4>Image Cover</h4>
					<div class='jimg'>
						<img src='{$mediaposter[0]}'>
					</div>
					<input type='hidden' name='{$mbid}[$seq][mediacover]' class='videocover uploadtext replaceindex' value='{$mediacover}' />
					<div class='buttons'>
						<input type='button' value='Select Image' class='selectfileimage btn'/>
						<input type='button' value='x' class='removefile btn'/>
					</div> 
				</td>
			</tr>";
		}

		return "
		<div class='imageresult-list videoresult' data-result='soundcloud' data-index='{$seq}'>
			<div class='imageresult-header'>
				<div class='imageresult-header-thumb portfoliosoundcloud'></div>
				<a class='imageresult-header-toogle' href='#'>detail</a>
				<a class='imageresult-header-delete' href='#'>delete</a>
				<div class='imageresult-header-title'>{$mediaurl}</div>
			</div>
			<div class='imageresult-body'>
				<table>
					<tr>
						<td class='imgresult-body-desc'>
							<h4>Soundcloud URL</h4>
							<input name='{$mbid}[$seq][type]' class='replaceindex' type='hidden' value='soundcloud'>
							<input name='{$mbid}[$seq][mediaurl]' class='replaceindex showonlist soundcloud-url' type='text' value='{$mediaurl}'>
						</td>
					</tr>
					<tr>
						<td class='imgresult-body-desc'>
							<h4>Soundcloud Title</h4>
							<input name='{$mbid}[$seq][title]' class='replaceindex videotitle' type='text' value='{$mediatitle}'>
						</td>
					</tr>
					{$videocover}
					<tr>
						<td class='imgresult-body-desc'>
							{$sizeblock}
						</td>
					</tr>
				</table>
			</div>
		</div>
		";
	}
}


if(!function_exists('jeg_media_html5video_template'))
{
	function jeg_media_html5video_template($mbid, $seq, $value, $option)
	{
		if($value !== 'null') {
			$mediatitle = $value['title'];
			$mediacover = $value['mediacover'];
			$thumbwidth = isset($value['width']) ? $value['width'] : 1;
			$thumbheight = isset($value['height']) ? $value['height'] : 1;

			$mp4 = $value['videomp4'];
			$webm = $value['videowebm'];
			$ogg = $value['videoogg'];
		}

		if(!$option['nowidth']) {
			$sizeblock = jeg_build_width_option($mbid, $seq, $thumbwidth, $thumbheight);
		}

		if($option['videocover']) {
			$mediaposter 	= wp_get_attachment_image_src($mediacover, "thumbnail");
			$videocover 	=
			"<tr>
				<td class='imgresult-body-desc uploadfile'>
					<h4>Image Cover</h4>
					<div class='jimg'>
						<img src='{$mediaposter[0]}'>
					</div>
					<input type='hidden' name='{$mbid}[$seq][mediacover]' class='videocover uploadtext replaceindex' value='{$mediacover}' />
					<div class='buttons'>
						<input type='button' value='Select Image' class='selectfileimage btn'/>
						<input type='button' value='x' class='removefile btn'/>
					</div> 
				</td>
			</tr>";
		}

		return "
		<div class='imageresult-list videoresult' data-result='html5video' data-index='{$seq}'>
			<div class='imageresult-header'>
				<div class='imageresult-header-thumb portfoliohtml5video'></div>
				<a class='imageresult-header-toogle' href='#'>detail</a>
				<a class='imageresult-header-delete' href='#'>delete</a>
				<div class='imageresult-header-title'>{$mediatitle}</div>
			</div>
			<div class='imageresult-body'>
				<table>
					<tr>
						<td class='imgresult-body-desc'>
							<h4>HTML 5 Video Title</h4>
							<input name='{$mbid}[$seq][type]' class='replaceindex' type='hidden' value='html5video'>
							<input name='{$mbid}[$seq][title]' class='replaceindex videotitle showonlist' type='text' value='{$mediatitle}'>
						</td>
					</tr>
					<tr>
						<td class='imgresult-body-desc uploadfile'>
							<h4>MP4 Video</h4>
							<input name='{$mbid}[$seq][videomp4]' class='replaceindex videomp4 uploadtext' type='text' value='{$mp4}'>
							<input type='button' value='Select / Upload MP4' class='selectfile'/>
						</td>
					</tr>
					<tr>
						<td class='imgresult-body-desc uploadfile'>
							<h4>WEBM Video</h4>
							<input name='{$mbid}[$seq][videowebm]' class='replaceindex videowebm uploadtext' type='text' value='{$webm}'>
							<input type='button' value='Select / Upload WEBM' class='selectfile'/>
						</td>
					</tr>
					<tr>
						<td class='imgresult-body-desc uploadfile'>
							<h4>OGG Video</h4>
							<input name='{$mbid}[$seq][videoogg]' class='replaceindex videoogg uploadtext' type='text' value='{$ogg}'>
							<input type='button' value='Select / Upload OGG' class='selectfile'/>
						</td>
					</tr>
					{$videocover}
					<tr>
						<td class='imgresult-body-desc'>
							{$sizeblock}
						</td>
					</tr>
				</table>
			</div>
		</div>
		";
	}
}


/**
 * Check if landing page
 */
if(!function_exists('jeg_is_landing_template')) 
{
	function jeg_is_landing_template () 
	{
		global $post;
		
		if(is_page()) {
			$template = get_post_meta($post->ID,'_wp_page_template',true);		
			if($template === 'template/template-landing-page.php' || $template === 'template/template-landing-page-vc.php'){
				return true;
			}		
		} else if(isset($post->post_type) && $post->post_type === 'portfolio') {		
			$layout = get_post_meta($post->ID, 'portfolio_layout', true);
			if($layout === 'landingpage') {
				return true;
			}
		}
		
		return false;
	}	
}



/***
 * Change Repeating Title
 */
 
function jeg_modify_repeating_title ($title, $g) {
 	$additionaltitle = '';
	if(isset($g['childs']['section_id']) && isset($g['childs']['section_name'])) {
		$sectionname = $g['childs']['section_name']->get_value();
		$sectionid = $g['childs']['section_id']->get_value();
		if(!empty($sectionname)) {
			$additionaltitle = " > " . $g['childs']['section_name']->get_value();
		} else if (!empty($sectionid)) {
			$additionaltitle = " > " . $g['childs']['section_id']->get_value();
		}
	}
	
	if($additionaltitle !== '') {
		$title = $title . $additionaltitle;
	}
	
	return $title;
}

add_filter( 'jeg_modify_repeating_title', 'jeg_modify_repeating_title', 10, 2 );
 



/*** ****/

function jeg_dependencies_array ($dep) {
	if(isset($_GET['page']) && $_GET['page'] === 'revslider') {
		unset($dep['scripts']['paths']['shared']);
	}
	return $dep;
}

add_filter('vp_dependencies_array', 'jeg_dependencies_array');


function jeg_is_optimize_enabled() {
    return true;
}

function jeg_get_post_id()
{
    global $post;
    $p_post_id = isset($_POST['post_ID']) ? $_POST['post_ID'] : null ;
    $g_post_id = isset($_GET['post']) ? $_GET['post'] : null ;
    $post_id = $g_post_id ? $g_post_id : $p_post_id ;
    $post_id = isset($post->ID) ? $post->ID : $post_id ;

    if (isset($post_id)) {
        return (integer) $post_id;
    }
    return null;
}


function jeg_get_current_page_template_name() {
    $post_id = jeg_get_post_id();
    return get_post_meta($post_id,'_wp_page_template',TRUE);
}







