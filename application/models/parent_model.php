<?php
class Parent_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
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
    
    public function getDuplication($fields=Array(),$id=''){
        $this->db->select('*');
        if($fields)
        {
            $or_condition = '(';
            $or_inside = array();
            foreach ($fields as $k=>$v)
            {
                $or_inside[] = $k.'=\''.$v.'\'';
            }
            $or_condition .= implode(' OR ',$or_inside);
            $or_condition .= ')';

            if($or_inside)
            {
                $this->db->where($or_condition);
            }
        }
        if($id)
        {
            $this->db->where('id != ',$id);
        }
        $query = $this->db->get($this->table);
        
        return $query->result();
    }

}
?>
