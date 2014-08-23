<?php
class Enquiry_model extends Parent_model {
    public function __construct() {
        parent::__construct();
        $this->load->model('enquirymaster_model', 'enquiryMaster');
        $this->load->model('enquiryeducation_model', 'enquiryEducation');
        $this->load->model('enquirycoursesinterested_model', 'enquiryCoursesInterested');
        $this->load->model('enquirytestprepare_model', 'enquiryTestPrepare');
    }
    
    public function insert($data) {
        $this->enquiryMaster->insert($data['enquirymaster']);
        $enquiryId = $this->db->insert_id();
        for($i=0;$i<sizeof($data['education']); $i++) {
         $data['education'][$i]['enquiry_id'] = $enquiryId;
         $this->enquiryEducation->insert($data['education'][$i]);
        }
        for($i=0;$i<sizeof($data['courses']); $i++) {
         $data['courses'][$i]['enquiry_id'] = $enquiryId;
         $this->enquiryCoursesInterested->insert($data['courses'][$i]);
        }
        for($i=0;$i<sizeof($data['test_prepare']); $i++) {
         $data['test_prepare'][$i]['enquiry_id'] = $enquiryId;
         $this->enquiryTestPrepare->insert($data['test_prepare'][$i]);
        }
        return 1;
    }
    
    public function get($id='') {
        return $this->enquiryMaster->get($id);
    }
}
?>