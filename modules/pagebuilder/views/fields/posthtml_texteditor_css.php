<?php
if (!defined('ABSPATH')) {exit('No direct script access allowed');}
ob_start();
?>
 #zgpbf_<?php echo $id;?> .zgpb-input1-text{
    <?php
    //label
    ?>
   display:inline-block;
   <?php if($input1['size']){?>
            font-size:<?php echo $input1['size'];?>px;
        <?php } ?>
        <?php if(intval($input1['bold'])===1){?>
            font-weight: bold;
        <?php }else{ ?>
            font-weight: normal;
        <?php }?>  
        <?php if(intval($input1['italic'])===1){?>
            font-style:italic;
        <?php } ?>
        <?php if(intval($input1['underline'])===1){?>
            text-decoration:underline;
        <?php } ?>
        <?php if(!empty($input1['color'])){?>
            color:<?php echo $input1['color'];?>;
        <?php } ?>
            
         <?php if(isset($input1['text_align'])){
             
                switch(intval($input1['text_align'])){
                    case 5:
                        //inherit
                        $tmp_txt_str='inherit';
                        break;
                    case 4:
                        //initial
                        $tmp_txt_str='initial';
                        break;
                    case 3:
                        //justify
                        $tmp_txt_str='justify';
                        break;
                    case 2:
                        //center
                        $tmp_txt_str='center';
                        break;
                    case 1:
                        //right
                        $tmp_txt_str='right';
                        break;
                    case 0:
                    default:
                        //left
                        $tmp_txt_str='left';
                        break;
                }
             
             ?>
            
            text-align:<?php echo $tmp_txt_str;?>;
            
        <?php } ?>    
            
        <?php if(isset($input1['font_st']) && intval($input1['font_st'])===1){?>
        <?php 
            $font_temp=json_decode($input1['font'],true);
            if(isset($font_temp['family'])){
        ?>    
            font-family:<?php echo $font_temp['family'];?>;
            <?php
            //storing to global fonts
            Zgpbld_Form_Helper::post_store_fonts($font_temp);
            //end storing to global fonts
            ?>
           <?php } ?> 
        <?php } ?>
        <?php 
         //shadow
         if(isset($input1['shadow_st']) 
                 && intval($input1['shadow_st'])===1
                 && !empty($input1['shadow_color'])
                 ){
                $x_tmp=$input1['shadow_x'].'px';
                $y_tmp=$input1['shadow_y'].'px';
                $blur_tmp=$input1['shadow_blur'].'px';
                $color_tmp=$input1['shadow_color'];
             ?>
                text-shadow: <?php echo $x_tmp.' '.$y_tmp.' '.$blur_tmp.' '.$color_tmp;?>;
            <?php
            
         }
         ?>    
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