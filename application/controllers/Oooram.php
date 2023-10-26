<?php

defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Oooram extends CI_Controller
{

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
        $this->load->model('World_wide_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library("pagination");
        $this->load->library('email');
    }

    public function index()
    {
        $data['title'] = "Home";
        $this->load->view('front/index', $data);
    }

 /*public function register()
 {
  $data            = array();
  $data['title']   = "Register";
  $data["country"] = $this->World_wide_model->fetch_country();
  if (isset($_REQUEST['save_button']) && !empty($_REQUEST['save_button']) && $_REQUEST['save_button'] === "save") {
  
   $this->load->library('form_validation');
   $this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
   $this->form_validation->set_rules('m_number', 'Mobile Number', 'required|min_length[10]|max_length[10]');
   $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
   $this->form_validation->set_rules('email', 'Email', 'trim|required');
   $this->form_validation->set_rules('password', 'Password', 'trim|required');
   $this->form_validation->set_rules('cpassword', 'Confirm Password','trim|required');
   $this->form_validation->set_rules('type', 'Login Type', 'trim|required');
   if ($this->form_validation->run() == false) {
    $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
   } else {
    
    $data_insert                  = array();
    $data_insert['firstname']     = $this->input->post("firstname") ? $this->input->post("firstname") : '';
    $data_insert['lastname']      = $this->input->post("lastname") ? $this->input->post("lastname") : '';
    $data_insert['name']          = $data_insert['firstname'].$data_insert['lastname'];
    $data_insert['mobile']      = $this->input->post("m_number") ? $this->input->post("m_number") : '';
    $data_insert['email']         = $this->input->post("email") ? $this->input->post("email") : '';
    $data_insert['password']      = md5($this->input->post("password"));
    $data_insert['org_password']  = $this->input->post("password") ? $this->input->post("password") : '';
    $data_insert['type_category'] = $this->input->post("type") ? $this->input->post("type") : '';
    $data_insert['created_at']    = date('Y-m-d H:i:s');
   /* $to_email="yashvi.sinontechs@gmail.com";
    $from_email = "yashvishah917@gmail.com";
    $this->load->library('email');
    $this->email->from($from_email,'Indlu');
    $this->email->to($to_email);
    $this->email->subject('Recently Register');
    $html="First Name:".$data_insert['firstname'];
    $html.="<br>Last Name:".$data_insert['lastname'];
    $html.="<br>Email:".$data_insert['email'];
    $html.="<br>Mobile Number:".$data_insert['mobile'];
    $html.="<br>Message:"."This User Is Recently Register";
    $this->email->message($html);
    if ($this->email->send()) {
      echo "Mail Send Successfully";
    }else{
      
    }
    $this->load->model("common_model");
    $this->Common_model->data_insert("tbl_temp", $data_insert, true);
    if(isset($_REQUEST['save_button1']) && !empty($_REQUEST['save_button1']) && $_REQUEST['save_button1'] === "save1")
    {
      $this->load->library('form_validation');
      $this->form_validation->set_rules('otp','Otp', 'required');
    
      if($this->form_validation->run() == false)
      {
         $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
      } else {
      $data_insert                  = array();
      $data_insert['otp']     = $this->input->post("otp") ? $this->input->post("otp") : '';
            
      print_r("all ok");
    }
    }
    $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" role="alert" id="error"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>Your account created successfully</div>');
    redirect("dealers-login");
    exit;
   }
  }
  $this->load->view('front/register', $data);
 }*/

public function register()
{
    $data['title']   = "Register";
    if($this->session->userdata('registerdata'))
    {
        $this->session->unset_userdata('registerdata');
    }
    if (isset($_REQUEST['save_button']) && !empty($_REQUEST['save_button']) && $_REQUEST['save_button'] === "save")
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('m_number', 'Mobile Number', 'required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('cpassword', 'Confirm Password','trim|required');
        //$this->form_validation->set_rules('type', 'Login Type', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
        } else {
            $ddata = array();
            $ddata['firstname']     = $this->input->post("firstname") ? $this->input->post("firstname") : '';
            $ddata['lastname']      = $this->input->post("lastname") ? $this->input->post("lastname") : '';
            $ddata['mobile']         = $this->input->post("m_number") ? $this->input->post("m_number") : '';
            $ddata['email']          = $this->input->post("email") ? $this->input->post("email") : '';
            $ddata['password']      = md5($this->input->post("password"));
            $ddata['org_password']  = $this->input->post("password") ? $this->input->post("password") : '';
            //$ddata['type_category'] = $this->input->post("type") ? $this->input->post("type") : '';
            $ddata['otp'] = 1111; //rand(1111,9999);
            $ddata['created_at']    = date('Y-m-d H:i:s');
            //print_r($ddata);die;
            $this->session->set_userdata('registerdata',$ddata);

            redirect('dealers-otp');
            exit;
        }
    }
    $this->load->view('front/register',$data);
 
}

