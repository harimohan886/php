<?php

class Admin_model extends CI_Model {

    private $db;

    public function __construct() {
        parent::__construct();
        $database_name = switch_db_dinamico();
        $this->db = $this->load->database($database_name, TRUE);
    }

    /* get users detail */

    public function get_detail_by_id($id) {
        $q = $this->db->query("select * from tbl_admin where  admin_id = '" . $id . "' limit 1");
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

}

?>
