<?php
/*
 * 商品
 */
class Product extends ControllerAbstract{
    public function __construct() {
        parent::__construct();
    }
    //列表
    function IndexAction(){
        $this->display('plist.php');
    }
    //添加
    function AddAction(){
        $this->display('padd.php');
    }
}