<?php
class AllowanceDeductionMaster_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_by_id($id)
    {
        $query = $this->db->get_where('allowance_deduction_master', ['id' => $id]);
        return $query->row_array(); // Returns a single record as an associative array
    }


    public function get_all($status = null)
    {
        $this->db->from('allowance_deduction_master');
        if ($status === 'active') {
            $this->db->where('status', 'active');
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    // Insert new allowance or deduction
    public function insert($data)
    {
        return $this->db->insert('allowance_deduction_master', $data);
    }

    // Update an existing allowance or deduction
    public function update($id, $data)
    {
        return $this->db->update('allowance_deduction_master', $data, array('id' => $id));
    }

    // Delete an allowance or deduction (soft delete)
    public function delete($id)
    {
        return $this->db->delete('allowance_deduction_master', array('id' => $id));
    }

}
?>