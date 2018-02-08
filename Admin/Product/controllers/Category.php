<?php
/*
 * 分类
 */
class Category extends ControllerAbstract{
    public function __construct() {
        parent::__construct();
    }
    //列表
    function indexAction(){
        $this->display('clist.php');
    }
    //添加
    function addAction(){
        $this->display('cadd.php');
    }
}