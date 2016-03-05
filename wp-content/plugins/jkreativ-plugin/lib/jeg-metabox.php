<?php
/**
 * Class template for jegtheme metabox panel
 * provide 2 hook for 
 * 	- save metabox (in case your option is not supported)
 * 	- build metabox option (handy for extended metabox option)
 * 
 * @author jegbagus
 */

defined('JEG_META_NONCE_ACTION') or define('JEG_META_NONCE_ACTION', 'metabox_nonce');

if(!function_exists('jeg_create_metabox_nonce')) 
{
	function jeg_create_metabox_nonce($id) 
	{
		return  wp_nonce_field(JEG_META_NONCE_ACTION, $id . '_nonce');
	}
}


if(!class_exists('jeg_metabox_panel')) 
{
	
	class jeg_metabox_panel 
	{
		/** class variable **/	
		private $jtemplate;			// hold jtemplate class instance
		private $metaoption;
		
		/** jeg metabox constructor **/
		public function __construct($metaoption) 
		{
			$this->jtemplate = new JTemplate(JEG_PLUGIN_DIR . 'lib/metabox-template/');
			$this->metaoption = $metaoption;
					
			$this->do_init();
		}
		
		public function do_init()
		{
			add_action('current_screen'	, array($this, 'add_meta_box'));
			add_action('save_post'	, array($this, 'save_meta_box'));
			add_action('admin_enqueue_scripts', array(&$this, 'load_script_style'));
			
			add_action('wp_ajax_get_paged_image'			, array(&$this, 'jeg_get_paged_image'));
			add_action('wp_ajax_nopriv_get_paged_image'		, array(&$this, 'jeg_get_paged_image'));
		}
		
		public function jeg_get_paged_image($render = "") 
		{
			$page  = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
					
			$statement = array (
					'post_type' 		=> 'attachment',
					'post_mime_type' 	=> 'image',
					'post_status' 		=> 'inherit', 
					'posts_per_page' 	=> 30,
					'paged' 			=> $page 
			);
			$result = new WP_Query($statement);
			
			$data = array();
			$data['images'] 		= $result->posts;
			$data['pages'] 			= $result->max_num_pages;
			$data['totalpost'] 		= $result->found_posts;	
			$data['curpage']	 	= $page;
			
			if($render === "") {
				$this->jtemplate->render('image_paging', $data, true);
			} else {
				return $this->jtemplate->render('image_paging', $data);
			}
			exit;
		}
		
		public function save_meta_box() 
		{
			global $post;
			
			if(isset($post->post_type) && in_array($post->post_type, $this->metaoption['screen']))
			{
				$this->save_meta_box_data(call_user_func($this->metaoption['metacontent']), $post->ID, $this->metaoption['screen']);
			}
		}	
		
		/** do actual metabox option saving **/
		public function do_metabox_save($option, $postid) 
		{
			if($option['type'] == 'warning' || $option['type'] == 'heading' || $option['type'] == 'selectedwork') {
				return;
			}
			
			if(!$option['type'] == 'nononce') {
				if ( !wp_verify_nonce($_POST[$option['id'] . '_nonce'], JEG_META_NONCE_ACTION) ) {
					return null;
				}
			}
						
			if($option['type'] === "mediagallery") 
			{
				$mediagallery = $_POST[$option['id']];
				$mediaresult = array();
				if(!empty($mediagallery)) {									
					foreach($mediagallery as $idx => $gallery) {
						if($idx !== 'index') {
							array_push($mediaresult, $gallery);
						}					
					}
				}
				$_POST[$option['id']] = $mediaresult;
			} 						
			
			if(empty($_POST[$option['id']])) 
			{
				if($option['type'] == "checkbox") 
				{
					update_post_meta($postid, $option['id'], 0);
				} else {
					delete_post_meta($postid, $option['id'], get_post_meta($postid, $option['id'], true));
				}
			} else 
			{
				$value = $_POST[$option['id']];
				$metavalue = get_post_meta($postid, $option['id'], true);
				
				if(isset($metavalue)) 
				{
					update_post_meta($postid, $option['id'], $value);
				} else 
				{
					add_post_meta($postid, $option['id'], $value, true);
				}
			}
		}
		
		/** loop to entire array, and save metabox option **/
		public function save_meta_box_data($arrs, $postid, $type = 'page') 
		{
			if ( !current_user_can( 'edit_page', $postid ))
				return ;	
			
			// than save another option
			foreach ($arrs as $options) 
			{
                $this->do_metabox_save($options, $postid);
			}
			
			return true;
		}
		
		/** add metabox inside metabox option **/
		public function add_meta_box() 
		{
			foreach($this->metaoption['screen'] as $screen) 
			{
                if($this->can_render()) {
                    add_meta_box( $this->metaoption['panelid'] ,
                        $this->metaoption['pagetitle'] ,
                        array(&$this, 'display'),
                        $screen,
                        $this->metaoption['context'],
                        $this->metaoption['priority']);
                }
			}
		}
		
		public function display() 
		{
			// we need to force to load admin css on top of the page
            $this->build_metabox();
		}

        public function can_render() {
            $flag = false;
            $screen = get_current_screen();
            if( in_array($screen->post_type, $this->metaoption['screen']) ) {
                $flag = true;
            }

            if(!empty($this->metaoption['template']) && $screen->post_type === 'page') {
                $templatefile = jeg_get_current_page_template_name();
                if( in_array($templatefile, $this->metaoption['template']) ){
                    $flag = true;
                } else {
                    $flag = false;
                }
            }

            return $flag;
        }

		
		public function load_script_style() 
		{
            if($this->can_render()) {
				// style
				wp_enqueue_style('thickbox');
				wp_enqueue_style ('jeg-css-admin', JEG_PLUGIN_URL . '/assets/css/jadmin.css');	
				
				// script
				wp_enqueue_media();
				wp_enqueue_script(array('jquery', 'editor', 'thickbox', 'media-upload'));
				wp_enqueue_script('jeg-jmetabox', JEG_PLUGIN_URL . '/assets/js/jmetabox.js');
			}
		}
		
		/** build metabox option **/
		public function build_metabox () 
		{
			$data = array();
			
			// build content
			$data['content'] = '';
			foreach (call_user_func($this->metaoption['metacontent']) as $content) 
			{
				$data['content'] .= $this->build_metabox_content($content);
			}
			
			$this->jtemplate->render('metabox', $data, true);			
		}
		
		
		public function set_metabox_value(&$content) {
			global $post;			
			$content['value'] = get_post_meta($post->ID, $content['id'], true);
			
			if(!empty($content['value'])) {
				$content['default'] = $content['value'];
			} 
		}
		
		/** build metabox option **/
		public function build_metabox_content($content)
		{
			$optionhtml = '';
			
			$this->set_metabox_value($content);
			
			if($content['type'] == 'text') {
				$optionhtml .= $this->jtemplate->render('type-text', $content);
			}
			if($content['type'] == 'select') {
				$optionhtml .= $this->jtemplate->render('type-select', $content);
			}
			if($content['type'] == 'textarea') {
				$optionhtml .= $this->jtemplate->render('type-textarea', $content);
			}
			if($content['type'] == 'checkbox') {
				$optionhtml .= $this->jtemplate->render('type-checkbox', $content);
			}
			if($content['type'] == 'radio') {
				$optionhtml .= $this->jtemplate->render('type-radio', $content);
			}
			if($content['type'] == 'multicheckbox') {
				$optionhtml .= $this->jtemplate->render('type-multicheckbox', $content);
			}
			if($content['type'] == 'upload') {
				$optionhtml .= $this->jtemplate->render('type-upload', $content);
			} 
			if($content['type'] == 'warning') {
				$optionhtml .= $this->jtemplate->render('type-warning', $content);
			}
			if($content['type'] == 'heading') {
				$optionhtml .= $this->jtemplate->render('type-heading', $content);
			}
			if($content['type'] == 'slider') {
				$optionhtml .= $this->jtemplate->render('type-slider', $content);
			}
			if($content['type'] == 'colorpicker') {
				$optionhtml .= $this->jtemplate->render('type-colorpicker', $content);
			}
			if($content['type'] == 'imagegallery') {
				$content['imagelist'] = $this->jeg_get_paged_image(false);
				$optionhtml .= $this->jtemplate->render('type-gallery', $content);
			}
			if($content['type'] == 'mediagallery') {
				$content['imagelist'] = $this->jeg_get_paged_image(false);
				$optionhtml .= $this->jtemplate->render('type-mediagallery', $content);
			}
			
			return $optionhtml;
		}
	}
}