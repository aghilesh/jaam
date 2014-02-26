<?php

class meventmanager extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getAllEvent() {

        $this->db->select('ei.*');
        $this->db->from('tbl_eventinfo ei');
        $this->db->join('tbl_event_venue ev', 'ev.event_id = ei.aid');
        $resultset = $this->db->get();
        return $resultset->result();
    }

    public function getEventInfo($id) {
        $this->db->select('*');
        $this->db->where('aid', $id);
        $query = $this->db->get('tbl_eventinfo');
        return $query->row();
    }

    public function getEventInfoNew1($id) {
        $this->db->select('aid', 'event_title', 'coverphoto', 'event_description', 'venue_name', 'latitude', 'longitude', 'venueId');
        $this->db->where('tbl_eventinfo.aid', $id);
        $this->db->from('tbl_eventinfo');
        $this->db->join('tbl_eventseatbookinginfo', 'tbl_eventseatbookinginfo.eventId = tbl_eventinfo.aid');
        $this->db->join('tbl_venueinfo', 'tbl_eventseatbookinginfo.venueId = tbl_venueinfo.aid');
        $this->db->distinct();
        $resultset = $this->db->get();
        return $resultset->result();
    }

    public function getEventInfoNew($id) {
        $sqlquery = "select vi.aid as venue_id, ei.aid as event_id, ei.event_title, ei.event_genre, ei.event_language , ei.event_description, ei.coverphoto, ei.dt_eventcreated, 
                        vi.aid as venue_id, vi.venue_name , vi.venue_description, vi.location, vi.latitude, vi.longitude, vi.row_count
                        from
                        tbl_eventinfo ei
                        join  tbl_event_venue ev
                        on ei.aid = ev.event_id 
                        join tbl_venueinfo vi
                        on ev.venue_id  = vi.aid
                        where ei.aid = $id";
        $query = $this->db->query($sqlquery);
        return $query->result();        
    }

    public function getEventByGenre($type, $perpage, $page){
        if($type){
            $sqlquery = "select ei.aid as event_id, ei.event_title, ei.event_genre, ei.event_language , ei.event_description, ei.coverphoto, ei.dt_eventcreated, 
                            vi.aid as venue_id, vi.venue_name , vi.venue_description, vi.location
                            from
                            tbl_eventinfo ei
                            join  tbl_event_venue ev
                            on ei.aid = ev.event_id 
                            join tbl_venueinfo vi
                            on ev.venue_id  = vi.aid
                            where ei.event_genre like '%$type%'
                            limit $page, $perpage"; 
            $query = $this->db->query($sqlquery);
            return $query->result();            
        }else{
            return false;
        }
    }
    
    public function getEventCountByGenre($type = ''){
        if($type){
            $sqlquery = "select ei.aid as event_id, ei.event_title, ei.event_genre, ei.event_language , ei.event_description, ei.coverphoto, ei.dt_eventcreated, 
                            vi.aid as venue_id, vi.venue_name , vi.venue_description, vi.location
                            from
                            tbl_eventinfo ei
                            join  tbl_event_venue ev
                            on ei.aid = ev.event_id 
                            join tbl_venueinfo vi
                            on ev.venue_id  = vi.aid
                            where ei.event_genre like '%$type%'";
            $query = $this->db->query($sqlquery);
            return count($query->result());            
        }else{
            return false;
        }
    }
    
    public function getEventByCriteria($query, $perpage, $page){
        if($query){
            $sqlquery = "select ei.aid as event_id, ei.event_title, ei.event_genre, ei.event_language , ei.event_description, ei.coverphoto, ei.dt_eventcreated, 
                            vi.aid as venue_id, vi.venue_name , vi.venue_description, vi.location
                            from
                            tbl_eventinfo ei
                            join  tbl_event_venue ev
                            on ei.aid = ev.event_id 
                            join tbl_venueinfo vi
                            on ev.venue_id  = vi.aid
                            where ei.event_genre like '%$query%'
                            or ei.event_title like '%$query%'
                            or ei.event_language like '%$query%'
                            or ei.event_description like '%$query%'
                            or vi.venue_name like '%$query%'
                            or vi.venue_description like '%$query%'
                            or vi.location like '%$query%'
                            limit $page, $perpage";
            $query = $this->db->query($sqlquery);
            return $query->result();            
        }else{
            return false;
        }
    }    

    public function getEventVenueDetails($venue_id, $eventId){
        
        $sqlquery = "SELECT cat.aid AS category_id, cat.category_name AS category_name, cat.category_price AS category_price, 
                    cat.senior_price AS senior_price, cat.adult_price AS adult_price, cat.child_price AS child_price, 
                    cat.category_color AS category_color, 
                    v.aid AS venue_id, v.venue_name AS venue_name, v.venue_description AS venue_description,
                    ei.event_title, ei.coverphoto
                    FROM  tbl_venueinfo v
                    JOIN  tbl_category cat ON cat.venusID = '$venue_id'
                    JOIN  tbl_eventinfo ei ON ei.aid = '$eventId'
                    where v.aid = '$venue_id'
                    ";
        $resultset = $this->db->query($sqlquery);
        return $resultset->result();
    }
    
    public function getCountEventByCriteria($query = ''){
        if($query){
            $sqlquery = "select ei.aid as event_id, ei.event_title, ei.event_genre, ei.event_language , ei.event_description, ei.coverphoto, ei.dt_eventcreated, 
                            vi.aid as venue_id, vi.venue_name , vi.venue_description, vi.location
                            from
                            tbl_eventinfo ei
                            join  tbl_event_venue ev
                            on ei.aid = ev.event_id 
                            join tbl_venueinfo vi
                            on ev.venue_id  = vi.aid
                            where ei.event_genre like '%$query%'
                            or ei.event_title like '%$query%'
                            or ei.event_language like '%$query%'
                            or ei.event_description like '%$query%'
                            or vi.venue_name like '%$query%'
                            or vi.venue_description like '%$query%'
                            or vi.location like '%$query%'";
            $query = $this->db->query($sqlquery);
            return count($query->result());  
        }else{
            return false;
        }
    }
    
    public function searchterm_handler($searchterm){
        if($searchterm){
            $this->session->set_userdata('searchterm', $searchterm);
            return $searchterm;
        }elseif($this->session->userdata('searchterm')){
            $searchterm = $this->session->userdata('searchterm');
            return $searchterm;
        }else{
            $searchterm ="";
            return $searchterm;
        }
    }
    
    public function getSeatDetails($cat_id){
        $this->db->select('*');
        $this->db->where('aid', $cat_id);
        $query = $this->db->get('tbl_category');
        return $query->row();        
    }
    
    public function getPrice($cat_id){
        $this->db->where('aid', $cat_id);
        $query = $this->db->get('tbl_category');
        return $query->row();
    }
    
    public function saveOrder($orderDetails){
        return $this->db->insert('tbl_order_details', $orderDetails);
    }
    
    public function getTktPrintDetails( $ticketnumber, $emailid){
        //validating email
        $sqlquery = "SELECT id
                        FROM tbl_users
                        WHERE tbl_users.email = '$emailid'";
        $resultset = $this->db->query($sqlquery);
        $userid = $resultset->row();
        if(!$userid){
            return $resultset->result();
        }
        // Get  ticket details
        $sqlquery1 = "SELECT o.id AS ticketnumber, o.user_id, 
                        od.id, od.seat_name, od.category_name, od.seat_type, od.seat_price 
                        FROM tbl_order o
                        JOIN tbl_order_details od ON od.order_id = o.id
                        WHERE o.id = '$ticketnumber'
                        AND o.user_id = '$userid->aid'";
        $resultset1 = $this->db->query($sqlquery1);
        return $resultset1->result();
    }
    
    public function getAdvSearchResult($location, $language, $genre, $perpage, $page) {
        $sqlquery1 = "SELECT ei.aid AS event_id, ei.event_title, ei.event_genre, 
                        ei.event_language, ei.event_description, ei.coverphoto, ei.dt_eventcreated, 
                        vi.aid AS venue_id, vi.venue_name, vi.venue_description, vi.location
                        FROM tbl_eventinfo ei
                        JOIN tbl_event_venue ev ON ei.aid = ev.event_id
                        JOIN tbl_venueinfo vi ON ev.venue_id = vi.aid
                        WHERE ei.event_genre LIKE '%$genre%'
                        OR ei.event_language LIKE '%$language%'
                        OR vi.location LIKE '%$location%'
                        ORDER BY ei.aid ASC 
                        limit $page, $perpage";
        $resultset1 = $this->db->query($sqlquery1);
        return $resultset1->result();
    }
    
    public function getCount_AdvSearchResult($location, $language, $genre) {
        $sqlquery1 = "SELECT ei.aid AS event_id, ei.event_title, ei.event_genre, 
                        ei.event_language, ei.event_description, ei.coverphoto, ei.dt_eventcreated, 
                        vi.aid AS venue_id, vi.venue_name, vi.venue_description, vi.location
                        FROM tbl_eventinfo ei
                        JOIN tbl_event_venue ev ON ei.aid = ev.event_id
                        JOIN tbl_venueinfo vi ON ev.venue_id = vi.aid
                        WHERE ei.event_genre LIKE '%$genre%'
                        OR ei.event_language LIKE '%$language%'
                        OR vi.location LIKE '%$location%'
                        ORDER BY `ei`.`aid` ASC ";
        $resultset1 = $this->db->query($sqlquery1);
        return count($resultset1->result());
    }
    
     public function getRelatedLinks($eventId){
       $this->db->select('*');        
       $this->db->where('eventId', $eventId);
       $query = $this->db->get('tbl_event_link');
       return $query->result();        
   }
   
   public function getEventTimings($eventId, $venueId){
       $this->db->select('*');        
       $this->db->where('event_id', $eventId);
       $this->db->where('venue_id', $venueId);
       $query = $this->db->get('tbl_event_timing');
       return $query->result();        
   }
}