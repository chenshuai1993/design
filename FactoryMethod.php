<?php
/**
 * Created by PhpStorm.
 * User: chenshuai
 * Date: 2018/3/4
 * Time: 下午1:46
 */

/* 工厂和产品接口 */
/**
 * Interface CarFactory
 * @汽车工厂接口
 */
interface CarFactory
{
    public function makeCar();

}


/**
 * Interface Car
 * @小轿车接口
 */
interface Car
{
    public function getType();

}


/* 工厂和产品实现 */

/**
 * Class SedanFactory
 * 轿车工厂
 */
class SedanFactory implements CarFactory
{
    public function makeCar()
    {
        return new Sedan();
    }
}


/**
 * Class Sedan
 * 轿车类
 */
class Sedan implements Car
{
    public function getType()
    {
        return 'sedan';
    }
}


/**
 * 实现用法
 */
$factory = new SedanFactory();

$sedan = $factory->makeCar();

print_r($sedan->getType());








