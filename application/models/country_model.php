<?php

class Country_model extends Parent_model {
    public function __construct() {
        parent::__construct();
        $this->table = 'country';
    }

}
?>
