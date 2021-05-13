<?php
require_once (ROOT . DS . 'library' . DS . 'vanillacontroller.class.php');

Class RegisterController extends VanillaController{
    function checkRegister($username){
        $rs = $this->Login->query("SELECT * FROM username WHERE user = '$username'");
        echo count($rs);
    }

    function default(){
        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $rows = $this->Login->query("SELECT * FROM username WHERE user = '$username'");
            $rs = 1;
            if(count($rows) > 0){
                $rs = 0;
            }else{
                $rs = $this->Login->query("INSERT INTO username VALUES (null, '$username', '$password')");
            }
            if($rs){
                header('location: http://localhost:8080/ProjectMusicWeb/login');
            }else{

            }
        }else{
            echo 'Mai ocs chos';
        }
    }

    function login(){
        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $rows = $this->Login->query("SELECT * FROM username WHERE user = '$username' AND password = '$password'");
            $rs = count($rows);
            if($rs > 0){
                header('location: http://localhost:8080/ProjectMusicWeb/home');
            }else{
                header('location: http://localhost:8080/ProjectMusicWeb/login');
            }
        }
    }
    
}