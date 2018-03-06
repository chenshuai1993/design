<?php
/**
 * Created by PhpStorm.
 * User: chen
 * Date: 2018/3/6
 * Time: 下午5:57
 * @命令模式
 */
//命令接口

interface Command{
    public function excecute();
}
//开电视指令
class turnOnTVCommand implements Command{
    private $controller;
    public function __construct(Controller $controller){
        $this->controller = $controller;
    }
    public function excecute(){
        $this->controller->turnOnTV();
    }
}
//关电视指令
class turnOffTVCommand implements Command{
    private $controller;
    public function __construct(Controller $controller){
        $this->controller = $controller;
    }
    public function excecute(){
        $this->controller->turnOffTV();
    }
}

//指令库控制器（储存所有具体执行逻辑）
class Controller {
    public function turnOnTV(){
        echo '打开电视';
    }
    public function turnOffTV(){
        echo '关闭电视';
    }
}


$command_string = 'turnOnTV'.'Command';
$command_string = 'turnOffTV'.'Command';
$command = new $command_string(new Controller());
$command->excecute();