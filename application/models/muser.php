<?php

class muser extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
    }
    
    public function insertNewUser($name, $email, $profession, $password, $place){
        $data = array(
            'role' => "user",
            'email' => $email,
            'password' => md5($password),
            'name' => $name,
            'profession' => $profession,
            'place' => $place,
            'status' => 0,
            'created_date' => date('Y-m-d H:i:s', now())
        );
        return $this->db->insert('tbl_users', $data);
    }
    
    public function checkLogin($username, $password){
        $this->db->select('id');
        $this->db->where('email', $username);
        $this->db->where('password', md5($password));
        $query = $this->db->get('tbl_users'); 
        return (0 < $query->num_rows())?$query->result():false;
    }
    
    public function getTicketPrice($categoryId, $venueId, $eventId){
        $this->db->select('aid');
        $this->db->where('event_id', $eventId);
        $this->db->where('venusID', $venueId);
        $this->db->where('aid', $categoryId);
        $query = $this->db->get('tbl_category'); 
        if(0 < $query->num_rows()){
           return $query->result(); 
        }else{
            $this->db->select('category_price');
            $this->db->where('venusID', $venueId);
            $this->db->where('aid', $categoryId);
            $query = $this->db->get('tbl_category'); 
            return (0 < $query->num_rows())?$query->result():false;            
        }
    }
    
    public function changeSeatStatus($seatId, $status){
        $date       = new DateTime('', new DateTimeZone('Asia/Calcutta')); 
        $today      = $date->format('Y-m-d H:i:s');        
        $query = "update tbl_eventseatbookinginfo set status = '$status', modified_time = '$today' where seatId = $seatId";
        $result = $this->db->query($query); 
        return ($result)?true:false;
    }
    
    public function insertUser($email, $name, $phone, $password=''){
        // check if email id already present
        if(!$this->isEmailExists($email)){
            $data = array(
                'email' => $email,
                'name' => $name,
                'password' => md5($password),
                'phone' => $phone,
                'created_date' => date('Y-m-d H:i:s', now())
            );
            return $this->db->insert('tbl_users', $data);            
        }
        return true;
    }
    
    public function checkUserLogin($username, $password){
        $this->db->select('id');
        $this->db->where('email', $username);
        $this->db->where('password', md5($password));
        $query = $this->db->get('tbl_users'); 
        return (0 < $query->num_rows())?$query->result():false;
    }
    
    public function isEmailExists($email){
            $this->db->select('id');
            $this->db->where('email', $email);
            $query = $this->db->get('tbl_users'); 
            return (0 < $query->num_rows())?$query->result():false;  
    }
    
    public function checkSeatStatus($seatId, $status){
        $query = $this->db->get_where('tbl_eventseatbookinginfo', array('seatId' => $seatId, 'status' => $status));
        return ($query->num_rows())?true:false;         
    }
    
    public function createNewOrder($userId, $venueId, $eventId){
        $data = array(
            'user_id'    => $userId,
            'order_date' => date('Y-m-d H:i:s', now()),
            'event_id' => $eventId,
            'venue_id' => $venueId
        );
        $this->db->insert('tbl_order', $data);
        return $this->db->insert_id();
    }
    
    public function getTicketDetails($orderId){
        $sql    = "SELECT * 
                    FROM `tbl_eventinfo`
                    join tbl_order
                    on tbl_eventinfo.aid = tbl_order.event_id
                    join tbl_venueinfo
                    on tbl_venueinfo.aid = tbl_order.venue_id
                    where tbl_order.id = $orderId";
        $resultset = $this->db->query($sql);
        return $resultset->result();
    }
    
    public function bookedSeats($bookingId){
        $sql    = "SELECT seat_name, seat_price 
                    FROM `tbl_order_details`
                    where order_id = $bookingId";
        $resultset = $this->db->query($sql);
        return $resultset->result_array();
    }
    
    public function getBookedUserDetails($orderId){ 
        $sql    = "SELECT * 
                    FROM `tbl_users`
                    join tbl_order
                    on tbl_users.id = tbl_order.user_id
                    where tbl_order.id = $orderId";
        $resultset = $this->db->query($sql);
        return $resultset->result();        
    }
}