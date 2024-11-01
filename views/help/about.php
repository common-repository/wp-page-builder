<?php
if (!defined('ABSPATH')) {exit('No direct script access allowed');}
?>
<script>var switchTo5x = true;</script>
<script type="text/javascript" src="https://ws.sharethis.com/button/buttons.js"></script>
<script>stLight.options({publisher: "595f29e833add90011bd1dc7"});</script> 
<div id="zgpb-page-about-main"  class="sfdc-wrap">
  
   <div>
        <img src="<?php echo ZGPBLD_URL;?>/assets/backend/image/about/logo.png"> 
     </div>
      <h1><?php echo __('ABOUT', 'zgpbd_admin');?></h1>
    <div class="zgpb-page-about-title">
        <?php echo __('Landera – Wordpress Page Builder is a drag and drop page builder which makes you to design live any layout that you can imagine.', 'zgpbd_admin');?>
    </div>
    <div class="zgpb-page-about-panel-wrap">
        <div class="row">
                <div class="col-md-6">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo __('Rate Landera', 'zgpbd_admin');?></h3>
                        </div>
                        <div class="panel-body">
                            <form role="form">
                                <fieldset>
                                    
                                    <?php if(ZGPBLD_LITE ==1){?>
                                    
                                    <div class="form-group">
                                            <a href="https://wordpress.org/support/plugin/zigapage-lite/reviews/?filter=5#new-post"
                                               target="_blank">
                                                <img id="zgpb-page-about-rate-icon" 
                                               src="<?php echo ZGPBLD_URL;?>/assets/backend/image/about/zigaform-rate-icon.png">
                                            </a>
                                            <div id="zgpb-page-about-leavestars" >
                                                    <a href="https://wordpress.org/support/plugin/zigapage-lite/reviews/?filter=5#new-post"
                                                       target="_blank"><?php echo __('Leave 5 Stars', 'zgpbd_admin');?></a>
                                            </div>
                                        
                                       
                                        
                                    </div>
                                    <?php }else{ ?>
                                    <div class="form-group">
                                            <a href="https://codecanyon.net/item/landera-wordpress-page-builder/19652454?ref=Softdiscover"
                                               target="_blank">
                                                <img id="zgpb-page-about-rate-icon" 
                                               src="<?php echo ZGPBLD_URL;?>/assets/backend/image/about/zigaform-rate-icon.png">
                                            </a>
                                            <div id="zgpb-page-about-leavestars" >
                                                    <a href="https://codecanyon.net/item/landera-wordpress-page-builder/19652454?ref=Softdiscover"
                                                       target="_blank"><?php echo __('Leave 5 Stars', 'zgpbd_admin');?></a>
                                            </div>
                                    </div>
                                    <?php } ?>
                                    
                                     <div class="zgpb-page-about-helpnote">
                                            <?php echo __('Please leave 5 stars if you like the plugin and I’ll keep rolling new updates and cool features.', 'zgpbd_admin');?>
                                        </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                     <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo __('Spread the Word', 'zgpbd_admin');?></h3>
                        </div>
                        <div class="panel-body">
                            <form role="form">
                                <fieldset>
                                    <div class="form-group">
                                            <?php
                                        $title = __("Create amazing content with Landera", 'zgpbd_admin');
                                        $summary = __("Ultimate Wordpress Page builder by Landera", 'zgpbd_admin');
                                        $share_this_data = "st_url='https://landera.softdiscover.com/' st_title='{$title}' st_summary='{$summary}'";
                                        ?>
                                        <div id="zgpb-page-about-shbuttons" align="center">
                                            <span class='st_facebook_vcount' displayText='Facebook' <?php echo $share_this_data; ?> ></span>
                                            <span class='st_twitter_vcount' displayText='Tweet' <?php echo $share_this_data; ?> ></span>
                                            <span class='st_googleplus_vcount' displayText='Google +' <?php echo $share_this_data; ?> ></span>
                                            <span class='st_linkedin_vcount' displayText='LinkedIn' <?php echo $share_this_data; ?> ></span>
                                            <span class='st_email_vcount' displayText='Email' <?php echo $share_this_data; ?> ></span>
                                        </div><br/>  
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            
        </div>
        
    </div>
</div>