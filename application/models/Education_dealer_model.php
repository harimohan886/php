<?php

class Education_dealer_model extends CI_Model {
    /* ========== Category========== */

    function get_approve_education_dealer_list() {
        $q = $this->db->query("SELECT * FROM `tbl_vendors` WHERE type_category = '5' AND status = '1' AND is_deactivate_account = '1' ORDER BY `id` DESC");
        return $q->result();
    }

    function get_pending_education_dealer_list() {
        $q = $this->db->query("SELECT * FROM `tbl_vendors` WHERE type_category = '5' AND status = '0' AND is_deactivate_account = '1' ORDER BY `id` DESC");
        return $q->result();
    }

    function get_reject_education_dealer_list() {
        $q = $this->db->query("SELECT * FROM `tbl_vendors` WHERE type_category = '5' AND is_deactivate_account = '0' ORDER BY `id` DESC");
        return $q->result();
    }
}
?>
