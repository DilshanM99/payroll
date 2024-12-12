<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paysheet_model extends CI_Model
{

    public function getPaysheet()
    {
        $this->db->select('es.*, e.name as employee_name, u.username as added_by_name');
        $this->db->from('employee_salary es');
        $this->db->join('employees e', 'es.employee_id = e.id');
        $this->db->join('users u', 'es.added_by = u.id');
        $this->db->order_by('es.month', 'DESC');
        return $this->db->get()->result_array();
    }

    // public function getPaysheet($employee_id) {
    //     $this->db->select('e.id, e.name, e.basic_salary');
    //     $this->db->from('employees e');
    //     $this->db->where('e.id', $employee_id);
    //     $query = $this->db->get();
    //     $employee_data = $query->row();
    
    //     // Get allowances applied to the employee
    //     $allowances = $this->EmployeeAllowanceDeduction_model->getAllowancesByEmployee($employee_id);
    
    //     // Calculate total allowance
    //     $total_allowance = 0;
    //     foreach ($allowances as $allowance) {
    //         $total_allowance += $allowance->amount;
    //     }
    
    //     // Create paysheet data
    //     $paysheet_data = array(
    //         'employee_id' => $employee_data->id,
    //         'employee_name' => $employee_data->name,
    //         'basic_salary' => $employee_data->basic_salary,
    //         'total_allowance' => $total_allowance,
    //         'net_salary' => $employee_data->basic_salary + $total_allowance,
    //     );
    
    //     return $paysheet_data;
    // }

    // Paysheet_model.php
    // public function get_all_salaries()
    // {
    //     $this->db->select('es.*, e.name as employee_name, u.username as added_by_name');
    //     $this->db->from('employee_salary es');
    //     $this->db->join('employees e', 'es.employee_id = e.id');
    //     $this->db->join('users u', 'es.added_by = u.id');
    //     $this->db->order_by('es.month', 'DESC');
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }

    public function generatePaysheet()
    {
        $month = date('Y-m');
        $employees = $this->db->get('employees')->result_array();

        foreach ($employees as $employee) {
            $basic_salary = $employee['basic_salary'];
            $allowance = $employee['allowance'];
            $epf = $basic_salary * 0.08;
            $gross_salary = $basic_salary + $allowance;
            $net_salary = $gross_salary - $epf;

            $data = [
                'employee_id' => $employee['id'],
                'basic_salary' => $basic_salary,
                'allowance' => $allowance,
                'epf' => $epf,
                'gross_salary' => $gross_salary,
                'net_salary' => $net_salary,
                'added_by' => 1, // Assume logged-in user ID is 1
                'month' => $month . '-01'
            ];

            $this->db->insert('employee_salary', $data);
        }
        return true;
    }

//     public function generatePaysheet()
// {
//     $month = date('Y-m');
//     $employees = $this->db->get('employees')->result_array();

//     foreach ($employees as $employee) {
//         // Set default values if basic_salary or allowance is NULL
//         $basic_salary = isset($employee['basic_salary']) ? $employee['basic_salary'] : 0;
//         $allowance = isset($employee['allowance']) ? $employee['allowance'] : 0;

//         // EPF is calculated as 8% of basic_salary
//         $epf = $basic_salary * 0.08;

//         // Gross salary = basic salary + allowance
//         $gross_salary = $basic_salary + $allowance;

//         // Net salary = gross salary - EPF
//         $net_salary = $gross_salary - $epf;

//         // Prepare data for insertion
//         $data = [
//             'employee_id' => $employee['id'],
//             'basic_salary' => $basic_salary,
//             'allowance' => $allowance,
//             'epf' => $epf,
//             'gross_salary' => $gross_salary,
//             'net_salary' => $net_salary,
//             'added_by' => 8, // Assume logged-in user ID is 1
//             'month' => $month . '-01'
//         ];

//         // Insert paysheet record into employee_salary table
//         $this->db->insert('employee_salary', $data);
//     }

//     return true;
// }


    public function getPayslip($employee_id)
    {
        $this->db->select('es.*, e.name as employee_name');
        $this->db->from('employee_salary es');
        $this->db->join('employees e', 'es.employee_id = e.id');
        $this->db->where('es.employee_id', $employee_id);
        $this->db->order_by('es.month', 'DESC');
        return $this->db->get()->row_array();
    }
}
