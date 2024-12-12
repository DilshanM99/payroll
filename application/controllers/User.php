<?php
class User extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    public function login() {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
    
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('user/login');
            $this->load->view('templates/footer');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
    
            // Check user credentials
            $user = $this->user_model->get_user_by_username($username);
    
            if ($user && password_verify($password, $user['password_hash'])) {
                // Set session data
                $this->session->set_userdata([
                    'user_id' => $user['id'],
                    'username' => $user['username'],
                    'logged_in' => TRUE
                ]);
                redirect('user');
            } else {
                $this->session->set_flashdata('error', 'Invalid username or password');
                redirect('user/login');
            }
        }
    }
    
    public function logout() {
        $this->session->unset_userdata(['user_id', 'username', 'logged_in']);
        $this->session->set_flashdata('message', 'You have logged out successfully');
        redirect('user/login');
    }
    

    public function index() {

        if (!$this->session->userdata('logged_in')) {
            redirect('user/login');
        }
        
        $data['users'] = $this->user_model->get_users();
        $this->load->view('templates/header');
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function create() {
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('role_id', 'Role ID', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('user/create');
            $this->load->view('templates/footer');
        } else {
            $password_hash = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
            $data = [
                'username' => $this->input->post('username'),
                'password_hash' => $password_hash,
                'role_id' => $this->input->post('role_id'),
                'status' => $this->input->post('status')
            ];
            $this->user_model->add_user($data);
            redirect('user');
        }
    }

    public function edit($id) {
        $data['user'] = $this->user_model->get_users($id);

        if (empty($data['user'])) {
            show_404();
        }

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('role_id', 'Role ID', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'username' => $this->input->post('username'),
                'role_id' => $this->input->post('role_id'),
                'status' => $this->input->post('status')
            ];
            $this->user_model->update_user($id, $data);
            redirect('user');
        }
    }

    public function delete($id) {
        $this->user_model->delete_user($id);
        redirect('user');
    }
}
