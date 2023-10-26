<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(error_reporting() & ~E_DEPRECATED);
/**
 * System Helper	 
 *	
 * System Functions	
 * @author		RD
 * @version		1.0
 * @functions
 * function _enrolment_by_batch()

/**
 * sys_get_site_settings
 * Returns General settings Object. 
 * @access	public
*/
if(!function_exists('sys_get_site_settings')){
	function sys_get_site_settings(){
		$ci = &get_instance();
		$ci->load->model('general_model');
		return $settings = $ci->general_model->_get_general_settings();
	}
}


/**
 * sys_get_db_field_value
 * Gets database value. 
 * @access	public
*/
if(!function_exists('sys_get_db_field_value')){
	function sys_get_db_field_value($table,$where, $where_value,$field){
		$ci = &get_instance();
		$ci->load->model('general_model');
		return $settings = $ci->general_model->_sys_get_db_field_value($ci->config->item('lms_table_prefix').$table,$where, $where_value,$field);
	}
}


if(!function_exists('sys_get_db_multi_field_value')){
	function sys_get_db_multi_field_value($table,$where,$field){
		$ci = &get_instance();
		$ci->load->model('general_model');
		return $settings = $ci->general_model->_sys_get_db_multi_field_value($ci->config->item('lms_table_prefix').$table,$where,$field);
	}
}

/**
 * sys_get_db_field_value_sco
 * Gets database value from scorm vars. 
 * @access	public
*/
if(!function_exists('sys_get_db_field_value_sco')){
	function sys_get_db_field_value_sco($table,$where, $where_value,$field,$attempt){
		$ci = &get_instance();
		$ci->load->model('general_model');
		return $settings = $ci->general_model->_sys_get_db_field_value_sco($ci->config->item('lms_table_prefix').$table,$where, $where_value,$field, $attempt);
	}
}

/**
 * sys_get_db_field_count
 * Gets database value count. 
 * @access	public
*/
if(!function_exists('sys_get_db_field_count')){
	function sys_get_db_field_count($table,$where, $where_value,$field){
		$ci = &get_instance();
		$ci->load->model('general_model');
		return $settings = $ci->general_model->_sys_get_db_field_count($ci->config->item('lms_table_prefix').$table,$where, $where_value,$field);
	}
}

if(!function_exists('sys_get_db_multi_field_count')){
	function sys_get_db_multi_field_count($table,$where,$field){
		$ci = &get_instance();
		$ci->load->model('general_model');
		return $settings = $ci->general_model->_sys_get_db_multi_field_count($ci->config->item('lms_table_prefix').$table,$where,$field);
	}
}

/**
 * current_user_id
 * Returns user id of currently logged in user. 
 * @access	public
*/
if ( ! function_exists('current_login_details')){
	function current_login_details($userType){
		$CI =& get_instance();
		$CI->load->model('general_model');
		return $CI->general_model->current_login_details($userType);
	}
}

/**
 * current_user_id
 * Returns user id of currently logged in user. 
 * @access	public
*/
if ( ! function_exists('current_user_id')){
	function current_user_id(){
		$CI 				=& get_instance();
		return $CI->session->userdata('lms_user_id');
	}
}


/**
 * _sys_get_country
 * Get country object by country iD. 
 * @access	public
*/
if ( ! function_exists('_sys_get_country')){
	function _sys_get_country($id){
        return sys_get_db_field_value('country','cntry_id',$id,'nicename');
	}
}


if(!function_exists('_get_enum_as_array')){
	function _get_enum_as_array($table,$field){
		$ci = &get_instance();
		$ci->load->model('general_model');
		return $ci->general_model->_get_enum_as_array($ci->config->item('lms_table_prefix').$table,$field);
	}
}



/**
 * _sys_encode_data
 * Encode data. 
 * @access	public
*/
if(!function_exists('_sys_encode_data')){
	function _sys_encode_data($data){
		$ci = &get_instance();
		$ci->load->model('general_model');
		return $ci->general_model->_sys_encode_data($data);
	}
}

/**
 * _sys_decode_data
 * Decode data. 
 * @access	public
*/
if(!function_exists('_sys_decode_data')){
	function _sys_decode_data($data){
		$ci = &get_instance();
		$ci->load->model('general_model');
		return $ci->general_model->_sys_decode_data($data);
	}
}



