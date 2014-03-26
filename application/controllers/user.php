<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    public function User() {
        parent::__construct();
        $this->gen_contents['site_name'] = $this->config->item('site_name');
        $this->gen_contents['dynamic_views'] = array();
        $this->load->library('pagination');
    }

    public function index() {
        $this->gen_contents['title']                = $this->gen_contents['site_name'] . ': user';
        $this->gen_contents['page_title']           = 'User';
        $this->gen_contents['leftmenu_selected']    = 'user';
        $this->gen_contents['dynamic_views'][]      = $this->config->item('pages') . 'user';
        $this->load->view($this->config->item('common_page') . 'template', $this->gen_contents);
    }
}
