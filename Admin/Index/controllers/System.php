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
        $model = M('Index','MenuModel');
        if(isset($_GET['page'])){
            $page = getInt('page');
            $limit = getInt('limit');
            $data = $model->ajaxPage($model,$page,$limit);
            echo json_encode($data);
            exit;
        }else{
            $menu = $model->select(array('pid:eq'=>0));
            $this->assign("menu", $menu);
            $this->display('menu.php');
        }
    }
    //添加
    public function menuAddAction(){
        $id = getInt('id');
        $cond = array('pid:eq'=>0,'order'=>'`sort` ASC');
        $menu = M('Index','MenuModel')->select($cond, $fields = '`id`,`name`');
        $this->assign('menu', $menu);
        if(isset($_POST['name'])){
            $json = array('code' => 1);
            $col = array('pid','name','sort','icon','link');
            $data = formData($col);
            $model = M('Index','MenuModel');
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
        $action = '/Index/System/MenuAdd';
        if($id){
            $form = M('Index','MenuModel')->row($id);
            $this->form($form);
            $action .= '?id='.$id;
        }
        $this->assign('action', $action);
        $this->display('madd.php');
    }
    //修改状态
    public function menuStatusAction(){
        $id = getInt('id');
        $status = getInt('status');
        $json = array('code' => 1);
        if($id > 0){
            $res = M('Index','MenuModel')->update(array('status'=>$status),array('id:eq'=>$id));
            if($res){
                $json['code'] = 0;
            }
        }
        echo json_encode($json);
    }
    //创建静态页
    public function makeMenuAction(){
        $json = array('code' => 1);
        $model = M('Index','MenuModel');
        $menu = $model->getMenu();
        $this->assign('menu', $menu);
        ob_start();
        $this->display('_menu.php');
        $html = ob_get_contents();
        ob_end_clean();
        $file = APP.'/layout/_menu.html';
        $r = file_put_contents($file, $html);
        if($r){
            $json['code'] = 0;
        }
        echo json_encode($json);
        exit;
    }
    //图标
    function iconAction(){
        $this->display('icon.php');
    }
}