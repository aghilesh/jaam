<?php

class User_model extends Parent_model {

    public function __construct() {
        parent::__construct();
        $this->table = 'user';
    }
}

?>
