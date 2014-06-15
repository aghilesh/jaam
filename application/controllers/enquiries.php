<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Enquiries extends CI_Controller {

    public function Enquiries() {
        parent::__construct();
        $this->gen_contents['site_name'] = $this->config->item('site_name');
        $this->gen_contents['dynamic_views'] = array();
        $this->load->library('pagination');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->helper('url');
        
        $this->load->model('enquirymode_model','enquirymode');
        $this->load->model('publicitysource_model','publicitysource');
        
        
        
        $this->gen_contents['dynamic_views'] = array();
        $this->gen_contents['load_css'] = array();
        $this->gen_contents['load_js'] = array();

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
        $this->gen_contents['title']                = $this->gen_contents['site_name'] . ': Enquiries';
        $this->gen_contents['page_title']           = 'Enquiries';
        $this->gen_contents['leftmenu_selected']    = 'enquiries';
        $this->gen_contents['dynamic_views'][]      = $this->config->item('pages') . 'enquiries';
        $this->load->view($this->config->item('common_page') . 'template', $this->gen_contents);
    }
    
    public function add() {
        $this->gen_contents['title']                = $this->gen_contents['site_name'] . ': Add new enquiry';
        $this->gen_contents['page_title']           = 'Add new enquiry';
        $this->gen_contents['leftmenu_selected']    = 'enquiries';
        $this->gen_contents['dynamic_views'][]      = $this->config->item('pages') . 'enquiries/add';
        $this->gen_contents['countries']            = prepareOptionList($this->country->get(),array('key'=>'id','value'=>'country'));
        $this->gen_contents['enquiry_modes']        = prepareOptionList($this->enquirymode->get(),array('key'=>'id','value'=>'mode_name'));
        $this->gen_contents['publicity_sources']    = prepareOptionList($this->publicitysource->get(),array('key'=>'id','value'=>'source'));
        
        
        
        $this->load->view($this->config->item('common_page') . 'template', $this->gen_contents);
    }
}
