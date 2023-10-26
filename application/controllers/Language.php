<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Language extends CI_Controller {

    private $selectedlanguage;

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->database();
        $this->load->helper('login_helper');
        $this->load->library('javascript');
        $this->load->library('form_validation');
        $this->load->model("language_model");
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

            redirect('language/language_list');
        } else {
            redirect('login');
        }
    }

    public function language_list() {
        if (_is_user_login($this)) {
            $data["error"] = "";
            $data["pageTitle"] = "Admin Language";
            $data["title"] = PROJECT_NAME;
            $data['admin'] = "Language";
            $data['page'] = "Language";
            $data['action'] = "List";
            $admin_id = $this->session->userdata('admin_id');
            $role = $this->session->userdata('role');
            if ($role == 1 && $admin_id >= 1) {
                $data["language_records"] = $this->language_model->get_language_list();
                $this->load->view('admin/language/list', $data);
            } else {
                redirect('login');
            }
        } else {
            redirect('login');
        }
    }

    public function language_add() {
        if (_is_user_login($this)) {
            $data = array();
            $data["error"] = "";
            $data["pageTitle"] = "Admin Language";
            $data['admin'] = "Admin";
            $data['page'] = "Language";
            $data["title"] = PROJECT_NAME;
            $data['action'] = "Add";
            $admin_id = $this->session->userdata('admin_id');
            $role = $this->session->userdata('role');

            if ($role == 1 && $admin_id >= 1) {
                if (isset($_REQUEST['save_button']) && !empty($_REQUEST['save_button']) && $_REQUEST['save_button'] === "Insert") {
                    $this->load->library('form_validation');
                    $this->form_validation->set_rules('code', 'Code', 'trim|required');
                    $this->form_validation->set_rules('language', 'Select Language', 'trim|required');
                    if ($this->form_validation->run() == FALSE) {
                        $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
                    } else {
                        $ddata = array();
                        $ddata['code'] = $this->input->post("code");
                        $ddata['language'] = $this->input->post("language");
                        $ddata['status'] = ($this->input->post("status") == "on") ? '1' : '0';
                        $this->load->model("common_model");
                        $ddata['created_at'] = date('Y-m-d H:i:s');
                        $this->common_model->data_insert("tbl_language", $ddata);
                        $this->session->set_flashdata("message", '<div class="alert background-success alert-dismissible" id="error" role="alert">
                                        <i class="fa fa-check"></i>
                                      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                      <strong>Success ! </strong> Language saved successfully.
                                    </div>');
                        redirect("language/language_list");
                        exit;
                    }
                }
                $this->load->view('admin/language/add', $data);
            } else {
                redirect('login');
            }
        }
    }

    public function language_edit($id) {
        if (_is_user_login($this)) {
            $data = array();
            $data["error"] = "";
            $data["pageTitle"] = "Admin Language";
            $data['admin'] = "Admin";
            $data['page'] = "Language";
            $data["title"] = PROJECT_NAME;
            $data['action'] = "Edit";
            $admin_id = $this->session->userdata('admin_id');
            $role = $this->session->userdata('role');
            if ($role == 1 && $admin_id >= 1) {
                $language = $this->language_model->get_language_by_id($id);
                $data['language'] = $language;
                if (isset($_REQUEST['save_button']) && !empty($_REQUEST['save_button']) && $_REQUEST['save_button'] === "Update") {
                    $this->load->library('form_validation');
                    $this->form_validation->set_rules('code', 'Code', 'trim|required');
                    $this->form_validation->set_rules('language', 'Language', 'trim|required');
                    if ($this->form_validation->run() == FALSE) {
                        $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
                    } else {
                        $ddata = array();
                        $ddata['code'] = $this->input->post("code");
                        $ddata['language'] = $this->input->post("language");
                        $ddata['status'] = ($this->input->post("status") == "on") ? '1' : '0';
                        $this->load->model("common_model");
                        $ddata['updated_at'] = date('Y-m-d H:i:s');
                        $this->common_model->data_update("tbl_language", $ddata, array("id" => $id));
                        $this->session->set_flashdata("message", '<div class="alert background-success alert-dismissible" id="error" role="alert">
                                        <i class="fa fa-check"></i>
                                      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                      <strong>Success ! </strong> Language Updated successfully.
                                    </div>');
                        redirect("language/language_list");
                        exit;
                    }
                }
                $this->load->view('admin/language/edit', $data);
            } else {
                redirect('login');
            }
        }
    }

    public function language_delete($id) {
        if (_is_user_login($this)) {
            $admin_id = $this->session->userdata('admin_id');
            $role = $this->session->userdata('role');
            if ($role == 1 && $admin_id >= 1) {
                $data = array();
                $this->load->model("language_model");
                $category = $this->language_model->get_language_by_id($id);
                if ($category) {
                    $this->db->query("DELETE FROM `tbl_language` WHERE `id` = '" . $category->id . "'");
                    $this->session->set_flashdata("message", '<div class="alert background-danger alert-dismissible" role="alert" id="error">
                                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <strong>Success ! </strong> Language deleted successfully
                                  </div>');
                    redirect("language/language_list");
                    exit;
                }
            } else {
                redirect('login');
            }
        } else {
            redirect('login');
        }
    }

}
