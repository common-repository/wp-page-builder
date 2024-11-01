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
if (class_exists('Zgpbld_Fb_Controller_Posts')) {
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
class Zgpbld_Fb_Controller_Posts extends Zgpbld_Base_Module {

    const VERSION = '0.1';

    private $wpdb = "";
    protected $modules;
    private $model_settings = "";

    /**
     * @var
     */
    public $cur_post_id;

    /**
     * @var
     */
    public $cur_post_type;

    /**
     * @var
     */
    public $cur_post_settings;

    /**
     * @var
     */
    public $cur_post_core;

    /**
     * @var
     */
    public $gen_post_src;

    /**
     * @var
     */
    public $cur_post_is_rendering = null;

    /**
     * @var
     */
    public $cur_is_admin = false;

    /**
     * @var
     */
    public $cur_is_singular = false;

    /**
     * @var
     */
    public $cur_zmenu_is_active = false;

    /**
     * Constructor
     *
     * @mvc Controller
     */
    protected function __construct() {
            
        //load field options
        add_action('wp_ajax_zgpb_builder_save_page', array(&$this, 'ajax_save_post'));
        add_action('wp_ajax_nopriv_zgpb_builder_save_page', array(&$this, 'ajax_save_post'));

        //load export feature
        add_action('wp_ajax_zgpb_builder_export', array(&$this, 'ajax_modal_export'));
        add_action('wp_ajax_nopriv_zgpb_builder_export', array(&$this, 'ajax_modal_export'));

        //refresh zbuilder enable
        add_action('wp_ajax_zgpb_builder_refresh_menuoptions', array(&$this, 'ajax_refresh_menuoptions'));
        add_action('wp_ajax_nopriv_zgpb_builder_refresh_menuoptions', array(&$this, 'ajax_refresh_menuoptions'));

        //load import feature
        add_action('wp_ajax_zgpb_builder_import', array(&$this, 'ajax_modal_import'));
        add_action('wp_ajax_nopriv_zgpb_builder_import', array(&$this, 'ajax_modal_import'));
        add_action('wp_ajax_zgpb_builder_import_process', array(&$this, 'ajax_modal_import_process'));
        add_action('wp_ajax_nopriv_zgpb_builder_import_process', array(&$this, 'ajax_modal_import_process'));


        //load post content
        add_action('wp_ajax_zgpb_builder_get_postcontent', array(&$this, 'ajax_get_postcontent'));
        add_action('wp_ajax_nopriv_zgpb_builder_get_postcontent', array(&$this, 'ajax_get_postcontent'));

        //load template content
        add_action('wp_ajax_zgpb_builder_get_template', array(&$this, 'ajax_get_template'));
        add_action('wp_ajax_nopriv_zgpb_builder_get_template', array(&$this, 'ajax_get_template'));


        //adding post meta to post
        add_action('save_post', array(&$this, 'savepost_addpostmeta'));

        //restoring post revision
        add_action('wp_restore_post_revision', array(&$this, 'restore_postrevision'), 10, 2);


        //filter
        //remove p tag
        remove_filter('the_content', 'wpautop');
        remove_filter('the_excerpt', 'wpautop');
        add_filter('the_content', array(&$this, 'filter_post_show_content'));
        //add variables
        add_filter('zgbd_editor_variables_load', array(&$this, 'filter_variables_load'));


        add_filter('edit_post_link', array(&$this, 'filter_edit_post_link'));

        //show revision
        add_filter('_wp_post_revision_fields', array(&$this, 'filter_post_rev_f'));

        //action
        add_action('admin_bar_menu', array(&$this, 'action_admin_bar_menu'), 9999);
    }

    /**
     * Filtering post html
     * 
     * @return string
     */
    public function filter_post_rev_f($fields) {

        if (ZGPBLD_DEBUG == 1) {
            $fields['_zgpb_post_core_dev'] = '_zgpb_post_core';
            $fields['_zgpb_admin_cont_html'] = '_zgpb_admin_cont_html';
        }

        return $fields;
    }
    
    
    /**
     * Restoring revision to some point
     */
    public function restore_postrevision($post_id, $revision_id) {
        $post = get_post($post_id);
        $revision = get_post($revision_id);

        $_zgpb_post_is_enabled = get_post_meta($revision->ID, '_zgpb_post_is_enabled', true);
        $_zgpb_post_settings = get_post_meta($revision->ID, '_zgpb_post_settings', true);
        $_zgpb_post_core = get_post_meta($revision->ID, '_zgpb_post_core', true);
        $_zgpb_post_core_dev = get_post_meta($revision->ID, '_zgpb_post_core_dev', true);
        $_zgpb_post_html = get_post_meta($revision->ID, '_zgpb_post_html', true);
        $_zgpb_post_html_css = get_post_meta($revision->ID, '_zgpb_post_html_css', true);
        $_zgpb_admin_cont_html = get_post_meta($revision->ID, '_zgpb_admin_cont_html', true);

        update_post_meta($post_id, '_zgpb_post_is_enabled', $_zgpb_post_is_enabled);

        if (!empty($_zgpb_post_settings)) {
            update_post_meta($post_id, '_zgpb_post_settings', $_zgpb_post_settings);
        }
        if (!empty($_zgpb_post_core_dev)) {
            update_post_meta($post_id, '_zgpb_post_core_dev', $_zgpb_post_core_dev);
        }
        if (!empty($_zgpb_post_core)) {
            update_post_meta($post_id, '_zgpb_post_core', $_zgpb_post_core);
        }
        if (!empty($_zgpb_post_html)) {
            update_post_meta($post_id, '_zgpb_post_html', $_zgpb_post_html);
        }
        if (!empty($_zgpb_post_html_css)) {
            update_post_meta($post_id, '_zgpb_post_html_css', $_zgpb_post_html_css);

            //generate form css
            ob_start();
            $pathCssFile = ZGPBLD_DIR . '/public/zgpb_post_' . $post_id . '.css';
            $f = fopen($pathCssFile, "w");
            fwrite($f, $_zgpb_post_html_css);
            fclose($f);
            ob_end_clean();
        }
        if (!empty($_zgpb_admin_cont_html)) {
            update_post_meta($post_id, '_zgpb_admin_cont_html', $_zgpb_admin_cont_html);
        }
    }

    /**
     * Saving post meta
     * 
     */
    public function savepost_addpostmeta($post_id) {

        $parent_id = wp_is_post_revision($post_id);

        if ($parent_id) {

            $parent = get_post($parent_id);
            $zgpb_post_enabled = get_post_meta($parent->ID, '_zgpb_post_is_enabled', true);


            if (intval($zgpb_post_enabled) === 0) {
                return;
            }

            $_zgpb_post_is_enabled = get_post_meta($parent->ID, '_zgpb_post_is_enabled', true);
            $_zgpb_post_settings = get_post_meta($parent->ID, '_zgpb_post_settings', true);
            $_zgpb_post_core = get_post_meta($parent->ID, '_zgpb_post_core', true);
            $_zgpb_post_core_dev = get_post_meta($parent->ID, '_zgpb_post_core_dev', true);
            $_zgpb_post_html = get_post_meta($parent->ID, '_zgpb_post_html', true);
            $_zgpb_post_html_css = get_post_meta($parent->ID, '_zgpb_post_html_css', true);
            $_zgpb_admin_cont_html = get_post_meta($parent->ID, '_zgpb_admin_cont_html', true);

            // only add metadata works, update post doesn't work
            add_metadata('post', $post_id, '_zgpb_post_is_enabled', $_zgpb_post_is_enabled);
            add_metadata('post', $post_id, '_zgpb_post_settings', $_zgpb_post_settings);
            add_metadata('post', $post_id, '_zgpb_post_core', $_zgpb_post_core);
            add_metadata('post', $post_id, '_zgpb_post_core_dev', $_zgpb_post_core_dev);
            add_metadata('post', $post_id, '_zgpb_post_html', $_zgpb_post_html);
            add_metadata('post', $post_id, '_zgpb_post_html_css', $_zgpb_post_html_css);
            add_metadata('post', $post_id, '_zgpb_admin_cont_html', $_zgpb_admin_cont_html);
        }
    }
    
    /**
     * Refresing menu options
     * 
     * @return string
     */
    public function ajax_refresh_menuoptions() {

        check_ajax_referer('zgpb_ajax_nonce', 'zgpb_security');

        $zgpb_is_enabled = (isset($_POST['zgpb_is_enabled']) && $_POST['zgpb_is_enabled']) ? Zgpbld_Form_Helper::sanitizeInput($_POST['zgpb_is_enabled']) : '0';
        $post_id = (isset($_POST['post_id']) && $_POST['post_id']) ? Zgpbld_Form_Helper::sanitizeInput($_POST['post_id']) : '0';


        if (intval($zgpb_is_enabled) === 1) {
            update_post_meta($post_id, '_zgpb_post_is_enabled', '1');
        } else {
            update_post_meta($post_id, '_zgpb_post_is_enabled', '0');
        }


        $json = array();
        $json['zgpb_is_enabled'] = get_post_meta($post_id, '_zgpb_post_is_enabled', true);
        header('Content-Type: application/json');
        echo json_encode($json);
        die();
    }
    
    /**
     * Ajax modal export option
     * 
     * @return string
     */
    public function ajax_modal_export() {

        check_ajax_referer('zgpb_ajax_nonce', 'zgpb_security');

        $zgpb_data_core = (isset($_POST['zgpb_data_core'])) ? urldecode(Zgpbld_Form_Helper::sanitizeInput_html($_POST['zgpb_data_core'])) : '';
        $zgpb_data_core = str_replace("\'", "'", $zgpb_data_core);
        $zgpb_data_core = (isset($zgpb_data_core) && $zgpb_data_core) ? array_map(array('Zgpbld_Form_Helper', 'sanitizeRecursive_html'), json_decode($zgpb_data_core, true)) : array();
        $json = array();
        $json['modal_header'] = self::render_template('pagebuilder/views/posts/modal_export_header.php', array(), 'always');

        $data = array();
        $data['code'] = Zgpbld_Form_Helper::base64url_encode(serialize($zgpb_data_core));
        $json['modal_body'] = self::render_template('pagebuilder/views/posts/modal_export_body.php', $data, 'always');
        $json['modal_footer'] = self::render_template('pagebuilder/views/posts/modal_export_footer.php', array(), 'always');

        header('Content-Type: application/json');
        echo json_encode($json);
        die();
    }
    
    /**
     * Ajax modal import option
     * 
     * @return string
     */
    public function ajax_modal_import() {

        check_ajax_referer('zgpb_ajax_nonce', 'zgpb_security');

        $json = array();
        $json['modal_header'] = self::render_template('pagebuilder/views/posts/modal_import_header.php', array(), 'always');
        $json['modal_body'] = self::render_template('pagebuilder/views/posts/modal_import_body.php', array(), 'always');
        $json['modal_footer'] = self::render_template('pagebuilder/views/posts/modal_import_footer.php', array(), 'always');

        header('Content-Type: application/json');
        echo json_encode($json);
        die();
    }
    
    /**
     * Ajax modal import process
     * 
     * @return string
     */
    public function ajax_modal_import_process() {

        check_ajax_referer('zgpb_ajax_nonce', 'zgpb_security');

        $imp_form = (isset($_POST['importcode']) && $_POST['importcode']) ? Zgpbld_Form_Helper::sanitizeInput($_POST['importcode']) : '';
        $dump_post = unserialize(Zgpbld_Form_Helper::base64url_decode($imp_form));
            
        $this->cur_post_id = null;
        $this->cur_post_core = $dump_post;
        $content = $this->post_get_admin_content();


        $json = array();
        $json['data'] = $dump_post;
        $json['post_content'] = $content;
        header('Content-Type: application/json');
        echo json_encode($json);
        die();
    }
    
    /**
     * Filtering post link
     * 
     * @return string
     */
    public function filter_edit_post_link($link) {
        if ($this->post_is_editable()) {
            global $wp_the_query;
            return $link . ' <a href="' . set_url_scheme(add_query_arg('zigapage_live_mode', '', get_permalink($wp_the_query->post->ID))) . '" id="zgpb-inline-post-link" >' . __('Edit with Landera', 'zgpbd_admin') . '</a>';
        }

        return $link;
    }
    
    /**
     * Add new global variables
     * 
     * @return string
     */
    public function filter_variables_load($vars) {

        $this->cur_post_id = $this->post_get_id();
            
        if ($this->zbuilder_postmeta_is_enabled()) {
            $tmp_is_enabled = 1;
        } else {
            $tmp_is_enabled = 0;
        }
            
        return array_merge($vars, array(
            'zgpb_is_enabled' => $tmp_is_enabled
                ));
    }
    
    /**
     * adding bar menu
     * 
     * @return string
     */
    public function action_admin_bar_menu($wp_admin_bar) {
        if ($this->post_is_editable()) {
            global $wp_the_query;

            $wp_admin_bar->add_node(array(
                'id' => 'zgpb-inline-admin-bar-link',
                'title' => __('Edit with Landera', 'zgpbd_admin'),
                'href' => set_url_scheme(add_query_arg('zigapage_live_mode', '', get_permalink($wp_the_query->post->ID)))
            ));
        }
    }
    
    /**
     * Showing post content
     * 
     * @return string
     */
    public function filter_post_show_content($content) {
        $this->cur_post_id = $this->post_get_id();
        $post_is_rendering = $this->cur_post_id != $this->cur_post_is_rendering;
        $in_the_loop = in_the_loop();
       
        if ($post_is_rendering && ($in_the_loop) && $this->zbuilder_is_enabled() && !$this->zbuilder_is_active()
        ) {

            //flag to run once and avoid other processes to run
            remove_filter('the_content', array(&$this, 'filter_show_content'));
            $this->cur_post_is_rendering = $this->cur_post_id;

            //output content
            $content = $this->post_get_content($content);

            //end flag to run once and avoid other processes to run
            add_filter('the_content', array(&$this, 'filter_show_content'));
            $this->cur_post_is_rendering = null;
        } else if ($post_is_rendering && $this->zbuilder_is_enabled() && $this->zbuilder_is_active()
        ) {

            $this->cur_post_is_rendering = $this->cur_post_id;
            //$content=$this->post_get_admin_content($content);

            $content = get_post_meta($this->cur_post_id, '_zgpb_admin_cont_html', true);


            $this->cur_post_is_rendering = null;
        }

        return $content;
    }
    
    /**
     * Get admin content
     * 
     * @return string
     */
    public function post_get_admin_content($content = null) {

        $output = '';

        //generate form html
        $gen_return = $this->generate_admin_ouput_html($this->cur_post_id);
        $output .= $gen_return['output_html'];
        return $output;
    }
    
    /**
     * Get content
     * 
     * @return string
     */
    public function post_get_content($content) {

        $output = '';
            
        $this->load_resources($this->cur_post_id);
            
        $post_data_core = get_post_meta($this->cur_post_id, '_zgpb_post_core', true);
        if (!empty($post_data_core)) {
            $output = get_post_meta($this->cur_post_id, '_zgpb_post_html', true);
        } else {
            $output = $content;
        }

        return $output;
    }

    /**
     * Enqueues CSS, JavaScript, etc
     *
     * @mvc Controller
     */
    public function load_resources($post_id) {

            
       //bootstrap
        wp_enqueue_style('sfdcgb-bootstrap', ZGPBLD_URL . '/assets/common/bootstrap/3.3.7/css/bootstrap-sfdc.css');
        wp_enqueue_style('sfdcgb-bootstrap-theme', ZGPBLD_URL . '/assets/common/bootstrap/3.3.7/css/bootstrap-theme-sfdc.css');
        
        wp_enqueue_style('sfdcgb-bootstrap-sfdc', ZGPBLD_URL . '/assets/common/bootstrap/3.3.7/css/bootstrap-sfdc.css');
        wp_enqueue_style('sfdcgb-bootstrap-theme-sfdc', ZGPBLD_URL . '/assets/common/bootstrap/3.3.7/css/bootstrap-theme-sfdc.css');
        wp_enqueue_style('sfdcgb-bootstrap-dropdown-sfdc', ZGPBLD_URL . '/assets/common/bootstrap/3.3.7/css/dropdown-sfdc.css');
        wp_enqueue_style('sfdcgb-bootstrap-modal-sfdc', ZGPBLD_URL . '/assets/common/bootstrap/3.3.7/css/modals-sfdc.css');
        wp_enqueue_style('sfdcgb-bootstrap-popovers-sfdc', ZGPBLD_URL . '/assets/common/bootstrap/3.3.7/css/popovers-sfdc.css');
        wp_enqueue_style('sfdcgb-bootstrap-tooltip-sfdc', ZGPBLD_URL . '/assets/common/bootstrap/3.3.7/css/tooltip-sfdc.css');
        
        //wp_enqueue_style('sfdcgb-bootstrap-theme', ZGPBLD_URL . '/assets/common/js/bootstrap/3.2.0-sfdc/bootstrap-theme-widget.css');
        wp_enqueue_style('sfdcgb-fontawesome', ZGPBLD_URL . '/assets/common/css/fontawesome/4.7.0/css/font-awesome.min.css');

        wp_enqueue_style('zgpb-prod-post-global', ZGPBLD_URL . '/assets/common/css/prod-global.css');
        wp_enqueue_style('zgpb-prod-post-style', ZGPBLD_URL . '/public/zgpb_post_' . $post_id . '.css');
        wp_enqueue_style('zgpb-prod-post-responsive', ZGPBLD_URL . '/assets/common/css/prod-responsive.css');
    }

    public function zbuilder_is_enabled() {
            
        if (post_password_required() && !$this->_is_admin()) {
            return false;
        }

        if ($this->zbuilder_postmeta_is_enabled()) {

            return true;
        }

        return false;
    }

    public function _is_admin() {

        if (is_admin()) {
            return true;
        } else if ($this->cur_is_admin) {
            return true;
        }

        return false;
    }

    public function zbuilder_postmeta_is_enabled() {

        $output = 0;
        $post_data = get_post($this->cur_post_id);
        if ($post_data && in_array($post_data->post_type, array('page', 'post'))) {

            $output = get_post_meta($this->cur_post_id, '_zgpb_post_is_enabled', true);
        }
        return (intval($output) === 1) ? true : false;
    }

    /**
     * check if page builder is active
     *
     * @return bool
     */
    public function zbuilder_is_active() {
        $output = false;

        if ($this->post_is_editable() && !post_password_required() && ($this->zbuilder_menu_is_active())
        ) {
            $output = true;
            
        }

        return $output;
    }

    /**
     * check if page builder menu is active
     *
     * @return bool
     */
    public function zbuilder_menu_is_active() {
        global $pagenow;

        if (isset($this->cur_zmenu_is_active) && $this->cur_zmenu_is_active) {
            return true;
        }

        if (in_array($pagenow, array('post.php', 'post-new.php'))) {
            return true;
        }

        if (isset($_GET['zigapage_live_mode'])) {
            return true;
        }

        return false;
    }

    /**
     * Check if post is editable
     *
     * @return bool
     */
    public function post_is_editable() {

        $post_id = $this->post_get_data('id');
        $post_type = $this->post_get_data('post_type');

        $output = false;
        if (is_numeric($post_id) && intval($post_id) > 0 && $this->post_is_singular()) {
            if (current_user_can('edit_post', $post_id) && in_array($post_type, array('page', 'post'))
            ) {
                $output = true;
            }
        }

        return $output;
    }
    
    /**
     * if post is singular
     * 
     * @return string
     */
    public function post_is_singular() {
        if (isset($this->cur_is_singular) && $this->cur_is_singular) {
            return $this->cur_is_singular;
        }
        if (is_singular()) {
            return true;
        }

        return false;
    }
    
    
    /**
     * Get Post data
     * 
     * @return string
     */
    public function post_get_data($name) {

        global $wp_the_query;

        $output = null;
        switch ($name) {
            case 'id':
                if (isset($wp_the_query->post)) {
                    $output = $wp_the_query->post->ID;
                } else if (isset($this->cur_post_id) && intval($this->cur_post_id) > 0) {
                    $output = $this->cur_post_id;
                }

                break;
            case 'post_type':

                if (isset($wp_the_query->post)) {
                    $output = $wp_the_query->post->post_type;
                } else if (isset($this->cur_post_type)) {
                    $output = $this->cur_post_type;
                }
                break;
        }

        return $output;
    }
    
    /**
     * Ajax get templates
     * 
     * @return json
     */
    public function ajax_get_template() {
        try {
            check_ajax_referer('zgpb_ajax_nonce', 'zgpb_security');
            $tmp_type = (isset($_POST['template_type'])) ? Zgpbld_Form_Helper::sanitizeInput(trim($_POST['template_type'])) : '1';
            $post_id = (isset($_POST['post_id'])) ? Zgpbld_Form_Helper::sanitizeInput(trim($_POST['post_id'])) : 0;
            $post_type = (isset($_POST['post_type'])) ? Zgpbld_Form_Helper::sanitizeInput(trim($_POST['post_type'])) : '';


            $post = get_post(absint($post_id));

            $json = array();
            if (!$post) {
                throw new Exception(__('Invalid ID', 'zgpbd_admin'));
            }


            $this->cur_post_type = $post_type;
            $this->cur_post_id = $post_id;
            $this->cur_is_admin = true;
            $this->cur_is_singular = true;
            $this->cur_zmenu_is_active = true;


            if (!$this->zbuilder_is_enabled() && !$this->zbuilder_is_active()) {
                throw new Exception(__('Landera is not enabled and is not active', 'zgpbd_admin'));
            }



            $this->cur_post_id = null;

            $json_file = file_get_contents(ZGPBLD_DIR . '/assets/common/json/template_one.json');

            $json_file = str_replace("[%ZGPBLD_URL_TMP%]", ZGPBLD_URL . '/assets/common/imgs/templates/one/', $json_file);
            $json_file = str_replace("[%ZGPBLD_URL_TMP2%]", ZGPBLD_URL . '/assets/common/imgs/templates/one/', $json_file);
            $json_file = str_replace("[%ZGPBLD_URL_TMP3%]", ZGPBLD_URL . '/helpers/styles-font-menu/styles-fonts/png/', $json_file);

            $obj = json_decode($json_file, true);




            $json['post_content'] = $obj['post_content'];
            $json['data'] = $obj['data'];


            $json['post_getcont_success'] = 1;
        } catch (Exception $exception) {

            $json = array();
            $json['post_getcont_success'] = 0;
            $json['post_error_log'] = $exception->getMessage();
        }


        header('Content-Type: application/json');
        echo json_encode($json);
        die();
    }
    
    
    /**
     * Get post content
     * 
     * @return json
     */
    public function ajax_get_postcontent() {


        try {
            check_ajax_referer('zgpb_ajax_nonce', 'zgpb_security');

            $post_id = (isset($_POST['post_id'])) ? Zgpbld_Form_Helper::sanitizeInput(trim($_POST['post_id'])) : 0;
            $post_type = (isset($_POST['post_type'])) ? Zgpbld_Form_Helper::sanitizeInput(trim($_POST['post_type'])) : '';

            $post = get_post(absint($post_id));

            $json = array();

            if (!$post) {
                throw new Exception(__('Invalid ID', 'zgpbd_admin'));
            }

            $this->cur_post_type = $post_type;
            $this->cur_post_id = $post_id;
            $this->cur_is_admin = true;
            $this->cur_is_singular = true;
            $this->cur_zmenu_is_active = true;


            if (!$this->zbuilder_is_enabled() && !$this->zbuilder_is_active()) {
                throw new Exception(__('Landera is not enabled and is not active', 'zgpbd_admin'));
            }

            // if($this->check_User_Access()){
            $content_post = get_post($this->cur_post_id);
            $content = $content_post->post_content;

            // $json['post_content_current']=$content;

            $post_data_core = get_post_meta($this->cur_post_id, '_zgpb_post_core', true);
            if (!empty($post_data_core)) {
                $json['post_content'] = get_post_meta($this->cur_post_id, '_zgpb_admin_cont_html', true);
                $json['data'] = get_post_meta($post_id, '_zgpb_post_core', true);
            } else {
                $this->cur_post_id = null;
                $tmp_data = $this->get_firsttime_content($content);
                $json['post_content'] = $tmp_data['admin_cont_html'];
                $json['data'] = $tmp_data['core_data'];
            }

            

            $json['post_getcont_success'] = 1;

            
        } catch (Exception $exception) {

            $json = array();
            $json['post_getcont_success'] = 0;
            $json['post_error_log'] = $exception->getMessage();
        }


        header('Content-Type: application/json');
        echo json_encode($json);
        die();
    }
    
    /**
     * Get first time content
     * 
     * @return json
     */
    public function get_firsttime_content($old_content) {
        $json_string = '{"app_ver":"1","main":{"add_css":"","add_js":""},"fields_design":{"content":[{"iscontainer":"0","num_tab":"0","type":"8","id":"uiue8ls4qjl"}]},"fields_src":{"uiue8ls4qjl":{"type":"8","id":"uiue8ls4qjl","type_n":"fhtml","input1":{"text":"here%20goes%20your%20content"},"skin":{"margin":{"show_st":"1","top":"0","bottom":"0","left":"0","right":"0"},"padding":{"show_st":"1","top":"0","bottom":"0","left":"0","right":"0"},"custom_css":{"ctm_id":"","ctm_class":"","ctm_additional":""}}}}}';
        $data_core = json_decode($json_string, true);
        $data_core['fields_src']['uiue8ls4qjl']['input1']['text'] = Zgpbld_Form_Helper::encodeURIComponent($old_content);
        $this->cur_post_core = $data_core;
        $data = array();
        $data['admin_cont_html'] = $this->post_get_admin_content();
        $data['core_data'] = $data_core;
        return $data;
    }

    /**
     * Ajax save post
     * 
     * @return json
     */
    public function ajax_save_post() {
        $post_error_logs = array();
        try {


            check_ajax_referer('zgpb_ajax_nonce', 'zgpb_security');

            $zgpb_data_settings = (isset($_POST['zgpb_data_settings'])) ? urldecode(Zgpbld_Form_Helper::sanitizeInput_html($_POST['zgpb_data_settings'])) : '';
            $zgpb_data_settings = str_replace("\'", "'", $zgpb_data_settings);
            $zgpb_data_settings = (isset($zgpb_data_settings) && $zgpb_data_settings) ? array_map(array('Zgpbld_Form_Helper', 'sanitizeRecursive_html'), json_decode($zgpb_data_settings, true)) : array();

            $zgpb_data_core = (isset($_POST['zgpb_data_settings'])) ? urldecode(Zgpbld_Form_Helper::sanitizeInput_html($_POST['zgpb_data_core'])) : '';
            $zgpb_data_core = str_replace("\'", "'", $zgpb_data_core);
            $zgpb_data_core = (isset($zgpb_data_core) && $zgpb_data_core) ? array_map(array('Zgpbld_Form_Helper', 'sanitizeRecursive_html'), json_decode($zgpb_data_core, true)) : array();


            $post_status = (isset($_POST['post_status'])) ? Zgpbld_Form_Helper::sanitizeInput(trim($_POST['post_status'])) : 'draft';
            $post_content = (isset($_POST['post_content'])) ? Zgpbld_Form_Helper::sanitizeInput(trim($_POST['post_content'])) : '';

            $this->cur_post_settings = $zgpb_data_settings;
            $this->cur_post_core = $zgpb_data_core;

            $this->cur_post_id = $this->post_get_id();
            $tmp_var = array();
            $tmp_var['type'] = "edit_post";
            $update_status = 0;

            //attach ziga builder variable to post
            update_post_meta($this->cur_post_id, '_zgpb_post_is_enabled', '1');
            update_post_meta($this->cur_post_id, '_zgpb_post_settings', $this->cur_post_settings);
            update_post_meta($this->cur_post_id, '_zgpb_post_core', $this->cur_post_core);

            ob_start();
            ?>
            <pre>
            <?php
            print_r($this->cur_post_core);
            ?>
            </pre>
            <?php
            $str_output = ob_get_contents();
            ob_end_clean();
            update_post_meta($this->cur_post_id, '_zgpb_post_core_dev', '<ul>' . $str_output . '</ul>');

            /* global for fonts */
            global $global_fonts_stored;
            $global_fonts_stored = array();

            /* global for additional css */
            global $glb_f_addt_stored;
            $glb_f_addt_stored = array();

            //generate form html
            $gen_return = $this->generate_ouput_html($this->cur_post_id);

            $data = array();
            $data['prod_html'] = $gen_return['output_html'];
            $data3 = array();
            $data3['fonts'] = $global_fonts_stored;
            $gen_return['output_css'] = self::render_template('pagebuilder/views/fields/posthtml_css_font.php', $data3) . $gen_return['output_css'];
            $data4 = array();
            $data4['addt'] = $glb_f_addt_stored;
            $gen_return['output_css'] .= self::render_template('pagebuilder/views/fields/posthtml_css_addt.php', $data4);
            $data['prod_html_css'] = $gen_return['output_css'];

            //generate form css
            ob_start();
            $pathCssFile = ZGPBLD_DIR . '/public/zgpb_post_' . $this->cur_post_id . '.css';
            $f = fopen($pathCssFile, "w");
            fwrite($f, $gen_return['output_css']);
            fclose($f);
            ob_end_clean();

            update_post_meta($this->cur_post_id, '_zgpb_post_html', $data['prod_html']);
            update_post_meta($this->cur_post_id, '_zgpb_post_html_css', $data['prod_html_css']);
            //admin content_panel
            $data['admin_cont_html'] = $this->post_get_admin_content();
            update_post_meta($this->cur_post_id, '_zgpb_admin_cont_html', $data['admin_cont_html']);


            if ($this->check_User_Access()) {

                switch ((string) $post_status) {
                    case 'draft':
                    case 'publish':
                        if (!current_user_can('publish_posts')) {
                            throw new Exception(__('Current user can not publish posts', 'zgpbd_admin'));
                        }
                        break;
                }


                //update post
                $post_data = array(
                    'ID' => $this->cur_post_id,
                    'post_status' => $post_status,
                    'post_content' => $data['prod_html']
                );
                $update_status = wp_update_post($post_data, true);
            }

            $json = array();
            $json['post_id'] = $this->cur_post_id;
            $json['zgpb_data'] = $this->cur_post_core;
            $json['post_status'] = $post_status;
            $json['post_content'] = $post_content;

            if (is_numeric($update_status) && intval($update_status) > 0) {
                $json['post_update_success'] = 1;
            } else {
                $json['post_update_success'] = 0;
                //$json['post_update_message'] = $update_status;

                $post_error_logs[] = $update_status;
                $json['post_error_log'] = $post_error_logs;
            }
        } catch (Exception $exception) {

            $json = array();
            $post_error_logs[] = $exception->getMessage();
            $json['post_update_success'] = 0;
            $json['post_error_log'] = $post_error_logs;
        }

        if ($json['post_update_success'] === 0) {

            $data = array();
            $data['post_error_log'] = $post_error_logs;
            $json['modal_header'] = self::render_template('pagebuilder/views/posts/modal_savepost_fail_header.php', array(), 'always');
            $json['modal_body'] = self::render_template('pagebuilder/views/posts/modal_savepost_fail_body.php', $data, 'always');
            $json['modal_footer'] = self::render_template('pagebuilder/views/posts/modal_savepost_fail_footer.php', array(), 'always');
        }

        header('Content-Type: application/json');
        echo json_encode($json);
        die();
    }

    /**
     * Generate post html
     * 
     * @return json
     */
    public function generate_ouput_html($post_id = null) {

        $fmb_data = get_post_meta($post_id, '_zgpb_post_core', true);
        //all fields position
        $fields_design = $fmb_data['fields_design'];
        // all data fields
        // $fields_src = $fmb_data['fields_src'];
        $this->gen_post_src = $fmb_data['fields_src'];
        //generating

        $str_output_2 = '';
        $str_output_main = '';
        $tab_cont_num = 1;
        //  foreach ($tab_cont as $key => $value) {
        //tabs
        $str_output = '';
        if (!empty($fields_design['content'])) {
            foreach ($fields_design['content'] as $key2 => $value2) {
                $get_data = array();

                //fields
                if (isset($value2['iscontainer']) && intval($value2['iscontainer']) === 1) {
                    $get_data = $this->generate_post_getChildren($value2);
                    $str_output .= $get_data['output_html'];
                    $str_output_2 .= $get_data['output_css'];
                } else {
                    $get_data = $this->generate_post_getField($value2);
                    $str_output .= $get_data['output_html'];
                    $str_output_2 .= $get_data['output_css'];
                }
            }
        }

        //set main container
        $str_output_main .= $this->generate_post_mainContainer($str_output);

        // }
        //generate form css
        $str_output_2 .= $this->generate_post_css($post_id);
                    

        $return = array();
        $return['output_html'] = $str_output_main;
        $return['output_css'] = $str_output_2;

        return $return;
    }
    
    /**
     * Generate admin post html
     * 
     * @return json
     */
    public function generate_admin_ouput_html($post_id = null) {

        if ($post_id) {
            $fmb_data = get_post_meta($post_id, '_zgpb_post_core', true);
            $this->cur_post_core = $fmb_data;
        } else if (!empty($this->cur_post_core)) {
            $fmb_data = $this->cur_post_core;
        } else {
            return;
        }

        //all fields position
        $fields_design = $fmb_data['fields_design'];
        // all data fields
                    
        $this->gen_post_src = $fmb_data['fields_src'];
        //generating

        $str_output_2 = '';
        $str_output_main = '';
        $tab_cont_num = 1;
                    
        //tabs
        $str_output = '';
        if (!empty($fields_design['content'])) {
            foreach ($fields_design['content'] as $key2 => $value2) {
                $get_data = array();

                //fields
                if (isset($value2['iscontainer']) && intval($value2['iscontainer']) === 1) {

                    $get_data = $this->generate_admin_post_getChildren($value2);
                    $str_output .= $get_data['output_html'];
                } else {

                    $get_data = $this->generate_admin_post_getField($value2);
                    $str_output .= $get_data['output_html'];
                }
            }
        }

        //set main container
        $str_output_main .= $this->generate_admin_post_mainContainer($str_output);



        $return = array();
        $return['output_html'] = $str_output_main;


        return $return;
    }
    
    /**
     * Generate post main container
     * 
     * @return json
     */
    public function generate_post_mainContainer($str_output) {
        $output = '';
        $data = array();
        $data['html_fields'] = $str_output;

        $output .= self::render_template('pagebuilder/views/posts/posthtml_maincontainer.php', $data, 'always');

        return $output;
    }
    
    /**
     * Generate admin post main container
     * 
     * @return json
     */
    public function generate_admin_post_mainContainer($str_output) {
        $output = '';
        $data = array();
        $data['html_fields'] = $str_output;

        $output .= self::render_template('pagebuilder/views/posts/prevpanel_maincontainer.php', $data, 'always');

        return $output;
    }
    
    /**
     * Generate post css
     * 
     * @return json
     */
    public function generate_post_css($post_id = null) {
        $data = array();
        $data['post_id'] = $post_id;
        // $data['skin'] = $this->current_data_skin;
        return self::render_template('pagebuilder/views/posts/posthtml_css_global.php', $data);
    }
    
    /**
     * Generate post children
     * 
     * @return json
     */
    protected function generate_post_getChildren($child_field) {
        $str_output = '';
        $str_output_2 = '';
        switch (intval($child_field['type'])) {
            case 1:
            case 2:
            case 3:
            case 4:
            case 5:
            case 6:
                if (intval($child_field['count_children']) >= 0) {
                    $str_output .= '<div id="zgpbf_' . $child_field['id'] . '" class="zgpbf-gridsystem-cont">';
                    $str_output .= '<div class="sfdc-container-fluid">';
                    $str_output .= '<div class="sfdc-row">';
                    $count_str = 0;
                    foreach ($child_field['inner'] as $key => $value) {
                        $str_output .= '<div data-zgpb-blocknum="' . $value['num_tab'] . '" class="zgpb-fl-gs-block-style sfdc-col-md-' . $value['cols'] . '">';
                        if ($count_str === $key) {
                            $str_output .= '<div class="zgpb-fl-gs-block-inner">';
                        } else {
                            $str_output .= '<div class="zgpb-fl-gs-block-inner">';
                        }
                        if (!empty($value['children'])) {
                            foreach ($value['children'] as $key2 => $value2) {
                                //get field
                                $get_data = array();
                                $str_output .= '<div class="">';
                                if (isset($value2['iscontainer']) && intval($value2['iscontainer']) === 1) {
                                    $get_data = $this->generate_post_getChildren($value2);
                                    $str_output .= $get_data['output_html'];
                                    $str_output_2 .= $get_data['output_css'];
                                } else {
                                    $get_data = $this->generate_post_getField($value2);
                                    $str_output .= $get_data['output_html'];
                                    $str_output_2 .= $get_data['output_css'];
                                }
                                $str_output .= '</div>';
                            }
                        }
                        $str_output .= '</div>';
                        $str_output .= '</div>';
                    }
                    $str_output .= '</div>';
                    $str_output .= '</div>';
                    $str_output .= '</div>';
                }

                $data = array();
                $data = $this->gen_post_src[$child_field['id']];
                $str_output_2 .= self::$_modules['pagebuilder']['fields']->posthtml_gridsystem_css($data);

                break;
            case 31:
                /* panel */

                break;
            default:
                break;
        }
        $return = array();
        $return['output_html'] = $str_output;
        $return['output_css'] = $str_output_2;

        return $return;
    }
    
    /**
     * Generate admin post children
     * 
     * @return json
     */
    protected function generate_admin_post_getChildren($child_field) {
        $str_output = '';
        $str_output_2 = '';

        $grid_order = array(1 => 'one', 2 => 'two', 3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six');

        switch (intval($child_field['type'])) {
            case 1:
            case 2:
            case 3:
            case 4:
            case 5:
            case 6:

                if (intval($child_field['count_children']) >= 0) {

                    ob_start();
                    ?>
                    <div id="<?php echo $child_field['id']; ?>" data-typefield="<?php echo intval($child_field['type']); ?>" data-iscontainer="1"  class="zgpb-gridsytem-box zgpb-field-template zgpb-gridsystem-<?php echo $grid_order[intval($child_field['type'])]; ?>">
                        <div class="sfdc-container-fluid">
                            <div class="sfdc-row">
                    <?php
                    $str_output .= ob_get_contents();
                    ob_end_clean();
                    if (isset($child_field['inner'])) {

                        $count_str = 1;
                        $count_total = count($child_field['inner']);
                        foreach ($child_field['inner'] as $key => $value) {

                            $str_output .= '<div class="zgpb-fl-gs-block-style sfdc-col-md-' . $value['cols'] . '" data-zgpb-blocknum="' . $value['num_tab'] . '" data-zgpb-width="" data-zgpb-blockcol="' . $value['cols'] . '">';
                            $str_output .= '<div class="zgpb-items-container zgpb-fl-gs-block-inner">';


                            if (!empty($value['children'])) {
                                foreach ($value['children'] as $key2 => $value2) {
                                    //get field
                                    $get_data = array();
            
                                    if (isset($value2['iscontainer']) && intval($value2['iscontainer']) === 1) {
                                        $get_data = $this->generate_admin_post_getChildren($value2);
                                        $str_output .= $get_data['output_html'];
                                    } else {
                                        $get_data = $this->generate_admin_post_getField($value2);
                                        $str_output .= $get_data['output_html'];
                                    }
            
                                }
                            }

                            $str_output .= '</div>';

                            if ($count_str < $count_total) {
                                ob_start();
                                ?>
                                            <div class="zgpb-fl-gridsystem-opt">
                                                <div data-zgpb-side="1" class="zgpb-fl-gd-drag-line zgpb-fl-gd-drag-line-right">
                                                    <div class="zgpb-fl-gd-opt-icon-handler"></div>
                                                </div>
                                            </div>
                                <?php
                                $str_output .= ob_get_contents();
                                ob_end_clean();
                            } else {
                                ob_start();
                                ?>
                                            <div class="zgpb-fl-gridsystem-opt"></div>
                                <?php
                                $str_output .= ob_get_contents();
                                ob_end_clean();
                            }

                            $str_output .= '</div>';
                            $count_str++;
                        }
                    }

                    ob_start();
                    ?>
                            </div>
                        </div>
                    </div>
                                <?php
                                $str_output .= ob_get_contents();
                                ob_end_clean();
                            }
                            break;
                        case 31:
                            /* panel */

                            break;
                        default:
                            break;
                    }
                    $return = array();
                    $return['output_html'] = $str_output;
                    $return['output_css'] = $str_output_2;

                    return $return;
                }

    /**
     * Generate admin post field
     * 
     * @return json
     */
    protected function generate_admin_post_getField($child_field) {
        $str_output = '';
        $str_output_3 = '';

        $data = array();
        $data = $this->gen_post_src[$child_field['id']];

        switch (intval($child_field['type'])) {

            case 7:
                //texteditor
                $str_output .= self::render_template('pagebuilder/views/fields/templates/prevpanel_texteditor.php', $data, 'always');

                break;
            case 8:
                //htmleditor
                $str_output .= self::render_template('pagebuilder/views/fields/templates/prevpanel_htmleditor.php', $data, 'always');

                break;
            case 9:
                //heading
                $str_output .= self::render_template('pagebuilder/views/fields/templates/prevpanel_heading.php', $data, 'always');

                break;
            case 10:
                //button
                $str_output .= self::render_template('pagebuilder/views/fields/templates/prevpanel_button.php', $data, 'always');

                break;
            case 11:
                //image
                $str_output .= self::render_template('pagebuilder/views/fields/templates/prevpanel_image.php', $data, 'always');

                break;
            default:
                break;
        }

        $return = array();
        $return['output_html'] = $str_output;

        return $return;
    }
    
    /**
     * Generate admin post field
     * 
     * @return json
     */
    protected function generate_post_getField($child_field) {
        $str_output = '';
        $str_output_3 = '';

        $data = array();
        $data = $this->gen_post_src[$child_field['id']];

        switch (intval($child_field['type'])) {

            case 7:
                //texteditor
                $str_output .= self::$_modules['pagebuilder']['fields']->posthtml_texteditor($data, $child_field['num_tab']);
                $str_output_3 .= self::$_modules['pagebuilder']['fields']->posthtml_texteditor_css($data);
                break;
            case 8:
                //htmleditor
                $data['main'] = $this->cur_post_core;
                $str_output .= self::$_modules['pagebuilder']['fields']->posthtml_htmleditor($data, $child_field['num_tab']);
                $str_output_3 .= self::$_modules['pagebuilder']['fields']->posthtml_htmleditor_css($data);
                break;
            case 9:
                //heading
                $str_output .= self::$_modules['pagebuilder']['fields']->posthtml_heading($data, $child_field['num_tab']);
                $str_output_3 .= self::$_modules['pagebuilder']['fields']->posthtml_heading_css($data);
                break;
            case 10:
                //button
                $str_output .= self::$_modules['pagebuilder']['fields']->posthtml_button($data, $child_field['num_tab']);
                $str_output_3 .= self::$_modules['pagebuilder']['fields']->posthtml_button_css($data);
                break;
            case 11:
                //image
                $str_output .= self::$_modules['pagebuilder']['fields']->posthtml_image($data, $child_field['num_tab']);
                $str_output_3 .= self::$_modules['pagebuilder']['fields']->posthtml_image_css($data);
                break;
            default:
                break;
        }

        $return = array();
        $return['output_html'] = $str_output;
        $return['output_css'] = $str_output_3;

        return $return;
    }
    
    /**
     * Generate admin post enable
     * 
     * @return json
     */
    public function zbuilder_post_enable() {
        update_post_meta($this->cur_post_id, '_zgpb_post_is_enabled', '1');
    }

    public function zbuilder_post_disable() {
        update_post_meta($this->cur_post_id, '_zgpb_post_is_enabled', '0');
    }

    /**
     * Check user access
     * @return int Post id
     */
    public function check_User_Access() {

        $post_id = $this->cur_post_id;
        // for logged users
        if (!is_user_logged_in()) {
            return false;
        }

        if (!$post_id) {
            return false;
        }

        // make sure the user can edit this post.
        if (!current_user_can('edit_post', $post_id)) {
            return false;
        }

        return true;
    }

    /**
     * Return post id
     *
     * @return int Post id
     */
    public function post_get_id() {
        global $wp_the_query;
        global $post;
        $output = '';

        if (isset($this->cur_post_id) && intval($this->cur_post_id) > 0) {
            return $this->cur_post_id;
        }

        if (isset($this->cur_post_settings['post_id'])) {
            return Zgpbld_Form_Helper::sanitizeInput(trim($this->cur_post_settings['post_id']));
        }

        if (isset($wp_the_query->post) && in_the_loop() && is_main_query()) {
            return $wp_the_query->post->ID;
        }

        if (isset($post)) {
            return $post->ID;
        }

        return false;
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
