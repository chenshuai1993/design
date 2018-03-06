<?php
/**
 * Created by PhpStorm.
 * User: chen
 * Date: 2018/3/6
 * Time: 下午5:53
 * @状态模式
 */


class Shop {
    private $handler;

    //这里$state设置一个状态值
    public $state;

    //设置默认状态，和默认处理器
    public function __construct() {
        $this->state = 'male';
        $this->handler = new maleHandler();
    }
    public function setHandler(Handler $handler) {
        $this->handler = $handler;
    }
    public function show() {
        $this->handler->handle($this);
    }
}

#handler.php 业务处理接口类
interface Handler {
    public function handle(Shop $shop);
}


#maleHandler.php 男性业务处理类
class maleHandler implements Handler
{
    public function handle(Shop $shop)
    {
        if($shop->state =="male"){
            echo '展示男性商品目录',PHP_EOL;
        }else{
            $shop->setHandler(new femaleHandler());
            $shop->show();
        }
    }
}


#femaleHandler.php 女性业务处理类
class femaleHandler implements Handler
{
    public function handle(Shop $shop)
    {
        if($shop->state =="female"){
            echo '展示女性商品目录',PHP_EOL;
        }else{
            $shop->setHandler(new maleHandler());
            $shop->show();
        }
    }
}



$shop = new Shop;
$shop->state ="male";
$shop->show();
//展示男性商品目录
$shop->state ="female";
$shop->show();
//展示女性商品目录