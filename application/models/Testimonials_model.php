<?php

class Testimonials_model extends CI_Model {
    /* ========== Category========== */

    private $db;

    public function __construct() {
        parent::__construct();
        $database_name = switch_db_dinamico();
        $this->db = $this->load->database($database_name, TRUE);
    }

    function get_testimonials_list() {
        $q = $this->db->query("SELECT *,(SELECT language FROM tbl_language WHERE id=tbl_testimonials.language_id) as language_name FROM `tbl_testimonials` ORDER BY `id` DESC");
        return $q->result();
    }

    function get_testimonials_list_by_status() {
        $q = $this->db->query("SELECT *,(SELECT language FROM tbl_language WHERE id=tbl_testimonials.language_id) as language_name FROM `tbl_testimonials` WHERE status = '1' ORDER BY `id` DESC");
        return $q->result();
    }

    function get_testimonials_active_list() {
        $q = $this->db->query("SELECT * FROM `tbl_testimonials` WHERE `status` = '1' ORDER BY `id` ASC");
        return $q->result();
    }

    function get_testimonials_list_by_id($id) {
        $q = $this->db->query("SELECT * FROM `tbl_testimonials` WHERE `id` = '" . $id . "' limit 1");
        return $q->row();
    }
}
?>
