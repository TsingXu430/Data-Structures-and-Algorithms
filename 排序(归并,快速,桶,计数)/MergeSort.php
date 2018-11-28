<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/22
 * Time: 10:33
 */

$arr = [3, 2, 6, 8, 4, 5, 7, 9];

function merge_sort(&$arr)
{
    $len = count($arr);
    split_array($arr, 0, $len - 1);
}

function split_array(&$arr, $start, $end)
{
    if ($start < $end) {
        var_dump('split_array: start:' . $start . ' end:' . $end);
        $center = floor(($start + $end) / 2);
        split_array($arr, $start, $center);
        split_array($arr, $center + 1, $end);
        merge_array($arr, $start, $center, $end);
    }
}

function merge_array(&$arr, $start, $center, $end)
{
    var_dump('merge_array: start:' . $start . ' center:' . $center . ' end:' . $end);
    $i = $start;
    $j = $center + 1;
    $temp = [];
    $k = $start;

    while ($i <= $center && $j <= $end) {
        if ($arr[$i] < $arr[$j]) {
            $temp[$k++] = $arr[$i++];
        } else {
            $temp[$k++] = $arr[$j++];
        }
    }
    while ($i <= $center) {
        $temp[$k++] = $arr[$i++];
    }
    while ($j <= $end) {
        $temp[$k++] = $arr[$j++];
    }
    for ($i = $start; $i <= $end; $i++) {
        $arr[$i] = $temp[$i];
    }
}

merge_sort($arr);
var_dump($arr);


