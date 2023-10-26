<?php

class Basic extends CI_Model {

    private $db;

    public function __construct() {
        parent::__construct();
        $database_name = switch_db_dinamico();
        $this->db = $this->load->database($database_name, TRUE);
    }

    function insert_entry($tbl, $arr, $flag = 1) {
        $r = array('stat' => 0, 'last_id' => 0);
        $r['stat'] = $this->db->insert($tbl, $arr);
        if ($flag == 1 && $r['stat'] == 1) {
            $r['last_id'] = $this->db->insert_id();
        }
        return $r;
    }

    function delete_entry($t, $w) {
        return $this->db->delete($t, $w);
    }

    function update_entry($t, $i, $w) {
        return $this->db->update($t, $i, $w);
    }

    function select_custom($q, $is_res = 0) {
        $query = $this->db->query($q);
        if ($is_res == 1) {
            return $query;
        } else {
            return $query->result_array();
        }
    }

    function query_custom($q) {
        $this->db->query($q);
    }

    function db_select($select, $from, $where = array(), $group = array(), $order = '', $having = '', $limit = array(), $result_way = 'all', $echo = 0) {
        $result = array();
        $this->db->select($select);
        $this->db->from($from);
        if (!empty($where)) {
            $this->db->where($where);
        }
        if (!empty($group)) {
            $this->db->group_by($group);
        }
        if ($order != '') {
            $this->db->order_by($order);
        }
        if (!empty($limit)) {
            $this->db->limit($limit[0], $limit[1]); //first is limit and secound is offset
        }
        $temp = $this->db->get();
        switch ($result_way) {
            case 'row':
                $result = $temp->row();
                break;
            case 'row_array':
                $result = $temp->row_array();
                break;
            case 'count':
                $result = $temp->num_rows();
                break;
            default:
                $result = $temp->result_array();
                break;
        }
        if ($echo == 1) {
            echo $this->db->last_query();
            exit;
        }
        return $result;
    }
}
?>