<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Dealerlogin extends CI_Controller {

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
                $this->dire_path = $_SERVER['DOCUMENT_ROOT'] . "/";
            } else {
                $this->dire_path = $_SERVER['DOCUMENT_ROOT'] . "/";
            }
    }

    public function index() {
            if (_is_dealer_login($this)) {
                redirect(_get_dealer_redirect($this));
            } else {
                $data = array("error" => "");
                if (isset($_POST)) {
                    $this->load->library('form_validation');
                    $this->form_validation->set_rules('email', 'Email', 'trim|required');
                    $this->form_validation->set_rules('password', 'Password', 'trim|required');
                    if ($this->form_validation->run() == FALSE) {
                        if ($this->form_validation->error_string() != "") {
                            $data["error"] = '<div class="alert alert-warning alert-dismissible" role="alert" id="error">
                                      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                      <strong>Warning!</strong> ' . $this->form_validation->error_string() . '
                                    </div>';
                        }
                    } else {
                        $email = $this->input->post("email");
                        $password = md5($this->input->post("password"));
                        $where = array("email" => $email, "password" => $password);
                        $this->db->select('*');
                        $this->db->from('tbl_vendors');
                        $this->db->where($where);
                        $q = $this->db->get()->result_array();
                        if (!empty($q)) {
                            $info = $q[0];
                            if ($info['is_deactivate_account'] == '1') {
                                if ($info['status'] == '1') {
                                    if ($info['type_category'] == "1" || $info['type_category'] == "2" || $info['type_category'] == "3" || $info['type_category'] == "4" || $info['type_category'] == "5" || $info['type_category'] == "6") {
                                        $_SESSION['dealer_role'] = $info['type_category'];
                                        $_SESSION['dealer_id'] = $info['id'];
                                        $newdata = array(
                                            'user_name' => $info['name'],
                                            'user_email' => $info['email'],
                                            'logged_in' => TRUE,
                                            'dealer_id' => $info['id'],
                                            'dealer_type_id' => $info['type_category'],
                                            'email' => $info['email'],
                                            'password' => $info['password'],
                                            'profile_pic' => $info['profile_pic'],
                                            'role' => $info['type_category'],
                                        );
                                        $this->session->set_userdata($newdata);
                                        redirect("dealer/dashboard");
                                        exit;
                                    } else {
                                        $data["error"] = '<div class="alert alert-danger alert-dismissible " role="alert" id="error">
                                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <strong>Error ! </strong> You have not access to web panel. </div>';
                                    }
                                } else {
                                    $data["error"] = '<div class="alert alert-danger alert-dismissible " role="alert" id="error">
                                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <strong>Error ! </strong> Your account is deactived by admin. Please contact to admin. </div>';
                                }
                            } else {
                                $data["error"] = '<div class="alert alert-danger alert-dismissible " role="alert" id="error">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <strong>Error ! </strong> Your account is permanently deactived by admin. Please contact to admin. </div>';
                            }
                        } else {
                            $data["error"] = '<div class="alert alert-danger alert-dismissible " role="alert" id="error">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <strong>Error ! </strong> Invalid Email or password. </div>';
                        }
                    }
                }
                $data["active"] = "login";
                $data["title"] = PROJECT_NAME;
                $this->load->view("dealer/login", $data);
            }
    }

    public function signout() {
            $admin_id = $this->session->userdata('dealer_id');
            $role = $this->session->userdata('dealer_role');
            if (isset($admin_id) && isset($role)) {
                if (($role == 1 || $role == 2 || $role == 3 || $role == 4 || $role == 5 || $role == 6 ) && $admin_id >= 1) {
                    $ct = date('Y-m-d H:i:s');
                    session_destroy();
                    $data["error"] = '<div class="alert alert-success alert-dismissible " role="alert" id="error">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <strong>Error ! </strong> Sinout successfully </div>';
                    redirect("dealers-login");
                    exit;
                } else {
                    $data["error"] = '<div class="alert alert-success alert-dismissible " role="alert" id="error">
                                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <strong>Error ! </strong> Sinout successfully </div>';
                    redirect("dealers-login");
                    exit;
                }
            } else {
                $data["error"] = '<div class="alert alert-success alert-dismissible " role="alert" id="error">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <strong>Error ! </strong> Sinout successfully </div>';
                redirect("dealers");
                exit;
            }
    }
}