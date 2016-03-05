<?php

require_once( JEG_PLUGIN_DIR . '/lib/twitter/Autolink.php');

if ( ! class_exists( 'jeg_twitter_class' ) )
{
	class jeg_twitter_class
	{

		public $screen_name = "";
		public $cachefile = "";
		public $consumerkey = "";
		public $consumersecret = "";
		public $accesstoken = "";
		public $accesstokensecret = "";

		public $tags = true;
		public $nofollow = true;
		public $newwindow = true;
		public $hashtags = true;
		public $attags = true;

		public function __construct($screen_name = '', $consumerkey ='', $consumersecret ='', $accesstoken ='', $accesstokensecret ='', $cachefile = '') {
			$this->screen_name = empty($screen_name) ? JEG_PLUGIN_DIR .'/lib/twitter/cache/twitter.txt' : $screen_name;
			$this->cachefile = empty($cachefile) ? JEG_PLUGIN_DIR .'/lib/twitter/cache/twitter.txt' : $cachefile;
			$this->consumerkey = $consumerkey;
			$this->consumersecret = $consumersecret;
			$this->accesstoken = $accesstoken;
			$this->accesstokensecret = $accesstokensecret;
		}

		private function cleanTwitterName($twitterid)
		{
			$test = substr($twitterid,0,1);

			if($test == "@"){
				$twitterid = substr($twitterid,1);
			}

			return $twitterid;

		}

		private function changeLink($string)
		{
			// Username linkable
			$string = preg_replace('/(?<=^|\s)@([a-z0-9_]+)/i','<a href="http://www.twitter.com/$1">@$1</a>',$string);

			// Hashtag
			$string = preg_replace('/(^|\s)#(\w*[a-zA-Z_]+\w*)/', '\1#<a href="http://twitter.com/search?q=%23\2">\2</a>', $string);

			if(!$this->tags){
				$string = strip_tags($string);
			}
			if($this->nofollow){
				$string = str_replace('<a ','<a rel="nofollow"', $string);
			}
			if($this->newwindow){
				$string = str_replace('<a ','<a target="_blank"', $string);
			}
	  		return $string;
	 	}

		private function getTimeAgo($time)
		{
			   	$tweettime = strtotime($time); // This is the value of the time difference - UK + 1 hours (3600 seconds)
			   	$nowtime = time();
			   	$timeago = ($nowtime-$tweettime);
			   	$thehours = floor($timeago/3600);
			   	$theminutes = floor($timeago/60);
			   	$thedays = floor($timeago/86400);
	  			/********************* Checking the times and returning correct value */
			   	if($theminutes < 60){
					if($theminutes < 1){
						$timemessage =  "Less than 1 minute ago";
					} else if($theminutes == 1) {
					 	$timemessage = $theminutes." minute ago";
					} else {
					 	$timemessage = $theminutes." minutes ago";
					}
				} else if($theminutes > 60 && $thedays < 1){
					 if($thehours == 1){
					 	$timemessage = $thehours." hour ago";
					 } else {
					 	$timemessage = $thehours." hours ago";
					 }
				} else {
					 if($thedays == 1){
					 	$timemessage = $thedays." day ago";
					 } else {
					 	$timemessage = $thedays." days ago";
					 }
				}
			return $timemessage;
		}

		private function removeSpamCharacters($string)
		{
			$string = preg_replace('/[^(\x20-\x7F)]*/','', $string);
			return $string;
		}

		public function formatTweets($tweets)
		{
			$t = array();
			$i = 0;

			foreach($tweets as $tweet)
			{
				if(isset($tweet->retweeted_status)){
					$text = $this->removeSpamCharacters($tweet->retweeted_status->text);
				} else {
					$text = $this->removeSpamCharacters($tweet->text);
				}
				$urls = $tweet->entities->urls;
				$mentions = $tweet->entities->user_mentions;
				$hashtags = $tweet->entities->hashtags;
				if($urls){
					foreach($urls as $url){
						if(strpos($text,$url->url) !== false){
							$text = str_replace($url->url,'<a href="'.$url->url.'">'.$url->url.'</a>',$text);
						}
					}
				}
				if($mentions && $this->attags){
					foreach($mentions as $mention){
						if(strpos($text,$mention->screen_name) !== false){
							$text = str_replace("@".$mention->screen_name." ",'<a href="http://twitter.com/'.$mention->screen_name.'">@'.$mention->screen_name.'</a> ',$text);
						}
					}
				}
				if($hashtags && $this->hashtags){
					foreach($hashtags as $hashtag){
						if(strpos($text,$hashtag->text) !== false){
							$text = str_replace('#'.$hashtag->text." ",'<a href="http://twitter.com/search?q=%23'.$hashtag->text.'">#'.$hashtag->text.'</a> ',$text);
						}
					}
				}
				$t[$i]["tweet"] = Twitter_Autolink::create($text, false)
										->setNoFollow(false)->setExternal(false)->setTarget('')
										->setUsernameClass('')
										->setHashtagClass('')
										->setURLClass('')
										->addLinks(); //trim($this->changeLink($text));
				$t[$i]["time"] = trim($this->getTimeAgo($tweet->created_at));
				$i++;
			}

			$this->saveCachedTweets($t);
			return $t;
		}

		private function saveCachedTweets($data)
		{
			$data = json_encode($data);
			$f = file_put_contents($this->cachefile, $data);
		}

		private function getCachedTweets()
		{
			return file_get_contents($this->cachefile);
		}

	 	public function getTweets($count = 1)
		{
            if(!class_exists('TwitterOAuth')){
			    require_once( JEG_PLUGIN_DIR . '/lib/twitter/twitteroauth.php');
            }

			$twitterconn = new TwitterOAuth($this->consumerkey, $this->consumersecret, $this->accesstoken, $this->accesstokensecret);

			$latesttweets = $twitterconn->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$this->screen_name."&count=".$count);

			if(!isset($latesttweets->errors)){
				return $this->formatTweets($latesttweets);
			} else {
				return json_decode($this->getCachedTweets(), true);
			}

		}
	}
}

