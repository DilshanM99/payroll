<?php
class Employee extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('employee_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    public function index() {
        if (!$this->session->userdata('logged_in')) {
            redirect('user/login');
        }

        $data['employees'] = $this->employee_model->get_employees();
        $this->load->view('templates/header');
        $this->load->view('employee/index', $data);
        $this->load->view('templates/footer');
    }

    public function create() {
        if (!$this->session->userdata('logged_in')) {
            redirect('user/login');
        }

        $this->form_validation->set_rules('employee_id', 'Employee ID', 'required|is_unique[employees.employee_id]');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('nic', 'NIC', 'required|is_unique[employees.nic]');
        $this->form_validation->set_rules('basic_salary', 'Basic Salary', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('employee/create');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'employee_id' => $this->input->post('employee_id'),
                'name' => $this->input->post('name'),
                'nic' => $this->input->post('nic'),
                'basic_salary' => $this->input->post('basic_salary'),
                'status' => $this->input->post('status'),
                'added_by' => $this->session->userdata('user_id')
            ];
            $this->employee_model->add_employee($data);
            redirect('employee');
        }
    }

    public function edit($id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('user/login');
        }

        $data['employee'] = $this->employee_model->get_employees($id);

        if (empty($data['employee'])) {
            show_404();
        }

        $this->form_validation->set_rules('employee_id', 'Employee ID', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('nic', 'NIC', 'required');
        $this->form_validation->set_rules('basic_salary', 'Basic Salary', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('employee/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'employee_id' => $this->input->post('employee_id'),
                'name' => $this->input->post('name'),
                'nic' => $this->input->post('nic'),
                'basic_salary' => $this->input->post('basic_salary'),
                'status' => $this->input->post('status')
            ];
            $this->employee_model->update_employee($id, $data);
            redirect('employee');
        }
    }

    public function delete($id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('user/login');
        }

        $this->employee_model->delete_employee($id);
        redirect('employee');
    }

    
}
