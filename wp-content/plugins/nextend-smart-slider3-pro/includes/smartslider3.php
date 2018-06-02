<?php
define('NEXTEND_SMARTSLIDER_3_URL', plugins_url(NEXTEND_SMARTSLIDER_3_URL_PATH));

if (!class_exists('N2WP', false)) {
    require_once(dirname(NEXTEND_SMARTSLIDER_3__FILE__) . '/nextend/nextend.php');
    require_once(dirname(NEXTEND_SMARTSLIDER_3__FILE__) . '/library/smartslider/smartslider3.php');
}

class SmartSlider3 {

    public static function init() {
        if (class_exists('N2Wordpress')) {
            SmartSlider3::registerApplication();
        } else {
            add_action('nextend_loaded', 'SmartSlider3::registerApplication');
        }

        add_action('init', 'SmartSlider3::_init');

        add_action('init', 'SmartSlider3::preRender');

        add_action('load-toplevel_page_' . NEXTEND_SMARTSLIDER_3_URL_PATH, 'SmartSlider3::removeEmoji');

        add_action('admin_menu', 'SmartSlider3::nextendAdminInit');

        add_action('network_admin_menu', 'SmartSlider3::nextendNetworkAdminInit');

        register_activation_hook(NEXTEND_SMARTSLIDER_3__FILE__, 'SmartSlider3::install');

        add_action('upgrader_process_complete', 'SmartSlider3::upgrade', 10, 2);

        add_action('wpmu_new_blog', 'SmartSlider3::install_new_blog');
        add_action('delete_blog', 'SmartSlider3::delete_blog', 10, 2);
        add_filter('site_transient_update_plugins', 'N2_SMARTSLIDER_3_PRO_UPDATE::injectUpdate'); //WP 3.0+
        add_filter('transient_update_plugins', 'N2_SMARTSLIDER_3_PRO_UPDATE::injectUpdate'); //WP 2.8+

        add_filter('upgrader_pre_download', 'N2_SMARTSLIDER_3_PRO_UPDATE::upgrader_pre_download', 10, 3);

        add_filter('plugins_api_args', 'N2_SMARTSLIDER_3_PRO_UPDATE::plugins_api_args', 10, 2);
    

        require_once dirname(NEXTEND_SMARTSLIDER_3__FILE__) . DIRECTORY_SEPARATOR . 'includes/shortcode.php';
        require_once dirname(NEXTEND_SMARTSLIDER_3__FILE__) . DIRECTORY_SEPARATOR . 'includes/widget.php';
        require_once dirname(NEXTEND_SMARTSLIDER_3__FILE__) . DIRECTORY_SEPARATOR . 'editor' . DIRECTORY_SEPARATOR . 'shortcode.php';

        if (class_exists('acf', false)) {
            require_once dirname(__FILE__) . '/integrations/acf.php';
        }

        add_action('et_builder_ready', 'SmartSlider3::divi');

        add_action('vc_after_set_mode', 'SmartSlider3::visualComposer');

        if (class_exists('FLBuilderModel', false)) {
            SmartSlider3::beaverBuilder();
        }

        add_action('elementor/init', 'SmartSlider3::elementor');

        add_action('tailor_init', 'SmartSlider3::tailor');

        add_filter('fw_extensions_locations', 'SmartSlider3::unyson_extension');

        if (class_exists('MPCEShortcode', false)) {
            SmartSlider3::motoPressCE();
        }

        if (isset($_GET['pswLoad']) && $_GET['pswLoad'] == 1 || isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
            N2SS3Shortcode::forceIframe('psw');
        }
    }

    public static function removeEmoji() {

        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('admin_print_scripts', 'print_emoji_detection_script');
    }

    public static function unyson_extension($locations) {
        if (version_compare(fw()->manifest->get_version(), '2.6.0', '>=')) {
            $path             = dirname(__FILE__) . '/integrations/unyson';
            $locations[$path] = plugin_dir_url(__FILE__) . 'integrations/unyson';
        }

        return $locations;
    }

