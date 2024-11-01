<?php

/**
 * Backend
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
if (class_exists('Zgpb_tools_Controller_Backend')) {
    return;
}

/**
 * Controller Settings class
 *
 * @category  PHP
 * @package   Zigapage_wp
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1.00
 * @link      https://landera.softdiscover.com
 */
class Zgpb_tools_Controller_Backend extends Zgpbld_Base_Module {

    const VERSION = '0.1';

    private $wpdb = "";
    protected $modules;
    private $model_settings = "";
    
    public $tool_replaceurl_urlpath='';
    public $tool_replaceurl_urlsleft='';
    public $tool_replaceurl_urlsmodified='';
    public $tool_replaceurl_option='';
    public $tool_replaceurl_exclude='';
    public $tool_rplurl_curtext='';
    public $current_post_id='';
    

    /**
     * Constructor
     *
     * @mvc Controller
     */
    protected function __construct() {
        global $wpdb;
        $this->wpdb = $wpdb;
       
      //load import image
      add_action('wp_ajax_zgpb_tool_replaceurl', array(&$this, 'ajax_tools_importimagetolocal'));
      
      //process import image
      add_action('wp_ajax_zgpb_tool_replaceurl_process', array(&$this, 'ajax_tools_importimg_process'));
      
    }
    
    
    /**
     * ajax_tools_importimagetolocal()
     * Import images from current page or post content to local repository
     * 
     * @return html
     */
    
    public function ajax_tools_importimagetolocal() {
        check_ajax_referer( 'zgpb_ajax_nonce', 'zgpb_security' );
        //getting data
         $data=include_once( ZGPBLD_DIR . '/modules/tools/options/backend/importimages.php');
         $data_options=self::$_modules['optbuilder']['backend']->render_options_one($data);
          
         $json = array();
         $json['modal_header'] =self::render_template('optbuilder/views/backend/modal_one_header.php', $data, 'always');
         $json['modal_body'] = self::render_template('tools/views/backend/importimg_modal.php', array('content'=>$data_options['section1']), 'always');
         $json['modal_footer'] = self::render_template('optbuilder/views/backend/modal_one_footer.php', array('buttons'=>$data_options['buttons']), 'always');
         
         header('Content-Type: application/json');
        echo json_encode($json);
        die();
         
    }
    
    
    /**
     * ajax_tools_importimg_process()
     * process import images from current page or post content to local repository
     * 
     * @return html
     */
    
