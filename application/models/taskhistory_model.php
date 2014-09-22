<?php

class Taskhistory_model extends parent_model {

    public function __construct() {
        parent::__construct();
        $this->table = 'task_history';
    }
     public function getTaskHistoryList($taskId=''){
        $this->db->from($this->table);
        $this->db->order_by("created_date", "desc");
        $this->db->where("task_id",$taskId);
        $query = $this->db->get(); 
        return $query->result();
    }
}

?>
