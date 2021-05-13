<?php
class Template {
 
    protected $variables = array();
    protected $_controller;
    protected $_action;
 
    function __construct($controller,$action) {
        $this->_controller = $controller;
        $this->_action = $action;
    }
 
    /** Set Variables **/
 
    function set($name,$value) {
        $this->variables[$name] = $value;
    }
 
    /** Display Template **/
 
    function render() {
        extract($this->variables); // nhan mot mang, coi key la bien, va value la gia tri cua bien
        if($this->_action == 'default'){
            if (file_exists(ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . 'header.php')) {
                include (ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . 'header.php');
            } else {
                include (ROOT . DS . 'application' . DS . 'views' . DS . 'header.php');
            }
      
            if(file_exists(ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . $this->_action . '.php')){
                include (ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . $this->_action . '.php'); 
            }

            if (file_exists(ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . 'footer.php')) {
                include (ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . 'footer.php');
            } else {
                include (ROOT . DS . 'application' . DS . 'views' . DS . 'footer.php');
            }
        }else{
            if(file_exists(ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . $this->_action . '.php')){
                include (ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . $this->_action . '.php'); 
            }
        }

    }
 
}
