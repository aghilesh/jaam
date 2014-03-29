<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Branch extends CI_Controller {

    public function Branch() {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->library('pagination');

        $this->load->helper('form');
        $this->load->helper('url');

        $this->load->model('branch_model', 'branch');
        $this->load->model('country_model', 'country');
        
        $this->gen_contents['dynamic_views'] = array();
        $this->gen_contents['load_css'] = array();
        $this->gen_contents['load_js'] = array();

        $this->gen_contents['site_name'] = $this->config->item('site_name');
        $this->gen_contents['page_title'] = 'Branch';
        $this->gen_contents['title'] = $this->gen_contents['site_name'] . ' : ' . $this->gen_contents['page_title'];
        $this->gen_contents['leftmenu_selected'] = 'branch';

        $this->gen_contents['paths'] = array(
            'add' => 'branch/add',
            'edit' => 'branch/edit',
            'delete' => 'branch/delete',
            'list' => 'branch'
        );
        $this->entity = 'Branch';
        $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
    }

    public function index() {

        $this->gen_contents['branches'] = $this->branch->get();

        $this->gen_contents['dynamic_views'][] = $this->config->item('pages') . 'branch/list';
        $this->load->view($this->config->item('common_page') . 'template', $this->gen_contents);
    }

    /**
     * add a branch
     */
    public function add() {
        if ($_POST) {
            $this->form_validation->set_rules('branch_name', 'Branch Name', 'required|trim|xss_clean|max_length[100]');
            $this->form_validation->set_rules('description', 'Description', 'xss_clean|max_length[100]');
            $this->form_validation->set_rules('country_id', 'Country', 'required|xss_clean|max_length[3]');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('message', validation_errors());
                $this->session->set_flashdata('msg_class', 'error_message');
                redirect($this->gen_contents['paths']['add']);
            } else {
                // build array for the model
                $formData = array(
                    'branch_name' => set_value('branch_name'),
                    'description' => set_value('description'),
                    'country_id' => set_value('country_id')
                );

                if ($this->branch->insert($formData)) {
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
        
        $this->gen_contents['countries'] = prepareOptionList($this->country->get(),array('key'=>'id','value'=>'country'));
        $this->gen_contents['page_title'] = $this->entity.' - Add';
        $this->gen_contents['dynamic_views'][] = $this->config->item('pages') . 'branch/add';
        $this->load->view($this->config->item('common_page') . 'template', $this->gen_contents);
    }

    /**
     * edit a branch
     */
    public function edit() {
        $id = strip_quotes(strip_tags(trim($this->uri->segment(3))));
        if ($_POST && $id) {
            $this->form_validation->set_rules('branch_name', 'Branch Name', 'required|trim|xss_clean|max_length[100]');
            $this->form_validation->set_rules('description', 'Description', 'xss_clean|max_length[100]');
            $this->form_validation->set_rules('country_id', 'Country', 'required|xss_clean|max_length[3]');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('message', validation_errors());
                $this->session->set_flashdata('msg_class', 'error_message');
                redirect($this->gen_contents['paths']['edit']);
            } else {
                // build array for the model
                $formData = array(
                    'branch_name' => set_value('branch_name'),
                    'description' => set_value('description'),
                    'country_id' => set_value('country_id')
                );

                if ($this->branch->update($formData, $id) == TRUE) {
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
            $this->gen_contents['branch'] = $this->branch->get($id);
        }
        $this->gen_contents['countries'] = prepareOptionList($this->country->get(),array('key'=>'id','value'=>'country'));
        $this->gen_contents['page_title'] = $this->entity.' - Edit';
        $this->gen_contents['dynamic_views'][] = $this->config->item('pages') . 'branch/edit';
        $this->load->view($this->config->item('common_page') . 'template', $this->gen_contents);
    }

    /**
     * Delete Branch
     * @param type $id
     */
    public function delete($id) {
        $error = false;
        if ($id) {
            if ($this->branch->delete($id)) {
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
