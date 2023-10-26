<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Customer extends CI_Controller {

    private $selectedlanguage;

    public function __construct() {
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
            $this->load->model('customer_model');
            $this->load->helper(array('form', 'url'));
            $this->load->library("pagination");
    }

    public function my_orders() {
            $sess_is_customer = $this->session->userdata('is_customer');
            if (!empty($sess_is_customer) && ($sess_is_customer == '1')) {
                $data = array();
                $data['title'] = "My Orders";
                $customer_id = $this->session->userdata('userid');
                $data['customer_detail'] = $this->customer_model->get_detail_by_id($customer_id);
                $this->load->view('front/customer/my_orders', $data);
            } else {
                redirect("customer-login");
            }
    }
    public function index() {
        if (_is_user_login($this)) {


            redirect('customer/customer_list');
        } else {
            redirect('login');
        }
    }
    public function customer_list() {
        if (_is_user_login($this)) {
            $data["error"] = "";
            $data["pageTitle"] = "Customers";
            $data["title"] = PROJECT_NAME;
            $data['admin'] = "Active Customers";
            $data['page'] = "Active Customers";
            $data['action'] = "List";

            $admin_id = $this->session->userdata('admin_id');
            $role = $this->session->userdata('role');

            if ($role == 1 && $admin_id >= 1) {
                 $data["customers"] = $this->customer_model->get_customer_list();
                $this->load->view('admin/customers/list', $data);
            } else {
                redirect('login');
            }
        } else {
            redirect('login');
        }
    }
    public function customer_delete($id) {
        if (_is_user_login($this)) {
            $admin_id = $this->session->userdata('admin_id');
            $role = $this->session->userdata('role');
            if ($role == 1 && $admin_id >= 1) {
                $data = array();
                $this->load->model("customer_model");
                $category = $this->customer_model->get_customer_by_id($id);
                if ($category) {
                    $this->db->query("DELETE FROM `tbl_language` WHERE `id` = '" . $category->id . "'");
                    $this->session->set_flashdata("message", '<div class="alert background-danger alert-dismissible" role="alert" id="error">
                                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <strong>Success ! </strong> Customer deleted successfully
                                  </div>');
                    redirect("customer/customer_list");
                    exit;
                }
            } else {
                redirect('login');
            }
        } else {
            redirect('login');
        }
    }

     function customer_view($id) {
            if (_is_user_login($this)) {
                $data = array();
                $data['action'] = "Profile";
                $data['page'] = "Profile";
                $data['title'] = "Profile";
                $this->load->model("customer_model");
                $data["customers"] = $this->customer_model->get_customer_by_id($id);
                
                $data['country'] = $this->World_wide_model->fetch_country();
                $data['statename'] = $this->World_wide_model->fetch_state_list($data["customers"]->country);
                $data['cityname'] = $this->World_wide_model->fetch_city_list($data["customers"]->state);
                //print_r($data['statename']);die;
                //echo "<pre>"; print_r($data); exit;
                $this->load->view('admin/customers/view', $data);
            } 
            else {
                redirect('login');
            }
    }
}