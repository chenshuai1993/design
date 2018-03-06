<?php
/**
 * Created by PhpStorm.
 * User: chen
 * Date: 2018/3/6
 * Time: 下午4:50
 * @模板方法
 */

#旅行抽象类
abstract class Journey
{
    private $thingsToDo = [];

    //final关键字的作用是不让这个方法被子类覆盖
    final public function takeATrip()
    {
        $this->thingsToDo[] = $this->buyAFlight();
        $this->thingsToDo[] = $this->takePlane();
        $this->thingsToDo[] = $this->enjoyVacation();
        $buyGift = $this->buyGift();
        if ($buyGift !== null) {
            $this->thingsToDo[] = $buyGift;
        }
        $this->thingsToDo[] = $this->takePlane();
    }

    //子类必须实现的抽象方法
    abstract protected function enjoyVacation(): string;

    protected function buyGift()
    {
        return null;
    }

    private function buyAFlight(): string
    {
        return 'Buy a flight ticket';
    }

    private function takePlane(): string
    {
        return 'Taking the plane';
    }

    //把所有旅行中干过的事情列出来
    public function getThingsToDo(): array
    {
        return $this->thingsToDo;
    }

}


/**
 * Class BeachJourney
 * @海滩旅行类
 */
class BeachJourney extends Journey
{
    protected function enjoyVacation(): string
    {
        return "Swimming and sun-bathing";
    }
}


/**
 * Class CityJourney
 * @城市旅行类
 */
class CityJourney extends Journey
{
    protected function enjoyVacation(): string
    {
        return "Eat, drink, take photos and sleep";
    }
    //覆盖父类已有方法
    protected function buyGift(): string
    {
        return "Buy a gift";
    }
}


$city = new CityJourney();
$city->takeATrip();
print_r($city->getThingsToDo());