public function my_otp()
{
    $data['title']   = "My Otp";
    $data['error'] = "";
    if (isset($_REQUEST['save_button']) && !empty($_REQUEST['save_button']) && $_REQUEST['save_button'] === "save") {
        $this->form_validation->set_rules('otp', 'otp', 'required|min_length[4]|max_length[4]');
        if($this->form_validation->run() == false) {
          $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
        }else{
            //print_r($this->session->userdata('registerdata'));die;
            if($this->session->userdata('registerdata')){
                if($this->session->userdata['registerdata']['otp']==$this->input->post('otp'))
                {
                    $data_insert = $this->session->userdata['registerdata'];
                    $data_insert['is_verifyotp'] = '1';

                    $this->db->insert('tbl_vendors', $data_insert);
                    $insert_id = $this->db->insert_id();
                    
                    $this->session->unset_userdata('registerdata');
                    $this->session->set_userdata('lastinsert_id',$insert_id);
                    $this->db->select('*');
                    $this->db->from('tbl_vendors');
                    $this->db->where('id',$insert_id);
                    $row = $this->db->get()->row();
                    $this->session->set_userdata('ProfileData', $row);
                    if ($row->is_fill_profile != 0) {
                        redirect(base_url());
                    } else {
                        redirect("company-details");
                    }
                    exit;
                }
                else
                {

                    $data["error"] = '<div class="alert alert-danger alert-dismissible" role="alert" id="error"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Error!</strong> Please Enter Valid OTP </div>';
                }   
            }
            else {
                    $data["error"] = '<div class="alert alert-danger alert-dismissible" role="alert" id="error"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Error!</strong> Some Errors occur so Please Again Register</div>';
                }
            
            }
        }
    $this->load->view('front/my_otp', $data);
 }
