<?php
class Enquiry_model extends Parent_model {
    public function __construct() {
        parent::__construct();
        $this->load->model('enquirymaster_model', 'enquiryMaster');
        $this->load->model('enquiryeducation_model', 'enquiryEducation');
        $this->load->model('enquirycoursesinterested_model', 'enquiryCoursesInterested');
        $this->load->model('enquirytestprepare_model', 'enquiryTestPrepare');
        $this->load->model('enquiryfollowup_model', 'followUp');
        $this->load->model('task_model', 'task');
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
        /*for($i=0;$i<sizeof($data['test_prepare']); $i++) {
         $data['test_prepare'][$i]['enquiry_id'] = $enquiryId;
         $this->enquiryTestPrepare->insert($data['test_prepare'][$i]);
        }*/
        
        for($i=0;$i<sizeof($data['followUp']); $i++) {
            $data['followUp'][$i]['ref_id'] = $enquiryId;
            $this->task->insert($data['followUp'][$i]);
        }
        return 1;
    }
    
    public function update($data, $enquiryId) {
        $this->enquiryMaster->update($data['enquirymaster'], $enquiryId);
        //$this->enquiryTestPrepare->update($data['test_prepare'][0], $data['testPrepareId']);
        
        /*Updating education details and removing unwanted education data - start*/
        $existingEduIds = array();
        for($i=0;$i<sizeof($data['education']); $i++) {
            if(array_key_exists('id',$data['education'][$i]) && $data['education'][$i]['id']) {
                $existingEduIds[] = $data['education'][$i]['id'];
                $this->enquiryEducation->update($data['education'][$i],$data['education'][$i]['id']);
            } else {
                $this->enquiryEducation->insert($data['education'][$i]);
                $existingEduIds[] = $this->db->insert_id();
            }
        }
        $query = 'DELETE FROM '.$this->enquiryEducation->table.' WHERE id NOT IN('.implode(',',$existingEduIds).') AND enquiry_id=\''.$enquiryId.'\'';
        $this->db->query($query);
        /*Updating education details and removing unwanted education data - end*/
        
        /*Updating courses interested details and removing unwanted courses intersted data - start*/
        $existingCourseIds = array();
        for($i=0;$i<sizeof($data['courses']); $i++) {
            if(array_key_exists('id',$data['courses'][$i]) && $data['courses'][$i]['id']) {
                $existingCourseIds[] = $data['courses'][$i]['id'];
                $this->enquiryCoursesInterested->update($data['courses'][$i],$data['courses'][$i]['id']);
            } else {
                $this->enquiryCoursesInterested->insert($data['courses'][$i]);
                $existingCourseIds[] = $this->db->insert_id();
            }
        }
        $query = 'DELETE FROM '.$this->enquiryCoursesInterested->table.' WHERE id NOT IN('.implode(',',$existingCourseIds).') AND enquiry_id=\''.$enquiryId.'\'';
        $this->db->query($query);
        /*Updating courses interested details and removing unwanted courses intersted data - end*/
        
        /*Updating test preparation details - start*/
        /*for($i=0;$i<sizeof($data['test_prepare']); $i++) {
         $this->enquiryTestPrepare->update($data['test_prepare'][$i],$data['testPrepareId']);
        }*/
        /*Updating test preparation details - end*/
        return true;
    }
    
    public function get($id='') {
        return $this->enquiryMaster->get($id);
    }
    
    public function getForEdit($id='') {
        $returnArr = array();
        $enquiryMainDetailsSql = 'SELECT em.*, EM.id AS enquiry_id FROM enquiry_master EM WHERE EM.id=\''.$id.'\'';
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
        
        $followUpSql = 'SELECT T.*, T.id AS task_id FROM task T WHERE T.ref_id=\''.$id.'\' AND T.ref_type=\'E\'';
        $query = $this->db->query($followUpSql);
        $result = $query->result();
        $returnArr['followUp'] = $result ? $result[0] : '';
        
        return $returnArr;
    }
    
    public function delete($enquiryId) {
        $this->enquiryMaster->delete($enquiryId);
        $this->enquiryEducation->deleteByEnquiryId($enquiryId);
        $this->enquiryCoursesInterested->deleteByEnquiryId($enquiryId);
        //$this->enquiryTestPrepare->deleteByEnquiryId($enquiryId);
        $deleteTaskSql = 'DELETE FROM task WHERE ref_id=\''.$regId.'\' AND ref_type=\'E\'';
        $this->db->query($deleteTaskSql);
    }
}
?>