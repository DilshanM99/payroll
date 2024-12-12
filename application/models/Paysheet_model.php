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



    // public function generatePaysheet()
    // {
    //     $month = date('Y-m');
    //     $employees = $this->db->get('employees')->result_array();

    //     foreach ($employees as $employee) {
    //         $basic_salary = $employee['basic_salary'];
    //         $allowance = $employee['allowance'];
    //         $epf = $basic_salary * 0.08;
    //         $gross_salary = $basic_salary + $allowance;
    //         $net_salary = $gross_salary - $epf;

    //         $data = [
    //             'employee_id' => $employee['id'],
    //             'basic_salary' => $basic_salary,
    //             'allowance' => $allowance,
    //             'epf' => $epf,
    //             'gross_salary' => $gross_salary,
    //             'net_salary' => $net_salary,
    //             'added_by' => 1, // Assume logged-in user ID is 1
    //             'month' => $month . '-01'
    //         ];

    //         $this->db->insert('employee_salary', $data);
    //     }
    //     return true;
    // }

    // public function generatePaysheet()
    // {
    //     $month = date('Y-m');

    //     // Fetch all employees
    //     $employees = $this->db->get('employees')->result_array();

    //     foreach ($employees as $employee) {
    //         $employee_id = $employee['id'];
    //         $basic_salary = $employee['basic_salary'];

    //         // Calculate total allowance from employee_allowance_deduction table
    //         $allowance = $this->db
    //             ->select_sum('amount', 'total_allowance')
    //             ->where('employee_id', $employee_id)
    //             ->where('type', 'allowance')
    //             ->get('employee_allowance_deduction')
    //             ->row()
    //             ->total_allowance;

    //         $allowance = $allowance ?? 0; // Default to 0 if no allowances found

    //         // Calculate salaries
    //         $epf = $basic_salary * 0.08;
    //         $gross_salary = $basic_salary + $allowance;
    //         $net_salary = $gross_salary - $epf;

    //         // Prepare data for insertion
    //         $data = [
    //             'employee_id' => $employee_id,
    //             'basic_salary' => $basic_salary,
    //             'allowance' => $allowance,
    //             'epf' => $epf,
    //             'gross_salary' => $gross_salary,
    //             'net_salary' => $net_salary,
    //             'added_by' => 8, // Assume logged-in user ID is 1
    //             'month' => $month . '-01'
    //         ];

    //         // Insert into employee_salary table
    //         $this->db->insert('employee_salary', $data);
    //     }

    //     return true;
    // }

    public function generatePaysheet()
    {
        $month = date('Y-m');

        // Fetch all employees
        $employees = $this->db->get('employees')->result_array();

        foreach ($employees as $employee) {
            $employee_id = $employee['id'];
            $basic_salary = $employee['basic_salary'];

            $allowance = $this->db
                ->select_sum('amount', 'total_allowance')
                ->where('employee_id', $employee_id)
                ->where('type', 'allowance')
                ->get('employee_allowance_deduction')
                ->row()
                ->total_allowance;

            $deduction = $this->db
                ->select_sum('amount', 'total_deduction')
                ->where('employee_id', $employee_id)
                ->where('type', 'deduction')
                ->get('employee_allowance_deduction')
                ->row()
                ->total_deduction;

            $net_allowance = $allowance - $deduction;

            $net_allowance = $net_allowance ?? 0;

            // Calculate salaries
            $epf = $basic_salary * 0.08;
            $gross_salary = $basic_salary + $net_allowance;
            $net_salary = $gross_salary - $epf;

            // Prepare data
            $data = [
                'basic_salary' => $basic_salary,
                'allowance' => $net_allowance,
                'epf' => $epf,
                'gross_salary' => $gross_salary,
                'net_salary' => $net_salary,
                'added_by' => 8, // Assume logged-in user ID is 1
                'month' => $month . '-01'
            ];

            // Check if the record exists
            $existing_record = $this->db
                ->where('employee_id', $employee_id)
                ->where('month', $month . '-01')
                ->get('employee_salary')
                ->row();

            if ($existing_record) {
                // Update the existing record
                $this->db->where('id', $existing_record->id)->update('employee_salary', $data);
            } else {
                // Add employee_id to the data array
                $data['employee_id'] = $employee_id;

                // Insert a new record
                $this->db->insert('employee_salary', $data);
            }
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
