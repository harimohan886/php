<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Guide_rate extends CI_Controller {

    private $selectedlanguage;

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->database();
        $this->load->helper('login_helper');
        $this->load->library('javascript');
        $this->load->library('form_validation');
        $this->load->model("tour_guide_model");
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
    }

    public function index() {
        if (_is_user_login($this)) {

            redirect('guide_rate/guide_rate_list');
        } else {
            redirect('login');
        }
    }

    public function guide_rate_list() {
        if (_is_dealer_login($this)) {
            $dealerid = $this->session->userdata('dealer_id');
            $data['action'] = "Guide Rate";
            $data['page'] = "List";
            $data['title'] = "Tour";
            $data['tour_include'] = $this->tour_guide_model->get_guide_rate($dealerid);
            $this->load->view("dealer/guiderate/list", $data);
        } else {
            redirect('dealers-login');
        }
    }

    public function guide_rate_add() {
        if (_is_dealer_login($this)) {
            $dealerid = $this->session->userdata('dealer_id');
            $data['action'] = "Tour Guide Rate";
            $data['page'] = "Add";
            $data['title'] = "Tour Guide Rate Add";
            $data['language'] = $this->get_language();
            $data['country'] = $this->get_country();
            if (isset($_REQUEST['save_button']) && $_REQUEST['save_button'] == "Save") {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('language_id', 'Language', 'trim|required');
                $this->form_validation->set_rules('country_id', 'Country', 'trim|required');
                $this->form_validation->set_rules('currency', 'currency', 'trim|required');
                $this->form_validation->set_rules('rate', 'rate', 'trim|required');
                if ($this->form_validation->run() == FALSE) {
                    $data["error"] = $this->form_validation->error_string();
                } else {
                    $status = isset($_POST["status"]) ? $_POST["status"] : "";
                    if ($status == "on") {
                        $status = "1";
                    } else {
                        $status = "0";
                    }
                    $insert = array(
                        "vendor_id" => $dealerid,
                        "language_id" => $_POST["language_id"],
                        "country_id" => $_POST["country_id"],
                        "currency" => $_POST["currency"],
                        "price" => $_POST["rate"],
                        "status" => $status,
                        "created_at" => date("Y-m-d H:i:s"),
                        "updated_at" => NULL,
                    );
                    $this->load->model("common_model");
                    $insertid = $this->common_model->data_insert('tbl_guide_price', $insert);
                    if ($insertid) {
                        redirect("guide_rate/guide_rate_list");
                    }
                }
            }
            $this->load->view("dealer/guiderate/add", $data);
        } else {
            redirect('dealers-login');
        }
    }

    public function guide_rate_edit($id) {
        if (_is_dealer_login($this)) {
            $data['action'] = "Tour Guide Rate";
            $data['page'] = "Edit";
            $data['title'] = "Tour Guide Rate Edit";
            $data['language'] = $this->get_language();
            $data['country'] = $this->get_country();
            $data['rate_data'] = $this->tour_guide_model->get_guide_rate_by_id($id);
            if (isset($_REQUEST['save_button']) && $_REQUEST['save_button'] == "Update") {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('language_id', 'Language', 'trim|required');
                $this->form_validation->set_rules('country_id', 'Country', 'trim|required');
                $this->form_validation->set_rules('currency', 'currency', 'trim|required');
                $this->form_validation->set_rules('rate', 'rate', 'trim|required');
                if ($this->form_validation->run() == FALSE) {
                    $data["error"] = $this->form_validation->error_string();
                } else {
                    $status = isset($_POST["status"]) ? $_POST["status"] : "";
                    if ($status == "on") {
                        $status = "1";
                    } else {
                        $status = "0";
                    }
                    $insert = array(
                        "language_id" => $_POST["language_id"],
                        "country_id" => $_POST["country_id"],
                        "currency" => $_POST["currency"],
                        "price" => $_POST["rate"],
                        "status" => $status,
                        "updated_at" => date("Y-m-d H:i:s"),
                    );
                    $this->load->model("common_model");
                    $insertid = $this->common_model->data_update('tbl_guide_price', $insert, array("id" => $id));
                    if ($insertid) {
                        redirect("guide_rate/guide_rate_list");
                    }
                }
            }
            $this->load->view("dealer/guiderate/edit", $data);
        } else {
            redirect('dealers-login');
        }
    }

    private function file_upload($arr, $path) {
        set_time_limit(0);
        if ($arr['error'] == 0) {
            $temp = explode(".", $arr["name"]);
            $random_number = uniqid() . time();
            $file_name = $random_number . '.' . end($temp);
            $file_path = $path . $file_name;
            if (move_uploaded_file($arr["tmp_name"], $file_path) > 0) {
                return $file_name;
            } else {
                return $ret = "";
            }
        } else {
            return $ret = "";
        }
    }

    public function guide_rate_delete($id) {
        if (_is_dealer_login($this)) {
            $dealerid = $this->session->userdata('dealer_id');
            $query = "DELETE FROM tbl_guide_price WHERE id='" . $id . "' AND vendor_id='" . $dealerid . "'";
            $this->db->query($query);
            $this->session->set_flashdata("message", '<div class="alert background-danger alert-dismissible" role="alert"><button class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Successful ! </strong>  Tour Delete successful</div>');
            redirect('guide_rate/guide_rate_list');
        } else {
            redirect('dealers-login');
        }
    }

    public function get_language() {
        $query = "SELECT * FROM `tbl_language` ORDER BY language ASC";
        $data = $this->db->query($query)->result();
        return $data;
    }

    public function get_country() {
        $query = "SELECT * FROM `tbl_countries` ORDER BY id ASC";
        $data = $this->db->query($query)->result();
        return $data;
    }

}
