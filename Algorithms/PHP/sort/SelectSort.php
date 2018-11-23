<?php
/**
 * 选择排序
 * @author yangshengkai@chuchujie.com
 * @lastModifyTime 2018/11/22
 * @lastModify yangshengkai@chuchujie.com
 */
namespace Sort;

require_once '../vendor/autoload.php';

class SelectSort
{
    public function selectSort(array $sortArr) {
        $startTime = microtime(true);
        $count = count($sortArr);

        if ($count <= 1) {
            print_r($sortArr);
            return;
        }
        for ($i = 0; $i < $count; $i++) {
            $value = $sortArr[$i];

            $index = $j = $count - 1;
            $flag = false;

            for (; $j > $i; $j--) {
                if ($sortArr[$j] < $value && $sortArr[$j] <= $sortArr[$index]) {
                    $index = $j;
                    $flag = true;
                }
            }

            if ($flag) {
                $temp = $sortArr[$index];
                $sortArr[$index] = $value;
                $sortArr[$i] = $temp;
            }

            var_export(implode('-', $sortArr)); echo PHP_EOL;
        }

        $endTime = microtime(true);
        $useTime = bcsub($endTime, $startTime, 10);

        echo '用时：' . $useTime . 's' . PHP_EOL;

        print_r($sortArr);
    }
}

$a = new SelectSort();
$b = new InsertSort();
$arr = [15,12,4,24,5,21,6,32,56,14,37,23];

$a->selectSort($arr);
$b->insertSort($arr);