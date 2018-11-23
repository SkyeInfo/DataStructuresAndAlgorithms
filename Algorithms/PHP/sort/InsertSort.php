<?php
/**
 * 插入排序-升序-稳定
 * 时间复杂度-O(n2)，空间复杂度-O(1)
 * @author skyeinfo@qq.com
 * @lastModifyTime 2018/11/21
 * @lastModify skyeinfo@qq.com
 */
namespace Sort;

class InsertSort
{
    public function main(array $sortArr) {
        $startTime = microtime(true);
        $count = count($sortArr);

        if ($count <= 1) {
            print_r($sortArr);
            return;
        }
        for ($i = 1; $i < $count; $i++) {
            $value = $sortArr[$i];

            $j = $i - 1;

            for (; $j >= 0; $j--) {
                if ($sortArr[$j] > $value) {
                    $sortArr[$j + 1] = $sortArr[$j];
                } else {
                    break;
                }
            }

            $sortArr[$j + 1] = $value;
        }


        $endTime = microtime(true);
        $useTime = bcsub($endTime, $startTime, 10);

        echo '用时：' . $useTime . 's' . PHP_EOL;

        print_r($sortArr);
    }
}

//$a = new InsertSort();
//$arr = [12,4,5,21,6,32,56,14,37,23];
//
//$a->main($arr);
