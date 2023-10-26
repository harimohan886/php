<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Login extends CI_Controller
{
 public function __construct()
 {
  parent::__construct();
  // Your own constructor code
  $this->load->database();
  $this->load->helper('login_helper');
  $this->load->library('javascript');
  $this->load->library('form_validation');
  $this->load->library('email');
  $this->load->library('session');
  $this->load->dbutil();
  $this->load->helper('file');
  $this->load->helper('download');
  $this->load->helper(array('form', 'url'));
  //MY_Output's disable_cache() method
  // $this->output->disable_cache();
  if ($_SERVER['HTTP_HOST'] == "localhost") {
   $this->dire_path = $_SERVER['DOCUMENT_ROOT'] . "/";
  } else {
   $this->dire_path = $_SERVER['DOCUMENT_ROOT'] . "/";
  }
 }

 public function index()
 {
  //session_destroy();
  if (_is_user_login($this)) {
   redirect(_get_user_redirect($this));
  } else {
   $data = array("error" => "");
   if (isset($_POST)) {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('email', 'Email', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');
    if ($this->form_validation->run() == false) {
     if ($this->form_validation->error_string() != "") {
      $data["error"] = '<div class="alert alert-danger alert-dismissible" role="alert" id="error">
                                  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                  <strong>Warning!</strong> ' . $this->form_validation->error_string() . '
                                </div>';
     }
    } else {
     $email    = $this->input->post("email");
     $password = md5($this->input->post("password"));
     $where    = array("username" => $email, "password" => $password, "role" => "1");
     $this->db->select('*');
     $this->db->from('tbl_admin');
     $this->db->where($where);
     $q = $this->db->get()->result_array();
     if (!empty($q)) {
      $info = $q[0];
      if ($info['role'] == "1") {
       //session_start();
       $_SESSION['role']     = $info['role'];
       $_SESSION['admin_id'] = $info['admin_id'];
       $_SESSION['user_id']  = $info['admin_id'];
       $newdata              = array(
        'user_name'    => $info['username'],
        'user_email'   => $info['email'],
        'logged_in'    => true,
        'admin_id'     => $info['admin_id'],
        'user_id'      => $info['admin_id'],
        'user_type_id' => $info['admin_id'],
        'email'        => $info['email'],
        'password'     => $info['password'],
        'adminimage'   => $info['image'],
        'role'         => $info['role'],
       );
       $this->session->set_userdata($newdata);

       $this->session->set_flashdata('login_message', '<div class="alert background-success alert-dismissible" id="error" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Success ! </strong>Master admin login successfully.</div>');

       redirect("admin/");
       exit;
      } else {
       $data["error"] = '<div class="alert background-danger alert-dismissible " role="alert" id="error">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <strong>Error!</strong> You are not master admin. </div>';
      }
     } else {
      $data["error"] = '<div class="alert background-danger alert-dismissible " role="alert" id="error">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <strong>Error!</strong> Invalid Username and password. </div>';
     }
    }
   }
   $data["active"] = "login";
   $data["title"]  = PROJECT_NAME;
   $this->load->model("admin_model");
   $data['site_setting'] = $this->admin_model->get_sitesetting();
   $this->load->view("admin/login", $data);
  }
 }

 public function signout()
 {
  $admin_id = $this->session->userdata('admin_id');
  $role     = $this->session->userdata('role');
  if (isset($admin_id) && isset($role)) {
   if ($role == 1 && $admin_id >= 1) {
    //session_destroy();
    $this->session->sess_destroy();
    delete_cookie('ci_session');
    //ob_clean();
    //$this->session->set_flashdata('login_message', '<div class="alert background-danger alert-dismissible"  id="error" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Success ! </strong>Master admin logout successfully.</div>');
    redirect("admin/login");
   } else {
    // $this->session->set_flashdata('login_message', '<div class="alert background-danger alert-dismissible"  id="error" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Success ! </strong>Master admin logout successfully.</div>');
    redirect("admin/login");
   }
  } else {
   //$this->session->set_flashdata('login_message', '<div class="alert background-danger alert-dismissible"  id="error" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Success ! </strong>Master admin logout successfully.</div>');
   redirect("admin/login");
  }
 }
}
