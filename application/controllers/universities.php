<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Universities extends CI_Controller {

    public function Universities() {
        parent::__construct();
        $this->gen_contents['site_name'] = $this->config->item('site_name');
        $this->gen_contents['dynamic_views'] = array();
        $this->load->library('pagination');
    }

    public function index() {
        $this->gen_contents['title']                = $this->gen_contents['site_name'] . ': Universities';
        $this->gen_contents['page_title']           = 'Universities';
        $this->gen_contents['leftmenu_selected']    = 'universities';
        $this->gen_contents['dynamic_views'][]      = $this->config->item('pages').'universities';
        $this->load->view($this->config->item('common_page') . 'template', $this->gen_contents);
    }
}
