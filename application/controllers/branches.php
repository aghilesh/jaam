<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Branches extends CI_Controller {

    public function Branches() {
        parent::__construct();
        $this->gen_contents['site_name'] = $this->config->item('site_name');
        $this->gen_contents['dynamic_views'] = array();
        $this->load->library('pagination');
    }

    public function index() {
        $this->gen_contents['title']                = $this->gen_contents['site_name'] . ': branches';
        $this->gen_contents['page_title']           = 'Branches';
        $this->gen_contents['leftmenu_selected']    = 'branches';
        $this->gen_contents['dynamic_views'][]      = $this->config->item('pages') . 'branches';
        $this->load->view($this->config->item('common_page') . 'template', $this->gen_contents);
    }
}
