<?php
if (!defined('ABSPATH')) {exit('No direct script access allowed');}  
?>
<?php
ob_start();
?>
<div id="zgpbf_<?php echo $id;?>"  
     data-idfield="<?php echo $id;?>"
     data-typefield="10" 
     class="zgpbf-f-button zgpbf-field"
     >
    <div class="sfdc-container-fluid ">
        <div class="sfdc-row">
                <div class="sfdc-col-md-12">
                    <div class="zgpb-input1-container">
                        <div class="zgpb-input1-text">
                            <?php
                            $tmp_inp_str;
                            switch(intval($input1['a_target'])){
                                case 1:
                                    //parent
                                    $tmp_inp_str='_parent';
                                    break;
                                case 2:
                                    //self
                                    $tmp_inp_str='_self';
                                    break;
                                case 3:
                                    //top
                                    $tmp_inp_str='_top';
                                    break;
                                case 0:
                                default:    
                                    //blank
                                    $tmp_inp_str='_blank';
                                    break;
                            }
                            ?>
                            
                            <a href="<?php echo urldecode($input1['a_href']);?>" target="<?php echo $tmp_inp_str;?>"><?php 
                            echo urldecode($input1['text']);
                            ?></a>
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