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
                                        <label for=""><?php echo __('Title','zgpbd_admin'); ?>
                                        <a data-original-title="<?php echo __('your content','zgpbd_admin'); ?>" 
                                           data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                        </label>
                                        
                                    </div>
                                    <div class="sfdc-col-md-12">
                                      <div class="sfdc-controls sfdc-form-group">
                                          <input type="text" class="sfdc-form-control zgpb-f-setoption" 
                                                 name="zgpb_fld_text_inp_txt" 
                                                 id="zgpb_fld_text_inp_txt" 
                                                 data-field-store="input1-text" style="">
                                           
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
                                        <label for=""><?php echo __('Url','zgpbd_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('Url to the button','zgpbd_admin'); ?>"
                                           data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span>
                                        </a>
                                    </div>
                                    <div class="sfdc-col-md-6">
                                        <div class="sfdc-form-group">
                                           <input type="text" class="sfdc-form-control zgpb-f-setoption" 
                                                 name="zgpb_fld_text_inp_href" 
                                                 id="zgpb_fld_text_inp_href" 
                                                 data-field-store="input1-a_href">
                                             
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
                                        <label for=""><?php echo __('Target','zgpbd_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('Url target','zgpbd_admin'); ?>"
                                           data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span>
                                        </a>
                                    </div>
                                    <div class="sfdc-col-md-6">
                                        <div class="sfdc-form-group">
                                           <select 
                                                data-field-store="input1-a_target"
                                                id="zgpb_fld_text_inp_target"
                                                name="zgpb_fld_text_inp_target"
                                                class="sfdc-form-control zgpb-f-setoption">
                                                    <option value="0">blank</option>
                                                    <option value="1">parent</option>
                                                    <option value="2">self</option>
                                                    <option value="3">top</option>
                                            </select> 
                                             
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
                                                <option value="0">-<?php echo __('none','zgpbd_admin'); ?>-</option>
                                                <?php 
                                                    for ($i = 1; $i <= 48; $i++) {
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
                                                  <span class="input-group-addon">
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
                           <div class="sfdc-row ">
                            <div class="sfdc-col-md-12">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-2" style="padding-left: 0px;">
                                        <label for=""><?php echo __('Color','zgpbd_admin'); ?></label> 
                                        <a data-original-title="<?php echo __('Color for text','zgpbd_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a>
                                    </div>
                                    <div class="sfdc-col-md-7">
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
                        </div>
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
        <div class="zgpb-opt-divider-stl1"></div>
                             <div class="space15"></div>
                               <div class="sfdc-row">
                                        <div class="sfdc-col-md-12">
                                            <label ><?php echo __('Text alignment','zgpbd_admin'); ?></label>
                                            <div class="sfdc-controls sfdc-form-group">
                                                <div class="sfdc-btn-group sfdc-btn-group-justified" data-toggle="buttons">
                                                    <label 
                                                        data-field-store="input1-val_align"
                                                        data-toggle-enable="sfdc-btn-success sfdc-active"
                                                        data-toggle-disable="sfdc-btn-success"
                                                        data-settings-option="group-radiobutton"
                                                        class="sfdc-btn sfdc-btn-success zgpb-f-setoption-btn" >
                                                    <input type="radio" 
                                                        id="zgpb_fld_text_inp_valalign_1"
                                                        name="zgpb_fld_text_inp_valalign_1" value="0"> <i class="fa fa-align-left"></i> <?php echo __('Left','zgpbd_admin'); ?>
                                                    </label>
                                                    <label 
                                                        data-field-store="input1-val_align"
                                                        data-toggle-enable="sfdc-btn-success sfdc-active"
                                                        data-toggle-disable="sfdc-btn-success"
                                                        data-settings-option="group-radiobutton"
                                                        class="sfdc-btn sfdc-btn-success zgpb-f-setoption-btn" >
                                                    <input type="radio" 
                                                        id="zgpb_fld_text_inp_valalign_2"
                                                        name="zgpb_fld_text_inp_valalign_2" value="1"> <i class="fa fa-align-center"></i> <?php echo __('Center','zgpbd_admin'); ?>
                                                    </label>
                                                    <label 
                                                        data-field-store="input1-val_align"
                                                        data-toggle-enable="sfdc-btn-success sfdc-active"
                                                        data-toggle-disable="sfdc-btn-success"
                                                        data-settings-option="group-radiobutton"
                                                        class="sfdc-btn sfdc-btn-success zgpb-f-setoption-btn" >
                                                    <input type="radio" 
                                                        id="zgpb_fld_text_inp_valalign_3" 
                                                        name="zgpb_fld_text_inp_valalign_3" value="2"> <i class="fa fa-align-right"></i> <?php echo __('Right','zgpbd_admin'); ?>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                          <div class="zgpb-opt-divider-stl1"></div>
                             <div class="space15"></div>
                               <div class="sfdc-row">
                                        <div class="sfdc-col-md-12">
                                            <label ><?php echo __('Button alignment','zgpbd_admin'); ?></label>
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
                                            data-field-store="el_background-show_st"
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
                                                    data-field-store="el_background-type"
                                                    data-field-value="1"
                                                    data-toggle-enable="sfdc-btn-warning sfdc-active"
                                                    data-toggle-disable="sfdc-btn-warning"
                                                    data-settings-option="sfdc-group-radiobutton"
                                                    id="zgpb_fld_col_bg_type_1"
                                                    class="sfdc-btn sfdc-btn-warning zgpb-col-setoption-btn" >
                                                <input type="radio"  value="1">  <?php echo __('Solid','zgpbd_admin'); ?>
                                                </label>
                                                <label 
                                                    data-field-store="el_background-type"
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
                                               data-field-store="el_background-cl_solid_color"
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
                                               data-field-store="el_background-cl_start_color"
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
                                            data-field-store="el_background-cl_end_color"
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
                                                    data-field-store="el_background-img_source"
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
                                                data-field-store="el_background-img_size_type"
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
                                                 data-field-store="el_background-img_size_len">
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
                                                data-field-store="el_background-img_repeat"
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
                                                 data-field-store="el_background-img_position">
                                             
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       <div class="space5"></div>
                       
                    </div>
         </fieldset> 
           <fieldset>
                    <legend><?php echo __('Background Hover','zgpbd_admin'); ?> </legend>
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
                                            data-field-store="el_background2-show_st"
                                            id="zgpb_fld_col_bg2_st"
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
                                                    data-field-store="el_background2-type"
                                                    data-field-value="1"
                                                    data-toggle-enable="sfdc-btn-warning sfdc-active"
                                                    data-toggle-disable="sfdc-btn-warning"
                                                    data-settings-option="sfdc-group-radiobutton"
                                                    id="zgpb_fld_col_bg2_type_1"
                                                    class="sfdc-btn sfdc-btn-warning zgpb-col-setoption-btn" >
                                                <input type="radio"  value="1">  <?php echo __('Solid','zgpbd_admin'); ?>
                                                </label>
                                                <label 
                                                    data-field-store="el_background2-type"
                                                    data-field-value="2"
                                                    data-toggle-enable="sfdc-btn-warning sfdc-active"
                                                    data-toggle-disable="sfdc-btn-warning"
                                                    data-settings-option="sfdc-group-radiobutton"
                                                    id="zgpb_fld_col_bg2_type_2"
                                                    class="sfdc-btn sfdc-btn-warning zgpb-col-setoption-btn" >
                                                <input type="radio"  value="2" checked> <?php echo __('Gradient','zgpbd_admin'); ?>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div id="zgpb_fld_col_bg2_type_1_cont">
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
                                               data-field-store="el_background2-cl_solid_color"
                                               class="sfdc-input-group zgpb-custom-color">
                                               <input type="text" value="" 
                                                      id="zgpb_fld_col_bg2_clsolidcolor" 
                                                      name="zgpb_fld_col_bg2_clsolidcolor" class="sfdc-form-control" />
                                               <span class="sfdc-input-group-addon"><i></i></span>
                                           </div>


                                       </div>    

                                   </div>
                               </div>
                           </div>
                         </div>
                         
                         <div id="zgpb_fld_col_bg2_type_2_cont">
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
                                               data-field-store="el_background2-cl_start_color"
                                               class="sfdc-input-group zgpb-custom-color">
                                               <input type="text" value="" 
                                                      id="zgpb_fld_col_bg2_clstartcolor" 
                                                      name="zgpb_fld_col_bg2_clstartcolor" class="sfdc-form-control" />
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
                                            data-field-store="el_background2-cl_end_color"
                                            class="sfdc-input-group zgpb-custom-color">
                                            <input type="text" value="" 
                                                   id="zgpb_fld_col_bg2_clendcolor" 
                                                   name="zgpb_fld_col_bg2_clendcolor" class="sfdc-form-control" />
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
                                                name="zgpb_fld_col_bg2_imgsource" 
                                                id="zgpb_fld_col_bg2_imgsource" 
                                                value=""                                                
                                                type="hidden">
                                                <input 
                                                    data-field-store="el_background2-img_source"
                                                    id="zgpb_fld_col_bg_imgsourcebtnadd" 
                                                    value="<?php echo __('Update Image','zgpbd_admin');?>" 
                                                    class="sfdc-btn sfdc-btn-default" 
                                                    type="button">
                                                <a href="javascript:void(0);"
                                                   onclick="javascript:zgpb_core.modal_editfield_col_bg2_delimg();"
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
                                                data-field-store="el_background2-img_size_type"
                                                id="zgpb_fld_col_bg2_sizetype"
                                                name="zgpb_fld_col_bg2_sizetype"
                                                class="sfdc-form-control zgpb-f-setoption">
                                                    <option value="0">auto</option>
                                                    <option value="1">length</option>
                                                    <option value="2">percentage</option>
                                                    <option value="3">cover</option>
                                                    <option value="4">contain</option>
                                                    <option value="5">initial</option>
                                                    <option value="6">inherit</option>
                                                   
                                            </select> 
                                            
                                            <div id="zgpb_fld_col_bg2_sizetype_len_wrap">
                                                <div class="space10"></div>
                                                <input type="text" class="sfdc-form-control zgpb-f-setoption" 
                                                 name="zgpb_fld_col_bg2_sizetype_len" 
                                                 id="zgpb_fld_col_bg2_sizetype_len" 
                                                 data-field-store="el_background2-img_size_len">
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
                                                data-field-store="el_background2-img_repeat"
                                                id="zgpb_fld_col_bg2_repeat"
                                                name="zgpb_fld_col_bg2_repeat"
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
                                                 name="zgpb_fld_col_bg2_pos" 
                                                 id="zgpb_fld_col_bg2_pos" 
                                                 data-field-store="el_background2-img_position">
                                             
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
                                            data-field-store="el_border-show_st"
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
                                            data-field-store="el_border-color"
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
                                                    data-field-store="el_border-type"
                                                    data-field-value="1"
                                                    data-toggle-enable="sfdc-btn-warning sfdc-active"
                                                    data-toggle-disable="sfdc-btn-warning"
                                                    data-settings-option="sfdc-group-radiobutton"
                                                    id="zgpb_fld_col_border_type_1"
                                                    class="sfdc-btn sfdc-btn-warning zgpb-col-setoption-btn" >
                                                <input type="radio"  value="1">  <?php echo __('Solid','zgpbd_admin'); ?>
                                                </label>
                                                <label 
                                                    data-field-store="el_border-type"
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
                                        data-field-store="el_border-width"
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
                                            data-field-store="el_border_radius-show_st"
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
                                        data-field-store="el_border_radius-size"
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
                                            data-field-store="el_shadow-show_st"
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
                                            data-field-store="el_shadow-color"
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
                                        data-field-store="el_shadow-h_shadow"
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
                                        data-field-store="el_shadow-v_shadow"
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
                                        data-field-store="el_shadow-blur"
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
                                                id="zgpb_fld_col_elpadding_top"
                                                class="zgpb_fld_settings_spinner" 
                                                data-field-store="el_padding-top"
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
                                                id="zgpb_fld_col_elpadding_bottom"
                                                class="zgpb_fld_settings_spinner" 
                                                data-field-store="el_padding-bottom"
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
                                                id="zgpb_fld_col_elpadding_left"
                                                class="zgpb_fld_settings_spinner" 
                                                data-field-store="el_padding-left"
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
                                                id="zgpb_fld_col_elpadding_right"
                                                class="zgpb_fld_settings_spinner" 
                                                data-field-store="el_padding-right"
                                                type="text" >
                                         
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
            
            /*bg hover*/
            
            $("#zgpb_fld_col_bg2_type_1").on("click", function() {
                
               $('#zgpb_fld_col_bg2_type_1_cont').show();
               $('#zgpb_fld_col_bg2_type_2_cont').hide();
                
            });
            
            $("#zgpb_fld_col_bg2_type_2").on("click", function() {
                
               $('#zgpb_fld_col_bg2_type_1_cont').hide();
               $('#zgpb_fld_col_bg2_type_2_cont').show();
                
            });
            
            $("#zgpb_fld_col_bg2_sizetype").on("click", function () {
                var sVal = $(this).val();
                if(parseInt(sVal)===1 || parseInt(sVal)===2){
                     $('#zgpb_fld_col_bg2_sizetype_len_wrap').show();
                 }else{
                     $('#zgpb_fld_col_bg2_sizetype_len_wrap').hide();
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