<?php

class Category_model extends CI_Model {
    /* ========== Category========== */

    function get_categorylist() {
        $q = $this->db->query("SELECT * FROM `tbl_category` WHERE `parent_id` = '0' ORDER BY  `tbl_category`.`id` DESC");
        return $q->result();
    }

    function get_active_categorylist() {
        $q = $this->db->query("SELECT * FROM `tbl_category` WHERE `status`='1' ORDER BY  `tbl_category`.`name` DESC");
        return $q->result();
    }

    function get_category_list_count() {
        $q = $this->db->query("SELECT * FROM `tbl_category` WHERE level = '1' ORDER BY `id` ASC");
        return $q->num_rows();
    }

    function get_product_list_count() {
        $q = $this->db->query("SELECT * FROM `tbl_product` WHERE status = '1' ORDER BY `id` ASC");
        return $q->num_rows();
    }

    function get_customer_list_count() {
        $q = $this->db->query("SELECT * FROM `tbl_customers` WHERE status = '1' ORDER BY `id` ASC");
        return $q->num_rows();
    }

    function get_offer_list_count() {
        $q = $this->db->query("SELECT * FROM `tbl_offer` WHERE status = '1' ORDER BY `id` ASC");
        return $q->num_rows();
    }

    /* get users detail */
    public function get_category_by_id($id) {
        $q = $this->db->query("SELECT * FROM `tbl_category` WHERE id = '" . $id . "' limit 1");
        return $q->row();
    }

    function check_customer_email_exist_or_not($email) {
        $q = $this->db->query("SELECT * FROM `tbl_customers` WHERE `email` = '" . $email . "'");
        $data = $q->result();
        return $count = count($data);
    }
}
?>