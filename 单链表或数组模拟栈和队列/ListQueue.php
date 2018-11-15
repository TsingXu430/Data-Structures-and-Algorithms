<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/15
 * Time: 16:20
 */

require_once("Node.php");

class ListQueue
{
    private $header;
    private $tail;

    public function __construct($id = null, $name = null)
    {
        $this->header = $this->tail = new Node($id, $name, null);
    }

    public function enqueue($node)
    {
        $this->tail->next = $node;
        $this->tail = $node;
        return true;
    }

    public function dequeue()
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

$listQueue = new ListQueue();
$listQueue->enqueue(new Node(1, 'name1'));
$listQueue->enqueue(new Node(2, 'name2'));
$listQueue->enqueue(new Node(3, 'name3'));
$listQueue->enqueue(new Node(4, 'name4'));
$listQueue->get();
$listQueue->dequeue();
$listQueue->get();