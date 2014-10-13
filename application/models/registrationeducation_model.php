<?php
class Registrationeducation_model extends Parent_model {
    public function __construct() {
        parent::__construct();
        $this->table = 'reg_education';
    }
    
    public function deleteByRegId($regId) {
        $query = 'DELETE FROM '.table.' WHERE reg_id=\''.$regId.'\'';
        $this->db->query($query);
    }
            
}
?>
