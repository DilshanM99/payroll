<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AllowanceDeductionMaster extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AllowanceDeductionMaster_model');
        $this->load->helper('url');
    }

    // List all allowance and deduction types
    public function index()
    {
        $data['allowance_deductions'] = $this->AllowanceDeductionMaster_model->get_all();
        $this->load->view('templates/header');
        $this->load->view('allowance_deduction_master/index', $data);
        $this->load->view('templates/footer');
    }

    // Create a new allowance or deduction
    public function create()
    {
        $this->load->view('templates/header');
        $this->load->view('allowance_deduction_master/create');
        $this->load->view('templates/footer');
    }

    // Store the new allowance or deduction
    public function store()
    {
        $data = array(
            'type' => $this->input->post('type'),
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
        );
        $this->AllowanceDeductionMaster_model->insert($data);
        redirect('allowance_deduction_master');
    }

    // Edit an existing allowance or deduction
    public function edit($id)
    {
        $data['allowance_deduction'] = $this->AllowanceDeductionMaster_model->get_by_id($id);
        $this->load->view('templates/header');
        $this->load->view('allowance_deduction_master/edit', $data);
        $this->load->view('templates/footer');
    }

    // Update the allowance or deduction
    public function update($id)
    {
        $data = array(
            'type' => $this->input->post('type'),
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'status' => $this->input->post('status'),
        );
        $this->AllowanceDeductionMaster_model->update($id, $data);
        redirect('allowance_deduction_master');
    }

    // Soft delete the allowance or deduction
    // public function delete($id)
    // {
    //     $this->AllowanceDeductionMaster_model->delete($id);
    //     redirect('employee');
    // }

    // Delete an allowance or deduction
    public function delete($id)
    {
        $this->AllowanceDeductionMaster_model->delete($id);
        redirect('allowance_deduction_master');
    }




}
?>