<?php
/* Last updated with phpFlickr 1.3.2
 *
 * This example file shows you how to call the 100 most recent public
 * photos.  It parses through them and prints out a link to each of them
 * along with the owner's name.
 *
 * Most of the processing time in this file comes from the 100 calls to
 * flickr.people.getInfo.  Enabling caching will help a whole lot with
 * this as there are many people who post multiple photos at once.
 *
 * Obviously, you'll want to replace the "<api key>" with one provided 
 * by Flickr: http://www.flickr.com/services/api/key.gne
 */

require_once("phpFlickr.php");
$f = new phpFlickr("3077891bafd02f95795c02a20be57144");

$recent = $f->people_getPublicPhotos('31446365@N05', null, null, 2);

$photos = array();
if(empty($recent)) {
	echo $f->getErrorMsg();
} else {
	foreach ($recent['photos']['photo'] as $photo) {
		$photos[] = array(
			's' 		=> $f->buildPhotoURL($photo, 'square'),
			'o'			=> $f->buildPhotoURL($photo, 'original'),
			'title'		=> $photo['title']
		);	
	}	
}
?>