    public static function wpseo_xml_sitemap_post_url($permalink, $post) {
        global $shortcode_tags;
        $_shortcode_tags    = $shortcode_tags;
        $shortcode_tags     = array("smartslider3" => "N2SS3Shortcode::doShortcode");
        $post->post_content = do_shortcode($post->post_content);
        $shortcode_tags     = $_shortcode_tags;

        return $permalink;
    }

    public static function removeShortcode() {
        remove_shortcode('smartslider3');
    }

    public static function registerApplication() {

        N2Base::registerApplication(dirname(NEXTEND_SMARTSLIDER_3__FILE__) . '/library/smartslider/N2SmartsliderApplicationInfo.php');
    }

    public static function _init() {
        N2Loader::import('libraries.settings.settings', 'smartslider');
        if (current_user_can('smartslider_edit') && intval(N2SmartSliderSettings::get('wp-adminbar', 1))) {
            add_action('admin_bar_menu', 'SmartSlider3::admin_bar_menu', 81);
        }

        if (N2SmartSliderSettings::get('yoast-sitemap', 1)) {
            add_filter('wpseo_xml_sitemap_post_url', 'SmartSlider3::wpseo_xml_sitemap_post_url', 10, 2);
        }
    }

    public static function preRender() {

        if (isset($_GET['n2prerender']) && isset($_GET['n2app'])) {
            if (current_user_can('smartslider')) {
                try {
                    N2Base::getApplication($_GET['n2app'])
                          ->getApplicationType(N2Platform::$isAdmin ? 'backend' : 'frontend')
                          ->setCurrent()
                          ->render(array(
                              "prerender"  => true,
                              "controller" => $_GET['n2controller'],
                              "action"     => $_GET['n2action']
                          ));
                    n2_exit(true);
                } catch (Exception $e) {
                    exit;
                }
            } else if (isset($_GET['sliderid']) && isset($_GET['hash']) && md5($_GET['sliderid'] . NONCE_SALT) == $_GET['hash']) {
                try {
                    N2Base::getApplication('smartslider')
                          ->getApplicationType('frontend')
                          ->setCurrent()
                          ->render(array(
                              "prerender"  => true,
                              "controller" => 'slider',
                              "action"     => 'iframe'
                          ));
                    n2_exit(true);
                } catch (Exception $e) {
                    exit;
                }
            }
        }
    }

    public static function nextendAdminInit() {
        $icon = NEXTEND_SMARTSLIDER_3_URL . '/icon.png';
        if (isset($_REQUEST['page']) && $_REQUEST['page'] == NEXTEND_SMARTSLIDER_3_URL_PATH) {
            $icon = NEXTEND_SMARTSLIDER_3_URL . '/icon-active.png';
        }


        add_menu_page('Smart Slider', 'Smart Slider', 'smartslider', NEXTEND_SMARTSLIDER_3_URL_PATH, 'SmartSlider3::application', $icon);

        function nextend_smart_slider_admin_menu() {
            echo '<style type="text/css">#adminmenu .toplevel_page_' . NEXTEND_SMARTSLIDER_3_URL_PATH . ' .wp-menu-image img{opacity: 1;}</style>';
        }

        add_action('admin_head', 'nextend_smart_slider_admin_menu');
    }

    public static function nextendNetworkAdminInit() {
        $icon = NEXTEND_SMARTSLIDER_3_URL . '/icon.png';
        add_menu_page('Smart Slider Update', 'Smart Slider Update', 'smartslider', NEXTEND_SMARTSLIDER_3_URL_PATH, 'SmartSlider3::networkUpdate', $icon);

        function nextend_smart_slider_admin_menu() {
            echo '<style type="text/css">#adminmenu .toplevel_page_' . NEXTEND_SMARTSLIDER_3_URL_PATH . '{display: none;}</style>';
        }

        add_action('admin_head', 'nextend_smart_slider_admin_menu');
    }

