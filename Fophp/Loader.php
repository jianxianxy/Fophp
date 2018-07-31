<?php
/*
 * 加载 modle 和 service 类
 */

class Loader
{
	/**
	 * load model object
	 * @param string $modelName
	 * @param string $moduleName
	 * @return object
	 */
	static public function model($moduleName,$modelName)
	{
		$modelObject = self::_loadModuleFile($moduleName,$modelName);
		return $modelObject;
	}
	/**
	 * load module file
	 * @param string $directory
	 * @param string $modelName
	 * @param string $moduleName
	 * @return object
	 */
	static private function _loadModuleFile($moduleName,$fileName)
	{
        $mod = $moduleName.'_'.$fileName;
        if(self::_get($mod))
        {
            return self::_get($mod);
        }
        $file = APP.'/'.$moduleName.'/models/'.$fileName.'.php';
		include($file);
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
        if(isset(self::$self->$name)){
            return self::$self->$name;
        }else{
            return false;
        }
    }
}