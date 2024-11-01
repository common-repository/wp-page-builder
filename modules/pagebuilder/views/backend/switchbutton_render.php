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
<div id="zgpb-back-opt-menu" class="sfdc-wrap ">
   <div class="sfdc-btn-group  ">
        <a href="javascript:void(0);" 
           class="sfdc-btn sfdc-btn-primary zgpb-back-opt-button-logo">
            <img src="<?php echo ZGPBLD_URL . "/assets/backend/image/logo-zigabuilder-ico.png";?>">
        </a>
        <a onclick="javascript:zgpb_back.menuoption_switchBackendEditor(this,1);" 
           href="javascript:void(0);"
           data-zgpb-enabled="0"
           data-zgpb-option="1"
           id="zgpb-back-menu-opt-1"
           class="sfdc-btn sfdc-btn-primary zgpb-back-menu-opt"><?php echo __('NO BUILDER','zgpbd_admin');?></a>
        <a onclick="javascript:zgpb_back.menuoption_switchBackendEditor(this,2);" 
           href="javascript:void(0);"
           data-zgpb-enabled="1"
           data-zgpb-option="2"
           id="zgpb-back-menu-opt-2"
           class="sfdc-btn sfdc-btn-primary zgpb-back-menu-opt"><?php echo __('BACKEND BUILDER','zgpbd_admin');?></a>
        <a href="javascript:void(0);"
           data-zgpb-href="<?php echo $frontend_post_url;?>"
           data-zgpb-enabled="1"
           data-zgpb-option="3"
           id="zgpb-back-menu-opt-3"
           class="sfdc-btn sfdc-btn-primary zgpb-back-menu-opt"><?php echo __('FRONTEND BUILDER','zgpbd_admin');?>
        </a>
        
    </div>
</div>
 

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