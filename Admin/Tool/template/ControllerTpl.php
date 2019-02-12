<?php
/*
 * 系统配置
 */
class System extends ControllerAbstract{
    public function __construct() {
        parent::__construct();
    }
    //菜单
    public function menuAction(){
        $model = M('{module}','{modelName}');
        if(isset($_GET['page'])){
            $page = getInt('page');
            $limit = getInt('limit');
            $data = $model->ajaxPage($model,$page,$limit);
            echo json_encode($data);
            exit;
        }else{
            $this->display('index.php');
        }
    }
    //添加
    public function addAction(){
        $id = getInt('id');
        if(isset($_POST['name'])){
            $json = array('code' => 1);
            $col = array('{addCol}');
            $data = formData($col);
            $model = M('{module}','{modelName}');
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
        $action = '/{module}/{contName}/Add';
        if($id){
            $form = M('{module}','{modelName}')->row($id);
            $this->form($form);
            $action .= '?id='.$id;
        }
        $this->assign('action', $action);
        $this->display('add.php');
    }
}