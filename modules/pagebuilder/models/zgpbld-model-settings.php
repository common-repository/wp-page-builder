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
if (class_exists('Zgpbld_Model_Settings')) {
    return;
}

/**
 * Model Setting class
 *
 * @category  PHP
 * @package   Zigapage_wp
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1.00
 * @link      https://landera.softdiscover.com
 */
class Zgpbld_Model_Settings {

    private $wpdb = "";
    public $table = "";

    function __construct() {
        global $wpdb;
        $this->wpdb = $wpdb;
        
    }

    function getAllOptions() {
        $query = sprintf('
            select uf.*
            from %s uf
            where uf.id=%s
            ', $this->table, 1);

        return $this->wpdb->get_row($query);
    }
     
    
    function getOption($value) {
      
    }

}

?>
