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
<div id="zgpb-field-opt-content">
    <input type="hidden" id="zgpb-field-selected" value="<?php echo $field_id;?>">
    <input type="hidden" id="zgpb-field-selected-type" value="<?php echo $field_type;?>">
   <!-- Nav tabs -->
<ul class="sfdc-nav sfdc-nav-tabs">
  <li class="sfdc-active"><a href="#sfdc-fields-opt-col-1" data-toggle="tab"><?php echo __('Input','zgpbd_admin'); ?></a></li>
  <li><a href="#sfdc-fields-opt-col-2" data-toggle="tab" class="last-child"><?php echo __('More Options','zgpbd_admin'); ?></a></li>
  
</ul>
<!-- Tab panes -->
<div class="sfdc-tab-content">
  <div class="sfdc-tab-pane sfdc-in sfdc-active" id="sfdc-fields-opt-col-1">
      <div class="sfdc-tab-content2">
          <fieldset>
                    <legend><?php echo __('Image editor','zgpbd_admin'); ?> </legend>
                    <div class="zgpb-modal-body-tab-inner">
                       
                        <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-12">
                                        
                                        <a data-original-title="<?php echo __('your image','zgpbd_admin'); ?>" 
                                           data-placement="right" 
                                           data-toggle="tooltip" 
                                           href="javascript:void(0);">
                                            <span class="fa fa-question-circle"></span></a>
                                    </div>
                                    <div class="sfdc-col-md-12">
                                            <div 
                                                data-dialog-title="<?php echo __('Choose an Image','zgpbd_admin');?>"
                                                data-dialog-btn="<?php echo __('Choose','zgpbd_admin');?>"
                                                class="zgpb-opt-img-wrap">
                                                <div  class="sfdc-input-group">

                                                           <input type="text" 
                                                                  id="zgpb-field-image-src"
                                                                  class="zgpb-opt-img-inp sfdc-form-control" 
                                                                  value="" 
                                                                   >

                                                           <span class="sfdc-input-group-addon sfdc-btn sfdc-btn-default sfdc-btn-file">
                                                               <span class=""><?php echo __('Select image','zgpbd_admin');?></span>
                                                               <!--<span class="fileinput-exists">Change</span><input type="hidden"><input type="file" name="...">-->
                                                           </span>

                                                             <a  style="display:none;" class=" sfdc-btn sfdc-btn-danger sfdc-input-group-addon" href="javascript:void(0);">

                                                                 <i class="fa fa-trash-o"></i> <?php echo __('Remove','zgpbd_admin');?>

                                                             </a>

                                                </div>
                                                <div style="display:none;" class="zgpb-opt-img-preview">
                                                    <img src=""
                                                         class="sfdc-img-thumbnail">
                                                </div>

                                            </div>
                                    </div>    

                                </div>
                            </div>
                        </div>
                      
                       <div class="zgpb-opt-divider-stl1"></div>
                             <div class="space15"></div>
                               <div class="sfdc-row">
                                        <div class="sfdc-col-md-12">
                                            <label ><?php echo __('Content alignment','zgpbd_admin'); ?></label>
                                            <div class="sfdc-controls sfdc-form-group">
                                                <div class="sfdc-btn-group sfdc-btn-group-justified" data-toggle="buttons">
                                                    <label 
                                                        data-field-store="input1-obj_align"
                                                        data-toggle-enable="sfdc-btn-success sfdc-active"
                                                        data-toggle-disable="sfdc-btn-success"
                                                        data-settings-option="group-radiobutton"
                                                        class="sfdc-btn sfdc-btn-success zgpb-f-setoption-btn" >
                                                    <input type="radio" 
                                                        id="zgpb_fld_text_inp_objalign_1"
                                                        name="zgpb_fld_text_inp_objalign_1" value="0"> <i class="fa fa-align-left"></i> <?php echo __('Left','zgpbd_admin'); ?>
                                                    </label>
                                                    <label 
                                                        data-field-store="input1-obj_align"
                                                        data-toggle-enable="sfdc-btn-success sfdc-active"
                                                        data-toggle-disable="sfdc-btn-success"
                                                        data-settings-option="group-radiobutton"
                                                        class="sfdc-btn sfdc-btn-success zgpb-f-setoption-btn" >
                                                    <input type="radio" 
                                                        id="zgpb_fld_text_inp_objalign_2"
                                                        name="zgpb_fld_text_inp_objalign_2" value="1"> <i class="fa fa-align-center"></i> <?php echo __('Center','zgpbd_admin'); ?>
                                                    </label>
                                                    <label 
                                                        data-field-store="input1-obj_align"
                                                        data-toggle-enable="sfdc-btn-success sfdc-active"
                                                        data-toggle-disable="sfdc-btn-success"
                                                        data-settings-option="group-radiobutton"
                                                        class="sfdc-btn sfdc-btn-success zgpb-f-setoption-btn" >
                                                    <input type="radio" 
                                                        id="zgpb_fld_text_inp_objalign_3" 
                                                        name="zgpb_fld_text_inp_objalign_3" value="2"> <i class="fa fa-align-right"></i> <?php echo __('Right','zgpbd_admin'); ?>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                        <div class="zgpb-opt-divider-stl1"></div>
                             <div class="space15"></div>
                        <div class="sfdc-row ">
                            
                                <div class="sfdc-col-md-6">
                                <div class="sfdc-form-group">
                                        <label for=""><?php echo __('Max width','zgpbd_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('Max width for the content','zgpbd_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                   <div class="zgpb-input-group-2 zgpb-input-group-2-mwidth">
                                       <div class="zgpb-input-group-col1">
                                            <input  
                                                id="zgpb_fld_text_inp_maxwidth"
                                                class="zgpb_fld_settings_spinner" 
                                                data-field-store="input1-max_width"
                                                type="text" >
                                        </div>
                                       <div class="zgpb-input-group-col2">
                                            <div class="sfdc-input-group"> 
                                                <span class="sfdc-input-group-addon zgpb-input-group-side">
                                                      <input 
                                                          data-field-store="input1-max_width_st"
                                                          id="zgpb_fld_text_inp_maxwidth_st"
                                                          name="zgpb_fld_text_inp_maxwidth_st"
                                                          class="zgpb-f-setoption-st"
                                                          value="1"
                                                          type="checkbox">
                                                      </span>
                                              </div>
                                       
                                        </div>
                                   </div>
                                  
                                </div>
                            </div>
                        </div>
                       
                    </div>
         </fieldset>
      
               
        
      </div>
  </div>
 <div class="sfdc-tab-pane " id="sfdc-fields-opt-col-2">
      <div class="sfdc-tab-content2">
          
           <fieldset>
                    <legend><?php echo __('Margin','zgpbd_admin'); ?> </legend>
                    <div class="zgpb-modal-body-tab-inner">
                        <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-6">
                                        <label for=""><?php echo __('Top','zgpbd_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('Top margin (px)','zgpbd_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                    </div>
                                    <div class="sfdc-col-md-6">
                                        <input  
                                                id="zgpb_fld_col_margin_top"
                                                class="zgpb_fld_settings_spinner" 
                                                data-field-store="skin-margin-top"
                                                type="text" >
                                         
                                    </div>    

                                </div>
                            </div>
                        </div>
                        <div class="zgpb-opt-divider-stl1"></div>
                         <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-6">
                                        <label for=""><?php echo __('Bottom','zgpbd_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('Bottom margin (px)','zgpbd_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                    </div>
                                    <div class="sfdc-col-md-6">
                                        <input  
                                                id="zgpb_fld_col_margin_bottom"
                                                class="zgpb_fld_settings_spinner" 
                                                data-field-store="skin-margin-bottom"
                                                type="text" >
                                         
                                    </div>    

                                </div>
                            </div>
                        </div>
                        <div class="zgpb-opt-divider-stl1"></div>
                        <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-6">
                                        <label for=""><?php echo __('left','zgpbd_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('Left margin (px)','zgpbd_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                    </div>
                                    <div class="sfdc-col-md-6">
                                        <input  
                                                id="zgpb_fld_col_margin_left"
                                                class="zgpb_fld_settings_spinner" 
                                                data-field-store="skin-margin-left"
                                                type="text" >
                                         
                                    </div>    

                                </div>
                            </div>
                        </div>
                        <div class="zgpb-opt-divider-stl1"></div>
                        <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-6">
                                        <label for=""><?php echo __('right','zgpbd_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('Right margin (px)','zgpbd_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                    </div>
                                    <div class="sfdc-col-md-6">
                                        <input  
                                                id="zgpb_fld_col_margin_right"
                                                class="zgpb_fld_settings_spinner" 
                                                data-field-store="skin-margin-right"
                                                type="text" >
                                         
                                    </div>    

                                </div>
                            </div>
                        </div>
                        <div class="space5"></div>
                    </div>
         </fieldset>
          
          <fieldset>
                    <legend><?php echo __('Padding','zgpbd_admin'); ?> </legend>
                    <div class="zgpb-modal-body-tab-inner">
                        <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-6">
                                        <label for=""><?php echo __('Top','zgpbd_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('Top margin (px)','zgpbd_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                    </div>
                                    <div class="sfdc-col-md-6">
                                        <input  
                                                id="zgpb_fld_col_padding_top"
                                                class="zgpb_fld_settings_spinner" 
                                                data-field-store="skin-padding-top"
                                                type="text" >
                                         
                                    </div>    

                                </div>
                            </div>
                        </div>
                        <div class="zgpb-opt-divider-stl1"></div>
                         <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-6">
                                        <label for=""><?php echo __('Bottom','zgpbd_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('Bottom margin (px)','zgpbd_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                    </div>
                                    <div class="sfdc-col-md-6">
                                        <input  
                                                id="zgpb_fld_col_padding_bottom"
                                                class="zgpb_fld_settings_spinner" 
                                                data-field-store="skin-padding-bottom"
                                                type="text" >
                                         
                                    </div>    

                                </div>
                            </div>
                        </div>
                        <div class="zgpb-opt-divider-stl1"></div>
                        <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-6">
                                        <label for=""><?php echo __('left','zgpbd_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('Left margin (px)','zgpbd_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                    </div>
                                    <div class="sfdc-col-md-6">
                                        <input  
                                                id="zgpb_fld_col_padding_left"
                                                class="zgpb_fld_settings_spinner" 
                                                data-field-store="skin-padding-left"
                                                type="text" >
                                         
                                    </div>    

                                </div>
                            </div>
                        </div>
                        <div class="zgpb-opt-divider-stl1"></div>
                        <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-6">
                                        <label for=""><?php echo __('right','zgpbd_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('Right margin (px)','zgpbd_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                    </div>
                                    <div class="sfdc-col-md-6">
                                        <input  
                                                id="zgpb_fld_col_padding_right"
                                                class="zgpb_fld_settings_spinner" 
                                                data-field-store="skin-padding-right"
                                                type="text" >
                                         
                                    </div>    

                                </div>
                            </div>
                        </div>
                       <div class="space5"></div>
                    </div>
         </fieldset> 
          
          
          <fieldset>
                    <legend><?php echo __('Additional','zgpbd_admin'); ?> </legend>
                    <div class="zgpb-modal-body-tab-inner">
                       
                        <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-4">
                                        <label for=""><?php echo __('ID selector','zgpbd_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('this ID selector will be added to this field. it lets you control through css or javascript','zgpbd_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                    </div>
                                    <div class="sfdc-col-md-8">
                                      <input type="text" 
                                              data-field-store="skin-custom_css-ctm_id"
                                             id="zgpb_fld_col_ctmid" name="zgpb_fld_col_ctmid" placeholder="" class="zgpb-field-col-event-txt sfdc-form-control">
                                        
                                    </div>    

                                </div>
                            </div>
                        </div>
                        <div class="zgpb-opt-divider-stl1"></div>
                        <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-4">
                                        <label for=""><?php echo __('CSS class','zgpbd_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('this css class will be added to the field. it lets you control through css or javascript','zgpbd_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                    </div>
                                    <div class="sfdc-col-md-8">
                                      <input type="text" 
                                             data-field-store="skin-custom_css-ctm_class"
                                             id="zgpb_fld_col_ctmclass" name="zgpb_fld_col_ctmclass" placeholder="" class="zgpb-field-col-event-txt sfdc-form-control">
                                    </div>    
                                </div>
                            </div>
                        </div>
                        <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-12">
                                        <label for=""><?php echo __('Additional css','zgpbd_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('Additional css','zgpbd_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                    </div>
                                    <div class="sfdc-col-md-12">
                                      <textarea class="zgpb-field-col-event-txt  " 
                                                data-field-store="skin-custom_css-ctm_additional"
                                                style=" width:400px;height: 200px;" 
                                                name="zgpb_fld_ctmaddt" 
                                                id="zgpb_fld_ctmaddt"></textarea> 
                                    </div>    

                                </div>
                            </div>
                        </div>
                       <div class="space5"></div>
                    </div>
         </fieldset>
      </div> 
  </div>  
</div>
</div>
<script type="text/javascript">
$zgpb(function() 
	{
      
	}); 

</script>
<script type="text/javascript">
$zgpb(function($) 
	{
           $(".sfdc-input-group-btn > .sfdc-btn").click(function(){
                var element = $(this),
                    input=element.find('input');
                if(parseInt(input.val())===0){
                   element.addClass('sfdc-active');
                   input.val(1);
                }else{
                   element.removeClass('sfdc-active'); 
                   input.val(0);
                }
           }); 
    
     
            /*radio buttons groups*/
            $(".sfdc-btn-group > .sfdc-btn[data-settings-option='group-radiobutton']").click(function(){
                var element = $(this),
                    parent = element.parent();
                    parent.children(".sfdc-btn[data-toggle-enable]").removeClass(function(){
                        return $(this).data("toggle-enable")
                    }).addClass(function(){
                        return $(this).data("toggle-disable")
                    }).children("input").prop('checked', false);
                    element.removeClass($(this).data("toggle-disable")).addClass(element.data("toggle-enable"));
                    element.children("input").prop('checked', true);
                    /*if(element.children("input").is(":checked")){

                    }else{

                    }*/
            });    
        
    
	});
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