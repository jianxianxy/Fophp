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
        $filter = array(
            'status' => array(0 => '停用',1 => '启用')
        );
        return $filter;
    }
    //操作
    public function getTool($col){
        $arr = array(
            'tool_del' => "tool_off(this,'{$col['id']}')",
            'edit' => "tool_edit('编辑菜单','/{module}/{contName}/edit?id={$col['id']}')",
        );
        return $arr;
    }
}