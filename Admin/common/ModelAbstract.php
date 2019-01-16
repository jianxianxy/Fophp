<?php
include PATH.'/Fophp/Db/Table.php';
/* 
 * Model 通用类
 */
class ModelAbstract extends Table{
    
    public $_ICON = 0; //图标模式
    
    public function __construct($db_config, $table) {
        parent::__construct($db_config, $table);
    }
    /**
     * 分页
     */
    public function ajaxPage($model,$page = 1,$limit = 10,$conditions = array()){
        $count = $this->count($conditions);
        $start = ($page - 1) * $limit;
        $conditions['limit'] = $start.','.$limit;
        $data = $this->select($conditions);
        //需要过滤重新赋值的字段
        $filter = $model->filterCol();
        foreach($data AS $key => $val){
            foreach($filter AS $k => $v){
                if(isset($v[$val[$k]])){
                    $data[$key][$k] = $v[$val[$k]];
                }
            }
            $data[$key]['manage'] = $this->tooIcon($model->getTool($val),$model->_ICON);
        }
        $info = array('code'=>0,'data'=>$data,'count'=>$count,'page'=>$page,'msg'=>'');
        return $info;
    }
    /**
     * 列表字段过滤
     */
    public function filterCol(){
        return array();
    }
    /**操作
     * $data [事件=>方法]
     * $mod 0.按钮 1.图标
     */
    public function tooIcon($data,$mod = 0){
        //按钮模式
        $button = array(
            'on' => array('title'=>'启用','calss'=>''),
            'off' => array('title'=>'禁用','calss'=>'layui-btn-danger'),
            'app' => array('title'=>'审核','calss'=>'layui-btn-warm'),
            'del' => array('title'=>'删除','calss'=>'layui-btn-danger'),
            'edit' => array('title'=>'编辑','calss'=>''),
            'view' => array('title'=>'预览','calss'=>'layui-btn-normal')
        );
        //图标模式
        $tool = array(
            'on' => array('title'=>'启用','icon'=>'&#xe6e1;'),
            'off' => array('title'=>'禁用','icon'=>'&#xe6dd;'),
            'app' => array('title'=>'审核','icon'=>'&#xe603;'),
            'del' => array('title'=>'删除','icon'=>'&#xe6e2;'),
            'edit' => array('title'=>'编辑','icon'=>'&#xe6df;'),
            'view' => array('title'=>'预览','icon'=>'&#xe695;')
        );
        $ret = '';
        if($mod == 0){
            foreach($data AS $key => $val){
                $ret .= '<a onclick="'.$val.'" class="layui-btn layui-btn-xs '.$button[$key]['calss'].'" lay-event="del">'.$button[$key]['title'].'</a>';
            }
        }else{
            foreach($data AS $key => $val){
                $ret .= '<a class="ml-5" onclick="'.$val.'" href="javascript:;" title="'.$tool[$key]['title'].'"><i class="Hui-iconfont">'.$tool[$key]['icon'].'</i></a>';
            }
        }
        return $ret;
    }
}
