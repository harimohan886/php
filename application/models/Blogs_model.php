<?php

class Blogs_model extends CI_Model {
    /* ========== Category========== */

    private $db;

    public function __construct() {
        parent::__construct();
        $database_name = switch_db_dinamico();
        $this->db = $this->load->database($database_name, TRUE);
    }

    function get_blogs_list() {
        $q = $this->db->query("SELECT * FROM `tbl_blogs` ORDER BY `blog_id` DESC");
        return $q->result();
    }

    function get_blogs_list_by_id($id) {
        $q = $this->db->query("SELECT * FROM `tbl_blogs` WHERE `blog_id` = '" . $id . "' limit 1");
        return $q->row();
    }

    function get_blogs_count() {
        $q = "SELECT * FROM `tbl_blogs` WHERE blog_status='1' ORDER BY created_at DESC";
        $result = $this->db->query($q)->num_rows();
        return $result;
    }

    function get_blogs($offset, $limit, $search = null) {
        if (!empty($search)) {
            $andquery = "AND blog_name LIKE '%" . $search . "%' ";
        } else {
            $andquery = "";
        }
        $q = "SELECT * FROM `tbl_blogs` WHERE blog_status='1' " . $andquery . " ORDER BY blog_post_date DESC LIMIT $offset,$limit";
        $blogs = $this->db->query($q)->result();
        return $blogs;
    }

    function check_slug($slug) {
        $q = "SELECT COUNT(blog_slug) as blogscount FROM `tbl_blogs` WHERE blog_slug='" . $slug . "'";
        $result = $this->db->query($q)->row();
        return $result;
    }

    function get_blog_by_slug($slug) {
        $q = "SELECT *  FROM `tbl_blogs` WHERE blog_slug='" . $slug . "'";
        $result = $this->db->query($q)->row();
        return $result;
    }

    function blogs_sidebar() {
        $q = "SELECT `blog_image`, `blog_name`, `blog_post_date`, `blog_slug` FROM `tbl_blogs` ORDER BY created_at DESC LIMIT 3";
        $result = $this->db->query($q)->result();
        return $result;
    }

    function next_post($id) {
        $q = "select `blog_slug` AS next_slug from tbl_blogs where `blog_id` = (select min(blog_id) from tbl_blogs where blog_id > '" . $id . "')";
        $result = $this->db->query($q)->row();
        return $result;
    }

    function prev_post($id) {
        $q = "select `blog_slug` AS prev_slug from tbl_blogs where `blog_id` = (select min(blog_id) from tbl_blogs where blog_id < '" . $id . "')";
        $result = $this->db->query($q)->row();
        return $result;
    }

    function blog_search($text) {
        $q = "SELECT * FROM `tbl_blogs` WHERE blog_name LIKE '%" . $text . "%' and blog_status='1'";
        $result = $this->db->query($q)->num_rows();
        return $result;
    }
}
?>
