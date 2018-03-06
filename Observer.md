观察者模式（Observer）
---

### 大概什么意思
>观察者是一种非常常用的模式，具体在 事件的设计上 体现最明显。
 在laravel的事件设计中，我们知道有一个listener 和一个handler, 当listener侦听到一个事件发生时，可能有多个handler会与之对应自动处理各自的业务逻辑。
 
 这是怎么实现的呢？
 
 ### 不好的事件写法
```$xslt
class Event
{
  function trigger()
  {
     echo "Event update!<br/>";
     //具体更新逻辑
     echo "update1<br/>";
     echo "update2<br/>";
      // ...
  }
}
//使用
$event = new Event;
$event->triger();
```

事件和处理逻辑写到一起，太糟糕了，我还要事件干嘛，直接写逻辑就可以了。

### 合理的设计

//声明一个抽象的事件发生者基类
```$xslt
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
```

//声明一个观察者接口
```$xslt
/**
 * Interface observer
 * 定义观察者接口
 */
interface observer
{
    public function update($event_info = null);

}
```


//声明具体事件类，继承了主事件
```$xslt
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
```


//声明多个观察者
```$xslt
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
```


//使用
```$xslt
$event = new Event();
$event->addObserver(new Observer1());
$event->addObserver(new Observer2());
$event->addObserver(new Observer3());

$event->trigger();
```

仔细观察代码其实很简单的，Event基类里的foreach，可以实现一个事件对应多个观察者；
在这里我们搞明白了，所谓观察者其实就是事件的handler，它和事件怎么挂钩呢，其实是需要注册一下；

```$xslt
$event->addObserver(new Observer1);
$event->addObserver(new Observer2);
```
而这个步骤
```$xslt
$event = new Event;
$event->trigger();
```
在laravel里被封装成了
```$xslt
event(new Event());
```

### 感言
随着设计模式学习的深入，我们对很多laravel架构设计的套路也慢慢清晰起来。



