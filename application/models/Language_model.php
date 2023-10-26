<?php

class Language_model extends CI_Model {
    /* ========== Category========== */

    private $db;

    public function __construct() {
        parent::__construct();
        $database_name = switch_db_dinamico();
        $this->db = $this->load->database($database_name, TRUE);
    }

    function get_language_list() {
        $q = $this->db->query("SELECT * FROM `tbl_language` ORDER BY `id` ASC");
        return $q->result();
    }

    function get_language_by_id($id) {
        $q = $this->db->query("SELECT * FROM `tbl_language` WHERE `id` = '" . $id . "' limit 1");
        return $q->row();
    }
}
?>
