<?php

class Dashboard_model extends parent_model {

    public function __construct() {
        parent::__construct();
        $this->todayDate = date('Y-m-d');
        $this->now = date('Y-m-d H:i:s');
    }
    
    public function getTodaysEnquiryCount($userId=''){
        $this->db->from('enquiry_master');
        $this->db->where("date >=",$this->todayDate.' 00:00:00');
        $this->db->where("date <=",$this->todayDate.' 23:59:59');
        if($userId){
            $this->db->where("user_id",$userId);
        }
        $query = $this->db->get(); 
        return $query->num_rows();
    }
    public function getTodaysRegistrationCount($userId=''){
        $this->db->from('registration_master');
        $this->db->where("date >=",$this->todayDate.' 00:00:00');
        $this->db->where("date <=",$this->todayDate.' 23:59:59');
        if($userId){
            $this->db->where("user_id",$userId);
        }
        $query = $this->db->get(); 
        return $query->num_rows();
    }
    
    public function getTodaysTaskCount($userId=''){
        $this->db->from('task');
        $this->db->where("when >=",$this->todayDate.' 00:00:00');
        $this->db->where("when <=",$this->todayDate.' 23:59:59');
        $this->db->where("status !=",2);
        if($userId){
            $this->db->where("assigned_to",$userId);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function getPendingTaskCount($userId=''){
        $this->db->from('task');
        $this->db->where("when <=",$this->now);
        $this->db->where("status !=",2);
        if($userId){
            $this->db->where("assigned_to",$userId);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function getReopenedTaskCount($userId=''){
        $this->db->from('task');
        $this->db->where("status",4);
        if($userId){
            $this->db->where("assigned_to",$userId);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }
    
}

?>
