<?php
/**
 * Intranet
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   Rocket_form
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2015 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://wordpress-form-builder.zigaform.com/
 */
if (!defined('ABSPATH')) {exit('No direct script access allowed');}
?>
 
<div class="zgpb-blocked-message-box">
    <h2>
        <i class="fa fa-lock"></i>
        <?php echo $message.' '.__( 'is a PRO Feature', 'zgpbd_admin' );?>
    </h2>
    <div class="zgpb-blocked-message-box-msg">
        <?php echo sprintf(__( 'We\'re sorry, %s is not available on free version.<br><br>Please upgrade to Pro version to unlocks all these features, and puts you on the upgrade path for additional features that we’re excited to share in the near future.', 'zgpbd_admin' ),$message);?>
    </div>
    <div class="zgpb-blocked-message-box-btn">
        <a 
            href="https://codecanyon.net/item/landera-wordpress-page-builder/19652454?ref=Softdiscover"
             target="_blank"
            class="sfdc-btn sfdc-btn-success sfdc-btn-lg"> <span><?php echo __('UPGRADE TO PRO VERSION', 'zgpbd_admin');?></span></a>
    </div>
</div>