public function company_details()
{
    if($this->session->userdata('lastinsert_id'))
    {
        $id = $_SESSION['lastinsert_id'];
        $this->db->select('*');
        $this->db->from('tbl_vendors');
        $this->db->where('id',$id);
        $data['company_details'] = $this->db->get()->row_array();
        $data['is_form_submit'] = '0';
        $this->load->model('Front_model');
        $category = $this->Front_model->get_category();
        $final=array();
        foreach($category as $row)
        {
            $row['subcategory']=$this->Front_model->get_sub_category($row['id']);
            $final[]=$row;
        }
        $data['category']=$final;
        
        $data["country"] = $this->World_wide_model->fetch_country();

        if (isset($_REQUEST['save_button']) && !empty($_REQUEST['save_button']) && $_REQUEST['save_button'] === "save") {
            //print_r(1);die;
            $this->load->library('form_validation');
            $this->form_validation->set_rules('commercial_name', 'commercial name', 'trim|required');
            //$this->form_validation->set_rules('proof_image', 'proof image', 'required');
            $this->form_validation->set_rules('reg_date', 'reg date', 'trim|required');
            $this->form_validation->set_rules('exp_date', 'exp date', 'trim|required');
            $this->form_validation->set_rules('employes', 'employes', 'trim|required');
            $this->form_validation->set_rules('est_date', 'est date','trim|required');
            //$this->form_validation->set_rules('logo_image', 'logo image', 'trim|required');
            $this->form_validation->set_rules('phone', 'number','trim|required|numeric');
            $this->form_validation->set_rules('Contact_person', 'Contact person','trim|required');
            $this->form_validation->set_rules('job_title', 'job title', 'trim|required');
            $this->form_validation->set_rules('services', 'services', 'required');
            $this->form_validation->set_rules('company_bio', 'reg date', 'trim|required');
            $this->form_validation->set_rules('company_link', 'company_link', 'trim|required');
            $this->form_validation->set_rules('social_media_link', 'social_media_link', 'trim|required');
            $this->form_validation->set_rules('location', 'location', 'trim|required');
            $this->form_validation->set_rules('country', 'country','trim|required');
            $this->form_validation->set_rules('state', 'state','trim|required');
            $this->form_validation->set_rules('city', 'city', 'trim|required');
            $this->form_validation->set_rules('zipcode', 'zipcode', 'trim|required');
            $this->form_validation->set_rules('official_name', 'official_name', 'trim|required');
            $this->form_validation->set_rules('bank_name', 'bank_name','trim|required');
            $this->form_validation->set_rules('IBAN', 'IBAN','trim|required');
            $this->form_validation->set_rules('BSB', 'BSB', 'trim|required');
            $this->form_validation->set_rules('bank_address', 'bank_address', 'trim|required');
            $this->form_validation->set_rules('bank_city', 'bank_city', 'trim|required');
            $this->form_validation->set_rules('bank_country', 'bank_country', 'trim|required');
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
            } else {
        
                $data_insert['commercial_name']    = $this->input->post("commercial_name");
                $data_insert['vat_no']    = $this->input->post("vat");
                $data_insert['proof_image']        = $this->input->post("proof_image");
                $data_insert['reg_dt']             = $this->input->post("reg_date");
                $data_insert['expirydate']         = $this->input->post("exp_date");
                $data_insert['no_of_employee']     = $this->input->post("employes");
                $data_insert['establisment_date']  = $this->input->post("est_date");
                $data_insert['logo_image']         = $this->input->post("logo_image");
                $data_insert['company_tele_number']= $this->input->post("phone");
                $data_insert['country_code']       = $this->input->post("country_code");
                $data_insert['name']               = $this->input->post("Contact_person");
                $data_insert['job_title']          = $this->input->post("job_title");
                if(is_array($this->input->post("business_type")) == 1)
               {
                    $business_type = $this->input->post("business_type") ? implode(",",$this->input->post("business_type")) : '';
               }else{
                    $business_type = $this->input->post("business_type");
               }
               if(is_array($this->input->post("ground_operator")) == 1)
               {
                    $ground_operator = $this->input->post("ground_operator") ? implode(",",$this->input->post("ground_operator")) : '';
               }else{
                    $ground_operator = $this->input->post("ground_operator");
               }
               if(is_array($this->input->post("travel_style")) == 1)
               {
                    $travel_style = $this->input->post("travel_style") ? implode(",",$this->input->post("travel_style")) : '';
               }else{
                    $travel_style = $this->input->post("travel_style");
               }
                $data_insert['business_type']    =$business_type;
                $data_insert['services']         = $this->input->post("services");
                $data_insert['ground_operator']  = $ground_operator;
                $data_insert['travel_style']     = $travel_style;
                $data_insert['company_bio']      = $this->input->post("company_bio");
                $data_insert['company_link']     = $this->input->post("company_link");
                $data_insert['social_media_link']= $this->input->post("social_media_link");
                $data_insert['crm_name']         = $this->input->post("crm_name");
                $data_insert['location']         = $this->input->post("location");
                $data_insert['country']          = $this->input->post("country");
                $data_insert['state']            = $this->input->post("state");
                $data_insert['city']             = $this->input->post("city");
                $data_insert['zipcode']          = $this->input->post("zipcode");
                $data_insert['is_parent_company']= $this->input->post("is_parent_company");
                $data_insert['parent_company']   = $this->input->post("parent_company");
                $data_insert['no_of_employee_parent']= $this->input->post("no_of_employee_parent");
                $data_insert['is_judgment']          = $this->input->post("is_judgment");
                $data_insert['is_health_safety']     = $this->input->post("is_health_safety");
                $data_insert['is_environmental']     = $this->input->post("is_environmental");
                $data_insert['is_quality']           = $this->input->post("is_quality");
                $data_insert['is_equl_opportunity']  = $this->input->post("is_equl_opportunity");
                $data_insert['is_ethical']          = $this->input->post("is_ethical");
                $data_insert['is_public_liability_insurance']          = $this->input->post("is_public_liability_insurance");
                $data_insert['is_annum']          = $this->input->post("is_annum");
                $data_insert['is_travelers_liability_insurance']          = $this->input->post("is_travelers_liability_insurance");
                $data_insert['is_employee_liability_insurance']          = $this->input->post("is_employee_liability_insurance");
                $data_insert['is_annnum_liability_insurance']          = $this->input->post("is_annnum_liability_insurance");
                $data_insert['insurances_claim']          = $this->input->post("insurances_claim");
                $data_insert['official_name']          = $this->input->post("official_name");
                $data_insert['bank_name']          = $this->input->post("bank_name");
                $data_insert['IBAN']          = $this->input->post("IBAN");
                $data_insert['BSB']          = $this->input->post("BSB");
                $data_insert['bank_address']          = $this->input->post("bank_address");
                $data_insert['bank_city']          = $this->input->post("bank_city");
                $data_insert['bank_country']          = $this->input->post("bank_country");
                $data_insert['map_link']          = $this->input->post("map_link");
                if ($_FILES["company_policy"]["size"] > 0)
                {
                    $config['upload_path'] = './uploads/company_img';
                    $config['allowed_types'] = 'jpg|png|jpeg|pdf';
                    $this->upload->initialize($config);
                    $this->load->library('upload', $config);
                    $temp = explode(".", $_FILES["company_policy"]["name"]);
                    $newfilename = time() .'_'.rand(11111,99999).'.' . end($temp);
                    $uploadpath = $this->config->item('company_policy_images_path');
                    $this->load->helper('compressimg_helper');
                    $data_insert['company_policy'] = newuploadusingcompress($_FILES["company_policy"], $uploadpath);
                }
                if (isset($id) && !empty($id)){ 
                    $myArr = array();
                    for ($i=0; $i < count($_FILES["company_images"]["name"]) ; $i++) { 
                            if ($_FILES["company_images"]["size"][$i] > 0) 
                            {
                                $idatad['name'] = $_FILES["company_images"]["name"][$i];
                                $idatad['type'] = $_FILES["company_images"]["type"][$i];
                                $idatad['tmp_name'] = $_FILES["company_images"]["tmp_name"][$i];
                                $idatad['error'] = $_FILES["company_images"]["error"][$i];
                                $idatad['size'] = $_FILES["company_images"]["size"][$i];
                                $config['upload_path'] = './uploads/company_imgs';
                                $config['allowed_types'] = 'jpg|png|jpeg';
                                $this->upload->initialize($config);
                                $this->load->library('upload', $config);
                                $temp = explode(".", $_FILES["company_images"]["name"][$i]);
                                $newfilename = time() . '.' . end($temp);
                                $uploadpath = $this->config->item('company_policy_images_path');
                                $file_name = newuploadusingcompress($idatad, $uploadpath);
                                // $idata['images'] = $file_name; 
                               
                                array_push($myArr,$file_name);
                            } 
                    }
                    
                }

                $data_insert['company_images']  = serialize($myArr);
                $data_insert['is_form_submit'] = '1';
                $this->load->model("common_model");
                $this->common_model->data_update("tbl_vendors",$data_insert,array('id'=>$id));
                $data['is_form_submit'] = '1';
                //$this->load->view('front/company_details', $data1);
                //redirect(base_url());
            }
        }
        
        //print_r($data);die;
        $this->load->view('front/company_details',$data);   
    }else{
        redirect(base_url());
    }
       
}


