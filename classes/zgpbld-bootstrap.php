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
if (class_exists('Zgpbld_Bootstrap')) {
    return;
}

class Zgpbld_Bootstrap extends Zgpbld_Base_Module {

    protected $modules;
    protected $models;

    const VERSION = '1.2';
    const PREFIX = 'wpzgpb_';

    /*
     * Magic methods
     */

    /**
     * Constructor
     *
     * @mvc Controller
     */
    protected function __construct() {
        $this->register_hook_callbacks();
    }

    /**
     * Register callbacks for actions and filters
     *
     * @mvc Controller
     */
    public function register_hook_callbacks() {
        global $wp_version;



        add_action('admin_menu', array(&$this, 'loadMenu'));

        //add lang dir
        add_filter('rockfm_languages_directory', array(&$this, 'rockfm_lang_dir_filter'));
        add_filter('rockfm_languages_domain', array(&$this, 'rockfm_lang_domain_filter'));
        add_filter('plugin_locale', array(&$this, 'rockfm_lang_locale_filter'));
        
        
                
       
        //showing screen
         //add_action('current_screen', array(&$this, 'action_zgpb_init'));    
        
       
        
        //end format wordpress editor              
       add_action('init', array($this, 'init'));
        
        //  i18n
        add_action('init', array(&$this, 'i18n'));

        //call post processing
       /* if (isset($_POST['_rockfm_type_submit']) && absint($_POST['_rockfm_type_submit']) === 0) {
            add_action('plugins_loaded', array(&$this, 'zgpbld_process_form'));
        }*/
        
        //disable update notifications
        if(is_admin()){
           // add_filter( 'site_transient_update_plugins', array(&$this, 'disable_plugin_updates'));
            
            //if(ZIGAFORM_F_LITE===1){
             // add_filter((is_multisite() ? 'network_admin_' : '').'plugin_action_links', array($this, 'plugin_add_links'), 10, 2);
              
              // ZigaForm Upgrade
              add_action( 'admin_notices', array( $this, 'zigaform_upgrade' ) );
            //}
            
        }        
            
    }
    
    
      public function zigaform_upgrade() {
        
        //Return, If not super admin, or don't have the admin privilleges
        if ( ! current_user_can( 'edit_others_posts' ) || ! is_super_admin() ) {
                return;
        }
        
        //Return if notice is already dismissed
        if ( get_option( 'zgpb-hide_upgrade_notice' ) || get_site_option( 'zgpb-hide_upgrade_notice' ) ) {
                return;
        }
        
        $zgpb_notice_alert = get_site_option( 'zgpb-notice-alert', false );
        
       
        if ( ! $zgpb_notice_alert ) {
            if (false) {
                    $install_type = 'existing';
            } else {
                    $install_type = 'new';
            }
            
            $zgpb_notice_alert=array('install_type'=>$install_type);
            
            update_site_option( 'zgpb-notice-alert', $zgpb_notice_alert);
	}
        
        //Whether New/Existing Installation
        
        /*if( !$zgpb_notice_alert['install_type'] ) {
                $install_type = $zgfm_forms_nro > 0 ? 'existing' : 'new';
                update_site_option( 'zgbd-notice-alert', $install_type );
        }*/

        if ( 'new' == $zgpb_notice_alert['install_type'] ) {
            
            if(ZGPBLD_LITE){
                $notice_url = 'https://landera.softdiscover.com/#demo-samples';
                $notice_heading = esc_html__( "Thanks for installing Landera. We hope you like it!", "FRocket_admin" );
                $notice_content = esc_html__( "And hey, if you do, you can check the PRO version and get access to more features!", "FRocket_admin" );
                $button_content = esc_html__( "Go landera Pro", "FRocket_admin" );
            }else{
                $notice_url = 'https://codecanyon.net/item/landera-wordpress-page-builder/19652454?ref=Softdiscover';
                $notice_heading = esc_html__( "Thanks for installing Landera. We hope you like it!", "FRocket_admin" );
                $notice_content = esc_html__( "And hey, if you do, give it a 5-star rating on Codencayon to help us spread the word and boost our motivation.", "FRocket_admin" );
                $button_content = esc_html__( "Go Landera Pro", "FRocket_admin" );
            }

        } else {
            
           return;
                
        }
        
        ?>
        <div class="notice zgpb-ext-notice" style="display: none;">
                <div class="zgpb-ext-notice-logo"><span></span></div>
                <div
                        class="zgpb-ext-notice-message<?php echo 'new' == $zgpb_notice_alert['install_type'] ? ' zgpb-builder-fresh' : ' zgpb-builder-existing'; ?>">
                        <strong><?php echo $notice_heading; ?></strong>
                        <?php echo $notice_content; ?>
                </div>
                <div class="zgpb-ext-notice-cta">
                        <a href="<?php echo esc_url( $notice_url ); ?>" class="zgpb-ext-notice-act button-primary" target="_blank">
                        <?php echo $button_content; ?>
                        </a>
                        <button class="zgpb-ext-notice-dismiss zgpb-dismiss-welcome" data-msg="<?php esc_html_e( 'Saving', 'FRocket_admin'); ?>"><?php esc_html_e( 'Dismiss', "FRocket_admin" ); ?></button>
                </div>
        </div><?php
        //Notice CSS
        wp_register_style( 'zgpb-style-global-css', ZGPBLD_URL . '/assets/backend/css/global-ext.css', array(), ZGPBLD_VERSION );
        //Notice CSS
        wp_enqueue_style('zgpb-style-global-css');
        
        //Notice JS
        wp_register_script( 'zgpb-script-global-js', ZGPBLD_URL . '/assets/backend/js/global-ext.js', array(
                'jquery'
        ), ZGPBLD_VERSION );
        
        //Notice JS
        wp_enqueue_script('zgpb-script-global-js', '', array(), '', true );
        
        
    }              
    
    
    public function action_zgpb_init(){
       global $wp_the_query;
        echo $wp_the_query->post->ID;
        die();
    }
    