    public function ajax_tools_importimg_process() {

        check_ajax_referer('zgpb_ajax_nonce', 'zgpb_security');
        
        //enable unlimited time
        set_time_limit(0);
  
 $opt_extra = (isset($_POST['extra']) && $_POST['extra']) ? Zgpbld_Form_Helper::sanitizeInput_html($_POST['extra']) : '';

parse_str($opt_extra, $extra_vars);

        $opt_importurl = (isset($extra_vars['lnda_tools_replaceurl_path']) && $extra_vars['lnda_tools_replaceurl_path']) ? Zgpbld_Form_Helper::sanitizeInput_html($extra_vars['lnda_tools_replaceurl_path']) : '';
        $opt_exclude = (isset($extra_vars['lnda_tools_replaceurl_exclude']) && $extra_vars['lnda_tools_replaceurl_exclude']) ? Zgpbld_Form_Helper::sanitizeInput_html($extra_vars['lnda_tools_replaceurl_exclude']) : '';
        $opt_option = (isset($extra_vars['lnda_tools_replaceurl_option']) && $extra_vars['lnda_tools_replaceurl_option']) ? Zgpbld_Form_Helper::sanitizeInput_html($extra_vars['lnda_tools_replaceurl_option']) : '';
        


        //check excluded urls
        
        if(!empty($opt_exclude)){
            $result_array = preg_split( "/[;,]/", $opt_exclude );
            if(is_array($result_array)){
                foreach ($result_array as $key => $value) {
                    $result_array[$key] = trim($value);
                }
            }else{
                $result_array=trim($opt_exclude);
            }
        }else{
           $result_array=''; 
        }
        
        
        
        $this->tool_replaceurl_exclude=$result_array;
        if((string)$opt_option==='Select'){
            $this->tool_replaceurl_urlpath = '';
        }else{
            $this->tool_replaceurl_urlpath = $opt_importurl;
        }
        
        
        $this->tool_replaceurl_option = $opt_option;
                    
        $post_id = (isset($_POST['post_id']) && $_POST['post_id']) ? Zgpbld_Form_Helper::sanitizeInput_html($_POST['post_id']) : '';
        
        $this->current_post_id = $post_id;
        
        $lnd_data = (isset($_POST['lnd_data']) && $_POST['lnd_data']) ? urldecode($_POST['lnd_data']) : '';
        $lnd_data2 = (isset($lnd_data) && $lnd_data) ? array_map(array('Zgpbld_Form_Helper', 'sanitizeRecursive_html'), json_decode($lnd_data, true)) : array();

        if (version_compare(PHP_VERSION, '5.6', '<')) {
            echo 'you need to have version higher than 5.6, my current version: ' . PHP_VERSION . "\n";
            die();
        }
       
        

 
        
        $json = array();
        $json['success'] = 1;
         if (Zgpbld_Form_Helper::is_JSON($lnd_data)) {
           
        } else {
            $error = json_last_error_msg();
            
            $json['success'] =0;
            $json['error'] ="Not valid JSON string ($error)";
        }
       
        $zgpb_data_core = (!empty($lnd_data2) && $lnd_data2) ? $lnd_data2 : array();
                    
        $this->ajax_tools_importimg_process_2($zgpb_data_core);
        
        
        $json['opt_importurl'] = $opt_importurl;
        $json['urls_left'] = self::render_template('tools/views/backend/importimg_showurlleft.php', array('urls'=>$this->tool_replaceurl_urlsleft), 'always');
        $json['urls_modified'] = self::render_template('tools/views/backend/importimg_showurlmod.php', array('urls'=>$this->tool_replaceurl_urlsmodified), 'always');
        $json['urls_core']['data']=$zgpb_data_core;

        header('Content-Type: application/json');
        echo json_encode($json);
        die();
         
    }
    
    
    public function ajax_tools_importimg_process_2(&$data) {
        
        $tmp_text='';
        
        if(!empty($data['fields_src'])){
            foreach ($data['fields_src'] as $key => $value) {
                switch (intval($value['type'])) {
                    case 8:
                        //html
                        $tmp_text=urldecode($value['input1']['text']);
                        $this->tool_rplurl_curtext=$tmp_text;
                        break;
                    default:
                        break;
                }
                    
                $this->ajax_tools_replaceurl_search($tmp_text);
                
                
                switch (intval($value['type'])) {
                    case 8:
                        //html
                       $data['fields_src'][$key]['input1']['text'] =Zgpbld_Form_Helper::encodeURIComponent($this->tool_rplurl_curtext);
                        break;
                    default:
                        break;
                }
                
                
                
            }
        }
        
    }
    
    
    public function tools_replaceurl_checkexclude($string) {
                    
        $exclude_url=$this->tool_replaceurl_exclude;
                    
        if(empty($exclude_url)){
            return false;
        }
       
        $tmp_response=false;
        if(is_array($exclude_url)){
          
             foreach ($exclude_url as $url) {
                    $tmp_response=strpos($string,$url );
                    
                if ( $tmp_response!== false) {  
                    
                    return true;
                }
            }
        }else{
             
            $tmp_response=strpos($string,$exclude_url);
                    
            if ($tmp_response !== false) {  
                  
                   return true;
             }
                    
        }
                    
        return false;
    }
    
