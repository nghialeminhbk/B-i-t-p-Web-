<?php

require_once(ROOT . DS . 'library'. DS. 'template.class.php');

class VanillaController{

    protected $_controller;
    protected $_action; 
    protected $_template;
 
    function __construct($controller , $action) {
        $this->_controller = $controller;
        $this->_action = $action;
        $this->Category = new Category;
        $this->Product = new Product; 
        $this->Login = new Login;
        $this->Music = new Music;
        $this->User = new User;
        $this->Tag = new Tag;
        $this->_template =new Template($controller,$action);
    }
 
    function set($name,$value) {
        $this->_template->set($name,$value);
    }
 
    function __destruct() {
            $this->_template->render();
    }
 
}