    /**
	 * Sets variables for the builder
	 *
	 * @since 1
	 * @param array $vars
	 * @return array
	 */
    
    public function frontend_variables_load($vars){
       
        return array_merge( $vars, array(
            
		) );
            
    }
    
    
    public function loadElements(){
        
        global $pagenow;
        
        if ( in_array( $pagenow, array( 'post.php', 'post-new.php') ) ) {
            self::$_modules['pagebuilder']['backend']->switchbutton_add();
        }
    }
    
    
      
    function disable_plugin_updates( $value ) {
       /* if(isset($value->response['zgpbld-form-builder/zgpbld-form-builder.php'])){
            unset( $value->response['zgpbld-form-builder/zgpbld-form-builder.php'] );
        }*/
        return $value;
     }
     
    public function remove_unwanted_css(){
       /*
        //style
        wp_dequeue_style( 'bootstrap_css' );
        wp_deregister_style( 'bootstrap_css' );
        
        //script
        wp_dequeue_script( 'bootstrap.min_script' );*/
    } 
                    
    public function rockfm_lang_dir_filter($lang_dir) {
       // if (is_admin() && Zgpbld_Form_Helper::is_zgpbld_page()) {
            
      //  } else {
            //load frontend
            //$lang_dir = ZGPBLD_DIR . '/i18n/languages/front/';
       // }
        
        $lang_dir = ZGPBLD_DIR . '/i18n/languages/backend/';
        
        return $lang_dir;
    }

    public function rockfm_lang_locale_filter($locale) {

         $tmp_lang = get_option('zigapage_lang');
         $locale='en_US';
        
         if (!empty($tmp_lang)) {
            $locale = $tmp_lang;
            } 

        return $locale;
    }

    public function rockfm_lang_domain_filter($domain) {
        /*if (is_admin() && Zgpbld_Form_Helper::is_zgpbld_page()) {
            
        } else {
            //load frontend
            $domain = 'zgpbd_front';
        }*/
        
        $domain = 'zgpbd_admin';
        
        return $domain;
    }

  

