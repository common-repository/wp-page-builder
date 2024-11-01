<?php

/**
 * Intranet
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
class Zgpbld_Fb_Controller_Fields extends Zgpbld_Base_Module {

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

        //load field options
        add_action('wp_ajax_zgpb_builder_field_options', array(&$this, 'ajax_field_option'));
    }
    
    
    /**
     * Get field option in order to customize the field
     * 
     * @return json
     */
    public function ajax_field_option() {

        check_ajax_referer('zgpb_ajax_nonce', 'zgpb_security');

        $id = (isset($_POST['field_id'])) ? Zgpbld_Form_Helper::sanitizeInput(trim($_POST['field_id'])) : '';
        $type = (isset($_POST['field_type'])) ? Zgpbld_Form_Helper::sanitizeInput(trim($_POST['field_type'])) : '';
        $field_block = (isset($_POST['field_block'])) ? Zgpbld_Form_Helper::sanitizeInput(trim($_POST['field_block'])) : '';
        $field_block = (isset($field_block) && intval($field_block) > 0) ? $field_block : 0;
        $json = array();

        $json['modal_header'] = self::render_template('pagebuilder/views/fields/modal_field_header.php', array(), 'always');
        $json['modal_body'] = $this->load_field_options($type, $id);
        $json['modal_footer'] = self::render_template('pagebuilder/views/fields/modal_field_footer.php', array(), 'always');
        $json['field_id'] = $id;
        $json['field_type'] = $type;
        $json['field_block'] = $field_block;
        header('Content-Type: application/json');
        echo json_encode($json);
        die();
    }
    
    /**
     * load field option by type
     * 
     * @return json
     */
    public function load_field_options($type, $id, $block = null) {
        $output = '';

        switch (intval($type)) {
            case 1:
            case 2:
            case 3:
            case 4:
            case 5:
            case 6:
                $data = array();
                $data['field_id'] = $id;
                $data['field_type'] = $type;
                $data['field_block'] = (isset($block) && intval($block) > 0) ? $block : 0;
                $output .= self::render_template('pagebuilder/views/fields/modal_field_opt_column.php', $data, 'always');
                break;
            case 7:
                //text editor
                $data = array();
                $data['field_id'] = $id;
                $data['field_type'] = $type;
                $output .= self::render_template('pagebuilder/views/fields/modal_field_opt_text.php', $data, 'always');
                break;
            case 8:
                //html
            
                $data = array();
                $data['field_id'] = $id;
                $data['field_type'] = $type;
            
                $output .= self::render_template('pagebuilder/views/fields/modal_field_opt_html.php', $data, 'always');
                break;
            case 9:
                //heading
                $data = array();
                $data['field_id'] = $id;
                $data['field_type'] = $type;
                $output .= self::render_template('pagebuilder/views/fields/modal_field_opt_heading.php', $data, 'always');
                break;
            case 10:
                //button
                $data = array();
                $data['field_id'] = $id;
                $data['field_type'] = $type;
                $output .= self::render_template('pagebuilder/views/fields/modal_field_opt_button.php', $data, 'always');
                break;
            case 11:
                //image
                $data = array();
                $data['field_id'] = $id;
                $data['field_type'] = $type;
                $output .= self::render_template('pagebuilder/views/fields/modal_field_opt_image.php', $data, 'always');
                break;
            default:
        }

        return $output;
    }
    
    /**
     * Generate grid system css
     * 
     * @return string
     */
    public function posthtml_gridsystem_css($data) {

        $str_output_2 = '';

        foreach ($data as $key => $value) {

            //$key -> main or blocks
            if (!empty($value) && is_array($value)) {

                if ((string) $key === "main") {
                    //send info of main
                    $str_output_2 .= $this->posthtml_gridsystem_css_block($data['id'], 0, $value);
                } else {

                    foreach ($value as $key2 => $value2) {
                        //$key2 -> skin or index
                        if (is_array($value2)) {
                            $str_output_2 .= $this->posthtml_gridsystem_css_block($data['id'], $key2, $value2);
                        }
                    }
                }
            }
        }


        return $str_output_2;
    }
    
    /**
     * Generate grid system blocks
     * 
     * @return string
     */
    public function posthtml_gridsystem_css_block($id, $block, $data) {

        $data2 = array();
        if (intval($block) === 0) {
            $data2['id_str'] = '#zgpbf_' . $id . ' > .sfdc-container-fluid';
        } else {
            $data2['id_str'] = '#zgpbf_' . $id . ' > .sfdc-container-fluid > .sfdc-row > .zgpb-fl-gs-block-style[data-zgpb-blocknum="' . $block . '"] >.zgpb-fl-gs-block-inner';
        }
        $data2['skin'] = $data['skin'];

        return self::render_template('pagebuilder/views/fields/posthtml_gridsystem_css.php', $data2, 'always');
    }
    
    /**
     * Generate text editor field
     * 
     * @return string
     */
    public function posthtml_texteditor($value, $num_tab) {
        $data = array();
        $data['tab_num'] = $num_tab;
        $data = array_merge($data, $value);
        return self::render_template('pagebuilder/views/fields/posthtml_texteditor.php', $data, 'always');
    }
    
    /**
     * Generate text editor css
     * 
     * @return string
     */
    public function posthtml_texteditor_css($data) {

        return self::render_template('pagebuilder/views/fields/posthtml_texteditor_css.php', $data, 'always');
    }
    
    /**
     * Generate heading field
     * 
     * @return string
     */
    public function posthtml_heading($value, $num_tab) {
        $data = array();
        $data['tab_num'] = $num_tab;
        $data = array_merge($data, $value);
        return self::render_template('pagebuilder/views/fields/posthtml_heading.php', $data, 'always');
    }
    
    /**
     * Generate heading css
     * 
     * @return string
     */
    public function posthtml_heading_css($data) {

        return self::render_template('pagebuilder/views/fields/posthtml_heading_css.php', $data, 'always');
    }
    
    /**
     * Generate button field
     * 
     * @return string
     */
    public function posthtml_button($value, $num_tab) {
        $data = array();
        $data['tab_num'] = $num_tab;
        $data = array_merge($data, $value);
        return self::render_template('pagebuilder/views/fields/posthtml_button.php', $data, 'always');
    }
    
    /**
     * Generate button css
     * 
     * @return string
     */
    public function posthtml_button_css($data) {

        return self::render_template('pagebuilder/views/fields/posthtml_button_css.php', $data, 'always');
    }
    
    /**
     * Generate html editor field
     * 
     * @return string
     */
    public function posthtml_htmleditor($value, $num_tab) {
        $data = array();
        $data['tab_num'] = $num_tab;
        $data = array_merge($data, $value);
        return self::render_template('pagebuilder/views/fields/posthtml_htmleditor.php', $data, 'always');
    }
    
    /**
     * Generate html editor css
     * 
     * @return string
     */
    public function posthtml_htmleditor_css($data) {
        return self::render_template('pagebuilder/views/fields/posthtml_htmleditor_css.php', $data, 'always');
    }
    
    /**
     * Generate image field
     * 
     * @return string
     */
    public function posthtml_image($value, $num_tab) {
        $data = array();
        $data['tab_num'] = $num_tab;
        $data = array_merge($data, $value);
        return self::render_template('pagebuilder/views/fields/posthtml_image.php', $data, 'always');
    }
    
    /**
     * Generate image css
     * 
     * @return string
     */
    public function posthtml_image_css($data) {
        return self::render_template('pagebuilder/views/fields/posthtml_image_css.php', $data, 'always');
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
