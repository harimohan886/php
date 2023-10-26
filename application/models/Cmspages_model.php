<?php

class Cmspages_model extends CI_Model {
    /* ========== Category========== */

    private $db;

    public function __construct() {
        parent::__construct();
        $database_name = switch_db_dinamico();
        $this->db = $this->load->database($database_name, TRUE);
    }

    function get_productslist() {
        $q = $this->db->query("SELECT * FROM `tbl_products` ORDER BY  `tbl_products`.`product_name` ASC");
        return $q->result();
    }

    function get_active_productslist() {
        $q = $this->db->query("SELECT * FROM `tbl_products` WHERE `product_status`='1' ORDER BY  `tbl_products`.`product_name` ASC");
        return $q->result();
    }

    /* get users detail */
    public function get_cms_page_by_id($id) {
        $q = $this->db->query("SELECT * FROM `tbl_cms` WHERE id = '" . $id . "' limit 1");
        return $q->row();
    }
}
?>