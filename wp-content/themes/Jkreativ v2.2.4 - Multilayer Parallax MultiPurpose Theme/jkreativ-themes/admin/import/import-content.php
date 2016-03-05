<?php

function jeg_import_view() { ?>

    <h2>Import Dummy Data</h2>

    <?php echo jeg_import_notice(); ?>

    <p>Before importing content, please read several notice for importing content. </p>
    <div class="jeg-dummydata">
        <ul>
            <li>You can use dummy data to learn how this themes work.</li>
            <li>Menu (Main Menu & Bottom Menu) will be recreated.</li>
            <li>Widget content will be replaced with demo widget.</li>
            <li>Demo content not included within demo content due to copyright of those image.</li>
            <li>Please make sure that your server able to do outbound request, we need to download some image that used on demo.</li>
            <li>Using this import, you won't have double content of import content.</li>
            <li>Please wait until Process is finished. and please leave your browser open during import process. Closing Browser will stop the import process</li>
        </ul>
    </div>


    <?php if ( is_plugin_active( 'wordpress-importer/wordpress-importer.php' ) ) { ?>
    <div class="disable-wp-importer"><strong>[IMPORTANT]</strong> Our Import Dummy Data will not work correctly when WordPress Importer enabled. Please disable WordPress Importer Plugin first.</div>
    <?php } else { ?>
    <form class="jeg-import-form" method="post">
        <input type="hidden" name="jeg-nonce" value="<?php echo wp_create_nonce('jeg-dummy-import'); ?>" />
        <input name="reset" class="jeg-dummydata-button" type="submit" value="Import Dummy Data" />
        <input type="hidden" value="jeg-dummy-import" name="action" />
    </form>
    <?php } ?>


    <style>
        .jeg-dummydata ul {
            margin-left: 20px;
        }
        .jeg-dummydata ul li, .jeg-demonotice ul li {
            list-style: disc;
        }
        .jeg-dummydata-button, .jeg-dummydata-button:hover {
            background: none repeat scroll 0 0 #2ea2cc;
            box-shadow: 0 1px 0 rgba(120, 200, 230, 0.5) inset, 0 1px 0 rgba(0, 0, 0, 0.15);
            color: #fff;
            text-decoration: none;
            height: 30px;
            line-height: 28px;
            margin: 0;
            padding: 0 12px;
            border-radius: 3px;
            border: 1px solid #0074a2;
            cursor: pointer;
            display: inline-block;
            font-size: 13px;
            white-space: nowrap;
        }
        .jeg-import-form {
            margin-bottom: 30px;
            margin-top: 30px;
        }
        .jeg-demonotice {
            background: none repeat scroll 0 0 #e5fafd;
            border: 1px solid #ccc;
            margin: 10px 10px 10px 0;
            padding: 5px 20px;
        }
        .jeg-demonotice > ul {
            padding-left: 20px;
        }
        .disable-wp-importer {
            background: none repeat scroll 0 0 #ddd;
            border: 2px solid;
            color: red;
            padding: 20px;
        }
        .import-notice {
            display: list-item;
            font-size: 14px;
            font-style: italic;
            font-weight: bold;
            margin-left: 20px;
        }
    </style>
    <?php

    if(  isset($_REQUEST['action']) &&  $_REQUEST['action'] == 'jeg-dummy-import' && check_admin_referer('jeg-dummy-import' , 'jeg-nonce')){
        defined( 'WP_LOAD_IMPORTERS' ) or define('WP_LOAD_IMPORTERS', true);
        require_once ABSPATH . 'wp-admin/includes/import.php';
        $importer_error = false;

        if ( !class_exists( 'WP_Importer' ) ) {
            $class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
            if ( file_exists( $class_wp_importer ) ){
                require_once($class_wp_importer);
            }
            else {
                $importer_error = true;
            }
        }

        if ( !class_exists( 'WP_Import' ) ) {
            $class_wp_import = get_template_directory() . '/admin/import/wordpress-importer.php';
            if ( file_exists( $class_wp_import ) ) {
                require_once($class_wp_import);
            }
            else {
                $importer_error = true;
            }
        }

        if($importer_error){
            die("Error in import :(");
        } else {
            if(!is_file( get_template_directory() . '/admin/import/data/dummy.xml')){
                echo "The XML file containing the dummy content is not available or could not be read .. You might want to try to set the file permission to chmod 755.<br/>If this doesn't work please use the wordpress importer and import the XML file (should be located in your download .zip: Sample Content folder) manually ";
            }
            else {
                jeg_prepare_import();

                ob_start();
                $wp_import = new WP_Import();
                $wp_import->fetch_attachments = true;
                $wp_import->import( get_template_directory() . '/admin/import/data/dummy.xml');
                ob_end_clean();
                jeg_create_notice("Finish Import Dummy Data");


                jeg_end_import();
            }
        }
    }
}

