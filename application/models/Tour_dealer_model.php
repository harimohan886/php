<?php
class Tour_dealer_model extends CI_Model
{
 /* ========== Category========== */

 public function get_approve_tour_dealer_list()
 {
  $q = $this->db->query("SELECT * FROM `tbl_vendors` WHERE type_category = '1' AND status = '1' AND is_deactivate_account = '1' ORDER BY `id` DESC");
  return $q->result();
 }

 public function get_pending_tour_dealer_list()
 {
  $q = $this->db->query("SELECT * FROM `tbl_vendors` WHERE type_category = '1' AND status = '0' AND is_deactivate_account = '1' ORDER BY `id` DESC");
  return $q->result();
 }

 public function get_reject_tour_dealer_list()
 {
  $q = $this->db->query("SELECT * FROM `tbl_vendors` WHERE type_category = '1' AND is_deactivate_account = '0' ORDER BY `id` DESC");
  return $q->result();
 }

 public function get_approve_tour_dealer_list_count($id)
 {
  $q = $this->db->query("SELECT count(id) as count FROM `tbl_vendors` WHERE type_category = '" . $id . "' AND status = '1' AND is_deactivate_account = '1' ORDER BY `id` DESC");
  return $q->row();
 }

 public function get_pending_tour_dealer_list_count($id)
 {
  $q = $this->db->query("SELECT count(id) as count FROM `tbl_vendors` WHERE type_category = '" . $id . "' AND status = '0' AND is_deactivate_account = '1' ORDER BY `id` DESC");
  return $q->row();
 }

 public function get_reject_tour_dealer_list_count($id)
 {
  $q = $this->db->query("SELECT count(id) as count FROM `tbl_vendors` WHERE type_category = '" . $id . "' AND is_deactivate_account = '0' ORDER BY `id` DESC");
  return $q->row();
 }

 public function get_includelist_by_dealer_id($id)
 {
  $query = "SELECT tbi.*,tl.language FROM `tbl_tour_include` AS tbi LEFT JOIN tbl_language AS tl ON tbi.language_id=tl.id WHERE tbi.dealer_id='" . $id . "'";
  return $this->db->query($query)->result();
 }

 public function get_includelistby_id($id)
 {
  $query = "SELECT * FROM `tbl_tour_include` WHERE id='" . $id . "'";
  return $this->db->query($query)->row();
 }

 public function get_tourlist_by_dealer_id($id)
 {
  $query = "SELECT *,(SELECT language FROM tbl_language WHERE tbl_language.id=tbl_tour.language_id) AS language FROM `tbl_tour` WHERE vendor_id='" . $id . "'";
  return $this->db->query($query)->result();
 }

 public function get_single_tour_by_tour_id($tourid)
 {
  $query = "SELECT * FROM `tbl_tour` WHERE id='" . $tourid . "'";
  return $this->db->query($query)->row();
 }

 public function tour_overview_by_tourid($tourid)
 {
  $query = "SELECT * FROM `tbl_tour_overview` WHERE tour_id='" . $tourid . "'";
  return $this->db->query($query)->result();
 }

 public function tour_gallery_by_tourid($tourid)
 {
  $query = "SELECT * FROM `tour_gallery` WHERE tour_id='" . $tourid . "'";
  return $this->db->query($query)->result();
 }

 public function get_tourlistbooked_by_dealer_id($id)
 {
  $query = "SELECT t1.*,(SELECT language FROM tbl_language WHERE tbl_language.id=t1.language_id) AS language, t2.booking_id, t2.customer_id, t2.total_price, t2.no_of_adults, t2.no_of_children, t2.adult_price, t2.child_price, t2.comments, t2.status as book_status, t3.name as booker_name, t3.email FROM `tbl_tour` as t1 INNER JOIN tbl_tour_booking as t2 ON t2.tour_id = t1.id INNER JOIN tbl_customers as t3 ON t2.customer_id = t3.id  WHERE t1.vendor_id='" . $id . "'";
  return $this->db->query($query)->result();
 }
}
