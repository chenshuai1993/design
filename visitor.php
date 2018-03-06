<?php
/**
 * Created by PhpStorm.
 * User: chenshuai
 * Date: 2018/3/4
 * Time: 上午11:34
 * 访问器模式
 */

class Visitor{

}

class Unit{
    //注意这个方法，非常关键，你现在可能没看懂，接着往下看，然后再回来看。
    public function accept(Visitor $visitor){
        $method = 'visit'. get_class($this);

        if (method_exists($visitor, $method)) {
            $visitor->$method($this);
        }
    }
}


class User extends Unit{
    public function getName(){
        //获取名字
        return 'chen';
    }
}

class getPhoneVistor extends Visitor{
    public function visitUser(){
        //获取电话
        echo  '1771067....';
    }
}



$user = new User();
//正常获取名字
#$user->getName();
//通过访问者获取电话
$phone =  $user->accept(new getPhoneVistor());

print_r($phone);