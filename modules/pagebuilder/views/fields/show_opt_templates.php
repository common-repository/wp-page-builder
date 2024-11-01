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

 <script type="text/html" id="tmpl-zgpb-modal-field-loader">
	<div id="zgpb-modal-field-loader" >
           <div class="zgpb-loader-header-wrap"> <div class="zgpb-icon-uifm-logo-black"></div> <div class="zgpb-loader-header-1"></div> </div>
	</div>
</script>
 <script type="text/html" id="tmpl-zgpb-editor-main-container">
	<div id="zgpb-editor-container" class="sfdc-wrap">
            <div class="zgpb-items-container">
                
            </div>
	</div>
</script>

 <script type="text/html" id="tmpl-zgpb-quick-options">

                                    <# switch(parseInt(data.type)) { 
                                    /*only columns*/
                                    case 1:
                                    case 2:
                                    case 3:
                                    case 4:
                                    case 5:
                                    case 6:
                                        #>
                                        <div class="zgpb-fields-quick-options">
                                            <div class="zgpb-fields-quick-options-wrap"> 
                                                <div class="zgpb-fields-quick-options-side1 zgpb-fields-qopt-color1">
                                                     <a class="zgpb-fields-qopt-move zgpb-field-move" title="Move field block" href="javascript:void(0);">
                                                        <span class="zgpb-field-qopt-block">
                                                             <# switch(parseInt(data.type)) { 
                                                            /*only columns*/
                                                            case 1:
                                                            case 2:
                                                            case 3:
                                                            case 4:
                                                            case 5:
                                                                #>
                                                            <span><?php echo __('Row','zgpbd_admin'); ?></span>
                                                             <# break;
                                                            default:
                                                                #>
                                                            <# } #>
                                                            <i class="fa fa-arrows"></i></span>
                                                      </a>
                                                    <a class="zgpb-fields-qopt-edit" title="Edit" onclick="javascript:zgpb_core.fieldQuickOptions_EditField(this,true);" href="javascript:void(0);">
                                                        <span class="zgpb-field-qopt-block"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
                                                    </a>
                                                    <a class="zgpb-fields-qopt-copy" title="Duplicate" onclick="javascript:zgpb_core.fieldQuickOptions_DuplicateField('{{data.id}}');" href="javascript:void(0);">
                                                        <span class="zgpb-field-qopt-block"><i class="fa fa-files-o"></i></span>
                                                    </a>
                                                     <a class="zgpb-fields-qopt-remove" title="Remove" onclick="javascript:zgpb_core.fieldQuickOptions_deleteField('{{data.id}}');" href="javascript:void(0);">
                                                        <span class="zgpb-field-qopt-block"><i class="fa fa-trash-o"></i></span>
                                                      </a> 
                                                </div>
                                                 <div class="zgpb-fields-quick-options-side2 zgpb-fields-qopt-color2">
                                                     <a class="zgpb-fields-qopt-edit" title="Edit field block" onclick="javascript:zgpb_core.fieldQuickOptions_EditField(this,false);" href="javascript:void(0);">
                                                        <span class="zgpb-field-qopt-block">
                                                            <# switch(parseInt(data.type)) { 
                                                            /*only columns*/
                                                            case 1:
                                                            case 2:
                                                            case 3:
                                                            case 4:
                                                            case 5:
                                                                #>
                                                            <span><?php echo __('Column','zgpbd_admin'); ?></span> 
                                                            <# break;
                                                            default:
                                                                #>
                                                            <# } #>
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
                                                      </a>
                                                </div>
                                         
                                            </div>
                                        </div>
                                      <# break;
                                    default:
                                        #>
                                        
                                        <div class="zgpb-fields-quick-options2">
                                    <div class="zgpb-fields-quick-options-wrap zgpb-fields-qopt-color3">
                                         <a class="zgpb-fields-qopt-move zgpb-field-move" title="Move field block" href="javascript:void(0);">
                                            <span class="zgpb-field-qopt-block"><span><?php echo __('Field','zgpbd_admin'); ?></span> <i class="fa fa-arrows"></i></span>
                                         </a>
                                         <a class="zgpb-fields-qopt-edit" title="Edit" onclick="javascript:zgpb_core.fieldQuickOptions_EditField(this,true);" href="javascript:void(0);">
                                                <span class="zgpb-field-qopt-block"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
                                         </a>
                                          <a class="zgpb-fields-qopt-copy" title="Duplicate" onclick="javascript:zgpb_core.fieldQuickOptions_DuplicateField('{{data.id}}');" href="javascript:void(0);">
                                            <span class="zgpb-field-qopt-block"><i class="fa fa-files-o"></i></span>
                                          </a>
                                        
                                          <a class="zgpb-fields-qopt-remove" title="Remove" onclick="javascript:zgpb_core.fieldQuickOptions_deleteField('{{data.id}}');" href="javascript:void(0);">
                                            <span class="zgpb-field-qopt-block"><i class="fa fa-trash-o"></i></span>
                                          </a> 
                                    </div>
                                        
                                     <# } #>            
                                        
                                               
                                   
