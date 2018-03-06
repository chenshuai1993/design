<?php
/**
 * Created by PhpStorm.
 * User: chenshuai
 * Date: 2018/3/6
 * Time: 上午9:59
 */

/*class Mysql{
    private $host;
    private $port;
    private $username;
    private $password;
    private $db_name;
    public function __construct(){
        $this->host = '127.0.0.1';
        $this->port = 22;
        $this->username = 'root';
        $this->password = '';
        $this->db_name = 'my_db';
    }
    public function connect(){
        return mysqli_connect($this->host,$this->username ,$this->password,$this->db_name,$this->port);
    }
}

$db = new Mysql();
$con = $db->connect();*/
##通常应该设计为单例，这里就先不搞复杂了。


class MysqlConfiguration
{
    private $host;
    private $port;
    private $username;
    private $password;
    private $db_name;
    public function __construct(string $host, int $port, string $username, string $password,string $db_name)
    {
        $this->host = $host;
        $this->port = $port;
        $this->username = $username;
        $this->password = $password;
        $this->db_name = $db_name;
    }
    public function getHost(): string
    {
        return $this->host;
    }
    public function getPort(): int
    {
        return $this->port;
    }
    public function getUsername(): string
    {
        return $this->username;
    }
    public function getPassword(): string
    {
        return $this->password;
    }
    public function getDbName(): string
    {
        return $this->db_name;
    }
}


class Mysql
{
    private $configuration;
    public function __construct(MysqlConfiguration $config)
    {
        $this->configuration = $config;
    }
    public function connect(){
        return mysqli_connect($this->configuration->getHost(),$this->configuration->getUsername() ,$this->configuration->getPassword,$this->configuration->getDbName(),$this->configuration->getPort());
    }
}

$config = new MysqlConfiguration('127.0.0.1','root','','my_db',22);
$db = new Mysql($config);
$con = $db->connect();

#$config是注入Mysql的，这就是所谓的依赖注入。
