<?php
/**
 * 配置信息
 */
class Config
{
    //默认路由配置
    public static $application = array(
        'modul' => 'Index',
        'controller' => 'Index',
        'action'     => 'index'
    );
    //数据库配置
    private static $gman_db = array(
            'host'      => 'localhost',
            'port'      => '3306',
            'username'  => 'root',
            'password'  => '',
            'dbname'    => 'gman_db',
            'charset'   => 'utf8'
    );
    //Redis 配置
    private static $redis_cache = array(
        'db0' => array('master' => '10.102.36.153:26379:tttt'),
    );
    //路由类型配置
    public static $route = array(
        'type' => 1, //http://www.test.com/modules/controller/action
    );
    //返回基本配置
    public static function getConfig()
    {
        return self::$application;
    }
    //返回数据库配置
    public static function getDbGman()
    {
        return self::$gman_db;
    }
    //返回路由设置
    public static function getRoute()
    {
        return self::$route;
    }
    //更新路由
    public static function setRoute($app)
    {
        define('MODULE',$app['modul']);
        define('ACTION',$app['action']);
        define('CONTROLLER',$app['controller']);
        self::$application['controller'] = $app['controller'];
        self::$application['modul'] = $app['modul'];
        self::$application['action'] = $app['action'];
    }
}
?>