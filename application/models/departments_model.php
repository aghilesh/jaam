<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 */
class departments_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    /**
     * returns all departments
     * 
     */
    
    public function getAllDepartments(){
        $this->db->select('*');
        $query = $this->db->get('department');
        return $query->result();
    }

    /**
     * 
     * delete a department
     */
    
    public function deleteDepartment($id){
        return $this->db->delete('department', array('id' => $id)); 
    }
    
    /**
     * save a department
     */
    public function saveDepartment($formData){
        $this->db->insert('department', $formData);
        if ($this->db->affected_rows() == '1'){
                return TRUE;
        }
        return FALSE;        
    }
    
    public function getDepartmentDetailByID($departmentId){
        $this->db->select('*');
        $this->db->where('id', $departmentId);
        $query = $this->db->get('department');
        return $query->row();        
    }
        
    /**
     * update department
     */
    public function updateDepartment($formData, $departmentId){
        $this->db->where('id', $departmentId);
        return $this->db->update('department', $formData);        
    }
    
    public function getSeatInfo($venueId, $eventId) {
        
    }

    public function getVenueDetails($venueId, $eventId) {
        $sql = "SELECT vi.aid AS venue_id, esb.seatId, vi.venue_name, vi.venue_description, vi.row_count, vi.column_count, 
            vs.aid AS seat, vs.categoryid, vs.seatname,
            cat.category_color, cat.category_name, cat.category_price,
            esb.status
            FROM tbl_venueinfo vi
            JOIN tbl_event_venue ev ON vi.aid = ev.venue_id
            JOIN tbl_venueseat vs ON vs.venueid = ev.venue_id
            LEFT JOIN tbl_eventseatbookinginfo esb ON esb.seatId = vs.aid
            LEFT JOIN tbl_category cat ON cat.aid = vs.categoryid
            WHERE ev.event_id = $eventId
            AND vi.aid = $venueId";

//        $sql ='SELECT `tbl_eventseatbookinginfo`.`eventId`, `tbl_eventseatbookinginfo`.`venueId`, 
//                `tbl_eventseatbookinginfo`.`seatId`, `tbl_eventseatbookinginfo`.`status`, 
//                `tbl_venueseat`.`categoryid`, `tbl_venueinfo`.`row_count`, `tbl_venueinfo`.`column_count`
//                FROM `tbl_eventseatbookinginfo` 
//                JOIN `tbl_venueinfo` ON `tbl_venueinfo`.`aid` = '.$venueId.' 
//                JOIN `tbl_venueseat` ON `tbl_venueseat`.`aid` = `tbl_eventseatbookinginfo`.`seatId`
//                where `tbl_eventseatbookinginfo`.`eventId` = '.$eventId.' and `tbl_eventseatbookinginfo`.`venueId` = '.$venueId;
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getCategoryDetails($cid) {
        $this->db->select('*');
        $this->db->where('aid', $cid);
        $query = $this->db->get('tbl_category');
        return $query->row();
    }
    
    public function changeStatus(){
        $this->db->select('*');
        $this->db->where('status', 'blocked');
        $query = $this->db->get('tbl_eventseatbookinginfo');
        return $query->result();
    }

}

?>
