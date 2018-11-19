<?php

/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/16
 * Time: 14:50
 */
class Node
{
    public $data;
    public $next = null;

    public function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
    }
}

class CircularLinkList
{

    private $header;

    public function __construct($data)
    {
        $this->header = new Node($data);
        $this->header->next = $this->header;
    }

    public function find($item){
        $cur = $this->header;
        while($cur->data != $item){
            $cur = $cur->next;
        }
        return $cur;
    }

    public function insert($item,$new){
        $newNode = new Node($new);
        $cur = $this->find($item);
        if($cur->next == $this->header){
            //尾端插入
            $cur->next = $newNode;
            $newNode->next = $this->header;
        }else{
            $newNode->next = $cur->next;
            $cur->next = $newNode;
        }
    }

    public function append($new){
        $newNode = new Node($new);
        $cur = $this->header;
        while ($cur->next != $this->header) {
            $cur = $cur->next;
        }
        $cur->next = $newNode;
        $newNode->next = $this->header;
    }

    //展示链表数据
    public function display()
    {
        $cur = $this->header;
        if ($cur->next == $this->header) {
            echo '链表为空!';
            return;
        }
        while ($cur->next != $this->header) {
            echo $cur->next->data . "&nbsp;&nbsp;&nbsp";
            $cur = $cur->next;
        }
    }

}

$circleLink = new CircularLinkList('header');
$circleLink->append(1);
$circleLink->append(2);
$circleLink->append(3);
$circleLink->insert(3,4);
$circleLink->insert(3,3.3);
$circleLink->display();
