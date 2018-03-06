<?php
/**
 * Created by PhpStorm.
 * User: chenshuai
 * Date: 2018/3/4
 * Time: 下午6:03
 */

interface Database
{
    public function conn();

    public function query();

    public function close();
}


class Mysql implements Database
{
    public function conn()
    {
        #...
    }

    public function query()
    {
        #...
    }

    public function close()
    {
        #..
    }
}

class Pdo implements Database
{
    public function conn()
    {
        // TODO: Implement conn() method.
    }

    public function query()
    {
        // TODO: Implement query() method.
    }

    public function close()
    {
        // TODO: Implement close() method.
    }
}


//正常类使用

$database = new Mysql();

$database->conn();
$database->query();
$database->close();



//第三方数据库类
class Oracle
{
    public function oracleConnect()
    {
        //Oracle 的逻辑
    }

    public function oracleQuery()
    {
        //Oracle 的逻辑
    }

    public function oracleClose()
    {
        //Oracle 的逻辑
    }
}


//适配器
class Adapter implements Database
{
    #//这里把异类的方法转换成了 接口标准方法，下同
    protected $adapter;

    public function __construct($adapter)
    {
        $this->adapter = $adapter;
    }

    public function conn()
    {
        // TODO: Implement conn() method.
        $this->adapter->oracleConn();
    }

    public function query()
    {
        // TODO: Implement query() method.
        $this->adapter->oracleQuery();
    }

    public function close()
    {
        // TODO: Implement close() method.
        $this->adapter->oracleClose();
    }


}


//适配器使用

$adapter = new Oracle();

$database = new Adapter($adapter); #这样的话  如果需要替换,只是重写适配器
$database->conn();
$database->query();
$database->close();