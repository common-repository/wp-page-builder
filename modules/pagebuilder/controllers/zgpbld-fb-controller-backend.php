<?php

/**
 * Backend
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   Zigapage_wp
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2015 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      https://landera.softdiscover.com
 */
if (!defined('ABSPATH')) {
    exit('No direct script access allowed');
}
if (class_exists('Zgpbld_Fb_Controller_Backend')) {
    return;
}

/**
 * Controller Settings class
 *
 * @category  PHP
 * @package   Zigapage_wp
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1.00
 * @link      https://landera.softdiscover.com
 */
class Zgpbld_Fb_Controller_Backend extends Zgpbld_Base_Module {

    const VERSION = '0.1';

    private $wpdb = "";
    protected $modules;
    private $model_settings = "";

    /**
     * Constructor
     *
     * @mvc Controller
     */
    protected function __construct() {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->model_settings = self::$_models['pagebuilder']['settings'];
        // save settings options
        add_action('wp_ajax_zgpb_builder_setting_saveopts', array(&$this, 'ajax_save_options'));
        
        
        //blocked message
        add_action('wp_ajax_zgpb_builder_blocked_getmessage', array(&$this, 'ajax_blocked_getmessage'));
        
         //Handle the smush pro dismiss features notice ajax
        add_action( 'wp_ajax_zgpb_dismiss_upgrade_notice', array( $this, 'dismiss_upgrade_notice' ) );  
      
    }
    
    /**
     * Hide upgrade notice
     */
    function dismiss_upgrade_notice( $ajax = true ) {
            update_site_option( 'zgpb-hide_upgrade_notice', 1 );
            //No Need to send json response for other requests
            if ( $ajax ) {
                    wp_send_json_success();
            }
    }
    
    public function ajax_blocked_getmessage() {
         check_ajax_referer( 'zgpb_ajax_nonce', 'zgpb_security' );
        $message = (isset($_POST['message']) && $_POST['message']) ? Zgpbld_Form_Helper::sanitizeInput($_POST['message']) : '';
        
        $data=array();
        $data['message'] = $message;
            
        
        
        $json = array();
        $json['modal_header'] = self::render_template('pagebuilder/views/backend/modal_info_header.php', array("title"=>__('Feature Locked', 'zgpbd_admin')), 'always');
        $json['modal_body'] = self::render_template('pagebuilder/views/backend/blocked_getmessage.php', $data, 'always');
        $json['modal_footer'] = self::render_template('pagebuilder/views/backend/modal_info_footer.php', array(), 'always');

        header('Content-Type: application/json');
        echo json_encode($json);
        die();
        
    }
    /**
   
    
    /**
     * ajax_save_options()
     * Save options likes language
     * 
     * @return json
     */
    public function ajax_save_options() {

        check_ajax_referer('zgpb_ajax_nonce', 'zgpb_security');

        $opt_language = (isset($_POST['language']) && $_POST['language']) ? Zgpbld_Form_Helper::sanitizeInput($_POST['language']) : '';

        update_option('zigapage_lang', $opt_language);

        $json = array();
        $json['success'] = 1;


        header('Content-Type: application/json');
        echo json_encode($json);
        wp_die();
    }
    
    
    /**
     * view_settings()
     * View global settings
     * 
     * @return html
     */
    public function view_settings() {
        $data = array();
        $list_lang = array();
        $list_lang[] = array('val' => '', 'label' => __('Select language', 'zgpbd_admin'));
        $list_lang[] = array('val' => 'en_US', 'label' => __('english', 'zgpbd_admin'));
        $list_lang[] = array('val' => 'es_ES', 'label' => __('spanish', 'zgpbd_admin'));
        $list_lang[] = array('val' => 'fr_FR', 'label' => __('french', 'zgpbd_admin'));
        $list_lang[] = array('val' => 'de_DE', 'label' => __('german', 'zgpbd_admin'));
        $list_lang[] = array('val' => 'it_IT', 'label' => __('italian', 'zgpbd_admin'));
        $list_lang[] = array('val' => 'pt_BR', 'label' => __('portuguese', 'zgpbd_admin'));
        $list_lang[] = array('val' => 'ru_RU', 'label' => __('russian', 'zgpbd_admin'));
        $list_lang[] = array('val' => 'zh_CN', 'label' => __('chinese', 'zgpbd_admin'));
        $data['language'] = get_option('zigapage_lang');
        $data['lang_list'] = $list_lang;
        echo self::render_template('pagebuilder/views/backend/page_settings.php', $data);
    }
    
