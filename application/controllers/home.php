<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    public function Home() {
        parent::__construct();

        (!$this->authentication->check_logged_in()) ? redirect('') : '';

        $this->gen_contents['site_name'] = $this->config->item('site_name');
        $this->gen_contents['page_title'] = 'Dashboard';
        $this->gen_contents['title'] = $this->gen_contents['site_name'] . ' : ' . $this->gen_contents['page_title'];
        $this->gen_contents['leftmenu_selected'] = 'dashboard';
        
        $this->gen_contents['dynamic_views'] = array();
        $this->gen_contents['load_css'] = array();
        $this->gen_contents['load_js'] = array();
        $this->load->library('pagination');
    }

    public function index() {
        $this->gen_contents['title'] = $this->gen_contents['site_name'] . ': Home page';
        $this->gen_contents['dynamic_views'][] = $this->config->item('pages') . 'dashboard/user';
        $this->load->view($this->config->item('common_page') . 'template', $this->gen_contents);
    }

}
