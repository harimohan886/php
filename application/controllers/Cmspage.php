<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Cmspage extends CI_Controller {

    public function __construct() {
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
            if ($_SERVER['HTTP_HOST'] == "localhost") {
                $this->dire_path = $_SERVER['DOCUMENT_ROOT'] . "/admin/";
            } else {
                $this->dire_path = $_SERVER['DOCUMENT_ROOT'] . "/admin/";
            }
    }

    public function index() {
            if (_is_user_login($this)) {
                redirect('cms/pages');
            } else {
                redirect("login");
            }
    }

    public function pages($id) {
            if (_is_user_login($this)) {
                $data = array();
                $data["error"] = "";
                $data["pageTitle"] = "Admin";
                $data['admin'] = "Admin";
                $data['page'] = "CMS Pages";
                $data["title"] = PROJECT_NAME;
                $data['action'] = "Edit";
                $admin_id = $this->session->userdata('admin_id');
                $role = $this->session->userdata('role');

                if ($role >= 1 && $admin_id >= 1) {
                    if (isset($_REQUEST['save_button']) && !empty($_REQUEST['save_button']) && $_REQUEST['save_button'] === "Update") {
                        $this->load->library('form_validation');
                        $this->form_validation->set_rules('description', 'description', 'trim|required');
                        if ($this->form_validation->run() == FALSE) {
                            $this->session->set_flashdata("messages", '.$this->form_validation->error_string().');
                        } 
                        else {
                            $ct = date('Y-m-d H:i:s');
                            $description = trim($_POST['description']);
                            $description = trim(preg_replace('/\s+/', ' ', $description));

                            $update_array = array(
                                "desc" => $description,
                                "updated_at" => $ct,
                            );

                            $this->load->model("common_model");
                            $this->common_model->data_update("tbl_cms", $update_array, array("id" => $id));
                            $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" role="alert" id="error">
                                          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                          <strong>Success ! </strong> CMS Page updated successfully
                                        </div>');
                            redirect("cmspage/pages/$id");
                            exit;
                        }
                    }
                    $this->load->model("cmspages_model");
                    $cms_page = $this->cmspages_model->get_cms_page_by_id($id);
                    $data["cms_page"] = $cms_page;
                    $this->load->view('admin/cms/pages', $data);
                }
            } else {
                redirect('login');
            }
    }

    public function upload() {
            $path = $this->config->item('cms_images_path');
            $returnpath = $this->config->item('cms_images_uploaded_path');
            if (isset($_FILES['upload']['name'])) {
                $file = $_FILES['upload']['tmp_name'];
                $file_name = $_FILES['upload']['name'];
                $file_name_array = explode(".", $file_name);
                $extension = end($file_name_array);
                $image = $this->file_upload($_FILES['upload'], $path);
                if (!empty($image)) {
                    $function_number = $_GET['CKEditorFuncNum'];
                    $image = $returnpath . $image;
                    $message = '';
                    echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$image', '$message');</script>";
                }
            }
    }

    private function file_upload($arr, $path) {
            set_time_limit(0);
            if ($arr['error'] == 0) {
                $temp = explode(".", $arr["name"]);
                $file_name = rand(10, 100) . time() . '.' . end($temp);
                $file_path = $path . $file_name;
                if (move_uploaded_file($arr["tmp_name"], $file_path) > 0) {
                    $ret = $file_name;
                } else {
                    $ret = "";
                }
            }
            return $ret;
    }
}