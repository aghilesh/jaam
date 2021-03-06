<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Associate_agency extends CI_Controller {

    public function Associate_agency() {
        parent::__construct();

        (!$this->authentication->check_logged_in()) ? redirect('') : '';

        $this->load->library('form_validation');
        $this->load->library('pagination');

        $this->load->helper('form');
        $this->load->helper('url');

        $this->load->model('agency_model', 'agency');
        $this->load->model('country_model', 'country');

        $this->gen_contents['dynamic_views'] = array();
        $this->gen_contents['load_css'] = array();
        $this->gen_contents['load_js'] = array();

        $this->gen_contents['site_name'] = $this->config->item('site_name');
        $this->gen_contents['page_title'] = 'Associate Agency';
        $this->gen_contents['title'] = $this->gen_contents['site_name'] . ' : ' . $this->gen_contents['page_title'];
        $this->gen_contents['leftmenu_selected'] = 'associate_agency';

        $this->gen_contents['paths'] = array(
            'add' => 'associate_agency/add',
            'edit' => 'associate_agency/edit',
            'delete' => 'associate_agency/delete',
            'list' => 'associate_agency',
            'view' => 'associate_agency/view'
        );
        $this->entity = 'Associate Agency';
        $this->form_validation->set_error_delimiters('<br/>', '');
    }

    public function index() {
        $this->gen_contents['agencies'] = $this->agency->get();

        $this->gen_contents['dynamic_views'][] = $this->config->item('pages') . 'agency/list';
        $this->load->view($this->config->item('common_page') . 'template', $this->gen_contents);
    }

    public function add() {
        if ($_POST) {
            $validationError = array();
            $this->form_validation->set_rules('code', 'Code', 'required|trim|xss_clean|max_length[20]');
            $this->form_validation->set_rules('agency', 'Agency', 'required|trim|xss_clean|max_length[250]');
            //$this->form_validation->set_rules('description', 'Description', 'trim|xss_clean|max_length[250]');
            //$this->form_validation->set_rules('contact_person', 'Contact Person', 'trim|xss_clean|max_length[100]');
            //$this->form_validation->set_rules('address', 'Address', 'required|trim|xss_clean|max_length[500]');
            $this->form_validation->set_rules('email_id', 'Email', 'trim|xss_clean|max_length[100]');
            $this->form_validation->set_rules('phone1', 'Phone 1', 'trim|xss_clean|max_length[100]');
            //$this->form_validation->set_rules('phone2', 'Phone 2', 'trim|xss_clean|max_length[100]');
            //$this->form_validation->set_rules('commission_percentage', 'Commission Percentage', 'required|trim|xss_clean|max_length[11]');
            //$this->form_validation->set_rules('application_fee', 'Application Fee', 'required|trim|xss_clean|max_length[11]');
            //$this->form_validation->set_rules('service_charge', 'Service Charge', 'required|trim|xss_clean|max_length[11]');
            $this->form_validation->set_rules('country_id', 'Country', 'required|xss_clean|max_length[3]');

            if ($this->form_validation->run() == FALSE) {
                $validationError[] = validation_errors();
            }
            $checkDuplication = $this->agency->getDuplication(array('code' => $this->input->post('code'), 'email_id' => $this->input->post('email_id')));
            if ($checkDuplication) {
                foreach ($checkDuplication as $duplication) {
                    if ($duplication->email_id == $this->input->post('email_id')) {
                        $validationError[] = 'Email already exists';
                    }
                    if ($duplication->code == $this->input->post('code')) {
                        $validationError[] = 'Code already exists';
                    }
                }
                $validationError = implode('<br/>', $validationError);
            }
            if ($validationError) {
                $this->gen_contents['message'] = $validationError;
                $this->gen_contents['msg_class'] = 'error_message';
            } else {
                // build array for the model
                $formData = array(
                    'code' => $this->input->post('code'),
                    'agency' => $this->input->post('agency'),
                    'description' => $this->input->post('description'),
                    'contact_person' => $this->input->post('contact_person'),
                    'address' => $this->input->post('address'),
                    'email_id' => $this->input->post('email_id'),
                    'phone1' => $this->input->post('phone1'),
                    'phone2' => $this->input->post('phone2'),
                    'commission_percentage' => $this->input->post('commission_percentage'),
                    'application_fee' => $this->input->post('application_fee'),
                    'service_charge' => $this->input->post('service_charge'),
                    'country_id' => $this->input->post('country_id'),
                );




                if ($this->agency->insert($formData)) {
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
        $this->gen_contents['countries'] = prepareOptionList($this->country->get(), array('key' => 'id', 'value' => 'country'));
        $this->gen_contents['page_title'] = $this->entity . ' - Add';
        $this->gen_contents['dynamic_views'][] = $this->config->item('pages') . 'agency/add';
        $this->load->view($this->config->item('common_page') . 'template', $this->gen_contents);
    }

    /**
     * edit a university
     */
    public function edit() {
        $validationError = array();
        $id = strip_quotes(strip_tags(trim($this->uri->segment(3))));
        if ($_POST && $id) {
            $this->form_validation->set_rules('code', 'Code', 'required|trim|xss_clean|max_length[20]');
            $this->form_validation->set_rules('agency', 'Agency', 'required|trim|xss_clean|max_length[250]');
            //$this->form_validation->set_rules('description', 'Description', 'trim|xss_clean|max_length[250]');
            //$this->form_validation->set_rules('contact_person', 'Contact Person', 'trim|xss_clean|max_length[100]');
            //$this->form_validation->set_rules('address', 'Address', 'trim|xss_clean|max_length[500]');
            $this->form_validation->set_rules('email_id', 'Email', 'trim|xss_clean|max_length[100]');
            $this->form_validation->set_rules('phone1', 'Phone 1', 'trim|xss_clean|max_length[100]');
            //$this->form_validation->set_rules('phone2', 'Phone 2', 'trim|xss_clean|max_length[100]');
            //$this->form_validation->set_rules('commission_percentage', 'Phone 2', 'trim|xss_clean|max_length[11]');
            //$this->form_validation->set_rules('application_fee', 'Application Fee', 'trim|xss_clean|max_length[11]');
            //$this->form_validation->set_rules('service_charge', 'Service Charge', 'trim|xss_clean|max_length[11]');
            $this->form_validation->set_rules('country_id', 'Country', 'required|xss_clean|max_length[3]');

            if ($this->form_validation->run() == FALSE) {
                $validationError[] = validation_errors();
            }
            $checkDuplication = $this->agency->getDuplication(array('code' => $this->input->post('code'), 'email_id' => $this->input->post('email_id')), $id);
            if ($checkDuplication) {
                foreach ($checkDuplication as $duplication) {
                    if ($duplication->email_id == $this->input->post('email_id')) {
                        $validationError[] = 'Email already exists';
                    }
                    if ($duplication->code == $this->input->post('code')) {
                        $validationError[] = 'Code already exists';
                    }
                }
                $validationError = implode('<br/>', $validationError);
            }
            if ($validationError) {
                $this->gen_contents['message'] = $validationError;
                $this->gen_contents['msg_class'] = 'error_message';
            } else {
                // build array for the model
                $formData = array(
                    'code' => $this->input->post('code'),
                    'agency' => $this->input->post('agency'),
                    'description' => $this->input->post('description'),
                    'contact_person' => $this->input->post('contact_person'),
                    'address' => $this->input->post('address'),
                    'email_id' => $this->input->post('email_id'),
                    'phone1' => $this->input->post('phone1'),
                    'phone2' => $this->input->post('phone2'),
                    'commission_percentage' => $this->input->post('commission_percentage'),
                    'application_fee' => $this->input->post('application_fee'),
                    'service_charge' => $this->input->post('service_charge'),
                    'country_id' => $this->input->post('country_id'),
                );

                if ($this->agency->update($formData, $id) == TRUE) {
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
            $this->gen_contents['agency'] = $this->agency->get($id);
        }
        $this->gen_contents['countries'] = prepareOptionList($this->country->get(), array('key' => 'id', 'value' => 'country'));
        $this->gen_contents['page_title'] = $this->entity . ' - Edit';
        $this->gen_contents['dynamic_views'][] = $this->config->item('pages') . 'agency/edit';
        $this->load->view($this->config->item('common_page') . 'template', $this->gen_contents);
    }

    /**
     * Delete Agency
     * @param type $id
     */
    public function delete($id) {
        $error = false;
        if ($id) {
            if ($this->agency->delete($id)) {
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

    /**
     * view an agency
     */
    public function view() {
        $id = strip_quotes(strip_tags(trim($this->uri->segment(3))));
        if ($id) {
            $this->gen_contents['agency'] = $this->agency->get($id);
        } else {
            redirect($this->gen_contents['paths']['list']);
        }
        $this->gen_contents['page_title'] = $this->entity . ' - View';
        $this->gen_contents['dynamic_views'][] = $this->config->item('pages') . 'agency/view';
        $this->load->view($this->config->item('common_page') . 'template', $this->gen_contents);
    }

}
