<?php

class Front_model extends CI_Model {

    private $db;

    public function __construct() {
        parent::__construct();
        $database_name = switch_db_dinamico();
        $this->db = $this->load->database($database_name, TRUE);
    }

    public function features_properties_all() {
        $query = "select tbp.*,tpi.image from tbl_property as tbp left join tbl_property_images as tpi ON tbp.id=tpi.property_id where tbp.is_feature='1' order by tbp.created_at desc";
        $result = $this->db->query($query)->result();
        return $result;
    }

    public function get_id_by_slug($slug, $table) {
        $query = "SELECT id FROM $table WHERE slug='" . $slug . "'";
        $result = $this->db->query($query)->row();
        if (isset($result->id) && !empty($result->id)) {
            return $result->id;
        } else {
            return false;
        }
    }

    public function get_all_images_by_id($id) {
        $query = "SELECT * FROM `tbl_property_images` WHERE property_id='" . $id . "'";
        $result = $this->db->query($query)->result();
        return $result;
    }

    public function get_property_details_by_id($id) {
        $query = "SELECT * FROM `tbl_property` WHERE id='" . $id . "'";
        $result = $this->db->query($query)->row();
        return $result;
    }

    public function property_type($property_id) {
        $query = "SELECT name FROM `tbl_property_type` WHERE id='" . $property_id . "'";
        $result = $this->db->query($query)->row();
        return $result;
    }

    public function property_amenties($property_id) {
        $query = "SELECT name FROM `tbl_property_amenities` WHERE id='" . $property_id . "'";
        $result = $this->db->query($query)->row();
        return $result;
    }

    public function get_all_property_type($languageid) {
        $query = "SELECT * FROM `tbl_property_type` WHERE language_id='" . $languageid . "' AND status='1'";
        $result = $this->db->query($query)->result();
        return $result;
    }

    public function similar_property($typeid, $languageid) {
        $query = "SELECT tbl_property.*,tbl_property_images.image FROM `tbl_property` LEFT JOIN tbl_property_images ON tbl_property.id=tbl_property_images.property_id WHERE tbl_property.property_id='" . $typeid . "' AND tbl_property.language_id='" . $languageid . "' ORDER BY id DESC LIMIT 3";
        $result = $this->db->query($query)->result();
        return $result;
    }

    public function property_list_by_location($languageid) {
        $query = "SELECT tbl_cities.*,COUNT(tbl_property.id) AS total_property,(SELECT COUNT(tbl_property.search_type) FROM `tbl_property` WHERE tbl_property.search_type='S') AS saleproperty,(SELECT COUNT(tbl_property.search_type) FROM `tbl_property` WHERE tbl_property.search_type='R') AS rentproperty FROM `tbl_property` LEFT JOIN tbl_cities ON tbl_property.location_id=tbl_cities.id GROUP BY tbl_property.`location_id`";
        $result = $this->db->query($query)->result();
        return $result;
    }

    public function getcustomer_detail_by_id($id) {
        $query = "SELECT * FROM `tbl_customers` WHERE id='" . $id . "' AND status='1'";
        $result = $this->db->query($query)->result();
        return $result;
    }

    public function get_category()
    {
        $this->db->select("*");
        $this->db->from("tbl_category");
        $this->db->where('parent_id',0);
        $this->db->where('status','1');
        return $this->db->get()->result_array();
    }
    public function get_sub_category($parentid)
    {
        $this->db->select("*");
        $this->db->from("tbl_category");
        $this->db->where('parent_id',$parentid);
        $this->db->where('status','1');
        return $this->db->get()->result_array();
    }
    // public function get_sub_category()
    // {
    //     $this->db->select("*");
    //     $this->db->from("tbl_category");
    //     $this->db->where('parent_id > ',0);

    //     $this->db->where('status','1');
    //     return $this->db->get()->result_array();
    // }
}
?>
