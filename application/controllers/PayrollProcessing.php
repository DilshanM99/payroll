<?php
class PayrollProcessing extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('PayrollProcessing_model');
        $this->load->helper('url');
    }


    public function payrollProcessing() {
        if (!$this->session->userdata('logged_in')) {
            redirect('user/login');
        }
        $data['title'] = 'Payroll Processing';
        $data['payroll_processing'] = $this->PayrollProcessing_model->getAllPayrollProcessing();
        $this->load->view('templates/header');
        $this->load->view('payroll_processing/index', $data);
        $this->load->view('templates/footer');
    }



    public function create() {

        if (!$this->session->userdata('logged_in')) {
            redirect('user/login');
        }
        
        $this->load->view('templates/header');
        $this->load->view('payroll_processing/create');
        $this->load->view('templates/footer');
    }

    public function save() {
        $processed_by = $this->input->post('processed_by');
        $month = $this->input->post('month');
        if (empty($processed_by) || empty($month)) {
            $this->session->set_flashdata('error', 'Please fill in all fields');
            redirect('payroll_processing/index');
        } else {
            $data = array(
                'processed_by' => $processed_by,
                'processed_date' => date('Y-m-d'),
                'month' => $month,
                'status' => 'Pending'
            );
            $this->PayrollProcessing_model->createPayrollProcessing($data);
            redirect('payroll_processing/index');
        }
    }
    

    public function process($id) {
        $this->PayrollProcessing_model->updatePayrollProcessingStatus($id, 'Processed');
        redirect('payroll_processing');
    }

}