    public function ajax_tools_replaceurl_search($tmp_text) {
        
                    
        $urltoreplace = $this->tool_replaceurl_urlpath;
        
        preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#',$tmp_text,$a);
       
        $tmp_unique_groupurl=array();
        
        $tmp_store=array();
        $tmp_urlfound=array();
        foreach ($a as $key => $value) {
            foreach ($value as $key2 => $value2) {
               if (wp_http_validate_url($value2)) {
                   
                   if(!in_array($value2, $tmp_unique_groupurl)){
                       
                       if($this->tools_replaceurl_checkexclude($value2)){
                                
                        }else{
                           if( !empty($urltoreplace) && strpos( $value2, $urltoreplace ) !== false ) {
                                    $tmp_urlfound[]=array(
                                          'old'=>$value2, 
                                          'new'=>''
                                      );
                              }else{
                                  $tmp_store[]=$value2;
                              }
                             $tmp_unique_groupurl[]=$value2;     
                        }
                   }
                } 
                    
            }
        }
       
       //order alphavetically
       sort($tmp_store);
        
       $this->tool_replaceurl_urlsleft=$tmp_store; 
       $this->tool_replaceurl_urlsmodified=$tmp_urlfound;
       
       switch ($this->tool_replaceurl_option) {
                    case 'importimg':
                        $this->tools_replaceurl_extractimg($tmp_text);

                    break;
                    case 'reveal':
                        $this->tools_replaceurl_reveal($tmp_text);
                        break;
                    case 'remove':
                        $this->tools_replaceurl_removelink($tmp_text);
                        break;
                    case 'replace':
                        $this->tools_replaceurl_replace($tmp_text);
                        
                        
                        break;
                    default:
                        break;
                }
                
    }
    
    public function tools_replaceurl_removelink($tmp_text) {
      
        $opt_search = $this->tool_replaceurl_urlpath;
        
        $tmp_data=$this->tool_replaceurl_urlsmodified;
        
        if(!empty($opt_search)){
           foreach ($tmp_data as $key => $value) {
                if(!empty($value['old']) ){
                    
                    $tmp_data[$key]['new']=$this->tools_replaceurl_removelink_process($value['old'],$tmp_text);
                    
                 }else{
                     //image does not exist.
                        $tmp_data[$key]['error']='1';
                  } 

            } 
        }
        
        
        $this->tool_replaceurl_urlsmodified = $tmp_data;
        $this->tool_rplurl_curtext = $tmp_text;  
    }
    
    public function tools_replaceurl_removelink_process($url_old,&$tmp_text) {
        $opt_search = $this->tool_replaceurl_urlpath;
        
        $xml = new DOMDocument(); 
        //$xml->loadHTML($tmp_text);
        $xml->loadHTML(mb_convert_encoding($tmp_text, 'HTML-ENTITIES', 'UTF-8'));

        $links = $xml->getElementsByTagName('a');
        $innerHTML='';
        $count=0;
        
        $flag_r=array();
        //Loop through each <a> tags and replace them by their text content    
        for ($i = $links->length - 1; $i >= 0; $i--) {
            $linkNode = $links->item($i);
            
            $linkurl=$linkNode->getAttribute('href');
            //$linkurl=html_entity_decode($linkurl, ENT_QUOTES, "utf-8" ); 
            $flag_r[]=$linkurl;
            if (strpos($linkurl,$url_old) !== false) {
                $lnkText = $linkNode->textContent;
                $newTxtNode = $xml->createTextNode($lnkText);
                $linkNode->parentNode->replaceChild($newTxtNode, $linkNode);
                $count++;
            }
                    
        }
        
        # remove <!DOCTYPE 
        $xml->removeChild($xml->doctype);           

        # remove <html><body></body></html> 
        $xml->replaceChild($xml->firstChild->firstChild->firstChild, $xml->firstChild);
        
        $tmp_text = $xml->saveHTML();
         
        return $count.' links removed';
        
        
    }
    
