<?php

class Common_model extends CI_Model {

    private $db;

    public function __construct() {
        parent::__construct();
        $database_name = switch_db_dinamico();
        $this->db = $this->load->database($database_name, TRUE);
    }

    function data_insert($table, $insert_array) {
        $this->db->insert($table, $insert_array);
        return $this->db->insert_id();
    }

    function data_update($table, $set_array, $condition) {
        $this->db->update($table, $set_array, $condition);
        return $this->db->affected_rows();
    }

    function data_remove($table, $condition) {
        $this->db->delete($table, $condition);
    }

    function data_update_new($table, $set_array, $condition) {
        $res = $this->db->update($table, $set_array, $condition);
        return $res;
    }
}
?>
