<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Admin extends CI_Controller
{

 private $selectedlanguage;

 public function __construct()
 {
  header("Cache-Control: no cache");
  session_cache_limiter("private_no_expire");
  parent::__construct();
  // Your own constructor code
  $this->load->database();
  $this->load->helper('login_helper');
  $this->load->library('javascript');
  $this->load->library('form_validation');
  $this->load->library('email');
  $this->load->library('session');
  $this->load->dbutil();
  $this->load->helper('url');
  $this->load->helper('file');
  $this->load->helper('download');
  $this->load->helper('db_dinamic_helper');
  $this->load->library('zip');
  $this->load->model("Common_model");
  //MY_Output's disable_cache() method
  // $this->output->disable_cache();
  $this->load->helper(array('form', 'url'));
  if ($_SERVER['HTTP_HOST'] == "localhost") {
   $this->dire_path = $_SERVER['DOCUMENT_ROOT'] . "/admin/";
  } else {
   $this->dire_path = $_SERVER['DOCUMENT_ROOT'] . "/admin/";
  }

  $database_name = switch_db_dinamico();
  if ($database_name == "db_ar") {
   $this->lang->load('locale', 'arabic');
   $language = "ar";
  } else {
   $this->lang->load('locale', 'english');
   $language = "en";
  }
  $this->selectedlanguage = $language;
 }

 public function index()
 {

  if (_is_user_login($this)) {

   $admin_id = $this->session->userdata('admin_id');
   $role     = $this->session->userdata('role');
   if ($role == 1 && $admin_id >= 1) {
    redirect('admin/dashboard');
   }
  } else {
   redirect('admin/login');
   exit;
  }
 }

 public function dashboard()
 {
  if (_is_user_login($this)) {
   $admin_id = $this->session->userdata('admin_id');
   $role     = $this->session->userdata('role');
   /*echo "<pre>"; echo "hello"; exit;*/
   if ($role == 1 && $admin_id >= 1) {
    // $data = array();
    $data["error"]     = "";
    $data["pageTitle"] = "Admin Dashboard";
    $data['admin']     = "Admin";
    $data['page']      = "Dashboard";
    $data["title"]     = PROJECT_NAME;
    $data['action']    = "Dashboard";
    $this->load->model("Tour_dealer_model");
    $data['tour_pending_count']      = $this->Tour_dealer_model->get_pending_tour_dealer_list_count(1);
    $data['car_pending_count']       = $this->Tour_dealer_model->get_pending_tour_dealer_list_count(2);
    $data['guide_pending_count']     = $this->Tour_dealer_model->get_pending_tour_dealer_list_count(3);
    $data['medical_pending_count']   = $this->Tour_dealer_model->get_pending_tour_dealer_list_count(4);
    $data['education_pending_count'] = $this->Tour_dealer_model->get_pending_tour_dealer_list_count(5);
    $data['corporate_pending_count'] = $this->Tour_dealer_model->get_pending_tour_dealer_list_count(6);
    /*echo "<pre>"; print_r($data); exit;*/
    $this->load->view("admin/dashboard", $data);
   } else {
    redirect('login');
   }
  } else {
   redirect('login');
  }
 }

 public function change_status()
 {
  $table    = $this->input->post("table");
  $id       = $this->input->post("id");
  $on_off   = $this->input->post("on_off");
  $id_field = $this->input->post("id_field");
  $status   = $this->input->post("status");
  $this->Common_model->data_update($table, array("$status" => $on_off), array("$id_field" => $id));
  echo $_POST['on_off'];

 }

 public function fetch_notification_toast()
 {
  if (_is_user_login($this)) {
   $admin_id = $this->session->userdata('admin_id');
   $role     = $this->session->userdata('role');
   if ($admin_id >= 1) {
    $user_id = $this->session->userdata('user_id');
    $this->load->model("notification_model");
    $data_notification       = $this->notification_model->get_unread_notification();
    $data_notification_toast = array();

    foreach ($data_notification as $k => $v) {
     $data_notification_toast[$k]['id']      = $v->id;
     $data_notification_toast[$k]['message'] = $v->message;
    }

    $data = array('notification_toast' => $data_notification_toast);
    echo json_encode($data);
   } else {
    redirect('login');
   }
  } else {
   redirect('login');
  }
 }

 public function db_backup()
 {
  $this->load->dbutil();
  $db_format = array("format" => "zip", "filename" => "my_db_backup.sql");
  $backup    = $this->dbutil->backup($db_format);
  $dbname    = PROJECT_NAME . "_" . date('Y-m-d-H-i-s') . '.zip';
  $save      = FCPATH . 'db/backup/' . $dbname;
  if (write_file($save, $backup) == false) {
   echo "Error while creating auto database backup!";
  } else {
   echo "Database backup has been successfully Created";
  }
  exit;
  // @force_download($dbname, $backup);
 }

 public function db_restore()
 {
  $this->load->model("business_model");
  $this->business_model->get_set_all_data();
 }

 public function settings()
 {
  if (_is_user_login($this)) {
   $data              = array();
   $data["error"]     = "";
   $data["pageTitle"] = "Admin Settings";
   $data["title"]     = PROJECT_NAME;
   $data['admin']     = "Admin";
   $data['page']      = "Settings";
   $data['language']  = $this->selectedlanguage;
   $admin_id          = $this->session->userdata('admin_id');
   $role              = $this->session->userdata('role');

   if ($admin_id >= 1) {
    $user_id = $this->session->userdata('user_id');
    $this->load->model("admin_model");
    $data['admindata'] = $this->admin_model->get_detail_by_id($user_id);

    if (isset($_REQUEST['save_button']) && !empty($_REQUEST['save_button']) && $_REQUEST['save_button'] === "Update") {
     $this->load->library('form_validation');
     $this->form_validation->set_rules('username', 'User Name', 'trim|required');
     $this->form_validation->set_rules('email', 'Email', 'trim|required');

     if ($this->form_validation->run() == false) {
      $data["error"] = '<div class="alert alert-warning alert-dismissible" role="alert" id="error">
                              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <strong>Warning !</strong> ' . $this->form_validation->error_string() . '
                            </div>';

      $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible" role="alert" id="error">
                              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <strong>Warning !</strong> ' . $this->form_validation->error_string() . '
                            </div>');
      // $data["error"] = $this->form_validation->error_string();
     } else {
      $name         = $this->input->post("username");
      $email        = $this->input->post("email");
      $old_password = $this->input->post("oldpassword");
      $new_password = $this->input->post("newpassword");
      $con_password = $this->input->post("confirmpassword");
      $update_array = array();

      $update_array = array();
      if ($_FILES["image"]["size"] > 0) {
       $uploadpath   = $this->config->item('admin_images_path');
       $file_name    = $this->file_upload($_FILES["image"], $uploadpath);
       $update_array = array("image" => $file_name);
      }

      if (!empty($old_password)) {
       $exist_password = $data['admindata']->password;

       if ($exist_password != md5($old_password)) {
        $data["error"] = '<div class="alert alert-warning" role="alert"><button class="close" data-dismiss="alert"></button>
                                          <strong>Warning ! </strong> Old password and Exist Password is not Match with system</div>';

        $this->session->set_flashdata("message", '<div class="alert background-warning alert-dismissible" role="alert"><button class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                          <strong>Warning ! </strong> Old password and Exist Password is not Match with system</div>');
        redirect("admin/settings");
        exit;

       } else {
        if (empty($new_password) && empty($con_password)) {
         $data["error"] = '<div class="alert alert-warning" role="alert"><button class="close" data-dismiss="alert"></button>
                                          <strong>Warning ! </strong> Please Insert New Password & Confirm Password !</div>';

         $this->session->set_flashdata("message", '<div class="alert background-warning alert-dismissible" role="alert"><button class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                          <strong>Warning ! </strong> Please Insert New Password & Confirm Password !</div>');
         redirect("admin/settings");
         exit;
        } else {
         if (!empty($new_password)) {
          if (empty($con_password)) {
           $data["error"] = '<div class="alert alert-warning" role="alert"><button class="close" data-dismiss="alert"></button>
                                                <strong>Warning ! </strong> Please insert confirm password !</div>';

           $this->session->set_flashdata("message", '<div class="alert background-warning alert-dismissible" role="alert"><button class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                <strong>Warning ! </strong> Please insert confirm password !</div>');
           redirect("admin/settings");
           exit;
          } else {
           if (empty($new_password)) {
            $data["error"] = '<div class="alert alert-warning" role="alert"><button class="close" data-dismiss="alert"></button>
                                                    <strong>Warning ! </strong> Please Insert New Password !</div>';

            $this->session->set_flashdata("message", '<div class="alert background-warning alert-dismissible" role="alert"><button class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <strong>Warning ! </strong> Please Insert New Password !</div>');
            redirect("admin/settings");
            exit;
           } else {
            if ($new_password != $con_password) {
             $data["error"] = '<div class="alert alert-warning" role="alert"><button class="close" data-dismiss="alert"></button>
                                                      <strong>Warning ! </strong>  New password and confirm Password is not Match</div>';

             $this->session->set_flashdata("message", '<div class="alert background-warning alert-dismissible" role="alert"><button class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                      <strong>Warning ! </strong>  New password and confirm Password is not Match</div>');
             redirect("admin/settings");
             exit;
            } else {
             if (isset($update_array)) {
              $update_array['password']     = md5($new_password);
              $update_array['org_password'] = $new_password;
             } else {
              $this->session->set_flashdata("message", '<div class="alert background-danger alert-dismissible" role="alert"><button class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                                <strong>Warning ! </strong>  Password not Changed please try again</div>');
              redirect("admin/settings");
              exit;
             }
            }
           }

          }
         }
        }
       }
      }

      if (count($data) >= 5) {
       $update_array1 = array("username" => $name, "email" => $email);
       $update        = array_merge($update_array1, $update_array);

       $this->load->model("common_model");
       $this->common_model->data_update("tbl_admin", $update, array("admin_id" => $user_id));

       $data["error"] = '<div class="alert alert-success" role="alert">
                                            <button class="close" data-dismiss="alert"></button>
                                            <strong>Success ! </strong>Profile Updated Successfully.
                                            </div>';

       $this->session->set_flashdata("message", '<div class="alert background-success alert-dismissible" role="alert">
                                            <button class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <strong>Success ! </strong>Profile Updated Successfully.
                                            </div>');

       $where = array("admin_id" => $user_id);
       $this->db->select('*');
       $this->db->from('tbl_admin');
       $this->db->where($where);
       $q = $this->db->get()->result_array();

       if (!empty($q)) {
        $info    = $q[0];
        $newdata = array(
         'user_name'    => $info['username'],
         'user_email'   => $info['email'],
         'logged_in'    => true,
         'user_id'      => $info['admin_id'],
         'user_type_id' => $info['admin_id'],
         'email'        => $info['email'],
         'password'     => $info['password'],
         'adminimage'   => $info['image'],
        );
        $this->session->set_userdata($newdata);
        // redirect(_get_user_redirect($this));
        redirect("admin/settings");
        exit;
       }
      }
     }
    }
    $this->load->view('admin/profile/settings', $data);
   } else {
    redirect('login');
   }
  } else {
   redirect('login');
  }
 }

 public function get_random_otp($length = 10, $sting = "")
 {
  if (empty($sting)) {
   $alphabet = "0123456789";
  } else {
   $alphabet = $sting;
  }
  $token       = "";
  $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
  for ($i = 0; $i < $length; $i++) {
   $n = rand(0, $alphaLength);
   $token .= $alphabet[$n];
  }
  return $token;
 }

 public function numberTowords($number)
 {
  // $number = 24500.026;
  $no       = round($number);
  $point    = round($number - $no, 2) * 100;
  $hundred  = null;
  $digits_1 = strlen($no);
  $i        = 0;
  $str      = array();
  $words    = array('0' => '', '1'          => 'One', '2'       => 'Two',
   '3'                   => 'Three', '4'     => 'Four', '5'      => 'Five', '6' => 'Six',
   '7'                   => 'Seven', '8'     => 'Eight', '9'     => 'Nine',
   '10'                  => 'Ten', '11'      => 'Eleven', '12'   => 'Twelve',
   '13'                  => 'Thirteen', '14' => 'Fourteen',
   '15'                  => 'Fifteen', '16'  => 'Sixteen', '17'  => 'Seventeen',
   '18'                  => 'Eighteen', '19' => 'Nineteen', '20' => 'Twenty',
   '30'                  => 'Thirty', '40'   => 'Forty', '50'    => 'Fifty',
   '60'                  => 'Sixty', '70'    => 'Seventy',
   '80'                  => 'Eighty', '90'   => 'Ninety');
  $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');

  while ($i < $digits_1) {
   $divider = ($i == 2) ? 10 : 100;
   $number  = floor($no % $divider);
   $no      = floor($no / $divider);
   $i += ($divider == 10) ? 1 : 2;

   if ($number) {
    $plural  = (($counter = count($str)) && $number > 9) ? 's' : null;
    $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
    $str[]   = ($number < 21) ? $words[$number] .
    " " . $digits[$counter] . $plural . " " . $hundred
    :
    $words[floor($number / 10) * 10]
     . " " . $words[$number % 10] . " "
     . $digits[$counter] . $plural . " " . $hundred;
   } else {
    $str[] = null;
   }

  }
  $str    = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
  "." . $words[$point / 10] . " " .
  $words[$point = $point % 10] : '';
  return $result . "Rupees  " . $points . " Paise";
 }

 public function forgot_password()
 {
  if (isset($_POST['email'])) {
   $this->load->library('form_validation');
   $this->form_validation->set_rules('email', 'Email', 'trim|required');

   if ($this->form_validation->run() == false) {
    if ($this->form_validation->error_string() != "") {
     $data["error"] = '<div class="alert alert-warning alert-dismissible" role="alert" id="error">
                                      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                      <strong>Warning!</strong> ' . $this->form_validation->error_string() . '
                                    </div>';
    }
   } else {
    $email       = $this->input->post("email");
    $where       = array("email" => $email);
    $login       = "SELECT * FROM  `tbl_admin` WHERE `email`='$email' AND `role`='1'";
    $login_infos = $this->Basic->select_custom($login);

    if (count($login_infos) > 0) {
     $info = $login_infos[0];
     if ($info['activestatus'] == 'Y') {
      $name          = $info['username'];
      $org_password  = $info['org_password'];
      $email         = $info['email'];
      $domainname    = $_SERVER['SERVER_NAME'];
      $from_email    = $this->config->item('SUPPORT_URL');
      $from_company  = $this->config->item('project_name');
      $logo          = base_url() . "images/Logo.png";
      $email_message = $this->load->view('email/admin_forgot_password', $data = array('name' => $name, 'from_email' => $from_email, 'from' => $from_company, 'logo' => $logo, 'domainname' => $domainname, 'newpassword' => $org_password), true);
      $subject       = "Food Posting admin password";
      $to            = strtolower($email);
      // $to = 'kunj.sinontechs@gmail.com';

      $this->load->config('email');
      $this->load->library('email');
      $from    = $this->config->item('smtp_user');
      $message = $email_message;
      $this->email->from('php.sinontechs@gmail.com', 'School');
      $this->email->set_newline("\r\n");
      $this->email->to($to);
      $this->email->subject($subject);
      $this->email->message($message);

      if ($this->email->send()) {

      } else {
       // echo $this->email->print_debugger();
      }

      $data["error"] = '<div class="alert background-success alert-dismissible " role="alert" id="error">
                                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <strong>Success ! </strong> check your email you have received new password.</div>';

     } else {
      $data["error"] = '<div class="alert background-danger alert-dismissible " role="alert" id="error">
                                  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                  <strong>Error!</strong> Your account is deactive by admin.</div>';
     }
    } else {
     $data["error"] = '<div class="alert background-danger alert-dismissible " role="alert" id="error">
                                  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                  <strong>Error!</strong> Invalid email address. </div>';
     // $this->load->view("restaurant/forgot_password",$data);
    }
   }
  }
  $data['language'] = $this->selectedlanguage;
  $data["active"]   = "login";
  $data["title"]    = PROJECT_NAME;
  $this->load->model("admin_model");
  $data['site_setting'] = $this->admin_model->get_sitesetting();
  $this->load->view("admin/forgot_password", $data);
 }

 public function profile()
 {
  if (_is_user_login($this)) {
   $user_id = $this->session->userdata('user_id');
   $data    = array();
   $this->load->model("admin_model");
   $admindata = $this->admin_model->get_detail_by_id($user_id);

   $data["admindata"] = $admindata;
   $data['language']  = $this->selectedlanguage;
   if (isset($_REQUEST)) {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('name', 'User Name', 'trim|required');
    $this->form_validation->set_rules('email', 'Email', 'trim|required');

    if ($this->form_validation->run() == false) {
     $data["error"] = $this->form_validation->error_string();
    } else {
     $name         = $this->input->post("name");
     $email        = $this->input->post("email");
     $old_password = $this->input->post("oldpassword");
     $new_password = $this->input->post("newpassword");
     $con_password = $this->input->post("confirmpassword");

     $update_array = array();
     if (!empty($old_password)) {
      $exist_password = $this->session->userdata('password');

      if ($exist_password != md5($old_password)) {
       $data["error"] = "<strong>Warning!</strong> Old password and Exist Password is not Match with system";
      } else {
       if (empty($new_password) && empty($con_password)) {
        $data["error"] = "<strong>Warning!</strong> Please Insert New Password & Confirm Password !";
       } else {
        if (!empty($new_password)) {
         if (empty($con_password)) {
          $data["error"] = "<strong>Warning!</strong> Please Insert Confirm Password !";
         }
        }
        if (!empty($con_password)) {
         if (empty($new_password)) {
          $data["error"] = "<strong>Warning!</strong> Please Insert New Password !";
         }
        }
        if ($new_password != $con_password) {
         $data["error"] = "<strong>Warning!</strong> New password and confirm Password is not Match";
        } else {
         $update_array = array("password" => md5($new_password));
        }
       }
      }
     }
     if (count($update_array) <= 0) {
      $update_array = array();
     }
     if (count($data) == 1) {
      $update_array1 = array("name" => $name, "email" => $email);
      $update        = array_merge($update_array1, $update_array);
      $this->load->model("common_model");
      $this->common_model->data_update("tbl_admin", $update, array("id" => $user_id));
      $data["error"] = "<strong>Success!</strong> Profile Updated Successfully";
     }
    }
   }
   $this->load->view('admin/profile/edit', $data);
  } else {
   redirect('login');
  }
 }

 public function get_random_string($length = 10)
 {
  $alphabet    = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
  $token       = "";
  $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
  for ($i = 0; $i < $length; $i++) {
   $n = rand(0, $alphaLength);
   $token .= $alphabet[$n];
  }
  return $token;
 }
 public function site()
 {
  /*echo "<pre>"; echo "hello"; exit;*/
  if (_is_admin_login($this)) {
   $user_id  = $this->session->userdata('user_id');
   $admin_id = $this->session->userdata('admin_id');
   $role     = $this->session->userdata('role');
   if ($admin_id >= 1) {
    $data              = array();
    $data["error"]     = "";
    $data["pageTitle"] = "Admin Site Settings";
    $data["title"]     = PROJECT_NAME;
    $data['admin']     = "Admin";
    $data['page']      = "Site Settings";
    $this->load->model("admin_model");
    $data['site_setting'] = $this->admin_model->get_sitesetting();
    $data['language']     = $this->selectedlanguage;

    if (isset($_POST) && !empty($_POST) && $_POST['save_button'] == 'Update') {
     $siteupdate = array();
     $uploadpath = $this->config->item('logo_uploaded_path');
     if (isset($_FILES['header_logo']) && !empty($_FILES['header_logo']['name']) && $_FILES['header_logo']['size'] > 0) {
      $headerlogo = $this->file_upload($_FILES['header_logo'], $uploadpath);
      if (!empty($headerlogo)) {
       $siteupdate['header_logo'] = $headerlogo;
      }
     }
     if (isset($_FILES['background_logo']) && !empty($_FILES['background_logo']['name']) && $_FILES['background_logo']['size'] > 0) {
      $backgroundlogo = $this->file_upload($_FILES['background_logo'], $uploadpath);
      if (!empty($backgroundlogo)) {
       $siteupdate['background_logo'] = $backgroundlogo;
      }
     }
     if (isset($_FILES['footer_logo']) && !empty($_FILES['footer_logo']['name']) && $_FILES['footer_logo']['size'] > 0) {
      $footerlogo = $this->file_upload($_FILES['footer_logo'], $uploadpath);
      if (!empty($footerlogo)) {
       $siteupdate["footer_logo"] = $footerlogo;
      }
     }
     $siteupdate['site_description'] = isset($_POST['site_description']) ? $_POST['site_description'] : "";
     $siteupdate['modified_at']      = date("Y-m-d H:i:s");
     $this->load->model("common_model");
     $this->common_model->data_update("tbl_site_setting", $siteupdate, array("id" => 1));
     $data["error"] = "<strong>Success!</strong> Site Setting Updated Successfully";
     $this->session->set_flashdata("message", '<div class="alert background-success" role="alert" id="error"><button class="close" data-dismiss="alert"></button><strong>Success ! </strong> Site Setting Updated Successfully</div>');
     redirect("admin/site");
    }
    $this->load->view('admin/profile/sitesetting', $data);
   } else {
    redirect('login');
   }
  } else {
   redirect('login');
  }
 }

 private function file_upload($arr, $path)
 {
  set_time_limit(0);
  if ($arr['error'] == 0) {
   $temp          = explode(".", $arr["name"]);
   $random_number = $this->get_random_number(10);
   $file_name     = $random_number . '.' . end($temp);
   $file_path     = $path . $file_name;
   if (move_uploaded_file($arr["tmp_name"], $file_path) > 0) {
    $ret = $file_name;
   } else {
    $ret = "";
   }
  }
  return $ret;
 }

 private function get_random_number($length = 10, $sting = "")
 {
  if (empty($sting)) {
   $alphabet = "012345678901234567890123456789";
  } else {
   $alphabet = $sting;
  }
  $token       = "";
  $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
  for ($i = 0; $i < $length; $i++) {
   $n = rand(0, $alphaLength);
   $token .= $alphabet[$n];
  }
  return $token;
 }
}
