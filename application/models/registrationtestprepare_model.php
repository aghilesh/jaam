<?php
class Registrationtestprepare_model extends Parent_model {
    public function __construct() {
        parent::__construct();
        $this->table = 'reg_test_preparation';
    }
    
    public function deleteByRegId($regId) {
        $query = 'DELETE FROM '.table.' WHERE reg_id=\''.$regId.'\'';
        $this->db->query($query);
    }
}
?>
