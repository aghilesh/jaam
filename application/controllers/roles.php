<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Roles extends CI_Controller {

    public function Roles() {
        parent::__construct();

        (!$this->authentication->check_logged_in()) ? redirect('') : '';

        $this->load->model('role_model', 'role');
        $this->gen_contents['site_name'] = $this->config->item('site_name');
        $this->gen_contents['dynamic_views'] = array();
        $this->load->library('pagination');
    }

    public function index() {
        if($_POST){
            $permissionPost = $_POST;
            unset($permissionPost['submit']);
            
            // delete all permissions
            $this->role->deleteAllPermissions();
            $rolesDefined   = array_keys($permissionPost);
            if(!empty($rolesDefined)){
                // get the defined role id's
                for($i = 0; $i < count($rolesDefined); $i++){
                    // iterate each permission set of a particular role
                    $permissionSet  = $permissionPost[$rolesDefined[$i]];  //echo '<pre>'; print_r($permissionSet); die;
                    foreach($permissionSet as $key => $value){ echo $key.'='.$value; echo "<br>";
                        // save all the set of permissions
                        $saved  = $this->role->savePermission($rolesDefined[$i], $key, str_replace(array('add', 'edit', 'delete'), array('', '', ''), $value));
                    } 
                }
                $this->session->set_flashdata('message', 'The permissions were saved successfully.');
                $this->session->set_flashdata('msg_class', 'success_message');
                redirect('roles');                
            }
        }
        
        // get all set permissions
        $this->gen_contents['modulesPermissions']   =  '';
        $this->gen_contents['title']                = $this->gen_contents['site_name'] . ': roles';
        $this->gen_contents['page_title']           = 'User Roles';
        $this->gen_contents['leftmenu_selected']    = 'roles';
        $this->gen_contents['roles']                = $this->role->getAllRoles();
        $this->gen_contents['modules']              = $this->role->getAllModules();
        $this->gen_contents['dynamic_views'][]      = $this->config->item('pages') . 'roles';
        $this->load->view($this->config->item('common_page') . 'template', $this->gen_contents);
    }

}
