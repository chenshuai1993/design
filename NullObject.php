<?php
/**
 * Created by PhpStorm.
 * User: chen
 * Date: 2018/3/6
 * Time: 下午5:47
 * @空对象模式
 */

interface Animal {
    public function makeSound();
}
class Dog implements Animal {
    public function makeSound() {
        echo "Woof..";
    }
}
class Cat implements Animal {
    public function makeSound() {
        echo "Meowww..";
    }
}
//这个就是空对象，里面的方法啥也不做，它的存在就是为了避免报错
class NullAnimal implements Animal {
    public function makeSound() {
        // silence...
    }
}


$animalType = 'elephant';
switch($animalType) {
    case 'dog':
        $animal = new Dog();
        break;
    case 'cat':
        $animal = new Cat();
        break;
    default:
        $animal = new NullAnimal();
        break;
}
$animal->makeSound(); // ..the null animal makes no sound