<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/28
 * Time: 10:27
 */

$arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 13, 16, 18, 20, 22, 26, 27, 28, 29, 30];
$arr = [1, 2, 3, 5, 5, 8, 8, 8, 9, 10];

//最简单的二分查找
function bsearch($arr, $v)
{
    $n = count($arr);
    $first = 0;
    $last = $n - 1;
    while ($first <= $last) {
        $middle = (int)(($first + $last) / 2);
        if ($v == $arr[$middle]) {
            return $middle;
        } else if ($v < $arr[$middle]) {
            $last = $middle - 1;
        } else {
            $first = $middle + 1;
        }
    }
    return -1;
}

//查找第一个大于等于给定值的元素
function bsearch_first_larger_or_equal($arr, $v)
{
    $n = count($arr);
    $first = 0;
    $last = $n - 1;
    while ($first <= $last) {
        $middle = (int)(($first + $last) / 2);
        if ($v <= $arr[$middle]) {
            if ($arr[$middle - 1] < $v) return $middle;
            $last = $middle - 1;
        } else {
            $first = $middle + 1;
        }
    }
    return -1;
}

//查找最后一个小于等于给定值的元素
function bsearch_last_larger_or_equal($arr, $v)
{
    $n = count($arr);
    $first = 0;
    $last = $n - 1;
    while ($first <= $last) {
        $middle = (int)(($first + $last) / 2);
        if ($v < $arr[$middle]) {
            $last = $middle - 1;
        } else {
            if ($arr[$middle + 1] > $v) return $middle;
            $first = $middle + 1;
        }
    }
    return -1;
}

//查找第一个与给定值相同的元素
function bsearch_first($arr, $v)
{
    $n = count($arr);
    $first = 0;
    $last = $n - 1;

    while ($first <= $last) {
        $middle = (int)(($first + $last) / 2);
        if ($v <= $arr[$middle]) {
            $last = $middle - 1;
        } else {
            $first = $middle + 1;
        }
    }
    if ($arr[$first] == $v) return $first;

    return -1;
}

//查找最后一个与给定值相同的元素
function bsearch_last($arr, $v)
{
    $n = count($arr);
    $first = 0;
    $last = $n - 1;

    while ($first <= $last) {
        $middle = (int)(($first + $last) / 2);
        if ($v >= $arr[$middle]) {
            $first = $middle + 1;
        } else {
            $last = $middle - 1;
        }
    }
    if ($arr[$last] == $v) return $last;

    return -1;
}

$search = bsearch_last_larger_or_equal($arr, 6);
var_dump($search);