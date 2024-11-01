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
<div class="sfdc-wrap">
     <!-- Modal -->
    <div class="sfdc-modal sfdc-fade" id="zgpb-modal1" role="dialog">
      <div class="sfdc-modal-dialog">

        <!-- Modal content-->
        <div class="sfdc-modal-content zgpb-scroll-pane-arrows">
          <div class="sfdc-modal-header" >
            <button type="button" class="sfdc-close" data-dismiss="modal">&times;</button>
            <div class="zgpb-modal-header-inner">
                <img src="<?php echo ZGPBLD_URL;?>/assets/common/imgs/ajax-loader-black.gif"/>
            </div>
          </div>
          <div class="sfdc-modal-body" style="padding:40px 50px;">
                <img src="<?php echo ZGPBLD_URL;?>/assets/common/imgs/ajax-loader-black.gif"/>
          </div>
          <div class="sfdc-modal-footer">
              <div class="zgpb-modal-footer-wrap">
                    <img src="<?php echo ZGPBLD_URL;?>/assets/common/imgs/ajax-loader-black.gif"/>
              </div>
                
          </div>
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