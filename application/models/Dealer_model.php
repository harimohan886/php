<?php

class Dealer_model extends CI_Model {
    /* ========== Category========== */

    function get_dealer_list_by_id($id) {
        $q = $this->db->query("SELECT * FROM `tbl_vendors` WHERE id = '" . $id . "'");
        return $q->row();
    }

    function check_dealer_email_exist_or_not($email) {
        $q = $this->db->query("SELECT * FROM `tbl_vendors` WHERE `email` = '" . $email . "'");
        $data = $q->num_rows();
        return $data;
    }

    function check_customers_email_exist_or_not($email) {
        $q = $this->db->query("SELECT * FROM `tbl_customers` WHERE `email` = '" . $email . "'");
        $data = $q->num_rows();
        return $data;
    }
}
?>
