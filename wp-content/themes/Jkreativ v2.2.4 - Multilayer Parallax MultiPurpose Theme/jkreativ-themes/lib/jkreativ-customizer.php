<?php
/***
 * Jkreativ Customizer Controller
 * @author : Jegtheme
 */

function jeg_register_theme_customizer($wp_customize) 
{
	
	/**
	 * New Upload
	 */
	class Jeg_Customize_Newupload_Control extends WP_Customize_Control {
		public $type = 'newupload';
		
		public function enqueue(){
			wp_enqueue_media();
			wp_enqueue_style ('jeg-theme-customizer-style', get_template_directory_uri() . '/public/css/customizer.css', null, JEG_VERSION);
			wp_enqueue_script('jeg-jkreativ-newupload', get_template_directory_uri() . '/public/js/customizer/newupload.js' , null, null, true);
		}
		
		public function render_content(){
			$image = '';
			$value = $this->value();
			
			if(!empty($value)) {
				if(ctype_digit($value) || is_int($value)) {
					$image = wp_get_attachment_image_src($value, "full");
					$image = $image[0];
				} else {
					$image = $this->value();
				}
			}
			
	        ?>
	        <label>
	        	<span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
	        	<div class="uploadfile">
					<div class="portfolioinputtitle"></div>
					<div class="jimg">
						<img src="<?php echo $image ?>">
					</div>
					<input type="hidden" class="videocover uploadtext newupload-input">
					<div class="buttons">
						<input type='button' value='Select Image' class='selectfileimage btn'/>
						<input type='button' value='x' class='removefile btn'/>
					</div> 
				</div>
	        </label>	        
	        <?php
	    }
	}
	
	/**
	 * flag control
	 */
	class Jeg_Customize_Flag_Control extends WP_Customize_Control {
		public $type = 'flag';	    	
		
		public function enqueue(){
			wp_enqueue_style ('jeg-theme-customizer-style', get_template_directory_uri() . '/public/css/customizer.css', null, JEG_VERSION);
			wp_enqueue_script('jeg-jkreativ-additional-script', get_template_directory_uri() . '/public/js/customizer/jkreativ-customizer-additional.js' , null, null, true);
		}
		
		public function render_content(){
	        ?>
	        <label class="title-label">
	            <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
	        </label>
	        <?php
	    }
	}
		
	/** 
	 * slider control 
	 ***/
	class Jeg_Customize_Slider_Control extends WP_Customize_Control {
		public $type = 'slider';
	    public $min;
		public $max;
		public $step;
		
		public function enqueue(){
	        wp_enqueue_script('customizer-slider', get_template_directory_uri() . '/public/js/customizer/slider-ui.js' , array('jquery-ui-slider'), '1.0', true);
	        wp_enqueue_style('jquery-css-cdn', 'http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css');
	        wp_enqueue_style('jquery-slider-styling', get_template_directory_uri() . '/public/css/slider.css');
	    }
		
		public function render_content(){
	        ?>
	        <label>
	            <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
	            <input class="slider-input" type="text" disabled="disabled" value="<?php echo $this->value() ?>" />
	            <div class="slider-wrapper">
	            	<div class="slider" data-min="<?php echo $this->min ?>" data-max="<?php echo $this->max ?>" data-step="<?php echo $this->step ?>" data-value="<?php echo esc_attr( $this->value() ) ?>"></div>
	            </div>  	            
	        </label>
	        <?php
	    }
	}

    /**
     * textarea control
     */
    class Jeg_Customize_Textarea_Control extends WP_Customize_Control {
        public $type = 'textarea';

        public function enqueue(){
            wp_enqueue_style ('jeg-theme-customizer-style', get_template_directory_uri() . '/public/css/customizer.css', null, JEG_VERSION);
        }

        public function render_content(){
            ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <textarea <?php $this->link(); ?>><?php echo esc_attr( $this->value() ); ?></textarea>
            </label>
        <?php
        }
    }

	class Jeg_Customizer_Framework {
		private $section;
		private $setting;		
		private $wp_customize;
		
		public function __construct($section, $setting, $wp_customize) {
			$this->section = $section;
			$this->setting = $setting;
			$this->wp_customize = $wp_customize;
			$this->build_customizer();
		}
		
		public function build_customizer() {
			$sectionname = 'jeg_top_nav_section'; 
			$this->wp_customize->add_section(
				$this->section['name'],
				array(
					'title'			=> $this->section['title'],
					'priority'  	=> $this->section['priority'],
					'description'	=> $this->section['description']
				)
			);
			
			foreach($this->setting as $id => $setting) {
				if($setting['type'] === 'upload') {
					$this->customizer_upload($this->section['name'], $setting, $this->wp_customize, $id);
				} 
				if($setting['type'] === 'color') {
					$this->customizer_color($this->section['name'], $setting, $this->wp_customize, $id);
				} 
				if($setting['type'] === 'slider') {
					$this->customizer_slider($this->section['name'], $setting, $this->wp_customize, $id);
				}
				if($setting['type'] === 'text') {
					$this->customizer_text($this->section['name'], $setting, $this->wp_customize, $id);
				}
				if($setting['type'] === 'checkbox') {
					$this->customizer_checkbox($this->section['name'], $setting, $this->wp_customize, $id);
				}
				if($setting['type'] === 'select') {
					$this->customizer_select($this->section['name'], $setting, $this->wp_customize, $id);
				}
				if($setting['type'] === 'radio') {
					$this->customizer_radio($this->section['name'], $setting, $this->wp_customize, $id);
				}				
				if($setting['type'] === 'flag') {
					$this->customizer_flag($this->section['name'], $setting, $this->wp_customize, $id);
				}
				if($setting['type'] === 'newupload') {
					$this->customizer_newupload($this->section['name'], $setting, $this->wp_customize, $id);
				}
                if($setting['type'] === 'textarea') {
                    $this->customizer_textarea($this->section['name'], $setting, $this->wp_customize, $id);
                }
			}
		}

		/** customize new upload **/
		public function customizer_newupload($sectionname, $setting, $wp_customize, $id) {
			$wp_customize->add_setting( $setting['name'], array(
				'transport' => $setting['transport'],
				'default'	=> $setting['default']
			));
		    $wp_customize->add_control( new Jeg_Customize_Newupload_Control($wp_customize, $setting['name'], array(
		    	'section'  	=> $sectionname,
		        'label'    	=> $setting['title'],		        
		        'settings' 	=> $setting['name'],
		        'priority'	=> $id,
		    )));
		}

        /** textarea select **/
        public function customizer_textarea($sectionname, $setting, $wp_customize, $id) {
            $wp_customize->add_setting( $setting['name'], array(
                'transport' => $setting['transport'],
                'default'	=> $setting['default']
            ));
            $wp_customize->add_control( new Jeg_Customize_Textarea_Control($wp_customize, $setting['name'], array(
                'section'  	=> $sectionname,
                'label'    	=> $setting['title'],
                'settings' 	=> $setting['name'],
                'priority'	=> $id,
            )));
        }
		
		/** customize select **/
		public function customizer_select($sectionname, $setting, $wp_customize, $id) {
			$wp_customize->add_setting( $setting['name'], array(
				'transport' => $setting['transport'],
				'default'	=> $setting['default']
			));
			$wp_customize->add_control( $setting['name'], array(
		        'settings' 	=> $setting['name'],
		        'label'    	=> $setting['title'],
		        'choices'	=> $setting['choices'],
				'section'  	=> $sectionname,
				'type'		=> 'select',
		        'priority'	=> $id,
		    ));
		}

		/*** radio ***/
		public function customizer_radio($sectionname, $setting, $wp_customize, $id) {
			$wp_customize->add_setting( $setting['name'], array(
				'transport' => $setting['transport'],
				'default'	=> $setting['default']
			));
			$wp_customize->add_control( $setting['name'], array(
		        'settings' 	=> $setting['name'],
		        'label'    	=> $setting['title'],
		        'choices'	=> $setting['choices'],
				'section'  	=> $sectionname,
				'type'		=> 'radio',
		        'priority'	=> $id,
		    ));
		}

		/*** text ***/
		public function customizer_text ($sectionname, $setting, $wp_customize, $id) {
			$wp_customize->add_setting( $setting['name'], array(
				'transport' => $setting['transport'],
				'default'	=> $setting['default']
			));
			$wp_customize->add_control( $setting['name'], array(
		        'settings' 	=> $setting['name'],
		        'label'    	=> $setting['title'],
				'section'  	=> $sectionname,
		        'priority'	=> $id
		    ));
		} 

		/*** check box ***/
		public function customizer_checkbox ($sectionname, $setting, $wp_customize, $id) {
			$wp_customize->add_setting( $setting['name'], array(
				'transport' => $setting['transport'],
				'default'	=> $setting['default']
			));
			$wp_customize->add_control( $setting['name'], array(
		        'settings' 	=> $setting['name'],
		        'label'    	=> $setting['title'],
				'section'  	=> $sectionname,
				'type'		=> 'checkbox',
		        'priority'	=> $id
		    ));
		}
		
		/** flag **/
		public function customizer_flag ($sectionname, $setting, $wp_customize, $id) {
			$wp_customize->add_setting( $setting['name'], array());
		    $wp_customize->add_control( new Jeg_Customize_Flag_Control($wp_customize, $setting['name'], array(
		    	'section'  	=> $sectionname,
		        'label'    	=> $setting['title'],		        
		        'settings' 	=> $setting['name'],
		        'priority'	=> $id
		    )));
		}
		
		/** slider **/
		public function customizer_slider($sectionname, $setting, $wp_customize, $id) {			
			$wp_customize->add_setting( $setting['name'], array(
				'transport' => $setting['transport'],
				'default'	=> $setting['default']
			));
		    $wp_customize->add_control( new Jeg_Customize_Slider_Control($wp_customize, $setting['name'], array(
		    	'section'  	=> $sectionname,
		        'label'    	=> $setting['title'],		        
		        'settings' 	=> $setting['name'],
		        'priority'	=> $id,
		        'min'		=> $setting['min'],
				'max'		=> $setting['max'],
				'step'		=> $setting['step'],
		    )));
		}
		
		/** upload **/
		public function customizer_upload ($sectionname, $setting, $wp_customize, $id) {			
			$wp_customize->add_setting( $setting['name'], array( 
				'transport' => $setting['transport'],
				'default'	=> $setting['default'],
			));
		    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, $setting['name'], array(
		    	'section'  	=> $sectionname,
		        'label'    	=> $setting['title'],
		        'settings' 	=> $setting['name'],
		        'priority'	=> $id,		        
		    )));
		}
		
		/** color **/
		public function customizer_color ($sectionname, $setting, $wp_customize, $id) {			
			$wp_customize->add_setting( $setting['name'], array(
				'transport' => $setting['transport'],
				'default'	=> $setting['default'],
			));
		    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, $setting['name'], array(
		    	'section'  	=> $sectionname,
		        'label'    	=> $setting['title'],
		        'settings' 	=> $setting['name'],	
		        'priority'	=> $id,	        
		    )));
		}
	}
	
	
	// customize navigation - 18
	locate_template(array('/lib/customizer/customize-style.php'), true, true);
    jeg_customize_style($wp_customize);
	
	// customize navigation - 19
	locate_template(array('/lib/customizer/customize-font.php'), true, true);
    jeg_customize_font($wp_customize);
	
	// general customizer - 20
	locate_template(array('/lib/customizer/customize-general.php'), true, true);
    jeg_customize_general($wp_customize);
	
	// customize navigation - 20
	locate_template(array('/lib/customizer/customize-nav.php'), true, true);
    jeg_customize_nav($wp_customize);
	
	// customize loader - 21
	locate_template(array('/lib/customizer/customize-loader.php'), true, true);
    jeg_customize_loader($wp_customize);
	
	// customize loader - 21
	locate_template(array('/lib/customizer/customize-loader-ajax.php'), true, true);
    jeg_customize_loader_ajax($wp_customize);
	
	// customize top navigation - 22
	locate_template(array('/lib/customizer/customize-top.php'), true, true);
    jeg_customize_top_nav($wp_customize);
	
	// customize side navigation - 23
	locate_template(array('/lib/customizer/customize-side.php'), true, true);
    jeg_customize_side_nav($wp_customize);
	
	// customize side navigation - header menu - 24
	locate_template(array('/lib/customizer/customize-side-header.php'), true, true);
    jeg_customize_side_header($wp_customize);
		
	// customize mobile menu - 25
	locate_template(array('/lib/customizer/customize-mobile.php'), true, true);
    jeg_customize_mobile($wp_customize);
	
	// customize mega menu - 26
	locate_template(array('/lib/customizer/customize-mega-menu.php'), true, true);
    jeg_customize_mega($wp_customize);
	
	// customize footer landing - 27
	locate_template(array('/lib/customizer/customize-footer.php'), true, true);
    jeg_customize_footer($wp_customize);
	
	// customize mobile menu - 30
	locate_template(array('/lib/customizer/customize-woo-minicart.php'), true, true);
    jeg_customize_woo_minicart($wp_customize);
	
	// customize mobile menu - 31
	locate_template(array('/lib/customizer/customize-background.php'), true, true);
    jeg_customize_background($wp_customize);
		
	
	// customize list of portfolio - 35
	// require_once locate_template('/lib/customizer/customize-portfolio-list-page.php');
	// jeg_customize_portfolio_list($wp_customize);
	
	
}

