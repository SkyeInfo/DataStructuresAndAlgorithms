<?php
/**
 * 计数排序
 *
 * 计数排序只能用在数据范围不大的场景中，
 * 如果数据范围 k 比要排序的数据 n 大很多，就不适合用计数排序了。
 * 而且，计数排序只能给非负整数排序，如果要排序的数据是其他类型的，
 * 要将其在不改变相对大小的情况下，转化为非负整数。
 * @author skyeinfo@qq.com
 * @lastModifyTime 2018/11/26
 * @lastModify skyeinfo@qq.com
 */
namespace Sort;

class CountingSort
{
    /**
     * 计数排序可以认为是桶排序的一种特殊情况
     * 在桶排序的基础上再加上条件：数据范围不大
     * 举例：
     * 对学生成绩排序，成绩范围在0~5之间
     * [2, 5, 3, 0, 2, 4, 1, 3, 5, 0]
     * @author skyeinfo@qq.com
     * @lastModifyTime 2018/11/26
     * @lastModify skyeinfo@qq.com
     * @param array $sortArr
     */
    public function main(array $sortArr) {
        if (count($sortArr) <= 1) print_r($sortArr);

        $maxNum = max($sortArr);

        $scoreCount = $score = array();
        for ($i = 0; $i <= $maxNum; $i++) {
            $scoreCount[$i] = 0;
        }
        foreach ($sortArr as $key => $scoreNum) {
            $score[$key] = null;
        }

        foreach ($sortArr as $value) {
            $scoreCount[$value]++;
        }
        for ($j = 1; $j <= $maxNum; $j++) {
            $scoreCount[$j] = $scoreCount[$j] + $scoreCount[$j - 1];
        }

        foreach ($sortArr as $key => $scoreNum) {
            $index = $scoreCount[$scoreNum] - 1;
            $score[$index] = $scoreNum;
            $scoreCount[$scoreNum]--;
        }

        print_r($score);
    }
}

$a = new CountingSort();
$arr = [2, 5, 3, 0, 2, 4, 1, 3, 5, 0];
$a->main($arr);