    function wpver411_tiny_mce_before_init($initArray) {
        $initArray['plugins'] = 'tabfocus,paste,media,wordpress,wpeditimage,wpgallery,wplink,wpdialogs';
        $initArray['wpautop'] = false;
        $initArray["forced_root_block"] = false;
        $initArray["force_br_newlines"] = true;
        $initArray["force_p_newlines"] = false;
        $initArray["convert_newlines_to_brs"] = true;
        $initArray['apply_source_formatting'] = true;
        $initArray['theme_advanced_buttons1'] = 'formatselect,forecolor,|,bold,italic,underline,|,bullist,numlist,blockquote,|,justifyleft,justifycenter,justifyright,justifyfull,|,link,unlink,|,wp_adv';
        $initArray['theme_advanced_buttons2'] = 'fontsizeselect,pastetext,pasteword,removeformat,|,charmap,|,outdent,indent,|,undo,redo';
        $initArray['theme_advanced_buttons3'] = '';
        $initArray['theme_advanced_buttons4'] = '';
        $initArray['fontsize_formats'] = "7px 9px 10px 11px 12px 13px 14px 15px 16px 17px 18px 19px 20px 21px 22px 23px 24px 25px 26px 27px 28px 29px 30px 31px 32px 34px 36px 45px";
        $initArray['setup'] = <<<JS
[function(ed) {
      ed.on('change KeyUp', function(e) {
         zgpb_core.captureEventTinyMCE(ed,e);
      });
      ed.on('init', function (e) {
                zgpb_core.tinyMCE_init(ed,e);
      });
}][0]
JS;
        return $initArray;
    }

    function wpse24113_tiny_mce_before_init($initArray) {
        $initArray['plugins'] = 'tabfocus,paste,media,wordpress,wpeditimage,wpgallery,wplink,wpdialogs';
        $initArray['wpautop'] = true;
        $initArray["forced_root_block"] = false;
        $initArray["force_br_newlines"] = true;
        $initArray["force_p_newlines"] = false;
        $initArray["convert_newlines_to_brs"] = true;
        $initArray['apply_source_formatting'] = true;
        $initArray['theme_advanced_buttons1'] = 'formatselect,forecolor,|,bold,italic,underline,|,bullist,numlist,blockquote,|,justifyleft,justifycenter,justifyright,justifyfull,|,link,unlink,|,wp_adv';
        $initArray['theme_advanced_buttons2'] = 'fontsizeselect,pastetext,pasteword,removeformat,|,charmap,|,outdent,indent,|,undo,redo';
        $initArray['theme_advanced_buttons3'] = '';
        $initArray['theme_advanced_buttons4'] = '';
        $initArray['fontsize_formats'] = "7px 9px 10px 11px 12px 13px 14px 15px 16px 17px 18px 19px 20px 21px 22px 23px 24px 25px 26px 27px 28px 29px 30px 31px 32px 34px 36px 45px";
        $initArray['setup'] = <<<JS
[function(ed) {
    ed.onKeyUp.add(function(ed, e) {
        zgpb_core.captureEventTinyMCE(ed,e);
    });
    ed.onClick.add(function(ed, e) {
        zgpb_core.captureEventTinyMCE(ed,e);
        });
    ed.onChange.add(function(ed, e) {
        zgpb_core.captureEventTinyMCE(ed,e);
    });
}][0]
JS;
        return $initArray;
    }

    function myformatTinyMCE($in) {
        $in['plugins'] = 'tabfocus,paste,media,wordpress,wpeditimage,wpgallery,wplink,wpdialogs';
        $in['wpautop'] = true;
        $in["forced_root_block"] = false;
        $in["force_br_newlines"] = true;
        $in["force_p_newlines"] = false;
        $in["convert_newlines_to_brs"] = true;
        $in['apply_source_formatting'] = true;
        $in['theme_advanced_buttons1'] = 'formatselect,forecolor,|,bold,italic,underline,|,bullist,numlist,blockquote,|,justifyleft,justifycenter,justifyright,justifyfull,|,link,unlink,|,wp_adv';
        $in['theme_advanced_buttons2'] = 'fontsizeselect,pastetext,pasteword,removeformat,|,charmap,|,outdent,indent,|,undo,redo';
        $in['theme_advanced_buttons3'] = '';
        $in['theme_advanced_buttons4'] = '';
        $in['fontsize_formats'] = "7px 9px 10px 11px 12px 13px 14px 15px 16px 17px 18px 19px 20px 21px 22px 23px 24px 25px 26px 27px 28px 29px 30px 31px 32px 34px 36px 45px";
        return $in;
    }

