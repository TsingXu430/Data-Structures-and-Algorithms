<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/14
 * Time: 14:45
 */

class ArrayStack
{

    private $fixedArray;
    private $count = 0;
    private $size;

    public function __construct($size)
    {
        $this->size = $size;
        $this->fixedArray = new \SplFixedArray($this->size);
        return $this->fixedArray;
    }

    public function push($item)
    {
        if ($this->count == $this->size) {
            return false;
        }
        $this->fixedArray[$this->count] = $item;
        $this->count++;
        return true;
    }

    public function pop()
    {
        if ($this->count == 0) {
            return false;
        }
        $tmp = $this->fixedArray[$this->count - 1];
        $this->fixedArray->offsetUnset($this->count - 1);
        $this->count--;
        return $tmp;
    }

    public function get()
    {
        return $this->fixedArray;
    }

    public function offsetUnset($key)
    {
    }

}

$fixedArrayObj = new ArrayStack(5);
$fixedArrayObj->push(1);
$fixedArrayObj->push(2);
$fixedArrayObj->push(3);
$fixedArrayObj->push(4);
$fixedArrayObj->push(5);
var_dump($fixedArrayObj->get());
$fixedArrayObj->pop();
var_dump($fixedArrayObj->get());
$fixedArrayObj->push(6);
$fixedArrayObj->push(7);
var_dump($fixedArrayObj->get());

