<?php
/**
 * 快速排序-不稳定
 * 时间复杂度-O(nlogn)，空间复杂度-O(1)
 * @author skyeinfo@qq.com
 * @lastModifyTime 2018/11/23
 * @lastModify skyeinfo@qq.com
 */
class QuickSort
{
    public function mainOne(array &$sortArr, $left, $right) {

        $i = $left;
        $j = $right;
        $middle = $sortArr[($i + $j) / 2];

        do {
            while ($sortArr[$i] < $middle && $i < $right) {
                $i++;
            }

            while ($sortArr[$j] > $middle && $j > $left) {
                $j--;
            }
            //var_dump($i,$j);
            if ($i <= $j) {
                $temp = $sortArr[$i];
                $sortArr[$i] = $sortArr[$j];
                $sortArr[$j] = $temp;

                $i++;
                $j--;
            }
        } while($i <= $j);

        if ($i < $right) {
            $this->mainOne($sortArr, $i, $right);
        }

        if ($j > $left) {
            $this->mainOne($sortArr, $left, $j);
        }
    }

    public function mainTwo(array &$sortArr, $start, $end) {
        if ($start >= $end) return;

        $pivot = $sortArr[$end];
        $i = $start;

        for ($j = $start; $j < $end; $j++) {
            if ($sortArr[$j] < $pivot) {
                $temp = $sortArr[$i];
                $sortArr[$i] = $sortArr[$j];
                $sortArr[$j] = $temp;

                $i++;
            }
        }

        $temp = $sortArr[$end];
        $sortArr[$end] = $sortArr[$i];
        $sortArr[$i] = $temp;

        $this->mainTwo($sortArr, $start, $i - 1);
        $this->mainTwo($sortArr, $i + 1, $end);
    }
}

$a = new QuickSort();
$arr = [15,12,4,24,5,21,6,32,56,14,37,23];

//$a->mainOne($arr, 0, count($arr) - 1);
$a->mainTwo($arr, 0, count($arr) - 1);

print_r($arr);