    public static function networkUpdate() {
        N2Base::getApplication("smartslider")
              ->getApplicationType('backend')
              ->setCurrent()
              ->render(array(
                  "controller" => 'update',
                  "action"     => 'update'
              ));
        n2_exit();
    }

    public static function application($dummy, $controller = 'sliders', $action = 'index') {

        if (get_option("n2_ss3_version") != N2SS3::$version) {
            self::install(true);
        }

        N2Base::getApplication("smartslider")
              ->getApplicationType('backend')
              ->setCurrent()
              ->render(array(
                  "controller" => $controller,
                  "action"     => $action
              ));
        n2_exit();
    }

    public static function install($network_wide) {
        global $wpdb;

        N2WP::install($network_wide);

        if (is_multisite() && $network_wide) {
            $tmpPrefix = $wpdb->prefix;
            $blogs     = get_sites(array('network_id' => $wpdb->siteid));
            foreach ($blogs AS $blog) {
                $wpdb->prefix = $wpdb->get_blog_prefix($blog->blog_id);

                N2Base::getApplication("smartslider")
                      ->getApplicationType('backend')
                      ->render(array(
                          "controller" => "install",
                          "action"     => "index",
                          "useRequest" => false
                      ), array(true));
            }

            $wpdb->prefix = $tmpPrefix;
        } else {

            N2Base::getApplication("smartslider")
                  ->getApplicationType('backend')
                  ->render(array(
                      "controller" => "install",
                      "action"     => "index",
                      "useRequest" => false
                  ), array(true));
        }

        update_option("n2_ss3_version", N2SS3::$version);

        return true;
    }

    public static function upgrade($upgrader_object, $options) {
        if (isset($options['plugins']) && is_array($options['plugins']) && $options['action'] == 'update' && $options['type'] == 'plugin') {
            foreach ($options['plugins'] as $plugin) {
                if ($plugin == NEXTEND_SMARTSLIDER_3_BASENAME) {
                    self::install(true);
                }
            }
        }
    }

    public static function install_new_blog($blog_id) {
        global $wpdb;
        N2WP::install_new_blog($blog_id);

        $tmpPrefix    = $wpdb->prefix;
        $wpdb->prefix = $wpdb->get_blog_prefix($blog_id);

        N2Base::getApplication("smartslider")
              ->getApplicationType('backend')
              ->render(array(
                  "controller" => "install",
                  "action"     => "index",
                  "useRequest" => false
              ), array(true));

        $wpdb->prefix = $tmpPrefix;
    }

    public static function delete_blog($blog_id, $drop) {
        if ($drop) {
            N2WP::delete_blog($blog_id, $drop);

            global $wpdb;
            $prefix = $wpdb->get_blog_prefix($blog_id);
            $wpdb->query('DROP TABLE IF EXISTS ' . $prefix . 'nextend2_smartslider3_generators, ' . $prefix . 'nextend2_smartslider3_sliders,	' . $prefix . 'nextend2_smartslider3_slides, ' . $prefix . 'nextend2_smartslider3_sliders_xref;');

        }
    }

    public static function import($file) {
        N2Base::getApplication("smartslider")
              ->getApplicationType('backend');

        N2Loader::import(array(
            'models.Sliders',
            'models.Slides'
        ), 'smartslider');

        N2Loader::import('libraries.import', 'smartslider');

        $import   = new N2SmartSliderImport();
        $sliderId = $import->import($file);

        if ($sliderId !== false) {
            return $sliderId;
        }

        return false;
    }

    public static function divi() {
        require_once dirname(__FILE__) . '/integrations/Divi.php';
    }

    public static function visualComposer() {
        require_once dirname(__FILE__) . '/integrations/VisualComposer.php';
    }

    public static function elementor() {
        require_once dirname(__FILE__) . '/integrations/Elementor.php';
    }