    protected function loadBackendControllers() {

        require_once( ZGPBLD_DIR . '/modules/pagebuilder/controllers/zgpbld-fb-controller-frontend.php');
        require_once( ZGPBLD_DIR . '/modules/pagebuilder/controllers/zgpbld-fb-controller-fields.php');
        require_once( ZGPBLD_DIR . '/modules/pagebuilder/controllers/zgpbld-fb-controller-posts.php');
        require_once( ZGPBLD_DIR . '/modules/pagebuilder/controllers/zgpbld-fb-controller-backend.php');
        require_once( ZGPBLD_DIR . '/modules/pagebuilder/models/zgpbld-model-settings.php');
        require_once( ZGPBLD_DIR . '/helpers/styles-font-menu/plugin.php');
        
        //tools
        require_once( ZGPBLD_DIR . '/modules/tools/controllers/backend.php');
        
        //option builder
        require_once( ZGPBLD_DIR . '/modules/optbuilder/controllers/backend.php');
        require_once( ZGPBLD_DIR . '/modules/optbuilder/controllers/fields.php');
        
        $this->models = array(
            'pagebuilder' => array(
                'settings' => new Zgpbld_Model_Settings())
        );
        self::$_models = $this->models;
        
        $this->modules = array(
            'pagebuilder' => array('frontend' => Zgpbld_Fb_Controller_Frontend::get_instance(),
                'fields' => Zgpbld_Fb_Controller_Fields::get_instance(),
                'posts' => Zgpbld_Fb_Controller_Posts::get_instance(),
                'backend' => Zgpbld_Fb_Controller_Backend::get_instance()),
            'optbuilder'=>array(
                'backend'=>Zgpb_Optb_Controller_Backend::get_instance(),
                'fields' => Zgpb_Optb_Controller_Fields::get_instance()
            ),
            'tools'=>array(
                'backend'=>Zgpb_tools_Controller_Backend::get_instance()
            )
        );
        self::$_modules = $this->modules;
    }

    protected function loadProdControllers() {

        require_once( ZGPBLD_DIR . '/modules/pagebuilder/controllers/zgpbld-fb-controller-posts.php');
                    
        $this->modules = array(
            'pagebuilder' => array(
                'posts' => Zgpbld_Fb_Controller_Posts::get_instance())
        );
        self::$_modules = $this->modules;
    }

    public function wphidenag() {
        remove_action('admin_notices', 'update_nag', 3);
    }

    
      /**
     *  Redirects the clicked menu item to the correct location
     *
     * @return null
     */
    public function get_menu(){
        $current_page = isset($_REQUEST['page']) ? esc_html($_REQUEST['page']) : 'zgpb_page_builder';
                    
        switch ($current_page) 
		{
                case 'zgpb_page_builder': $this->route_page(); break;
                case 'zigapage-builder-help':	include(dirname(__DIR__) . '/views/help/help.php'); break;
                case 'zigapage-builder-about':	include(dirname(__DIR__) . '/views/help/about.php'); break; 
                case 'zigapage-builder-debug':	include(dirname(__DIR__) . '/views/help/debug.php'); break;
                case 'zigapage-builder-gopro':	include(dirname(__DIR__) . '/views/help/gopro.php'); break;
                default:
                    break;
                }
    }
    
