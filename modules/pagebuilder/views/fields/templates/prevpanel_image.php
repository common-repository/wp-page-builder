<?php
if (!defined('ABSPATH')) {exit('No direct script access allowed');}  
?>
<?php
ob_start();
?>
<?php 
$id_field=(!empty($id))?$id:'';
?>
<div id="<?php echo $id_field;?>" data-typefield="11" data-iscontainer="0"  class="zgpb-field-image-box zgpb-field-template">
            <div class="sfdc-container-fluid">
                <div class="sfdc-row">
                    <div class="sfdc-col-md-12">
                        <div class="zgpb-input1-container">
                            <div class="zgpb-input1-image">
                                 <?php
                                 $tmp_img_src='';
                                 if(!empty($input1['img_src'])){
                                    $tmp_img_src = urldecode($input1['img_src']);
                                 }
                                 ?>
                                <img src="<?php echo $tmp_img_src;?>"/>
                                
                                
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