<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Registration extends CI_Controller {

    public function Registration() {
        parent::__construct();

        (!$this->authentication->check_logged_in()) ? redirect('') : '';
        $this->authentication->checkModulePermission('Registration');
        
        $this->gen_contents['site_name'] = $this->config->item('site_name');
        $this->gen_contents['dynamic_views'] = array();
        $this->load->library('pagination');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->helper('url');

        $this->load->model('enquirymode_model', 'enquirymode');
        $this->load->model('publicitysource_model', 'publicitysource');
        $this->load->model('registration_model', 'registration');
        $this->load->model('user_model', 'user');

        $this->gen_contents['dynamic_views'] = array();
        $this->gen_contents['load_css'] = array();
        $this->gen_contents['load_js'] = array("registration.js");

        $this->gen_contents['site_name'] = $this->config->item('site_name');
        $this->gen_contents['page_title'] = 'Registration';
        $this->gen_contents['title'] = $this->gen_contents['site_name'] . ' : ' . $this->gen_contents['page_title'];
        $this->gen_contents['leftmenu_selected'] = 'registration';

        $this->gen_contents['paths'] = array(
            'add' => 'registration/add',
            'edit' => 'registration/edit',
            'delete' => 'registration/delete',
            'list' => 'registration',
            'view' => 'registration/view'
        );
        $this->entity = 'Registration';
        $this->form_validation->set_error_delimiters('<br/>');

        $this->load->model('country_model', 'country');
    }

    public function index() {
        $this->gen_contents['title'] = $this->gen_contents['site_name'] . ': Registration';
        $this->gen_contents['page_title'] = 'Registration';
        $this->gen_contents['leftmenu_selected'] = 'registration';
        $this->gen_contents['registrations'] = $this->registration->get();
        $this->gen_contents['dynamic_views'][] = $this->config->item('pages') . 'registration/list';
        $this->load->view($this->config->item('common_page') . 'template', $this->gen_contents);
    }

    public function add() {
        $this->authentication->checkModuleActionPermission('add Registration');
        if ($_POST) {
            $this->__saveRegistrationData();
        }
        $this->gen_contents['title'] = $this->gen_contents['site_name'] . ': Add new Registration';
        $this->gen_contents['page_title'] = 'Add new registration';
        $this->gen_contents['leftmenu_selected'] = 'registration';
        $this->gen_contents['dynamic_views'][] = $this->config->item('pages') . 'registration/add';
        $this->gen_contents['countries'] = prepareOptionList($this->country->get(), array('key' => 'id', 'value' => 'country'));
        $this->gen_contents['enquiry_modes'] = prepareOptionList($this->enquirymode->get(), array('key' => 'id', 'value' => 'mode_name'));
        $this->gen_contents['publicity_sources'] = prepareOptionList($this->publicitysource->get(), array('key' => 'id', 'value' => 'source'));
        $this->gen_contents['users'] = prepareOptionList($this->user->get(), array('key' => 'id', 'value' => 'first_name'));
        $this->load->view($this->config->item('common_page') . 'template', $this->gen_contents);
    }
    
    private function __saveRegistrationData() {
        $formData = array();
        $post = $this->input->post();
        
        $this->__setFormValidationRules(1);
        $validationError = array();
        if ($this->form_validation->run() == FALSE) {
            $validationError[] = validation_errors();
        }
        if($validationError) {
            $this->gen_contents['message'] = implode('<br/>', $validationError);;
            $this->gen_contents['msg_class'] = 'error_message';
            return;
        }
        $formData['registrationMaster'] = array();
        $formData['registrationMaster']['user_id']   = $this->authentication->getUserInfo("id");
        $formData['registrationMaster']['date']   = $post['regDate'];
        $formData['registrationMaster']['enquiry_mode']   = $post['registration_mode'];
        $formData['registrationMaster']['first_name']   = $post['firstName'];
        $formData['registrationMaster']['last_name']   = $post['lastName'];
        $formData['registrationMaster']['address']   = $post['address'];
        $formData['registrationMaster']['state']   = $post['state'];
        $formData['registrationMaster']['country_id']   = $post['country_id'];
        //$formData['registrationMaster']['pincode']   = $post['pincode'];
        $formData['registrationMaster']['email_id']   = $post['email_id'];
        $formData['registrationMaster']['phone_no']   = $post['phone'];
        $formData['registrationMaster']['source']   = $post['publicity_source'];
        $formData['registrationMaster']['source_description']   = $post['source_description'];
        $formData['registrationMaster']['discription']   = $post['description'];
        $formData['registrationMaster']['total_fee'] = $post['total_fee'];
        $formData['registrationMaster']['status'] = 1;
        $formData['registrationMaster']['comments'] = $post['comments'];
        $formData['education'] = array();
        $education = $post['edu'];
        for($i=0; $i<sizeof($education['qualification']); $i++) {
            if(!trim($education['qualification'][$i])) continue;
            $arr = array();
            $arr['reg_id'] = '';
            $arr['country_id'] = $education['country_id'][$i];
            $arr['qualification'] = $education['qualification'][$i];
            $arr['board'] = $education['university'][$i];
            $arr['institution'] = $education['institution'][$i];
            $arr['passout_year'] = $education['passoutyear'][$i];
            $arr['percentage'] = $education['percentage'][$i];
            array_push($formData['education'], $arr);
        }
        
        $formData['courses'] = array();
        $course = $post['course'];
        for($i=0; $i<sizeof($course['course_name']); $i++) {
            if(!trim($course['course_name'][$i])) continue;
            $arr = array();
            $arr['reg_id'] = '';
            $arr['course_interested'] = $course['course_name'][$i];
            $arr['country_id'] = $course['country_id'][$i];
            array_push($formData['courses'], $arr);
        }
        
        $formData['test_prepare'] = array();
        $testPrepare = array();
        $testPrepare['reg_id'] = '';
        $testPrepare['toffel'] = $post['testPrepTOFFEL'];
        $testPrepare['ielts'] = $post['testPrepIELTS'];
        $testPrepare['gmat'] = $post['testPrepGMAT'];
        $testPrepare['gre'] = $post['testPrepGRE'];
        $testPrepare['sat'] = $post['testPrepSAT'];
        $testPrepare['started_coaching'] = $post['testPrepStartCoaching'];
        $testPrepare['looking_for_coaching'] = $post['testPrepLookForCoaching'];
        $testPrepare['looking_for_waier'] = $post['testPrepLookForWaier'];
        $testPrepare['regular_or_fasttrack'] = $post['testPrepCourseMode'];
        $testPrepare['work_experiance'] = $post['testPrepWorkExperience'];
        array_push($formData['test_prepare'], $testPrepare);
        
        $formData['followUp'] = array();
        $followUp = array();
        $followUp['ref_id'] = '';
        $followUp['ref_type'] = 'R';
        $followUp['created_date'] = date('Y-m-d H:i:s');
        $followUp['title'] = $post['followUpTitle'];
        $followUp['description'] = $post['followUpDescription'];
        $followUp['assigned_by'] = $this->authentication->getCurrentUserId();
        $followUp['assigned_to'] = $post['followUpAssignedTo'];
        $followUp['when'] = $post['followUpWhen'].' 00:00:00';
        $followUp['status'] = 1;
        
        array_push($formData['followUp'], $followUp);
 
        if ($this->registration->insert($formData)) {
            $this->session->set_flashdata('message', $this->entity . ' was added successfully.');
            $this->session->set_flashdata('msg_class', 'success_message');
            redirect($this->gen_contents['paths']['list']);
        } else {
            $this->session->set_flashdata('message', 'There was some problem in adding the ' . $this->entity . '.');
            $this->session->set_flashdata('msg_class', 'error_message');
            redirect($this->gen_contents['paths']['add']);
        }
    }
    
    public function edit() {
        $this->authentication->checkModuleActionPermission('edit Registration');
        $id = strip_quotes(strip_tags(trim($this->uri->segment(3))));
        if ($_POST && $id) {
             $this->__updateRegistrationData($id);
        }
        $this->gen_contents['title'] = $this->gen_contents['site_name'] . ': Edit registration';
        $this->gen_contents['page_title'] = 'Edit Registration';
        $this->gen_contents['leftmenu_selected'] = 'registration';
        $this->gen_contents['dynamic_views'][] = $this->config->item('pages') . 'registration/edit';
        $this->gen_contents['countries'] = prepareOptionList($this->country->get(), array('key' => 'id', 'value' => 'country'));
        $this->gen_contents['enquiry_modes'] = prepareOptionList($this->enquirymode->get(), array('key' => 'id', 'value' => 'mode_name'));
        $this->gen_contents['publicity_sources'] = prepareOptionList($this->publicitysource->get(), array('key' => 'id', 'value' => 'source'));
        $this->gen_contents['registration_details'] = $this->registration->getForEdit($id);
        
        $this->load->view($this->config->item('common_page') . 'template', $this->gen_contents);
    }
    
    private function __updateRegistrationData($regId='') {
        $this->__setFormValidationRules();
        $validationError =  array();
        if ($this->form_validation->run() == FALSE) {
            $validationError[] = validation_errors();
        }
        if($validationError) {
            $this->gen_contents['message'] = implode('<br/>', $validationError);;
            $this->gen_contents['msg_class'] = 'error_message';
            return;
        }
        $formData = array();
        $post = $this->input->post();
        $formData['registrationMaster'] = array();
        $formData['registrationMaster']['user_id']   = $this->authentication->getUserInfo("id");
        $formData['registrationMaster']['date']   = $post['regDate'];
        $formData['registrationMaster']['enquiry_mode']   = $post['registration_mode'];
        $formData['registrationMaster']['first_name']   = $post['firstName'];
        $formData['registrationMaster']['last_name']   = $post['lastName'];
        $formData['registrationMaster']['address']   = $post['address'];
        $formData['registrationMaster']['state']   = $post['state'];
        $formData['registrationMaster']['country_id']   = $post['country_id'];
        //$formData['registrationmaster']['pincode']   = $post['pincode'];
        $formData['registrationMaster']['email_id']   = $post['email_id'];
        $formData['registrationMaster']['phone_no']   = $post['phone'];
        $formData['registrationMaster']['source']   = $post['publicity_source'];
        $formData['registrationMaster']['source_description']   = $post['source_description'];
        $formData['registrationMaster']['discription']   = $post['description'];
        $formData['registrationMaster']['total_fee']   = $post['total_fee'];
        $formData['registrationMaster']['status']   = 1;
        $formData['registrationMaster']['comments']   = $post['comments'];
        $formData['education'] = array();
        $education = $post['edu'];
         foreach($education['qualification'] as $id=>$val) {
            if(!trim($education['qualification'][$id])) continue;
            $arr = array();
            if(stripos($id, 'edit-') !== false) {
                $idVar = explode('-',$id);
                $arr['id'] = $idVar[sizeof($idVar)-1];
            }
            $arr['reg_id'] = $regId;
            $arr['country_id'] = $education['country_id'][$id];
            $arr['qualification'] = $education['qualification'][$id];
            $arr['board'] = $education['university'][$id];
            $arr['institution'] = $education['institution'][$id];
            $arr['passout_year'] = $education['passoutyear'][$id];
            $arr['percentage'] = $education['percentage'][$id];
            array_push($formData['education'], $arr);
        }

        $formData['courses'] = array();
        $course = $post['course'];
        foreach($course['course_name'] as $id=>$val) {
            if(!trim($course['course_name'][$id])) continue;
            $arr = array();
            if(stripos($id, 'edit-') !== false) {
                $idVar = explode('-',$id);
                $arr['id'] = $idVar[sizeof($idVar)-1];
            }
            $arr['reg_id'] = $regId;
            $arr['course_interested'] = $course['course_name'][$id];
            $arr['country_id'] = $course['country_id'][$id];
            array_push($formData['courses'], $arr);
        }
        $formData['test_prepare'] = array();
        $testPrepare = array();
        $formData['testPrepareId'] = $post['testPrepareId'];
        $testPrepare['reg_id'] = $regId;
        $testPrepare['toffel'] = $post['testPrepTOFFEL'];
        $testPrepare['ielts'] = $post['testPrepIELTS'];
        $testPrepare['gmat'] = $post['testPrepGMAT'];
        $testPrepare['gre'] = $post['testPrepGRE'];
        $testPrepare['sat'] = $post['testPrepSAT'];
        $testPrepare['started_coaching'] = $post['testPrepStartCoaching'];
        $testPrepare['looking_for_coaching'] = $post['testPrepLookForCoaching'];
        $testPrepare['looking_for_waier'] = $post['testPrepLookForWaier'];
        $testPrepare['regular_or_fasttrack'] = $post['testPrepCourseMode'];
        $testPrepare['work_experiance'] = $post['testPrepWorkExperience'];
        array_push($formData['test_prepare'], $testPrepare);
        
        if($this->registration->update($formData, $regId)) {
            $this->session->set_flashdata('message', $this->entity . ' was updated successfully.');
            $this->session->set_flashdata('msg_class', 'success_message');
            redirect($this->gen_contents['paths']['list']);
        } else {
            $this->session->set_flashdata('message', 'There was some problem in updating the ' . $this->entity . '.');
            $this->session->set_flashdata('msg_class', 'error_message');
            redirect($this->gen_contents['paths']['edit'].'/'.$regId);
        }
    }
    
    public function delete() {
        $this->authentication->checkModuleActionPermission('delete Registration');
        $id = strip_quotes(strip_tags(trim($this->uri->segment(3))));
        $this->registration->delete($id);
        $this->session->set_flashdata('message', $this->entity . ' was deleted successfully.');
        $this->session->set_flashdata('msg_class', 'success_message');
        redirect($this->gen_contents['paths']['list']);
    }
    
    public function view() {
        $id = strip_quotes(strip_tags(trim($this->uri->segment(3))));
        $this->gen_contents['title'] = $this->gen_contents['site_name'] . ': View registration';
        $this->gen_contents['page_title'] = 'View registration';
        $this->gen_contents['leftmenu_selected'] = 'registration';
        $this->gen_contents['dynamic_views'][] = $this->config->item('pages') . 'registration/view';
        $this->gen_contents['countries'] = prepareOptionList($this->country->get(), array('key' => 'id', 'value' => 'country'));
        $this->gen_contents['enquiry_modes'] = prepareOptionList($this->enquirymode->get(), array('key' => 'id', 'value' => 'mode_name'));
        $this->gen_contents['publicity_sources'] = prepareOptionList($this->publicitysource->get(), array('key' => 'id', 'value' => 'source'));
        $this->gen_contents['registration_details'] = $this->registration->getForEdit($id);
        $this->load->view($this->config->item('common_page') . 'template', $this->gen_contents);
    }
    
    protected function __setFormValidationRules($newRegistrationFlag=0){
        $this->form_validation->set_rules('email_id', 'Email', 'required|trim|xss_clean|valid_email');
        $this->form_validation->set_rules('firstName', 'First Name', 'required|trim|xss_clean');
        $this->form_validation->set_rules('lastName', 'Last Name', 'required|trim|xss_clean');
       //$this->form_validation->set_rules('pincode', 'Pin Code', 'required|trim|xss_clean');
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim|xss_clean');
        if($newRegistrationFlag) {
           $this->form_validation->set_rules('followUpTitle', 'Follow Up Title', 'required|trim|xss_clean');
            $this->form_validation->set_rules('followUpDescription', 'Follow Up Description', 'required|trim|xss_clean');
        }
    }

}
