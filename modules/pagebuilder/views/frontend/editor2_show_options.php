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
<div id="zgpb-editor2-header" class="sfdc-wrap">
    
    <div class="sfdc-editor2-options">
        <div class="sfdc-btn-group sfdc-col-xs-12" data-toggle="buttons">
            
            <label 
                onclick="javascript:zgpb_front.exitAdminPanel();"
                class="sfdc-btn sfdc-btn-danger">
                  <i class="fa fa-times" aria-hidden="true"></i> <?php echo __('Close','zgpbd_admin');?>
            </label>
            
            
             <label 
                 
                 onclick="javascript:zgpb_core.savePage_DraftStatus();"
                 class="sfdc-btn sfdc-btn-success">
                 <?php echo __('Save draft','zgpbd_admin')?> <i class="fa fa-floppy-o" aria-hidden="true"></i>
            </label>
            <label 
                onclick="javascript:zgpb_core.savePage_publishStatus();"
                class="sfdc-btn sfdc-btn-info">
                  <?php echo __('Publish','zgpbd_admin')?> <i class="fa fa-globe" aria-hidden="true"></i>
            </label>
           <!-- <label class="sfdc-btn sfdc-btn-success ">
               <div class="sfdc-dropdown">
                   <div class=" sfdc-dropdown-toggle" data-toggle="dropdown"> <?php echo __('Preview','zgpbd_admin')?>  <span class="sfdc-caret"></span></div>
                    <ul class="sfdc-dropdown-menu">
                      <li><a href="#"><?php echo __('Desktop','zgpbd_admin');?></a></li>
                      <li><a href="#"><?php echo __('Tablet','zgpbd_admin');?></a></li>
                      <li><a href="#"><?php echo __('Phone','zgpbd_admin');?></a></li>
                    </ul>
                  </div>
            </label> -->
            <label class="sfdc-btn sfdc-btn-success ">
               <div class="sfdc-dropdown">
                   <div class=" sfdc-dropdown-toggle" data-toggle="dropdown"> <?php echo __('Templates','zgpbd_admin')?>  <span class="sfdc-caret"></span></div>
                    <ul class="sfdc-dropdown-menu">
                      <li><a onclick="javascript:zgpb_core.templates_blank();" href="javascript:void(0);" ><?php echo __('Blank','zgpbd_admin');?></a></li>
                      <li><a onclick="javascript:zgpb_core.templates_getContent(1);" href="javascript:void(0);"><?php echo __('Landing page','zgpbd_admin');?></a></li>
                      
                    </ul>
                  </div>
            </label> 
           <label onclick="javascript:zgpb_front.elements_container_chStatus()"
                   data-lbl-show="<?php echo __('Show Palette','zgpbd_admin')?>"
                   data-lbl-hide="<?php echo __('Hide Palette','zgpbd_admin')?>"
                   class="sfdc-btn sfdc-btn-warning">
               
               <i class="fa fa-list-alt" aria-hidden="true"></i>
               <div class="zgpb-menu-show-palette">
                   <?php echo __('Show Palette','zgpbd_admin')?>
               </div>
            </label>
           
           
             <?php if(ZGPBLD_LITE == 1){ ?>
                     <label 
                    onclick="javascript:zgpb_core.showFeatureLocked(this);return false;"
                  data-blocked-feature="Import Page"
                    class="sfdc-btn sfdc-btn-success">
                    <input type="checkbox" 
                           name="sfdc-header-option-4" value="5"> <?php echo __('Import', 'zgpbd_admin') ?> <i class="fa fa-reply"></i>
                    <span class="rkfm-express-lock-wrap" 
                         ><i class="fa fa-lock"></i></span>
                    
                    </label>
                <?php }else{ ?>
                      <label 
                        onclick="javascript:zgpb_core.load_modal_import();return false;"
                        class="sfdc-btn sfdc-btn-success">
                        <input type="checkbox" 
                               name="sfdc-header-option-4" value="5"> <?php echo __('Import', 'zgpbd_admin') ?> <i class="fa fa-reply"></i>
                        </label>
                <?php } ?>
           
            <?php if(ZGPBLD_LITE == 1){ ?>
                     <label 
                     onclick="javascript:zgpb_core.showFeatureLocked(this);return false;"
                  data-blocked-feature="Export Page"
                    class="sfdc-btn sfdc-btn-success">
                    <input type="checkbox" 
                           name="sfdc-header-option-4" value="5"> <?php echo __('Export', 'zgpbd_admin') ?> <i class="fa fa-share"></i> <span class="rkfm-express-lock-wrap" 
                         ><i class="fa fa-lock"></i></span>
                    </label>
                <?php }else{ ?>
                         <label 
                    onclick="javascript:zgpb_core.load_modal_export();return false;"
                    class="sfdc-btn sfdc-btn-success">
                    <input type="checkbox" 
                           name="sfdc-header-option-4" value="5"> <?php echo __('Export', 'zgpbd_admin') ?> <i class="fa fa-share"></i>
                    </label>
                <?php } ?>
           
           
           
           <?php if (ZGPBLD_DEBUG == 1) {?>
            <label 
                onclick="javascript:zgpb_front.test_showModal();return false;"
                class="sfdc-btn sfdc-btn-info">
                <input type="checkbox" 
                       name="sfdc-header-option-4" value="5"> <?php echo __(' Option 2','zgpbd_admin')?>
            </label>
            <label 
                onclick="javascript:zgpb_front.test_showModal2();return false;"
                class="sfdc-btn sfdc-btn-info">
                <input type="checkbox" 
                       name="sfdc-header-option-4" value="5"> <?php echo __(' Option 3','zgpbd_admin')?>
            </label>
            <label 
                onclick="javascript:zgpb_front.test_showModal2();return false;"
                class="sfdc-btn sfdc-btn-info">
                <input type="checkbox" 
                       name="sfdc-header-option-4" value="5"> <?php echo __(' Layout gen','zgpbd_admin')?>
            </label>
            <label 
                onclick="javascript:zgpb_core.test_showArray();return false;"
                class="sfdc-btn sfdc-btn-info">
                <input type="checkbox" 
                       name="sfdc-header-option-5" value="6"> <?php echo __(' Show vars','zgpbd_admin')?>
            </label>
           <?php }?>
        </div>
    </div>
    
    <div class="sfdc-editor2-logo">
        <?php echo __('Landera','zgpbd_admin')?>
        
        <img src="<?php echo ZGPBLD_URL . "/assets/backend/image/logo-zigabuilder-30x30.png";?>">
    </div>
    