if(!function_exists('jeg_fetch_twitter')) 
{
	function jeg_fetch_twitter($twitter_username, $twitter_count = 5, $twitter_consumer_key, $twitter_consumer_secret, $twitter_access_token, $twitter_access_token_secret)
	{
		$cachetimeout = 60 * 60 * 3;
		$currentcachetimeout = get_option( 'jeg_tweet_timeout', 0);
		if( ( time() - $cachetimeout ) >  $currentcachetimeout)
		{
			$twitter = new jeg_twitter_class($twitter_username, $twitter_consumer_key, $twitter_consumer_secret, $twitter_access_token, $twitter_access_token_secret);
	
			$twitter->consumerkey = $twitter_consumer_key;
			$twitter->consumersecret = $twitter_consumer_secret;
			$twitter->accesstoken = $twitter_access_token;
			$twitter->accesstokensecret = $twitter_access_token_secret;
	
			# cache file
			$tweets = $twitter->getTweets($twitter_count);
	
			update_option('jeg_tweet_timeout', time());
			update_option('jeg_tweet_cache_content', $tweets);
	
			return $tweets;
		} else {
			return get_option('jeg_tweet_cache_content', __('Sorry, no tweet found.', 'jeg_textdomain'));
		}
	}
}

$jeg_tweets = jeg_fetch_twitter($twitter_username, $twitter_count, $twitter_consumer_key, $twitter_consumer_secret, $twitter_access_token, $twitter_access_token_secret);

?>

<div class="jeg-twitter-container">
	<div class="jeg-tweets">
		<ul>
			<?php if (is_array($jeg_tweets)) : foreach ($jeg_tweets as $jeg_tweet) : ?>
				<li class="jeg-tweet-container">
					<div class="jeg-tweet"><?php echo $jeg_tweet['tweet'] ?></div>
					<span class="jeg-tweet-time"><?php echo $jeg_tweet['time'] ?></span>
				</li>
			<?php endforeach; else : ?>
				<li><?php echo $jeg_tweets ?></li>
			<?php endif; ?>
		</ul>
	</div>

	<div class="jeg-follow-button clearfix">
		<a href="https://twitter.com/<?php echo $twitter_username ?>" class="twitter-follow-button" data-show-count="false">Follow @<?php echo $twitter_username ?></a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
	</div>
</div>