function jeg_create_notice($notice){
    echo "<div class='import-notice'>$notice</div><br/>";
}

function jeg_prepare_import() {

    // prevent double menu
    $termarray = array();
    $termarray[0] = get_term_by('name','Bottom Menu', 'nav_menu');
    $termarray[1] = get_term_by('name','Main Menu', 'nav_menu');

    foreach($termarray as $term) {
        if(is_object($term)) {
            wp_delete_nav_menu($term->term_id);
        }
    }

}

function jeg_import_notice() {
    $shownotice = false;
    $noticelist = '';

    if(!class_exists('WPBakeryVisualComposerAbstract')) {
        $shownotice = true;
        $noticelist .= '<li><strong>Visual Composer</strong> is mandatory plugin to use, please enable this plugin before importing</li>';
    }

    if (!class_exists('Woocommerce')) {
        $shownotice = true;
        $noticelist .= '<li>We notice that you are not installing <strong>Woocommerce</strong>, if in future you decide to use woocommerce, you can do import again.</li>';
    }

    if(!class_exists('RevSlider')){
        $shownotice = true;
        $noticelist .= '<li>Some Demo Page is using <strong>Revolution Slider</strong>, we recommend you to enable this plugin when doing import</li>';
    }

    if(!defined('WPCF7_VERSION')) {
        $shownotice = true;
        $noticelist .= '<li>This demo also using <strong>Contact form 7</strong>, you can optionally enable this plugin</li>';
    }

    if($shownotice) {
        return '<div class="jeg-demonotice"><p>Plugin Check : </p><ul>' . $noticelist . '</ul></div>';
    }
}

function jeg_panel_import()
{
    global $joptionglobal;

    ob_start();
    locate_template(array('admin/import/data/backend.json'), true, true);
    $content = ob_get_contents();
    ob_end_clean();

    $joptionglobal->import_option($content);
}

function jeg_set_menu_location()
{
    $bottommenu = get_term_by('name','Bottom Menu', 'nav_menu');
    $mainmenu = get_term_by('name','Main Menu', 'nav_menu');

    $locations = get_theme_mod('nav_menu_locations');
    $locations['side_navigation']       = $mainmenu->term_id;
    $locations['side_btm_navigation']   = $bottommenu->term_id;
    $locations['top_navigation']        = $mainmenu->term_id;
    $locations['mobile_navigation']     = $mainmenu->term_id;

    set_theme_mod( 'nav_menu_locations', $locations );
}


function jeg_add_widget_to_sidebar($sidebarSlug, $widgetSlug, $countMod, $widgetSettings = array())
{
    $sidebarOptions = get_option('sidebars_widgets');

    if(!isset($sidebarOptions[$sidebarSlug])){
        $sidebarOptions[$sidebarSlug] = array('_multiwidget' => 1);
    }
    $newWidget = get_option('widget_'.$widgetSlug);
    if(!is_array($newWidget))$newWidget = array();
    $count = count($newWidget)+1+$countMod;
    $sidebarOptions[$sidebarSlug][] = $widgetSlug.'-'.$count;

    $newWidget[$count] = $widgetSettings;

    update_option('sidebars_widgets', $sidebarOptions);
    update_option('widget_'.$widgetSlug, $newWidget);
}


