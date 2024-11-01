<?php

/**
 * Frontend
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
if (class_exists('Zgpbld_Form_Helper')) {
    return;
}

class Zgpbld_Form_Helper {

     public static function getroute() {
        $return = array();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //post
            $return['module'] = isset($_POST['mod']) ? Zgpbld_Form_Helper::sanitizeInput($_POST['mod']) : '';
            $return['controller'] = isset($_POST['controller']) ? Zgpbld_Form_Helper::sanitizeInput($_POST['controller']) : '';
            $return['action'] = isset($_POST['action']) ? Zgpbld_Form_Helper::sanitizeInput($_POST['action']) : '';
        } elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
            //get
            $return['module'] = isset($_GET['mod']) ? Zgpbld_Form_Helper::sanitizeInput($_GET['mod']) : '';
            $return['controller'] = isset($_GET['controller']) ? Zgpbld_Form_Helper::sanitizeInput($_GET['controller']) : '';
            $return['action'] = isset($_GET['action']) ? Zgpbld_Form_Helper::sanitizeInput($_GET['action']) : '';
        } else {
            //request
            $return['module'] = isset($_REQUEST['mod']) ? Zgpbld_Form_Helper::sanitizeInput($_REQUEST['mod']) : '';
            $return['controller'] = isset($_REQUEST['controller']) ? Zgpbld_Form_Helper::sanitizeInput($_REQUEST['controller']) : '';
            $return['action'] = isset($_REQUEST['action']) ? Zgpbld_Form_Helper::sanitizeInput($_REQUEST['action']) : '';
        }
        return $return;
    }
    
    public static function check_backend_mode(){
            
      try {
            
            global $pagenow;
            
            $flag=false;
            
             if(is_admin()
               && in_array( $pagenow, array( 'post.php', 'post-new.php') )
                    ){
               $flag=true; 
            } 
           
         } catch (Exception $e) {
             $flag=false;
       }
        
        return $flag;   
            
    }
    
    public static function check_live_mode_old(){
            
      try {
             global $wp_the_query;
            
            $flag=false;
            
             if(!is_admin()
               && !post_password_required()
               && isset( $wp_the_query->post ) 
               && current_user_can( 'edit_post', $wp_the_query->post->ID )
               && isset($_GET['zigapage_live_mode'] )
               && is_singular()         
                    ){
               $flag=true; 
            } 
           
         } catch (Exception $e) {
             $flag=false;
       }
        
        return $flag;   
            
    }
    
    
    public static function check_live_mode(){ 
        
      try {
         // global $wp_the_query;
           //$user_ID = get_current_user_id();
          // die($user_ID);
            $flag=false;
             if(!is_admin()
               && !post_password_required()
               
               && isset($_GET['zigapage_live_mode'] )     
                    ){
               $flag=true; 
            } 
         } catch (Exception $e) {
             $flag=false;
       }
        return $flag;   
            
    }
    
    
    
    public static function human_filesize($bytes, $decimals = 2) {
        $size = array('B','kB','MB','GB','TB','PB','EB','ZB','YB');
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
    }
    
            
    
    public static function getHttpRequest($var) {
        $var=  strval($var);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //post
            $value = isset($_POST[$var]) ? Zgpbld_Form_Helper::sanitizeInput($_POST[$var]) :'';
        } elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
            //get
            $value = isset($_GET[$var]) ? Zgpbld_Form_Helper::sanitizeInput($_GET[$var]) :'';
        } else {
            //request
            $value = isset($_REQUEST[$var]) ? Zgpbld_Form_Helper::sanitizeInput($_REQUEST[$var]) :'';
        }
        
        return $value;
    }
    
    
    public static function array2xml($array, $xml = null) {
        if (!isset($xml)) {
            $xml = new SimpleXMLElement('<params/>');
        }
        foreach ($array as $key => $value) {
            if (is_array($value) || is_object($value)) {
                Zgpbld_Form_Helper::array2xml($value, $xml);
            } else {
                if (is_numeric($key)) {
                    if (is_string($value)) {
                        $xml->addChild('item', htmlentities($value,ENT_NOQUOTES, "UTF-8"));
                    } else {
                        $xml->addChild('item', $value);
                    }
                } elseif (is_string($value)) {
                    $xml->addChild($key, htmlentities($value,ENT_NOQUOTES, "UTF-8"));
                } else {
                    $xml->addChild($key, $value);
                }
            }
        }
        return $xml->asXML();
    }

    public static function generate_pagination() {
        
    }

    public static function convert_HexToRGB($hex) {
        // Format the hex color string
        $hex = str_replace('#', '', $hex);
        if (strlen($hex) == 3) {
            $hex = str_repeat(substr($hex, 0, 1), 2) . str_repeat(substr($hex, 1, 1), 2) . str_repeat(substr($hex, 2, 1), 2);
        }

        // Get decimal values
        $arr = array();
        $arr[] = $r = hexdec(substr($hex, 0, 2));
        $arr[] = $g = hexdec(substr($hex, 2, 2));
        $arr[] = $b = hexdec(substr($hex, 4, 2));

        return $arr;
    }

    /**
     * Sanitize input
     * 
     * @param string $string input
     * 
     * @return array
     */
    public static function sanitizeInput($string) {
        $string = filter_var($string, FILTER_SANITIZE_STRING);
        $string = stripslashes($string);
        $string = str_replace(array('‘', '’', '“', '”'), array("'", "'", '"', '"'), $string);
        $string = html_entity_decode(strip_tags($string), ENT_QUOTES, 'UTF-8');
        $string = preg_replace('/[\n\r\t]/', ' ', $string);
        $string = trim($string, "\x00..\x1F");
        $string = sanitize_text_field($string);
        return $string;
    }
    
    /**
     * Sanitize input 2
     * 
     * @param string $string input
     * 
     * @return array
     */
    public static function sanitizeInput_html($string) {
        $string = filter_var($string, FILTER_SANITIZE_STRING);
        $string = stripslashes($string);
        $string = str_replace(array('‘', '’', '“', '”'), array("'", "'", '"', '"'), $string);
        $string = html_entity_decode(strip_tags($string), ENT_QUOTES, 'UTF-8');
        $string = preg_replace('/[\n\r\t]/', ' ', $string);
        $string = trim($string, "\x00..\x1F");
        return $string;
    }
    
    /**
     * Sanitize input
     * 
     * @param string $string input
     * 
     * @return array
     */
    public static function sanitizeFnamestring($string) {
        $string = preg_replace('/\s+/', '', $string);
        $string= preg_replace("/'/i", '', $string);
        $string= preg_replace('/"/i', '', $string);
        $string= preg_replace('/[^\pL\pN]+/', '', $string);
        $string = preg_replace("/[^a-zA-Z0-9]+/", "", $string);
        $string= strtolower($string);
        return $string;
    }
    
        
    /**
     * Sanitize input
     * 
     * @param string $string input
     * 
     * @return array
     */
    public static function sanitizeFileName($string) {
        $string = preg_replace('/\s+/', '', $string);
        $string= preg_replace("/'/i", '', $string);
        $string= preg_replace('/"/i', '', $string);
        $string= preg_replace('/[^\pL\pN_-]+/', '', $string);
        $string = preg_replace("/[^a-zA-Z0-9_-]+/", "", $string);
        $string= strtolower($string);
        return $string;
    }

    
    /**
     * Sanitize recursive
     * 
     * @param string $data array
     * 
     * @return array
     */
    public static function sanitizeRecursive($data) {
        if (is_array($data)) {
            return array_map(array('Zgpbld_Form_Helper', 'sanitizeRecursive'), $data);
        } else {
            return Zgpbld_Form_Helper::sanitizeInput($data);
        }
    }
    
    /**
     * Sanitize recursive
     * 
     * @param string $data array
     * 
     * @return array
     */
    public static function sanitizeRecursive_html($data) {
        if (is_array($data)) {
            return array_map(array('Zgpbld_Form_Helper', 'sanitizeRecursive_html'), $data);
        } else {
            return Zgpbld_Form_Helper::sanitizeInput_html($data);
        }
    }
    



    public static function data_encrypt($string, $key) {
        $output = '';
       
            $result = '';
            for ($i = 0; $i < strlen($string); $i++) {
                $char = substr($string, $i, 1);
                $keychar = substr($key, ($i % strlen($key)) - 1, 1);
                $char = chr(ord($char) + ord($keychar));
                $result .= $char;
            }
            $output = base64_encode($result);
        


        return $output;
    }
 

    public static function data_decrypt($string, $key) {
        $output = '';
    
            $result = '';
            $string = base64_decode($string);

            for ($i = 0; $i < strlen($string); $i++) {
                $char = substr($string, $i, 1);
                $keychar = substr($key, ($i % strlen($key)) - 1, 1);
                $char = chr(ord($char) - ord($keychar));
                $result .= $char;
            }
            $output = $result;
        

        return $output;
    }

    public static function base64url_encode($s) {
        return str_replace(array('+', '/'), array('-', '_'), base64_encode($s));
    }

    public static function base64url_decode($s) {
        return base64_decode(str_replace(array('-', '_'), array('+', '/'), $s));
    }

    // Javascript/HTML hex encode 
    public static function encodeHex($input) {
        $temp = '';
        $length = strlen($input);
        for ($i = 0; $i < $length; $i++)
            $temp .= '%' . bin2hex($input[$i]);
        return $temp;
    }
    
    public static function check_field_length($data,$length) {
        return (strlen($data) > intval($length))? substr($data, 0, intval($length)):'';
    }
    
    public static function sql_quote( $value )
    {
        if( get_magic_quotes_gpc() )
        {
            $value = stripslashes( $value );
        }
        
        $value = addslashes( $value );
        
        return $value;
    }
    
    public static function post_store_fonts( $font_temp)
    {
       global $global_fonts_stored;
        if(!empty($font_temp['import_family']) && !in_array($font_temp['import_family'], $global_fonts_stored)){
        $global_fonts_stored[]= $font_temp['import_family'];
        }
    }
    
    public static function post_store_f_addtns($css_temp)
    {
       global $glb_f_addt_stored;
        //if(!empty($font_temp['import_family']) && !in_array($font_temp['import_family'], $glb_f_addt_stored)){
            $glb_f_addt_stored[]= $css_temp;
        //}
    }
    
    public static function is_zgpbld_page()
    {
        $vget_page=(isset($_GET['page']))?Zgpbld_Form_Helper::sanitizeInput($_GET['page']):'';
        $vpost_page=(isset($_POST['page']))?Zgpbld_Form_Helper::sanitizeInput($_POST['page']):'';
        if(( $vget_page === 'zgpb_page_builder' ) || ( $vpost_page === 'zgpb_page_builder' )) {
            return true;
        }else{
            return false;
        }
    }
    
    public static function remove_non_tag_space($text){
    $len = strlen($text);
        $out = "";
        $in_tag = false;
        for ($i = 0; $i < $len; $i++) {
            $c = $text[$i];
            if ($c == '<')
                $in_tag = true;
            elseif ($c == '>')
                $in_tag = false;

            $out .= $c == " " ? ($in_tag ? $c : "") : $c;
        }
        return $out;
    }
    
    public static function assign_alert_container($msg,$type)
    {
        $return_msg='';
        switch ($type) {
            case 1:
                /*success*/
                $return_msg.='<div class="alert alert-success" role="alert">'.$msg.'</div>';
                break;
           case 2:
                /*info*/
                $return_msg.='<div class="alert alert-info" role="alert">'.$msg.'</div>';
                break;
           case 3:
                /*warning*/
                $return_msg.='<div class="alert alert-warning" role="alert">'.$msg.'</div>';
                break;
           case 4:
                /*danger*/
                $return_msg.='<div class="alert alert-danger" role="alert">'.$msg.'</div>';
                break;  
            default:
                break;
        }
        return $return_msg;
    }
    
    /**
    * Verify if field is checked
    * 
    * @param int $row    value field
    * @param int $status status check
    * 
    * @return array
    */
    public static function getChecked($row, $status)
    {
        if ($row == $status) {
            echo "checked=\"checked\"";
        }
    }
    
    public function sanitize_output($buffer) {

    $search = array(
        '/\>[^\S ]+/s',  // strip whitespaces after tags, except space
        '/[^\S ]+\</s',  // strip whitespaces before tags, except space
        '/(\s)+/s'       // shorten multiple whitespace sequences
    );

    $replace = array(
        '>',
        '<',
        '\\1'
    );

    $buffer = preg_replace($search, $replace, $buffer);

    return $buffer;
    }
    
            
    /**
	 * Escape String
	 *
	 * @access	public
	 * @param	string
	 * @param	bool	whether or not the string will be used in a LIKE condition
	 * @return	string
	 */
	public static function escape_str($str, $like = FALSE)
	{
		if (is_array($str))
		{
			foreach ($str as $key => $val)
	   		{
				$str[$key] = $this->escape_str($val, $like);
	   		}

	   		return $str;
	   	}
                
                if (!version_compare('5.5', phpversion(), '>=')) {
                    $str = addslashes($str);
                }else{
                    if (function_exists('mysql_real_escape_string'))
                    {
                            $str = mysql_real_escape_string($str);
                    }
                    elseif (function_exists('mysql_escape_string'))
                    {
                            $str = mysql_escape_string($str);
                    }
                    else
                    {
                            $str = addslashes($str);
                    }
                }
                
		
 

		return $str;
	}
        
         
	public static function mysql_version()
	{
                
           
            
            
            if (!version_compare('5.5', phpversion(), '>=')) {
                    
                 $database_name=DB_NAME;
                $database_user=DB_USER;				
                $datadase_password=DB_PASSWORD;
                $database_host=DB_HOST;
                
                    $con=mysqli_connect($database_host,$database_user,$datadase_password,$database_name);
                    // Check connection
                    if (mysqli_connect_errno())
                    {
                   // echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }

                   $str = mysqli_get_server_info($con);
                }else{
                   $str = mysql_get_server_info();
                }

		return $str;
	}
        
        public static function isValidUrl_structure($url){
            // first do some quick sanity checks:
            if(!$url || !is_string($url)){
                return false;
            }
            // quick check url is roughly a valid http request: ( http://blah/... ) 
            if( ! preg_match('/^http(s)?:\/\/[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(\/.*)?$/i', $url) ){
                return false;
            }

            // all good!
            return true;
        }
        
       public static function encodeURIComponent($str) {
        $revert = array('%21'=>'!', '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')');
        return strtr(rawurlencode($str), $revert);
        }     
        
        public static function recurseTree($var){
        $out = '<li>';
        foreach($var as $v){
          if(is_array($v)){
            $out .= '<ul>'.Zgpbld_Form_Helper::recurseTree($v).'</ul>';
          }else{
            $out .= $v;
          }
        }
        return $out.'</li>';
      }
      
      public static function is_JSON() {
            call_user_func_array('json_decode',func_get_args());
            return (json_last_error()===JSON_ERROR_NONE);
        }
      
      /**
        * Get a substring starting from the last occurrence of a character/string
        *
        * @param  string $str The subject string
        * @param  string $last Search the subject for this string, and start the substring after the last occurrence of it.
        * @return string A substring from the last occurrence of $startAfter, to the end of the subject string.  If $startAfter is not present in the subject, the subject is returned whole.
        */
       public static function substrAfter($str, $last) {
           $startPos = strrpos($str, $last);
           if ($startPos !== false) {
               $startPos++;
               return ($startPos < strlen($str)) ? substr($str, $startPos) : '';
           }
           return $str;
       }  
       
      
}

            

?>
