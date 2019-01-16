<?php
/*
 * 栏目
 */
class Column extends ControllerAbstract{
    public function __construct() {
        parent::__construct();
    }
    //列表
    function indexAction(){
        $model = M('Cms','ColumnModel');
        if(isset($_GET['page'])){
            $page = getInt('page');
            $limit = getInt('limit');
            $name = getStr('name');
            $conditions = array(); //搜索条件
            if($name){
                $conditions['name:like'] = $name;
            }
            $data = $model->ajaxPage($model,$page,$limit,$conditions); //分页数据
            echo json_encode($data);
            exit;
        }else{
            $column = $model->select(array('pid:eq'=>0),array('id','name'));
            $this->assign("column", $column);
            $this->display('column_list.php');
        }
    }
    //编辑
    function addAction(){
        if(!empty($_POST)){
            $id = getInt('id');
            $json = array('code' => 1);
            $col = array('pid','name','sort');
            $data = formData($col);
            $model = M('Cms','ColumnModel');
            $res = false;
            if($id){
                $res = $model->update($data,array('id:eq'=>$id));
            }else{                
                $res = $model->insert($data);
            }
            if($res){
                $json['code'] = 0;
            }
            echo json_encode($json);
            exit;
        }
        $action = '/Cms/Column/add';
        $this->assign('action', $action);
        $this->display('column_add.php');
    }
}