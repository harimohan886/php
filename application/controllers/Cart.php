<?php

defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Cart extends CI_Controller
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
  $this->load->model('Front_model');
  $this->load->helper(array('form', 'url'));
  $this->load->library("pagination");
 }

 public function tour_book($slug)
 {
  $data          = array();
  $data['title'] = "Tour Booking";
  $this->load->model("tour_model");
  $user_data = $this->session->userdata;

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

    $data["country"] = $this->World_wide_model->fetch_country();
    $data["state"]   = $this->World_wide_model->fetch_state($customer_detail[0]->country);
    $data["city"]    = $this->World_wide_model->fetch_city($customer_detail[0]->state);
   }
   $data['user_data'] = $user_data;
  }

  $lng                   = 1;
  $data['tour']          = $this->tour_model->check_tour_slug($lng, $slug);
  $data["country"]       = $this->World_wide_model->fetch_country();
  $data['tour_include']  = explode(",", $data['tour']->included);
  $data['tour_overview'] = $this->tour_model->tour_overview_by_tour_id($data['tour']->id);
  $tour_id               = $data['tour']->id;
  $tour_price_adt        = $data['tour']->sale_price;
  $tour_price_chd        = $data['tour']->child_price;
  $tour_start_date       = $data['tour']->start_date;
  $tour_end_date         = $data['tour']->end_date;
  $tour_slug             = $data['tour']->slug;

  if (isset($_POST['book_now']) && $_POST['book_now'] == 'booking') {
   $this->load->library('form_validation');
   $this->form_validation->set_rules('booking_start_date', 'Check in', 'trim|required');
   $this->form_validation->set_rules('booking_end_date', 'Check out', 'trim|required');
   $this->form_validation->set_rules('adult', 'Adult', 'trim|required');
   $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
   $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
   $this->form_validation->set_rules('email_address', 'Email Address', 'trim|required');
   $this->form_validation->set_rules('contact_number', 'Contact Number', 'trim|required');
   $this->form_validation->set_rules('address', 'Address', 'trim|required');
   $this->form_validation->set_rules('comments', 'Comments', 'trim|required');

   if ($this->form_validation->run() == false) {
    $data["error"] = '<div class="alert alert-warning alert-dismissible" role="alert" id="error">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <strong>Warning !</strong> ' . $this->form_validation->error_string() . '
                        </div>';

    $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible" role="alert" id="error">
                              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <strong>Warning !</strong> ' . $this->form_validation->error_string() . '
                            </div>');
   } else {
    $pdata['booking_start_date'] = date('Y-m-d', strtotime($this->input->post("booking_start_date")));
    $pdata['booking_end_date']   = date('Y-m-d', strtotime($this->input->post("booking_end_date")));

    if (($pdata['booking_start_date'] > $pdata['booking_end_date']) || ($pdata['booking_start_date'] > $tour_start_date)) {

     $data["error"] = '<div class="alert alert-warning alert-dismissible" role="alert" id="error">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <strong>Warning !</strong> Invalid date selected </div>';

     $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible" role="alert" id="error">
                              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <strong>Warning !</strong> Invalid date selected.</div>');
    }

    $udata = array();

    $udata['first_name'] = $this->input->post("first_name");
    $udata['last_name']  = $this->input->post("last_name");
    $udata['email']      = $this->input->post("email_address");
    $udata['mobile']     = $this->input->post("contact_number");
    $udata['address']    = $this->input->post("address");
    $udata['city']       = $this->input->post("city");
    $udata['state']      = $this->input->post("state");
    $udata['country']    = $this->input->post("country");
    $udata['zipcode']    = $this->input->post("zipcode");

    $pdata            = array();
    $pdata['tour_id'] = $tour_id;
    $pdata['slug']    = $tour_slug;

    $pdata['booking_start_date'] = $this->input->post("booking_start_date");
    $pdata['booking_end_date']   = $this->input->post("booking_end_date");
    $pdata['no_of_adults']       = $this->input->post("adult");
    $pdata['no_of_children']     = $this->input->post("children");
    $pdata['comments']           = $this->input->post("comments");
    $pdata['adult_price']        = $this->input->post("adult_price");
    $pdata['child_price']        = $this->input->post("child_price");

    $tot_price1 = $pdata['no_of_adults'] * $tour_price_adt;
    $tot_prc    = 0;
    if ($pdata['no_of_children'] > 0) {
     $tot_price2 = $pdata['no_of_children'] * $tour_price_chd;
     $tot_prc    = $tot_price1 + $tot_price2;
    } else {
     $tot_prc = $tot_price1;
    }
    $pdata['total_price'] = $tot_prc;

    $tbk_data['booking']['bookingid']         = time();
    $tbk_data['booking']['booking_user_info'] = $udata;
    $tbk_data['booking']['booking_info']      = $pdata;
    $this->session->set_userdata($tbk_data);

    $bdata     = $this->session->userdata;
    $bookingid = $bdata['booking']['bookingid'];
    if ($bookingid > 0) {
     redirect('tour-confirm');
     exit;
    }
   }
  }
  $this->load->view('front/tour_book', $data);
 }

 public function book_tour($slug)
 {
  $data          = array();
  $data['title'] = "Tour Booking";
  $this->load->model("tour_model");
  $user_data = $this->session->userdata;

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

    $data["country"] = $this->World_wide_model->fetch_country();
    $data["state"]   = $this->World_wide_model->fetch_state($customer_detail[0]->country);
    $data["city"]    = $this->World_wide_model->fetch_city($customer_detail[0]->state);
   }
   $data['user_data'] = $user_data;
  }

  $lng                   = 1;
  $data['tour']          = $this->tour_model->check_tour_slug($lng, $slug);
  $data["country"]       = $this->World_wide_model->fetch_country();
  $data['tour_include']  = explode(",", $data['tour']->included);
  $data['tour_overview'] = $this->tour_model->tour_overview_by_tour_id($data['tour']->id);
  $tour_id               = $data['tour']->id;
  $tour_price_adt        = $data['tour']->sale_price;
  $tour_price_chd        = $data['tour']->child_price;
  $tour_start_date       = $data['tour']->start_date;
  $tour_end_date         = $data['tour']->end_date;
  $tour_slug             = $data['tour']->slug;

  if (isset($_POST['book_now']) && $_POST['book_now'] == 'booking') {
   $this->load->library('form_validation');
   $this->form_validation->set_rules('booking_start_date', 'Check in', 'trim|required');
   $this->form_validation->set_rules('booking_end_date', 'Check out', 'trim|required');
   $this->form_validation->set_rules('adult', 'Adult', 'trim|required');
   $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
   $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
   $this->form_validation->set_rules('email_address', 'Email Address', 'trim|required');
   $this->form_validation->set_rules('contact_number', 'Contact Number', 'trim|required');
   $this->form_validation->set_rules('address', 'Address', 'trim|required');
   $this->form_validation->set_rules('comments', 'Comments', 'trim|required');

   if ($this->form_validation->run() == false) {
    $data["error"] = '<div class="alert alert-warning alert-dismissible" role="alert" id="error">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <strong>Warning !</strong> ' . $this->form_validation->error_string() . '
                        </div>';

    $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible" role="alert" id="error">
                              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <strong>Warning !</strong> ' . $this->form_validation->error_string() . '
                            </div>');

    redirect('tour-details/' . $slug);
    exit;
   } else {
    $pdata['booking_start_date'] = date('Y-m-d', strtotime($this->input->post("booking_start_date")));
    $pdata['booking_end_date']   = date('Y-m-d', strtotime($this->input->post("booking_end_date")));

    if (($pdata['booking_start_date'] > $pdata['booking_end_date']) || ($pdata['booking_start_date'] > $tour_start_date)) {

     $data["error"] = '<div class="alert alert-warning alert-dismissible" role="alert" id="error">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <strong>Warning !</strong> Invalid date selected </div>';

     $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible" role="alert" id="error">
                              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <strong>Warning !</strong> Invalid date selected.</div>');

     redirect('tour-details/' . $slug);
     exit;
    }

    $udata = array();

    $udata['first_name'] = $this->input->post("first_name");
    $udata['last_name']  = $this->input->post("last_name");
    $udata['email']      = $this->input->post("email_address");
    $udata['mobile']     = $this->input->post("contact_number");
    $udata['address']    = $this->input->post("address");
    $udata['city']       = $this->input->post("city");
    $udata['state']      = $this->input->post("state");
    $udata['country']    = $this->input->post("country");
    $udata['zipcode']    = $this->input->post("zipcode");

    $pdata            = array();
    $pdata['tour_id'] = $tour_id;
    $pdata['slug']    = $tour_slug;

    $pdata['booking_start_date'] = $this->input->post("booking_start_date");
    $pdata['booking_end_date']   = $this->input->post("booking_end_date");
    $pdata['no_of_adults']       = $this->input->post("adult");
    $pdata['no_of_children']     = $this->input->post("children");
    $pdata['comments']           = $this->input->post("comments");
    $pdata['adult_price']        = $this->input->post("adult_price");
    $pdata['child_price']        = $this->input->post("child_price");

    $tot_price1 = $pdata['no_of_adults'] * $tour_price_adt;
    $tot_prc    = 0;
    if ($pdata['no_of_children'] > 0) {
     $tot_price2 = $pdata['no_of_children'] * $tour_price_chd;
     $tot_prc    = $tot_price1 + $tot_price2;
    } else {
     $tot_prc = $tot_price1;
    }
    $pdata['total_price'] = $tot_prc;

    $tbk_data['booking']['bookingid']         = time();
    $tbk_data['booking']['booking_user_info'] = $udata;
    $tbk_data['booking']['booking_info']      = $pdata;
    $this->session->set_userdata($tbk_data);

    $bdata     = $this->session->userdata;
    $bookingid = $bdata['booking']['bookingid'];
    if ($bookingid > 0) {
     redirect('tour-confirm');
     exit;
    }
   }
  }
 }

 public function tour_confirm()
 {
  $bdata         = $this->session->userdata;
  $bookingid     = $bdata['booking']['bookingid'];
  $data          = array();
  $data['title'] = "Tour Confirm";
  $this->load->model("tour_model");

  if ($bookingid > 0) {
   $tour_id      = $bdata['booking']['booking_info']['tour_id'];
   $slug         = $bdata['booking']['booking_info']['slug'];
   $lng          = 1;
   $data['tour'] = $this->tour_model->check_tour_slug($lng, $slug);

   $data['tour_include']  = explode(",", $data['tour']->included);
   $data['tour_overview'] = $this->tour_model->tour_overview_by_tour_id($data['tour']->id);
   $data['bdata']         = $bdata;

   if (isset($_POST['book_now']) && $_POST['book_now'] == 'Booking') {
    $user_data = $this->session->userdata;
    if (isset($user_data['user_type']) && ($user_data['is_customer'] == 1) && ($user_data['user_type'] == 2)) {
     $customer_id = $user_data['userid'];
    } else {
     $customer_id = 0;
    }

    $no_of_adults   = $this->input->post("no_of_adults");
    $no_of_children = $this->input->post("no_of_children");
    $bdata          = $this->session->userdata;

    if (isset($customer_id) && ($customer_id > 0)) {
     $b = $customer_id;
    } else {
     $udata         = array();
     $udata['name'] = $bdata['booking']['booking_user_info']['first_name'] . " " .
      $bdata['booking']['booking_user_info']['last_name'];

     $udata['email']     = $bdata['booking']['booking_user_info']['email'];
     $udata['mobile']    = $bdata['booking']['booking_user_info']['mobile'];
     $udata['address']   = $bdata['booking']['booking_user_info']['address'];
     $udata['city']      = $bdata['booking']['booking_user_info']['city'];
     $udata['state']     = $bdata['booking']['booking_user_info']['state'];
     $udata['country']   = $bdata['booking']['booking_user_info']['country'];
     $udata['zipcode']   = $bdata['booking']['booking_user_info']['zipcode'];
     $udata['user_type'] = '1';

     $this->load->model("common_model");
     $b = $this->Common_model->data_insert("tbl_customers", $udata, true);
     $this->db->insert_id();
    }

    $pdata                       = array();
    $pdata['tour_id']            = $bdata['booking']['booking_info']['tour_id'];
    $pdata['customer_id']        = $b;
    $pdata['booking_start_date'] = date("Y-m-d", strtotime($bdata['booking']['booking_info']['booking_start_date']));
    $pdata['booking_end_date']   = date("Y-m-d", strtotime($bdata['booking']['booking_info']['booking_end_date']));
    $pdata['no_of_adults']       = $bdata['booking']['booking_info']['no_of_adults'];
    $pdata['no_of_children']     = $bdata['booking']['booking_info']['no_of_children'];
    $pdata['comments']           = $bdata['booking']['booking_info']['comments'];
    $pdata['total_price']        = $bdata['booking']['booking_info']['total_price'];
    $pdata['adult_price']        = $bdata['booking']['booking_info']['adult_price'];
    $pdata['child_price']        = $bdata['booking']['booking_info']['child_price'];
    $v                           = $this->Common_model->data_insert("tbl_tour_booking", $pdata, true);

    if ($v > 0) {
     $data_bfr = $this->session->userdata;
     $this->session->unset_userdata('booking');
     $data_aft = $this->session->userdata;

     if (isset($customer_id) && ($customer_id == 0)) {
      $_SESSION['status'] = 1;
      $_SESSION['id']     = $b;
      $userdata           = array(
       'username'    => $udata['name'],
       'useremail'   => $udata['email'],
       'userid'      => $b,
       'userimage'   => '',
       'userstatus'  => 1,
       'is_customer' => 1,
       'user_type'   => 1,
      );
      $this->session->set_userdata($userdata);
      $data = $this->session->userdata;
     }

     $data["error"] = '<div class="alert alert-warning alert-dismissible" role="alert" id="error">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <strong>Success !</strong> Your booking request has send successfully. </div>';

     $this->session->set_flashdata("message", '<div class="alert alert-warning alert-dismissible" role="alert" id="error">
                              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <strong>Success !</strong> Your booking request has send successfully.</div>');

     redirect('tour');
     exit;
    }
   }
   $this->load->view('front/tour_confirm', $data);
  } else {
   redirect('tour');
   exit;
  }
 }
}
