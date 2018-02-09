<?php
/*
 * 管理员
 */

class ManagerModel extends ModelAbstract{
    //初始化
    function __construct() {
        $db_config = Config::getDbGman();
        $table = 'admin_meneger';
        parent::__construct($db_config, $table);
    }
    //操作
    public function getTool($col){
        $arr = array(
            'on' => "tool_on(this,'{$col['id']}')",
            'off' => "tool_off(this,'{$col['id']}')",
            'edit' => "tool_edit('编辑','/User/Manager/add?id={$col['id']}')",
            'view' => "tool_view('查看','/User/Manager/view?id={$col['id']}')",
        );
        if($col['status'] == 0){
            unset($arr['off']);
        }else{
            unset($arr['on']);
        }
        return $arr;
    }
}