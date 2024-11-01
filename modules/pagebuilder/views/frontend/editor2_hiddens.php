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
 
<div id="zgpb-editor2-hiddens" style="display:none;">
    <div class="zgpb-editor2-hiddens-dialog-icons">
        <div class="zgpb-editor2-header-icons">
            <div class="sfdc-btn-group"> 
                <a class="sfdc-btn sfdc-btn-xs sfdc-btn-info" href="javascript:void(0);">
                   <i class="fa fa-arrows" aria-hidden="true"></i>
                </a>
                
                <a class="sfdc-btn sfdc-btn-xs sfdc-btn-danger" onclick="javascript:zgpb_core.menuoptions_closePalette();" href="javascript:void(0);">
                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                </a> 
            </div>
        </div>
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