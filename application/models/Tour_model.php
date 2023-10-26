<?php

class Tour_model extends CI_Model {
    /* ========== Category========== */

    function get_tour_list_by_lng_count($lid) {
        $q = $this->db->query("SELECT t1.*,(SELECT image FROM tour_gallery where tour_id = t1.id limit 1) as image,(SELECT placedesc FROM tbl_tour_overview where tour_id = t1.id limit 1) as placedesc  FROM tbl_tour as t1 LEFT JOIN tbl_vendors as t2 ON t1.vendor_id = t2.id WHERE t1.language_id = '" . $lid . "' AND t1.status = '1' AND t2.status = '1' ORDER BY `id` DESC");
        //echo "<br/>Total records----".count($q->result(); exit;
        return count($q->result());
    }

    /* function get_tour_list_by_lng($lid) {
            $q = $this->db->query("SELECT t1.*,(SELECT image FROM tour_gallery where tour_id = t1.id limit 1) as image,(SELECT placedesc FROM tbl_tour_overview where tour_id = t1.id limit 1) as placedesc  FROM tbl_tour as t1 LEFT JOIN tbl_vendors as t2 ON t1.vendor_id = t2.id WHERE t1.language_id = '".$lid."' AND t1.status = '1' AND t2.status = '1' ORDER BY `id` DESC");
            return $q->result();
    } */

    function get_tour_list_by_lng($per_page, $page, $lid) {
        /* if($page > 1) {
              $q = $this->db->query("SELECT t1.*,(SELECT image FROM tour_gallery where tour_id = t1.id limit 1) as image,(SELECT placedesc FROM tbl_tour_overview where tour_id = t1.id limit 1) as placedesc  FROM tbl_tour as t1 LEFT JOIN tbl_vendors as t2 ON t1.vendor_id = t2.id WHERE t1.language_id = '".$lid."' AND t1.status = '1' AND t2.status = '1' ORDER BY `id` DESC Limit $page, $per_page");
              $q2 = "SELECT t1.*,(SELECT image FROM tour_gallery where tour_id = t1.id limit 1) as image,(SELECT placedesc FROM tbl_tour_overview where tour_id = t1.id limit 1) as placedesc  FROM tbl_tour as t1 LEFT JOIN tbl_vendors as t2 ON t1.vendor_id = t2.id WHERE t1.language_id = '".$lid."' AND t1.status = '1' AND t2.status = '1' ORDER BY `id` DESC Limit $page, $per_page";

        }
        else {
            $q = $this->db->query("SELECT t1.*,(SELECT image FROM tour_gallery where tour_id = t1.id limit 1) as image,(SELECT placedesc FROM tbl_tour_overview where tour_id = t1.id limit 1) as placedesc  FROM tbl_tour as t1 LEFT JOIN tbl_vendors as t2 ON t1.vendor_id = t2.id WHERE t1.language_id = '".$lid."' AND t1.status = '1' AND t2.status = '1' ORDER BY `id` DESC Limit $per_page");
            $q2 = "SELECT t1.*,(SELECT image FROM tour_gallery where tour_id = t1.id limit 1) as image,(SELECT placedesc FROM tbl_tour_overview where tour_id = t1.id limit 1) as placedesc  FROM tbl_tour as t1 LEFT JOIN tbl_vendors as t2 ON t1.vendor_id = t2.id WHERE t1.language_id = '".$lid."' AND t1.status = '1' AND t2.status = '1' ORDER BY `id` DESC Limit $per_page";
        } */
        $q = $this->db->query("SELECT t1.*,(SELECT image FROM tour_gallery where tour_id = t1.id limit 1) as image,(SELECT placedesc FROM tbl_tour_overview where tour_id = t1.id limit 1) as placedesc  FROM tbl_tour as t1 LEFT JOIN tbl_vendors as t2 ON t1.vendor_id = t2.id WHERE t1.language_id = '" . $lid . "' AND t1.status = '1' AND t2.status = '1' ORDER BY `id` DESC Limit $page, $per_page");
        return $q->result();
    }

    function get_tour_list_by_slug_lng($lid, $slug) {
        $q = $this->db->query("SELECT t1.*,(SELECT image FROM tour_gallery where tour_id = t1.id limit 1) as image,(SELECT placedesc FROM tbl_tour_overview where tour_id = t1.id limit 1) as placedesc  FROM tbl_tour as t1 LEFT JOIN tbl_vendors as t2 ON t1.vendor_id = t2.id WHERE t1.language_id = '" . $lid . "' AND t1.status = '1' AND t1.slug != '" . $slug . "' AND t2.status = '1' ORDER BY `id` DESC");
        return $q->result();
    }

    function get_tour_list_by_vendor_id($id, $slug) {
        $q = $this->db->query("SELECT t1.*,(SELECT image FROM tour_gallery where tour_id = t1.id limit 1) as image,(SELECT placedesc FROM tbl_tour_overview where tour_id = t1.id limit 1) as placedesc  FROM `tbl_tour` as t1 LEFT JOIN tbl_vendors as t2 ON t1.vendor_id = t2.id WHERE t1.vendor_id = '" . $id . "' AND t1.status = '1' AND t1.slug != '" . $slug . "' AND t2.status = '1' ORDER BY t1.id DESC");
        return $q->result();
    }

    public function check_tour_slug($lid, $slug) {
        $query = "SELECT *,(SELECT image FROM tour_gallery where tour_id = tbl_tour.id limit 1) as image,(SELECT placedesc FROM tbl_tour_overview where tour_id = tbl_tour.id limit 1) as placedesc  FROM `tbl_tour` WHERE language_id = '" . $lid . "' AND status = '1' AND slug = '" . $slug . "' ORDER BY `id` DESC";
        $res = $this->db->query($query)->row();
        return $res;
    }

    public function tour_gallery_by_tour_id($id) {
        $query = "SELECT * FROM tour_gallery where tour_id = '" . $id . "' ORDER BY `id` DESC";
        $res = $this->db->query($query)->result();
        return $res;
    }

    public function get_vendor_by_id($id) {
        $query = "SELECT * FROM tbl_vendors where id = '" . $id . "' ORDER BY `id` DESC";
        $res = $this->db->query($query)->row();
        return $res;
    }

    public function tour_overview_by_tour_id($id) {
        $query = "SELECT * FROM tbl_tour_overview where tour_id = '" . $id . "' ORDER BY `id` DESC";
        $res = $this->db->query($query)->result();
        return $res;
    }

    function get_pending_tour_guide_list() {
        $q = $this->db->query("SELECT * FROM `tbl_vendors` WHERE type_category = '3' AND status = '0' AND is_deactivate_account = '1' ORDER BY `id` DESC");
        return $q->result();
    }

    function get_reject_tour_guide_list() {
        $q = $this->db->query("SELECT * FROM `tbl_vendors` WHERE type_category = '3' AND is_deactivate_account = '0' ORDER BY `id` DESC");
        return $q->result();
    }

    function get_guide_rate($id) {
        $query = "SELECT *,(SELECT language FROM tbl_language WHERE id = tbl_guide_price.language_id) as language,(SELECT name FROM tbl_countries WHERE id = tbl_guide_price.country_id) as country FROM `tbl_guide_price` WHERE vendor_id='" . $id . "'";
        return $this->db->query($query)->result();
    }

    function get_guide_rate_by_id($id) {
        $query = "SELECT * FROM `tbl_guide_price` WHERE id='" . $id . "'";
        return $this->db->query($query)->row();
    }
}
?>
