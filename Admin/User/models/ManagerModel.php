<?php
/*
 * 管理员
 */

class ManagerModel extends ModelAbstract{

    //初始化
    public function __construct() {
        $db_config = Config::getDbGman();
        $table = 'admin_meneger';
        parent::__construct($db_config, $table);
    }
    //列表需要过滤的字段
    public function filterCol(){
        $cond = array('status:eq'=>1);
        $roleArr = M('User','RoleModel')->select($cond, $fields = '`id`,`role_name`');
        $role = array();
        foreach($roleArr AS $val){
            $role[$val['id']] = $val['role_name'];
        }
        $filter = array(
            'role_id' => $role,
            'status' => array(0 => '停用',1 => '启用')
        );
        return $filter;
    }
    //操作
    public function getTool($col){
        $arr = array(
            'on' => "tool_on(this,'{$col['id']}')",
            'off' => "tool_off(this,'{$col['id']}')",
            'edit' => "tool_edit('编辑','/User/Manager/add?id={$col['id']}')"
        );
        if($col['status'] == 0){
            unset($arr['off']);
        }else{
            unset($arr['on']);
        }
        return $arr;
    }
}