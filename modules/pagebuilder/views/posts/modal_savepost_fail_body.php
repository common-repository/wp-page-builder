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
ob_start();
?>
    <div class="sfdc-row">
                <h2><?php echo __('Post failed on saving','zgpbd_admin'); ?></h2>
            </div>
            <div class="sfdc-row">
                <p><?php echo __('Post could not be saved because of next reasons:','zgpbd_admin'); ?></p>
            </div>
             <div class="sfdc-row">
                <div class="sfdc-alert sfdc-alert-danger">
                    <ul>
                    <?php 
                    if(!empty($post_error_log)){
                        foreach ($post_error_log as $key => $value) {
                            ?>
                        <li><?php echo $value;?></li>
                           <?php
                        }
                    }
                    
                    ?>
                    </ul>
                    
                </div>
            </div>
            <div class="space10"></div>
<?php
$cntACmp = ob_get_contents();
$cntACmp = str_replace("\n", '', $cntACmp);
$cntACmp = str_replace("\t", '', $cntACmp);
$cntACmp = str_replace("\r", '', $cntACmp);
$cntACmp = str_replace("//-->", ' ', $cntACmp);
$cntACmp = str_replace("//<!--", ' ', $cntACmp);
$cntACmp = preg_replace("/\s+/"," ", $cntACmp);
ob_end_clean();
echo $cntACmp;
?>