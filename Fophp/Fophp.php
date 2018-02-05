<?php
/* 路由引擎
 * @author Nick <zhaozhiwei@747.cn>
 * @final  2014-11-13  18:27:28
 */
class Fophp
{
    public static function Run()
    {
        //路由解析
        self::parseRoute();
        $file = M.'/'.MODULE.'/controllers/'.CONTROLLER.'.php';
        if(file_exists($file))
        {
            include($file);//加载控制器
            //补全后缀
            $controller = CONTROLLER;
            $action = ACTION.'Action';
            $object = new $controller();
            $object->$action();
        }
        else
        {
            echo 'Include Error:文件【'.$file.'】不存在 请检查大小写规则';
        }
    }
    //路由解析
    public static function parseRoute()
    {
        $route = Config::getRoute();
        if($route['type'] == 1)
        {
            $URI = trim($_SERVER['REQUEST_URI'],'/');
            $pos = strpos($URI,'?');
            if($pos){
                $URI = substr($URI,0,$pos);
            }
            $URI = preg_replace('/\w+\.php/','',$URI);
            $URI = explode('/', $URI);
            $config = Config::getConfig();
            isset($URI[0]) AND $modul = ucfirst($URI[0]) OR $modul = $config['modul'];
            isset($URI[1]) AND $controller = ucfirst($URI[1]) OR $controller = $config['controller'];
            isset($URI[2]) AND $action = $URI[2] OR $action = $config['action'];
            Config::setRoute(array(
                'modul'=>$modul,
                'controller'=>$controller,
                'action'=>$action,
            ));
            unset($URI[0]);
            unset($URI[1]);
            unset($URI[2]);
            //处理get参数
            if($URI)
            {
                foreach($URI AS $val)
                {
                    $val = explode('=', $val);
                    if(isset($val[1]))
                    {
                        $_GET[$val[0]] = $val[1];
                    }
                    else
                    {
                        $_GET[] = $val[0];
                    }
                }
            }
        }
        else
        {
            die("未定义的路由规则:".$route['type']);
        }
    }
}
?>