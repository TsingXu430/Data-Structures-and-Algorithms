<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/26
 * Time: 14:49
 */
$arr = [3, 2, 6, 8, 4, 5, 1, 7, 9];

function quick_sort($arr)
{

    $len = count($arr);

    if ($len <= 1) {
        return $arr;
    }

    $n = floor($len / 2);
    $middle = $arr[$n];
    $left = [];
    $right = [];

    for ($i = 0; $i < $len; $i++) {
        if ($arr[$i] < $middle) {
            $left[] = $arr[$i];
        }
        if ($arr[$i] > $middle) {
            $right[] = $arr[$i];
        }
    }

    $left = quick_sort($left);
    $right = quick_sort($right);

    return array_merge($left, array($middle), $right);
}

function quick_sort2_insitu()
{

}

$new = quick_sort($arr);
var_dump($new);