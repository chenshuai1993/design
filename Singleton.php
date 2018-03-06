<?php
/**
 * Created by PhpStorm.
 * User: chenshuai
 * Date: 2018/3/4
 * Time: 上午11:52
 * @单例模式
 */


class Singleton {

    private static $conn;

    public function __construct()
    {
        self::$conn = mysqli_connect('localhost','root','xxx');
    }


    public static function getInstance()
    {
        if(!(self::$conn instanceof self)){
            self::$conn = new self();
        }

        return self::$conn;
    }


    //防止对象被复制
    public function __clone(){
        trigger_error('Clone is not allowed !');
    }
    //防止反序列化后创建对象
    private function __wakeup(){
        trigger_error('Unserialized is not allowed !');
    }
}


//只能这样取得实例，不能new 和 clone
$mysql = Singleton::getInstance();