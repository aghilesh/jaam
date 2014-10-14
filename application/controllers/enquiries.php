<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Enquiries extends CI_Controller {

    public function Enquiries() {
        parent::__construct();

        (!$this->authentication->check_logged_in()) ? redirect('') : '';
        $this->authentication->checkModulePermission('Enquiries');
        
        $this->gen_contents['site_name'] = $this->config->item('site_name');
        $this->gen_contents['dynamic_views'] = array();
        $this->load->library('pagination');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->helper('url');

        $this->load->model('enquirymode_model', 'enquirymode');
        $this->load->model('publicitysource_model', 'publicitysource');
        $this->load->model('enquiry_model', 'enquiry');
        $this->load->model('user_model', 'user');

        $this->gen_contents['dynamic_views'] = array();
        $this->gen_contents['load_css'] = array();
        $this->gen_contents['load_js'] = array("enquiry.js");

        $this->gen_contents['site_name'] = $this->config->item('site_name');
        $this->gen_contents['page_title'] = 'Enquiry';
        $this->gen_contents['title'] = $this->gen_contents['site_name'] . ' : ' . $this->gen_contents['page_title'];
        $this->gen_contents['leftmenu_selected'] = 'enquiries';

        $this->gen_contents['paths'] = array(
            'add' => 'enquiries/add',
            'edit' => 'enquiries/edit',
            'delete' => 'enquiries/delete',
            'list' => 'enquiries',
            'view' => 'enquiries/view'
        );
        $this->entity = 'Enquiry';
        $this->form_validation->set_error_delimiters('<br/>');

        $this->load->model('country_model', 'country');
    }

    public function index() {
        $this->gen_contents['title'] = $this->gen_contents['site_name'] . ': Enquiries';
        $this->gen_contents['page_title'] = 'Enquiries';
        $this->gen_contents['leftmenu_selected'] = 'enquiries';
        $this->gen_contents['enquiries'] = $this->enquiry->get();
        $this->gen_contents['dynamic_views'][] = $this->config->item('pages') . 'enquiries/list';
        $this->load->view($this->config->item('common_page') . 'template', $this->gen_contents);
    }

    public function add() {
        $this->authentication->checkModuleActionPermission('add Enquiries');
        if ($_POST) {
            $this->__saveEnquiryData();
        }
        $this->gen_contents['title'] = $this->gen_contents['site_name'] . ': Add new enquiry';
        $this->gen_contents['page_title'] = 'Add new enquiry';
        $this->gen_contents['leftmenu_selected'] = 'enquiries';
        $this->gen_contents['dynamic_views'][] = $this->config->item('pages') . 'enquiries/add';
        $this->gen_contents['countries'] = prepareOptionList($this->country->get(), array('key' => 'id', 'value' => 'country'));
        $this->gen_contents['enquiry_modes'] = prepareOptionList($this->enquirymode->get(), array('key' => 'id', 'value' => 'mode_name'));
        $this->gen_contents['publicity_sources'] = prepareOptionList($this->publicitysource->get(), array('key' => 'id', 'value' => 'source'));
        $this->gen_contents['users'] = prepareOptionList($this->user->get(), array('key' => 'id', 'value' => 'first_name'));
        $this->load->view($this->config->item('common_page') . 'template', $this->gen_contents);
    }
    
    private function __saveEnquiryData() {
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
        $formData['enquirymaster'] = array();
        $formData['enquirymaster']['user_id']   = $this->authentication->getUserInfo("id");
        $formData['enquirymaster']['date']   = $post['enqDate'];
        $formData['enquirymaster']['enquiry_mode']   = $post['enquiry_mode'];
        $formData['enquirymaster']['first_name']   = $post['firstName'];
        $formData['enquirymaster']['last_name']   = $post['lastName'];
        $formData['enquirymaster']['address']   = $post['address'];
        $formData['enquirymaster']['state']   = $post['state'];
        $formData['enquirymaster']['country_id']   = $post['country_id'];
        $formData['enquirymaster']['pincode']   = $post['pincode'];
        $formData['enquirymaster']['email_id']   = $post['email_id'];
        $formData['enquirymaster']['phone_no']   = $post['phone'];
        $formData['enquirymaster']['source']   = $post['publicity_source'];
        $formData['enquirymaster']['source_description']   = $post['source_description'];
        $formData['enquirymaster']['discription']   = $post['description'];
        $formData['education'] = array();
        $education = $post['edu'];
        for($i=0; $i<sizeof($education['qualification']); $i++) {
            if(!trim($education['qualification'][$i])) continue;
            $arr = array();
            $arr['enquiry_id'] = '';
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
            $arr['enquiry_id'] = '';
            $arr['course_interested'] = $course['course_name'][$i];
            $arr['country_id'] = $course['country_id'][$i];
            array_push($formData['courses'], $arr);
        }
        
        $formData['followUp'] = array();
        $followUp = array();
        $followUp['ref_id'] = '';
        $followUp['ref_type'] = 'E';
        $followUp['created_date'] = date('Y-m-d H:i:s');
        $followUp['title'] = $post['followUpTitle'];
        $followUp['description'] = $post['followUpDescription'];
        $followUp['assigned_by'] = $this->authentication->getCurrentUserId();
        $followUp['assigned_to'] = $post['followUpAssignedTo'];
        $followUp['when'] = $post['followUpWhen'].' 00:00:00';
        $followUp['status'] = 1;
        array_push($formData['followUp'], $followUp);
        
        /*$formData['test_prepare'] = array();
        $testPrepare = array();
        $testPrepare['enquiry_id'] = '';
        $testPrepare['toffel'] = $post['testPrepTOFFEL'];
        $testPrepare['ielts'] = $post['testPrepIELTS'];
        $testPrepare['gmat'] = $post['testPrepGMAT'];
        $testPrepare['gre'] = $post['testPrepGRE'];
        $testPrepare['sat'] = $post['testPrepSAT'];
        $testPrepare['started_coaching'] = $post['testPrepStartCoaching'];
        $testPrepare['looking_for_coaching'] = $post['testPrepLookForCoaching'];
        $testPrepare['looking_for_waier'] = $post['testPrepLookForWaier'];
        $testPrepare['regular_or_fast_track'] = $post['testPrepCourseMode'];
        $testPrepare['work_experiance'] = $post['testPrepWorkExperience'];
        array_push($formData['test_prepare'], $testPrepare);*/
        
        
        if ($this->enquiry->insert($formData)) {
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
        $this->authentication->checkModuleActionPermission('edit Enquiries');
        $id = strip_quotes(strip_tags(trim($this->uri->segment(3))));
        if ($_POST && $id) {
             $this->__updateEnquiryData($id);
        }
        $this->gen_contents['title'] = $this->gen_contents['site_name'] . ': Edit enquiry';
        $this->gen_contents['page_title'] = 'Edit enquiry';
        $this->gen_contents['leftmenu_selected'] = 'enquiries';
        $this->gen_contents['dynamic_views'][] = $this->config->item('pages') . 'enquiries/edit';
        $this->gen_contents['countries'] = prepareOptionList($this->country->get(), array('key' => 'id', 'value' => 'country'));
        $this->gen_contents['enquiry_modes'] = prepareOptionList($this->enquirymode->get(), array('key' => 'id', 'value' => 'mode_name'));
        $this->gen_contents['publicity_sources'] = prepareOptionList($this->publicitysource->get(), array('key' => 'id', 'value' => 'source'));
        $this->gen_contents['enquiry_details'] = $this->enquiry->getForEdit($id);
        
        $this->load->view($this->config->item('common_page') . 'template', $this->gen_contents);
    }
    
    private function __updateEnquiryData($enquiryId='') {
        $validationError = array();
        $this->__setFormValidationRules();
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
        $formData['enquirymaster'] = array();
        $formData['enquirymaster']['user_id']   = $this->authentication->getUserInfo("id");
        $formData['enquirymaster']['date']   = $post['enqDate'];
        $formData['enquirymaster']['enquiry_mode']   = $post['enquiry_mode'];
        $formData['enquirymaster']['first_name']   = $post['firstName'];
        $formData['enquirymaster']['last_name']   = $post['lastName'];
        $formData['enquirymaster']['address']   = $post['address'];
        $formData['enquirymaster']['state']   = $post['state'];
        $formData['enquirymaster']['country_id']   = $post['country_id'];
        $formData['enquirymaster']['pincode']   = $post['pincode'];
        $formData['enquirymaster']['email_id']   = $post['email_id'];
        $formData['enquirymaster']['phone_no']   = $post['phone'];
        $formData['enquirymaster']['source']   = $post['publicity_source'];
        $formData['enquirymaster']['source_description']   = $post['source_description'];
        $formData['enquirymaster']['discription']   = $post['description'];
        $formData['education'] = array();
        $education = $post['edu'];
         foreach($education['qualification'] as $id=>$val) {
            if(!trim($education['qualification'][$id])) continue;
            $arr = array();
            if(stripos($id, 'edit-') !== false) {
                $idVar = explode('-',$id);
                $arr['id'] = $idVar[sizeof($idVar)-1];
            }
            $arr['enquiry_id'] = $enquiryId;
            $arr['country_id'] = $education['country_id'][$id];
            $arr['qualification'] = $education['qualification'][$id];
            $arr['board'] = $education['university'][$id];
            $arr['institution'] = $education['institution'][$id];
            $arr['passout_year'] = $education['passoutyear'][$id];
            $arr['percentage'] = $education['percentage'][$id];
            array_push($formData['education'], $arr);
        }

        $formData['courses'] = array();
        $course = ($post['course']) ? $post['course'] : '';
        foreach($course['course_name'] as $id=>$val) {
            if(!trim($course['course_name'][$id])) continue;
            $arr = array();
            if(stripos($id, 'edit-') !== false) {
                $idVar = explode('-',$id);
                $arr['id'] = $idVar[sizeof($idVar)-1];
            }
            $arr['enquiry_id'] = $enquiryId;
            $arr['course_interested'] = $course['course_name'][$id];
            $arr['country_id'] = $course['country_id'][$id];
            array_push($formData['courses'], $arr);
        }
        /*$formData['test_prepare'] = array();
        $testPrepare = array();
        $formData['testPrepareId'] = $post['testPrepareId'];
        $testPrepare['enquiry_id'] = $enquiryId;
        $testPrepare['toffel'] = $post['testPrepTOFFEL'];
        $testPrepare['ielts'] = $post['testPrepIELTS'];
        $testPrepare['gmat'] = $post['testPrepGMAT'];
        $testPrepare['gre'] = $post['testPrepGRE'];
        $testPrepare['sat'] = $post['testPrepSAT'];
        $testPrepare['started_coaching'] = $post['testPrepStartCoaching'];
        $testPrepare['looking_for_coaching'] = $post['testPrepLookForCoaching'];
        $testPrepare['looking_for_waier'] = $post['testPrepLookForWaier'];
        $testPrepare['regular_or_fast_track'] = $post['testPrepCourseMode'];
        $testPrepare['work_experiance'] = $post['testPrepWorkExperience'];
        array_push($formData['test_prepare'], $testPrepare);*/
        
        if($this->enquiry->update($formData, $enquiryId)) {
            $this->session->set_flashdata('message', $this->entity . ' was updated successfully.');
            $this->session->set_flashdata('msg_class', 'success_message');
            redirect($this->gen_contents['paths']['list']);
        } else {
            $this->session->set_flashdata('message', 'There was some problem in updating the ' . $this->entity . '.');
            $this->session->set_flashdata('msg_class', 'error_message');
            redirect($this->gen_contents['paths']['edit'].'/'.$enquiryId);
        }
    }
    
    public function delete() {
        $this->authentication->checkModuleActionPermission('delete Enquiries');
        $id = strip_quotes(strip_tags(trim($this->uri->segment(3))));
        $this->enquiry->delete($id);
        $this->session->set_flashdata('message', $this->entity . ' was deleted successfully.');
        $this->session->set_flashdata('msg_class', 'success_message');
        redirect($this->gen_contents['paths']['list']);
    }
    
    public function view() {
        $id = strip_quotes(strip_tags(trim($this->uri->segment(3))));
        $this->gen_contents['title'] = $this->gen_contents['site_name'] . ': Edit enquiry';
        $this->gen_contents['page_title'] = 'Edit enquiry';
        $this->gen_contents['leftmenu_selected'] = 'enquiries';
        $this->gen_contents['dynamic_views'][] = $this->config->item('pages') . 'enquiries/view';
        $this->gen_contents['countries'] = prepareOptionList($this->country->get(), array('key' => 'id', 'value' => 'country'));
        $this->gen_contents['enquiry_modes'] = prepareOptionList($this->enquirymode->get(), array('key' => 'id', 'value' => 'mode_name'));
        $this->gen_contents['publicity_sources'] = prepareOptionList($this->publicitysource->get(), array('key' => 'id', 'value' => 'source'));
        $this->gen_contents['enquiry_details'] = $this->enquiry->getForEdit($id);
        $this->load->view($this->config->item('common_page') . 'template', $this->gen_contents);
    }
    
    protected function __setFormValidationRules($newEnquiryFlag=0){
        $this->form_validation->set_rules('email_id', 'Email', 'required|trim|xss_clean|valid_email');
        $this->form_validation->set_rules('firstName', 'First Name', 'required|trim|xss_clean');
        $this->form_validation->set_rules('lastName', 'Last Name', 'required|trim|xss_clean');
        $this->form_validation->set_rules('pincode', 'Pin Code', 'required|trim|xss_clean');
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim|xss_clean');
        if($newEnquiryFlag) {
           $this->form_validation->set_rules('followUpTitle', 'Follow Up Title', 'required|trim|xss_clean');
            $this->form_validation->set_rules('followUpDescription', 'Follow Up Description', 'required|trim|xss_clean');
        }
    }

}
