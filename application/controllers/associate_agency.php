<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Associate_agency extends CI_Controller {

    public function Associate_agency() {
        parent::__construct();
        $this->gen_contents['site_name'] = $this->config->item('site_name');
        $this->gen_contents['dynamic_views'] = array();
        $this->load->library('pagination');
    }

    public function index() {
        $this->gen_contents['title']                = $this->gen_contents['site_name'] . ': associate_agency';
        $this->gen_contents['page_title']           = 'Associate Agency';
        $this->gen_contents['leftmenu_selected']    = 'associate_agency';
        $this->gen_contents['dynamic_views'][]      = $this->config->item('pages') . 'associate_agency';
        $this->load->view($this->config->item('common_page') . 'template', $this->gen_contents);
    }
}
