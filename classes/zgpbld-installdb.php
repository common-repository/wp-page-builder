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
if (!defined('ABSPATH')) {exit('No direct script access allowed');}
if(class_exists('Zgpbld_InstallDB')){return;}

class Zgpbld_InstallDB {
    function __construct(){
        global $wpdb;
        
    }
    
    public function install($networkwide = false){
        if ( $networkwide ) {
			deactivate_plugins( plugin_basename(ZGPBLD_ABSFILE) );
			wp_die( __( 'The plugin can not be network activated. You need to activate the plugin per site.', 'zgpbd_admin' ) );
		}
        global $wpdb;
        
        //variables to initialize
        $variables=array(
            "zigapage_version"=>ZGPBLD_VERSION,
            "zigapage_enable_page"=>1,
            "zigapage_enable_post"=>1,
            "zigapage_lang"=>'',
        );
        
        //registering variables
        foreach ($variables as $key => $value) {
             //for network admin screen
                if ( is_network_admin() ) {
			update_site_option( $key, $value );
		}
		else {
			update_option( $key, $value );
		}
        }
        
        
        // Store the date when the initial activation was performed
		$type      = class_exists( 'ZigaPageBuilder' ) ? 'pro' : 'lite';
		$activated = get_option( 'zgpb_b_activated', array() );
		if ( empty( $activated[$type] ) ) {
			$activated[$type] = time();
			update_option( 'zgpb_b_activated', $activated );
		}
        
        
        
    }
    
    public function uninstall(){
        global $wpdb;
        //unset options relate to ziga builder
        //variables to initialize
        $variables=array(
            "zigapage_version",
            "zigapage_enable_page",
            "zigapage_enable_post",
            "zigapage_lang"
        );
        
        //registering variables
        foreach ($variables as $key => $value) {
             //for network admin screen
                if ( is_network_admin() ) {
			delete_site_option( $key);
		}
		else {
			delete_option( $key);
		}
        }
        
        
    }
}
?>