</div>

<div id="zgpb-palette-cont" class="sfdc-wrap" title="<?php echo __('Fields Palette','zgpbd_admin')?>">
  <?php echo $elements;?>
</div>

<?php echo $hiddens;?>
<?php echo $templates;?>
<?php echo $variables;?>
<?php echo $others;?>

<div id="zgpb-loading-box" class="sfdc-wrap"  style="display:none;">
    <div class="sfdc-alert sfdc-alert-success"></div>
</div>

<div id="zgpb-panel-loadingst" style="display:block;">
            <div class="zgpb-loader-header-wrap">
                <div class="zgpb-icon-uifm-logo-black"></div>
                <div class="zgpb-loader-header-1"></div>
            </div>
        </div>

<!--
<div class="sfdc-editor2-sidebar">
    <div class="sfdc-editor2-tab-wrap">
        
        <div class="container">

	<ul class="tabs">
		<li class="tab-link current" data-tab="tab-1">Tab One</li>
		<li class="tab-link" data-tab="tab-2">Tab Two</li>
		<li class="tab-link" data-tab="tab-3">Tab Three</li>
		<li class="tab-link" data-tab="tab-4">Tab Four</li>
	</ul>

	<div id="tab-1" class="tab-content current">
		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
	</div>
	<div id="tab-2" class="tab-content">
		 Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	</div>
	<div id="tab-3" class="tab-content">
		Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
	</div>
	<div id="tab-4" class="tab-content">
		Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
	</div>

        </div>
    </div>
</div>-->




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