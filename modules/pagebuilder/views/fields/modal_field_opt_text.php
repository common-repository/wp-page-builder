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
                    <legend><?php echo __('Text editor','zgpbd_admin'); ?> </legend>
                    <div class="zgpb-modal-body-tab-inner">
                       
                        <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-12">
                                        
                                        <a data-original-title="<?php echo __('your content','zgpbd_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                    </div>
                                    <div class="sfdc-col-md-12">
                                      <div class="controls form-group">
                                            <?php
                                            /*pending add this tinymce*/
                                             $settings = array( 'media_buttons' => true,'textarea_rows'=>5,'wpautop'=> true);
                                                wp_editor('', 'zgpb_fld_text_inp_txt',$settings );
                                             
                                                
                                            ?>
                                        </div>
                                    </div>    

                                </div>
                            </div>
                        </div>
                        
                       <div class="space5"></div>
                    </div>
         </fieldset>
                <fieldset>
                    <legend><?php echo __('other options','zgpbd_admin'); ?> </legend>
                    <div class="zgpb-modal-body-tab-inner">
                       <div class="space5"></div>
                        <div class="sfdc-row ">
                            
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-5">
                                        <div class="sfdc-form-group">
                                        <label for=""><?php echo __('Format','zgpbd_admin'); ?></label>
                                        <div class="sfdc-input-group">
                                            <select 
                                                data-field-store="input1-size"
                                                id="zgpb_fld_text_inp_size"
                                                name="zgpb_fld_text_inp_size"
                                                class="sfdc-form-control zgpb-f-setoption">
                                                <?php 
                                                    for ($i = 8; $i <= 48; $i++) {
                                                    ?>
                                                    <option value="<?php echo $i;?>"><?php echo $i.' px';?></option>
                                                    <?php    
                                                    }
                                                    ?>
                                            </select>
                                            <div class="sfdc-input-group-btn">
                                                <button data-field-store="input1-bold"
                                                    class="sfdc-btn sfdc-btn-warning zgpb-f-setoption-btn"
                                                    type="button">
                                                    <i class="fa fa-bold"></i>
                                                    <input type="hidden" id="zgpb_fld_text_inp_bold"  value="0">
                                                </button>
                                                <button  data-field-store="input1-italic"
                                                    class="sfdc-btn sfdc-btn-warning zgpb-f-setoption-btn"
                                                        type="button"><i class="fa fa-italic"></i>
                                                    <input type="hidden" id="zgpb_fld_text_inp_italic"   value="0">
                                                </button>
                                                <button  data-field-store="input1-underline"
                                                    class="sfdc-btn sfdc-btn-warning zgpb-f-setoption-btn"
                                                        type="button"><i class="fa fa-underline"></i>
                                                    <input type="hidden" id="zgpb_fld_text_inp_u"  value="0">
                                                </button>
                                            </div>

                                        </div>

                                    </div>
                                    </div>
                                    <div class="sfdc-col-md-7">
                                            <div class="form-group">
                                              <label ><?php echo __('Font family','zgpbd_admin'); ?></label>
                                              
                                                <div class="zgpb-input-group-2 zgpb-input-group-2-font">
                                       <div class="zgpb-input-group-col1">
                                            <div class="input-group uifm-custom-font">
                                                  <?php 
                                                  $attributes = array(
                                                      'name' => 'zgpb_fld_text_inp_font',
                                                      'id' => 'zgpb_fld_text_inp_font',
                                                      'data-field-store'=>'input1-font'
                                                      );
                                                  $default_value = '{"family":"Arial, Helvetica, sans-serif","name":"Arial","classname":"arial"}';
                                                  ?>
                                                  <?php do_action( 'styles_font_menu',$attributes,$default_value); ?>
                                                  

                                              </div>
                                       
                                        </div>
                                       <div class="zgpb-input-group-col2">
                                            <div class="sfdc-input-group"> 
                                                <span class="sfdc-input-group-addon">
                                                  <input 
                                                      data-field-store="input1-font_st"
                                                      id="zgpb_fld_text_inp_font_st"
                                                      name="zgpb_fld_text_inp_font_st"
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
                       
                        <div class="sfdc-row ">
                            <div class="sfdc-col-md-6">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-12" style="padding-left: 0px;">
                                        <label for=""><?php echo __('Color','zgpbd_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('Color for text','zgpbd_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                    </div>
                                    <div class="sfdc-col-md-12">
                                        <div 
                                            data-field-store="input1-color"
                                            class="sfdc-input-group zgpb-custom-color">
                                            <input type="text" value="" 
                                                   placeholder="<?php echo __('Pick the color','zgpbd_admin'); ?>"
                                                   id="zgpb_fld_text_inp_color" 
                                                   name="zgpb_fld_text_inp_color" class="sfdc-form-control" />
                                            <span class="sfdc-input-group-addon"><i></i></span>
                                        </div>
                                    </div>    

                                </div>
                            </div>
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
                             <div class="zgpb-opt-divider-stl1"></div>
                        <div class="space10"></div>
                         <div class="sfdc-row ">
                            <div class="sfdc-col-md-8">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-6">
                                        <label for=""><?php echo __('Text align','zgpbd_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('Text align','zgpbd_admin'); ?>"
                                           data-placement="right" 
                                           data-toggle="tooltip" 
                                           href="javascript:void(0);"><span class="fa fa-question-circle"></span>
                                        </a>
                                    </div>
                                    <div class="sfdc-col-md-6">
                                        <div class="sfdc-form-group">
                                           <select 
                                                data-field-store="input1-text_align"
                                                id="zgpb_fld_text_inp_textalign"
                                                name="zgpb_fld_text_inp_textalign"
                                                class="sfdc-form-control zgpb-f-setoption">
                                                    <option value="0">left</option>
                                                    <option value="1">right</option>
                                                    <option value="2">center</option>
                                                    <option value="3">justify</option>
                                                    <option value="4">initial</option>
                                                    <option value="5">inherit</option>
                                            </select> 
                                             
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       <div class="zgpb-opt-divider-stl1"></div>
                             <div class="space15"></div>
                               <div class="sfdc-row">
                                        <div class="sfdc-col-md-12">
                                            <label ><?php echo __('Text container alignment','zgpbd_admin'); ?></label>
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
                       <div class="space5"></div>
                        <div class="sfdc-row">
        <div class="sfdc-col-md-12">
            <div class="sfdc-form-group">
                    <label ><?php echo __('Text Shadow','zgpbd_admin'); ?></label>
                    <div class="">
                        <div class="sfdc-col-md-3">
                            <input class="zgpb-switch-field"
                                   data-field-store="input1-shadow_st"
                                   id="zgpb_fld_text_inp_shadow_st"
                                   name="zgpb_fld_text_inp_shadow_st"
                                   type="checkbox"/>
                        </div>
                        <div class="sfdc-col-md-9">
                            <div class="sfdc-row">
                                <div class="sfdc-col-md-3">
                                   <label ><?php echo __('Color','zgpbd_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-9">
                                       
                                            <div  data-field-store="input1-shadow_color"  
                                                  class="sfdc-input-group zgpb-custom-color">
                                                
                                                <input  placeholder="<?php echo __('Pick the color','zgpbd_admin'); ?>"
                                                        type="text"
                                                        value=""
                                                        id="zgpb_fld_text_inp_shadow_color"
                                                        name="zgpb_fld_text_inp_shadow_color"
                                                        class="sfdc-form-control" />
                                                <span class="sfdc-input-group-addon"><i></i></span>
                                            </div>
                                        
                                    </div>
                            </div>
                            <div class="zgpb-opt-divider-stl1"></div>
                            <div class="space15"></div>
                           <div class="sfdc-row">
                                <div class="sfdc-col-md-3">
                                   <label ><?php echo __('horizontal','zgpbd_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-9">
                                      <input type="text" style="width:100%;"
                                             data-field-store="input1-shadow_x"
                                        id="zgpb_fld_text_inp_shadow_x"
                                        name="zgpb_fld_text_inp_shadow_x"      
                                        data-slider-step="1"
                                        data-slider-max="30"
                                        data-slider-min="0"
                                        data-slider-id="" 
                                        class="zgpb-custom-slider">
                                    </div>
                            </div>
                          <div class="zgpb-opt-divider-stl1"></div>
                          <div class="space15"></div>
                            <div class="sfdc-row">
                                <div class="sfdc-col-md-3">
                                   <label ><?php echo __('vertical','zgpbd_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-9">
                                      <input type="text"
                                           data-field-store="input1-shadow_y"
                                             style="width:100%;"
                                        id="zgpb_fld_text_inp_shadow_y"
                                        name="zgpb_fld_text_inp_shadow_y" 
                                        data-slider-step="1"
                                        data-slider-max="30"
                                        data-slider-min="0" 
                                        data-slider-id="" 
                                        class="zgpb-custom-slider">
                                    </div>
                            </div>
                            <div class="zgpb-opt-divider-stl1"></div>
                             <div class="space15"></div>
                            <div class="sfdc-row">
                                <div class="sfdc-col-md-3">
                                   <label ><?php echo __('blur','zgpbd_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-9">
                                      <input type="text"
                                        data-field-store="input1-shadow_blur"     
                                             style="width:100%;"
                                        id="zgpb_fld_text_inp_shadow_blur"
                                        name="zgpb_fld_text_inp_shadow_blur"
                                        data-slider-step="1"
                                        data-slider-max="30"
                                        data-slider-min="0" data-slider-id="" class="zgpb-custom-slider">
                                    </div>
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
jQuery(function($) 
	{
        $('#zgpb-modal1').find('select.sfm').change( function(){
            var font_sel=$(this).data('stylesFontMenu').uifm_preview_font_change();
            var f_store=$( this ).data('field-store');
            var f_val=JSON.stringify(font_sel);
            zgpb_core.updateModalFieldCoreAndPreview(f_store,f_val);
        });
        
        
       
        
	}); 
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