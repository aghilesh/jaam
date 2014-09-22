<?php

class Task_model extends parent_model {

    public function __construct() {
        parent::__construct();
        $this->table = 'task';
    }
    
    public function getOwnedTaskList($userId=''){
        $this->db->from($this->table);
        $this->db->order_by("when", "asc");
        $this->db->where("assigned_by",$userId);
        $query = $this->db->get(); 
        return $query->result();
    }
    public function getAssignedTaskList($userId=''){
        $this->db->from($this->table);
        $this->db->order_by("when", "asc");
        $this->db->where("assigned_to",$userId);
        $this->db->where("status !=",2);
        $query = $this->db->get(); 
        return $query->result();
    }
}

?>
