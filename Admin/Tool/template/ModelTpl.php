<?php
/*
 * 摸版
 */

class ModelTpl extends ModelAbstract{
    //初始化
    function __construct() {
        $db_config = Config::getDbGman();
        $table = '{tableName}';
        parent::__construct($db_config, $table);
    }
    //列表需要过滤的字段
    public function filterCol(){
        $cond = array();
        $vArr = M('{module}','{modelName}')->select($cond, $fields = '`id`,`name`');
        $ret = array(0 => '');
        foreach($vArr AS $val){
            $ret[$val['id']] = $val['name'];
        }
        $filter = array(
            'pid' => $ret,
            'status' => array(0 => '停用',1 => '启用')
        );
        return $filter;
    }
    //操作
    public function getTool($col){
        $arr = array(
            'on' => "tool_on(this,'{$col['id']}')",
            'off' => "tool_off(this,'{$col['id']}')",
            'edit' => "tool_edit('编辑菜单','/{module}/{contName}/edit?id={$col['id']}')",
        );
        if($col['status'] == 0){
            unset($arr['off']);
        }else{
            unset($arr['on']);
        }
        return $arr;
    }
}