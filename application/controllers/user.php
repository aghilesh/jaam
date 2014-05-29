<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    public function User() {
        parent::__construct();
        
        $this->load->library('form_validation');
        $this->load->library('pagination');

        $this->load->helper('form');
        $this->load->helper('url');

        $this->load->model('user_model', 'user');
        $this->load->model('role_model', 'role');
        $this->load->model('branch_model', 'branch');
        $this->load->model('department_model', 'department');
        
        $this->gen_contents['dynamic_views'] = array();
        $this->gen_contents['load_css'] = array();
        $this->gen_contents['load_js'] = array();

        $this->gen_contents['site_name'] = $this->config->item('site_name');
        $this->gen_contents['page_title'] = 'Users';
        $this->gen_contents['title'] = $this->gen_contents['site_name'] . ' : ' . $this->gen_contents['page_title'];
        $this->gen_contents['leftmenu_selected'] = 'user';

        $this->gen_contents['paths'] = array(
            'add' => 'user/add',
            'edit' => 'user/edit',
            'delete' => 'user/delete',
            'list' => 'user'
        );
        $this->entity = 'User';
        $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
    }

    public function index() {
        $this->gen_contents['users'] = $this->user->get();
        $this->gen_contents['dynamic_views'][]      = $this->config->item('pages') . 'user/list';
        $this->load->view($this->config->item('common_page') . 'template', $this->gen_contents);
    }
    
    /**
     * add a user
     */
    public function add() {
        if ($_POST) {
            $this->form_validation->set_rules('role_id', 'Role', 'required');
            $this->form_validation->set_rules('dept_id', 'Department', 'required');
            $this->form_validation->set_rules('branch_id', 'Branch', 'required');
            $this->form_validation->set_rules('user_name', 'User Name', 'required|xss_clean|max_length[100]');
            $this->form_validation->set_rules('password', 'Password', 'required|xss_clean|max_length[100]');
            $this->form_validation->set_rules('first_name', 'First Name', 'required|xss_clean|max_length[100]');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required|xss_clean|max_length[100]');
            $this->form_validation->set_rules('email', 'Email', 'required|xss_clean|max_length[100]');
            $this->form_validation->set_rules('phone', 'Phone', 'required|xss_clean|max_length[100]');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('message', validation_errors());
                $this->session->set_flashdata('msg_class', 'error_message');
                redirect($this->gen_contents['paths']['add']);
            } else {
                // build array for the model
                $formData = array(
                    'role_id' => set_value('role_id'),
                    'dept_id' => set_value('dept_id'),
                    'branch_id' => set_value('branch_id'),
                    'country_id' => set_value('country_id'),
                    'user_name' => set_value('user_name'),
                    'password' => set_value('password'),
                    'first_name' => set_value('first_name'),
                    'last_name' => set_value('last_name'),
                    'email_id' => set_value('email'),
                    'phone_no' => set_value('phone')
                );

                if ($this->user->insert($formData)) {
                    $this->session->set_flashdata('message', $this->entity.' was added successfully.');
                    $this->session->set_flashdata('msg_class', 'success_message');
                    redirect($this->gen_contents['paths']['list']);
                } else {
                    $this->session->set_flashdata('message', 'There was some problem in adding the '.$this->entity.'.');
                    $this->session->set_flashdata('msg_class', 'error_message');
                    redirect($this->gen_contents['paths']['add']);
                }
            }
        }
        
        $this->gen_contents['departments'] = prepareOptionList($this->department->get(),array('key'=>'id','value'=>'dept_name'));
        $this->gen_contents['branches'] = prepareOptionList($this->branch->get(),array('key'=>'id','value'=>'branch_name'));
        $this->gen_contents['roles'] = prepareOptionList($this->role->get(),array('key'=>'id','value'=>'role'));
        
        $this->gen_contents['page_title'] = $this->entity.' - Add';
        $this->gen_contents['dynamic_views'][] = $this->config->item('pages') . 'user/add';
        $this->load->view($this->config->item('common_page') . 'template', $this->gen_contents);
    }
    /**
     * edit a user
     */
    public function edit() {
        $id = strip_quotes(strip_tags(trim($this->uri->segment(3))));
        if ($_POST && $id) {
            $this->form_validation->set_rules('role_id', 'Role', 'required');
            $this->form_validation->set_rules('dept_id', 'Department', 'required');
            $this->form_validation->set_rules('branch_id', 'Branch', 'required');
            $this->form_validation->set_rules('user_name', 'User Name', 'required|xss_clean|max_length[100]');
            $this->form_validation->set_rules('first_name', 'First Name', 'required|xss_clean|max_length[100]');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required|xss_clean|max_length[100]');
            $this->form_validation->set_rules('email', 'Email', 'required|xss_clean|max_length[100]');
            $this->form_validation->set_rules('phone', 'Phone', 'required|xss_clean|max_length[100]');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('message', validation_errors());
                $this->session->set_flashdata('msg_class', 'error_message');
                redirect($this->gen_contents['paths']['edit']);
            } else {
                // build array for the model
                $formData = array(
                    'role_id' => set_value('role_id'),
                    'dept_id' => set_value('dept_id'),
                    'branch_id' => set_value('branch_id'),
                    'country_id' => set_value('country_id'),
                    'user_name' => set_value('user_name'),
                    'password' => set_value('password'),
                    'first_name' => set_value('first_name'),
                    'last_name' => set_value('last_name'),
                    'email_id' => set_value('email'),
                    'phone_no' => set_value('phone')
                );

                if ($this->user->update($formData, $id) == TRUE) {
                    $this->session->set_flashdata('message', $this->entity.' was updated successfully.');
                    $this->session->set_flashdata('msg_class', 'success_message');
                    redirect($this->gen_contents['paths']['edit'].'/'.$id);
                } else {
                    $this->session->set_flashdata('message', 'There was some problem in updating the '.$this->entity.'.');
                    $this->session->set_flashdata('msg_class', 'error_message');
                    redirect($this->gen_contents['paths']['edit'].'/'.$id);
                }
            }
        }
        if ($id) {
            $this->gen_contents['user'] = $this->user->get($id);
        }
        $this->gen_contents['departments'] = prepareOptionList($this->department->get(),array('key'=>'id','value'=>'dept_name'));
        $this->gen_contents['branches'] = prepareOptionList($this->branch->get(),array('key'=>'id','value'=>'branch_name'));
        $this->gen_contents['roles'] = prepareOptionList($this->role->get(),array('key'=>'id','value'=>'role'));
        
        $this->gen_contents['page_title'] = $this->entity.' - Edit';
        $this->gen_contents['dynamic_views'][] = $this->config->item('pages') . 'user/edit';
        $this->load->view($this->config->item('common_page') . 'template', $this->gen_contents);
    }

    /**
     * Delete user
     * @param type $id
     */
    public function delete($id) {
        $error = false;
        if ($id) {
            if ($this->user->delete($id)) {
                $this->session->set_flashdata('message', $this->entity.' was deleted successfully.');
                $this->session->set_flashdata('msg_class', 'success_message');
                redirect($this->gen_contents['paths']['list']);
            } else {
                $error = true;
            }
        } else {
            $error = true;
        }

        if ($error) {
            $this->session->set_flashdata('message', 'Unable to delete, Try later.');
            $this->session->set_flashdata('msg_class', 'error_message');
            redirect($this->gen_contents['paths']['list']);
        }
    }
}
