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
<!-- Nav tabs -->
<ul class="sfdc-nav sfdc-nav-tabs">
  <li class="sfdc-active"><a href="#sfdc-fields-tab-1" data-toggle="tab"><?php echo __('Main fields','zgpbd_admin'); ?></a></li>
 <!--  <li><a href="#sfdc-fields-tab-2" data-toggle="tab" class="last-child"><?php echo __('More fields','zgpbd_admin'); ?></a></li> -->
  
</ul>
<!-- Tab panes -->
<div class="sfdc-tab-content">
  <div class="sfdc-tab-pane sfdc-in sfdc-active" id="sfdc-fields-tab-1">
      <div class="sfdc-tab-content2">
          <!-- Standard fields -->
          <div class="sfdc-fields-group sfdc-enable-fieldset">
              <fieldset>
                    <legend><?php echo __('Standard Fields','zgpbd_admin'); ?> </legend>
                    <div class="sfdc-fieldset-inner">
                        <div class="row">
                            <ul class="sfdc-list-fields">
                                <li>
                                    <a class="sfdc-draggable-field sfdc-button1 zgpb-field-text-opt" 
                                       data-type="7" 
                                       onclick="javascript:zgpb_core.mainfields_addFieldToPost(this,7);"
                                       href="javascript:void(0);">
                                        <span class="sfdc-btn1-icon-left">
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span>
                                        </span>
                                        <span class="sfdc-btn1-text">  
                                        <?php echo __('Text editor','zgpbd_admin'); ?> <i class="fa fa-outdent"></i> 
                                        </span> 
                                    </a> 
                                </li>
                                <li>
                                    <a class="sfdc-draggable-field sfdc-button1 zgpb-field-html-opt" 
                                       data-type="8" 
                                       onclick="javascript:zgpb_core.mainfields_addFieldToPost(this,8);"
                                       href="javascript:void(0);">
                                       
                                        <span class="sfdc-btn1-icon-left">
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span>
                                        </span>
                                       <span class="sfdc-btn1-text"> 
                                           <?php echo __('HTML','zgpbd_admin'); ?> <i class="fa fa-code"></i>
                                       </span> 
                                       
                                    </a> 
                                    
                                </li>
                                <li>
                                    <a class="sfdc-draggable-field sfdc-button1 zgpb-field-heading-opt" 
                                       data-type="9" 
                                       onclick="javascript:zgpb_core.mainfields_addFieldToPost(this,9);"
                                       href="javascript:void(0);"> 
                                       <span class="sfdc-btn1-icon-left">
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span>
                                       </span>
                                       <span class="sfdc-btn1-text"> 
                                           <?php echo __('Heading','zgpbd_admin'); ?> <i class="fa fa-header"></i> 
                                       </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="sfdc-draggable-field sfdc-button1 zgpb-field-button-opt" 
                                       data-type="10" 
                                       onclick="javascript:zgpb_core.mainfields_addFieldToPost(this,10);"
                                       href="javascript:void(0);"> 
                                       <span class="sfdc-btn1-icon-left">
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span>
                                       </span>
                                       <span class="sfdc-btn1-text"> 
                                           <?php echo __('Button','zgpbd_admin'); ?> <i class="fa fa-behance-square" aria-hidden="true"></i>
                                       </span>
                                    </a>
                                </li>
                                   <li>
                                    <a class="sfdc-draggable-field sfdc-button1 zgpb-field-image-opt" 
                                       data-type="11" 
                                       onclick="javascript:zgpb_core.mainfields_addFieldToPost(this,11);"
                                       href="javascript:void(0);">
                                       
                                        <span class="sfdc-btn1-icon-left">
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span>
                                        </span>
                                       <span class="sfdc-btn1-text"> 
                                           <?php echo __('Image','zgpbd_admin'); ?> <i class="fa fa-file-image-o" aria-hidden="true"></i>
                                       </span> 
                                       
                                    </a> 
                                    
                                </li>
                            </ul>
                        </div>
                    </div>

                </fieldset>
          </div>
          <!-- Grid System -->
          <div class="sfdc-fields-group sfdc-enable-fieldset">
              <fieldset>
                    <legend><?php echo __('Grid System','zgpbd_admin'); ?></legend>
                    <div class="sfdc-fieldset-inner">
                        <div class="row">
                            <ul class="sfdc-list-fields">
                                <li>
                                    <a class="sfdc-draggable-field sfdc-button1 zgpb-field-col1-opt" 
                                       data-type="1" 
                                       onclick="javascript:zgpb_core.mainfields_addFieldToPost(this,1);"
                                       href="javascript:void(0);">
                                        <span class="sfdc-btn1-icon-left">
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span>
                                        </span>
                                        <span class="sfdc-btn1-text"> <?php echo __('1 Col','zgpbd_admin'); ?> <span class="zgpb-icon-fields-column1"></span></span> 
                                         
                                    </a>
                                </li>
                                <li>
                                    <a class="sfdc-draggable-field sfdc-button1 zgpb-field-col2-opt" 
                                       data-type="2" 
                                       onclick="javascript:zgpb_core.mainfields_addFieldToPost(this,2);"
                                       href="javascript:void(0);">
                                        
                                         <span class="sfdc-btn1-icon-left">
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span>
                                        </span>
                                        <span class="sfdc-btn1-text"> <?php echo __('2 Cols','zgpbd_admin'); ?> <span class="zgpb-icon-fields-column2"></span></span> 
                                          
                                    </a>
                                </li>
                                <li>
                                    <a class="sfdc-draggable-field sfdc-button1 zgpb-field-col3-opt" 
                                       data-type="3" 
                                       onclick="javascript:zgpb_core.mainfields_addFieldToPost(this,3);"
                                       href="javascript:void(0);">
                                         <span class="sfdc-btn1-icon-left">
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span>
                                        </span>
                                        <span class="sfdc-btn1-text"> <?php echo __('3 Cols','zgpbd_admin'); ?> <span class="zgpb-icon-fields-column3"></span></span> 
                                         
                                    </a>
                                </li>
                                <li>
                                    <a class="sfdc-draggable-field sfdc-button1 zgpb-field-col4-opt" 
                                       data-type="4" 
                                       onclick="javascript:zgpb_core.mainfields_addFieldToPost(this,4);"
                                       href="javascript:void(0);">
                                        
                                        <span class="sfdc-btn1-icon-left">
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span>
                                        </span>
                                        <span class="sfdc-btn1-text"> <?php echo __('4 Cols','zgpbd_admin'); ?> <span class="zgpb-icon-fields-column4"></span></span> 
                                         
                                    </a>
                                </li>
                                <li>
                                    <a class="sfdc-draggable-field sfdc-button1 zgpb-field-col5-opt" 
                                       data-type="5" 
                                       onclick="javascript:zgpb_core.mainfields_addFieldToPost(this,5);"
                                       href="javascript:void(0);">
                                         <span class="sfdc-btn1-icon-left">
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span>
                                        </span>
                                        <span class="sfdc-btn1-text"> <?php echo __('6 Cols','zgpbd_admin'); ?> <span class="zgpb-icon-fields-column6"></span></span>
                                    </a>
                                </li>
                                <li>
                                    <a class="sfdc-draggable-field sfdc-button1 zgpb-field-col6-opt" 
                                       data-type="6" 
                                       onclick="javascript:zgpb_core.mainfields_addFieldToPost(this,6);"
                                       href="javascript:void(0);">
                                         <span class="sfdc-btn1-icon-left">
                                            <span class="sfdc-glyphicon sfdc-glyphicon-move"></span>
                                        </span>
                                        <span class="sfdc-btn1-text"> <?php echo __('12 Cols','zgpbd_admin'); ?>  </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </fieldset>
          </div>
          
      </div>
  </div>
  <!--<div class="sfdc-tab-pane " id="sfdc-fields-tab-2">
      <div class="sfdc-tab-content2">
         
      </div> 
  </div> -->
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