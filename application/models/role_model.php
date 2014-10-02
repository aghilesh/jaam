<?php

class Role_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->table = 'user_role';
    }

    /**
     * Insert record
     */
    public function insert($formData) {
        $this->db->insert($this->table, $formData);
        return ($this->db->affected_rows() == '1') ? TRUE : FALSE;
    }

    /**
     * Update Record
     */
    public function update($formData, $id) {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $formData);
    }

    /**
     * Delete record
     */
    public function delete($id) {
        return $this->db->delete($this->table, array('id' => $id));
    }

    /**
     * All the records
     */
    public function get($id = '') {
        $this->db->select('*');
        if ($id) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get($this->table);
        return ($id) ? $query->row() : $query->result();
    }
    
    public function getAllRoles(){
        $query = $this->db->get('user_role');
        return $query->result();
    }
    
    public function getAllModules(){
        $query = $this->db->get('modules');
        return $query->result();  
    }
    
    public function savePermission($roleId, $permission, $module){
        $this->db->insert('role_permission', array('role_id'=>  intval($roleId), 'permission'=>  trim($permission), 'module'=>trim($module)));
        return ($this->db->affected_rows() == '1') ? TRUE : FALSE;
    }
    
    public function getSetPermissions(){
        $this->db->select('id, permission');    
        $query = $this->db->get('role_permission');
        return $query->result_array();
    }
    
    public function deleteAllPermissions(){
        return $this->db->empty_table('role_permission'); 
    }

}

?>