    public function loadMenu() {
        if (ZGPBLD_LITE == 1) {
            $menu_name='Landera lite';
        }else{
            $menu_name='Landera Pro';
        }
        add_menu_page('Landera - Drag & Drop Page Builder', $menu_name, "edit_posts", "zgpb_page_builder", array(&$this, "route_page"), ZGPBLD_URL . "/assets/backend/image/logo-zigabuilder-ico.png");
       // add_submenu_page("zgpb_page_builder", __('Settings', 'zgpbd_admin'), __('Settings', 'zgpbd_admin'), 'manage_options', "?page=zgpb_page_builder&mod=pagebuilder&controller=intranet&action=view_settings");
          //add_submenu_page("zgfm_form_builder", __('Forms', 'zgpbd_admin'), __('Forms', 'zgpbd_admin'), $perms, '?page=zgfm_form_builder&mod=formbuilder&controller=records&action=info_records_byforms');
        
        $perms = 'manage_options';    
        add_submenu_page("zgpb_page_builder", __('Overview', 'zgpbd_admin'), __('Overview', 'zgpbd_admin'), $perms, "zgpb_page_builder", array(&$this, "get_menu"));
        $page_help = add_submenu_page("zgpb_page_builder", __('Help', 'zgpbd_admin'), __('Help', 'zgpbd_admin'), $perms, "zigapage-builder-help", array(&$this, "get_menu"));
        $page_about = add_submenu_page("zgpb_page_builder", __('About', 'zgpbd_admin'), __('About', 'zgpbd_admin'), $perms, "zigapage-builder-about", array(&$this, "get_menu"));
        
        if (ZGPBLD_DEBUG == 1) {
         $page_debug = add_submenu_page("zgpb_page_builder", __('Debug', 'zgpbd_admin'), __('Debug', 'zgpbd_admin'), $perms, "zigapage-builder-debug", array(&$this, "get_menu"));
         add_action('admin_print_styles-' . $page_debug, array($this->modules['pagebuilder']['backend'], 'load_admin_resources2'));       
        }
        
        if(ZGPBLD_LITE == 1){
          //go pro page
            $submenu_txt = __('Go Pro!', 'zgpbd_admin');
            $go_pro_link = '<span style="color:#f18500">' . $submenu_txt . '</span>';
            $page_gopro = add_submenu_page("zgpb_page_builder", $go_pro_link, $go_pro_link, $perms, "zigapage-builder-gopro", array(&$this, "get_menu"));  
            add_action('admin_print_styles-' . $page_gopro, array($this->modules['pagebuilder']['backend'], 'load_admin_resources2'),99,1);
        }
        
        
        //load styles
        add_action('admin_print_styles-' . $page_help, array($this->modules['pagebuilder']['backend'], 'load_admin_resources2'));
        add_action('admin_print_styles-' . $page_about, array($this->modules['pagebuilder']['backend'], 'load_admin_resources2'));
        
        
        
    }
    
    public function route_page() {

        $route = Zgpbld_Form_Helper::getroute();
        if (!empty($route['module']) && !empty($route['controller']) && !empty($route['action'])) {
            if ( isset($this->modules[$route['module']][$route['controller']])
                    && method_exists($this->modules[$route['module']][$route['controller']], $route['action'])) {
                $this->modules[$route['module']][$route['controller']]->$route['action']();
                
            } else {
                echo 'wrong url';
               
            }
        } else {
            $this->modules['pagebuilder']['backend']->view_settings();
        }
    }
                    
    /**
     * Internationalization.
     * Loads the plugin language files
     *
     * @access public
     * @return void
     */
    public function i18n() {

        // Set filter for plugin's languages directory
        $lang_dir = ZGPBLD_DIR . '/i18n/languages/';
        $lang_dir = apply_filters('rockfm_languages_directory', $lang_dir);

        $lang_domain = 'zgpbd_admin';
        $lang_domain = apply_filters('rockfm_languages_domain', $lang_domain);
        
        // Traditional WordPress plugin locale filter
        $locale = apply_filters('plugin_locale', get_locale(), 'zgpb_page_builder');
        $mofile = sprintf('%1$s-%2$s.mo', 'wpzgpb', $locale);

        // Setup paths to current locale file
        $mofile_local = $lang_dir . $mofile;
      
        if (file_exists($mofile_local)) {
             
            // Look in local /wp-content/plugins/wpbp/languages/ folder
            load_textdomain($lang_domain, $mofile_local);
        } else {
            // Load the default language files - but this is not working for some reason
            load_plugin_textdomain($lang_domain, false, dirname(plugin_basename(__FILE__)) . '/i18n/languages/');
        }
    }

    
   
