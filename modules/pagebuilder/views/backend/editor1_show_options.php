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

<div id="zgpb-editor1-container" style="display: none;" class="sfdc-wrap">
    <!-- header -->
    <div id="zgpb-editor1-header"  >
        <div class="zgpb-editor1-options">
            <div class="sfdc-btn-group sfdc-col-xs-12" data-toggle="buttons">
                <label 

                    onclick="javascript:zgpb_core.savePage_DraftStatus();"
                    class="sfdc-btn sfdc-btn-success">
                    <?php echo __('Save draft', 'zgpbd_admin') ?> <i class="fa fa-floppy-o" aria-hidden="true"></i>
                </label>
                <label 
                    onclick="javascript:zgpb_core.savePage_publishStatus();"
                    class="sfdc-btn sfdc-btn-info">
                    <?php echo __('Publish', 'zgpbd_admin') ?> <i class="fa fa-globe" aria-hidden="true"></i>
                </label>
                <label class="sfdc-btn sfdc-btn-success ">
                    <div class="sfdc-dropdown">
                        <div class=" sfdc-dropdown-toggle" data-toggle="dropdown"> <?php echo __('Templates', 'zgpbd_admin') ?>  <span class="sfdc-caret"></span></div>
                        <ul class="sfdc-dropdown-menu">
                            <li><a onclick="javascript:zgpb_core.templates_blank();" href="javascript:void(0);" ><?php echo __('Blank', 'zgpbd_admin'); ?></a></li>
                            <li><a onclick="javascript:zgpb_core.templates_getContent(1);" href="javascript:void(0);"><?php echo __('Landing page', 'zgpbd_admin'); ?></a></li>

                        </ul>
                    </div>
                </label> 
                <label onclick="javascript:zgpb_back.menuoptions_switchPalette(this);return false;"
                       data-zgpb-status="0"
                       id="zgpb-menuoption-palette-switcher"
                       data-lbl-dock="<?php echo __('Dock Palette', 'zgpbd_admin') ?>"
                       data-lbl-show="<?php echo __('Show Palette', 'zgpbd_admin') ?>"
                       data-lbl-hide="<?php echo __('Hide Palette', 'zgpbd_admin') ?>"
                       class="sfdc-btn sfdc-btn-warning ">
                    <i class="fa fa-list-alt" aria-hidden="true"></i>
                    <div class="zgpb-menu-show-palette">
                        <?php echo __('Hide Palette', 'zgpbd_admin') ?>
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
                
               
             

                <?php if (ZGPBLD_DEBUG == 1) { ?>
                    <label 
                        onclick="javascript:zgpb_back.test_showModal();return false;"
                        class="sfdc-btn sfdc-btn-info">
                        <input type="checkbox" 
                               name="sfdc-header-option-4" value="5"> <?php echo __(' Option 2', 'zgpbd_admin') ?>
                    </label>
                    <label 
                        onclick="javascript:zgpb_core.test_showArray();return false;"
                        class="sfdc-btn sfdc-btn-info">
                        <input type="checkbox" 
                               name="sfdc-header-option-5" value="6"> <?php echo __(' Show vars', 'zgpbd_admin') ?>
                    </label>
                <?php } ?>
                
                <label class="sfdc-btn sfdc-btn-info ">
                    <div class="sfdc-dropdown">
                        <div class=" sfdc-dropdown-toggle" data-toggle="dropdown"> <?php echo __('Tools', 'zgpbd_admin') ?>  <span class="sfdc-caret"></span></div>
                        <ul class="sfdc-dropdown-menu">
                            <li><a onclick="javascript:zgpb_tools.replaceurl_to_local();" href="javascript:void(0);" ><?php echo __('Replace url', 'zgpbd_admin'); ?></a></li>
                            <li><a onclick="javascript:return false;" href="javascript:void(0);"><?php echo __('Blank', 'zgpbd_admin'); ?></a></li>

                        </ul>
                    </div>
                </label> 
            </div>
        </div>

        <div class="zgpb-editor1-logo">
            <?php echo __('Landera', 'zgpbd_admin') ?>

            <img src="<?php echo ZGPBLD_URL . "/assets/backend/image/logo-zigabuilder-30x30.png"; ?>">
        </div>
    </div>
    <!--/ End header -->
    <!-- body -->
    <div id="zgpb-editor1-body">
        <div class="zgpb-editor1-body-left">
            <div id="zgpb-admin-palette">
                <div id="zgpb-admin-palette-header">
                    <div class=""><?php echo __('Fields palette', 'zgpbd_admin'); ?></div>
                    <div class="zgpb-editor1-header-icons">
                        <div class="sfdc-btn-group">
                            <a class="sfdc-btn sfdc-btn-xs sfdc-btn-primary"
                               onclick="javascript:zgpb_back.menuoptions_undockPalette();"
                               href="javascript:void(0);"><i class="fa fa-share" aria-hidden="true"></i> <?php echo __('Undock', 'zgpbd_admin'); ?></a>
                            <a class="sfdc-btn sfdc-btn-xs sfdc-btn-danger" onclick="javascript:zgpb_core.menuoptions_closePalette();"
                               href="javascript:void(0);"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <div id="zgpb-admin-palette-body">
                    <?php echo $elements; ?>
                </div>
                <div id="zgpb-admin-palette-footer"></div>
            </div>
        </div>
        <div class="zgpb-editor1-body-main">
            <div class="zgpb-editor1-body-main-inner">

            </div>

        </div>

        <div id="zgpb-panel-loadingst" style="display:block;">
            <div class="zgpb-loader-header-wrap">
                <div class="zgpb-icon-uifm-logo-black"></div>
                <div class="zgpb-loader-header-1"></div>
            </div>
        </div>

    </div>
    <!--/ body -->

</div>

<div id="zgpb-palette-cont" class="sfdc-wrap" title="<?php echo __('Fields Palette', 'zgpbd_admin') ?>">
    <?php echo $elements; ?>
</div>

<?php echo $hiddens; ?>
<?php echo $templates; ?>
<?php echo $variables; ?>
<?php echo $others; ?>
<div id="zgpb-loading-box" class="sfdc-wrap"  style="display:none;">
    <div class="sfdc-alert sfdc-alert-success"></div>
</div>

<?php
$cntACmp = ob_get_contents();
$cntACmp = str_replace("\n", '', $cntACmp);
$cntACmp = str_replace("\t", '', $cntACmp);
$cntACmp = str_replace("\r", '', $cntACmp);
$cntACmp = str_replace("//-->", ' ', $cntACmp);
$cntACmp = str_replace("//<!--", ' ', $cntACmp);
$cntACmp = preg_replace("/\s+/", " ", $cntACmp);
ob_end_clean();
echo $cntACmp;
?>