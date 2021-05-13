<?php
require_once (ROOT . DS . 'library' . DS . 'vanillacontroller.class.php');

class ProductsController extends VanillaController{
    function index($cateid = null, $name){
        $products = $this->Product->query("SELECT * FROM products WHERE category_id = $cateid");
        $this->set('products', $products);
        $this->set('cate_name', $name);
    }

    function view($prodId = null, $prodName){
        $tags = $this->Product->query("SELECT * FROM products AS P, products_tags AS PT, tags AS T WHERE P.id = PT.product_id AND PT.tag_id = T.id AND P.id = $prodId");
        $prices = $this->Product->query("SELECT price FROM products WHERE id = $prodId");
        $this->set('tags', $tags);
        $this->set('prodName', $prodName);
        $this->set('price', $prices[0]['price']);
    }
}