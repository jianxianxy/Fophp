<?php
include APP_PATH.'/Fophp/Db/Table.php';
/* 
 * Model 通用类
 */
class ModelAbstract extends Table{
    public function __construct($db_config, $table) {
        parent::__construct($db_config, $table);
    }
    //分页
    public function ajaxPage($model,$page = 1,$limit = 10,$conditions = array()){
        $count = $this->count($conditions);
        $start = ($page - 1) * $limit;
        $conditions['limit'] = $start.','.$limit;
        $data = $this->select($conditions);
        foreach($data AS $key => $val){
            $data[$key]['manage'] = $this->tooIcon($model->getTool($val));
        }
        $info = array('code'=>0,'data'=>$data,'count'=>$count,'page'=>$page,'msg'=>'');
        return $info;
    }
    
    //操作
    public function tooIcon($data,$mod = 0){
        $tool = array(
            'on' => array('title'=>'启用','icon'=>'&#xe605;'),
            'off' => array('title'=>'禁用','icon'=>'&#xe60e;'),
            'del' => array('title'=>'删除','icon'=>'&#xe6e2;'),
            'edit' => array('title'=>'编辑','icon'=>'&#xe6df;'),
            'view' => array('title'=>'预览','icon'=>'&#xe695;')
        );
        $button = array(
            'on' => array('title'=>'启用','calss'=>''),
            'off' => array('title'=>'禁用','calss'=>'layui-btn-danger'),
            'del' => array('title'=>'删除','calss'=>'layui-btn-danger'),
            'edit' => array('title'=>'编辑','calss'=>''),
            'view' => array('title'=>'预览','calss'=>'')
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
