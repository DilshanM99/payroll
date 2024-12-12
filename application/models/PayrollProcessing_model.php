<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PayrollProcessing_model extends CI_Model
{

    public function createPayrollProcessing($data) {
       
        $this->db->insert('payroll_processing', $data);
        return $this->db->insert_id();
    }

    public function updatePayrollProcessingStatus($id, $status) {
        $data = array(
            'status' => $status
        );
        $this->db->where('id', $id);
        $this->db->update('payroll_processing', $data);
    }


    public function getAllPayrollProcessing() {
        $this->db->select('*');
        $this->db->from('payroll_processing');
        $query = $this->db->get();
        return $query->result();
    }

    public function getPayrollProcessingById($id) {
        $this->db->select('*');
        $this->db->from('payroll_processing');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }
}