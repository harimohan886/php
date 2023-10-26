<?php

class Customer_model extends CI_Model {

    private $db;

    public function __construct() {
        parent::__construct();
        $database_name = switch_db_dinamico();
        $this->db = $this->load->database($database_name, TRUE);
    }

    /* get users detail */
    public function get_detail_by_id($id) {
        $q = $this->db->query("select * from tbl_customers where  id = '" . $id . "'");
        return $q->row();
    }
    
    function get_customer_list() {
        $q = $this->db->query("SELECT * FROM `tbl_customers` ORDER BY `id` ASC");
        return $q->result();
    }

    function get_customer_by_id($id) {
        $q = $this->db->query("SELECT * FROM `tbl_customers` WHERE `id` = '" . $id . "' limit 1");
        return $q->row();
    }

    public function get_set_all_data() {
        return true;
    }

    public function get_sitesetting() {
        $q = "SELECT * FROM tbl_site_setting WHERE id='1'";
        $result = $this->db->query($q)->row();
        return $result;
    }

    public function getcustomer_detail_by_id($customer_id) {
        $q = "SELECT * FROM tbl_customers WHERE id='$customer_id'";
        $result = $this->db->query($q)->row();
        return $result;
    }

    public function get_tourlistbooked_by_customer_id($customer_id) {
        $query = "SELECT t1.*, (SELECT language FROM tbl_language WHERE tbl_language.id=t1.language_id) AS language, t2.booking_id, t2.customer_id, t2.total_price, t2.no_of_adults, t2.no_of_children, t2.adult_price, t2.child_price, t2.comments, t2.status as book_status, t3.name as booker_name, t3.email FROM `tbl_tour` as t1 INNER JOIN tbl_tour_booking as t2 ON t2.tour_id = t1.id INNER JOIN tbl_customers as t3 ON t2.customer_id = t3.id  WHERE t2.customer_id='" . $customer_id . "'";
        return $this->db->query($query)->result();
        //$result=$this->db->query($query)->row();
        //return $result;
    }
}
?>
