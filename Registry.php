<?php
/**
 * Created by PhpStorm.
 * User: chenshuai
 * Date: 2018/3/6
 * Time: 上午11:18
 * @ 注册器模式
 */

class text
{
    public function getText()
    {
        return 'hello world';
    }
}


class Register{
    protected static $objects;
    public static function set($alias,$object){
        if(!isset($objects[$alias])){
            self::$objects[$alias]=$object;
        }
    }
    public static function get($alias){
        return self::$objects[$alias];
    }
    public static function _unset($alias){
        unset(self::$objects[$alias]);
    }
}

Register::set('rand',new text());
var_dump(Register::get('rand')->getText());