    public static function beaverBuilder() {
        require_once dirname(__FILE__) . '/integrations/beaver-builder/BeaverBuilder.php';
    }

    public static function tailor() {
        require_once dirname(__FILE__) . '/integrations/tailor.php';
    }

    public static function motoPressCE() {
        require_once dirname(__FILE__) . '/integrations/MotoPressCE.php';
    }

    /**
     * @param WP_Admin_Bar $wp_admin_bar
     */
    public static function admin_bar_menu($wp_admin_bar) {
        global $wpdb;

        $wp_admin_bar->add_node(array(
            'id'     => 'new_content_smart_slider',
            'parent' => 'new-content',
            'title'  => 'Slider [Smart Slider 3]',
            'href'   => admin_url("admin.php?page=" . NEXTEND_SMARTSLIDER_3_URL_PATH . '#createslider')
        ));

        $wp_admin_bar->add_node(array(
            'id'    => 'smart_slider_3',
            'title' => 'Smart Slider',
            'href'  => admin_url("admin.php?page=" . NEXTEND_SMARTSLIDER_3_URL_PATH)
        ));

        $wp_admin_bar->add_node(array(
            'id'     => 'smart_slider_3_dashboard',
            'parent' => 'smart_slider_3',
            'title'  => 'Dashboard',
            'href'   => admin_url("admin.php?page=" . NEXTEND_SMARTSLIDER_3_URL_PATH)
        ));

        $wp_admin_bar->add_node(array(
            'id'     => 'smart_slider_3_create_slider',
            'parent' => 'smart_slider_3',
            'title'  => 'Create slider',
            'href'   => admin_url("admin.php?page=" . NEXTEND_SMARTSLIDER_3_URL_PATH . '#createslider')
        ));

        $query   = 'SELECT sliders.title, sliders.id, slides.thumbnail
            FROM ' . $wpdb->prefix . 'nextend2_smartslider3_sliders AS sliders
            LEFT JOIN ' . $wpdb->prefix . 'nextend2_smartslider3_slides AS slides ON slides.id = (SELECT id FROM ' . $wpdb->prefix . 'nextend2_smartslider3_slides WHERE slider = sliders.id AND published = 1 AND generator_id = 0 AND thumbnail NOT LIKE \'\' ORDER BY ordering DESC LIMIT 1)
            ORDER BY time DESC LIMIT 10';
        $sliders = $wpdb->get_results($query, ARRAY_A);

        if (count($sliders)) {

            $wp_admin_bar->add_node(array(
                'id'     => 'smart_slider_3_edit',
                'parent' => 'smart_slider_3',
                'title'  => 'Edit slider',
                'href'   => admin_url("admin.php?page=" . NEXTEND_SMARTSLIDER_3_URL_PATH)
            ));

            foreach ($sliders AS $slider) {
                $wp_admin_bar->add_node(array(
                    'id'     => 'smart_slider_3_slider_' . $slider['id'],
                    'parent' => 'smart_slider_3_edit',
                    'title'  => '#' . $slider['id'] . ' - ' . $slider['title'],
                    'href'   => admin_url("admin.php?page=" . NEXTEND_SMARTSLIDER_3_URL_PATH . '&nextendcontroller=slider&nextendaction=edit&sliderid=' . $slider['id'])
                ));
            }

            if (count($sliders) == 10) {
                $wp_admin_bar->add_node(array(
                    'id'     => 'smart_slider_3_slider_view_all',
                    'parent' => 'smart_slider_3_edit',
                    'title'  => 'View all',
                    'href'   => admin_url("admin.php?page=" . NEXTEND_SMARTSLIDER_3_URL_PATH)
                ));
            }
        }
    }

    public static function sliderSelectAction($jQueryNode) {
        return 'NextendSmartSliderSelectModal(' . $jQueryNode . ');';
    }
}

SmartSlider3::init();
class N2_SMARTSLIDER_3_PRO_UPDATE {

