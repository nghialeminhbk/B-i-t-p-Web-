<?php
require_once(ROOT . DS . 'library' . DS . 'sqlquery.class.php');

class VanillaModel extends SQLQuery {
    protected $_model;
 
    function __construct() {
        $this->connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    }
 
    function __destruct() {
    }
}
