<?php
class Checklist_model extends Parent_model {
    public function __construct() {
        parent::__construct();
        $this->table='country_checklist';
    }
    
    public function insert($data) {
        for($i=0; $i<sizeof($data['countryIds']); $i++) {
            for($j=0; $j<sizeof($data['checkList']); $j++) {
                $arr = array('country_id'=>$data['countryIds'][$i],'description'=>$data['checkList'][$j]);
                parent::insert($arr);
            }
        }
       return 1;
    }
    
    public function updateAll($data) {
        foreach($data as $d) {
            $this->update(array('description'=>$d['description']), $d['id']);
        }
        return 1;
    }
}
?>