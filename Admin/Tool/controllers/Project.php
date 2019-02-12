<?php

/* 
 * 智能工程
 */
class Project extends Controller{
    //首页
    function indexAction(){
        //获取模块
        $dirArr = getDir(APP);
        $module = array();
        foreach($dirArr AS $val){
            $int = ord($val);
            if($int > 64 && $int < 91){
                $module[] = $val;
            }
        }
        //获取数据库连接配置
        $configDb = array();
        $config = new Config();
        $funArr = get_class_methods($config);
        foreach($funArr AS $val){
            if(substr($val,0,5) == 'getDb'){
                $obj = $config->$val();
                $configDb[$val] = $obj['dbname'];
            }
        }
        $this->assign('module', $module);
        $this->assign('configDb', $configDb);
        $this->display('index.php');
    }
    //MVC生成
    function addAction(){
        $configDb = $_GET['configDb'];
        include APP.'/Tool/models/ProjectModel.php';
        $model = new ProjectModel($configDb);
        $this->assign('model',$model);
        $this->display('view.php');
    }
    //获取数据库所有表
    function getTablesAction(){
        include APP.'/Tool/models/ProjectModel.php';
        $configDb = trim($_POST['configDb']);
        $model = new ProjectModel($configDb);
        $table = $model->getTables();
        $this->printJson($table);
        exit;
    }
    //获取表字段
    function getTableColAction(){
        include APP.'/Tool/models/ProjectModel.php';
        $configDb = trim($_POST['configDb']);
        $model = new ProjectModel($configDb);
        $table = trim($_POST['table']);
        $col = $model->getTableStruct($table);
        $this->printJson($col);
        exit;
    }
}
