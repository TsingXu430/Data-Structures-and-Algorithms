<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/19
 * Time: 10:32
 */

class ArrayCircularQueue
{
    private $fixArray;
    private $head = 0;
    private $tail = 0;
    private $n;
    private $size;

    public function __construct($n)
    {
        $this->n = $n;
        $this->fixArray = new SplFixedArray($n);
    }

    public function enQueue($new)
    {
        $next = ($this->tail + 1) % $this->n;
        //队满
        if ($next == $this->head) return false;
        $this->fixArray[$this->tail] = $new;
        $this->tail = $next;
        return true;
    }

    public function en($new)
    {
        if ($this->size == $this->fixArray->count()) return false;
        $this->fixArray[$this->tail] = $new;
        $this->tail = ($this->tail + 1) % $this->n;
        $this->size++;
        return true;
    }

    public function deQueue()
    {
        //队空
        if ($this->size <= 0) return false;
        $tmp = $this->fixArray[$this->head];
        $this->fixArray->offsetUnset($this->head);
        $this->head = ($this->head + 1) % $this->n;
        $this->size --;
        return $tmp;
    }

    public function display()
    {
        var_dump($this->fixArray);
    }

}

$fixArray = new ArrayCircularQueue(3);
$fixArray->en(1);
$fixArray->en(2);
$fixArray->en(3);
$fixArray->display();
$fixArray->deQueue();
$fixArray->deQueue();
$fixArray->deQueue();
$fixArray->en(4);
$fixArray->display();
/*$fixArray->enQueue(1);
$fixArray->enQueue(2);
$fixArray->enQueue(3);
$fixArray->enQueue(4);
$fixArray->display();
$fixArray->deQueue();
$fixArray->deQueue();
$fixArray->display();
$fixArray->enQueue(5);
$fixArray->enQueue(6);
$fixArray->display();*/