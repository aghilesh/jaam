<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    public function Home() {
        parent::__construct();
        $this->gen_contents['site_name'] = $this->config->item('site_name');
        $this->gen_contents['dynamic_views'] = array();
        $this->gen_contents['load_css'] = array("prospera.css", "dcaccordion.css", "skins/graphite.css");
        $this->gen_contents['load_js'] = array("jquery-1.9.1.js", "jquery.cookie.js", "jquery.hoverIntent.minified.js", "jquery.dcjqaccordion.2.7.min.js", "prospera.js");        
        $this->load->library('pagination');
    }

    public function index() {
        $this->gen_contents['title'] = $this->gen_contents['site_name'] . ': Home page';
        $this->gen_contents['dynamic_views'][] = $this->config->item('pages').'home';
        $this->load->view($this->config->item('common_page') . 'template', $this->gen_contents);
    }
}
