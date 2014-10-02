<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    public function Home() {
        parent::__construct();

        (!$this->authentication->check_logged_in()) ? redirect('') : '';
        
        $this->load->model('dashboard_model', 'dashboard');
        
        $this->gen_contents['site_name'] = $this->config->item('site_name');
        $this->gen_contents['page_title'] = 'Dashboard';
        $this->gen_contents['title'] = $this->gen_contents['site_name'] . ' : ' . $this->gen_contents['page_title'];
        $this->gen_contents['leftmenu_selected'] = 'dashboard';
        
        $this->gen_contents['dynamic_views'] = array();
        $this->gen_contents['load_css'] = array('dashboard.css');
        $this->gen_contents['load_js'] = array();
        $this->load->library('pagination');
        
        $loggedUser = $this->authentication->getUserInfo();
        $this->USER_ID = $loggedUser['USER_ID'];
        $this->ROLE_ID = $loggedUser['ROLE_ID'];
    }

    public function index() {
        //ADMIN_ROLE_ID is defined in application/constants.php
        
        $filterUserId = (ADMIN_ROLE_ID == $this->ROLE_ID) ? '' : $this->USER_ID;
        $this->gen_contents['todaysEnquiryCount'] = $this->dashboard->getTodaysEnquiryCount($filterUserId);
        $this->gen_contents['todaysRegistrationCount'] = $this->dashboard->getTodaysRegistrationCount($filterUserId);
        $this->gen_contents['todaysTaskCount'] = $this->dashboard->getTodaysTaskCount($filterUserId);
        $this->gen_contents['pendingTaskCount'] = $this->dashboard->getPendingTaskCount($filterUserId);
        $this->gen_contents['reopenedTaskCount'] = $this->dashboard->getReopenedTaskCount($filterUserId);
        
        $this->gen_contents['title'] = $this->gen_contents['site_name'] . ': Home page';
        $this->gen_contents['dynamic_views'][] = $this->config->item('pages') . 'dashboard/user';
        $this->load->view($this->config->item('common_page') . 'template', $this->gen_contents);
    }

}
