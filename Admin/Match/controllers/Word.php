<?php
/*
 * 分词
 */
class Word extends ControllerAbstract{
    public function __construct() {
        parent::__construct();
    }
    //列表
    function indexAction(){
        if(isset($_GET['page'])){
            $model = M('Match','WordModel');
            $page = getInt('page');
            $limit = getInt('limit');
            $name = getStr('name');
            $status = getStr('status');
            $conditions = array(); //搜索条件
            if($name){
                $conditions['base:like'] = $name;
            }
            if($status > -1){
                $conditions['is_pure:eq'] = $status;
            }
            $data = $model->ajaxPage($model,$page,$limit,$conditions); //分页数据
            echo json_encode($data);
            exit;
        }else{
            $this->display('word_list.php');
        }
    }
    //审核
    function verifyAction(){
        $id = getInt('id');
        $value = getInt('value');
        if($id < 1){
            echo json_encode(['code'=>1]);
            exit;
        }
        $model = M('Match','WordModel');
        $row = $model->row(['id:eq'=>$id]);
        $res = $model->update(['is_pure' => $value],array('word_pure:eq'=>$row['word_pure']));
        if($res){
            echo json_encode(['code'=>0]);
        }else{
            echo json_encode(['code'=>1]);
        }
        exit;
    }
    function verifyMoreAction(){
        $pure = $_POST['pure'];
        foreach($pure AS &$val){
            $val = trim($val);
        }
        $pureUniq = array_unique($pure);
        $model = M('Match','WordModel');
        $result = 0;
        foreach($pureUniq AS $v){
            $result += $model->update(['is_pure' => 1],array('word_pure:eq'=>$v));
        }
        echo json_encode(['code'=>0,'ret' => $result]);
        exit;
    }
    //修改
    function updateAction(){
        $id = getInt('id');
        $value = getStr('value');
        if($id < 1){
            echo json_encode(['code'=>1]);
            exit;
        }
        $model = M('Match','WordModel');
        $res = $model->update(['word_pure' => $value],['id:eq'=>$id]);
        if($res){
            echo json_encode(['code'=>0]);
        }else{
            echo json_encode(['code'=>1]);
        }
        exit;
    }
    //净化
    function pureAction(){
        set_time_limit(0);
        $model = M('Match','WordModel');
        $all = $model->select(['is_pure' => 0]);
        foreach($all AS $val){
            $value = str_replace(['(',')','（','）'],'',trim($val['word_pure']));
            $res = $model->update(['word_pure' => $value],['id:eq'=>$val['id']]);
            echo '修改：'.$res.'<br/>';
        }
        echo '完成';
        exit;
    }
}