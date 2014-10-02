<?php
class Enquirycoursesinterested_model extends Parent_model {
    public function __construct() {
        parent::__construct();
        $this->table = 'enquiry_course_interested';
    }
    
    public function deleteByEnquiryId($enquiryId) {
        $query = 'DELETE FROM '.table.' WHERE enquiry_id=\''.$enquiryId.'\'';
        $this->db->query($query);
    }
}
?>
