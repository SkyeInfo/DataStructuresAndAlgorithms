<?php
/**
 * 冒泡排序-基于比较-稳定
 * 时间复杂度O(n2) 空间复杂度O(1)
 * @author skyeinfo@qq.com
 * @lastModifyTime 2018/11/21
 * @lastModify skyeinfo@qq.com
 */
namespace Sort;

class BubbleSort
{
    /**
     * 方式1
     * @author skyeinfo@qq.com
     * @lastModifyTime 2018/11/21
     * @lastModify skyeinfo@qq.com
     * @param array $sortArr
     */
    public function mainOne(array $sortArr) {
        $startTime = microtime(true);
        $count = count($sortArr);
        if ($count <= 1) print_r($sortArr);

        for ($i = 0; $i < $count; $i++) {
            for ($j = $i + 1; $j < $count; $j++) {
                if ($sortArr[$i] > $sortArr[$j]) {
                    $temp        = $sortArr[$i];
                    $sortArr[$i] = $sortArr[$j];
                    $sortArr[$j] = $temp;
                }
            }
        }
        $endTime = microtime(true);
        $useTime = bcsub($endTime, $startTime, 10);
        echo '耗时：' . $useTime . 's' . PHP_EOL;

        print_r($sortArr);
    }

    /**
     * 方式2
     * @author skyeinfo@qq.com
     * @lastModifyTime 2018/11/21
     * @lastModify skyeinfo@qq.com
     * @param array $sortArr
     */
    public function mainTwo(array $sortArr) {
        $startTime = microtime(true);
        $count = count($sortArr);
        if ($count <= 1) print_r($sortArr);

        for ($i = 0; $i < $count; $i++) {
            $flag = false;
            $jFlag = $count - $i - 1;
            for ($j = 0; $j < $jFlag; $j++) {
                if ($sortArr[$j] > $sortArr[$j + 1]) {
                    $temp            = $sortArr[$j];
                    $sortArr[$j]     = $sortArr[$j + 1];
                    $sortArr[$j + 1] = $temp;

                    $flag = true;
                }
            }
            if (!$flag) break;
        }
        $endTime = microtime(true);
        $useTime = bcsub($endTime, $startTime, 10);
        echo '耗时：'.$useTime.'s'.PHP_EOL;

        print_r($sortArr);
    }
}

//test
$a = [];
for ($i = 0; $i < 1000; $i++) {
    $a[$i] = mt_rand(0, 1000);
}
print_r($a);

$bubbleSort = new BubbleSort();
$bubbleSort->mainOne($a);
$bubbleSort->mainTwo($a);