<?php

/**
 * Frontend
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
if (class_exists('Zgpbld_Fb_Controller_Frontend')) {
    return;
}

/**
 * Controller Frontend class
 *
 * @category  PHP
 * @package   Zigapage_wp
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1.00
 * @link      https://landera.softdiscover.com
 */
class Zgpbld_Fb_Controller_Frontend extends Zgpbld_Base_Module {

    const VERSION = '1.2';

    private $model_settings = "";
    private $wpdb = "";
    protected $modules;

    const PREFIX = 'wpzgpb_';

    /**
     * Constructor
     *
     * @mvc Controller
     */
    protected function __construct() {

        $this->model_settings = self::$_models['pagebuilder']['settings'];

        global $wpdb;
        $this->wpdb = $wpdb;
    }

    /**
     * Show options on frontend
     *
     * @mvc Controller
     */
    public function editor2_show_options() {

        if (Zgpbld_Form_Helper::check_live_mode()) {

            global $wp_the_query;
            $post_id = $wp_the_query->post->ID;

            $data2 = $data = array();
            $data2['post_id'] = $post_id;

            $data['elements'] = self::render_template('pagebuilder/views/fields/show_opt_fields.php', $data2);
            $data['templates'] = self::render_template('pagebuilder/views/fields/show_opt_templates.php', $data2);
            $data['others'] = self::render_template('pagebuilder/views/fields/show_opt_others.php', $data2);
            $data['hiddens'] = self::render_template('pagebuilder/views/frontend/editor2_hiddens.php', $data2);
            $data['variables'] = self::render_template('pagebuilder/views/fields/show_opt_variables.php', $data2);
            echo self::render_template('pagebuilder/views/frontend/editor2_show_options.php', $data);
        }
    }

    /**
     * Adding no cache on frontend
     *
     * @mvc Controller
     */
    public function editor2_no_cache() {

        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: no-store, no-cache, must-revalidate');
        header('Cache-Control: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');
        header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
    }

    /**
     * Enqueues CSS, JavaScript, etc
     *
     * @mvc Controller
     */
    public function load_resources() {
        //admin

        wp_register_script(
                ZGPBLD_PREFIX . 'admin', ZGPBLD_URL . '/assets/frontend/js/js.js', array('jquery', 'wp-util'), ZGPBLD_VERSION, true
        );
        wp_register_style(
                ZGPBLD_PREFIX . 'admin', ZGPBLD_URL . '/assets/frontend/css/css.css', array(), ZGPBLD_VERSION, 'all'
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

        //nicescroll
        wp_enqueue_script('sfdcgb-nicescroll', ZGPBLD_URL . '/assets/frontend/js/nicescroll/jquery.nicescroll.js', array('jquery', ZGPBLD_PREFIX . 'admin'), '1.0', true);

        //intro
         wp_enqueue_script('sfdcgb-introjs', ZGPBLD_URL . '/assets/backend/js/introjs/intro.js');
            
        //codemirror 

        wp_enqueue_script('sfdcgb-codemirror', ZGPBLD_URL . '/assets/common/js/codemirror/codemirror.js', array(), '1.0', true);
        wp_enqueue_script('sfdcgb-codemirror-foldcode', ZGPBLD_URL . '/assets/common/js/codemirror/addon/fold/foldcode.js', array(), '1.0', true);
        wp_enqueue_script('sfdcgb-codemirror-foldgutter', ZGPBLD_URL . '/assets/common/js/codemirror/addon/fold/foldgutter.js', array(), '1.0', true);

        wp_enqueue_script('sfdcgb-codemirror-javascript', ZGPBLD_URL . '/assets/common/js/codemirror/mode/javascript/javascript.js', array(), '1.0', true);
        wp_enqueue_script('sfdcgb-codemirror-xml', ZGPBLD_URL . '/assets/common/js/codemirror/mode/xml/xml.js', array(), '1.0', true);
        wp_enqueue_script('sfdcgb-codemirror-css', ZGPBLD_URL . '/assets/common/js/codemirror/mode/css/css.js', array(), '1.0', true);


            
        //load rocket form
        wp_enqueue_script(ZGPBLD_PREFIX . 'admin');
        wp_localize_script(ZGPBLD_PREFIX . 'admin', 'zgpbld_vars', array('url_ajax' => admin_url('admin-ajax.php'),
            'url_site' => site_url(),
            'url_admin' => admin_url(),
            'url_plugin' => ZGPBLD_URL,
            'app_version' => ZGPBLD_VERSION,
            'app_is_frontend' => '1',
            'url_assets' => ZGPBLD_URL . "/assets",
            'ajax_nonce' => wp_create_nonce('zgpb_ajax_nonce')));
            
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
