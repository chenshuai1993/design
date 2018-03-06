<?php
/**
 * Created by PhpStorm.
 * User: chenshuai
 * Date: 2018/3/5
 * Time: 下午4:58
 */

interface FormatterInterface
{
    public function format(string $text);
}

class PlainTextFormatter implements FormatterInterface
{
    public function format(string $text)
    {
        return $text;
    }
}


class HtmlFormatter implements FormatterInterface
{
    public function format(string $text)
    {
        return sprintf('<p>%s</p>', $text);
    }
}


abstract class Service
{
    protected $implementation;
    //初始化一个FormatterInterface的实现
    public function __construct(FormatterInterface $printer)
    {
        $this->implementation = $printer;
    }
    // 可以跟换实现
    public function setImplementation(FormatterInterface $printer)
    {
        $this->implementation = $printer;
    }
    //桥接抽象方法
    abstract public function get();
}

class HelloWorldService extends Service
{
    //桥接抽象方法的实现，这个方法是关键，因为它不在受限于原有的接口方法，而是可以自由组合修改，并且你可以编写多个类似的方法，这样就和原接口解耦了。
    public function get()
    {
        return $this->implementation->format('Hello World').'-这是修改的后缀';
    }
}

$service = new HelloWorldService(new PlainTextFormatter());
echo $service->get(); //Hello World-这是修改的后缀
//在这里切换实现很轻松
$service->setImplementation(new HtmlFormatter());
echo $service->get(); //<p>Hello World</p>-这是修改的后缀