    public function tools_replaceurl_replace($tmp_text) {
        
 $opt_extra = (isset($_POST['extra']) && $_POST['extra']) ? Zgpbld_Form_Helper::sanitizeInput_html($_POST['extra']) : '';

parse_str($opt_extra, $extra_vars);
 

        $opt_replace = (isset($extra_vars['lnda_tools_replaceurl_rpl']) && $extra_vars['lnda_tools_replaceurl_rpl']) ? Zgpbld_Form_Helper::sanitizeInput_html($extra_vars['lnda_tools_replaceurl_rpl']) : '';


        $opt_search = $this->tool_replaceurl_urlpath;
        
        $tmp_data=$this->tool_replaceurl_urlsmodified;
        
        if(!empty($opt_replace)){
           foreach ($tmp_data as $key => $value) {
                if(!empty($value['old']) ){
                  
                    $tmp_new = str_replace($opt_search,$opt_replace,$value['old']);
                    
                    $tmp_data[$key]['new']=$tmp_new;
                    
                     $tmp_text = str_replace($value['old'],$tmp_new, $tmp_text);
                    
                 }else{
                     //image does not exist.
                        $tmp_data[$key]['error']='1';
                  } 

            } 
        }
        
        
        $this->tool_replaceurl_urlsmodified = $tmp_data;
        $this->tool_rplurl_curtext = $tmp_text;
        
    }
    
    public function tools_replaceurl_reveal($tmp_text) {
        $tmp_data=$this->tool_replaceurl_urlsmodified;
        
        foreach ($tmp_data as $key => $value) {
            
            
            
            if(!empty($value['old']) ){
                
                
                $tmp_response=$this->tools_replaceurl_expandShortUrl($value['old']);
                //giving time to process
                sleep(1);
                if($tmp_response===false){
                    //image does not exist.
                    $tmp_data[$key]['error']='1';
                }else{
                    $tmp_data[$key]['new']=$tmp_response;
                    
                    
                    $tmp_text = str_replace($value['old'], $tmp_response, $tmp_text);
                    
                }
                        
                    
             }else{
                 //image does not exist.
                    $tmp_data[$key]['error']='1';
              } 

        }
        
        $this->tool_replaceurl_urlsmodified = $tmp_data;
        $this->tool_rplurl_curtext = $tmp_text;
    }
    
    private function tools_replaceurl_expandShortUrl($url){
        ob_start();
		$headers = get_headers($url,1);
		
		if (!empty($headers['Location'])) 
		{
			$headers['Location'] = (array) $headers['Location'];
			$url = array_pop($headers['Location']);
		}
		$cntACmp = ob_get_contents();
		ob_end_clean();
                
                if (filter_var($url, FILTER_VALIDATE_URL) === FALSE) {
                return false;
            }else{
                return $url;
            }
                
		
    }
    
    public function tools_replaceurl_extractimg($tmp_text) {
        $tmp_data=$this->tool_replaceurl_urlsmodified;
        
        foreach ($tmp_data as $key => $value) {
            
            
            
            if(!empty($value['old']) ){
                
                
                $tmp_response=$this->tools_replaceurl_uploadimage($value['old']);
                
                if($tmp_response===false){
                    //image does not exist.
                    $tmp_data[$key]['error']='1';
                   
                }else{
                    $tmp_data[$key]['new']=$tmp_response;
                    
                    
                    $tmp_text = str_replace($value['old'], $tmp_response, $tmp_text);
                    
                }
                        
                    
             }else{
                 //image does not exist.
                    $tmp_data[$key]['error']='1';
              } 

        }
        
        $this->tool_replaceurl_urlsmodified = $tmp_data;
        $this->tool_rplurl_curtext = $tmp_text;
        
    }
    
