<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/12
 * Time: 16:12
 */

require_once("Node.php");

class SingelLinkList
{
    private $header; //头结点

    public function __construct($id = null, $name = null)
    {
        $this->header = new \Node($id, $name, null);
    }

    public function getLinkLength()
    {
        $i = 0;
        $current = $this->header;
        while ($current->next != null) {
            $i++;
            $current = $current->next;
        }
        return $i;
    }

    public function addLink($node)
    {
        $current = $this->header;
        while ($current->next != null) {
            if ($current->next->id > $node->id) {
                break;
            }
            $current = $current->next;
        }
        $node->next = $current->next;
        $current->next = $node;
    }

    public function delLink($id)
    {
        $current = $this->header;
        $flag = false;
        while ($current->next != null) {
            if ($current->next->id == $id) {
                $flag = true;
                break;
            }
            $current = $current->next;
        }
        if ($flag) {
            $current->next = $current->next->next;
        } else {
            echo "未找到id=" . $id . "的节点！<br>";
        }
    }

    public function isEmpty()
    {
        return $this->header == null;
    }

    public function clear()
    {
        $this->header = null;
    }

    public function getLinkList()
    {
        $current = $this->header;
        if ($current->next == null) {
            echo "链表为空";
        }
        while ($current->next != null) {
            echo 'id:' . $current->next->id . ' name:' . $current->next->name . '<br/>';
            $current = $current->next;
        }
    }

    public function getMiddleLink()
    {
        $slow = $fast = $this->header;
        while ($fast != null) {
            if ($fast->next == null) {
                break;
            }
            $fast = $fast->next->next;
            $slow = $slow->next;
        }
        echo '中间节点id:' . $slow->id;
    }

    public function reverse()
    {
        if ($this->header == null) {
            echo '链表为空';exit;
        }
        $prev = null;
        $p = $this->header;
        while ($p != null) {
            $tmp = $p->next;
            $p->next = $prev;
            $prev = $p;
            $p = $tmp;
        }
        $this->header = $prev;
    }

    public function getFirstLink(){
        return $this->header->next;
    }

}

$lists = new SingelLinkList();
$lists->addLink(new Node(5, 'eeee'));
$lists->addLink(new Node(1, 'aaaa'));
$lists->addLink(new Node(6, 'ffff'));
$lists->addLink(new Node(4, 'dddd'));
$lists->addLink(new Node(3, 'cccc'));
$lists->addLink(new Node(2, 'bbbb'));
$lists->getLinkList();
$lists->reverse();
$lists->getLinkList();
