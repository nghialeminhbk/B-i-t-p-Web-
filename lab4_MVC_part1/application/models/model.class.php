<?php
require_once(ROOT . DS . 'db' . DS . 'SQLQuery.class.php');

class Model extends SQLQuery {
    protected $_model;
 
    function __construct() {
 
        $this->connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        $this->_model = get_class($this);
        // var_dump($this->_model);
        $this->_table = strtolower($this->_model)."s";
        // var_dump($this->_table);
    }
 
    function __destruct() {
    }
}
