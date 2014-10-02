<?php
class Enquiryeducation_model extends Parent_model {
    public function __construct() {
        parent::__construct();
        $this->table = 'enruiry_education';
    }
    
    public function deleteByEnquiryId($enquiryId) {
        $query = 'DELETE FROM '.table.' WHERE enquiry_id=\''.$enquiryId.'\'';
        $this->db->query($query);
    }
            
}
?>
