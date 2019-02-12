<?php
/*
 * 控制器基础类
 */
class Controller
{
    public $form = array();
    //获取请求信息
    public function _get()
    {
        return $_GET;
    }
    //传值
    public function assign($key,$val)
    {
        $this->$key = $val;
    }
    public function form($val){
        $this->form = $val;
    }
    public function field($name,$mod = 'echo'){
        if(isset($this->form[$name])){
            $col = $this->form[$name];
        }else{
            $col = '';
        }
        if($mod == 'echo'){
            echo $col; 
        }else{
            return $col;
        }
    }
    //调用模板
    public function display($view)
    {
        $file = APP.'/'.MODULE.'/view/'.$view;
        include($file);
    }
    //Json格式返回
    public function printJson($data,$code = 0){
        echo json_encode(array('code'=>$code,'data'=>$data));
    }
}