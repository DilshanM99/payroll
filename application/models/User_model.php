<?php
class User_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }


    public function get_user_by_username($username) {
        $query = $this->db->get_where('users', ['username' => $username]);
        return $query->row_array();
    }
    

    public function get_users($id = NULL) {
        if ($id === NULL) {
            $query = $this->db->get('users');
            return $query->result_array();
        } else {
            $query = $this->db->get_where('users', ['id' => $id]);
            return $query->row_array();
        }
    }

    public function add_user($data) {
        return $this->db->insert('users', $data);
    }

    public function update_user($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    public function delete_user($id) {
        $this->db->where('id', $id);
        return $this->db->delete('users');
    }
}
