<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Country extends CI_Controller {

    public function Country() {
        parent::__construct();
        $this->gen_contents['site_name'] = $this->config->item('site_name');
        $this->gen_contents['dynamic_views'] = array();
        $this->load->library('pagination');
    }

    public function index() {
        $this->gen_contents['title']                = $this->gen_contents['site_name'] . ': country';
        $this->gen_contents['page_title']           = 'Country';
        $this->gen_contents['leftmenu_selected']    = 'country';
        $this->gen_contents['dynamic_views'][]      = $this->config->item('pages') . 'country';
        $this->load->view($this->config->item('common_page') . 'template', $this->gen_contents);
    }
}