/**
 * _sys_lang
 * Get trnaslation text 
 * @access	public
*/
if(!function_exists('_sys_lang')){
	function _sys_lang($key){
		$ci = &get_instance();
		$ci->load->model('general_model');
		return $ci->general_model->_sys_lang($key);
	}
}

if(!function_exists('_sys_langs')){
function _sys_langs($key){
		$ci = &get_instance();
		$ci->load->model('general_model');
		return $ci->general_model->_sys_langs($key);
	}
}


/**
 * jsRedirect
 * Redirect a page through Javascript
 * @access	public
*/
if ( ! function_exists('jsRedirect')){
	function jsRedirect($url=''){
		if($url != ''){
			$html='<script type="text/javascript">window.location="';
			$html.=$url;
			$html.='";</script>';
			echo $html;
			exit;
		}
	}
}


if ( ! function_exists('IsEmptyObj')){
	function IsEmptyObj($obj) {
		if($obj){
			foreach ($obj as $k) {
				return false;
			}
		}
		return true;
	}
}

if ( ! function_exists('ShowQuery')){
	function ShowQuery() {
		$ci = &get_instance();
		echo $ci->db->last_query();
		exit;
	}
}


if ( ! function_exists('_get_mailbox_recipients')){
	function _get_mailbox_recipients() {
		$ci = &get_instance();
		echo $ci->db->last_query();
		exit;
	}
}

if ( ! function_exists('_check_slot')){
	function _check_slot($id,$start,$day) {
		$ci = &get_instance();
                $ci->load->model('timetable_model');
		$result = $ci->timetable_model->get_slot_data($id,$start,$day);
                if($result->parent_id == '0'){
                    $returnvalue = "<span style='cursor:pointer;' class='slot_update_span fisrt_slot_class' data-id='".$result->ttslot_id."'>".$result->title."</span>";
                }else {
                    $returnvalue = "<span style='cursor:pointer;' class='slot_update_span' data-id='".$result->ttslot_id."'>".$result->title."</span>";
                }
                return $returnvalue;
	}
}

if ( ! function_exists('_get_weekdays_data')){
	function _get_weekdays_data($tt_id) {
		$ci = &get_instance();
                $ci->load->model('timetable_model');
		return $ci->timetable_model->get_weekdays_data($tt_id);
	}
}

if ( ! function_exists('_get_dashboard')){
	function _get_dashboard($role,$arr=NULL) {
		$ci = &get_instance();
                $ci->load->model('general_model');
		$result = $ci->general_model->get_dashboard_data($role,$arr);
                return $result;
	}
}

if ( ! function_exists('_get_dashboard_options')){
	function _get_dashboard_options($user_id) {
		$ci = &get_instance();
                $ci->load->model('general_model');
		$result = $ci->general_model->get_dashboard_options($user_id);
                return $result;
	}
}

if ( ! function_exists('_check_dashboard_user')){
	function _check_dashboard_user($user_id) {
		$ci = &get_instance();
                $ci->load->model('user_model');
		$result = $ci->user_model->_check_user_dashboard_exist($user_id);
                return $result;
	}
}

if ( ! function_exists('_get_email_by_name')){
	function _get_email_by_name($name) {
		$ci = &get_instance();
                $ci->load->model('general_model');
		$result = $ci->general_model->get_email_by_name($name);
                return $result;
	}
}

if ( ! function_exists('_check_category_in_course')){
	function _check_category_in_course($cat_id) {
		$ci = &get_instance();
                $ci->load->model('general_model');
		$result = $ci->general_model->check_category_in_course($cat_id);
                return $result;
	}
}

if ( ! function_exists('_check_week_divided_days')){
	function _check_week_divided_days($week_id) {
		$ci = &get_instance();
                $ci->load->model('general_model');
		$result = $ci->general_model->check_week_divided_days($week_id);
                return $result;
	}
}


if ( ! function_exists('_sys_get_theme_data')){
	function _sys_get_theme_data($theme_id) {
		$ci = &get_instance();
                $ci->load->model('general_model');
		$result = $ci->general_model->get_theme_data($theme_id);
                return $result;
	}
}

if ( ! function_exists('_sys_get_university_data')){
	function _sys_get_university_data($university_id) {
		$ci = &get_instance();
                $ci->load->model('university_model');
		$result = $ci->university_model->get_university_by_uni_id($university_id);
                return $result;
	}
}