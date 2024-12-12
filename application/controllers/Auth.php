<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function login() {
        $this->load->view('login');
    }

    public function process_login() {
        $this->load->model('User_model');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->User_model->get_user($username);
        
        if ($user && password_verify($password, $user['password_hash'])) {
            if ($user['status'] == 'deactivated') {
                $this->session->set_flashdata('error', 'Your account is deactivated.');
                redirect('auth/login');
            }

            // Start a session
            $this->session->set_userdata([
                'user_id' => $user['id'],
                'username' => $user['username']
            ]);
            redirect('dashboard');
        } else {
            $this->session->set_flashdata('error', 'Invalid username or password.');
            redirect('auth/login');
        }
    }

    public function logout() {
        $this->session->unset_userdata(['user_id', 'username']);
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
?>
