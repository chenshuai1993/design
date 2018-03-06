<?php
/**
 * Created by PhpStorm.
 * User: chenshuai
 * Date: 2018/3/6
 * Time: 上午10:14
 */

/*概念
用过Laravel的朋友的应该熟悉，Laravel给我们科普了一个概念Facade，然而Laravel中的Facade并不是真正设计模式中定义的Facade，那么为什么它们都叫一个名字呢？

我们还是先来了解一下Facade这个单词的意思吧。
首先它的读音是[fəˈsɑːd]，源自法语 façade，法语这个词原意就是frontage，意思是建筑的正面，门面，由于以前法国，意大利的建筑只注重修葺临街的一面，十分精美，而背后却比较简陋，所以这个词引申的意思是表象，假象。

先讲设计模式中的概念
在设计模式中，其实Facade这个概念十分简单。

它主要讲的是设计一个接口来统领所有子系统的功能。看完下面这个例子就明白了：*/

class CPU{
    public function freeze() {}
    public function jump() {}
    public function execute() {}
}
class HardDrive {
    public function read($boot_sector, $sector_size){}
}
class Memory {
    public function load($boot_address, $hd_data) {}
}
#这是三个电脑中的子系统，我们需要写一个总系统来组织它们之间的关系，这其实就是Facade：

class ComputerFacade {
    private $cpu;
    private $ram;
    private $hd;
    public function __construct() {
        $this->cpu = new CPU();
        $this->ram = new Memory();
        $this->hd = new HardDrive();
    }
    public function start() {
        $this->cpu->freeze();
        $this->ram->load(BOOT_ADDRESS, $this->hd->read(BOOT_SECTOR, SECTOR_SIZE));
        $this->cpu->jump(BOOT_ADDRESS);
        $this->cpu->execute();
    }
}

#使用：

$computer = new ComputerFacade();
$computer->start();
#门面模式其实就是这么回事，由一个门面（入口）把所有子系统隐藏起来了，只需要操作门面就可以。

/*Laravel中的Facade
要使用某个类中的方法，必须先实例化它。
Laravel中的Facade作用是避免使用new关键字实例化类，而是通过一个假静态方法最快的使用某一个类中的某个方法。

比如*/

use Illuminate\Support\Facades\Cache;
Route::get('/cache', function () {
    return Cache::get('key');
});
#如果你到Illuminate\Support\Facades\Cache这个类里去看，会发现根本不存在一个get静态方法，但是这个Illuminate\Support\Facades\Cache的父类中，有一个魔术方法__callStatic(), 当调用不存在的静态方法时，会激活这个魔术方法，这个魔术方法里，会通过IOC容器找到真正的Cache类，并调用真实存在的get方法。

#所以这里的Facade，就是个假的静态，从语言的意思上，其实更符合Facade的语义。