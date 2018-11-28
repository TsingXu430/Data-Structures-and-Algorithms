<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/27
 * Time: 15:42
 */
$arr = [2, 5, 4, 0, 2, 5, 3];  //0,2,2,3,4,5,5

function bucket_sort($arr)
{
    $n = count($arr);
    $bucket = [];
    $new = [];
    for ($i = 0; $i < $n; $i++) {
        $bucket[$i] = 0;
    }
    for ($i = 0; $i < $n; $i++) {
        $bucket[$arr[$i]]++;
    }
    foreach ($bucket as $k => $v) {
        if ($v > 0) {
            for ($i = 0; $i < $v; $i++) {
                array_push($new, $k);
            }
        }
    }
    return $new;
}

$new = bucket_sort($arr);
var_dump($new);