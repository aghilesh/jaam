<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 * Project		Omega
 * @package		CodeIgniter
 * @author		Remya Rain
 * @since		Version 1.0
 * @copyright           Rain Concert Technologies Pvt Ltd, Trivandrum, Kerala, India.(http://rainconcert.in)
 * @filesource
 */
// ------------------------------------------------------------------------

class Authentication {

    var $CI = null;

    function Authentication() {
        $this->CI = & get_instance();
    }

    //check wheteher the user is logged in or not
    function check_logged_in($type = '', $status = '') {
        if (!$this->CI->session->userdata('USER_ID')) {
            return FALSE;
        }
        return TRUE;
    }

    
    function login($login = NULL) {

        if (!is_array($login) || 0 >= count($login)) {
            return FALSE;
        }

        $username = $login['username'];
        $password = $login['password'];

        $this->CI->db->select('user_name, email_id, id, first_name, last_name, CONCAT_WS(" ", first_name, last_name) AS name', false);
        $this->CI->db->where('user_name', $username);
        $password = $this->CI->db->escape_like_str($password);
        //$this->CI->db->where("password", get_encr_password($password));
        $this->CI->db->where("password", $password);
        $user_query = $this->CI->db->get('user');

        if (0 < $user_query->num_rows()) {
            $user_data = $user_query->row();

            $session_data = array(
                'USER_ID' => $user_data->id,
                'USERNAME' => $user_data->user_name,
                'EMAIL' => $user_data->email_id,
                'FIRST_NAME' => $user_data->first_name,
                'LAST_NAME' => $user_data->last_name,
                'FULL_NAME' => $user_data->name,
            );
            $this->CI->session->set_userdata($session_data);
            return TRUE;
        }
        return FALSE;
    }

    
    function logout() {
        $session_data = array(
            'USER_ID' => '',
            'USERNAME' => '',
            'FRANCHISEE_ID' => '',
            'EMAIL' => '',
            'FIRST_NAME' => '',
            'LAST_NAME' => '',
            'FULL_NAME' => '',
            'USER_TYPE' => '',
            'STATUS' => '',
        );
        $this->CI->session->unset_userdata($session_data);
        return TRUE;
    }

    /**
     * Function for checking the permission of the logged in user
     * 
     * @param type $user_type
     * @return boolean 
     */
    function userHasAccess($user_type = '', $session_need = '') {
        if (is_array($user_type)) {
            if (!in_array(s('USER_TYPE'), $user_type)) {
                return FALSE;
            }
        } elseif (s('USER_TYPE') != trim($user_type)) {
            return FALSE;
        }

        if ($session_need) {
            if (is_array($session_need)) {
                foreach ($session_need as $session) {
                    if (!s($session)) {
                        return FALSE;
                    }
                }
            } elseif (!s($session_need)) {
                return FALSE;
            }
        }
        return TRUE;
    }

    /**
     * function for getting the franchisee details
     * 
     * @param type $franchisee_id
     * @return type 
     */
    function get_franchisee_details($franchisee_id) {
        if ($franchisee_id) {
            $this->CI->db->select('*');
            $this->CI->db->where('franchisee_id', $franchisee_id);
            $this->CI->db->where('status', 1);
            $query = $this->CI->db->get('franchisee_details');
            if (0 < $query->num_rows()) {
                return $query->row();
            }
        }
        return FALSE;
    }
    
    function getUserInfo($param=''){
        $userData = $this->CI->session->userdata;
        if(!$param) return $userData;
        $map_arr = array("id"=>"USER_ID","name"=>"FULL_NAME","username"=>"USERNAME");
        return $userData[$map_arr[$param]];
    }

}
