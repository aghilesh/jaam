<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mbooking
 *
 * @author Aarav
 */
class mbooking extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
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
