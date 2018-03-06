<?php
/**
 * Created by PhpStorm.
 * User: chenshuai
 * Date: 2018/3/6
 * Time: 上午11:04
 */

/**
 * Interface Image
 * 接口
 */
interface Image {
    public function getWidth();
}

/**
 * Class RawImage
 * 真实对象
 */
class RawImage implements Image{
    public function getWidth(){
        return "100x100";
    }
}


/**
 * @代理对象
 */
class ImageProxy implements Image{
    private $img;
    public function __construct(){
        $this->img = new RawImage();
    }
    public function getWidth(){
        return $this->img->getWidth();
    }
}


#使用
$proxy = new ImageProxy();
print_r($proxy->getWidth());