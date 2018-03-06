<?php
/**
 * Created by PhpStorm.
 * User: chenshuai
 * Date: 2018/3/4
 * Time: 下午2:25
 */


/*class myclass {
    public $data;
}
$obj1 = new myclass();
$obj1->data = "aaa";
$obj2 = $obj1;
$obj2->data ="bbb";

print_r($obj1->data);
print_r($obj2->data);*/


/**
 * 字符的复制  是赋值操作
 */
/*$a = '123';
$b = $a;
$b = '456';
var_dump($a,$b);*/




$arr_a = [1,2,3];
$arr_b = $arr_a;
$arr_b[0] = 8;
var_dump($arr_a,$arr_b);