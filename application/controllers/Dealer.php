<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Dealer extends CI_Controller {

    public function __construct() {
            parent::__construct();
            // Your own constructor code
            $this->load->database();
            $this->load->helper('login_helper');
            $this->load->library('javascript');
            $this->load->library('form_validation');
            $this->load->library('email');
            $this->load->library('session');
            $this->load->model("World_wide_model");
            $this->load->dbutil();
            $this->load->helper('file');
            $this->load->helper('download');
            $this->load->helper(array('form', 'url'));
            
            if ($_SERVER['HTTP_HOST'] == "localhost") {
                $this->dire_path = $_SERVER['DOCUMENT_ROOT'] . "/";
            } 
            else {
                $this->dire_path = $_SERVER['DOCUMENT_ROOT'] . "/";
            }
    }

    function index() {
            if (_is_dealer_login($this)) {
                $dealer_id = $this->session->userdata('dealer_id');
                $role =  $this->session->userdata('role');
                if(($role == 1 || $role == 2 || $role == 3 || $role == 4 || $role == 5 || $role == 6 ) && $dealer_id >= 1) {
                    redirect('dealer/dashboard');
                }
            } 
            else {
                redirect('dealers-login');
                exit;
            }
    }

    function dashboard() {
            if (_is_dealer_login($this)) {
                $dealer_id = $this->session->userdata('dealer_id');
                $role =  $this->session->userdata('dealer_role');

                if(($role == 1 || $role == 2 || $role == 3 || $role == 4 || $role == 5 || $role == 6 ) && $dealer_id >= 1) {
                    $data = array();
                    $data["error"] = "";
                    $data["pageTitle"] = "DealerDashboard";
                    $data['admin'] = "Dealer";
                    $data['page'] = "Dashboard";
                    $data["title"] = PROJECT_NAME;
                    $data['action'] = "Dashboard";
                    $data['role'] = $role;
                    $this->load->view("dealer/dashboard", $data);
                } 
                else {
                    redirect('dealer-login');
                }
            } 
            else { 
                redirect('dealers/login');
                exit;
            }
    }

    public function change_status() {
            $table = $this->input->post("table");
            $id = $this->input->post("id");
            $on_off = $this->input->post("on_off");
            $id_field = $this->input->post("id_field");
            $status = $this->input->post("status");
            $this->db->update($table, array("$status" => $on_off), array("$id_field" => $id));
            echo $_POST['on_off'];
    }

    public function fetch_notification_toast() {
            if (_is_partner_login($this)) {
                $admin_id = $this->session->userdata('partner_id');
                $role =  $this->session->userdata('role');
                if($admin_id >= 1) {
                    $partner_id = $this->session->userdata('partner_id');
                    $this->load->model("notification_model");
                    $data_notification = $this->notification_model->get_unread_notification($partner_id);

                    $data_notification_toast=array();
                    foreach($data_notification as $k=>$v){
                        $data_notification_toast[$k]['id'] = $v->id;
                        $data_notification_toast[$k]['title'] = $v->title;
                        $data_notification_toast[$k]['description'] = $v->description;
                    }
                    $data = array( 'notification_toast' => $data_notification_toast,);
                    echo json_encode($data);
                } 
                else {
                    redirect('partners-login');
                }
            } 
            else {
                redirect('partners-login');
            }
    }

    public function notifications_list(){
            if (_is_partner_login($this)) {
                $admin_id = $this->session->userdata('partner_id');
                $data["error"] = "";
                $data["pageTitle"] = "Partners Notification";
                $data["title"] = PROJECT_NAME;
                $data['admin'] = "Partners";
                $data['page'] = "Notification";
                $data['action'] = "view";
                $this->load->model('notification_model');
                $data['noti']=$this->notification_model->get_all_notification_by_id($admin_id);
                $data['language'] = $this->selectedlanguage;
                $this->load->view('partners/notification/list',$data);
            } 
            else{
                redirect('partners-login'); 
            }
    }

    public function notification_view($id){
            if (_is_partner_login($this)) {
                $data = array();
                $data["error"] = "";
                $data["pageTitle"] = "Partners Notification";
                $data["title"] = PROJECT_NAME;
                $data['admin'] = "Partners";
                $data['page'] = "Notification";
                $data['action'] = "view";
                $this->load->model('notification_model');
                $data['noti']=$this->notification_model->get_notification_by_id($id);
                $updatenoti=array();
                $updatenoti['is_read']='1';
                $this->load->model('common_model');
                $this->common_model->data_update_new('tbl_notification',$updatenoti,array('id'=>$id));
                $data['language'] = $this->selectedlanguage;
                $this->load->view('partners/notification/view',$data);
            } else{
                redirect('partners-login'); 
            }
    } 
    public function db_backup(){
            $this->load->dbutil();
            $db_format = array("format"=>"zip","filename"=>"my_db_backup.sql");
            $backup = $this->dbutil->backup($db_format);
            $dbname = PROJECT_NAME."_".date('Y-m-d-H-i-s').'.zip';
            $save = FCPATH.'db/backup/'.$dbname;
            if (write_file($save,$backup)== FALSE) {
                echo "Error while creating auto database backup!";
            } 
            else {
                echo "Database backup has been successfully Created";
            }
            exit;
            // @force_download($dbname, $backup);
    }

    public function db_restore() {
            $this->load->model("business_model");
            $this->business_model->get_set_all_data();
    }

    function settings() {
            if (_is_dealer_login($this)) {
                $data = array();
                $data["error"] = "";
                $data["pageTitle"] = "Partners Settings";
                $data["title"] = PROJECT_NAME;
                $data['admin'] = "Partners";
                $data['page'] = "Settings";

                $admin_id = $this->session->userdata('dealer_id');
                $role =  $this->session->userdata('role');
                if(($role == 2 || $role == 3 || $role == 4  || $role == 1)) {
                    $partner_id = $this->session->userdata('dealer_id');
                    $this->load->model("dealer_model");
                    $data['admindata'] = $this->dealer_model->get_dealer_list_by_id($partner_id);
                    if (isset($_REQUEST['save_button']) && !empty($_REQUEST['save_button']) && $_REQUEST['save_button'] === "Update") {
                        $this->load->library('form_validation');
                        $this->form_validation->set_rules('username', 'Name', 'trim|required');
                        $this->form_validation->set_rules('email', 'Email', 'trim|required');

                        if ($this->form_validation->run() == FALSE) {
                            $data["error"] = '<div class="alert alert-warning alert-dismissible" role="alert" id="error">
                              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <strong>Warning !</strong> ' . $this->form_validation->error_string() . '
                            </div>';

                            $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible" role="alert" id="error">
                              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <strong>Warning !</strong> ' . $this->form_validation->error_string() . '
                            </div>');
                            // $data["error"] = $this->form_validation->error_string();
                        } 
                        else {
                            /*echo "<pre>"; print_r($_POST); exit;*/
                            $name = $this->input->post("username");
                            $email = $this->input->post("email");
                            $location = $this->input->post("location");
                            $city = $this->input->post("city");
                            $state = $this->input->post("state");
                            $country = $this->input->post("country");
                            $countryname = $this->World_wide_model->get_country_list_by_id($country);
                            $statename = $this->World_wide_model->get_state_list_by_id($state);
                            $cityname = $this->World_wide_model->get_city_list_by_id($city);
                            $countryname = $countryname->name;
                            $statename = $statename->name;
                            $cityname = $cityname->name;
                            $latlong=$this->getlatlng($location,$cityname,$statename,$countryname);
                            $c_latitude=$latlong['latitude'];
                            $c_longitude=$latlong['longitude'];
                            $old_password = $this->input->post("oldpassword");
                            $new_password = $this->input->post("newpassword");
                            $con_password = $this->input->post("confirmpassword");
                            $exist_password = $data['admindata']->password;
                            $update_array = array();
                            
                            $update_array = array();
                            if (!empty($old_password)) {
                                if ($exist_password != md5($old_password)) {
                                    $data["error"] = '<div class="alert alert-warning" role="alert"><button class="close" data-dismiss="alert"></button>
                                          <strong>Warning ! </strong> Old password and Exist Password is not Match with system</div>';

                                          $this->session->set_flashdata("message",'<div class="alert alert-warning" role="alert"><button class="close" data-dismiss="alert"></button>
                                          <strong>Warning ! </strong> Old password and Exist Password is not Match with system</div>'); 
                                           redirect("partners/settings");
                                                    exit;
                                }
                                else if ($old_password == $new_password) {
                                    $data["error"] = '<div class="alert alert-danger" role="alert">
                                            <button class="close" data-dismiss="alert"></button>
                                            <strong>Success ! </strong>Do Not Enter Same Old Password And New Password  !.
                                            </div>';
                                              $this->session->set_flashdata("message",'<div class="alert alert-danger" role="alert">
                                            <button class="close" data-dismiss="alert"></button>
                                            <strong>Success ! </strong>Do Not Enter Same Old Password And New Password  !.
                                            </div>'); 
                                    redirect('partners/settings');
                                    exit;
                                }  
                                else {
                                    if (empty($new_password) && empty($con_password)) {
                                        $data["error"] = '<div class="alert alert-warning" role="alert"><button class="close" data-dismiss="alert"></button>
                                          <strong>Warning ! </strong> Please Insert New Password & Confirm Password !</div>';

                                          $this->session->set_flashdata("message",'<div class="alert alert-warning" role="alert"><button class="close" data-dismiss="alert"></button>
                                          <strong>Warning ! </strong> Please Insert New Password & Confirm Password !</div>'); 
                                            redirect("partners/settings");
                                            exit;
                                    } 
                                    else {
                                        if (!empty($new_password)) {
                                            if (empty($con_password)) {
                                                $data["error"] = '<div class="alert alert-warning" role="alert"><button class="close" data-dismiss="alert"></button>
                                                <strong>Warning ! </strong> Please insert confirm password !</div>';

                                                $this->session->set_flashdata("message",'<div class="alert alert-warning" role="alert"><button class="close" data-dismiss="alert"></button>
                                                <strong>Warning ! </strong> Please insert confirm password !</div>'); 
                                                 redirect("partners/settings");
                                                    exit;
                                            } 
                                            else {
                                                if (empty($new_password)) {
                                                    $data["error"] = '<div class="alert alert-warning" role="alert"><button class="close" data-dismiss="alert"></button>
                                                    <strong>Warning ! </strong> Please Insert New Password !</div>';

                                                    $this->session->set_flashdata("message",'<div class="alert alert-warning" role="alert"><button class="close" data-dismiss="alert"></button>
                                                    <strong>Warning ! </strong> Please Insert New Password !</div>');
                                                     redirect("partners/settings");
                                                    exit;
                                                } 
                                                else {
                                                    if ($new_password != $con_password) {
                                                        $data["error"] = '<div class="alert alert-warning" role="alert"><button class="close" data-dismiss="alert"></button>
                                                      <strong>Warning ! </strong>  New password and confirm Password is not Match</div>';

                                                       $this->session->set_flashdata("message",'<div class="alert alert-warning" role="alert"><button class="close" data-dismiss="alert"></button>
                                                      <strong>Warning ! </strong>  New password and confirm Password is not Match</div>'); 
                                                        redirect("partners/settings");
                                                        exit;
                                                    } 
                                                    else {
                                                        if (count($update_array) > 0) {
                                                            $update_array['password']=md5($new_password);
                                                            $update_array['org_password']=$new_password;
                                                        } 
                                                        else {
                                                            $update_array = array("password" => md5($new_password),"org_password"=>$new_password);
                                                        }
                                                    }
                                                }

                                            }
                                        }
                                                                             
                                    }
                                }
                            }

                            if (count($data) >= 5) {
                                $update_array1 = array("name" => $name,"email"=>$email ,"location"=>$location ,"city"=>$cityname ,"state"=>$statename ,"country"=>$countryname,"city_id"=>$city ,"state_id"=>$state ,"country_id"=>$country,"c_latitude"=>$c_latitude ,"c_longitude"=>$c_longitude);
                                /*echo "<pre>"; print_r($update_array1); exit;*/
                                $update = array_merge($update_array1, $update_array);

                                $this->load->model("common_model");
                                $this->common_model->data_update("tbl_partners", $update, array("id" => $partner_id));

                                $data["error"] = '<div class="alert alert-success" role="alert">
                                <button class="close" data-dismiss="alert"></button>
                                <strong>Success ! </strong>Profile Updated Successfully.
                                </div>';

                                  $this->session->set_flashdata("message",'<div class="alert alert-success" role="alert">
                                <button class="close" data-dismiss="alert"></button>
                                <strong>Success ! </strong>Profile Updated Successfully.
                                </div>'); 

                                $where = array("id" => $partner_id);

                                $this->db->select('*');
                                $this->db->from('tbl_partners');
                                $this->db->where($where);

                                $q = $this->db->get()->result_array();

                                if (!empty($q)) {
                                    $info = $q[0];

                                    $_SESSION['partner_role']  =$info['type_category'];
                                    $_SESSION['partner_id']  = $info['id'];
                                    $newdata = array(
                                        'user_name' => $info['name'],
                                        'user_email' => $info['email'],
                                        'logged_in' => TRUE,
                                        'partner_id' => $info['id'],
                                        'partner_type_id' => $info['type_category'],
                                        'email' => $info['email'],
                                        'password' => $info['password'],
                                        'profile_pic' => $info['profile_pic'],
                                        'role'=>$info['type_category'],
                                    );
                                    $this->session->set_userdata($newdata);
                                    //redirect(_get_user_redirect($this));
                                    redirect("dealer/settings");
                                    exit;
                                }
                            }
                        }
                    }
                    $data['language'] = $this->selectedlanguage;
                    $data['countryname'] = $this->World_wide_model->fetch_country();
                    $data['statename'] = $this->World_wide_model->fetch_state_list($data['admindata']->country_id);
                    $data['cityname'] = $this->World_wide_model->fetch_city_list($data['admindata']->state_id);
                    $this->load->view('dealer/profile/settings', $data);
                } 
                else {
                    redirect('partners-login');
                }
            } 
            else {
                redirect('partners-login');
            }
    } 

    public function get_random_otp($length = 10, $sting = "") {
            if (empty($sting)) {
                $alphabet = "0123456789";
            } 
            else {
                $alphabet = $sting;
            }
            $token = "";
            $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
            for ($i = 0; $i < $length; $i++) {
                $n = rand(0, $alphaLength);
                $token .= $alphabet[$n];
            }
            return $token;
    }

    function numberTowords($number) { 
            // $number = 24500.026;
            $no = round($number);
            $point = round($number - $no, 2) * 100;
            $hundred = null;
            $digits_1 = strlen($no);
            $i = 0;
            $str = array();
            $words = array('0' => '', '1' => 'One', '2' => 'Two',
                '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
                '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
                '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
                '13' => 'Thirteen', '14' => 'Fourteen',
                '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
                '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
                '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
                '60' => 'Sixty', '70' => 'Seventy',
                '80' => 'Eighty', '90' => 'Ninety');
           
            $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
            while ($i < $digits_1) {
                $divider = ($i == 2) ? 10 : 100;
                $number = floor($no % $divider);
                $no = floor($no / $divider);
                $i += ($divider == 10) ? 1 : 2;
             
                if ($number) {
                    $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                    $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                    $str [] = ($number < 21) ? $words[$number] .
                    " " . $digits[$counter] . $plural . " " . $hundred
                    :
                    $words[floor($number / 10) * 10]
                    . " " . $words[$number % 10] . " "
                    . $digits[$counter] . $plural . " " . $hundred;
                } else $str[] = null;
            }
            $str = array_reverse($str);
            $result = implode('', $str);
            $points = ($point) ?
                "." . $words[$point / 10] . " " . 
                      $words[$point = $point % 10] : '';
            return $result . "Rupees  " . $points . " Paise";
    } 

    public function forgot_password() {
            if (isset($_POST['email'])) {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('email', 'Email', 'trim|required');
    
                if ($this->form_validation->run() == FALSE) {
                    if ($this->form_validation->error_string() != "") {
                        $data["error"] = '<div class="alert alert-warning alert-dismissible" role="alert" id="error">
                                      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                      <strong>Warning!</strong> ' . $this->form_validation->error_string() . '
                                    </div>';
                    }
                } 
                else {
                    $email = $this->input->post("email");
                    $where = array("email" => $email);

                    $login = "SELECT * FROM  `tbl_partners` WHERE `email`='$email'";
                    $login_infos = $this->Basic->select_custom($login);

                    if (count($login_infos) > 0) {
                        $info = $login_infos[0];

                        if ($info['status'] == '1') {
                            $name = $info['name'];
                            $org_password = $info['org_password'];
                            $email = $info['email'];

                            $domainname = $_SERVER['SERVER_NAME'];
                            $from_email = $this->config->item('SUPPORT_URL');
                            $from_company = $this->config->item('project_name');
                            $logo = base_url()."images/logo.png";

                            $email_message = $this->load->view('email/admin_forgot_password', $data = array('name' => $name, 'from_email'=>$from_email, 'from'=>$from_company,'logo' => $logo, 'domainname' => $domainname,'newpassword'=>$org_password), TRUE);

                            $subject = "Nile Tele Health - Your Password";
                           
                            $to = strtolower($email);
                            $to = 'kunj.sinontechs@gmail.com';

                            $this->load->config('email');
                            $this->load->library('email');

                            $from = $this->config->item('smtp_user');
                            $message = $email_message;

                            $this->email->from('support@lpc.com', 'LPC');
                            $this->email->set_newline("\r\n");
                            $this->email->to($to);
                            $this->email->subject($subject);
                            $this->email->message($message);

                            if($this->email->send()){
                               
                            } else {
                               // echo $this->email->print_debugger(); 
                            }
                            $data["error"] = '<div class="alert alert-success alert-dismissible " role="alert" id="error">
                                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <strong>Success ! </strong> check your email you have received new password.</div>';
                        
                        } 
                        else {
                            $data["error"] = '<div class="alert alert-danger alert-dismissible " role="alert" id="error">
                                  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                  <strong>Error!</strong> Your account is deactive by admin.</div>';
                        }
                    } 
                    else {
                        $data["error"] = '<div class="alert alert-danger alert-dismissible " role="alert" id="error">
                                  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                  <strong>Error!</strong> Invalid email address. </div>';
                        // $this->load->view("restaurant/forgot_password",$data);
                    }
                }
        }
        $data["active"] = "login";
        $data['language'] = $this->selectedlanguage;
        $this->load->view("partners/forgot_password", $data);
    }


   function profile() {
            if (_is_dealer_login($this)) {
                $dealer_id = $this->session->userdata('dealer_id');
                $data = array();
                $data['action'] = "My Profile";
                $data['page'] = "My Profile";
                $data['title'] = "Profile";
                $this->load->model("dealer_model");
                $dealerdata = $this->dealer_model->get_dealer_list_by_id($dealer_id);
                
                $data["dealerdata"] = $dealerdata;
                if (isset($_REQUEST)) {
                    $this->load->library('form_validation');
                    $this->form_validation->set_rules('name', 'User Name', 'trim|required');
                    // $this->form_validation->set_rules('email', 'Email', 'trim|required');
                    $type_category = $dealerdata->type_category;
                    if ($this->form_validation->run() == FALSE) {
                        $data["error"] = $this->form_validation->error_string();
                    } 
                    else {
                        $updatearray=array();
                        $path=$this->config->item("dealer_images_profile");
                        $name = $this->input->post("name");
                        $email = $this->input->post("email");
                        $contact = $this->input->post("contact");
                        $location = $this->input->post("location");
                        $country = $this->input->post("country");
                        $state = $this->input->post("state");
                        $city = $this->input->post("city");
                        $contact = $this->input->post("contact");
                        $email = $this->input->post("email");
                        $email = $this->input->post("email");
                        
                        if($type_category == 3) {
                            $about_us = $this->input->post("about_us");
                        }     

                        if(isset($_FILES["profile_pic"])){
                            if(!empty($_FILES["profile_pic"]["name"]) && $_FILES["profile_pic"]["size"] > 0 ){
                                $image=$this->file_upload($_FILES["profile_pic"], $path);
                                if(!empty($image)){
                                    $updatearray['profile_pic'] = $image;
                                }
                            }
                        }

                        $updatearray["name"]=$name;
                        $updatearray["mobile"]=$contact;
                        $updatearray["location"]=$location;
                        $updatearray["country"]=$country;
                        $updatearray["state"]=$state;
                        $updatearray["city"]=$city;
                         
                        if($type_category == 3) {    
                            $updatearray["about_us"]= $about_us;
                        }    

                        $latlong=$this->getlatlng($location,$city,$state,$country);
                        $updatearray['c_latitude']=$latlong['latitude'];
                        $updatearray['c_longitude']=$latlong['longitude'];
                        
                        $this->load->model("common_model");
                        $this->common_model->data_update("tbl_vendors", $updatearray, array("id" => $dealer_id));
                        $dealerupdatedata = $this->dealer_model->get_dealer_list_by_id($dealer_id);
                        
                        $newdata = array(
                                            'user_name' => $dealerupdatedata->name,
                                            'user_email' => $dealerupdatedata->email,
                                            'logged_in' => TRUE,
                                            'dealer_id' => $dealerupdatedata->id,
                                            'dealer_type_id' => $dealerupdatedata->type_category,
                                            'email' => $dealerupdatedata->email,
                                            'password' => $dealerupdatedata->password,
                                            'profile_pic' => $dealerupdatedata->profile_pic,
                                            'role'=>$dealerupdatedata->type_category,
                                    );
                        $this->session->set_userdata($newdata);
                        $data["error"] = "<strong>Success!</strong> Profile Updated Successfully";
                    }
                }
                $data['country'] = $this->World_wide_model->fetch_country();
                $data['statename'] = $this->World_wide_model->fetch_state_list($dealerdata->country_id);
                $data['cityname'] = $this->World_wide_model->fetch_city_list($dealerdata->state_id);
                //echo "<pre>"; print_r($data); exit;
                $this->load->view('dealer/profile/edit', $data);
            } 
            else {
                redirect('dealers-login');
            }
    }
    public function deactivate_account(){
            if (_is_partner_login($this)) {
                $data = array();
                $data["error"] = "";
                $data["pageTitle"] = "Partners";
                $data["title"] = PROJECT_NAME;
                $data['admin'] = "Partners";
                $data['page'] = "Deactive Account";
                $partner_id = $this->session->userdata('partner_id');
                
                if(isset($_POST['save_button']) && $_POST['save_button']=='Update'){
                    $this->load->library('form_validation');
                    $this->form_validation->set_rules('reason', 'Reason', 'trim|required');
                    if ($this->form_validation->run() == FALSE) {
                        $data["error"] = '<div class="alert alert-warning alert-dismissible" role="alert" id="error">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                  <strong>Warning !</strong> ' . $this->form_validation->error_string() . '
                            </div>';

                        $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible" role="alert" id="error">
                                  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                  <strong>Warning !</strong> ' . $this->form_validation->error_string() . '
                                </div>');

                    } 
                    else {
                        $pdata=array();
                        $pdata['reason']=$this->input->post("reason");
                        $pdata['is_deactivate_account']='0';
                        $where=array('id'=>$partner_id);
                        $this->load->model('common_model');
                        $doctoradd=$this->common_model->data_update('tbl_partners',$pdata,$where);
                        
                        if(!empty($doctoradd)){
                            session_destroy();
                            $this->session->sess_destroy();
                            $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible" role="alert" id="error">
                          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                          <strong>Warning !</strong>Your Account Deactivate successful</div>');
                            redirect('partners/login');
                            exit;
                        }
                    }
                }
                $data['language'] = $this->selectedlanguage;
                $this->load->view('partners/deactive_account', $data);
            } 
            else{
                redirect('partners-login');   
            }
    }

    public function get_random_string($length = 10) {
            $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
            $token = "";
            $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
            for ($i = 0; $i < $length; $i++) {
                $n = rand(0, $alphaLength);
                $token .= $alphabet[$n];
            }
            return $token;
    }

    public function changepassword(){
            if (_is_dealer_login($this)) {
                $data=array();
                $data['action'] = "Change Password";
                $data['page'] = "Change Password";
                $data['title'] = "Change Password";
                $dealer_id = $this->session->userdata('dealer_id');
            
                if(isset($_REQUEST["save_button"]) && $_REQUEST["save_button"]=="Update"){
                    $this->load->library('form_validation');
                    $this->form_validation->set_rules('oldpass', 'User Name', 'trim|required');
                    $this->form_validation->set_rules('newpass', 'New Password', 'trim|required');
                    $this->form_validation->set_rules('cpass', 'Confirm New Password', 'trim|required');

                    if ($this->form_validation->run() == FALSE) {
                        $data["error"] = $this->form_validation->error_string();
                    } 
                    else {
                        $oldpass = isset($_REQUEST["oldpass"]) ? $_REQUEST["oldpass"]:"";
                        $newpass = isset($_REQUEST["newpass"]) ? $_REQUEST["newpass"]:"";
                        $cpass = isset($_REQUEST["cpass"]) ? $_REQUEST["cpass"]:"";
                    
                        if(!empty($oldpass) && !empty($newpass) && !empty($cpass)){
                            if($newpass==$cpass){
                                $this->load->model("dealer_model");
                                $dealerdata = $this->dealer_model->get_dealer_list_by_id($dealer_id);
                                // echo "<pre>"; print_r($dealerdata); exit;
                                $oldpass=md5($oldpass);
                            
                                if($oldpass==$dealerdata->password){
                                    $updatearray=array(
                                                        "password"=>md5($newpass),
                                                        "org_password"=>$newpass,
                                                );
                                    $this->load->model("common_model");
                                    $this->common_model->data_update("tbl_vendors", $updatearray, array("id" => $dealer_id));
                                    $data["error"]='<div class="alert alert-success" role="alert"><button class="close" data-dismiss="alert"></button><strong>Success ! </strong>Password Change successfully!</div>';   

                                } 
                                else {
                                    $data["error"]='<div class="alert alert-warning" role="alert"><button class="close" data-dismiss="alert"></button><strong>Warning ! </strong> Old password is not match!</div>';    
                                }
                            } 
                            else {
                                $data["error"]='<div class="alert alert-warning" role="alert"><button class="close" data-dismiss="alert"></button><strong>Warning ! </strong> Password and confirm password should be same !</div>';    
                            }
                        } 
                        else {
                            $data["error"]='<div class="alert alert-warning" role="alert"><button class="close" data-dismiss="alert"></button>
                                <strong>Warning ! </strong> Enter required field !</div>';
                        }
                    }
                }
                $this->load->view('dealer/profile/changepassword',$data);
            } 
            else {
                redirect('dealers-login');
            }
    }
    
    public function getlatlng($address,$city,$state=NULL,$country=NULL) {
            $GOOGLE_MAP_API_KEY = "AIzaSyC711vkhHG424lDbLWy3ZH0CIgPVDHb8Dc";
            $geo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address.$city.$state.$country).'&sensor=false&key='.$GOOGLE_MAP_API_KEY);
            $geo = json_decode($geo, true);
            if ($geo['status'] == 'OK') {
                $data['latitude'] = $geo['results'][0]['geometry']['location']['lat'];
                $data['longitude'] = $geo['results'][0]['geometry']['location']['lng'];
            }
            else {
                $data['latitude']="0.00";
                $data['longitude']="0.00";
            }
            return $data;   
    }


    public function review() {
            if (_is_dealer_login($this)) {
                $data=array();
                $data['action'] = "List";
                $data['page'] = "Customer Review";
                $data['title'] = "Review";
                $user_data = $this->session->userdata;
                $dealer_type_id = $user_data['dealer_type_id'];
                if(isset($dealer_type_id) && ($dealer_type_id == 3)) {
                    $vendor_id = $user_data['dealer_id'];
                    if(isset($vendor_id) && ($vendor_id > 0)) {
                        $this->load->model("tour_guide_model");
                        $review = $this->tour_guide_model->get_all_review_by_vendor_id($vendor_id);
                        $data['review'] = $review; 
                        $this->load->view('dealer/review',$data);
                    }
                }
                else {
                    redirect('dealer/dashboard');
                }
            }
            else {
                redirect('dealers-login');
            }    
    }

    public function review_delete($review_id) {
            if (_is_dealer_login($this)) {
                $data=array();
                $data['action'] = "Review Delete";
                $data['page'] = "Review Delete";
                $data['title'] = "Review Delete";
                $user_data = $this->session->userdata;
                $dealer_type_id = $user_data['dealer_type_id'];
                if(isset($dealer_type_id) && ($dealer_type_id == 3)) {
                    $vendor_id = $user_data['dealer_id'];
                    if(isset($vendor_id) && ($vendor_id > 0)) {
                        //$review_id
                        $query="DELETE FROM tbl_review WHERE review_id='".$review_id."' AND vendor_id='".$vendor_id."'";
                        $this->db->query($query);
                        $this->session->set_flashdata("message",'<div class="alert background-danger alert-dismissible" role="alert"><button class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Successful ! </strong>  Review Delete successfull.</div>');
                        redirect('dealer/review');
                    }
                }
                else {
                    redirect('dealer/dashboard');
                }
            }
            else {
                redirect('dealers-login');
            }
    }

    private function file_upload($arr, $path) {
            set_time_limit(0);
            if ($arr['error'] == 0) {
                $temp = explode(".", $arr["name"]);
                $random_number = time();
                $file_name = $random_number.'.' . end($temp);
                $file_path = $path . $file_name;
                if (move_uploaded_file($arr["tmp_name"], $file_path) > 0) {
                    $ret = $file_name;
                }
                else {
                    $ret = "";
                }
            }
            return $ret;
    }
}