add_action( 'customize_register', 'jeg_register_theme_customizer' );

function jeg_customizer_live_preview() {
	wp_enqueue_script( 'jeg-common-customizer', get_template_directory_uri() . '/public/js/customizer/common-customizer.js', array( 'jquery'), JEG_VERSION, true );
	wp_enqueue_script( 'jeg-loading-ajax-customizer', get_template_directory_uri() . '/public/js/customizer/loading-ajax-customizer.js', array( 'jquery', 'customize-preview' ), JEG_VERSION, true );
    wp_enqueue_script( 'jeg-top-nav-customizer', get_template_directory_uri() . '/public/js/customizer/top-nav-customizer.js', array( 'jquery', 'customize-preview' ), JEG_VERSION, true );
	wp_enqueue_script( 'jeg-side-nav-customizer', get_template_directory_uri() . '/public/js/customizer/side-nav-customizer.js', array( 'jquery', 'customize-preview' ), JEG_VERSION, true );
	wp_enqueue_script( 'jeg-mobile-nav-customizer', get_template_directory_uri() . '/public/js/customizer/mobile-nav-customizer.js', array( 'jquery', 'customize-preview' ), JEG_VERSION, true );	
	wp_enqueue_script( 'jeg-mega-customizer', get_template_directory_uri() . '/public/js/customizer/mega-customizer.js', array( 'jquery', 'customize-preview' ), JEG_VERSION, true );	
	wp_enqueue_script( 'jeg-footer-customizer', get_template_directory_uri() . '/public/js/customizer/footer-customizer.js', array( 'jquery', 'customize-preview' ), JEG_VERSION, true );	
	wp_enqueue_script( 'jeg-woo-mini-customizer', get_template_directory_uri() . '/public/js/customizer/woo-minicart-customizer.js', array( 'jquery', 'customize-preview' ), JEG_VERSION, true );
	wp_enqueue_script( 'jeg-portfolio-list-page', get_template_directory_uri() . '/public/js/customizer/portfolio-list-customizer.js', array( 'jquery', 'customize-preview' ), JEG_VERSION, true );
	wp_enqueue_script( 'jeg-font-switcher', get_template_directory_uri() . '/public/js/customizer/font-switch-customizer.js', array( 'jquery', 'customize-preview' ), JEG_VERSION, true );		
	wp_enqueue_script( 'jeg-background', get_template_directory_uri() . '/public/js/customizer/background-customizer.js', array( 'jquery', 'customize-preview' ), JEG_VERSION, true );
	wp_enqueue_script( 'jeg-general', get_template_directory_uri() . '/public/js/customizer/general-customizer.js', array( 'jquery', 'customize-preview' ), JEG_VERSION, true );		
}
add_action( 'customize_preview_init', 'jeg_customizer_live_preview' );


