<?php
/*
 * 文章
 */
class Article extends ControllerAbstract{
    public function __construct() {
        parent::__construct();
    }
    //列表
    function indexAction(){
        $this->display('alist.php');
    }
    //添加
    function addAction(){
        $this->display('aadd.php');
    }
    function feedbackAction(){
        $this->display('feedback.php');
    }
    //Ajax分页显示
    function listAction(){
        $manage = <<<MAN
            <a style="text-decoration:none" onClick="article_stop(this,'10001')" href="javascript:;" title="下架"><i class="layui-icon">&#xe6de;</i></a>
			<a style="text-decoration:none" class="ml-5" onClick="article_edit('资讯编辑','article-add.html','10001')" href="javascript:;" title="编辑"><i class="layui-icon">&#xe6df;</i></a>
			<a style="text-decoration:none" class="ml-5" onClick="article_del(this,'10001')" href="javascript:;" title="删除"><i class="layui-icon">&#xe640;</i></a>
MAN;
        $lists = array(
            array('id'=>1001,'title'=>'资讯标题','category'=>'行业动态','form' => 'Hui','create_time' => '2014-6-11','status' => '<span class="label label-success radius">草稿</span>','manage' => $manage),
            array('id'=>1001,'title'=>'资讯标题','category'=>'行业动态','form' => 'Hui','create_time' => '2014-6-11','status' => '<span class="label label-success radius">草稿</span>','manage' => $manage),
            array('id'=>1001,'title'=>'资讯标题','category'=>'行业动态','form' => 'Hui','create_time' => '2014-6-11','status' => '<span class="label label-success radius">草稿</span>','manage' => $manage),
            array('id'=>1001,'title'=>'资讯标题','category'=>'行业动态','form' => 'Hui','create_time' => '2014-6-11','status' => '<span class="label label-success radius">草稿</span>','manage' => $manage),
            array('id'=>1001,'title'=>'资讯标题','category'=>'行业动态','form' => 'Hui','create_time' => '2014-6-11','status' => '<span class="label label-success radius">草稿</span>','manage' => $manage),
        );
        $info = array('code'=>0,'data'=>$lists,'count'=>100,'page'=>1,'msg'=>'');
        echo json_encode($info);
        exit;
    }
}