<?php
/**
 * 二分查找
 * 针对有序数据，时间复杂度O(logn)
 * 适用于顺序表结构
 * @author skyeinfo@qq.com
 * @lastModifyTime 2018/11/26
 * @lastModify skyeinfo@qq.com
 */
namespace Search;

class BinarySearch
{
    /**
     * 查找$arr中是否有value
     * 同样可以用递归实现
     * @author skyeinfo@qq.com
     * @lastModifyTime 2018/11/26
     * @lastModify skyeinfo@qq.com
     * @param array $arr
     * @param $value
     * @return int
     */
    public function main(array $arr, $value) {
        $low = 0;
        $high = count($arr) - 1;

        while ($low <= $high) {
            $mid = $low + (($high - $low) >> 1);   //注意运算优先级

            if ($arr[$mid] > $value) {
                $high = $mid - 1;
            } else if ($arr[$mid] < $value) {
                $low = $mid + 1;
            } else {
                if (($mid == 0) || ($arr[$mid - 1] != $value)) {
                    return $mid;
                } else {
                    $high = $mid - 1;   //查找第一个等于value的值
                }

//                if (($mid == count($arr) - 1) || ($arr[$mid + 1] != $value)) {
//                    return $mid;
//                } else {
//                    $low = $mid + 1;   //查找最后一个等于value的值
//                }

            }
        }

        return -1;
    }

    /**
     * 查找第一个大于等于value的数据
     * @author skyeinfo@qq.com
     * @lastModifyTime 2018/11/26
     * @lastModify skyeinfo@qq.com
     * @param array $arr
     * @param $value
     * @return int
     */
    public function mainOne(array $arr, $value) {
        $low = 0;
        $high = count($arr) - 1;

        while ($low <= $high) {
            $mid = $low + (($high - $low) >> 1);   //注意运算优先级

            if ($arr[$mid] >= $value) {
                if ($mid == 0 || $arr[$mid - 1] < $value) {
                    return $mid;
                } else {
                    $high = $mid - 1;
                }
            } else {
                $low = $low + 1;
            }
        }

        return -1;
    }

    /**
     * 查找最后一个小于等于value的数据
     * @author skyeinfo@qq.com
     * @lastModifyTime 2018/11/26
     * @lastModify skyeinfo@qq.com
     * @param array $arr
     * @param $value
     * @return int
     */
    public function mainTwo(array $arr, $value) {
        $low = 0;
        $high = count($arr) - 1;

        while ($low <= $high) {
            $mid = $low + (($high - $low) >> 1);   //注意运算优先级

            if ($arr[$mid] <= $value) {
                if (($mid == count($arr) - 1) || $arr[$mid + 1] > $value) {
                    return $mid;
                } else {
                    $low = $mid + 1;
                }
            } else {
                $high = $high - 1;
            }
        }

        return -1;
    }

    /**
     * 循环数组二分查找
     * @author skyeinfo@qq.com
     * @lastModifyTime 2018/11/26
     * @lastModify skyeinfo@qq.com
     * @param array $arr
     * @param $value
     * @return int
     */
    public function searchCircle(array $arr, $value) {
        $low = 0;
        $length = count($arr);
        $high = $length - 1;

        while ($low <= $high) {
            $mid = $low + (($high - $low) >> 1);

            if ($arr[$mid] == $value) { return $mid; }
            if ($arr[$low] == $value) { return $low; }
            if ($arr[$high] == $value) { return $high; }

            if ($arr[$mid] > $arr[$low]) {
                if ($arr[$mid] < $value) {
                    $low = $mid + 1;
                } else {
                    if ($value > $arr[$low]) {
                        $high = $mid - 1;
                    } else {
                        $low = $mid + 1;
                    }
                }
            } else {
                if ($value > $arr[$mid]) {
                    if ($value > $arr[$high]) {
                        $high = $mid - 1;
                    } else {
                        $low = $mid + 1;
                    }
                } else {
                    $high = $mid - 1;
                }
            }
        }

        return -1;
    }
}

$a = new BinarySearch();
$arr = [1, 3, 5, 6, 7, 8, 9, 19, 34, 56];
$arrCircle = [5, 6, 7, 8, 1, 3, 4];

var_dump($a->main($arr, 8));
var_dump($a->mainOne($arr, 10));
var_dump($a->mainTwo($arr, 10));
var_dump($a->searchCircle($arrCircle, 7));
var_dump($a->searchCircle($arrCircle, 5));
var_dump($a->searchCircle($arrCircle, 3));
var_dump($a->searchCircle($arrCircle, 100));