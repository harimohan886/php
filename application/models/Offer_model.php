<?php

class Offer_model extends CI_Model {

    public function get_offer() {
        $query = "SELECT * ,(SELECT product_name FROM tbl_product WHERE id=tbl_offer.product_id) as pname,(SELECT cname FROM tbl_category WHERE id=tbl_offer.`category_id` AND tbl_offer.`category_id` !=0) as categoryname FROM `tbl_offer` ORDER BY id DESC";
        $res = $this->db->query($query)->result();
        return $res;
    }

    public function get_offer_by_id($id) {
        $q = $this->db->query("SELECT * FROM `tbl_offer` WHERE id = '" . $id . "' limit 1");
        return $q->row();
    }
}
?>