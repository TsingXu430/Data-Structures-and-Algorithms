<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/27
 * Time: 11:21
 */
$arr = [3, 2, 6, 8, 4, 5, 7, 9];

$arr = [2, 5, 4, 0, 2, 5, 3];  //0,2,2,3,4,5,5

function count_sort($arr)
{
    $n = count($arr);
    $c = [];
    $max = $arr[0];
    for ($i = 1; $i < $n; $i++) {
        if ($arr[$i] > $max) {
            $max = $arr[$i];
        }
    }
    for ($i = 0; $i <= $max; $i++) {
        $c[$i] = 0;
    }
    for ($i = 0; $i < $n; $i++) {
        $c[$arr[$i]]++;
    }
    for ($i = 1; $i <= $max; $i++) {
        $c[$i] = $c[$i - 1] + $c[$i];
    }
    //倒叙遍历原数组
    $new = [];
    for ($i = 0; $i < $n; $i++) {
        $new[$i] = 0;
    }
    for ($i = $n - 1; $i >= 0; $i--) {
        $index = $c[$arr[$i]] - 1;
        $new[$index] = $arr[$i];
        $c[$arr[$i]]--;
    }
    return $new;
}

$new = count_sort($arr);
var_dump($new);