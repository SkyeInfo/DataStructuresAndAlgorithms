<?php
/**
 * 归并排序-分治思想-稳定
 * 时间复杂度为O(nlogn)-空间复杂度-O(n)
 * @author skyeinfo@qq.com
 * @lastModifyTime 2018/11/23
 * @lastModify skyeinfo@qq.com
 */
namespace Sort;

class MergeSort
{
    public function main(array $sortArr, $start, $end) {
        if ($start >= $end) {
            return array($sortArr[$end]);
        }

        $mid = intval(($start + $end) / 2);

        $left  = $this->main($sortArr, $start, $mid);
        $right = $this->main($sortArr, $mid + 1, $end);

        $rlt = $this->merge($left, $right);

        return $rlt;
    }

    private function merge(array $left, array $right) {
        $temp = array();

        $i = $j = 0;

        $leftCount = count($left);
        $rightCount = count($right);

        do {
            if ($left[$i] <= $right[$j]) {
                $temp[] = $left[$i++];
            } else {
                $temp[] = $right[$j++];
            }
        } while($i < $leftCount && $j < $rightCount);

        if ($i < $leftCount) {
            $start = $i;
            $end = $leftCount;
            $lastArr = $left;
        } else {
            $start = $j;
            $end = $rightCount;
            $lastArr = $right;
        }

        for (; $start < $end; $start++) {
            $temp[] = $lastArr[$start];
        }

        return $temp;
    }
}

$a = new MergeSort();

$arr = [15,12,4,24,5,21,6,32,56,14,37,23];

print_r($a->main($arr, 0, count($arr) - 1));