    /**
     * switchbutton_add()
     * Add buttons on backend
     */
    public function switchbutton_add() {

        add_action('edit_form_after_title', array(&$this, 'switchbutton_render'));
        add_action('admin_enqueue_scripts', array(&$this, 'load_admin_resources'));
    }
    
    /**
     * switchbutton_render()
     * Add main button on backend
     * 
     * @return html
     */
    public function switchbutton_render() {

        global $post;
        $data = array();
        $data['frontend_post_url'] = set_url_scheme(add_query_arg('zigapage_live_mode', '', get_permalink($post->ID)));
        echo self::render_template('pagebuilder/views/backend/switchbutton_render.php', $data);
    }
    
    
    /**
     *Adding css style
     *
     * @return int
     */ 
    public function switchbutton_style() {
        wp_register_style(
                ZGPBLD_PREFIX . 'admin', ZGPBLD_URL . '/assets/backend/css/admin-css.css', array(), ZGPBLD_VERSION, 'all'
        );
        wp_enqueue_style(ZGPBLD_PREFIX . 'admin');
    }

    /**
     * Enqueues CSS, JavaScript, etc
     */
    public function load_admin_resources() {

        //admin

        wp_register_script(
                ZGPBLD_PREFIX . 'admin', ZGPBLD_URL . '/assets/backend/js/admin-js.js', array(), ZGPBLD_VERSION, true
        );
        wp_register_style(
                ZGPBLD_PREFIX . 'admin', ZGPBLD_URL . '/assets/backend/css/admin-css.css', array(), ZGPBLD_VERSION, 'all'
        );

            
        global $wp_scripts;
        $jquery_ui_version = isset($wp_scripts->registered['jquery-ui-core']->ver) ? $wp_scripts->registered['jquery-ui-core']->ver : '1.11.4';
        /* load css */
        //loas ui

        switch ($jquery_ui_version) {
            case "1.11.4":
                wp_register_style('jquery-ui-style', ZGPBLD_URL . '/assets/common/css/jqueryui/1.11.4/themes/start/jquery-ui.min.css', array(), $jquery_ui_version);
                wp_enqueue_style('jquery-ui-style');
                break;
            case "1.10.4":
                wp_register_style('jquery-ui-style', ZGPBLD_URL . '/assets/common/css/jqueryui/1.10.4/themes/start/jquery-ui.min.css', array(), $jquery_ui_version);
                wp_enqueue_style('jquery-ui-style');
                break;
            default:
                wp_enqueue_style('jquery-ui');
                wp_enqueue_style('wp-jquery-ui-dialog');
        }

        //bootstrap
        wp_enqueue_style('sfdcgb-bootstrap', ZGPBLD_URL . '/assets/common/bootstrap/3.3.7/css/bootstrap-wrapper.css');
        wp_enqueue_style('sfdcgb-bootstrap-theme', ZGPBLD_URL . '/assets/common/bootstrap/3.3.7/css/bootstrap-theme-wrapper.css');
        
        wp_enqueue_style('sfdcgb-bootstrap-sfdc', ZGPBLD_URL . '/assets/common/bootstrap/3.3.7/css/bootstrap-sfdc.css');
        wp_enqueue_style('sfdcgb-bootstrap-theme-sfdc', ZGPBLD_URL . '/assets/common/bootstrap/3.3.7/css/bootstrap-theme-sfdc.css');
        wp_enqueue_style('sfdcgb-bootstrap-dropdown-sfdc', ZGPBLD_URL . '/assets/common/bootstrap/3.3.7/css/dropdown-sfdc.css');
        wp_enqueue_style('sfdcgb-bootstrap-modal-sfdc', ZGPBLD_URL . '/assets/common/bootstrap/3.3.7/css/modals-sfdc.css');
        wp_enqueue_style('sfdcgb-bootstrap-popovers-sfdc', ZGPBLD_URL . '/assets/common/bootstrap/3.3.7/css/popovers-sfdc.css');
        wp_enqueue_style('sfdcgb-bootstrap-tooltip-sfdc', ZGPBLD_URL . '/assets/common/bootstrap/3.3.7/css/tooltip-sfdc.css');
        
        //wp_enqueue_style('sfdcgb-bootstrap-theme', ZGPBLD_URL . '/assets/common/js/bootstrap/3.2.0-sfdc/bootstrap-theme-widget.css');
        wp_enqueue_style('sfdcgb-fontawesome', ZGPBLD_URL . '/assets/common/css/fontawesome/4.7.0/css/font-awesome.min.css');

        //custom fonts
        wp_enqueue_style('sfdcgb-customfonts', ZGPBLD_URL . '/assets/backend/css/custom/style.css');
        //animate
        wp_enqueue_style('sfdcgb-animate', ZGPBLD_URL . '/assets/backend/css/animate.css');

        //chosen
        wp_enqueue_style('sfdcgb-chosen', ZGPBLD_URL . '/assets/backend/js/chosen/chosen.css');
        wp_enqueue_style('sfdcgb-chosen-style', ZGPBLD_URL . '/assets/backend/js/chosen/style.css');
        //color picker
        wp_enqueue_style('sfdcgb-bootstrap-colorpicker', ZGPBLD_URL . '/assets/backend/js/colorpicker/bootstrap-colorpicker.css');

        // bootstrap switch
        wp_enqueue_style('sfdcgb-bootstrap-switch', ZGPBLD_URL . '/assets/backend/js/bswitch/bootstrap-switch.css');
        // bootstrap slider
        wp_enqueue_style('sfdcgb-bootstrap-slider', ZGPBLD_URL . '/assets/backend/js/bslider/4.12.1/bootstrap-slider.css');
        // bootstrap touchspin
        wp_enqueue_style('sfdcgb-bootstrap-touchspin', ZGPBLD_URL . '/assets/backend/js/btouchspin/jquery.bootstrap-touchspin.css');

        //codemirror 
        wp_enqueue_style('sfdcgb-codemirror', ZGPBLD_URL . '/assets/common/js/codemirror/codemirror.css');
        wp_enqueue_style('sfdcgb-codemirror-foldgutter', ZGPBLD_URL . '/assets/common/js/codemirror/addon/fold/foldgutter.css');

        //intro 
        wp_enqueue_style('sfdcgb-introjs', ZGPBLD_URL . '/assets/backend/js/introjs/introjs.css');

        //load main
        wp_enqueue_style(ZGPBLD_PREFIX . 'admin');


        /* load js */
        //load jquery
        wp_enqueue_script('jquery');
        wp_enqueue_script('jquery-zgpbld-validation', ZGPBLD_URL . '/assets/backend/js/jsvalidate/jquery.validate.min.js', array('jquery'), '1.9.0', true);
        // load jquery ui
        wp_enqueue_script('jquery-ui-core');
        wp_enqueue_script('jquery-ui-widget');
        wp_enqueue_script('jquery-ui-mouse');
        wp_enqueue_script("jquery-ui-dialog");
        wp_enqueue_script('jquery-ui-resizable');
        wp_enqueue_script('jquery-ui-position');
        wp_enqueue_script('jquery-ui-sortable');
        wp_enqueue_script('jquery-ui-draggable');
        wp_enqueue_script('jquery-ui-droppable');
        wp_enqueue_script('jquery-ui-accordion');
        wp_enqueue_script('jquery-ui-autocomplete');
        wp_enqueue_script('jquery-ui-menu');
        wp_enqueue_script('jquery-ui-datepicker');
        wp_enqueue_script('jquery-ui-slider');
        wp_enqueue_script('jquery-ui-spinner');
        wp_enqueue_script('jquery-ui-button');

        // Load upload an thickbox script
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');

        // Load thickbox CSS
        wp_enqueue_style('thickbox');

        // editor
        wp_enqueue_script('editor');
        // Media Uploader
        wp_enqueue_media();

        //md5
        //wp_enqueue_script('sfdcgb-md5', ZGPBLD_URL . '/assets/backend/js/md5.js');
            
        //retina
        wp_enqueue_script('sfdcgb-retina', ZGPBLD_URL . '/assets/backend/js/retina.js');
            
        //chosen
        wp_enqueue_script('sfdcgb-chosen', ZGPBLD_URL . '/assets/backend/js/chosen/chosen.jquery.min.js');
        
        //color picker
        wp_enqueue_script('sfdcgb-bootstrap-colorpicker', ZGPBLD_URL . '/assets/backend/js/colorpicker/bootstrap-colorpicker-mod.js', array('jquery', ZGPBLD_PREFIX . 'admin'), '1.0', true);
        
        //bootstrap switch
        wp_enqueue_script('sfdcgb-bootstrap-switch', ZGPBLD_URL . '/assets/backend/js/bswitch/bootstrap-switch.js', array('jquery', ZGPBLD_PREFIX . 'admin'), '1.0', true);
        //bootstrap slider
        wp_enqueue_script('sfdcgb-bootstrap-slider', ZGPBLD_URL . '/assets/backend/js/bslider/4.12.1/bootstrap-slider.js', array('jquery', ZGPBLD_PREFIX . 'admin'), '1.0', true);

        //bootstrap touchspin
        wp_enqueue_script('sfdcgb-bootstrap-touchspin', ZGPBLD_URL . '/assets/backend/js/btouchspin/jquery.bootstrap-touchspin.js', array('jquery', ZGPBLD_PREFIX . 'admin'), '1.0', true);
            
        //bootbox
        wp_enqueue_script('sfdcgb-bootbox', ZGPBLD_URL . '/assets/backend/js/bootbox/bootbox.js', array('jquery', ZGPBLD_PREFIX . 'admin'), '1.0', true);
        //intro
        wp_enqueue_script('sfdcgb-introjs', ZGPBLD_URL . '/assets/backend/js/introjs/intro.js');
            

        wp_enqueue_script('sfdcgb-codemirror', ZGPBLD_URL . '/assets/common/js/codemirror/codemirror.js', array(), '1.0', true);
        wp_enqueue_script('sfdcgb-codemirror-foldcode', ZGPBLD_URL . '/assets/common/js/codemirror/addon/fold/foldcode.js', array(), '1.0', true);
        wp_enqueue_script('sfdcgb-codemirror-foldgutter', ZGPBLD_URL . '/assets/common/js/codemirror/addon/fold/foldgutter.js', array(), '1.0', true);

        wp_enqueue_script('sfdcgb-codemirror-javascript', ZGPBLD_URL . '/assets/common/js/codemirror/mode/javascript/javascript.js', array(), '1.0', true);
        wp_enqueue_script('sfdcgb-codemirror-xml', ZGPBLD_URL . '/assets/common/js/codemirror/mode/xml/xml.js', array(), '1.0', true);
        wp_enqueue_script('sfdcgb-codemirror-css', ZGPBLD_URL . '/assets/common/js/codemirror/mode/css/css.js', array(), '1.0', true);
        
        //crypto
        wp_enqueue_script('sfdcgb-crypto', ZGPBLD_URL . '/assets/common/js/crypto/3.1.2/aes.js', array(), '3.1.2', true);
         
        //load variables
        wp_enqueue_script(ZGPBLD_PREFIX . 'admin');
        wp_localize_script(ZGPBLD_PREFIX . 'admin', 'zgpbld_vars', array('url_ajax' => admin_url('admin-ajax.php'),
            'url_site' => site_url(),
            'url_admin' => admin_url(),
            'url_plugin' => ZGPBLD_URL,
            'app_version' => ZGPBLD_VERSION,
            'app_is_frontend' => '0',
            'url_assets' => ZGPBLD_URL . "/assets",
            'ajax_nonce' => wp_create_nonce('zgpb_ajax_nonce')));
            
    }

