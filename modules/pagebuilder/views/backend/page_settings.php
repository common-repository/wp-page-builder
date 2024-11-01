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
<div class="zgpb-page-settings sfdc-wrap">
    <div class="sfdc-row">
        <div class="sfdc-col-lg-12">
            <h1 class="sfdc-page-header"><?php echo __('Dashboard', 'zgpbd_admin'); ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="sfdc-row">
        <div class="sfdc-col-lg-12">
            <div class="sfdc-panel sfdc-panel-default">
                <div class="sfdc-panel-heading">
                    <i class="fa fa-youtube-play" aria-hidden="true"></i> <?php echo __('Introduction', 'zgpbd_admin'); ?>
                </div>
                <!-- /.panel-heading -->
                <div class="sfdc-panel-body">
                   <iframe width="560" height="315" src="https://www.youtube.com/embed/mS5kTzfpwIE" frameborder="0" allowfullscreen></iframe>
                </div>
                <!-- /.panel-body -->
            </div>

        </div>
    </div>
    <div class="sfdc-row">
        <div class="sfdc-col-lg-12">
            <div class="sfdc-panel sfdc-panel-default">
                <div class="sfdc-panel-heading">
                    <i class="fa fa-list-alt"></i> <?php echo __('Settings', 'zgpbd_admin'); ?>
                </div>
                <!-- /.panel-heading -->
                <div class="sfdc-panel-body">
                    <form 
                        id="zgpb-page-settings"
                        chartset="utf-8"
                        name="zgpbfrm"
                        class="sfdc-form-horizontal">
                        <div id="uiform-settings-inner-body">
                            <div class="sfdc-form-group">
                                <label class=" sfdc-col-sm-2 sfdc-control-label"><?php echo __('Language', 'zgpbd_admin'); ?></label>
                                <div class="sfdc-col-sm-10">

                                    <select class="sfdc-form-control sfdc-input-sm" 
                                            name="language"  
                                            style="width:150px"
                                            id="zgpb-page-opt-language" 
                                            data-placeholder="<?php echo __('Select here..', 'zgpbd_admin'); ?>" >
                                                <?php
                                                foreach ($lang_list as $frow):
                                                    ?>
                                                    <?php $sel = ($frow['val'] == $language) ? " selected=\"selected\"" : "" ?>
                                            <option value="<?php echo $frow['val']; ?>" <?php echo $sel; ?>>
                                                <?php echo $frow['label']; ?>
                                            </option>
                                            <?php
                                        endforeach;
                                        ?>
                                        <?php unset($frow); ?>
                                    </select>

                                </div>
                            </div>


                        </div>
                    </form>
                    <a class="sfdc-btn sfdc-btn-sm sfdc-btn-primary" 
                       href="javascript:void(0);"
                       onclick="zgpb_page.globalsettings_saveOptions();"
                       >
                        <i class="fa fa-floppy-o"></i>
                        <?php echo __('Save changes', 'zgpbd_admin') ?>
                    </a>   

                </div>
                <!-- /.panel-body -->
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
$cntACmp = preg_replace("/\s+/", " ", $cntACmp);
ob_end_clean();
echo $cntACmp;
?>