<?php
/*
 * 加载 modle 和 service 类
 */
namespace Fophp;

class Loader
{
	/**
	 * load model object
	 * @param string $modelName
	 * @param string $moduleName
	 * @return object
	 */
	static public function model($modelName, $moduleName=MODULE)
	{
		$modelObject = self::_loadModuleFile('models', $modelName, $moduleName);
		return $modelObject;
	}
	
	/**
	 * load service object
	 * @param string $serviceName
	 * @param string $moduleName
	 * @return object
	 */
	static public function service($serviceName, $moduleName=MODULE)
	{
		$serviceObject = self::_loadModuleFile('services', $serviceName, $moduleName);
		return $serviceObject;
	}
	/**
	 * load module file
	 * @param string $directory
	 * @param string $modelName
	 * @param string $moduleName
	 * @return object
	 */
	static private function _loadModuleFile($directory, $fileName, $moduleName)
	{
        $mod = $moduleName.'_'.$fileName;
        if(self::_get($mod))
        {
            return self::_get($mod);
        }
        $file = M.'/'.$moduleName.'/'.$directory.'/'.$fileName.'.php';
		include($file);
		$fileName .= ($directory == 'models') ? 'Model' : 'Service';
        $fileObject = new $fileName;
        self::_set($mod,$fileObject);
        return $fileObject;
	}
    //设置动态属性
    public static function _set($name, $value) 
    {
        $reg = Regload::getInstance();
        $reg->__set($name,$value);
    }
    //获取动态属性
    public static function _get($name) 
    {
       $reg = Regload::getInstance();
       return $reg->__get($name);
    }
}
//注册已加载的Loader类。
class Regload
{
    static $self = '';
    private function __construct(){}
    public static function getInstance()
    {
        if(!(self::$self instanceof self))
        {
            self::$self = new Regload();
        }
        return self::$self;
    }
    public function __set($name,$value)
    {
        self::$self->$name = $value;
    }
    public function __get($name)
    {
        return self::$self->$name;
    }
}