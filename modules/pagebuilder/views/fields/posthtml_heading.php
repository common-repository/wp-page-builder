<?php
if (!defined('ABSPATH')) {exit('No direct script access allowed');}  
?>
<?php
ob_start();
?>
<div id="zgpbf_<?php echo $id;?>"  
     data-idfield="<?php echo $id;?>"
     data-typefield="9" 
     class="zgpbf-f-heading zgpbf-field"
     >
    <div class="sfdc-container-fluid ">
        <div class="sfdc-row">
                <div class="sfdc-col-md-12">
                    <div class="zgpb-input1-container">
                        <div class="zgpb-input1-text">
                            <?php 
                            $h_temp='';
                            switch(intval($input1['h_type'])){
                                case 1:
                                    $h_temp='<h2>'.urldecode($input1['text']).'</h2>';
                                    break;
                                case 2:
                                    $h_temp='<h3>'.urldecode($input1['text']).'</h3>';
                                    break;
                                case 3:
                                    $h_temp='<h4>'.urldecode($input1['text']).'</h4>';
                                    break;
                                case 4:
                                    $h_temp='<h5>'.urldecode($input1['text']).'</h5>';
                                    break;
                                case 5:
                                    $h_temp='<h6>'.urldecode($input1['text']).'</h6>';
                                    break;
                                case 0:
                                default:
                                    $h_temp='<h1>'.urldecode($input1['text']).'</h1>';
                                    break;
                            }
                            echo $h_temp;
                            ?>
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