function jeg_set_widget()
{
    update_option('sidebars_widgets', '');

    jeg_add_widget_to_sidebar( JEG_DEFAULT_WIDGET , 'jeg_popular_post_widget', 0, array('title' => 'Popular Post', 'numberpost' => "5"));
    jeg_add_widget_to_sidebar( JEG_DEFAULT_WIDGET , 'jeg_facebook_fans_widget', 1, array('title' => 'Like us on Facebook', 'facebookurl' => "http://www.facebook.com/jegbagusbarbershop"));
    jeg_add_widget_to_sidebar( JEG_DEFAULT_WIDGET , 'categories', 2, array('title' => 'Categories'));

    jeg_add_widget_to_sidebar( JEG_NAVI_WIDGET , 'jeg_twitter_widget', 0,
        array(
            'title' => 'Last Tweets',
            'twitter_username' => "envato",
            'twitter_count' => "5",
            'twitter_consumer_key' => "LDHaRhpcDsJWGPwZMu4g",
            'twitter_consumer_secret' => "fM45KKEhh4S944b2b0ycZgaYAyC4Bp8g3YudULoh8g",
            'twitter_access_token' => "20895127-3oPgo2visSmvCs0YKUmxgWT2pg8RzIOBeNWfN464L",
            'twitter_access_token_secret' => "pjgQsHk9Uge29WmhQYOEqno95Rj7HIaWh5M8OKafXw"
        )
    );

    jeg_add_widget_to_sidebar( JEG_FOOTER_WIDGET_1 , 'text', 0, array('title' => 'LOCATION', 'text' => "<p>88 Puputan Street<br>Denpasar, Bali, ID 80116</p>Open daily 7am-7pm"));
    jeg_add_widget_to_sidebar( JEG_FOOTER_WIDGET_2 , 'text', 0, array('title' => 'GET IN TOUCH', 'text' => '[iconlistwrapper][iconlist id="fa-facebook" color="#cd9a66" spin="false"]<a href="http://facebook.com">Facebook</a>[/iconlist][iconlist id="fa-twitter" color="#cd9a66" spin="false"]<a href="http://twitter.com">Twitter</a>[/iconlist][iconlist id="fa-google-plus" color="#cd9a66" spin="false"]<a href="http://plus.google.com">Google Plus</a>[/iconlist][iconlist id="fa-flickr" color="#cd9a66" spin="false"]<a href="http://flickr.com">Flickr</a>[/iconlist][/iconlistwrapper]'));
    jeg_add_widget_to_sidebar( JEG_FOOTER_WIDGET_3 , 'text', 0, array('title' => 'RESERVATION', 'text' => "+62.361.801.888<br>reservation@yourdomain.com"));
    jeg_add_widget_to_sidebar( JEG_FOOTER_WIDGET_4 , 'archives', 0, array('title' => 'Post Archive'));
}

function jeg_import_revolution()
{
    /** first delete the slider */
    $slider = new RevSlider();

    global $_FILES;
    $sliderpaths = array();

    if(!$slider->isAliasExists('santaicon')) {
        $sliderpaths[] = get_template_directory() . '/admin/import/data/santaicon.zip';
    }
    if(!$slider->isAliasExists('slider1')) {
        $sliderpaths[] = get_template_directory() . '/admin/import/data/slider1.zip';
    }
    if(!$slider->isAliasExists('resto')) {
        $sliderpaths[] = get_template_directory() . '/admin/import/data/resto.zip';
    }


    ob_start();
    if($sliderpaths) {
        foreach($sliderpaths as $sliderpath) {
            $_FILES["import_file"]["tmp_name"] = $sliderpath;
            $slider->importSliderFromPost(false, false);
        }
    }
    ob_end_clean();
}

function jeg_end_import() {
    // set menu location
    jeg_set_menu_location();
    jeg_create_notice("Finish Import Menu Location");

    // set widget
    jeg_set_widget();
    jeg_create_notice("Finish Import Widget");

    // import revolution slider
    jeg_import_revolution();
    jeg_create_notice("Finish Import Revolution Slider");

    // import panel
    jeg_panel_import();
    jeg_create_notice("Finish Import Theme Panel Setting");

    // switch permalink setting to day & name
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure( "/%year%/%monthnum%/%day%/%postname%/" );

    echo "<h3>Congratulation, Import Finished!</h3>";
}