<?php
/**
 * Created by PhpStorm.
 * User: chen
 * Date: 2018/3/6
 * Time: 下午5:19
 * @策略模式
 */

/**
 * Interface showStrategy
 * @策略接口
 */
interface showStrategy{
    public function showCategory();
}


/**
 * Class maleShowStrategy
 * @男性策略
 */
class maleShowStrategy implements showStrategy { // 具体策略A
    public function showCategory(){
        echo '展示男性商品目录';
    }
}


/**
 * Class femaleShowStrategy
 * @女性策略
 */
class femaleShowStrategy implements showStrategy { // 具体策略B
    public function showCategory(){
        echo '展示女性商品目录';
    }
}


/**
 * Class Page
 * @展示页面
 */
class Page{
    private $_strategy;
    public function __construct(showStrategy $strategy) {
        $this->_strategy = $strategy;
    }
    public function showPage() {
        $this->_strategy->showCategory();
    }
}

$arr['male'] = 1;

if(isset($arr['male'])){
    $strategy = new maleShowStrategy();
}elseif(isset($arr['female'])){
    $strategy = new femaleShowStrategy();
}
//注意看这里上下，Page类不再依赖一种具体的策略，而是只需要绑定一个抽象的接口，这就是传说中的控制反转（IOC）。
$question = new Page($strategy);
$question->showPage();


/*总结
仔细看上面的例子，不复杂，我们发现有2个好处：

它把if else 抽离出来了，不需要在每个类里都写if else；
它成功的实现了控制反转，Page类里没有具体的依赖策略，这样我们就可以随时添加和删除 不同的策略。*/