<?php
class MY_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }

    protected function loadView($view, $data = []) {
        $this->load->view('components/header', $data);
        $this->load->view($view, $data);
        $this->load->view('components/footer', $data);
    }
}
