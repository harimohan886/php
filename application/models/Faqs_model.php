<?php

class Faqs_model extends CI_Model {
    /* ========== Category========== */

    private $db;

    public function __construct() {
        parent::__construct();
        $database_name = switch_db_dinamico();
        $this->db = $this->load->database($database_name, TRUE);
    }

    function get_faqs_list() {
        $q = $this->db->query("SELECT *,(SELECT language FROM tbl_language WHERE id=tbl_faqs.language_id) as language_name FROM `tbl_faqs` ORDER BY `id` ASC");
        return $q->result();
    }

    function get_faqs_by_id($id) {
        $q = $this->db->query("SELECT * FROM `tbl_faqs` WHERE `id` = '" . $id . "' limit 1");
        return $q->row();
    }
}
?>
