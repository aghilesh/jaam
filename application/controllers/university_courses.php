<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class University_courses extends CI_Controller {

    public function University_courses() {
        parent::__construct();
        $this->gen_contents['site_name'] = $this->config->item('site_name');
        $this->gen_contents['dynamic_views'] = array();
        $this->load->library('pagination');
    }

    public function index() {
        $this->gen_contents['title']                = $this->gen_contents['site_name'] . ': university_courses';
        $this->gen_contents['page_title']           = 'University Courses';
        $this->gen_contents['leftmenu_selected']    = 'university_courses';
        $this->gen_contents['dynamic_views'][]      = $this->config->item('pages') . 'university_courses';
        $this->load->view($this->config->item('common_page') . 'template', $this->gen_contents);
    }
}
