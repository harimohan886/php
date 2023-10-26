<?php

class Location_model extends CI_Model {
    /* ========== Category========== */

    private $db;

    public function __construct() {
        parent::__construct();
        $database_name = switch_db_dinamico();
        $this->db = $this->load->database($database_name, TRUE);
    }

    function get_location_list() {
        $q = $this->db->query("SELECT * FROM `tbl_cities` WHERE state_id IN(2713,2714,2715,2716,2717,2718,2719,2720,2721,2722)");
        return $q->result();
    }

    function get_location_by_id($id) {
        $q = $this->db->query("SELECT * FROM `tbl_cities` WHERE `id` = '" . $id . "' limit 1");
        return $q->row();
    }
}
?>
