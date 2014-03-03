<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    public function Home() {
        parent::__construct();
        $this->gen_contents['load_css'] = array("dcaccordion.css", "skins/blue.css", "skins/graphite.css", "skins/grey.css");
        $this->gen_contents['load_js'] = array("jquery-1.9.1.js", "jquery.cookie.js","jquery.hoverIntent.minified.js", "jquery.dcjqaccordion.2.7.min.js");
        $this->gen_contents['site_name'] = $this->config->item('site_name');
        $this->load->library('pagination');
    }

    public function index() {
        $this->gen_contents['title'] = $this->gen_contents['site_name'] . ': Home page';
        $this->load->view($this->config->item('pages') . 'home', $this->gen_contents);
        //$this->load->view($this->config->item('site_page') . 'header', $this->gen_contents);
        //$this->load->view('user/user_home', $data);
        //$this->load->view($this->config->item('site_page') . 'footer');
    }

}