    /**
     * Initializes variables
     *
     * @mvc Controller
     */
    public function init() {
        try {
            
               global $wp_version;     
                    
               //disable update notifications
        if(is_admin()){
            add_filter( 'site_transient_update_plugins', array(&$this, 'disable_plugin_updates'));
        }
        //load admin
        if (is_admin() ) {
            
            //deregister bootstrap in child themes
            add_action('admin_enqueue_scripts',array(&$this, 'remove_unwanted_css'), 1000 );
            
            $this->loadBackendControllers();
           
            //add filter
           // add_filter( 'body_class', array(&$this, 'filter_body_class') ); 
            
            //editor1 on backend
            if(Zgpbld_Form_Helper::check_backend_mode()){
                
                add_action('edit_form_after_editor', array($this->modules['pagebuilder']['backend'], 'editor1_show_options'));
                
                //add button on backend
                $this->loadElements();

                //disabling wordpress update message
                add_action('admin_menu', array(&$this, 'wphidenag'));
                //format wordpress editor
                if (version_compare($wp_version, 4, '<')) {
                    //for wordpress 3.x
                    //event tinymce
                    add_filter('tiny_mce_before_init', array(&$this, 'wpse24113_tiny_mce_before_init'));
                    //add_filter('tiny_mce_before_init', array(&$this, 'myformatTinyMCE'));
                } else {
                    add_filter('tiny_mce_before_init', array(&$this, 'wpver411_tiny_mce_before_init'));
                }
                
            }else{
                
                if(Zgpbld_Form_Helper::is_zgpbld_page()){
                    add_action('admin_enqueue_scripts', array($this->modules['pagebuilder']['backend'], 'load_admin_resources2'),99,1);
                }
                
            }
            
             
          
            
                    
        } elseif (Zgpbld_Form_Helper::check_live_mode() 
                && is_user_logged_in()
                && current_user_can('edit_posts')
                ){
            
             
            
            //load frontend controllers
            $this->loadBackendControllers();
            
            
            //add filter
            //add_filter( 'body_class', array(&$this, 'filter_body_class') ); 
            
            //add_action('plugins_loaded',                               __CLASS__ . '::load_plugin_textdomain');
            add_action('send_headers',array($this->modules['pagebuilder']['frontend'], 'editor2_no_cache'));
            
            
            //admin resources
            add_action('wp_enqueue_scripts', array($this->modules['pagebuilder']['frontend'], 'load_resources'),99,1);
            
             //editor2 on frontend
            add_action('wp_footer', array($this->modules['pagebuilder']['frontend'], 'editor2_show_options'));
            
            //filters
            //zgbd_editor_variables_load
            add_filter( 'zgbd_editor_variables_load', array(&$this, 'frontend_variables_load'));
            
            //format wordpress editor
            if (version_compare($wp_version, 4, '<')) {
                //for wordpress 3.x
                //event tinymce
                add_filter('tiny_mce_before_init', array(&$this, 'wpse24113_tiny_mce_before_init'));
                //add_filter('tiny_mce_before_init', array(&$this, 'myformatTinyMCE'));
            } else {
                add_filter('tiny_mce_before_init', array(&$this, 'wpver411_tiny_mce_before_init'));
            }
            
        }else{
            
            
             //load production controllers
            $this->loadProdControllers();
        }
           
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
    public function activate($network_wide = false) {
        require_once( ZGPBLD_DIR . '/classes/zgpbld-installdb.php');
        $installdb = new Zgpbld_InstallDB();
        $installdb->install($network_wide);
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
