<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Department extends CI_Controller {

    public function Department() {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->library('pagination');

        $this->load->helper('form');
        $this->load->helper('url');

        $this->load->model('department_model', 'department');

        $this->gen_contents['dynamic_views'] = array();
        $this->gen_contents['load_css'] = array();
        $this->gen_contents['load_js'] = array();

        $this->gen_contents['site_name'] = $this->config->item('site_name');
        $this->gen_contents['page_title'] = 'Department';
        $this->gen_contents['title'] = $this->gen_contents['site_name'] . ' : ' . $this->gen_contents['page_title'];
        $this->gen_contents['leftmenu_selected'] = 'department';

        $this->gen_contents['paths'] = array(
            'add' => 'department/add',
            'edit' => 'department/edit',
            'delete' => 'department/delete',
            'list' => 'department'
        );
        $this->entity = 'Department';
        $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
    }

    public function index() {

        $this->gen_contents['departments'] = $this->department->get();

        $this->gen_contents['dynamic_views'][] = $this->config->item('pages') . 'department/list';
        $this->load->view($this->config->item('common_page') . 'template', $this->gen_contents);
    }

    /**
     * add a department
     */
    public function add() {
        if ($_POST) {
            $this->form_validation->set_rules('department_name', 'Department Name', 'required|trim|xss_clean|max_length[50]');
            $this->form_validation->set_rules('description', 'Description', 'xss_clean|max_length[100]');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('message', validation_errors());
                $this->session->set_flashdata('msg_class', 'error_message');
                redirect($this->gen_contents['paths']['add']);
            } else {
                // build array for the model
                $formData = array(
                    'dept_name' => set_value('department_name'),
                    'description' => set_value('description'),
                );

                if ($this->department->insert($formData)) {
                    $this->session->set_flashdata('message', $this->entity . ' was added successfully.');
                    $this->session->set_flashdata('msg_class', 'success_message');
                    redirect($this->gen_contents['paths']['list']);
                } else {
                    $this->session->set_flashdata('message', 'There was some problem in adding the ' . $this->entity . '.');
                    $this->session->set_flashdata('msg_class', 'error_message');
                    redirect($this->gen_contents['paths']['add']);
                }
            }
        }

        $this->gen_contents['page_title'] = $this->entity.' - Add';
        $this->gen_contents['dynamic_views'][] = $this->config->item('pages') . 'department/add';
        $this->load->view($this->config->item('common_page') . 'template', $this->gen_contents);
    }

    /**
     * edit a department
     */
    public function edit() {
        $id = strip_quotes(strip_tags(trim($this->uri->segment(3))));
        if ($_POST && $id) {
            $this->form_validation->set_rules('department_name', 'Department Name', 'required|trim|xss_clean|max_length[50]');
            $this->form_validation->set_rules('description', 'Description', 'xss_clean|max_length[100]');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('message', validation_errors());
                $this->session->set_flashdata('msg_class', 'error_message');
                redirect($this->gen_contents['paths']['edit']);
            } else {
                // build array for the model
                $formData = array(
                    'dept_name' => set_value('department_name'),
                    'description' => set_value('description'),
                );

                if ($this->department->update($formData, $id) == TRUE) {
                    $this->session->set_flashdata('message', $this->entity . ' was updated successfully.');
                    $this->session->set_flashdata('msg_class', 'success_message');
                    redirect($this->gen_contents['paths']['edit'] . '/' . $id);
                } else {
                    $this->session->set_flashdata('message', 'There was some problem in updating the ' . $this->entity . '.');
                    $this->session->set_flashdata('msg_class', 'error_message');
                    redirect($this->gen_contents['paths']['edit'] . '/' . $id);
                }
            }
        }
        if ($id) {
            $this->gen_contents['department'] = $this->department->get($id);
        }

        $this->gen_contents['page_title'] = $this->entity.' - Add';
        $this->gen_contents['dynamic_views'][] = $this->config->item('pages') . 'department/edit';
        $this->load->view($this->config->item('common_page') . 'template', $this->gen_contents);
    }

    /**
     * Delete Department
     * @param type $id
     */
    public function delete($id) {
        $error = false;
        if ($id) {
            if ($this->department->delete($id)) {
                $this->session->set_flashdata('message', $this->entity . ' was deleted successfully.');
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
