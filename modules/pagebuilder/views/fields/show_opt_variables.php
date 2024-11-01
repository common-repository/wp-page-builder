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
<script type="text/javascript">
 zgbdVariables =<?php echo json_encode(
         apply_filters('zgbd_editor_variables_load', array(
             'zgpb_version' => ZGPBLD_VERSION,
             'home_url' => home_url(),
             'is_rtl'   => is_rtl(),
             'post_id'  => $post_id,
             'post_url'  => get_permalink($post_id,true),
             'post_status' => get_post_status(),
             'post_type' => get_post_type(),
             'post_backend_url' => admin_url('/post.php?post='.$post_id.'&action=edit')
             
         ))
         )?>
 </script>
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