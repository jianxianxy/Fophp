<?php
/*
 * 会员
 */

class UserModel extends ModelAbstract{
    public $_ICON = 1; //图标模式
    //初始化
    public function __construct() {
        $db_config = Config::getDbGman();
        $table = 'user_list';
        parent::__construct($db_config, $table);
    }
    //列表需要过滤的字段
    public function filterCol(){
        $filter = array(
            'sex' => array('女','男'),
            'status' => array(0 => '停用',1 => '正常')
        );
        return $filter;
    }
    //操作
    public function getTool($col){
        $arr = array(
            'on' => "tool_on(this,'{$col['id']}')",
            'off' => "tool_off(this,'{$col['id']}')",
            'edit' => "tool_edit('编辑','/User/User/add?id={$col['id']}')"
        );
        if($col['status'] == 0){
            unset($arr['off']);
        }else{
            unset($arr['on']);
        }
        return $arr;
    }
}