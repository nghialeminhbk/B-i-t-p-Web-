<?php
    include_once('./models/Model.php');

    class Controller {
        private $model;
        public function __construct(){
            $this->model = new Model();
        }

        public function invoke(){
            if(!isset($_GET['book'])){
                $books = $this->model->getBookList();
                include './views/booklist.php';
            }else{
                $book = $this->model->getBook($_GET['book']);
                include './views/viewbook.php';
            }

        }
    }

?>