<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

///////////////////////////////////////////////////////////////////////////

/**
 * Function to load JS files
 *
 * @param $load_js Array
 * @return STRING
 */
function load_js($load_js) {
    if (isset($load_js) && is_array($load_js)) {
        $js_files = '';
        foreach ($load_js as $files) {
            $js_files .= '<script type="text/javascript" src="' . base_url() . 'js/' . $files . '"></script>';
        }
        return $js_files;
    }
}

/**
 * Function to load CSS files.
 *
 * @param $load_css Array
 * @return STRING
 */
function load_css($load_css) {
    if (isset($load_css) && is_array($load_css)) {
        $css_files = '';
        foreach ($load_css as $files) {
            $css_files .= '<link type="text/css" rel="stylesheet" href="' . base_url() . 'css/' . $files . '"  />';
        }
        return $css_files;
    }
}

/**
 * check if data exists in db
 */
function isDataExists($tableName, $id, $key) {
    $ci = & get_instance();
    $ci->load->database();
    if ($tableName && $id && $key) {
        $query = $ci->db->get_where($tableName, array($key => $id));
        return ($query->num_rows()) ? true : false;
    }
    return false;
}

function isSelected($uriSegment, $current) {
    return ($uriSegment == $current) ? 'selected' : '';
}

function prepareOptionList($list,$fields = array(),$exclude=''){
    $ret = array();
    if($list && $fields['key'] && $fields['value']){
        foreach($list as $item){
            if($item->$fields['key'] != $exclude){
                $ret[$item->$fields['key']] = $item->$fields['value'];
            }
        }
    }
    return $ret;
}

function getCountryName($id){
    $ci = & get_instance();
    $ci->load->model('country_model', 'country');
    return $ci->country->get($id)->country;
}

function getUserName($id){
    $ci = & get_instance();
    $ci->load->model('user_model', 'user');
    return $ci->user->get($id)->first_name;
}

function getBranchName($id){
    $ci = & get_instance();
    $ci->load->model('branch_model', 'branch');
    return ($ci->branch->get($id)) ? @$ci->branch->get($id)->branch_name : '';
}

function getDepartmentName($id){
    $ci = & get_instance();
    $ci->load->model('department_model', 'department');
    return $ci->department->get($id)->dept_name;
}
function get_encr_password($password) {
    $pass = md5($password);
    return substr(md5($pass . 'prospera'), 0, 50);
}

function isAllowedPermission($role, $permission){
    $ci = & get_instance();
    $query = $ci->db->get_where('role_permission', array('id' => $role, 'permission' => $permission));
    return ($query->num_rows() >= 1)?true:false;
}

function getEnquiryMode($modeId) {
    $ci = & get_instance();
    $ci->load->model('enquirymode_model', 'enquirymode');
    return $ci->enquirymode->get($modeId)->mode_name;
}

function getFormattedName($name) {
    return implode(' ', array($name['FNAME'],$name['LNAME']));
}

function getFieldValue($fieldName, $defValue) {
    return $_POST && array_key_exists($fieldName, $_POST) ? $_POST[$fieldName] : $defValue;
}
?>