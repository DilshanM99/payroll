<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EmployeeAllowanceDeduction_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

    }

    public function get_all()
    {
        $this->db->select('ead.*, adm.name as master_name, e.name as employee_name');
        $this->db->from('employee_allowance_deduction ead');
        $this->db->join('allowance_deduction_master adm', 'ead.master_id = adm.id');
        $this->db->join('employees e', 'ead.employee_id = e.id');
        return $this->db->get()->result_array();
    }

    // public function get_allowances()
    // {
    //     $this->db->where('type', 'allowance');
    //     return $this->db->get('allowance_deduction_master')->result();
    // }

    public function get_allowances()
    {
        $this->db->select('id, name');
        $this->db->from('allowance_deduction');
        $query = $this->db->get();
        return $query->result();
    }



    public function get_deductions()
    {
        $this->db->where('type', 'deduction');
        return $this->db->get('allowance_deduction_master')->result();
    }

    public function add_allowance($employee_id, $master_id, $amount)
    {
        $data = array(
            'employee_id' => $employee_id,
            'master_id' => $master_id,
            'amount' => $amount,
            'type' => 'allowance'
        );
        return $this->db->insert('employee_allowance_deduction', $data);
    }

    public function add_deduction($employee_id, $master_id, $amount)
    {
        $data = array(
            'employee_id' => $employee_id,
            'master_id' => $master_id,
            'amount' => $amount,
            'type' => 'deduction'
        );
        return $this->db->insert('employee_allowance_deduction', $data);
    }


    public function get_allowance_deduction($id) {
        $this->db->select('ead.id, ead.employee_id, ead.amount, adm.name as allowance_deduction_name');
        $this->db->from('employee_allowance_deduction ead');
        $this->db->join('allowance_deduction_master adm', 'ead.master_id = adm.id', 'LEFT');
        $this->db->where('ead.id', $id);
        $query = $this->db->get();
        return $query->row();
    }
 
    // public function getAllowancesByEmployee($employee_id) {
    //     $this->db->select('ead.id, ead.employee_id, ead.amount, ad.name as allowance_name');
    //     $this->db->from('employee_allowance_deduction ead');
    //     $this->db->join('allowance_deduction ad', 'ead.allowance_deduction_id = ad.id');
    //     $this->db->where('ead.employee_id', $employee_id);
    //     $query = $this->db->get();
    //     return $query->result();
    // }

    // Update Employee Allowance/Deduction
    public function update_allowance_deduction($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('employee_allowance_deduction', $data);
    }

    // Delete Employee Allowance/Deduction
    public function delete_allowance_deduction($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('employee_allowance_deduction');
    }

    public function get_allowance_deduction_id($name)
    {
        $this->db->where('name', $name);
        $query = $this->db->get('employee_allowance_deduction');
        $row = $query->row();
        return $row->id;
    }


}