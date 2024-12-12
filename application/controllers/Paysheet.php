<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paysheet extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Paysheet_model');
        $this->load->helper('url');
    }

    // Display the paysheet
    public function index()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('user/login');
        }
        $data['paysheet'] = $this->Paysheet_model->getPaysheet();
        $this->load->view('templates/header');
        $this->load->view('paysheet/index', $data);
        $this->load->view('templates/footer');
    }


    // Generate paysheet for the current month
    public function generate()
    {
        if ($this->Paysheet_model->generatePaysheet()) {
            $this->session->set_flashdata('success', 'Paysheet generated successfully.');
        } else {
            $this->session->set_flashdata('error', 'Error generating paysheet.');
        }
        redirect('paysheet');
    }

    // View an employee's pay slip
    public function payslip($employee_id)
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('user/login');
        }
        $data['payslip'] = $this->Paysheet_model->getPayslip($employee_id);
        if (empty($data['payslip'])) {
            show_404();
        }
        $this->load->view('templates/header');
        $this->load->view('paysheet/payslip', $data);
        $this->load->view('templates/footer');
    }


}
