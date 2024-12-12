<?php
// application/models/AllowanceDeduction_model.php

class AllowanceDeduction_model extends CI_Model {

    public function get_allowances() {
        $this->db->select('id, name');
        $this->db->from('allowance_deduction_master');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_deductions() {
        $this->db->select('id, name');
        $this->db->from('allowance_deduction_master');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function add_allowance($employee_id, $master_id, $amount) {
        $data = array(
            'employee_id' => $employee_id,
            'master_id' => $master_id,
            'amount' => $amount
        );
        $this->db->insert('employee_allowance_deduction', $data);
    }

    public function add_deduction($employee_id, $master_id, $amount, $type) {
        $data = array(
            'employee_id' => $employee_id,
            'master_id' => $master_id,
            'amount' => $amount,
            'type' => 'deduction'
        );
        $this->db->insert('employee_allowance_deduction', $data);
    }

    public function get_allowance_deduction_id($name) {
        $this->db->where('name', $name);
        $query = $this->db->get('employee_allowance_deduction');
        $row = $query->row();
        return $row->id;
    }
}