    /**
        * With the 5 function above you have managed to retrieve and upload images from third-party URL / server on WordPress then set the image as a thumbnail on the theme. Simple example as follows:
        *
        * @param  String $url 
        * @param  Int    $post_id 
        * @param  Array  $meta_data 
        * @return Int    Attachment ID
        */
    public function tools_replaceurl_uploadimage($url) {
        $response = wp_remote_get($url, array( 'timeout' => 8 ) );
        if( !is_wp_error( $response ) ){
                $bits = wp_remote_retrieve_body( $response );
                    
                $filename = strtotime("now").'_'.basename($url);
                $upload = wp_upload_bits( $filename, null, $bits );
                
                
                return $upload['url'];
                    
                /*$data['guid'] = $upload['url'];
                $data['post_mime_type'] = 'image/jpeg';
                $attach_id = wp_insert_attachment( $data, $upload['file'], 0 );
                add_post_meta(7, '_thumbnail_id', $attach_id, true);*/
        }else{
            return false;
        }
    }
    
    
    /**
        * Insert an attachment from an URL address.
        *
        * @param  String $url 
        * @param  Int    $post_id 
        * @param  Array  $meta_data 
        * @return Int    Attachment ID
        */
    public function crb_insert_attachment_from_url($url, $post_id = null) {
             
        
               if( !class_exists( 'WP_Http' ) )
                       include_once( ABSPATH . WPINC . '/class-http.php' );
               
               
               $http = new WP_Http();
               $response = $http->request( $url );
               if( $response['response']['code'] != 200 ) {
                       return false;
               }
               die('mamamaa 22');
               $upload = wp_upload_bits( basename($url), null, $response['body'] );
               if( !empty( $upload['error'] ) ) {
                       return false;
               }

               $file_path = $upload['file'];
               $file_name = basename( $file_path );
               $file_type = wp_check_filetype( $file_name, null );
               $attachment_title = sanitize_file_name( pathinfo( $file_name, PATHINFO_FILENAME ) );
               $wp_upload_dir = wp_upload_dir();

               $post_info = array(
                       'guid'				=> $wp_upload_dir['url'] . '/' . $file_name, 
                       'post_mime_type'	=> $file_type['type'],
                       'post_title'		=> $attachment_title,
                       'post_content'		=> '',
                       'post_status'		=> 'inherit',
               );

               // Create the attachment
               $attach_id = wp_insert_attachment( $post_info, $file_path, $post_id );

               // Include image.php
               require_once( ABSPATH . 'wp-admin/includes/image.php' );

               // Define attachment metadata
               $attach_data = wp_generate_attachment_metadata( $attach_id, $file_path );

               // Assign metadata to attachment
               wp_update_attachment_metadata( $attach_id,  $attach_data );
               
               
               return $attach_id;

       }
    
    /**
     * Register callbacks for actions and filters
     *
     * @mvc Controller
     */
    public function register_hook_callbacks() {
        
    }

    /**
     * Initializes variables
     *
     * @mvc Controller
     */
    public function init() {

        try {
            //$instance_example = new WPPS_Instance_Class( 'Instance example', '42' );
            //add_notice('ba');
        } catch (Exception $exception) {
            add_notice(__METHOD__ . ' error: ' . $exception->getMessage(), 'error');
        }
    }

    /*
     * Instance methods
     */

    /**
     * Prepares sites to use the plugin during single or network-wide activation
     *
     * @mvc Controller
     *
     * @param bool $network_wide
     */
    public function activate($network_wide) {

        return true;
    }

    /**
     * Rolls back activation procedures when de-activating the plugin
     *
     * @mvc Controller
     */
    public function deactivate() {
        return true;
    }

    /**
     * Checks if the plugin was recently updated and upgrades if necessary
     *
     * @mvc Controller
     *
     * @param string $db_version
     */
    public function upgrade($db_version = 0) {
        return true;
    }

    /**
     * Checks that the object is in a correct state
     *
     * @mvc Model
     *
     * @param string $property An individual property to check, or 'all' to check all of them
     * @return bool
     */
    protected function is_valid($property = 'all') {
        return true;
    }

}


?>