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
    <input type="hidden" id="zgpb-field-selected-block" value="<?php echo $field_block;?>">
   <!-- Nav tabs -->
<ul class="sfdc-nav sfdc-nav-tabs">
  <li class="sfdc-active"><a href="#sfdc-fields-opt-col-1" data-toggle="tab"><?php echo __('Skin','zgpbd_admin'); ?></a></li>
  <li><a href="#sfdc-fields-opt-col-2" data-toggle="tab" class="last-child"><?php echo __('More Options','zgpbd_admin'); ?></a></li>
</ul>
<!-- Tab panes -->
<div class="sfdc-tab-content">
  <div class="sfdc-tab-pane sfdc-in sfdc-active" id="sfdc-fields-opt-col-1">
      <div class="sfdc-tab-content2">
          <div id="zgpb_fld_col_style_wrapper" style="display:none;">
              
               <fieldset>
                    <legend><?php echo __('Center','zgpbd_admin'); ?> </legend>
                    <div class="zgpb-modal-body-tab-inner">
                         
                        <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-6">
                                        <label for=""><?php echo __('Enable Center position','zgpbd_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('Enable center position','zgpbd_admin'); ?>" 
                                           data-placement="right" 
                                           data-toggle="tooltip" 
                                           href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                    </div>
                                    <div class="sfdc-col-md-6">
                                         <input class="zgpb-switch-field"
                                            data-field-store="skin-align-show_st"
                                            id="zgpb_fld_col_style_st"
                                            name="zgpb_fld_col_style_st"
                                            type="checkbox"/>
                                         
                                    </div>    

                                </div>
                            </div>
                        </div>
                      
                        <div class="zgpb-opt-divider-stl1"></div>
                        <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-6">
                                        <label for=""><?php echo __('Enable Width','zgpbd_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('Enable Width','zgpbd_admin'); ?>"
                                           data-placement="right" data-toggle="tooltip" href="javascript:void(0);">
                                            <span class="fa fa-question-circle"></span></a>
                                        
                                        
                                        <!-- <input class="zgpb-switch-field"
                                            data-field-store="skin-align-max_width_st"
                                            id="zgpb_fld_col_style_maxwidth_st"
                                            name="zgpb_fld_col_style_maxwidth_st"
                                            type="checkbox"/>-->
                                    </div> 
                                    <div class="sfdc-col-md-6">
                                             <input  
                                                id="zgpb_fld_col_style_maxwidth"
                                                class="zgpb_fld_settings_spinner" 
                                                data-field-store="skin-align-max_width"
                                                type="text" >
                                          
                                    </div>    

                                </div>
                            </div>
                        </div>
                        <div class="space5"></div>
                    </div>
         </fieldset>
          
          </div>
         
          
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
                    <legend><?php echo __('Text','zgpbd_admin'); ?> </legend>
                    <div class="zgpb-modal-body-tab-inner">
                        <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-6">
                                        <label for=""><?php echo __('Color','zgpbd_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('Color for texts inner field','zgpbd_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                    </div>
                                    <div class="sfdc-col-md-6">
                                        <div 
                                            data-field-store="skin-text-color"
                                            class="sfdc-input-group zgpb-custom-color">
                                            <input type="text" value="" 
                                                   id="zgpb_fld_col_text_color" 
                                                   name="zgpb_fld_col_text_color" class="sfdc-form-control" />
                                            <span class="sfdc-input-group-addon"><i></i></span>
                                        </div>
                                        
                                         
                                    </div>    

                                </div>
                            </div>
                        </div>
                       <div class="space5"></div>
                    </div>
         </fieldset>
          
         <fieldset>
                    <legend><?php echo __('Background','zgpbd_admin'); ?> </legend>
                    <div class="zgpb-modal-body-tab-inner">
                        <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-6">
                                        <label for=""><?php echo __('Enable background','zgpbd_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('Enable background','zgpbd_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                    </div>
                                    <div class="sfdc-col-md-6">
                                           <input class="zgpb-switch-field"
                                            data-field-store="skin-background-show_st"
                                            id="zgpb_fld_col_bg_st"
                                            type="checkbox"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="zgpb-opt-divider-stl1"></div>
                        <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-6">
                                        <label for=""><?php echo __('Background type','zgpbd_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('Choose background type','zgpbd_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                    </div>
                                    <div class="sfdc-col-md-6">
                                           <div class="sfdc-controls sfdc-form-group">
                                            <div class="sfdc-btn-group sfdc-btn-group-justified"
                                                 data-toggle="buttons">
                                                <label 
                                                    data-field-store="skin-background-type"
                                                    data-field-value="1"
                                                    data-toggle-enable="sfdc-btn-warning sfdc-active"
                                                    data-toggle-disable="sfdc-btn-warning"
                                                    data-settings-option="sfdc-group-radiobutton"
                                                    id="zgpb_fld_col_bg_type_1"
                                                    class="sfdc-btn sfdc-btn-warning zgpb-col-setoption-btn" >
                                                <input type="radio"  value="1">  <?php echo __('Solid','zgpbd_admin'); ?>
                                                </label>
                                                <label 
                                                    data-field-store="skin-background-type"
                                                    data-field-value="2"
                                                    data-toggle-enable="sfdc-btn-warning sfdc-active"
                                                    data-toggle-disable="sfdc-btn-warning"
                                                    data-settings-option="sfdc-group-radiobutton"
                                                    id="zgpb_fld_col_bg_type_2"
                                                    class="sfdc-btn sfdc-btn-warning zgpb-col-setoption-btn" >
                                                <input type="radio"  value="2" checked> <?php echo __('Gradient','zgpbd_admin'); ?>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div id="zgpb_fld_col_bg_type_1_cont">
                             <div class="zgpb-opt-divider-stl1"></div>
                            <div class="sfdc-row ">
                               <div class="sfdc-col-md-12">
                                   <div class="sfdc-form-group">
                                       <div class="sfdc-col-md-6">
                                           <label for=""><?php echo __('Color','zgpbd_admin'); ?></label> 
                                           <a data-original-title="<?php echo __('Color for background','zgpbd_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                       </div>
                                       <div class="sfdc-col-md-6">
                                           <div 
                                               data-field-store="skin-background-cl_solid_color"
                                               class="sfdc-input-group zgpb-custom-color">
                                               <input type="text" value="" 
                                                      id="zgpb_fld_col_bg_clsolidcolor" 
                                                      name="zgpb_fld_col_bg_clsolidcolor" class="sfdc-form-control" />
                                               <span class="sfdc-input-group-addon"><i></i></span>
                                           </div>


                                       </div>    

                                   </div>
                               </div>
                           </div>
                         </div>
                         
                         <div id="zgpb_fld_col_bg_type_2_cont">
                            <div class="zgpb-opt-divider-stl1"></div>
                            <div class="sfdc-row ">
                               <div class="sfdc-col-md-12">
                                   <div class="sfdc-form-group">
                                       <div class="sfdc-col-md-6">
                                           <label for=""><?php echo __('Start color','zgpbd_admin'); ?></label> 
                                           <a data-original-title="<?php echo __('Start color for background','zgpbd_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                       </div>
                                       <div class="sfdc-col-md-6">
                                           <div 
                                               data-field-store="skin-background-cl_start_color"
                                               class="sfdc-input-group zgpb-custom-color">
                                               <input type="text" value="" 
                                                      id="zgpb_fld_col_bg_clstartcolor" 
                                                      name="zgpb_fld_col_bg_clstartcolor" class="sfdc-form-control" />
                                               <span class="sfdc-input-group-addon"><i></i></span>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                         
                         
                         <div class="zgpb-opt-divider-stl1"></div>
                         <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-6">
                                        <label for=""><?php echo __('End color','zgpbd_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('End color for background','zgpbd_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                    </div>
                                    <div class="sfdc-col-md-6">
                                        <div 
                                            data-field-store="skin-background-cl_end_color"
                                            class="sfdc-input-group zgpb-custom-color">
                                            <input type="text" value="" 
                                                   id="zgpb_fld_col_bg_clendcolor" 
                                                   name="zgpb_fld_col_bg_clendcolor" class="sfdc-form-control" />
                                            <span class="sfdc-input-group-addon"><i></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         </div>
                         
                          <div class="zgpb-opt-divider-stl1"></div>
                         <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-6">
                                        <label for=""><?php echo __('Image','zgpbd_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('Background image','zgpbd_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                    </div>
                                    <div class="sfdc-col-md-6">
                                        <div class="sfdc-form-group">
                                            <div class="zgpb_fld_col_bg_thumbnail" id="zgpb_fld_col_bg_srcimg_wrap">
                                                
                                            </div>
                                            <input 
                                                name="zgpb_fld_col_bg_imgsource" 
                                                id="zgpb_fld_col_bg_imgsource" 
                                                value=""                                                
                                                type="hidden">
                                                <input 
                                                    data-field-store="skin-background-img_source"
                                                    id="zgpb_fld_col_bg_imgsourcebtnadd" 
                                                    value="<?php echo __('Update Image','zgpbd_admin');?>" 
                                                    class="sfdc-btn sfdc-btn-default" 
                                                    type="button">
                                                <a href="javascript:void(0);"
                                                   onclick="javascript:zgpb_core.modal_editfield_col_bg_delimg();"
                                                   class="sfdc-btn sfdc-btn-default"
                                                   >
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       <div class="zgpb-opt-divider-stl1"></div>
                         <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-6">
                                        <label for=""><?php echo __('Size','zgpbd_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('Background size','zgpbd_admin'); ?>"
                                           data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span>
                                        </a>
                                    </div>
                                    <div class="sfdc-col-md-6">
                                        <div class="sfdc-form-group">
                                           <select 
                                                data-field-store="skin-background-img_size_type"
                                                id="zgpb_fld_col_bg_sizetype"
                                                name="zgpb_fld_col_bg_sizetype"
                                                class="sfdc-form-control zgpb-f-setoption">
                                                    <option value="0">auto</option>
                                                    <option value="1">length</option>
                                                    <option value="2">percentage</option>
                                                    <option value="3">cover</option>
                                                    <option value="4">contain</option>
                                                    <option value="5">initial</option>
                                                    <option value="6">inherit</option>
                                                   
                                            </select> 
                                            
                                            <div id="zgpb_fld_col_bg_sizetype_len_wrap">
                                                <div class="space10"></div>
                                                <input type="text" class="sfdc-form-control zgpb-f-setoption" 
                                                 name="zgpb_fld_col_bg_sizetype_len" 
                                                 id="zgpb_fld_col_bg_sizetype_len" 
                                                 data-field-store="skin-background-img_size_len">
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="zgpb-opt-divider-stl1"></div>
                         <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-6">
                                        <label for=""><?php echo __('Repeat','zgpbd_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('Background repeat','zgpbd_admin'); ?>"
                                           data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span>
                                        </a>
                                    </div>
                                    <div class="sfdc-col-md-6">
                                        <div class="sfdc-form-group">
                                           <select 
                                                data-field-store="skin-background-img_repeat"
                                                id="zgpb_fld_col_bg_repeat"
                                                name="zgpb_fld_col_bg_repeat"
                                                class="sfdc-form-control zgpb-f-setoption">
                                                    <option value="0">repeat</option>
                                                    <option value="1">repeat-x</option>
                                                    <option value="2">repeat-y</option>
                                                    <option value="3">no-repeat</option>
                                                    <option value="4">initial</option>
                                                    <option value="5">inherit</option>
                                            </select> 
                                             
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="zgpb-opt-divider-stl1"></div>
                         <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-6">
                                        <label for=""><?php echo __('Position','zgpbd_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('Background position','zgpbd_admin'); ?>"
                                           data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span>
                                        </a>
                                    </div>
                                    <div class="sfdc-col-md-6">
                                        <div class="sfdc-form-group">
                                           <input type="text" class="sfdc-form-control zgpb-f-setoption" 
                                                 name="zgpb_fld_col_bg_pos" 
                                                 id="zgpb_fld_col_bg_pos" 
                                                 data-field-store="skin-background-img_position">
                                             
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       <div class="space5"></div>
                       
                    </div>
         </fieldset> 
          
           <fieldset>
                    <legend><?php echo __('Border','zgpbd_admin'); ?> </legend>
                    <div class="zgpb-modal-body-tab-inner">
                        <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-6">
                                        <label for=""><?php echo __('Enable Border','zgpbd_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('Enable border','zgpbd_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                    </div>
                                    <div class="sfdc-col-md-6">
                                        <input class="zgpb-switch-field"
                                            data-field-store="skin-border-show_st"
                                            id="zgpb_fld_col_border_st"
                                            type="checkbox"/>
                                    </div>    

                                </div>
                            </div>
                        </div>
                        <div class="zgpb-opt-divider-stl1"></div>
                           <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-6">
                                        <label for=""><?php echo __('Color','zgpbd_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('Color for border','zgpbd_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                    </div>
                                    <div class="sfdc-col-md-6">
                                        <div 
                                            data-field-store="skin-border-color"
                                            class="sfdc-input-group zgpb-custom-color">
                                            <input type="text" value="" 
                                                   id="zgpb_fld_col_border_color" 
                                                   name="zgpb_fld_col_border_color" class="sfdc-form-control" />
                                            <span class="sfdc-input-group-addon"><i></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="zgpb-opt-divider-stl1"></div>
                          <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-6">
                                        <label for=""><?php echo __('Border type','zgpbd_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('Choose border type','zgpbd_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                    </div>
                                    <div class="sfdc-col-md-6">
                                           <div class="sfdc-controls sfdc-form-group">
                                            <div class="sfdc-btn-group sfdc-btn-group-justified"
                                                 data-toggle="buttons">
                                                <label 
                                                    data-field-store="skin-border-type"
                                                    data-field-value="1"
                                                    data-toggle-enable="sfdc-btn-warning sfdc-active"
                                                    data-toggle-disable="sfdc-btn-warning"
                                                    data-settings-option="sfdc-group-radiobutton"
                                                    id="zgpb_fld_col_border_type_1"
                                                    class="sfdc-btn sfdc-btn-warning zgpb-col-setoption-btn" >
                                                <input type="radio"  value="1">  <?php echo __('Solid','zgpbd_admin'); ?>
                                                </label>
                                                <label 
                                                    data-field-store="skin-border-type"
                                                    data-field-value="2"
                                                    data-toggle-enable="sfdc-btn-warning sfdc-active"
                                                    data-toggle-disable="sfdc-btn-warning"
                                                    data-settings-option="sfdc-group-radiobutton"
                                                    id="zgpb_fld_col_border_type_2"
                                                    class="sfdc-btn sfdc-btn-warning zgpb-col-setoption-btn" >
                                                <input type="radio"  value="2" checked> <?php echo __('Dotted','zgpbd_admin'); ?>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="zgpb-opt-divider-stl1"></div>
                        <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-6">
                                        <label for=""><?php echo __('Width','zgpbd_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('Border width','zgpbd_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                    </div>
                                    <div class="sfdc-col-md-6">
                                        <input type="text" style="width:100%;"
                                        data-field-store="skin-border-width"
                                        data-slider-value="14"
                                        data-slider-step="1"
                                        data-slider-max="60"
                                        data-slider-min="0" 
                                        data-slider-id="" 
                                        id="zgpb_fld_col_border_width" 
                                        class="zgpb-custom-slider"> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                       <div class="space5"></div>
                    </div>
         </fieldset>
           <fieldset>
                    <legend><?php echo __('Border radius','zgpbd_admin'); ?> </legend>
                    <div class="zgpb-modal-body-tab-inner">
                        <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-6">
                                        <label for=""><?php echo __('Enable border radius','zgpbd_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('Enable border radius','zgpbd_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                    </div>
                                    <div class="sfdc-col-md-6">
                                          <input class="zgpb-switch-field"
                                            data-field-store="skin-border_radius-show_st"
                                            id="zgpb_fld_col_bradius_st"
                                            type="checkbox"/>
                                    </div>    

                                </div>
                            </div>
                        </div>
                        <div class="zgpb-opt-divider-stl1"></div>
                         <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-6">
                                        <label for=""><?php echo __('Size','zgpbd_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('Drag the slider to increase the size of border radius','zgpbd_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                    </div>
                                    <div class="sfdc-col-md-6">
                                        <input type="text" style="width:100%;"
                                        data-field-store="skin-border_radius-size"
                                        data-slider-value="14"
                                        data-slider-step="1"
                                        data-slider-max="60"
                                        data-slider-min="0" 
                                        data-slider-id="" 
                                        id="zgpb_fld_col_bradius_size" 
                                        class="zgpb-custom-slider"> 
                                         
                                    </div>    

                                </div>
                            </div>
                        </div>
                       <div class="space5"></div>
                    </div>
         </fieldset>
            <fieldset>
                    <legend><?php echo __('Shadow','zgpbd_admin'); ?> </legend>
                    <div class="zgpb-modal-body-tab-inner">
                        <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-6">
                                        <label for=""><?php echo __('Enable shadow','zgpbd_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('Enable shadow','zgpbd_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                    </div>
                                    <div class="sfdc-col-md-6">
                                          <input class="zgpb-switch-field"
                                            data-field-store="skin-shadow-show_st"
                                            id="zgpb_fld_col_shadow_st"
                                            type="checkbox"/>
                                    </div>    

                                </div>
                            </div>
                        </div>
                        <div class="zgpb-opt-divider-stl1"></div>
                         <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-6">
                                        <label for=""><?php echo __('Color','zgpbd_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('Shadow color','zgpbd_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                    </div>
                                    <div class="sfdc-col-md-6">
                                         <div 
                                            data-field-store="skin-shadow-color"
                                            class="sfdc-input-group zgpb-custom-color">
                                            <input type="text" value="" 
                                                   id="zgpb_fld_col_shadow_color" 
                                                   name="zgpb_fld_col_shadow_color" class="sfdc-form-control" />
                                            <span class="sfdc-input-group-addon"><i></i></span>
                                        </div>
                                    </div>    

                                </div>
                            </div>
                        </div>
                        
                        <div class="zgpb-opt-divider-stl1"></div>
                          <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-6">
                                        <label for=""><?php echo __('Horizontal','zgpbd_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('Drag the slider to modify horizontal value','zgpbd_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                    </div>
                                    <div class="sfdc-col-md-6">
                                        <input type="text" style="width:100%;"
                                        data-field-store="skin-shadow-h_shadow"
                                        data-slider-value="14"
                                        data-slider-step="1"
                                        data-slider-max="60"
                                        data-slider-min="0" 
                                        data-slider-id="" 
                                        id="zgpb_fld_col_shadow_h" 
                                        class="zgpb-custom-slider"> 
                                         
                                    </div>    

                                </div>
                            </div>
                        </div>
                         <div class="zgpb-opt-divider-stl1"></div>
                          <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-6">
                                        <label for=""><?php echo __('Vertical','zgpbd_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('Drag the slider to modify vertical value','zgpbd_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                    </div>
                                    <div class="sfdc-col-md-6">
                                        <input type="text" style="width:100%;"
                                        data-field-store="skin-shadow-v_shadow"
                                        data-slider-value="14"
                                        data-slider-step="1"
                                        data-slider-max="60"
                                        data-slider-min="0" 
                                        data-slider-id="" 
                                        id="zgpb_fld_col_shadow_v" 
                                        class="zgpb-custom-slider"> 
                                         
                                    </div>    

                                </div>
                            </div>
                        </div>
                          <div class="zgpb-opt-divider-stl1"></div>
                          <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-6">
                                        <label for=""><?php echo __('Blur','zgpbd_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('Drag the slider to modify blur value','zgpbd_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                    </div>
                                    <div class="sfdc-col-md-6">
                                        <input type="text" style="width:100%;"
                                        data-field-store="skin-shadow-blur"
                                        data-slider-value="14"
                                        data-slider-step="1"
                                        data-slider-max="60"
                                        data-slider-min="0" 
                                        data-slider-id="" 
                                        id="zgpb_fld_col_shadow_blur" 
                                        class="zgpb-custom-slider"> 
                                         
                                    </div>    

                                </div>
                            </div>
                        </div>
                       <div class="space5"></div>
                    </div>
         </fieldset>
      </div>
  </div>
 <div class="sfdc-tab-pane " id="sfdc-fields-opt-col-2">
      <div class="sfdc-tab-content2">
          <fieldset>
                    <legend><?php echo __('Additional','zgpbd_admin'); ?> </legend>
                    <div class="zgpb-modal-body-tab-inner">
                       
                        <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-6">
                                        <label for=""><?php echo __('ID selector','zgpbd_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('ID selector let you control through css or javascript','zgpbd_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                    </div>
                                    <div class="sfdc-col-md-6">
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
                                    <div class="sfdc-col-md-6">
                                        <label for=""><?php echo __('CSS class','zgpbd_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('CSS class let you control through css or javascript','zgpbd_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                    </div>
                                    <div class="sfdc-col-md-6">
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
                                    <div class="sfdc-col-md-6">
                                        <label for=""><?php echo __('Additional css','zgpbd_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('Additional css','zgpbd_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                    </div>
                                    <div class="sfdc-col-md-6">
                                      <textarea class="zgpb-field-col-event-txt sfdc-form-control " 
                                                data-field-store="skin-custom_css-ctm_additional"
                                                style="width: 100%; height: 200px;" name="zgpb_fld_ctmaddt" id="zgpb_fld_ctmaddt"></textarea> 
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
$zgpb(function($) 
	{
            $("#zgpb_fld_col_bg_type_1").on("click", function() {
                
               $('#zgpb_fld_col_bg_type_1_cont').show();
               $('#zgpb_fld_col_bg_type_2_cont').hide();
                
            });
            
            $("#zgpb_fld_col_bg_type_2").on("click", function() {
                
               $('#zgpb_fld_col_bg_type_1_cont').hide();
               $('#zgpb_fld_col_bg_type_2_cont').show();
                
            });
            
            $("#zgpb_fld_col_bg_sizetype").on("click", function () {
                var sVal = $(this).val();
                if(parseInt(sVal)===1 || parseInt(sVal)===2){
                     $('#zgpb_fld_col_bg_sizetype_len_wrap').show();
                 }else{
                     $('#zgpb_fld_col_bg_sizetype_len_wrap').hide();
                 }
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