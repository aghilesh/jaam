<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class University_courses extends CI_Controller {

    public function University_courses() {
        parent::__construct();

        (!$this->authentication->check_logged_in()) ? redirect('') : '';

        $this->load->library('form_validation');
        $this->gen_contents['site_name'] = $this->config->item('site_name');
        $this->gen_contents['dynamic_views'] = array();
        $this->load->model('courses_model', 'courses');
        $this->load->model('country_model', 'country');
        $this->load->model('university_model', 'university');
        $this->gen_contents['dynamic_views'] = array();
        $this->gen_contents['load_css'] = array();
        $this->gen_contents['load_js'] = array();

        $this->gen_contents['site_name'] = $this->config->item('site_name');
        $this->gen_contents['page_title'] = 'University courses';
        $this->gen_contents['title'] = $this->gen_contents['site_name'] . ' : ' . $this->gen_contents['page_title'];
        $this->gen_contents['leftmenu_selected'] = 'courses';

        $this->gen_contents['paths'] = array(
            'add' => 'university_courses/add',
            'edit' => 'university_courses/edit',
            'delete' => 'university_courses/delete',
            'list' => 'university_courses'
        );
        $this->entity = 'University course';
        $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
    }

    public function index() {
        $this->gen_contents['title'] = $this->gen_contents['site_name'] . ': university_courses';
        $this->gen_contents['page_title'] = 'University Courses';
        $this->gen_contents['leftmenu_selected'] = 'university_courses';

        $this->gen_contents['departments'] = $this->courses->get();

        $this->gen_contents['dynamic_views'][] = $this->config->item('pages') . 'university_courses/list';
        $this->load->view($this->config->item('common_page') . 'template', $this->gen_contents);
    }

    public function add() {
        if ($_POST) {
            $validationError = array();
            $this->form_validation->set_rules('code', 'Code', 'required|trim|xss_clean|max_length[20]');
            $this->form_validation->set_rules('university_id', 'University', 'required|trim|xss_clean|max_length[3]');
            $this->form_validation->set_rules('course_title', 'Course title', 'trim|xss_clean|max_length[100]');
            $this->form_validation->set_rules('phone1', 'Phone 1', 'trim|xss_clean|max_length[100]');
            $this->form_validation->set_rules('country_id', 'Country', 'required|xss_clean|max_length[3]');

            if ($this->form_validation->run() == FALSE) {
                $validationError[] = validation_errors();
            }
            $checkDuplication = $this->courses->getDuplication(array('code' => $this->input->post('code')));
            if ($checkDuplication) {
                foreach ($checkDuplication as $duplication) {
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
                    'university_id' => $this->input->post('university_id'),
                    'country_id' => $this->input->post('country_id'),
                    'course_title' => $this->input->post('course_title'),
                    'course_descripition' => $this->input->post('course_description'),
                    'course_level' => $this->input->post('course_level'),
                    'duration' => $this->input->post('duration'),
                    'course_fee' => $this->input->post('course_fee'),
                );

                if ($this->courses->insert($formData)) {
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
        $this->gen_contents['title'] = $this->gen_contents['site_name'] . ': university_courses';
        $this->gen_contents['page_title'] = 'University Courses';
        $this->gen_contents['leftmenu_selected'] = 'university_courses';

        $this->gen_contents['universities'] = prepareOptionList($this->university->get(), array('key' => 'id', 'value' => 'university'));
        $this->gen_contents['countries'] = prepareOptionList($this->country->get(), array('key' => 'id', 'value' => 'country'));
        $this->gen_contents['dynamic_views'][] = $this->config->item('pages') . 'university_courses/add';
        $this->load->view($this->config->item('common_page') . 'template', $this->gen_contents);
    }

    public function edit() {
        $id = strip_quotes(strip_tags(trim($this->uri->segment(3))));
        $this->gen_contents['university'] = $isExists = $this->courses->get($id);
        if (!$isExists)
            redirect($this->gen_contents['paths']['list']);

        if ($_POST) {
            $validationError = array();
            $this->form_validation->set_rules('code', 'Code', 'required|trim|xss_clean|max_length[20]');
            $this->form_validation->set_rules('university_id', 'University', 'required|trim|xss_clean|max_length[3]');
            $this->form_validation->set_rules('course_title', 'Course title', 'trim|xss_clean|max_length[100]');
            $this->form_validation->set_rules('phone1', 'Phone 1', 'trim|xss_clean|max_length[100]');
            $this->form_validation->set_rules('country_id', 'Country', 'required|xss_clean|max_length[3]');

            if ($this->form_validation->run() == FALSE) {
                $validationError[] = validation_errors();
            }
            $checkDuplication = $this->courses->getDuplication(array('code' => $this->input->post('code')));
            if ($checkDuplication) {
                foreach ($checkDuplication as $duplication) {
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
                    'university_id' => $this->input->post('university_id'),
                    'country_id' => $this->input->post('country_id'),
                    'course_title' => $this->input->post('course_title'),
                    'course_descripition' => $this->input->post('course_description'),
                    'course_level' => $this->input->post('course_level'),
                    'duration' => $this->input->post('duration'),
                    'course_fee' => $this->input->post('course_fee'),
                );

                if ($this->courses->update($formData)) {
                    $this->session->set_flashdata('message', $this->entity . ' was updated successfully.');
                    $this->session->set_flashdata('msg_class', 'success_message');
                    redirect($this->gen_contents['paths']['list']);
                } else {
                    $this->session->set_flashdata('message', 'There was some problem in updating the ' . $this->entity . '.');
                    $this->session->set_flashdata('msg_class', 'error_message');
                    redirect($this->gen_contents['paths']['edit'] . '/' . $id);
                }
            }
        }
        $this->gen_contents['title'] = $this->gen_contents['site_name'] . ': university_courses';
        $this->gen_contents['page_title'] = 'University Courses';
        $this->gen_contents['leftmenu_selected'] = 'university_courses';

        $this->gen_contents['universities'] = prepareOptionList($this->university->get(), array('key' => 'id', 'value' => 'university'));
        $this->gen_contents['countries'] = prepareOptionList($this->country->get(), array('key' => 'id', 'value' => 'country'));
        $this->gen_contents['dynamic_views'][] = $this->config->item('pages') . 'university_courses/edit';
        $this->load->view($this->config->item('common_page') . 'template', $this->gen_contents);
    }

    public function delete($id) {
        $error = false;
        if ($id) {
            if ($this->courses->delete($id)) {
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
