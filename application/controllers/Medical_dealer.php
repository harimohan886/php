<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Medical_dealer extends CI_Controller {

    private $selectedlanguage;

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->database();
        $this->load->helper('login_helper');
        $this->load->library('javascript');
        $this->load->library('form_validation');
        $this->load->model("medical_dealer_model");
        $this->load->library('email');
        $this->load->library('session');
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $this->load->helper(array('form', 'url'));
        //MY_Output's disable_cache() method
        $this->output->disable_cache();
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

    public function index() {
        if (_is_user_login($this)) {
            redirect('medical_dealer/medical_dealer_approve_list');
        } else {
            redirect('login');
        }
    }

    public function medical_dealer_approve_list() {
        if (_is_user_login($this)) {
            $data["error"] = "";
            $data["pageTitle"] = "Admin Medical Dealer";
            $data["title"] = PROJECT_NAME;
            $data['admin'] = "Medical Dealer Approve";
            $data['page'] = "Medical Dealer Approve";
            $data['action'] = "List";
            $admin_id = $this->session->userdata('admin_id');
            $role = $this->session->userdata('role');
            if ($role == 1 && $admin_id >= 1) {
                $data["approve_records"] = $this->medical_dealer_model->get_approve_medical_dealer_list();
                $this->load->view('admin/medical_dealer/approve_list', $data);
            } else {
                redirect('login');
            }
        } else {
            redirect('login');
        }
    }

    public function medical_dealer_reject_list() {
        if (_is_user_login($this)) {
            $data["error"] = "";
            $data["pageTitle"] = "Admin Medical Dealer";
            $data["title"] = PROJECT_NAME;
            $data['admin'] = "Medical Dealer Reject";
            $data['page'] = "Medical Dealer Reject";
            $data['action'] = "List";
            $admin_id = $this->session->userdata('admin_id');
            $role = $this->session->userdata('role');
            if ($role == 1 && $admin_id >= 1) {
                $data["reject_records"] = $this->medical_dealer_model->get_reject_medical_dealer_list();
                $this->load->view('admin/medical_dealer/reject_list', $data);
            } else {
                redirect('login');
            }
        } else {
            redirect('login');
        }
    }

    public function medical_dealer_pending_list() {
        if (_is_user_login($this)) {
            $data["error"] = "";
            $data["pageTitle"] = "Admin Medical Dealer";
            $data["title"] = PROJECT_NAME;
            $data['admin'] = "Medical Dealer Pending";
            $data['page'] = "Medical Dealer Pending";
            $data['action'] = "List";
            $admin_id = $this->session->userdata('admin_id');
            $role = $this->session->userdata('role');
            if ($role == 1 && $admin_id >= 1) {
                $data["pending_records"] = $this->medical_dealer_model->get_pending_medical_dealer_list();
                $this->load->view('admin/medical_dealer/pending_list', $data);
            } else {
                redirect('login');
            }
        } else {
            redirect('login');
        }
    }

    public function medical_dealer_approve($id) {
        if (_is_user_login($this)) {
            $data = array();
            $data["error"] = "";
            $data["pageTitle"] = "Admin Medical Dealer";
            $data['admin'] = "Admin";
            $data['page'] = "Medical Dealer";
            $data["title"] = PROJECT_NAME;
            $data['action'] = "Edit";
            $admin_id = $this->session->userdata('admin_id');
            $role = $this->session->userdata('role');
            if ($role == 1 && $admin_id >= 1) {
                $ddata = array();
                $this->load->model("common_model");
                $ddata['updated_at'] = date('Y-m-d H:i:s');
                $ddata['status'] = '1';
                $ddata['is_deactivate_account'] = '1';
                $this->common_model->data_update("tbl_vendors", $ddata, array("id" => $id));
                $this->session->set_flashdata("message", '<div class="alert background-success alert-dismissible" id="error" role="alert">
                                <i class="fa fa-check"></i>
                              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <strong>Success ! </strong> Dealer Approved successfully.
                            </div>');
                redirect("medical_dealer/medical_dealer_approve_list");
                exit;
            } else {
                redirect('login');
            }
        }
    }

    public function medical_dealer_pending($id) {
        if (_is_user_login($this)) {
            $data = array();
            $data["error"] = "";
            $data['action'] = "Edit";
            $admin_id = $this->session->userdata('admin_id');
            $role = $this->session->userdata('role');
            if ($role == 1 && $admin_id >= 1) {
                $ddata = array();
                $this->load->model("common_model");
                $ddata['updated_at'] = date('Y-m-d H:i:s');
                $ddata['status'] = '0';
                $ddata['is_deactivate_account'] = '1';
                $this->common_model->data_update("tbl_vendors", $ddata, array("id" => $id));
                $this->session->set_flashdata("message", '<div class="alert background-success alert-dismissible" id="error" role="alert">
                                <i class="fa fa-check"></i>
                              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <strong>Success ! </strong> Dealer Pending successfully.
                            </div>');
                redirect("medical_dealer/medical_dealer_pending_list");
                exit;
            } else {
                redirect('login');
            }
        }
    }

    public function medical_dealer_reject($id) {
        if (_is_user_login($this)) {
            $data = array();
            $admin_id = $this->session->userdata('admin_id');
            $role = $this->session->userdata('role');
            if ($role == 1 && $admin_id >= 1) {
                $ddata = array();
                $this->load->model("common_model");
                $ddata['updated_at'] = date('Y-m-d H:i:s');
                $ddata['is_deactivate_account'] = '0';
                $this->common_model->data_update("tbl_vendors", $ddata, array("id" => $id));
                $this->session->set_flashdata("message", '<div class="alert background-success alert-dismissible" id="error" role="alert">
                                <i class="fa fa-check"></i>
                              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <strong>Success ! </strong> Dealer Reject successfully.
                            </div>');
                redirect("medical_dealer/medical_dealer_reject_list");
                exit;
            } else {
                redirect('login');
            }
        }
    }
}