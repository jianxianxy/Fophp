<?php
/*
 * 商品
 */
class Product extends ControllerAbstract{
    public function __construct() {
        parent::__construct();
    }
    //列表
    function indexAction(){
        $this->display('plist.php');
    }
    //添加
    function addAction(){
        $this->display('padd.php');
    }
}