public function signin()
{
    $data          = array();
    $data['title'] = "Log In";
    if(isset($_REQUEST['save_button']) && !empty($_REQUEST['save_button']) && $_REQUEST['save_button'] === "save") {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
        } else {
        $email    = $this->input->post("email");
        $password = md5($this->input->post("password"));
        $where    = array("email" => $email, "password" => $password, "status" => "1");
        $this->db->select('*');
        $this->db->from('tbl_vendors');
        $this->db->where($where);
        $q = $this->db->get()->result_array();
        if (!empty($q)) {
         $info = $q[0];
         if ($info['status'] == "1") {
          // session_start();
          $_SESSION['status'] = $info['status'];
          $_SESSION['id']     = $info['id'];
          $userdata           = array(
           'username'   => $info['name'],
           'useremail'  => $info['email'],
           'userid'     => $info['id'],
           'userimage'  => $info['profile_pic'],
           'userstatus' => $info['status'],
           'is_dealer'  => 1,
          );
      $this->session->set_userdata($userdata);
      $data = $this->session->userdata;
      $this->session->set_flashdata('login_message', '<div class="alert background-success alert-dismissible" id="error" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Success ! </strong>User login successfully.</div>');

      redirect(base_url());
      exit;
     } else {
      $data["error"] = '<div class="alert background-danger alert-dismissible " role="alert" id="error">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <strong>Error!</strong> You Are User. </div>';
     }
    } else {
     $data["error"] = '<div class="alert background-danger alert-dismissible " role="alert" id="error">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <strong>Error!</strong> Invalid Username and password. </div>';
    }
   }
  }
  $this->load->view('front/signin', $data);
 }

 public function logout()
 {
  $this->session->sess_destroy();
  redirect(base_url());
  exit;
 }

 

 public function tour()
 {
  $data          = array();
  $data['title'] = "Tour List";
  $this->load->model("tour_model");
  $lng                         = 1;
  $config                      = array();
  $config["base_url"]          = base_url() . "tour";
  $config["total_rows"]        = $this->tour_model->get_tour_list_by_lng_count($lng);
  $config["per_page"]          = 10;
  $config["uri_segment"]       = 2;
  $config["num_links"]         = 1;
  $config["use_page_numbers"]  = true;
  $config["page_query_string"] = false;
  $config['attributes']        = array('class' => 'btn-pagination');
  $config['attributes']['rel'] = false;
  $config["first_tag_open"]    = "<li>";
  $config["first_link"]        = "<a class='btn-pagination previous'><span aria-hidden='true' class='fa fa-angle-left'></span></a>";
  $config["first_tag_close"]   = "</li>";
  $config["last_tag_open"]     = "<li>";
  $config["last_link"]         = "<a class='btn-pagination next'><span aria-hidden='true' class='fa fa-angle-right'></span></a>";
  $config["last_tag_close"]    = "</li>";
  $config["full_tag_open"]     = "<ul class='pagination'>";
  $config["full_tag_close"]    = "</ul>";
  $config["next_tag_open"]     = "<li>";
  $config["next_tag_close"]    = "</li>";
  $config["num_tag_open"]      = "<li>";
  $config["num_tag_close"]     = "</li>";
  $config["cur_tag_open"]      = "<li><a href='#' class='btn-pagination active'>";
  $config["cur_tag_close"]     = "</a></li>";

  $this->pagination->initialize($config);
  $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
  //$config["base_url"] = base_url() . "tour?page=$page&per_page=$config["per_page"]";
  $data["links"] = $this->pagination->create_links();
  //$data['authors'] = $this->authors_model->get_authors($config["per_page"], $page);
  $data['tour'] = $this->tour_model->get_tour_list_by_lng($config["per_page"], $page, $lng);
  $min_price    = 0;
  $max_price    = 0;
  $n            = 0;
  foreach ($data['tour'] as $t) {
   if ($n == 0) {
    $min_price = $t->sale_price;
    $max_price = $t->sale_price;
   } else {
    if ($min_price > $t->sale_price) {
     $min_price = $t->sale_price;
    }
    if ($max_price < $t->sale_price) {
     $max_price = $t->sale_price;
    }
   }
   $n++;
  }
  $data['max_price'] = $max_price;
  $data['min_price'] = $min_price;
  $this->load->view('front/tour', $data);
 }

 public function tour_details($slug)
 {
  $data          = array();
  $data['title'] = "Tour Details";
  $this->load->model("tour_model");
  $this->load->model('Front_model');

  $lng                   = 1;
  $data['tour']          = $this->tour_model->check_tour_slug($lng, $slug);
  $data['tour_vendor']   = $this->tour_model->get_tour_list_by_vendor_id($data['tour']->vendor_id, $slug);
  $data['vendor']        = $this->tour_model->get_vendor_by_id($data['tour']->vendor_id);
  $data['tour_list']     = $this->tour_model->get_tour_list_by_slug_lng($lng, $slug);
  $data['tour_include']  = explode(",", $data['tour']->included);
  $data['tour_gallery']  = $this->tour_model->tour_gallery_by_tour_id($data['tour']->id);
  $data['tour_overview'] = $this->tour_model->tour_overview_by_tour_id($data['tour']->id);
  $data["country"]       = $this->World_wide_model->fetch_country();
  $user_data             = $this->session->userdata;

  if (isset($user_data['user_type']) && ($user_data['is_customer'] == 1) && (($user_data['user_type'] == 2) || $user_data['user_type'] == 1)) {
   $customer_id     = $user_data['userid'];
   $customer_detail = $this->Front_model->getcustomer_detail_by_id($customer_id);
   if (isset($customer_detail[0]->id) && ($customer_detail[0]->id > 0)) {
    $user_data['country_code'] = $customer_detail[0]->country_code;
    $user_data['mobile']       = $customer_detail[0]->mobile;
    $user_data['address']      = $customer_detail[0]->address;
    $user_data['city']         = $customer_detail[0]->city;
    $user_data['state']        = $customer_detail[0]->state;
    $user_data['country']      = $customer_detail[0]->country;
    $user_data['zipcode']      = $customer_detail[0]->zipcode;

    $data["state"] = $this->World_wide_model->fetch_state($customer_detail[0]->country);
    $data["city"]  = $this->World_wide_model->fetch_city($customer_detail[0]->state);
   }
   $data['user_data'] = $user_data;
  }
  $this->load->view('front/tour_details', $data);
 }

 public function getlatlng($address, $city, $state = null, $country = null)
 {
  $GOOGLE_MAP_API_KEY = "AIzaSyC711vkhHG424lDbLWy3ZH0CIgPVDHb8Dc";
  $geo                = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($address . $city . $state . $country) . '&sensor=false&key=' . $GOOGLE_MAP_API_KEY);
  $geo                = json_decode($geo, true);
  if ($geo['status'] == 'OK') {
   $data['latitude']  = $geo['results'][0]['geometry']['location']['lat'];
   $data['longitude'] = $geo['results'][0]['geometry']['location']['lng'];
  } else {
   $data['latitude']  = "0.00";
   $data['longitude'] = "0.00";
  }
  return $data;
 }

 public function check_vendor_email_exist_or_not()
 {
  $email = $this->input->post("email");
  if (!empty($email)) {
   $this->load->model("Dealer_model");
   $check_email_exist = $this->Dealer_model->check_dealer_email_exist_or_not($email);
   if ($check_email_exist > 0) {
    echo "false";
    exit;
   } else {
    echo "true";
    exit;
   }
  }
 }

 public function check_customers_email_exist_or_not()
 {
  $email = $this->input->post("email");
  if (!empty($email)) {
   $this->load->model("Dealer_model");
   $check_email_exist = $this->Dealer_model->check_customers_email_exist_or_not($email);
   if ($check_email_exist > 0) {
    echo "false";
    exit;
   } else {
    echo "true";
    exit;
   }
  }
 }

 public function customerlogin()
 {
  $data          = array();
  $data['title'] = "Log In";
  if (isset($_REQUEST['save_button']) && !empty($_REQUEST['save_button']) && $_REQUEST['save_button'] === "save") {
   $this->load->library('form_validation');
   $this->form_validation->set_rules('email', 'Email', 'trim|required');
   $this->form_validation->set_rules('password', 'Password', 'trim|required');
   if ($this->form_validation->run() == false) {
    $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
   } else {
    $email    = $this->input->post("email");
    $password = md5($this->input->post("password"));
    $where    = array("email" => $email, "password" => $password, "status" => "1");
    $this->db->select('*');
    $this->db->from('tbl_customers');
    $this->db->where($where);
    $q = $this->db->get()->result_array();
    if (!empty($q)) {
     $info = $q[0];
     if ($info['status'] == "1") {
      // session_start();
      $_SESSION['status'] = $info['status'];
      $_SESSION['id']     = $info['id'];
      $userdata           = array(
       'username'    => $info['name'],
       'useremail'   => $info['email'],
       'userid'      => $info['id'],
       'userimage'   => $info['profile_pic'],
       'userstatus'  => $info['status'],
       'is_customer' => 1,
       'user_type'   => $info['user_type'],
      );
      $this->session->set_userdata($userdata);
      $data = $this->session->userdata;
      $this->session->set_flashdata('login_message', '<div class="alert background-success alert-dismissible" id="error" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Success ! </strong>User login successfully.</div>');
      //print_r(1);die;
      redirect(base_url());
      exit;
     } else {
      $data["error"] = '<div class="alert background-danger alert-dismissible " role="alert" id="error">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <strong>Error!</strong> You Are User. </div>';
     }
    } else {
     $data["error"] = '<div class="alert background-danger alert-dismissible " role="alert" id="error">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <strong>Error!</strong> Invalid Username and password. </div>';
    }
   }
  }
  $this->load->view('front/signin', $data);
 }

 public function customerregister()
 {
  $data            = array();
  $data['title']   = "Register";
  $data["country"] = $this->World_wide_model->fetch_country();

  if (isset($_REQUEST['save_button']) && !empty($_REQUEST['save_button']) && $_REQUEST['save_button'] === "save") {
   $this->load->library('form_validation');
   $this->form_validation->set_rules('name', 'Name', 'trim|required');
   $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|min_length[8]|max_length[8]');
   $this->form_validation->set_rules('email', 'Email', 'trim|required');
   $this->form_validation->set_rules('ccode', 'Country Code', 'trim|required');
   $this->form_validation->set_rules('password', 'Password', 'trim|required');
   $this->form_validation->set_rules('location', 'Location', 'trim|required');
   $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required');
   $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
   $this->form_validation->set_rules('city', 'City', 'trim|required');
   $this->form_validation->set_rules('country', 'Country', 'trim|required');
   $this->form_validation->set_rules('state', 'State', 'trim|required');

   if ($this->form_validation->run() == false) {
    $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
   } else {
    $data_insert                 = array();
    $data_insert['name']         = $this->input->post("name") ? $this->input->post("name") : '';
    $data_insert['mobile']       = $this->input->post("mobile") ? $this->input->post("mobile") : '';
    $data_insert['email']        = $this->input->post("email") ? $this->input->post("email") : '';
    $data_insert['country_code'] = $this->input->post("ccode") ? $this->input->post("ccode") : '';
    $data_insert['password']     = md5($this->input->post("password"));
    $data_insert['org_password'] = $this->input->post("password") ? $this->input->post("password") : '';
    $data_insert['gender']       = $this->input->post("gender") ? $this->input->post("gender") : '';
    $data_insert['address']      = $this->input->post("location") ? $this->input->post("location") : '';
    $data_insert['city']         = $this->input->post("city") ? $this->input->post("city") : '';
    $data_insert['country']      = $this->input->post("country") ? $this->input->post("country") : '';
    $data_insert['state']        = $this->input->post("state") ? $this->input->post("state") : '';
    $countryname                 = $this->World_wide_model->get_country_list_by_id($data_insert['country_id']);
    $statename                   = $this->World_wide_model->get_state_list_by_id($data_insert['state_id']);
    $cityname                    = $this->World_wide_model->get_city_list_by_id($data_insert['city_id']);
    $latlong                     = $this->getlatlng($data_insert['address'], $cityname, $statename, $countryname);
    $data_insert['c_latitude']   = $latlong['latitude'];
    $data_insert['c_longitude']  = $latlong['longitude'];
    $data_insert['user_type']    = '2';
    $data_insert['created_at']   = date('Y-m-d H:i:s');
    $this->load->model("common_model");
    $this->Common_model->data_insert("tbl_customers", $data_insert, true);
    redirect(base_url());
    exit;
   }
  }
  $this->load->view('front/customer/register', $data);
 }

 public function my_profile()
 {
  if (isset($_SESSION) && !empty($_SESSION["is_customer"]) && !empty($_SESSION["user_type"]) && $_SESSION["user_type"] == "2") {
   $id              = $_SESSION["id"];
   $data            = array();
   $data['title']   = "My profile";
   $data["country"] = $this->World_wide_model->fetch_country();
   $this->load->model("Customer_model");
   $this->load->model('World_wide_model');
   $data["customer_details"] = $this->Customer_model->get_detail_by_id($id);
   $countryname              = $this->World_wide_model->get_country_list_by_id($data["customer_details"]->country);
   $statename                = $this->World_wide_model->get_state_list_by_id($data["customer_details"]->state);
   $cityname                 = $this->World_wide_model->get_city_list_by_id($data["customer_details"]->city);
   $data['country_name']     = $countryname->name;
   $data['state_name']       = $statename->name;
   $data['city_name']        = $cityname->name;
   if (isset($_POST["save_button"]) && !empty($_POST["save_button"]) && $_POST["save_button"] == "save") {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('name', 'Name', 'trim|required');
    $this->form_validation->set_rules('email', 'Email', 'trim|required');
    $this->form_validation->set_rules('ccode', 'Country Code', 'trim|required');
    $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
    $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
    $this->form_validation->set_rules('location', 'Location', 'trim|required');
    $this->form_validation->set_rules('country', 'Country', 'trim|required');
    $this->form_validation->set_rules('state', 'State', 'trim|required');
    $this->form_validation->set_rules('city', 'City', 'trim|required');
    //$this->form_validation->set_rules('password', 'Password', 'trim|required');
    //$this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required');
    if ($this->form_validation->run() == false) {
     $data["message"] = $this->form_validation->error_string();
    } else {
     $data_insert                 = array();
     $data_insert['name']         = $this->input->post("name") ? $this->input->post("name") : '';
     $data_insert['mobile']       = $this->input->post("mobile") ? $this->input->post("mobile") : '';
     $data_insert['email']        = $this->input->post("email") ? $this->input->post("email") : '';
     $data_insert['country_code'] = $this->input->post("ccode") ? $this->input->post("ccode") : '';
     $data_insert['gender']       = $this->input->post("gender") ? $this->input->post("gender") : '';
     $data_insert['address']      = $this->input->post("location") ? $this->input->post("location") : '';
     $data_insert['city']         = $this->input->post("city") ? $this->input->post("city") : '';
     $data_insert['country']      = $this->input->post("country") ? $this->input->post("country") : '';
     $data_insert['state']        = $this->input->post("state") ? $this->input->post("state") : '';
     $countryname                 = $this->World_wide_model->get_country_list_by_id($data_insert['country']);
     $statename                   = $this->World_wide_model->get_state_list_by_id($data_insert['state']);
     $cityname                    = $this->World_wide_model->get_city_list_by_id($data_insert['city']);
     $latlong                     = $this->getlatlng($data_insert['address'], $cityname->name, $statename->name, $countryname->name);

     $data_insert['c_latitude']  = $latlong['latitude'];
     $data_insert['c_longitude'] = $latlong['longitude'];
     $data_insert['user_type']   = '2';
     $data_insert['updated_at']  = date('Y-m-d H:i:s');
     $this->load->model("common_model");
     if (isset($_FILES) && !empty($_FILES["profile"]["name"]) && $_FILES["profile"]["size"] > 0) {
      $path     = $this->config->item("customer_images_path");
      $filename = $this->file_upload($_FILES["profile"], $path);
      if (!empty($filename)) {
       $data_insert['profile_pic'] = $filename;
      }
     }
     $this->Common_model->data_update("tbl_customers", $data_insert, array("id" => $id));
     $data["customer_details"] = $this->Customer_model->get_detail_by_id($id);
     $userdata                 = array(
      'username'    => $data["customer_details"]->name,
      'useremail'   => $data["customer_details"]->email,
      'userid'      => $data["customer_details"]->id,
      'userimage'   => $data["customer_details"]->profile_pic,
      'userstatus'  => $data["customer_details"]->status,
      'is_customer' => 1,
      'user_type'   => $data["customer_details"]->user_type,
     );
     $this->session->set_userdata($userdata);
     $data["message"] = "Profile Update successful";
    }
   }
   if (isset($_POST["save_button"]) && !empty($_POST["save_button"]) && $_POST["save_button"] == "Changepassword") {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('oldpassword', 'Old Password', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');
    $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required');
    if ($this->form_validation->run() == false) {
     $data["message"] = $this->form_validation->error_string();
    } else {
     $oldpassword = $this->input->post("oldpassword") ? $this->input->post("oldpassword") : '';
     $password    = $this->input->post("password") ? $this->input->post("password") : '';
     $cpassword   = $this->input->post("cpassword") ? $this->input->post("cpassword") : '';
     if ($password === $cpassword) {
      if ($data["customer_details"]->password == md5($oldpassword)) {
       $data_insert                 = array();
       $data_insert['password']     = md5($password);
       $data_insert['org_password'] = $password;
       $this->Common_model->data_update("tbl_customers", $data_insert, array("id" => $id));
       $data["message"] = "password change successful";
      } else {
       $data["message"] = "old password should not matched in database";
      }
     } else {
      $data["message"] = "Password and Confirm password should not be same";
     }
    }
   }
   $this->load->view("front/customer/profile", $data);
  } else {
   redirect("customer-login");
  }
 }

 public function tour_guide()
 {
  $data          = array();
  $data['title'] = "Tour Guide List";
  $this->load->model("tour_guide_model");
  $lng                         = 1;
  $config                      = array();
  $config["base_url"]          = base_url() . "tour-guide";
  $total_data                  = $this->tour_guide_model->get_approve_tour_guide_listing();
  $config["total_rows"]        = count($total_data);
  $config["per_page"]          = 10;
  $config["uri_segment"]       = 2;
  $config["num_links"]         = 1;
  $config["use_page_numbers"]  = true;
  $config["page_query_string"] = false;
  $config['attributes']        = array('class' => 'btn-pagination');
  $config['attributes']['rel'] = false;

  $config["first_tag_open"]  = "<li>";
  $config["first_link"]      = "<a class='btn-pagination previous'><span aria-hidden='true' class='fa fa-angle-left'></span></a>";
  $config["first_tag_close"] = "</li>";

  $config["last_tag_open"]  = "<li>";
  $config["last_link"]      = "<a class='btn-pagination next'><span aria-hidden='true' class='fa fa-angle-right'></span></a>";
  $config["last_tag_close"] = "</li>";

  $config["full_tag_open"]  = "<ul class='pagination'>";
  $config["full_tag_close"] = "</ul>";

  $config["next_tag_open"]  = "<li>";
  $config["next_tag_close"] = "</li>";

  $config["num_tag_open"]  = "<li>";
  $config["num_tag_close"] = "</li>";

  $config["cur_tag_open"]  = "<li><a href='#' class='btn-pagination active'>";
  $config["cur_tag_close"] = "</a></li>";

  $this->pagination->initialize($config);
  $page          = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
  $data["links"] = $this->pagination->create_links();
  $data['tour']  = $this->tour_guide_model->get_tour_guide_list_by_lng($config["per_page"], $page, $lng);
  $this->load->view('front/tour_guide', $data);
 }

 public function tour_guide_details($id)
 {
  $data          = array();
  $data['title'] = "Tour Guide Detail";
  $this->load->model("tour_guide_model");
  $lng       = 1;
  $user_data = $this->session->userdata;
  if (isset($user_data['is_customer']) && ($user_data['is_customer'] == 1) && ($user_data['user_type'] == 2)) {
   $login_user = 1;
   $userid     = $user_data['userid'];
  } else {
   $login_user = 0;
   $userid     = 0;
  }
  $data['login_user'] = $login_user;
  $tour_guide_detail  = $this->tour_guide_model->tour_guide_details_by_id($id);
  if (isset($tour_guide_detail[0]->id) && ($tour_guide_detail[0]->id > 0)) {
   $data['tour_guide_detail'] = $tour_guide_detail[0];
   $price                     = $this->tour_guide_model->get_guide_rate_by_vendor_id($tour_guide_detail[0]->id);
   $data['price']             = $price;
   $review                    = $this->tour_guide_model->get_review_by_vendor_id($tour_guide_detail[0]->id);
   $data['review']            = $review;
   $data['statename']         = $this->World_wide_model->fetch_state_list($data['tour_guide_detail']->country_id);
   $data['cityname']          = $this->World_wide_model->fetch_city_list($data['tour_guide_detail']->state_id);
   if (isset($_REQUEST['save_button']) && ($_REQUEST['save_button'] == 'save')) {
    $rv['rating_star'] = $this->input->post("rating");
    $rv['comments']    = $this->input->post("comments");
    $rv['vendor_id']   = $id;
    $rv['customer_id'] = $userid;
    $rv['status']      = '0';
    $rv['created_at']  = date('Y-m-d h:i:s');
    $this->load->model("common_model");
    $v = $this->Common_model->data_insert("tbl_review", $rv, true);
    if ($v > 0) {
     $data["error"] = '<div class="alert alert-warning alert-dismissible" role="alert" id="error">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <strong>Success !</strong> Review added successfully.</div>';
    } else {
     $data["error"] = '<div class="alert alert-warning alert-dismissible" role="alert" id="error">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <strong>Error !</strong> Error in review add, Please try again.</div>';
    }
   }
  }
  $data['country'] = $this->World_wide_model->fetch_country();
  $this->load->view('front/tour_guide_detail', $data);
 }

 private function file_upload($arr, $path)
 {
  set_time_limit(0);
  if ($arr['error'] == 0) {
   $temp          = explode(".", $arr["name"]);
   $random_number = time();
   $file_name     = $random_number . '.' . end($temp);
   $file_path     = $path . $file_name;
   if (move_uploaded_file($arr["tmp_name"], $file_path) > 0) {
    return $file_name;
   } else {
    return $ret = "";
   }
  } else {
   return $ret = "";
  }
 }
}
