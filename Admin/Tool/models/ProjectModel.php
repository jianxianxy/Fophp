<?php
/*
 * 栏目
 */

class ProjectModel extends Table{
    public $_ICON = 0; //自定义图标模式 0:文字 1:按钮 
    public $_TPLDIR = '/Tool/template';
    //初始化
    function __construct($cfgFunc) {
        $db_config = Config::$cfgFunc();
        $table = '';
        parent::__construct($db_config, $table);
    }
    //获取数据库所有表
    public function getTables(){
        $sql = 'SHOW TABLES';
        $res = $this->query($sql);
        $all = $this->fetchAll($res);
        $table = array();
        foreach($all AS $val){
            $table[] =  array_shift($val);
        }
        return $table;
    }
    //获取表结构
    public function getTableStruct($table){
        $sql = "DESC `{$table}`";
        $res = $this->query($sql);
        $all = $this->fetchAll($res);
        $col = array();
        foreach($all AS $val){
            $col[] =  array_shift($val);
        }
        return $col;
    }
    //获取Model摸版
    public function getModel(){
        $file = APP.'/'.$this->_TPLDIR.'/ModelTpl.php';
        $content = file_get_contents($file);
        $content = $this->replaceParam($content);
        return $content;
    }
    //获取Model摸版
    public function getViewAdd(){
        $file = APP.'/'.$this->_TPLDIR.'/ViewAddTpl.php';
        $content = file_get_contents($file);
        return $content;
    }
    //获取Model摸版
    public function getViewList(){
        $file = APP.'/'.$this->_TPLDIR.'/ViewListTpl.php';
        $content = file_get_contents($file);
        return $content;
    }
    //获取Model摸版
    public function getController(){
        $file = APP.'/'.$this->_TPLDIR.'/ControllerTpl.php';
        $content = file_get_contents($file);    
        $content = $this->replaceParam($content);
        return $content;
    }
    //变量替换
    public function replaceParam($con){
        $rep = array(
            '{tableName}' => $_REQUEST['tableName'],
            '{module}' => $_REQUEST['module'],
            '{modelName}' => $_REQUEST['modelName'],
            '{contName}' => $_REQUEST['contName'],
            '{configDb}' => $_REQUEST['configDb'],
            '{addCol}' => implode("','",array_keys($_REQUEST['addView'])),
        );
        return str_replace(array_keys($rep), array_values($rep),$con);
    }
}