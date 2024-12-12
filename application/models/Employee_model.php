<?php
class Employee_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function get_employees($id = NULL) {
        if ($id === NULL) {
            $query = $this->db->get('employees');
            return $query->result_array();
        } else {
            $query = $this->db->get_where('employees', ['id' => $id]);
            return $query->row_array();
        }
    }

    public function get_employee($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('employees');
        return $query->row();
    }


    public function get_by_employee($employee_id) {
        $this->db->select('ead.*, adm.name as master_name')
                 ->from('employee_allowance_deduction ead')
                 ->join('allowance_deduction_master adm', 'ead.master_id = adm.id')
                 ->where('ead.employee_id', $employee_id);
        return $this->db->get()->result_array();
    }
    

    public function add_employee($data) {
        return $this->db->insert('employees', $data);
    }

    public function update_employee($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('employees', $data);
    }

    public function delete_employee($id) {
        $this->db->where('id', $id);
        return $this->db->delete('employees');
    }

    public function get_by_id($employee_id) {
        return $this->db->get_where('employees', ['id' => $employee_id])->row_array();
    }
    
}
