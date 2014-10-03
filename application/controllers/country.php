<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Country extends CI_Controller {

    public function Country() {
        parent::__construct();

        (!$this->authentication->check_logged_in()) ? redirect('') : '';
        $this->authentication->checkModulePermission('Country');
        
        $this->load->library('form_validation');
        $this->load->library('pagination');

        $this->load->helper('form');
        $this->load->helper('url');

        $this->load->model('country_model', 'country');

        $this->gen_contents['dynamic_views'] = array();
        $this->gen_contents['load_css'] = array();
        $this->gen_contents['load_js'] = array();

        $this->gen_contents['site_name'] = $this->config->item('site_name');
        $this->gen_contents['page_title'] = 'Country';
        $this->gen_contents['title'] = $this->gen_contents['site_name'] . ' : ' . $this->gen_contents['page_title'];
        $this->gen_contents['leftmenu_selected'] = 'country';

        $this->gen_contents['paths'] = array(
            'add' => 'country/add',
            'edit' => 'country/edit',
            'delete' => 'country/delete',
            'list' => 'country'
        );
        $this->entity = 'Country';
        $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
    }

    public function index() {

        $this->gen_contents['countries'] = $this->country->get();

        $this->gen_contents['dynamic_views'][] = $this->config->item('pages') . 'country/list';
        $this->load->view($this->config->item('common_page') . 'template', $this->gen_contents);
    }

    /**
     * add a department
     */
    public function add() {
        $this->authentication->checkModuleActionPermission('add Country');
        if ($_POST) {
            $this->form_validation->set_rules('country', 'Country Name', 'required|trim|xss_clean|max_length[50]');
            $this->form_validation->set_rules('capital', 'Capital', 'xss_clean|max_length[100]');
            $this->form_validation->set_rules('currency', 'Currency', 'required|xss_clean|max_length[5]');
            $this->form_validation->set_rules('currency_name', 'Currency Name', 'xss_clean|max_length[50]');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('message', validation_errors());
                $this->session->set_flashdata('msg_class', 'error_message');
                redirect($this->gen_contents['paths']['add']);
            } else {
                // build array for the model
                $formData = array(
                    'country' => set_value('country'),
                    'capital' => set_value('capital'),
                    'currency' => set_value('currency'),
                    'currency_name' => set_value('currency_name'),
                    'show_in_list' => isset($_POST['show_in_list']) ? 1 : 0
                );
                if ($this->country->insert($formData)) {
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

        $this->gen_contents['page_title'] = $this->entity . ' - Add';
        $this->gen_contents['dynamic_views'][] = $this->config->item('pages') . 'country/add';
        $this->load->view($this->config->item('common_page') . 'template', $this->gen_contents);
    }

    /**
     * edit a department
     */
    public function edit() {
        $this->authentication->checkModuleActionPermission('edit Country');
        $id = strip_quotes(strip_tags(trim($this->uri->segment(3))));
        if ($_POST && $id) {
            $this->form_validation->set_rules('country', 'Country Name', 'required|trim|xss_clean|max_length[50]');
            $this->form_validation->set_rules('capital', 'Capital', 'xss_clean|max_length[100]');
            $this->form_validation->set_rules('currency', 'Currency', 'required|xss_clean|max_length[5]');
            $this->form_validation->set_rules('currency_name', 'Currency Name', 'xss_clean|max_length[50]');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('message', validation_errors());
                $this->session->set_flashdata('msg_class', 'error_message');
                redirect($this->gen_contents['paths']['edit'] . '/' . $id);
            } else {
                // build array for the model
                $formData = array(
                    'country' => set_value('country'),
                    'capital' => set_value('capital'),
                    'currency' => set_value('currency'),
                    'currency_name' => set_value('currency_name'),
                    'show_in_list' => isset($_POST['show_in_list']) ? 1 : 0
                );

                if ($this->country->update($formData, $id) == TRUE) {
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
            $this->gen_contents['country'] = $this->country->get($id);
        }

        $this->gen_contents['page_title'] = $this->entity . ' - Add';
        $this->gen_contents['dynamic_views'][] = $this->config->item('pages') . 'country/edit';
        $this->load->view($this->config->item('common_page') . 'template', $this->gen_contents);
    }

    /**
     * Delete Country
     * @param type $id
     */
    public function delete($id) {
        $this->authentication->checkModuleActionPermission('delete Country');
        $error = false;
        if ($id) {
            if ($this->country->delete($id)) {
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
