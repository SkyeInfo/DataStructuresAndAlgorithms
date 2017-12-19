<?php
/**
 * 冒泡排序
 * @author: skyeinfo@qq.com
 * Last Modify Time 2017/12/15-17:48
 * Last Modify By skyeinfo@qq.com
 */

/**
 * 冒泡排序算法
 * @author: skyeinfo@qq.com
 * Last Modify Time 2017/12/15-17:50
 * Last Modify By skyeinfo@qq.com
 * @param $arr
 * @return $arr
 */
function bubbleSort(array $arr){
    $count = count($arr);

    for ($i = 0; $i < $count; $i++){
        for ($j = $i + 1; $j < $count; $j++){
            if ($arr[$i] > $arr[$j]){

                $temp    = $arr[$j];
                $arr[$j] = $arr[$i];
                $arr[$i] = $temp;
            }
        }
    }
    
    return $arr;
}
$testArr = array(6,4,16,5,9,23,22,65,11);

print_r(bubbleSort($testArr));