    /**
     * Enqueues CSS, JavaScript, etc
     *
     */
    public function load_admin_resources2() {

        wp_register_style(
                ZGPBLD_PREFIX . 'admin', ZGPBLD_URL . '/assets/backend/css/admin-page-css.css', array(), ZGPBLD_VERSION, 'all'
        );
        wp_register_script(
                ZGPBLD_PREFIX . 'admin', ZGPBLD_URL . '/assets/backend/js/page-js.js', array(), ZGPBLD_VERSION, true
        );

            
        global $wp_scripts;
        $jquery_ui_version = isset($wp_scripts->registered['jquery-ui-core']->ver) ? $wp_scripts->registered['jquery-ui-core']->ver : '1.11.4';
        /* load css */
        //loas ui

        switch ($jquery_ui_version) {
            case "1.11.4":
                wp_register_style('jquery-ui-style', ZGPBLD_URL . '/assets/common/css/jqueryui/1.11.4/themes/start/jquery-ui.min.css', array(), $jquery_ui_version);
                wp_enqueue_style('jquery-ui-style');
                break;
            case "1.10.4":
                wp_register_style('jquery-ui-style', ZGPBLD_URL . '/assets/common/css/jqueryui/1.10.4/themes/start/jquery-ui.min.css', array(), $jquery_ui_version);
                wp_enqueue_style('jquery-ui-style');
                break;
            default:
                wp_enqueue_style('jquery-ui');
                wp_enqueue_style('wp-jquery-ui-dialog');
        }

        //bootstrap
        wp_enqueue_style('sfdcgb-bootstrap', ZGPBLD_URL . '/assets/common/js/bootstrap/3.2.0-sfdc/bootstrap-widget.css');
        //wp_enqueue_style('sfdcgb-bootstrap-theme', ZGPBLD_URL . '/assets/common/js/bootstrap/3.2.0-sfdc/bootstrap-theme-widget.css');
        wp_enqueue_style('sfdcgb-fontawesome', ZGPBLD_URL . '/assets/common/css/font-awesome.min.css');



        //load main
        wp_enqueue_style(ZGPBLD_PREFIX . 'admin');


        /* load js */
        //load jquery
        wp_enqueue_script('jquery');

        // load jquery ui
        wp_enqueue_script('jquery-ui-core');
        wp_enqueue_script('jquery-ui-widget');
        wp_enqueue_script('jquery-ui-mouse');
        wp_enqueue_script("jquery-ui-dialog");
        wp_enqueue_script('jquery-ui-resizable');
        wp_enqueue_script('jquery-ui-position');
        wp_enqueue_script('jquery-ui-sortable');
        wp_enqueue_script('jquery-ui-draggable');
        wp_enqueue_script('jquery-ui-droppable');
        wp_enqueue_script('jquery-ui-accordion');
        wp_enqueue_script('jquery-ui-autocomplete');
        wp_enqueue_script('jquery-ui-menu');
        wp_enqueue_script('jquery-ui-datepicker');
        wp_enqueue_script('jquery-ui-slider');
        wp_enqueue_script('jquery-ui-spinner');
        wp_enqueue_script('jquery-ui-button');

        // Load upload an thickbox script
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');

        // Load thickbox CSS
        wp_enqueue_style('thickbox');

        // editor
        wp_enqueue_script('editor');
        // Media Uploader
        wp_enqueue_media();

        wp_enqueue_script(ZGPBLD_PREFIX . 'admin');
        wp_localize_script(ZGPBLD_PREFIX . 'admin', 'zgpbld_vars', array('url_ajax' => admin_url('admin-ajax.php'),
            'url_site' => site_url(),
            'url_admin' => admin_url(),
            'url_plugin' => ZGPBLD_URL,
            'app_version' => ZGPBLD_VERSION,
            'app_is_frontend' => '0',
            'url_assets' => ZGPBLD_URL . "/assets",
            'ajax_nonce' => wp_create_nonce('zgpb_ajax_nonce')));
    }

