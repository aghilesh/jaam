<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Departments extends CI_Controller {

    public function Departments() {
        parent::__construct();
        $this->gen_contents['site_name'] = $this->config->item('site_name');
        $this->gen_contents['dynamic_views'] = array();
        $this->load->library('pagination');
    }

    public function index() {
        $this->gen_contents['title']                = $this->gen_contents['site_name'] . ': Departments';
        $this->gen_contents['page_title']           = 'Departments';
        $this->gen_contents['leftmenu_selected']    = 'departments';
        $this->gen_contents['dynamic_views'][]      = $this->config->item('pages').'departments';
        $this->load->view($this->config->item('common_page') . 'template', $this->gen_contents);
    }
}
