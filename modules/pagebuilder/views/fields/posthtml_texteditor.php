<?php
if (!defined('ABSPATH')) {exit('No direct script access allowed');}  
?>
<?php
ob_start();
?>
<div id="zgpbf_<?php echo $id;?>"  
     data-idfield="<?php echo $id;?>"
     data-typefield="7" 
     class="zgpbf-f-texteditor zgpbf-field"
     >
    <div class="sfdc-container-fluid ">
        <div class="sfdc-row">
                <div class="sfdc-col-md-12">
                    <div class="zgpb-input1-container">
                        <div class="zgpb-input1-text">
                            <?php echo urldecode($input1['text']);?>
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