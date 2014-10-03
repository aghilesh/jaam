<?php

class Rolepermission_model extends Parent_model {

    public function __construct() {
        parent::__construct();
        $this->table = 'role_permission';
    }
}

?>