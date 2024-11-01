<?php
if (!defined('ABSPATH')) {exit('No direct script access allowed');}
?>
<div id="zgpb-page-help-main" class="sfdc-wrap">
    <h1><?php echo __('HELP', 'zgpbd_admin');?></h1>
    <div class="zgpb-page-help-title">
        
        <span class="sfdc-glyphicon sfdc-glyphicon-question-sign"></span>
        
        <?php echo __('Creating page content is a complex process and the logic to make all the magic happen smoothly may not work quickly with every site. With over a lot of plugins and a very complex server eco-system some content may run into issues. This is why Landera includes a detailed knowledgebase that can help with many common issues. Resources to additional support to fit your needs can be found below. ', 'zgpbd_admin');?>
    </div>
    
      <div class="zgpb-page-about-panel-wrap">
        <div class="sfdc-row">
                <div class="sfdc-col-md-6">
                    <div class="sfdc-login-panel sfdc-panel sfdc-panel-default">
                        <div class="sfdc-panel-heading">
                            <i class="fa fa-cube fa-2x sfdc-pull-left"></i>
                            <h3 class="sfdc-panel-title">  <?php echo __('Knowledgebase', 'zgpbd_admin');?></h3>
                        </div>
                        <div class="sfdc-panel-body">
                            <form role="form">
                                <fieldset>
                                    <div class="sfdc-text-center">
                                        <h4><?php echo __('Online documentation', 'zgpbd_admin');?></h4>
                                        <p>
                                           <a target="_blank"
                                               href="https://support.softdiscover.com/docs/landera-wordpress-page-builder/"
                                               class="sfdc-btn sfdc-btn-info sfdc-btn-lg">
                                              <?php echo __('User guide', 'zgpbd_admin');?>
                                            </a>
                                        </p>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="sfdc-col-md-6">
                     <div class="sfdc-login-panel sfdc-panel sfdc-panel-default">
                        <div class="sfdc-panel-heading">
                            <i class="fa fa-lightbulb-o fa-2x sfdc-pull-left"></i>
                            <h3 class="sfdc-panel-title"><?php echo __('Online Support', 'zgpbd_admin');?></h3>
                        </div>
                        <div class="sfdc-panel-body">
                            <form role="form">
                                <fieldset>
                                    <div class="sfdc-text-center">
                                        <h4><?php echo __('Get help from professionals', 'zgpbd_admin');?></h4>
                                        <p>
                                           <a target="_blank"
                                               href="https://landera.softdiscover.com/#contact"
                                               class="sfdc-btn sfdc-btn-info sfdc-btn-lg">
                                              <?php echo __('Get support', 'zgpbd_admin');?>
                                            </a>
                                        </p>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            
        </div>
        
    </div>
    
</div>