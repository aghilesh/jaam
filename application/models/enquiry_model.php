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
    
    public function getForEdit($id='') {
        $returnArr = array();
        $enquiryMainDetailsSql = 'SELECT TP.*, TP.id AS tp_id, em.*, EM.id AS enquiry_id FROM enquiry_master EM LEFT JOIN enqury_test_prepare TP 
            ON(EM.id=TP.enquiry_id) WHERE EM.id=\''.$id.'\'';
        $query = $this->db->query($enquiryMainDetailsSql);
        $result = $query->result();
        $returnArr['enquiryMain'] = $result[0];
        
        
        $enquiryEducationDetailsSql = 'SELECT EE.*, EE.id AS ee_id FROM enruiry_education EE WHERE EE.enquiry_id=\''.$id.'\'';
        $query = $this->db->query($enquiryEducationDetailsSql);
        $result = $query->result();
        $returnArr['educationDetails'] = $result;
        
        $enquiryCourseInterestSql = 'SELECT EC.*, EC.id AS ec_id FROM enquiry_course_interested EC WHERE EC.enquiry_id=\''.$id.'\'';
        $query = $this->db->query($enquiryCourseInterestSql);
        $result = $query->result();
        $returnArr['courseInterestDetails'] = $result;
        
        return $returnArr;
    }
}
?>