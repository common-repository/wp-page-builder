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
 

<div id="zgpb-modal1-body-container">
   <?php echo $content;?> 
    
    <div id="lnda_tools_replaceurl_result" style="display:none;" >
    <div class="sfdc-row">
            <div class="sfdc-col-md-12">
                 <label 
                     class="zgth-form-label" 
                     for=""><?php echo __('Result','zgpbd_admin'); ?></label>
                <div><?php echo __('result below is shown','zgpbd_admin'); ?></div>
                <h3><?php echo __('modified urls','zgpbd_admin');?></h3>  
                <div id="lndr_importimg_showurlsmod">

                </div>
                <h3><?php echo __('urls remaining','zgpbd_admin');?></h3>  
                <div id="lndr_importimg_showurlsleft">

                </div>

            </div>
        </div>
    </div>
</div>
 <script type="text/javascript">
$zgpb(function($) 
	{
            
            $("#lnda_tools_replaceurl_option .radio input") /*select the radio by its id*/
            .change(function(){ /* bind a function to the change event*/
                if( $(this).is(":checked") ){ /*check if the radio is checked*/
                    var val = $(this).val(); /*retrieve the value*/
                   
                    switch(String(val)){
                        case 'Select':
                            $('#lnda_tools_replaceurl_path_wrapper').hide();
                            $('#lnda_tools_replaceurl_rpl_wrapper').hide();
                            break;
                        case 'importimg':
                        case 'reveal':
                        case 'remove':
                             $('#lnda_tools_replaceurl_path_wrapper').show();
                             $('#lnda_tools_replaceurl_rpl_wrapper').hide();
                            break;    
                        case 'replace':
                            $('#lnda_tools_replaceurl_path_wrapper').show();
                            $('#lnda_tools_replaceurl_rpl_wrapper').show();
                            break;
                    }
                    
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