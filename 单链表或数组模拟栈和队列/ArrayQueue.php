<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/14
 * Time: 19:19
 */

class ArrayQueue
{

    private $fixedArray;
    private $size;
    private $count = 0;

    public function __construct($size)
    {
        $this->size = $size;
        $this->fixedArray = new SplFixedArray($this->size);
    }

    public function enqueue($item)
    {
        if ($this->count == $this->size) {
            return false;
        }
        if ($this->fixedArray[0] == null) {
            //数据迁移
            for ($i = 0; $i < $this->count; $i++) {
                $this->fixedArray[$i] = $this->fixedArray[$i + 1];
            }
        }
        $this->fixedArray[$this->count] = $item;
        $this->count++;
        return true;
    }

    public function dequeue()
    {
        if ($this->count == 0) {
            return false;
        }
        $tmp = $this->fixedArray[0];
        $this->fixedArray->offsetUnset(0);
        $this->count--;
        return $tmp;
    }

    public function get()
    {
        return $this->fixedArray;
    }

}

$fixArray = new ArrayQueue(4);
$fixArray->enqueue(1);
$fixArray->enqueue(2);
$fixArray->enqueue(3);
$fixArray->enqueue(4);
var_dump($fixArray->get());
$fixArray->dequeue();
var_dump($fixArray->get());
$fixArray->enqueue(5);
$fixArray->enqueue(6);
var_dump($fixArray->get());