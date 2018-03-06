<?php
/**
 * Created by PhpStorm.
 * User: chenshuai
 * Date: 2018/3/6
 * Time: 上午10:24
 */

class Employee
{
    public $name;
    public $surName;
    public $salary;
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    public function setSurname($surname)
    {
        $this->surName = $surname;
        return $this;
    }
    public function setSalary($salary)
    {
        $this->salary = $salary;
        return $this;
    }
    public function __toString()
    {
        $employeeInfo = 'Name: ' . $this->name . PHP_EOL;
        $employeeInfo .= 'Surname: ' . $this->surName . PHP_EOL;
        $employeeInfo .= 'Salary: ' . $this->salary . PHP_EOL;
        return $employeeInfo;
    }
}
//链式操作的效果
$employee = (new Employee())
    ->setName('Tom')
    ->setSurname('Smith')
    ->setSalary('100');
echo $employee;
# 输出结果
# Name: Tom
# Surname: Smith
# Salary: 100