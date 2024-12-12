<?php
// application/controllers/EmployeeAllowanceDeduction.php

class EmployeeAllowanceDeduction extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('EmployeeAllowanceDeduction_model');
        $this->load->model('AllowanceDeduction_model');
        $this->load->model('Employee_model');
        $this->Employee_model = new Employee_model();
        $this->load->helper('url');
    }

    public function index()
    {
        $data['employee_allowance_deductions'] = $this->EmployeeAllowanceDeduction_model->get_all();
        $this->load->view('templates/header');
        $this->load->view('allowance_deduction/index', $data);
        $this->load->view('templates/footer');
    }

    public function getad()
    {
        $data['allowance_deductions'] = $this->EmployeeAllowanceDeduction_model->get_allowance_deductions();
        $this->load->view('allowance_deduction/index', $data);
    }

    public function add_allowance($employee_id)
    {
        $allowances = $this->AllowanceDeduction_model->get_allowances();
        $data = array(
            'allowances' => $allowances,
            'employee_id' => $employee_id
        );
        $this->load->view('templates/header');
        $this->load->view('/allowance_deduction/add_allowance', $data);
        $this->load->view('templates/footer');
    }

    public function add_deduction($employee_id)
    {
        $deductions = $this->AllowanceDeduction_model->get_deductions();
        $data = array(
            'deductions' => $deductions,
            'employee_id' => $employee_id
        );
        $this->load->view('templates/header');
        $this->load->view('allowance_deduction/add_deduction', $data);
        $this->load->view('templates/footer');
    }

    public function save_allowance()
    {
        $employee_id = $this->input->post('employee_id');
        $master_id = $this->input->post('allowance_id');
        $amount = $this->input->post('amount');
        $this->AllowanceDeduction_model->add_allowance($employee_id, $master_id, $amount);
        redirect('employee');
    }

    public function save_deduction()
    {
        $employee_id = $this->input->post('employee_id');
        $master_id = $this->input->post('deduction_id');
        $amount = $this->input->post('amount');
        $this->AllowanceDeduction_model->add_deduction($employee_id, $master_id, $amount);
        redirect('employee');
    }

    public function edit($id)
    {
        $data['allowance_deduction'] = $this->EmployeeAllowanceDeduction_model->get_allowance_deduction($id);
        $employee = $this->Employee_model->get_employee($data['allowance_deduction']->employee_id);
        $data['employee_name'] = $employee ? $employee->name : 'Employee not found';
        $this->load->view('templates/header');
        $this->load->view('allowance_deduction/edit', $data);
        $this->load->view('templates/footer');
    }




     public function update($id) {
        $data = array(
            'amount' => $this->input->post('amount'),
        );
        $this->EmployeeAllowanceDeduction_model->update_allowance_deduction($id, $data);
        redirect('employee_allowance_deduction');
    }



    // Delete Employee Allowance/Deduction
    public function delete($id)
    {
        $this->EmployeeAllowanceDeduction_model->delete_allowance_deduction($id);
        redirect('employee_allowance_deduction');
    }
}
