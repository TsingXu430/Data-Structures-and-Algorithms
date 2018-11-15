<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/14
 * Time: 19:42
 */

require_once("Node.php");

class ListStack
{

    private $header;

    public function __construct($id = null, $name = null)
    {
        $this->header = new Node($id, $name, null);
    }

    public function push($node)
    {
        $node->next = $this->header->next;
        $this->header->next = $node;
    }

    public function pop()
    {
        if ($this->header->next == null) {
            echo '链表为空';
            exit;
        }
        $this->header->next = $this->header->next->next;
    }

    public function get()
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
}

$listStack = new ListStack();
$listStack->push(new Node(1, 'name1'));
$listStack->push(new Node(2, 'name2'));
$listStack->push(new Node(3, 'name3'));
$listStack->get();
$listStack->pop();
$listStack->get();