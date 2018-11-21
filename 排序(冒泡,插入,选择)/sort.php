<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/20
 * Time: 17:05
 */

$arr = [3, 2, 6, 8, 4, 5, 7, 9];

$arr2 = [7, 9, 4, 2, 6, 5, 3, 8];

/*
 * 冒泡排序
 */
function bubble_sort($arr)
{
    $n = count($arr);
    $count = 0;
    if (1 == $n) return $arr;
    for ($i = 0; $i < $n; $i++) {
        $flag = false;//没有数据交换标志，可以提早结束循环
        $count++;//循环次数
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {
                $tmp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $tmp;
                $flag = true;
            }
        }
        if (!$flag) break;
    }
    return $arr;
}

/*
 * 插入排序
 */
function insert_sort($arr)
{
    $n = count($arr);
    for ($i = 1; $i < $n; $i++) {
        $value = $arr[$i];
        for ($j = $i - 1; $j >= 0; $j--) {
            if ($value < $arr[$j]) {
                $arr[$j + 1] = $arr[$j];
            } else {
                break;
            }
            $arr[$j] = $value;
        }
    }
    return $arr;
}

/*
 * 选择排序
 */
function select_sort($arr)
{
    $n = count($arr);
    for ($i = 0; $i < $n - 1; $i++) {
        $min = $arr[$i];
        for ($j = $i + 1; $j < $n; $j++) {
            if ($arr[$j] < $min) {
                $arr[$i] = $arr[$j];
                $arr[$j] = $min;
                break;
            }
        }
    }
    return $arr;
}

/*
 * 希尔排序
 */
function shell_sort($arr)
{
    $count = count($arr);
    $inc = $count;
    do {
        $inc = ceil($inc / 2);
        for ($i = $inc; $i < $count; $i++) {
            for ($j = $i - $inc; $j >= 0 && $arr[$j + $inc] < $arr[$j]; $j -= $inc) {
                $temp = $arr[$j + $inc];
                $arr[$j + $inc] = $arr[$j];
                $arr[$j] = $temp;
            }
        }
    } while ($inc > 1);
    return $arr;
}

//$new = bubble_sort($arr);
//$new = insert_sort($arr2);
//$new = select_sort($arr);
$new = shell_sort($arr2);
var_dump($new);