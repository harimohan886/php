<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(error_reporting() & ~E_DEPRECATED);
/**
 * HTML Helper	 
 *	
 * HTML Related Functions	
 * @author		RD
 * @version		1.0
 * @functions
 * function _html_display_profile_photo()
 * function _html_display_alert_message()
 * function _html_display_error_span()
 * function _html_display_delete_button()
 * function _html_display_cancel_button()
 * function _html_display_status_button()
 * function _html_display_theme_options()
 * function _html_display_theme_footer()
**/


/**
 * _html_display_profile_photo
 * Render profile photo
 * @param	(string) $filename
 * @return	(string) $html
 * @access	public
*/
if(!function_exists('_html_display_profile_photo')){
	function _html_display_profile_photo($image , $view= 'list'){
		if($image != '' && file_exists(PHOTO_UPLOAD_PATH.$image)):
			$pic	=	PHOTO_UPLOAD_DIR.$image;
$html = <<<HTML
<img src="$pic" width="50" height="50">
HTML;
			echo $html;
			endif;
		}
}

/**
 * _html_display_alert_message
 * Render success/error message HTML
 * @return	(string) $html
 * @access	public
*/
if(!function_exists('_html_display_alert_message')){
	function _html_display_alert_message(){
		$ci = &get_instance();
		if($ci->session->flashdata('succMsg') != ''){	echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">×</button><strong>Success!&nbsp;&nbsp;</strong>'.$ci->session->flashdata("succMsg").'</div>'; }
		else if($ci->session->flashdata('errMsg') != ''){	echo '<div class="alert alert-danger"><button data-dismiss="alert" class="close" type="button">×</button><strong>Error!&nbsp;&nbsp;</strong>'.$ci->session->flashdata("errMsg").'</div>'; }
		else if($ci->session->flashdata('wrnMsg') != ''){	echo '<div class="alert alert-warning"><button data-dismiss="alert" class="close" type="button">×</button><strong>Warning!&nbsp;&nbsp;</strong>'.$ci->session->flashdata("wrnMsg").'</div>'; }
		else if($ci->session->flashdata('infMsg') != ''){	echo '<div class="alert alert-info"><button data-dismiss="alert" class="close" type="button">×</button><strong>Info!&nbsp;&nbsp;</strong>'.$ci->session->flashdata("infMsg").'</div>'; }
		else{	echo ''; }
	}
}


/**
 * _html_display_error_span
 * Render success/error message HTML
 * @return	(string) $html
 * @access	public
*/
if(!function_exists('_html_display_error_span')){
	function _html_display_error_span($key){
	$ci = &get_instance();
	$ci->load->library('session');	
	if(isset($key) && $key != ''){
		$return	=	$ci->session->flashdata('frmErr_'.$key);
	}
	$msg	=	 $return;
	if($msg == ''){
	//	$msg = $key;
	}
	if($msg != ''):
$html = <<<HTML
<span class="help-block regErr">$msg</span>
HTML;
		echo $html;
	endif;
	}

}


/**
 * _html_display_delete_button
 * Render delete button HTML
 * @param	(string) $url
 * @return	(string) $html
 * @access	public
*/
if(!function_exists('_html_display_delete_button')){
	function _html_display_delete_button($_delete_url){
                $ci = &get_instance();
		$ci->load->model('general_model');
		echo '<a data-toggle="modal" data-target="#confirm-delete" href="javascript:void(0);" data-href="'.$_delete_url.'"  title="Delete" class="btn btn-xs btn-danger" data-original-title="Delete"><i class="fa fa-times"></i></a>';
	}
}

if(!function_exists('_html_display_course_delete_button')){
	function _html_display_course_delete_button($_delete_url){
                $ci = &get_instance();
		$ci->load->model('general_model');
		echo '<a data-toggle="modal" data-target="#confirm-delete-all" href="javascript:void(0);" data-href="'.$_delete_url.'"  title="Delete" class="btn btn-xs btn-danger" data-original-title="Delete"><i class="fa fa-times"></i></a>';
	}
}

/**
 * _html_display_restore_button
 * Render retore button HTML
 * @param	(string) $url
 * @return	(string) $html
 * @access	public
*/
if(!function_exists('_html_display_restore_button')){
	function _html_display_restore_button($_restore_url){
                $ci = &get_instance();
		$ci->load->model('general_model');
		echo '<a data-toggle="modal" data-target="#confirm-restore" href="javascript:void(0);" data-href="'.$_restore_url.'"  title="Restore" class="btn btn-xs btn-success" data-original-title="Restore"><i class="fa fa-recycle"></i></a>';
	}
}

/**
 * _html_display_remove_button
 * Render remove button HTML
 * @param	(string) $url
 * @return	(string) $html
 * @access	public
*/
if(!function_exists('_html_display_remove_button')){
	function _html_display_remove_button($_remove_url){
		$ci = &get_instance();
		$ci->load->model('general_model');
		echo '<a data-toggle="modal" data-target="#confirm-remove" href="javascript:void(0);" data-href="'.$_remove_url.'"  title="Remove" class="btn btn-xs btn-danger" data-original-title="Remove"><i class="fa fa-remove"></i></a>';
	}
}

/**
 * _html_display_cancel_button
 * Render cancel button HTML
 * @param	(string) $url
 * @return	(string) $html
 * @access	public
*/
if(!function_exists('_html_display_cancel_button')){
	function _html_display_cancel_button($_return_url){
		$ci = &get_instance();
		$ci->load->model('general_model');
		echo '<button type="button" onclick="goToUrl('."'".$_return_url."'".');" class="btn btn-danger"><i class="fa fa-close"></i> Cancel</button>';
	}
}

/**
 * _html_display_status_button
 * Render cancel button HTML
 * @param	(string) $url
 * @param	(string) $status
 * @return	(string) $html
 * @access	public
*/
if(!function_exists('_html_display_status_button')){
	function _html_display_status_button($status_url, $status){
		$ci = &get_instance();
		$ci->load->model('general_model');
		if($status == 'active' || $status == '0'){
			echo '<a data-toggle="tooltip"  data-placement="left" title="Click here to de-activate this record" href="'.$status_url.'" class="btn btn-xs btn-success"> Active</a>';     /*<i class="fa fa-eye"></i>  <i class="fa fa-eye-slash"></i>*/
		}elseif($status == 'inactive' || $status == '1'){
			echo '<a data-toggle="tooltip"  data-placement="left" title="Click here to activate this record" href="'.$status_url.'"  class="btn btn-xs btn-danger btn-inactive"> Inactive</a>';
		}else{
			echo '';
		}
	}
}


/**
 * _html_display_theme_options
 * Render theme option HTML
 * @return	(string) $html
 * @access	public
*/
//if(!function_exists('_html_display_theme_options')){
//	function _html_display_theme_options(){
//		$ci 	= &get_instance();
//                $ci->load->helper('system');
//                //sys_get_db_field_value($this->ci->config->item('lms_user_table'), 'uid', current_user_id(), 'themes_id');
//		$css	= substr(CSS_URL, 0, -1);
//                $html = <<<HTML
//		<div id="theme-options" class="text-left visible-md visible-lg">
//			<a href="javascript:void(0)" class="btn btn-theme-options"><i class="fa fa-cog"></i> Theme Options</a>
//			<div id="theme-options-content">
//				<h5>Color Themes</h5>
//				<ul class="theme-colors clearfix">
//					<li><a href="javascript:void(0)" class="themed-background-default themed-border-default" data-theme="default" data-id="1" data-toggle="tooltip"  data-placement="left" title="Default"></a></li>
//					<li><a href="javascript:void(0)" class="themed-background-deepblue themed-border-deepblue" data-theme="deepblue" data-id="2" data-toggle="tooltip"  data-placement="left" title="DeepBlue"></a></li>
//					<li><a href="javascript:void(0)" class="themed-background-deepwood themed-border-deepwood" data-theme="deepwood" data-id="3" data-toggle="tooltip"  data-placement="left" title="DeepWood"></a></li>
//					<li><a href="javascript:void(0)" class="themed-background-deeppurple themed-border-deeppurple" data-theme="deeppurple" data-id="4" data-toggle="tooltip"  data-placement="left" title="DeepPurple"></a></li>
//					<li><a href="javascript:void(0)" class="themed-background-deepgreen themed-border-deepgreen" data-theme="deepgreen" data-id="5" data-toggle="tooltip"  data-placement="left" title="DeepGreen"></a></li>
//				</ul>
//				<!--<h5>Header</h5>
//				<label id="topt-fixed-header-top" class="switch switch-success" data-toggle="tooltip"  data-placement="left" title="Top fixed header"><input type="checkbox"><span></span></label>
//				<label id="topt-fixed-header-bottom" class="switch switch-success" data-toggle="tooltip"  data-placement="left" title="Bottom fixed header"><input type="checkbox"><span></span></label>
//				<label id="topt-fixed-layout" class="switch switch-success" data-toggle="tooltip"  data-placement="left" title="Fixed layout (for large resolutions)"><input type="checkbox"><span></span></label>-->
//			</div>
//		</div>
//HTML;
//		echo $html;
//	}
//}

if(!function_exists('_html_display_theme_options')){
	function _html_display_theme_options(){
		$ci 	= &get_instance();
                $ci->load->helper('system');
                //sys_get_db_field_value($this->ci->config->item('lms_user_table'), 'uid', current_user_id(), 'themes_id');
		$css	= substr(CSS_URL, 0, -1);
                $html = <<<HTML
		<div id="theme-options" class="text-left visible-md visible-lg">
			<a href="javascript:void(0)" class="btn btn-theme-options"><i class="fa fa-cog"></i> Theme Options</a>
			<div id="theme-options-content">
                            <h5>Color Themes</h5>
				<ul class="theme-colors clearfix">
                                    <li>Theme Color</li>
                                    <li><div>
                                    <div class="input-group input-colorpicker color" data-color="#db4a39">
                                        <input type="text" id="set_theme_color" name="example-input-colorpicker2" class="form-control" >
                                        <span class="input-group-addon"><i style="background-color: #db4a39"></i></span>
                                    </div>
                                </div></li>
                                <li>Theme Button Hover Color</li>
                                <li><div><div class="input-group input-colorpicker color" data-color="#db4a39" >
                                        <input type="text" id="set_theme_hover_color" name="example-input-colorpicker3" class="form-control">
                                        <span class="input-group-addon set_hover"><i style="background-color: #db4a39"></i></span>
                                    </div></div></li>
                                <li><div>
                                    <button class="btn btn-success" id="save_theme_color"><i class="fa fa-floppy-o"></i> Save</button>
                                    <button class="btn btn-danger" id="save_theme_default_color"><i class="fa fa-check"></i>Default</button>
                                </div></li>
                            </ul>
                            </div>
		</div>
HTML;
		echo $html;
	}
}




/**
 * _html_display_theme_footer
 * Render theme footer HTML
 * @return	(string) $html
 * @access	public
*/
if(!function_exists('_html_display_theme_footer')){
	function _html_display_theme_footer(){
		$ci 					= &get_instance();
		$_system_settings_data	= sys_get_site_settings();
$html = <<<HTML
<footer><span id="year-copy"></span> &copy; <strong><a href="">$_system_settings_data->institute_name</a></strong>  by <strong><a href="http://www.technoinfonet.com/" target="_blank">Technoinfonet</a></strong></footer>
HTML;
		echo $html;
	}
}


if(!function_exists('_html_display_last_post_by_category')){
	function _html_display_last_post_by_category($category_id){
		$_thread_ids	=	array();
		$_threads		=	array();
		$_post			=	array();
		$_total			=	0;
		$_html			=	'';
		
		$ci = &get_instance();
		$ci->load->model('discussions_model');
		
		$_threads	=	$ci->discussions_model->_get_threads(array('category_id'=>$category_id));

		if(isset($_threads)){
			foreach($_threads as $thread){
				array_push($_thread_ids,$thread->id);	
			}
			if(count($_thread_ids) > 0){
				$_post	=	$ci->discussions_model->_get_posts_in($_thread_ids);
				if(isset($_post->author_id)){
					$_firstname		=	sys_get_db_field_value($this->config->item('lms_profile_table'),'id',$_post->author_id,'firstname');
					$_lastname		=	sys_get_db_field_value($this->config->item('lms_profile_table'),'id',$_post->author_id,'lastname');
					$_author_name	=	$_firstname.'&nbsp;'.$_lastname;
					$_post_date		=	date('d-M-Y',$_post->date_add);
					$_html	= 'by <a class="load_user_profile" id="user_profile_'.$_post->author_id.'" href="javascript:void(0)">'.$_author_name.'</a><br><small>'.$_post_date.'</small>';
					echo $_html;
				}
			}
		}
	}
}

if(!function_exists('_html_display_total_post_by_category')){
	function _html_display_total_post_by_category($category_id){
		$_thread_ids	=	array();
		$_threads		=	array();
		$_post			=	array();
		$_total			=	0;
		$_html			=	'';
		
		$ci = &get_instance();
		$ci->load->model('discussions_model');
		
		$_threads	=	$ci->discussions_model->_get_threads(array('category_id'=>$category_id));

		if(isset($_threads)){
			foreach($_threads as $thread){
				array_push($_thread_ids,$thread->id);	
			}
			if(count($_thread_ids) > 0){
				$_post	=	$ci->discussions_model->_get_total_posts_in($_thread_ids);
				if(isset($_post->author_id)){
					$_firstname		=	sys_get_db_field_value($this->config->item('lms_profile_table'),'id',$_post->author_id,'firstname');
					$_lastname		=	sys_get_db_field_value($this->config->item('lms_profile_table'),'id',$_post->author_id,'lastname');
					$_author_name	=	$_firstname.'&nbsp;'.$_lastname;
					$_post_date		=	date('d-M-Y',$_post->date_add);
					$_html			= 'by <a class="load_user_profile" id="user_profile_'.$_post->author_id.'" href="javascript:void(0)">'.$_author_name.'</a><br><small>'.$_post_date.'</small>';
				}
			}
		}
		echo $_html;
	}
}

//---------------------------------------------LTI-----------------
function curPageURL() {
	$pageURL 	= (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != "on")	? 'http'	: 	'https';
	$pageURL 	.= "://";
	$pageURL 	.= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	return $pageURL;
}

// Warning - this is n-squared for large files
function zip_open_and_read_entry($file_name, $zip_file) {
	if ( ! function_exists('zip_open' ) ) {
		echo("<!-- zip_open is not supported in this PHP -->\n");
		return;
	}
	$zip = zip_open($file_name);
	if (! is_resource($zip)) return;
	while ($zip_entry = zip_read($zip)) {
		if ( zip_entry_name($zip_entry) != $zip_file ) continue;
		if (zip_entry_open($zip, $zip_entry, "r")) {
			$buf = zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
			zip_entry_close($zip_entry);
			zip_close($zip);
			return $buf;
		}
	}
	zip_close($zip);
}

$default_desc = str_replace("CUR_URL", str_replace("lms.php", "tool.php", curPageURL()), 
'<?xml version="1.0" encoding="UTF-8"?>
<basic_lti_link xmlns="http://www.imsglobal.org/services/cc/imsblti_v1p0" 
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
<title>A Simple Descriptor</title>
<custom>
<parameter key="Cool:Factor">120</parameter>
</custom>
<launch_url>CUR_URL</launch_url>
</basic_lti_link>');




	function _sys_load_field_msg($key){
		$return=	'';
		$ci = &get_instance();
		$ci->load->library('session');	
		if(isset($key) && $key != ''){
			$return	=	$ci->session->flashdata('frmErr_'.$key);
		}
		echo $return;
	}
	function _sys_load_field_val($key){
		$return=	'';
		$ci = &get_instance();
		$ci->load->library('session');	
		if(isset($key) && $key != ''){
			$return	=	$ci->session->flashdata('frmSub_'.$key);
		}
		echo $return;
	}








