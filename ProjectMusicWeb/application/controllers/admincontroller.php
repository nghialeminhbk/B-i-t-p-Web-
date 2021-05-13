<?php

require_once (ROOT . DS . 'library' . DS . 'vanillacontroller.class.php');
Class AdminController extends VanillaController{
    function default($main = 'home'){
        $all = $this->Music->selectAll('musics');
        $this->set('musics', $all);
        $this->set('main', $main);
    }
    
    function home(){
        $all = $this->Music->selectAll('musics');
        $this->set('musics', $all);
    }

    function search($search = null){
        if(isset($search)){
            $rs = $this->Music->query("SELECT DISTINCT M.*, cate.titleC FROM categories AS cate, musics AS M WHERE M.categoryID = cate.id AND titleM LIKE '%$search%' UNION SELECT DISTINCT M.*, cate.titleC FROM categories AS cate, musics AS M WHERE M.categoryID = cate.id AND artist LIKE '%$search%'");
            $this->set('musics', $rs);
        }
    }

    function delete($id = null, $table = null){
        $rs = $this->Category->query("DELETE FROM $table WHERE id = $id");
        echo $rs;
    }
    function category(){
        $categories = $this->Category->query("SELECT * FROM categories WHERE parent_id = 0");
        $this->set('categories', $categories);
    }

    function addcategory($title = null, $image = null, $parent_id = 0){
        $categories = $this->Category->query("SELECT * FROM categories WHERE parent_id = 0");
        $this->set('categories', $categories);
        if(isset($title) && isset($image)){
            $rs = $this->Category->query("INSERT INTO categories VALUES (null, '$title', '$image', $parent_id)");
        }
    }

    function subcategory($cateId = null, $cateName){
        $cateId = $cateId;
        $subcategories = $this->Category->query("SELECT * FROM categories WHERE parent_id = $cateId");
        $this->set('subcategories', $subcategories);
        $this->set('cateName', $cateName);
        $this->set('cateId', $cateId);
    }

    function music($subcateId = null, $subcateTitle = null){
        $all = $this->Music->query("SELECT M.*, cate.titleC FROM categories AS cate, musics AS M WHERE M.categoryID = cate.id");
        // echo '<pre>';
        // var_dump($all);
        // echo '</pre>';
        $this->set('musics', $all);
    }

    function tag(){
        $tags = $this->Tag->selectAll('tags');
        $this->set('tags', $tags);
    }

    function user(){
        $users = $this->User->selectAll('username');
        $this->set('users', $users);
    }

    function addmusic($title = null, $artist = null, $source = null, $image = null, $type = null, $tags = null){
        if($title != null && $artist != null && $source != null && $image != null && $type != null && $tags != null){
            $this->Music->query("INSERT INTO musics VALUES (null, '$title', '$artist', '$source', '$image', '$type')");

        }else{
            $categories = $this->Category->query("SELECT * FROM categories WHERE parent_id != 0");
            $tags = $this->Tag->selectAll('tags');
            $this->set('tags', $tags);
            $this->set('categories', $categories);
        }
    }
}