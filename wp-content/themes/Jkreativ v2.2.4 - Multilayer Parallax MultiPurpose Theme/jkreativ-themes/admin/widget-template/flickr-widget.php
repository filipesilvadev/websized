<?php	
	function jeg_get_flickr_photo($flickrapi, $flickrid, $totalimage) 
	{
		require_once  JEG_PLUGIN_DIR . "util/phpFlickr/phpFlickr.php";
		
		$f = new phpFlickr($flickrapi);
		$result = $f->people_getPublicPhotos($flickrid, null, null, $totalimage , null);
		
		$photos = array();
		if(empty($result)) {
			echo $f->getErrorMsg();			
		} else {
			$photosUrl = $f->urls_getUserPhotos($flickrid);			
			foreach ($result['photos']['photo'] as $photo) {
				$photos[] = array(
					's' 		=> $f->buildPhotoURL($photo, 'square'),
					'url'		=> $photosUrl.$photo['id'],
					'title'		=> $photo['title']
				);	
			}
		}
		
		return $photos;
	}
	
	function jeg_get_flickr_cache($flickrapi, $flickrid, $totalimage) {
		$lastcheck 		= get_option('flickr_last_check', 0);
		$flickrdata 	= get_option('flickr_cache_content', '');
		
		if( ( time() - $lastcheck ) > 43200 ) {
			$flickrdata = jeg_get_flickr_photo($flickrapi, $flickrid, $totalimage);
			// save fetched content & cache last update	
			if(!empty($flickrdata)) {
				update_option('flickr_cache_content', $flickrdata);
				update_option('flickr_last_check', time());
			}
		}
		
		return $flickrdata;
	}	
	
	$flickdata = jeg_get_flickr_cache($flickrapi, $flickrid, $totalimage);
?>

<ul class='imagelist'>
	<?php foreach ($flickdata as $flick) : ?>
	<li>
		<a href="<?php echo $flick['url'];?>" target="_blank"><img src="<?php echo $flick['s'];?>" title="<?php echo $flick['title'];?>" /></a>
	</li>
	<?php endforeach; ?>
</ul>