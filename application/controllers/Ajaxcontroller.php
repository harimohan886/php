<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Ajaxcontroller extends CI_Controller {

    public function __construct() {
            parent::__construct();
            $this->load->database();
            $this->load->helper('login_helper');
            $this->load->library('javascript');
            $this->load->library('form_validation');
            $this->load->library('email');
            $this->load->library('session');
            $this->load->dbutil();
            $this->load->helper('url');
            $this->load->model("World_wide_model");
            $this->load->helper('file');
            $this->load->helper('download');
    }

    function fetch_state(){
        
        if(isset($_GET["country_id"]) && !empty($_GET["country_id"])){
            $country_id = $_GET['country_id'];
        } else{
            $country_id = $_REQUEST['country_id'];
        }
            if($country_id != ''){
                $query = $this->World_wide_model->fetch_state( $country_id);
                $select = "Select State";
                echo $output = '<option value="">'.$select.'</option>';
                foreach($query as $row) {
                    echo $output = '<option value="'.$row->id.'">'.$row->name.'</option>';
                }
                echo $output;
            }
    }

    function fetch_city(){
            
            if(isset($_GET["state_id"]) && !empty($_GET["state_id"])){
                $state_id = $_GET['state_id'];
            } else{
                $state_id = $_REQUEST['state_id'];
            }
            if($state_id != '') {
                $query=$this->World_wide_model->fetch_city($state_id);
                $select = "Select City";
                echo $output = '<option value="">'.$select.'</option>';
                foreach($query as $row) {
                    echo $output = '<option value="'.$row->id.'">'.$row->name.'</option>';
                }
                exit;
            }
    }

    function fetch_booking_totalprice() {
            $bdata = $this->session->userdata;
            $bookingid = $bdata['booking']['bookingid']; 
            //$this->session->sess_destroy();
            $no_of_adults = $this->input->post('no_of_adults');
            $no_of_children = $this->input->post('no_of_children');
            $sale_price = $this->input->post('sale_price');
            $child_price = $this->input->post('child_price');
            $tot_price1 = 0;
            $tot_price2 = 0;
        
            if($no_of_children > 0 ) {
                $tot_price1 = $no_of_children*$child_price;
                $bdata['booking']['booking_info']['no_of_children'] = $no_of_children;
            }
            else {
                $tot_price1 = 0;
                $bdata['booking']['booking_info']['no_of_children'] = $no_of_children;
            }
            if($no_of_adults > 0) {
                $tot_price2 = $no_of_adults*$sale_price;
                $bdata['booking']['booking_info']['no_of_adults'] = $no_of_adults;
            }
            else {
                $tot_price2 = 0;
                $bdata['booking']['booking_info']['no_of_adults'] = $no_of_adults;
            }

            $tot_price = $tot_price1+$tot_price2;
            $bdata['booking']['booking_info']['total_price'] = $tot_price;

            $this->session->set_userdata($bdata);
            $bdata2 = $this->session->userdata;            
            echo $tot_price; exit;
    }
}