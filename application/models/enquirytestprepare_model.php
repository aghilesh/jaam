<?php
class Enquirytestprepare_model extends Parent_model {
    public function __construct() {
        parent::__construct();
        $this->table = 'enqury_test_prepare';
    }
    
    public function deleteByEnquiryId($enquiryId) {
        $query = 'DELETE FROM '.table.' WHERE enquiry_id=\''.$enquiryId.'\'';
        $this->db->query($query);
    }
}
?>
