<?php
if (!defined('ABSPATH')) {exit('No direct script access allowed');}  
?>
<?php ob_start();?>
 <div class="zgpbf-input1-container">
       <div class="zgpbf-input7-texteditor"><?php echo urldecode($input1['text']);?></div>
 </div>

<?php $tmp_input_html = ob_get_contents();
ob_end_clean();?>
<?php
ob_start();
?>
<div id="zgpbf_<?php echo $id;?>"  
     data-idfield="<?php echo $id;?>"
     data-typefield="8" 
     class="zgpbf-f-htmleditor zgpbf-field"
     >
            <div class="zgpbf-field-wrap ">
                <div class="sfdc-row">
                    <div class="zgpb-input1-container">
                        <?php echo $tmp_input_html;?>
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