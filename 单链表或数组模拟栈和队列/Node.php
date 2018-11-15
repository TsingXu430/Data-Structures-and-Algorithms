<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/12
 * Time: 16:10
 */

class Node
{

    public $id;
    public $name;
    public $next;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->next = null;
    }

}