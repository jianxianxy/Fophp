<?php
/**
 * User: zzw
 * Date: 2018/04/11
 */
class RedisCache {

    private static $__instancePool;
    private static $__instance;
    private static $READONLY = array('get');
    private static $__configs = array(
        'master' => null,
        'slave' => null,
    );
    //单例
    public static function getInstance() {
        if (self::$__instance instanceof RedisCache) {
            return self::$__instance;
        } else {
            return self::$__instance = new self;
        }
    }
    //初始化
    private function __construct($config) {
        if (isset($config['master'])) {
            if (isset($config['master']['host']) && isset($config['master']['port'])) {
                self::$__configs['master'] = $config['master'];
            }
        }
        if (isset($config['slave']) && $config['enableSlave']) {
            if (isset($config['slave']['host']) && isset($config['slave']['port'])) {
                self::$__configs['slave'] = $config['slave'];
            }
        }
    }
    //创建连接池
    private function connect($config, $role = 'master') {
        $redis = new \Redis();
        $redis->connect($config['host'], $config['port']);
        $redis->auth($config['auth']);
        $redis->select($config['db']);
        return self::$__instancePool[$role][$config['db']] = $redis;
    }
    //获取连接
    private function getHandle($role = 'master') {
        $db = self::$__configs[$role]['db'];
        if (!isset(self::$__instancePool[$role][$db]) || self::$__instancePool[$role][$db]->ping() != '+PONG') {
            return self::connect(self::$__configs[$role], $role);
        } else {
            return self::$__instancePool[$role][$db];
        }
    }
    //调用方法
    public function __call($method, $args) {
        if (in_array($method, self::$READONLY)) {
            $handle = $this->getHandle('slave');
        } else {
            $handle = $this->getHandle();
        }
        $result = call_user_func_array(array($handle, $method), $args);
        $output = json_decode($result, true);
        if (is_array($output)) {
            $result = $output;
        }
        return $result;
    }

    /**
     * 设置key和value的值
     * @param $key
     * @param $value
     * @return bool
     */
    public function set($key, $value, $expire = -1) {
        $res = false;
        if (!empty($key)) {
            is_array($value) && $value = json_encode($value);
            if ($expire > 0) {
                $res = $this->getHandle()->setex($key, $expire, $value);
            } else {
                $res = $this->getHandle()->set($key, $value);
            }
        }
        return $res;
    }
    //屏蔽克隆
    public function __clone() {
        trigger_error('Clone is not allow!', E_USER_ERROR);
    }

}
