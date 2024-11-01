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
 
<pre>
<?php if(!empty($urls)){
    ?>
<div class="sfdc-table-responsive">
      <table class="sfdc-table sfdc-table-dark">
        <thead>
          <tr>
            <th scope="col"><?php echo __('Old url','zgpbd_admin');?></th>
            <th scope="col"><?php echo __('New url','zgpbd_admin');?></th>
          </tr>
        </thead>
        <tbody>
             <?php foreach ($urls as $key => $value) {
                  ?>
                    <tr>
                      <th scope="row"><?php echo $value['old'];?></th>
                      <td><?php echo $value['new'];?></td>
                    </tr>    
                 <?php
              }?>
        </tbody>
      </table>  
  </div>  
<?php
    
}else{
    ?>
      <div><?php echo __('there are not modified urls','zgpbd_admin');?></div>  
<?php
    
    
}?>
 
</pre>
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