<?php
/*
 * Plugin Name: WP Page Builder
 * Plugin URI: https://landera.softdiscover.com
 * Description:  Landera - Wordpress Page Builder makes you build pages in few steps.
 * Version: 2.2
 * Author: SoftDiscover
 * Author URI: http://www.softdiscover.com
 */

if (!defined('ABSPATH')) {
    die('Access denied.');
}
if (!class_exists('ZigaPageBuilder')) {

    final class ZigaPageBuilder {

        /**
         * The only instance of the class
         *
         * @var RocketForm
         * @since 1.0
         */
        private static $instance;

        /**
         * The Plug-in version.
         *
         * @var string
         * @since 1.0
         */
        public $version = '2.2';

        /**
         * The minimal required version of WordPress for this plug-in to function correctly.
         *
         * @var string
         * @since 1.0
         */
        public $wp_version = '3.6';

        /**
         * The minimal required version of WordPress for this plug-in to function correctly.
         *
         * @var string
         * @since 1.0
         */
        public $php_version = '5.3';

        /**
         * Class name
         *
         * @var string
         * @since 1.0
         */
        public $class_name;

        /**
         * An array of defined constants names
         *
         * @var array
         * @since 1.0
         */
        public $defined_constants;

        /**
         * Create a new instance of the main class
         *
         * @since 1.0
         * @static
         * @return RocketForm
         */
        public static function instance() {
            $class_name = get_class();
            if (!isset(self::$instance) && !( self::$instance instanceof $class_name )) {
                self::$instance = new $class_name;
            }

            return self::$instance;
        }

        public function __construct() {
            // Save the class name for later use
            $this->class_name = get_class();
            //
            //  Plug-in requirements
            //
            if (!$this->check_requirements()) {
                add_action('admin_notices', array(&$this, 'zgpbld_requirements_error'));
                return;
            }

            //
            // Declare constants and load dependencies
            //
            $this->define_constants();
            $this->load_dependencies();


            try {

                if (class_exists('Zgpbld_Bootstrap')) {
                    $GLOBALS['wpzgpb'] = Zgpbld_Bootstrap::get_instance();
                    register_activation_hook(__FILE__, array($GLOBALS['wpzgpb'], 'activate'));
                    register_deactivation_hook(__FILE__, array($GLOBALS['wpzgpb'], 'deactivate'));
                }
            } catch (exception $e) {
                $error = $e->getMessage() . "\n";
                echo $error;
            }
        }

        /**
         * check_requirements()
         * Checks that the WordPress setup meets the plugin requirements
         * 
         * @return boolean
         */
        private function check_requirements() {
            global $wp_version;
            if (!version_compare($wp_version, $this->wp_version, '>=')) {
                add_action('admin_notices', array(&$this, 'display_req_notice'));

                return false;
            }

            if (version_compare(PHP_VERSION, $this->php_version, '<')) {
                return false;
            }


            return true;
        }
        
        /**
         * zgpbld_requirements_error()
         * Check error requirents
         */
        public function zgpbld_requirements_error() {
            global $wp_version;
            require_once dirname(__FILE__) . '/views/requirements-error.php';
        }

        /**
         * define_constants() 
         * Define constants needed across the plug-in.
         */
        private function define_constants() {
            $this->define('ZGPBLD_FILE', __FILE__);
            $this->define('ZGPBLD_FOLDER', plugin_basename(dirname(__FILE__)));
            $this->define('ZGPBLD_BASENAME', plugin_basename(__FILE__));
            $this->define('ZGPBLD_ABSFILE', __FILE__);
            $this->define('ZGPBLD_ADMINPATH', get_admin_url());
            $this->define('ZGPBLD_APP_NAME', "Landera - Wordpress Page Builder");
            $this->define('ZGPBLD_VERSION', $this->version);
            $this->define('ZGPBLD_PREFIX', 'wpzgpb_');
            $this->define('ZGPBLD_DIR', dirname(__FILE__));
            $this->define('ZGPBLD_URL', plugins_url() . '/' . ZGPBLD_FOLDER);
            $this->define('ZGPBLD_LIBS', ZGPBLD_DIR . '/libraries');
            
            
            $this->define('ZGPBLD_LITE', 1);
            $this->define('ZGPBLD_DEBUG', 0);
            if (ZGPBLD_DEBUG == 1) {
               error_reporting(E_ALL);
               ini_set('memory_limit','-1');
               ini_set('display_errors', 1);
            }
        }

        /**
         * Define constant if not already set
         * @param  string $name
         * @param  string|bool $value
         */
        private function define($name, $value) {
            if (!defined($name)) {
                define($name, $value);
                $this->defined_constants[] = $name;
            }
        }

        /**
         * Loads PHP files that required by the plug-in
         */
        private function load_dependencies() {
            // Admin Panel
            if (is_admin()) {
                require_once ZGPBLD_DIR . '/classes/zgpbld-base-module.php';
                require_once ZGPBLD_DIR . '/classes/zgpbld-helper.php';
                require_once ZGPBLD_DIR . '/classes/zgpbld-bootstrap.php';
                require_once ZGPBLD_DIR . '/classes/zigapage-notice.php';
            }

            // Front-End Site
            if (!is_admin()) {
                require_once ZGPBLD_DIR . '/classes/zgpbld-base-module.php';
                require_once ZGPBLD_DIR . '/classes/zgpbld-helper.php';
                require_once ZGPBLD_DIR . '/classes/zgpbld-bootstrap.php';
            }
        }

    }

}

function zgpbld_uninstall() {
    require_once( ZGPBLD_DIR . '/classes/zgpbld-installdb.php');
    $installdb = new Zgpbld_InstallDB();
    $installdb->uninstall();
    return true;
}

function wpZGPD() {
    register_uninstall_hook(__FILE__, 'zgpbld_uninstall');
    return ZigaPageBuilder::instance();
}

wpZGPD();
?>
