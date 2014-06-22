<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function Login() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->gen_contents['site_name'] = $this->config->item('site_name');
        $this->gen_contents['dynamic_views'] = array();
    }

    public function index() {
        $this->_loginAction();
        $this->load->view($this->config->item('pages') . 'login', $this->gen_contents);
    }

    function _loginAction() {
        ($this->authentication->check_logged_in()) ? redirect('home') : '';
        if (!empty($_POST)) {
            $this->form_validation->set_rules('username', 'User Name', 'required|trim|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'required|trim|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('message', validation_errors());
                $this->session->set_flashdata('msg_class', 'error_message');
                redirect('');
            } else {
                // build array for the model
                $formData = array(
                    'username' => set_value('username'),
                    'password' => set_value('password'),
                );
                $response = $this->authentication->login($formData);
                if ($response) {
                    redirect('home');
                }else {
                    $this->session->set_flashdata('message', 'Incorrect User Name or Password');
                    $this->session->set_flashdata('msg_class', 'error_message');
                    redirect('');
                }
                
            }
        }
    }

}
