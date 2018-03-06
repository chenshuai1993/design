<?php
/**
 * Created by PhpStorm.
 * User: chenshuai
 * Date: 2018/3/5
 * Time: 下午5:51
 */

/**
 * Class plainCoffee
 * 这是一个煮咖啡的程序:
 */
/*class plainCoffee {
    public function makeCoffee(){
        $this->addCoffee();
    }
    public function addCoffee(){}
}*/

/**
 * Class sweetCoffee
 * 这是一个煮咖啡的程序，现在我还想加点糖，一般做法：
 */
class sweetCoffee extends plainCoffee {
    public function makeCoffee(){
        $this->addCoffee();
        $this->addSugar();
    }
    public function addSugar(){}
}

/*class plainCoffee {
    private function before(){}
    private function after(){}
    public function makeCoffee(){
        $this->before();
        $this->addCoffee();
        $this->after();
    }
    public function addCoffee(){}
}*/


class plainCoffee {
    private $decorators;
    public function addDecorator($decorator){
        $this->decorators[] = $decorator;
    }
    private function before(){
        foreach($this->decorators as $decorator){
            $decorator->before();
        }
    }
    private function after(){
        foreach($this->decorators as $decorator){
            $decorator->after();
        }
    }
    public function makeCoffee(){
        $this->before();
        $this->addCoffee();
        $this->after();
    }
    public function addCoffee(){
        echo '完成煮咖啡'.PHP_EOL;
    }
}

class sweetCoffeeDecorator{
    public function before(){
    }
    public function after(){
        $this->addSugar();
    }
    public function addSugar(){
        echo '已经加糖了';
    }
}

$coffee = new plainCoffee();
$coffee->addDecorator(new sweetCoffeeDecorator());
$coffee->makeCoffee();



$coffee = new plainCoffee();
$coffee->addDecorator(new sweetCoffeeDecorator());
$coffee->addDecorator(new milkCoffeeDecorator());
$coffee->makeCoffee();