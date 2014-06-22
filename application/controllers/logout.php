<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Logout extends CI_Controller {

    public function Logout() {
        parent::__construct();
    }

    public function index() {
        $this->_LogoutAction();
    }

    function _LogoutAction() {
        ($this->authentication->logout()) ? redirect('') : '';
    }

}
