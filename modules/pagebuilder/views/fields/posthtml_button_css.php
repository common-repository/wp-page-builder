<?php
if (!defined('ABSPATH')) {exit('No direct script access allowed');}
ob_start();
?>
 #zgpbf_<?php echo $id;?> .zgpb-input1-text a
 {
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
        <?php }else{ ?>
            text-decoration:none;
        <?php } ?>    
            
        <?php if(!empty($input1['color'])){?>
            color:<?php echo $input1['color'];?>;
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
                
        <?php if(isset($el_background['show_st']) 
        && intval($el_background['show_st'])===1){?>

    <?php 
  //el_background       
             switch (intval($el_background['type'])) {
                        case 1:
                            //solid
                            if(!empty($el_background['cl_solid_color'])){
                            ?>
                                background-color:<?php echo $el_background['cl_solid_color'];?>;
                            <?php    
                            }
                            break;
                        case 2:
                            //gradient
                            if(!empty($el_background['cl_start_color']) && !empty($el_background['cl_start_color'])){ 
                            ?>
                                background-color: <?php echo $el_background['cl_start_color'];?>;
                                background-image: -webkit-linear-gradient(top, <?php echo $el_background['cl_start_color'];?>, <?php echo $el_background['cl_end_color'];?>);
                                background-image: -moz-linear-gradient(top, <?php echo $el_background['cl_start_color'];?>, <?php echo $el_background['cl_end_color'];?>);
                                background-image: -ms-linear-gradient(top, <?php echo $el_background['cl_start_color'];?>, <?php echo $el_background['cl_end_color'];?>);
                                background-image: -o-linear-gradient(top, <?php echo $el_background['cl_start_color'];?>, <?php echo $el_background['cl_end_color'];?>);
                                background-image: linear-gradient(to bottom, <?php echo $el_background['cl_start_color'];?>, <?php echo $el_background['cl_end_color'];?>);
                            <?php    
                            }
                            break;
                    }
         ?>
             <?php if(isset($el_background['img_source']) && !empty($el_background['img_source'])){?>
                    background-image:url("<?php echo $el_background['img_source'];?>");
                     
                <?php } ?>
             
               <?php 
               //repeat
               if(isset($el_background['img_repeat'])){
                   
                   switch(intval($el_background['img_repeat'])){
                       case 1:
                           //repeat-x
                           $tmp_bg_str='repeat-x';
                           break;
                       case 2:
                           //repeat-y
                           $tmp_bg_str='repeat-y';
                           break;
                       case 3:
                           //no-repeat
                           $tmp_bg_str='no-repeat';
                           break;
                       case 4:
                           //initial
                           $tmp_bg_str='initial';
                           break;
                       case 5:
                           //inherit
                           $tmp_bg_str='inherit';
                           break;
                       case 0:
                       default:
                           $tmp_bg_str='auto';
                           break;
                           
                   }
                   
                   ?>
                    
                    background-repeat:<?php echo $tmp_bg_str;?>;
                <?php } ?>     
               <?php 
               //size
               if(isset($el_background['img_size_type'])){
                   
                   switch(intval($el_background['img_size_type'])){
                       case 1:
                           //length
                            $tmp_bg_str=$el_background['img_size_len'];
                           break;
                       case 2:
                           //percentage
                           $tmp_bg_str=$el_background['img_size_len'];
                           break;
                       case 3:
                           //cover
                           $tmp_bg_str='cover';
                           break;
                       case 4:
                           //contain
                           $tmp_bg_str='contain';
                           break;
                       case 5:
                           //initial
                           $tmp_bg_str='initial';
                           break;
                       case 6:
                           //inherit
                           $tmp_bg_str='inherit';
                           break;
                       case 0:
                       default:
                           $tmp_bg_str='auto';
                           break;
                           
                   }
                   
                   ?>
                    
                    background-size:<?php echo $tmp_bg_str;?>;
                <?php } ?>        
                    
                 <?php if(isset($el_background['img_position']) && !empty($el_background['img_position'])){?>
                   background-position:<?php echo $el_background['img_position'];?>;
                     
                <?php } ?>    
                    
       <?php }else{?>
<?php } ?> 

    <?php 
         //el_border_radius
         if(isset($el_border_radius['show_st']) && intval($el_border_radius['show_st'])===1){
             ?>
             -webkit-border-radius: <?php echo $el_border_radius['size'];?>px;
                -moz-border-radius: <?php echo $el_border_radius['size'];?>px;
                border-radius: <?php echo $el_border_radius['size'];?>px;    
                 <?php
         }
         ?>                
      <?php 
         //el_border
         if(isset($el_border['show_st']) 
                 && intval($el_border['show_st'])===1
                 && !empty($el_border['color'])
                 ){
             if(intval($el_border['type'])===2){
             $solid_tmp='dotted';    
             }else{
             $solid_tmp='solid';    
             }
             $color_tmp=$el_border['color'];
             $size_tmp=$el_border['width'];
             ?>
                border: <?php echo $solid_tmp;?> <?php echo $color_tmp;?> <?php echo $size_tmp;?>px;
            <?php
            
         }
         ?> 
     <?php 
         //shadow
         if(isset($el_shadow['show_st']) 
                 && intval($el_shadow['show_st'])===1
                 && !empty($el_shadow['color'])
                 ){
                $x_tmp=$el_shadow['h_shadow'].'px';
                $y_tmp=$el_shadow['v_shadow'].'px';
                $blur_tmp=$el_shadow['blur'].'px';
                $color_tmp=$el_shadow['color'];
             ?>
                box-shadow: <?php echo $x_tmp.' '.$y_tmp.' '.$blur_tmp.' '.$color_tmp;?>;
            <?php
            
         }
         ?>   
                
         <?php 
         //padding
         if(isset($el_padding['show_st']) && intval($el_padding['show_st'])===1){
             ?>
             padding: <?php echo $el_padding['top'];?>px <?php echo $el_padding['right'];?>px <?php echo $el_padding['bottom'];?>px <?php echo $el_padding['left'];?>px;
                
         <?php
         }else{
         ?>
             padding:5px 5px 5px 5px;
         <?php }?>       
                
                
   }
   #zgpbf_<?php echo $id;?> .zgpb-input1-text a:hover{
     <?php 
  //el_background       
             switch (intval($el_background2['type'])) {
                        case 1:
                            //solid
                            if(!empty($el_background2['cl_solid_color'])){
                            ?>
                                background-color:<?php echo $el_background2['cl_solid_color'];?>;
                            <?php    
                            }
                            break;
                        case 2:
                            //gradient
                            if(!empty($el_background2['cl_start_color']) && !empty($el_background2['cl_start_color'])){ 
                            ?>
                                background-color: <?php echo $el_background2['cl_start_color'];?>;
                                background-image: -webkit-linear-gradient(top, <?php echo $el_background2['cl_start_color'];?>, <?php echo $el_background2['cl_end_color'];?>);
                                background-image: -moz-linear-gradient(top, <?php echo $el_background2['cl_start_color'];?>, <?php echo $el_background2['cl_end_color'];?>);
                                background-image: -ms-linear-gradient(top, <?php echo $el_background2['cl_start_color'];?>, <?php echo $el_background2['cl_end_color'];?>);
                                background-image: -o-linear-gradient(top, <?php echo $el_background2['cl_start_color'];?>, <?php echo $el_background2['cl_end_color'];?>);
                                background-image: linear-gradient(to bottom, <?php echo $el_background2['cl_start_color'];?>, <?php echo $el_background2['cl_end_color'];?>);
                            <?php    
                            }
                            break;
                    }
         ?>
             <?php if(isset($el_background2['img_source']) && !empty($el_background2['img_source'])){?>
                    background-image:url("<?php echo $el_background2['img_source'];?>");
                     
                <?php } ?>
             
               <?php 
               //repeat
               if(isset($el_background2['img_repeat'])){
                   
                   switch(intval($el_background2['img_repeat'])){
                       case 1:
                           //repeat-x
                           $tmp_bg_str='repeat-x';
                           break;
                       case 2:
                           //repeat-y
                           $tmp_bg_str='repeat-y';
                           break;
                       case 3:
                           //no-repeat
                           $tmp_bg_str='no-repeat';
                           break;
                       case 4:
                           //initial
                           $tmp_bg_str='initial';
                           break;
                       case 5:
                           //inherit
                           $tmp_bg_str='inherit';
                           break;
                       case 0:
                       default:
                           $tmp_bg_str='auto';
                           break;
                           
                   }
                   
                   ?>
                    
                    background-repeat:<?php echo $tmp_bg_str;?>;
                <?php } ?>     
               <?php 
               //size
               if(isset($el_background2['img_size_type'])){
                   
                   switch(intval($el_background2['img_size_type'])){
                       case 1:
                           //length
                            $tmp_bg_str=$el_background2['img_size_len'];
                           break;
                       case 2:
                           //percentage
                           $tmp_bg_str=$el_background2['img_size_len'];
                           break;
                       case 3:
                           //cover
                           $tmp_bg_str='cover';
                           break;
                       case 4:
                           //contain
                           $tmp_bg_str='contain';
                           break;
                       case 5:
                           //initial
                           $tmp_bg_str='initial';
                           break;
                       case 6:
                           //inherit
                           $tmp_bg_str='inherit';
                           break;
                       case 0:
                       default:
                           $tmp_bg_str='auto';
                           break;
                           
                   }
                   
                   ?>
                    
                    background-size:<?php echo $tmp_bg_str;?>;
                <?php } ?>        
                    
                 <?php if(isset($el_background2['img_position']) && !empty($el_background2['img_position'])){?>
                   background-position:<?php echo $el_background2['img_position'];?>;
                     
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