    /**
     * Editor 2 show options
     *
     * @mvc Controller
     */
    public function editor1_show_options() {

            
        add_action('admin_enqueue_scripts', array($this->modules['pagebuilder']['backend'], 'load_admin_resources'), 20, 1);

        global $post;
            
        $data2 = $data = array();
        $data2['post_id'] = $post->ID;

        $data = array();
        $data['templates'] = self::render_template('pagebuilder/views/fields/show_opt_templates.php', $data2);
        $data['elements'] = self::render_template('pagebuilder/views/fields/show_opt_fields.php', $data2);
        $data['hiddens'] = self::render_template('pagebuilder/views/backend/editor1_hiddens.php', $data2);
        $data['others'] = self::render_template('pagebuilder/views/fields/show_opt_others.php', $data2);
        $data['variables'] = self::render_template('pagebuilder/views/fields/show_opt_variables.php', $data2);
        echo self::render_template('pagebuilder/views/backend/editor1_show_options.php', $data);
            
    }

    /**
     * Register callbacks for actions and filters
     *
     * @mvc Controller
     */
    public function register_hook_callbacks() {
        
    }

    /**
     * Initializes variables
     *
     * @mvc Controller
     */
    public function init() {

        try {
            //$instance_example = new WPPS_Instance_Class( 'Instance example', '42' );
            //add_notice('ba');
        } catch (Exception $exception) {
            add_notice(__METHOD__ . ' error: ' . $exception->getMessage(), 'error');
        }
    }

    /*
     * Instance methods
     */

    /**
     * Prepares sites to use the plugin during single or network-wide activation
     *
     * @mvc Controller
     *
     * @param bool $network_wide
     */
    public function activate($network_wide) {

        return true;
    }

    /**
     * Rolls back activation procedures when de-activating the plugin
     *
     * @mvc Controller
     */
    public function deactivate() {
        return true;
    }

    /**
     * Checks if the plugin was recently updated and upgrades if necessary
     *
     * @mvc Controller
     *
     * @param string $db_version
     */
    public function upgrade($db_version = 0) {
        return true;
    }

    /**
     * Checks that the object is in a correct state
     *
     * @mvc Model
     *
     * @param string $property An individual property to check, or 'all' to check all of them
     * @return bool
     */
    protected function is_valid($property = 'all') {
        return true;
    }

}

?>
