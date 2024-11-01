<?php
if (!defined('ABSPATH')) {exit('No direct script access allowed');}
ob_start();
?>
   #zgpbf_<?php echo $id;?>  .zgpb-input1-container{
        <?php 
         //padding
         if(isset($skin['padding']['show_st']) && intval($skin['padding']['show_st'])===1){
             ?>
             padding: <?php echo $skin['padding']['top'];?>px <?php echo $skin['padding']['right'];?>px <?php echo $skin['padding']['bottom'];?>px <?php echo $skin['padding']['left'];?>px;
                
         <?php
         }else{
         ?>
             padding:0px 0px 0px 0px;
         <?php }?>
        <?php 
         //margin
         if(isset($skin['margin']['show_st']) && intval($skin['margin']['show_st'])===1){
             ?>
             margin: <?php echo $skin['margin']['top'];?>px <?php echo $skin['margin']['right'];?>px <?php echo $skin['margin']['bottom'];?>px <?php echo $skin['margin']['left'];?>px;
                
         <?php
         }else{
         ?>
             margin:0px 0px 0px 0px;
         <?php }?>
   }
   
      
   #zgpbf_<?php echo $id;?> .zgpb-input1-text
    {
        <?php if(isset($input1['max_width_st']) && intval($input1['max_width_st'])===1 && isset($input1['max_width'])){?>
            max-width:<?php echo $input1['max_width']; ?>px;
        <?php } else {?>
            width:100%;
        <?php } ?> 
    
    }
 
   
    #zgpbf_<?php echo $id;?> .zgpb-input1-container{
  <?php switch (intval($input1['obj_align'])) {
                    case 1:
          ?>
              text-align:center;
              <?php
                        break;
                    case 2:
                       ?>
              text-align:right;
              <?php
                        break;
                    case 0:
                    default:
                        ?>
              text-align:left;
              <?php
                        break;
                }?>
   }
   
   
    <?php
        
        if(!empty($skin['custom_css']['ctm_additional'])){
            //storing to global fonts
            Zgpbld_Form_Helper::post_store_f_addtns($skin['custom_css']['ctm_additional']);
            //end storing to global fonts
        }
            
   ?>
   
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