</script>
<script type="text/html" id="tmpl-zgpb-field-hover-hlight">
   <div class="zgpb-fields-hover-hlight-box"></div>

</script>

 <div class="zgpb-editor-main-texts" style="display:none;">
    <textarea id="alert_header_msg_removing"><?php echo __('Removing','zgpbd_admin'); ?></textarea>
    <textarea id="alert_header_msg_processing"><?php echo __('Processing','zgpbd_admin'); ?></textarea>
    <textarea id="alert_header_loading"><?php echo __('Loading','zgpbd_admin'); ?></textarea>
    <textarea id="alert_header_saving"><?php echo __('Saving','zgpbd_admin'); ?></textarea>
    <textarea id="alert_header_post_published"><?php echo __('Post is saved and published','zgpbd_admin'); ?></textarea>
    <textarea id="alert_header_post_draft"><?php echo __('Post is saved as a draft','zgpbd_admin'); ?></textarea>
    <textarea id="alert_header_post_imported"><?php echo __('Post imported successfully','zgpbd_admin'); ?></textarea>
</div>

<div id="zgpb-fields-templates" style="display:none;">
    <!--\ Grid System -->
       <!--\ text -->
     <div id="" data-typefield="7" data-iscontainer="0"  class="zgpb-field-text-box zgpb-field-template">
            <div class="sfdc-container-fluid">
                <div class="sfdc-row">
                    <div class="sfdc-col-md-12">
                        <div class="zgpb-input1-container">
                            <div class="zgpb-input1-text">
                                 
                            </div>
                        </div>
                    </div>
                  </div>
            </div>
        </div>
       <!--\ html -->
     <div id="" data-typefield="8" data-iscontainer="0"  class="zgpb-field-html-box zgpb-field-template">
            <div class="sfdc-container-fluid">
                <div class="sfdc-row">
                    <div class="sfdc-col-md-12">
                        <div class="zgpb-input1-container">
                            <div class="zgpb-input1-text">
                                 
                            </div>
                        </div>
                    </div>
                  </div>
            </div>
        </div>
           <!--\ heading -->
     <div id="" data-typefield="9" data-iscontainer="0"  class="zgpb-field-heading-box zgpb-field-template">
            <div class="sfdc-container-fluid">
                <div class="sfdc-row">
                    <div class="sfdc-col-md-12">
                        <div class="zgpb-input1-container">
                            <div class="zgpb-input1-text">
                                 
                            </div>
                        </div>
                    </div>
                  </div>
            </div>
        </div>
               <!--\ button -->
     <div id="" data-typefield="10" data-iscontainer="0"  class="zgpb-field-button-box zgpb-field-template">
            <div class="sfdc-container-fluid">
                <div class="sfdc-row">
                    <div class="sfdc-col-md-12">
                        <div class="zgpb-input1-container">
                            <div class="zgpb-input1-text">
                                 
                            </div>
                        </div>
                    </div>
                  </div>
            </div>
        </div>
    <!--\ image -->           
     <div id="" data-typefield="11" data-iscontainer="0"  class="zgpb-field-image-box zgpb-field-template">
            <div class="sfdc-container-fluid">
                <div class="sfdc-row">
                    <div class="sfdc-col-md-12">
                        <div class="zgpb-input1-container">
                            <div class="zgpb-input1-image">
                                <img src="<?php echo ZGPBLD_URL.'/assets/common/imgs/uifm-question-mark.png';?>"/>
                            </div>
                        </div>
                    </div>
                  </div>
            </div>
        </div> 
       <!--\ one -->
     <div id="" data-typefield="1" data-iscontainer="1"  class="zgpb-gridsytem-box zgpb-field-template zgpb-gridsystem-one">
            <div class="sfdc-container-fluid">
                <div class="sfdc-row">
                    <div  
                        data-zgpb-blocknum="1"
                        data-zgpb-width=""
                        data-zgpb-blockcol="12"
                        class="zgpb-fl-gs-block-style sfdc-col-md-12">
                        <div class="zgpb-items-container zgpb-fl-gs-block-inner"></div>
                          <div class="zgpb-fl-gridsystem-opt"></div>
                          <div class="zgpb-fl-gd-highlight"></div>
                    </div>
                  
                  </div>
            </div>
        </div>
       <!--\two -->
     <div id="" data-typefield="2" data-iscontainer="1"  class="zgpb-gridsytem-box zgpb-field-template zgpb-gridsystem-two">
            <div class="sfdc-container-fluid">
                <div class="sfdc-row">
                    <div  
                        data-zgpb-blocknum="1"
                        data-zgpb-width=""
                        data-zgpb-blockcol="6"
                        class="zgpb-fl-gs-block-style sfdc-col-md-6 ">
                        <div class="zgpb-items-container zgpb-fl-gs-block-inner"></div>
                        <div class="zgpb-fl-gridsystem-opt">
                            <div data-zgpb-side="1" class="zgpb-fl-gd-drag-line zgpb-fl-gd-drag-line-right">
                                <div class="zgpb-fl-gd-opt-icon-handler"></div>
                            </div>
                            
                        </div>
                        <div class="zgpb-fl-gd-highlight"></div>
                    </div>
                    <div  
                        data-zgpb-blocknum="2"
                        data-zgpb-width=""
                        data-zgpb-blockcol="6"
                        class="zgpb-fl-gs-block-style sfdc-col-md-6 ">

                        <div class="zgpb-items-container zgpb-fl-gs-block-inner"></div>
                       <div class="zgpb-fl-gridsystem-opt">
                        </div>
                        <div class="zgpb-fl-gd-highlight"></div>
                    </div>
                  </div>
            </div>
         
        </div>
     <!--\three -->
     <div id="" data-typefield="3" data-iscontainer="1"  class="zgpb-gridsytem-box zgpb-field-template zgpb-gridsystem-three">
            <div class="sfdc-container-fluid">
                <div class="sfdc-row">
                    <div  
                        data-zgpb-blocknum="1"
                        data-zgpb-width=""
                        data-zgpb-blockcol="4"
                        class="zgpb-fl-gs-block-style sfdc-col-md-4 ">
                        <div class="zgpb-items-container zgpb-fl-gs-block-inner"></div>
                          <div class="zgpb-fl-gridsystem-opt">
                             
                              <div data-zgpb-side="1" class="zgpb-fl-gd-drag-line zgpb-fl-gd-drag-line-right">
                                <div class="zgpb-fl-gd-opt-icon-handler"></div>
                              </div>
                           </div>
                        <div class="zgpb-fl-gd-highlight"></div>
                    </div>
                    <div  
                        data-zgpb-blocknum="2"
                        data-zgpb-width=""
                        data-zgpb-blockcol="4"
                        class="zgpb-fl-gs-block-style sfdc-col-md-4 ">

                        <div class="zgpb-items-container zgpb-fl-gs-block-inner"></div>
                       <div class="zgpb-fl-gridsystem-opt">
                               
                              <div data-zgpb-side="1" class="zgpb-fl-gd-drag-line zgpb-fl-gd-drag-line-right">
                                <div class="zgpb-fl-gd-opt-icon-handler"></div>
                              </div>
                           </div>
                        <div class="zgpb-fl-gd-highlight"></div>
                    </div>
                    <div  
                        data-zgpb-blocknum="3"
                        data-zgpb-width=""
                        data-zgpb-blockcol="4"
                        class="zgpb-fl-gs-block-style sfdc-col-md-4 ">

                        <div class="zgpb-items-container zgpb-fl-gs-block-inner"></div>
                       <div class="zgpb-fl-gridsystem-opt"></div>
                       <div class="zgpb-fl-gd-highlight"></div>
                    </div>
                  </div>
            </div>
        </div>
     <!--\four -->
     <div id="" data-typefield="4" data-iscontainer="1"  class="zgpb-gridsytem-box zgpb-field-template zgpb-gridsystem-four">
            <div class="sfdc-container-fluid">
                <div class="sfdc-row">
                    <div  
                        data-zgpb-blocknum="1"
                        data-zgpb-width=""
                        data-zgpb-blockcol="3"
                        class="zgpb-fl-gs-block-style sfdc-col-md-3 ">
                        <div class="zgpb-items-container zgpb-fl-gs-block-inner"></div>
                          <div class="zgpb-fl-gridsystem-opt">
                              <div data-zgpb-side="1" class="zgpb-fl-gd-drag-line zgpb-fl-gd-drag-line-right">
                                <div class="zgpb-fl-gd-opt-icon-handler"></div>
                              </div>
                           </div>
                        <div class="zgpb-fl-gd-highlight"></div>
                    </div>
                    <div  
                        data-zgpb-blocknum="2"
                        data-zgpb-width=""
                        data-zgpb-blockcol="3"
                        class="zgpb-fl-gs-block-style sfdc-col-md-3 ">

                        <div class="zgpb-items-container zgpb-fl-gs-block-inner"></div>
                       <div class="zgpb-fl-gridsystem-opt">
                              <div data-zgpb-side="1" class="zgpb-fl-gd-drag-line zgpb-fl-gd-drag-line-right">
                                <div class="zgpb-fl-gd-opt-icon-handler"></div>
                              </div>
                           </div>
                        <div class="zgpb-fl-gd-highlight"></div>
                    </div>
                    <div  
                        data-zgpb-blocknum="3"
                        data-zgpb-width=""
                        data-zgpb-blockcol="3"
                        class="zgpb-fl-gs-block-style sfdc-col-md-3 ">

                        <div class="zgpb-items-container zgpb-fl-gs-block-inner"></div>
                       <div class="zgpb-fl-gridsystem-opt">
                              <div data-zgpb-side="1" class="zgpb-fl-gd-drag-line zgpb-fl-gd-drag-line-right">
                                <div class="zgpb-fl-gd-opt-icon-handler"></div>
                              </div>
                           </div>
                        <div class="zgpb-fl-gd-highlight"></div>
                    </div>
                    <div  
                        data-zgpb-blocknum="4"
                        data-zgpb-width=""
                        data-zgpb-blockcol="3"
                        class="zgpb-fl-gs-block-style sfdc-col-md-3">

                        <div class="zgpb-items-container zgpb-fl-gs-block-inner"></div>
                      <div class="zgpb-fl-gridsystem-opt"></div>
                      <div class="zgpb-fl-gd-highlight"></div>
                    </div>
                  </div>
            </div>
        </div>
     <!--\ five -->
     <div id="" data-typefield="5" data-iscontainer="1"  class="zgpb-gridsytem-box zgpb-field-template zgpb-gridsystem-five">
            <div class="sfdc-container-fluid">
                <div class="sfdc-row">
                    <div  
                        data-zgpb-blocknum="1"
                        data-zgpb-width=""
                        data-zgpb-blockcol="2"
                        class="zgpb-fl-gs-block-style sfdc-col-md-2 ">
                        <div class="zgpb-items-container zgpb-fl-gs-block-inner"></div>
                          <div class="zgpb-fl-gridsystem-opt">
                              <div data-zgpb-side="1" class="zgpb-fl-gd-drag-line zgpb-fl-gd-drag-line-right">
                                <div class="zgpb-fl-gd-opt-icon-handler"></div>
                              </div>
                           </div>
                        <div class="zgpb-fl-gd-highlight"></div>
                    </div>
                    <div  
                        data-zgpb-blocknum="2"
                        data-zgpb-width=""
                        data-zgpb-blockcol="2"
                        class="zgpb-fl-gs-block-style sfdc-col-md-2 ">

                        <div class="zgpb-items-container zgpb-fl-gs-block-inner"></div>
                       <div class="zgpb-fl-gridsystem-opt">
                              <div data-zgpb-side="1" class="zgpb-fl-gd-drag-line zgpb-fl-gd-drag-line-right">
                                <div class="zgpb-fl-gd-opt-icon-handler"></div>
                              </div>
                           </div>
                        <div class="zgpb-fl-gd-highlight"></div>
                    </div>
                    <div  
                        data-zgpb-blocknum="3"
                        data-zgpb-width=""
                        data-zgpb-blockcol="2"
                        class="zgpb-fl-gs-block-style sfdc-col-md-2 ">

                        <div class="zgpb-items-container zgpb-fl-gs-block-inner"></div>
                       <div class="zgpb-fl-gridsystem-opt">
                              <div data-zgpb-side="1" class="zgpb-fl-gd-drag-line zgpb-fl-gd-drag-line-right">
                                <div class="zgpb-fl-gd-opt-icon-handler"></div>
                              </div>
                           </div>
                        <div class="zgpb-fl-gd-highlight"></div>
                    </div>
                    <div  
                        data-zgpb-blocknum="4"
                        data-zgpb-width=""
                        data-zgpb-blockcol="2"
                        class="zgpb-fl-gs-block-style sfdc-col-md-2">

                        <div class="zgpb-items-container zgpb-fl-gs-block-inner"></div>
                      <div class="zgpb-fl-gridsystem-opt">
                              <div data-zgpb-side="1" class="zgpb-fl-gd-drag-line zgpb-fl-gd-drag-line-right">
                                <div class="zgpb-fl-gd-opt-icon-handler"></div>
                              </div>
                           </div>
                      <div class="zgpb-fl-gd-highlight"></div>
                    </div>
                      <div  
                        data-zgpb-blocknum="5"
                        data-zgpb-width=""
                        data-zgpb-blockcol="2"
                        class="zgpb-fl-gs-block-style sfdc-col-md-2">

                        <div class="zgpb-items-container zgpb-fl-gs-block-inner"></div>
                      <div class="zgpb-fl-gridsystem-opt">
                              <div data-zgpb-side="1" class="zgpb-fl-gd-drag-line zgpb-fl-gd-drag-line-right">
                                <div class="zgpb-fl-gd-opt-icon-handler"></div>
                              </div>
                           </div>
                      <div class="zgpb-fl-gd-highlight"></div>
                    </div>
                        <div  
                        data-zgpb-blocknum="6"
                        data-zgpb-width=""
                        data-zgpb-blockcol="2"
                        class="zgpb-fl-gs-block-style sfdc-col-md-2">

                        <div class="zgpb-items-container zgpb-fl-gs-block-inner"></div>
                      <div class="zgpb-fl-gridsystem-opt"></div>
                      <div class="zgpb-fl-gd-highlight"></div>
                    </div>
                  </div>
            </div>
        </div>    
      <!--\ six -->
     <div id="" data-typefield="6" data-iscontainer="1"  class="zgpb-gridsytem-box zgpb-field-template zgpb-gridsystem-six">
            <div class="sfdc-container-fluid">
                <div class="sfdc-row">
                    <div  
                        data-zgpb-blocknum="1"
                        data-zgpb-width=""
                        data-zgpb-blockcol="1"
                        class="zgpb-fl-gs-block-style sfdc-col-md-1">
                        <div class="zgpb-items-container zgpb-fl-gs-block-inner"></div>
                          <div class="zgpb-fl-gridsystem-opt"></div>
                        <div class="zgpb-fl-gd-highlight"></div>
                    </div>
                    <div  
                        data-zgpb-blocknum="2"
                        data-zgpb-width=""
                        data-zgpb-blockcol="1"
                        class="zgpb-fl-gs-block-style sfdc-col-md-1 ">

                        <div class="zgpb-items-container zgpb-fl-gs-block-inner"></div>
                      <div class="zgpb-fl-gridsystem-opt"></div>
                        <div class="zgpb-fl-gd-highlight"></div>
                    </div>
                    <div  
                        data-zgpb-blocknum="3"
                        data-zgpb-width=""
                        data-zgpb-blockcol="1"
                        class="zgpb-fl-gs-block-style sfdc-col-md-1 ">

                        <div class="zgpb-items-container zgpb-fl-gs-block-inner"></div>
                       <div class="zgpb-fl-gridsystem-opt"></div>
                        <div class="zgpb-fl-gd-highlight"></div>
                    </div>
                    <div  
                        data-zgpb-blocknum="4"
                        data-zgpb-width=""
                        data-zgpb-blockcol="1"
                        class="zgpb-fl-gs-block-style sfdc-col-md-1">

                        <div class="zgpb-items-container zgpb-fl-gs-block-inner"></div>
                      <div class="zgpb-fl-gridsystem-opt"></div>
                        <div class="zgpb-fl-gd-highlight"></div>
                    </div>
                      <div  
                        data-zgpb-blocknum="5"
                        data-zgpb-width=""
                        data-zgpb-blockcol="1"
                        class="zgpb-fl-gs-block-style sfdc-col-md-1">

                        <div class="zgpb-items-container zgpb-fl-gs-block-inner"></div>
                      <div class="zgpb-fl-gridsystem-opt"></div>
                        <div class="zgpb-fl-gd-highlight"></div>
                    </div>
                    <div  
                        data-zgpb-blocknum="6"
                        data-zgpb-width=""
                        data-zgpb-blockcol="1"
                        class="zgpb-fl-gs-block-style sfdc-col-md-1">

                        <div class="zgpb-items-container zgpb-fl-gs-block-inner"></div>
                      <div class="zgpb-fl-gridsystem-opt"></div>
                        <div class="zgpb-fl-gd-highlight"></div>
                    </div>
                    <div  
                        data-zgpb-blocknum="7"
                        data-zgpb-width=""
                        data-zgpb-blockcol="1"
                        class="zgpb-fl-gs-block-style sfdc-col-md-1">

                        <div class="zgpb-items-container zgpb-fl-gs-block-inner"></div>
                      <div class="zgpb-fl-gridsystem-opt"></div>
                        <div class="zgpb-fl-gd-highlight"></div>
                    </div>
                    <div  
                        data-zgpb-blocknum="8"
                        data-zgpb-width=""
                        data-zgpb-blockcol="1"
                        class="zgpb-fl-gs-block-style sfdc-col-md-1">

                        <div class="zgpb-items-container zgpb-fl-gs-block-inner"></div>
                      <div class="zgpb-fl-gridsystem-opt"></div>
                        <div class="zgpb-fl-gd-highlight"></div>
                    </div>
                    <div  
                        data-zgpb-blocknum="9"
                        data-zgpb-width=""
                        data-zgpb-blockcol="1"
                        class="zgpb-fl-gs-block-style sfdc-col-md-1">

                        <div class="zgpb-items-container zgpb-fl-gs-block-inner"></div>
                      <div class="zgpb-fl-gridsystem-opt"></div>
                        <div class="zgpb-fl-gd-highlight"></div>
                    </div>
                    <div  
                        data-zgpb-blocknum="10"
                        data-zgpb-width=""
                        data-zgpb-blockcol="1"
                        class="zgpb-fl-gs-block-style sfdc-col-md-1">

                        <div class="zgpb-items-container zgpb-fl-gs-block-inner"></div>
                      <div class="zgpb-fl-gridsystem-opt"></div>
                        <div class="zgpb-fl-gd-highlight"></div>
                    </div>
                    <div  
                        data-zgpb-blocknum="11"
                        data-zgpb-width=""
                        data-zgpb-blockcol="1"
                        class="zgpb-fl-gs-block-style sfdc-col-md-1">

                        <div class="zgpb-items-container zgpb-fl-gs-block-inner"></div>
                      <div class="zgpb-fl-gridsystem-opt"></div>
                        <div class="zgpb-fl-gd-highlight"></div>
                    </div>
                      <div  
                        data-zgpb-blocknum="12"
                        data-zgpb-width=""
                        data-zgpb-blockcol="1"
                        class="zgpb-fl-gs-block-style sfdc-col-md-1">

                        <div class="zgpb-items-container zgpb-fl-gs-block-inner"></div>
                      <div class="zgpb-fl-gridsystem-opt"></div>
                        <div class="zgpb-fl-gd-highlight"></div>
                    </div>
                  </div>
            </div>
        </div> 
     
</div>
<div style="display:none;">
     
    <div class="zgpb-hidden-editor">
            <?php wp_editor(' ', 'zgpbrefeditor', array('wpautop' => true)); ?>
    </div>
    <input type="hidden" id="zgpb-post-id" value="<?php echo $post_id; ?>" />
    <input type="hidden" id="zgpb-admin-url" value="<?php echo admin_url(); ?>" />
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