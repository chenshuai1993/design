<?php
/**
 * Created by PhpStorm.
 * User: chenshuai
 * Date: 2018/3/4
 * Time: 下午2:13
 */

class ObjectPool
{
    private $instances = [];
    public function get($key)
    {
        if(isset($this->instances[$key])){
            return $this->instances[$key];
        }else{
            $item = $this->make($key);
            $this->instances[$key]=$item;
            return $item;
        }
    }
    public function add($object, $key)
    {
        $this->instances[$key] = $object;
    }
    public function make($key){
        if($key =='mysql'){
            return 'mysql';new Mysql();
        }elseif($key =='socket'){
            return new Socket();
        }
    }
}
class ReusableObject
{
    public function doSomething()
    {
        // ...
    }
}


$obj = new ObjectPool();

$mysql = $obj->get('mysql');

print_r($mysql);