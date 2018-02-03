<?php
/*
 * 文章
 */
class Article extends ControllerAbstract{
    public function __construct() {
        parent::__construct();
    }
    //列表
    function IndexAction(){
        $this->display('alist.php');
    }
    //添加
    function AddAction(){
        $this->display('aadd.php');
    }
    function FeedbackAction(){
        $this->display('feedback.php');
    }
}