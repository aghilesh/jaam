<?php
class Registration_model extends Parent_model {
    public function __construct() {
        parent::__construct();
        $this->load->model('registrationmaster_model', 'registrationMaster');
        $this->load->model('registrationeducation_model', 'registrationEducation');
        $this->load->model('registrationcoursesinterested_model', 'registrationCoursesInterested');
        $this->load->model('registrationtestprepare_model', 'registrationTestPrepare');
        $this->load->model('registrationfollowup_model', 'followUp');
        $this->load->model('task_model', 'task');
    }
    
    public function insert($data) {
        $data['registrationMaster']['status'] = '1';
        $this->registrationMaster->insert($data['registrationMaster']);
        $regId = $this->db->insert_id();
        for($i=0;$i<sizeof($data['education']); $i++) {
         $data['education'][$i]['reg_id'] = $regId;
         $this->registrationEducation->insert($data['education'][$i]);
        }
        for($i=0;$i<sizeof($data['courses']); $i++) {
         $data['courses'][$i]['reg_id'] = $regId;
         $this->registrationCoursesInterested->insert($data['courses'][$i]);
        }
        for($i=0;$i<sizeof($data['test_prepare']); $i++) {
         $data['test_prepare'][$i]['reg_id'] = $regId;
         $this->registrationTestPrepare->insert($data['test_prepare'][$i]);
        }
        
        for($i=0;$i<sizeof($data['followUp']); $i++) {
            $data['followUp'][$i]['ref_id'] = $regId;
            $this->task->insert($data['followUp'][$i]);
        }
        return 1;
    }
    
    public function update($data, $regId) {
        $this->registrationMaster->update($data['registrationMaster'], $regId);
        $this->registrationTestPrepare->update($data['test_prepare'][0], $data['testPrepareId']);
        
        /*Updating education details and removing unwanted education data - start*/
        $existingEduIds = array();
        for($i=0;$i<sizeof($data['education']); $i++) {
            if(array_key_exists('id',$data['education'][$i]) && $data['education'][$i]['id']) {
                $existingEduIds[] = $data['education'][$i]['id'];
                $this->registrationEducation->update($data['education'][$i],$data['education'][$i]['id']);
            } else {
                $this->registrationEducation->insert($data['education'][$i]);
                $existingEduIds[] = $this->db->insert_id();
            }
        }
        $query = 'DELETE FROM '.$this->registrationEducation->table.' WHERE id NOT IN('.implode(',',$existingEduIds).') AND reg_id=\''.$regId.'\'';
        $this->db->query($query);
        /*Updating education details and removing unwanted education data - end*/
        
        /*Updating courses interested details and removing unwanted courses intersted data - start*/
        $existingCourseIds = array();
        for($i=0;$i<sizeof($data['courses']); $i++) {
            if(array_key_exists('id',$data['courses'][$i]) && $data['courses'][$i]['id']) {
                $existingCourseIds[] = $data['courses'][$i]['id'];
                $this->registrationCoursesInterested->update($data['courses'][$i],$data['courses'][$i]['id']);
            } else {
                $this->registrationCoursesInterested->insert($data['courses'][$i]);
                $existingCourseIds[] = $this->db->insert_id();
            }
        }
        $query = 'DELETE FROM '.$this->registrationCoursesInterested->table.' WHERE id NOT IN('.implode(',',$existingCourseIds).') AND reg_id=\''.$regId.'\'';
        $this->db->query($query);
        /*Updating courses interested details and removing unwanted courses intersted data - end*/
        
        /*Updating test preparation details - start*/
        for($i=0;$i<sizeof($data['test_prepare']); $i++) {
         $this->registrationTestPrepare->update($data['test_prepare'][$i],$data['testPrepareId']);
        }
        /*Updating test preparation details - end*/
        return true;
    }
    
    public function get($id='') {
        return $this->registrationMaster->get($id);
    }
    
    public function getForEdit($id='') {
        $returnArr = array();
        $registrationMainDetailsSql = 'SELECT EM.*, EM.id AS reg_id FROM registration_master EM WHERE EM.id=\''.$id.'\'';
        $query = $this->db->query($registrationMainDetailsSql);
        $result = $query->result();
        $returnArr['registrationMain'] = ($result && $result[0]) ? $result[0] : null;;
        
        
        $registrationEducationDetailsSql = 'SELECT EE.*, EE.id AS ee_id FROM reg_education EE WHERE EE.reg_id=\''.$id.'\'';
        $query = $this->db->query($registrationEducationDetailsSql);
        $result = $query->result();
        $returnArr['educationDetails'] = $result;
        
        $registrationTestPrepareDetailsSql = 'SELECT TP.*, TP.id AS tp_id FROM reg_test_preparation TP WHERE TP.reg_id=\''.$id.'\'';
        $query = $this->db->query($registrationTestPrepareDetailsSql);
        $result = $query->result();
        $returnArr['testPrepareDetails'] = ($result && $result[0]) ? $result[0] : null;
        
        $enquiryCourseInterestSql = 'SELECT EC.*, EC.id AS ec_id FROM reg_course_interested EC WHERE EC.reg_id=\''.$id.'\'';
        $query = $this->db->query($enquiryCourseInterestSql);
        $result = $query->result();
        $returnArr['courseInterestDetails'] = $result;
        
        $followUpSql = 'SELECT T.*, T.id AS task_id FROM task T WHERE T.ref_id=\''.$id.'\' AND T.ref_type=\'R\'';
        $query = $this->db->query($followUpSql);
        $result = $query->result();
        $returnArr['followUp'] = $result ? $result[0] : '';
        
        return $returnArr;
    }
    
    public function delete($regId) {
        $this->registrationMaster->delete($regId);
        $this->registrationEducation->deleteByRegId($regId);
        $this->registrationCoursesInterested->deleteByRegId($regId);
        $this->registrationTestPrepare->deleteByRegId($regId);
        $deleteTaskSql = 'DELETE FROM task WHERE ref_id=\''.$regId.'\' AND ref_type=\'R\'';
        $this->db->query($deleteTaskSql);
    }
}
?>