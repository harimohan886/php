<?php

class World_wide_model extends CI_Model {

    function fetch_country() {
        $this->db->order_by("name", "ASC");
        $query = $this->db->get("tbl_countries");
        return $query->result();
    }

    function fetch_state_list($country_id) {
        $this->db->where('country_id', $country_id);
        $this->db->order_by("name", "ASC");
        $query = $this->db->get("tbl_states");
        return $query->result();
    }

    function fetch_city_list($state_id) {
        $this->db->where('state_id', $state_id);
        $this->db->order_by("name", "ASC");
        $query = $this->db->get("tbl_cities");
        return $query->result();
    }

    function get_country_list_by_id($id) {
        $q = $this->db->query("SELECT name FROM `tbl_countries` WHERE `id` = '" . $id . "' limit 1");
        return $q->row();
    }

    function get_city_list_by_id($id) {
        $q = $this->db->query("SELECT name FROM `tbl_cities` WHERE `id` = '" . $id . "' limit 1");
        return $q->row();
    }

    function get_state_list_by_id($id) {
        $q = $this->db->query("SELECT name FROM `tbl_states` WHERE `id` = '" . $id . "' limit 1");
        return $q->row();
    }

    function fetch_state($country_id) {
        $this->db->where('country_id', $country_id);
        $this->db->order_by('name', 'ASC');
        $query = $this->db->get('tbl_states');
        return $query->result();
    }

    function fetch_city($state_id) {
        $this->db->where('state_id', $state_id);
        $this->db->order_by('name', 'ASC');
        $query = $this->db->get('tbl_cities');
        return $query->result();
    }
}
?>