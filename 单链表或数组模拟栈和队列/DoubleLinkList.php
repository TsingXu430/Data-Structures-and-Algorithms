<?php

/**
 * Created by PhpStorm.
 * User: Tsingxu
 * Date: 2018/11/16
 * Time: 10:27
 */
class Node
{
    public $data;
    public $prev = null;
    public $next = null;

    public function __construct($data)
    {
        $this->data = $data;
        $this->prev = null;
        $this->next = null;
    }
}


class DoubleLinkList
{
    private $header;

    public function __construct($data)
    {
        $this->header = new Node($data);
    }

    //查找指定值的结点
    public function find($item)
    {
        $cur = $this->header;
        while ($cur->data != $item) {
            $cur = $cur->next;
            if ($cur == null) {
                throw new Exception('没有该结点!');
            }
        }
        return $cur;
    }

    //查找最后一个结点
    public function findLast()
    {
        $cur = $this->header;
        while ($cur->next != null) {
            $cur = $cur->next;
        }
        return $cur;
    }

    //在指定结点后面新增结点
    public function insertAfter($item, $new)
    {
        $newNode = new Node($new);
        try {
            $cur = $this->find($item);
        } catch (Exception $e) {
            echo $e->getMessage();
            return;
        }
        if ($cur->next == null) {
            //尾部插入
            $cur->next = $newNode;
            $newNode->prev = $cur;
        } else {
            $cur->next->prev = $newNode;
            $newNode->next = $cur->next;
            $cur->next = $newNode;
            $newNode->prev = $cur;
        }

        return true;
    }

    //在尾部增加结点
    public function append($new)
    {
        $newNode = new Node($new);
        $cur = $this->header;
        while ($cur->next != null) {
            $cur = $cur->next;
        }
        $cur->next = $newNode;
        $newNode->prev = $cur;
    }

    //展示链表数据
    public function display()
    {
        $cur = $this->header;
        if ($cur->next == null) {
            echo '链表为空!';
            return;
        }
        while ($cur->next != null) {
            echo $cur->next->data . "&nbsp;&nbsp;&nbsp";
            $cur = $cur->next;
        }
    }

    //删除指定结点
    public function delete($item)
    {
        try {
            $cur = $this->find($item);
        } catch (Exception $e) {
            echo $e->getMessage();
            return;
        }
        if ($cur->next == null) {
            //尾结点
            $cur->prev->next = null;
            unset($cur);
        } else {
            $cur->prev->next = $cur->next;
            $cur->next->prev = $cur->prev;
        }
        return true;
    }

    //反转
    public function reverse()
    {
        $cur = $this->header->next;
        while ($cur != null) {
            $tmp = $cur->prev;
            $cur->prev = $cur->next;
            $cur->next = $tmp;
            if ($cur->prev == null) break;
            else $cur = $cur->prev;
        }
        $this->header->next->next = null;
        $this->header->next = $cur;
        $cur->prev = $this->header;
    }
}

$dbLink = new DoubleLinkList('header');
$dbLink->append(1);
$dbLink->append(2);
$dbLink->append(3);
$dbLink->reverse();
$dbLink->display();