    public static function plugins_api_args($args, $action) {
        if ($action == 'plugin_information' && $args->slug == 'nextend-smart-slider3-pro') {
            $args->slug = 'smart-slider-3';
        }

        return $args;
    }

    public static function injectUpdate($updates) {
        global $wp_version;

        if (!isset($updates->response["nextend-smart-slider3-pro/nextend-smart-slider3-pro.php"])) {
            N2Base::getApplication("smartslider")
                  ->getApplicationType('backend');
            N2Loader::import(array(
                'models.License',
                'models.Update'
            ), 'smartslider');

            $updater = N2SmartsliderUpdateModel::getInstance();
            if ($updater->hasUpdate()) {
                $updates->response["nextend-smart-slider3-pro/nextend-smart-slider3-pro.php"] = (object)array(
                    "id"            => 0,
                    "slug"          => "nextend-smart-slider3-pro",
                    "plugin"        => "nextend-smart-slider3-pro/nextend-smart-slider3-pro.php",
                    "new_version"   => $updater->getVersion(),
                    "url"           => "https://wordpress.org/plugins/smart-slider-3/",
                    "package"       => str_replace('http://', 'https://', N2SS3::api(array(
                        'action' => 'update'
                    ), true)),
                    "tested"        => $wp_version,
                    "compatibility" => true,
                    "icons"         => array(
                        '1x'      => 'https://smartslider3.com/images/icon-128x128.png',
                        '2x'      => 'https://smartslider3.com/images/icon-256x256.png',
                        'default' => 'https://smartslider3.com/images/icon-128x128.png'
                    )
                );
            }
        }

        return $updates;
    }

    public static function upgrader_pre_download($reply, $package, $upgrader) {
        if (strpos($package, 'product=smartslider3') === false) {
            return $reply;
        }

        N2Base::getApplication("smartslider")
              ->getApplicationType('backend');
        N2Loader::import(array(
            'models.License'
        ), 'smartslider');

        $status = N2SmartsliderLicenseModel::getInstance()
                                           ->isActive(false);

        $message = '';
        switch ($status) {
            case 'OK':
                return $reply;
            case 'ASSET_PREMIUM':
            case 'LICENSE_EXPIRED':
                $message = 'Your <a href="https://smartslider3.helpscoutdocs.com/article/1101-license" target="_blank">license</a> expired! Get new one: <a href="https://smartslider3.com/pricing" target="_blank">smartslider3.com</a>';
                break;
            case 'DOMAIN_REGISTER_FAILED':
                $message = 'Your license key authorized on a different domain! You can move it to this domain like <a href="https://smartslider3.helpscoutdocs.com/article/1101-license#move" target="_blank">this</a>, or get new one: <a href="https://smartslider3.com/pricing" target="_blank">smartslider3.com</a>';
                break;
            case 'LICENSE_INVALID':
                $message = 'License key is missing or invalid, please <a href="https://smartslider3.helpscoutdocs.com/article/1101-license" target="_blank">enter again</a> or get one: <a href="https://smartslider3.com/pricing" target="_blank">smartslider3.com</a>';
                N2SmartsliderLicenseModel::getInstance()
                                         ->setKey('');
                break;
                break;
            case 'PLATFORM_NOT_ALLOWED':
                $message = 'Your <a href="https://smartslider3.helpscoutdocs.com/article/1101-license" target="_blank">license key</a> is not valid for WordPress! Get a license for WordPress: <a href="https://smartslider3.com/pricing" target="_blank">smartslider3.com</a>';
                break;
            case null:
                $message = 'Licensing server not reachable, try again later!';
                break;
            default:
                $message = 'Unknown error, please write an email to support@nextendweb.com with the following status: ' . $status;
                break;
        }

        $reply                  = new WP_Error('SS3_ERROR', $message);
        $upgrader->result       = null;
        $upgrader->skin->result = $reply;

        return $reply;
    }
}
