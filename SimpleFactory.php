<?php
/**
 * Created by PhpStorm.
 * User: chenshuai
 * Date: 2018/3/4
 * Time: 下午12:00
 */

namespace php\design;

/**
 * Class SimpleFactory
 * @简单工厂类
 */
class SimpleFactory
{
    /**
     * @return Bicycle
     * 工厂模式创建自行车类
     */
    public function createBicycle() : Bicycle
    {
        return new Bicycle();
    }

    /**
     * @return Plane
     * 工厂模式创建飞机类
     */
    public function createPlane() : Plane
    {
        return new Plane();
    }
}

/**
 * Class Bicycle
 * @自行车类
 */
class Bicycle
{
    public function driveTo(string $destination)
    {
        echo $destination;
    }
}


/**
 * Class Plane
 * @飞机类
 */
class Plane
{
    public function flyTo(string $destination)
    {
        echo $destination;
    }
}


$factory = new SimpleFactory();

$bicycle = $factory->createBicycle(new Bicycle());

print_r($bicycle->driveTo('我要骑车'));


$plane = $factory->createPlane(new Plane());

print_r($plane->flyTo('我要开飞机'));

