<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Departments extends CI_Controller {

    public function Departments() {
        parent::__construct();
        $this->gen_contents['site_name'] = $this->config->item('site_name');
        $this->gen_contents['dynamic_views'] = array();
        $this->gen_contents['load_css'] = array("prospera.css", "dcaccordion.css", "skins/graphite.css");
        $this->gen_contents['load_js'] = array("jquery-1.9.1.js", "jquery.cookie.js", "jquery.hoverIntent.minified.js", "jquery.dcjqaccordion.2.7.min.js", "prospera.js");
        $this->load->model('departments_model');
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $this->load->helper('form');
	$this->load->helper('url');
    }

    /**
     * list all departments
     */
    public function index() {
        $this->gen_contents['title']                = $this->gen_contents['site_name'] . ': Departments';
        $this->gen_contents['page_title']           = 'Departments';
        $this->gen_contents['leftmenu_selected']    = 'departments';
        
        // get all departments
        $this->gen_contents['departments']          = $this->departments_model->getAllDepartments();
        $this->gen_contents['dynamic_views'][]      = $this->config->item('pages').'departments';
        $this->load->view($this->config->item('common_page') . 'template', $this->gen_contents);
    }
    
    /**
     * delete a department
     */
    public function delete($id){
        if($id){
            $isDeleted  = $this->departments_model->deleteDepartment($id);
            if($isDeleted){
                $this->session->set_flashdata('message', "Department added successfully.");
                $this->session->set_flashdata('success_message', 'success_message');
                redirect('departments');                
            }
        }
    }
    
    /**
     * add a department
     */
    public function add(){
        if($_POST){
            $this->form_validation->set_rules('department_name', 'Department Name', 'required|trim|xss_clean|max_length[50]');			            
            $this->form_validation->set_rules('description', 'Description', 'xss_clean|max_length[100]');
            $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
            if ($this->form_validation->run() == FALSE){
                $this->session->set_flashdata('message', validation_errors());
                $this->session->set_flashdata('msg_class', 'error_message');
                redirect('departments/add');
            }else{
                // build array for the model
                $formData = array(
                                    'dept_name' => set_value('department_name'),
                                    'description' => set_value('description')
                                    );

                if ($this->departments_model->saveDepartment($formData) == TRUE){
                        $this->session->set_flashdata('message', 'Department was added successfully.');
                        $this->session->set_flashdata('msg_class', 'success_message');
                        redirect('departments');                    
                }else{
                    $this->session->set_flashdata('message', 'There was some problem in adding the department.');
                    $this->session->set_flashdata('msg_class', 'error_message');
                    redirect('departments/add');                    
                }
            }            
        }
        $this->gen_contents['title']                = $this->gen_contents['site_name'] . ': Departments';
        $this->gen_contents['page_title']           = 'Add Departments';
        $this->gen_contents['leftmenu_selected']    = 'departments';        
        $this->gen_contents['dynamic_views'][]      = $this->config->item('pages').'adddepartment';
        $this->load->view($this->config->item('common_page') . 'template', $this->gen_contents);        
    }
}
