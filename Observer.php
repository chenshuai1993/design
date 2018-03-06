<?php
/**
 * Created by PhpStorm.
 * User: chen
 * Date: 2018/3/6
 * Time: 下午2:55
 * @观察者模式
 */



abstract class EventGenerator
{
    private $observers = [];

    #添加观察者方法
    public function addObserver(Observer $observer)
    {
        $this->observers[] = $observer;
    }


    //对每个添加的观察者进行事件通知
    public function notify()
    {
        //对每个观察者逐个进行更新
        foreach ($this->observers as $observer){
            $observer->update();
        }
    }

}

/**
 * Interface observer
 * 定义观察者接口
 */
interface observer
{
    public function update($event_info = null);

}


/**
 * Class Event
 * 具体事件类,继承了主事件
 */
class Event extends EventGenerator
{
    public function trigger()
    {
        echo 'Event',PHP_EOL;
        $this->notify();
    }
}


#声明多个观察者

class Observer1 implements observer
{
    public function update($event_info = null)
    {
        // TODO: Implement update() method.
        echo '逻辑1',PHP_EOL;
    }
}



class Observer2 implements observer
{
    public function update($event_info = null)
    {
        // TODO: Implement update() method.
        echo '逻辑2',PHP_EOL;
    }
}

class Observer3 implements observer
{
    public function update($event_info = null)
    {
        // TODO: Implement update() method.
        echo '逻辑3',PHP_EOL;
    }
}


#使用
$event = new Event();
$event->addObserver(new Observer1());
$event->addObserver(new Observer2());
$event->addObserver(new Observer3());

$event->trigger();
