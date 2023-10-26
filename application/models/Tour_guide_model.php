<?php
class Tour_guide_model extends CI_Model
{
 /* ========== Category========== */

 public function get_approve_tour_guide_list()
 {
  $q = $this->db->query("SELECT * FROM `tbl_vendors` WHERE type_category = '3' AND status = '1' AND is_deactivate_account = '1' ORDER BY `id` DESC");
  return $q->result();
 }

 public function get_pending_tour_guide_list()
 {
  $q = $this->db->query("SELECT * FROM `tbl_vendors` WHERE type_category = '3' AND status = '0' AND is_deactivate_account = '1' ORDER BY `id` DESC");
  return $q->result();
 }

 public function get_reject_tour_guide_list()
 {
  $q = $this->db->query("SELECT * FROM `tbl_vendors` WHERE type_category = '3' AND is_deactivate_account = '0' ORDER BY `id` DESC");
  return $q->result();
 }

 public function get_guide_rate($id)
 {
  $query = "SELECT *,(SELECT language FROM tbl_language WHERE id = tbl_guide_price.language_id) as language,(SELECT name FROM tbl_countries WHERE id = tbl_guide_price.country_id) as country FROM `tbl_guide_price` WHERE vendor_id='" . $id . "'";
  return $this->db->query($query)->result();
 }

 public function get_guide_rate_by_id($id)
 {
  $query = "SELECT * FROM `tbl_guide_price` WHERE id='" . $id . "'";
  return $this->db->query($query)->row();
 }

 public function get_approve_tour_guide_listing()
 {
  $q = $this->db->query("SELECT * FROM `tbl_vendors` WHERE `type_category` = '3'  AND `status` = '1' ORDER BY `id` DESC");
  return $q->result();
 }

 public function get_tour_guide_list_by_lng($per_page, $page, $lid)
 {
  $q = $this->db->query("SELECT * FROM `tbl_vendors` WHERE `type_category` = '3'  AND `status` = '1' ORDER BY `id` DESC LIMIT $page, $per_page");
  return $q->result();
 }

 public function tour_guide_details_by_id($id)
 {
  $q = $this->db->query("SELECT * FROM `tbl_vendors` WHERE id = '$id' AND type_category = '3' AND status = '1' AND is_deactivate_account = '1'");
  return $q->result();
 }

 public function get_guide_rate_by_vendor_id($vendor_id)
 {
  $q = $this->db->query("SELECT * FROM `tbl_guide_price` WHERE vendor_id='" . $vendor_id . "'");
  return $q->result();
 }

 public function get_review_by_vendor_id($vendor_id)
 {
  $q = $this->db->query("SELECT tr.*, tc.name as customer_name, tc.profile_pic  FROM tbl_review as tr   INNER JOIN tbl_customers as tc ON tr.customer_id = tc.id WHERE tr.vendor_id='" . $vendor_id . "' AND tr.status = '1'");
  return $q->result();
 }

 public function get_all_review_by_vendor_id($vendor_id)
 {
  $q = $this->db->query("SELECT tr.*, tc.name as customer_name, tc.profile_pic  FROM tbl_review as tr   INNER JOIN tbl_customers as tc ON tr.customer_id = tc.id WHERE tr.vendor_id='" . $vendor_id . "'");
  return $q->result();
 }
}
