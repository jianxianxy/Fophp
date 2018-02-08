<?php
/*
 * 角色
 */

class RoleModel extends ModelAbstract{
    //初始化
    function __construct() {
        $db_config = Config::getDbGman();
        $table = 'admin_role';
        parent::__construct($db_config, $table);
    }
    //操作
    public function getTool($col){
        $arr = array(
            'on' => "tool_on(this,'{$col['id']}')",
            'off' => "tool_off(this,'{$col['id']}')",
            'edit' => "tool_edit('编辑','/User/Manager/Edit/id/{$col['id']}'",
            'view' => "tool_view('查看','/User/Manager/View/id/{$col['id']}'",
        );
        if($col['status'] == 0){
            unset($arr['off']);
        }else{
            unset($arr['on']);
        }
        return $arr;
    }
}