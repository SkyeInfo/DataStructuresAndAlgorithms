<?php
/**
 * 剪绳子问题
 * 一段长度为n的绳子，请把绳子剪成m段，n，m都大于1且都是整数
 * 求每段绳子长度的乘积最大是多少
 * @author skyeinfo@qq.com
 * @lastModifyTime 2019/3/2
 * @lastModify skyeinfo@qq.com
 */
//动态规划法
//时间复杂度O(N2) 空间复杂度O(N)
function maxProductAfterCuttingDp($length) {
    if ($length < 2) return 0;
    if ($length == 2) return 1;
    if ($length == 3) return 2;

    /**
     * 初始化说明：
     * 与上面范围判断没有关系
     * 比如对于长度大于3的，可以拆出来一段3，剩下的部分至少为1，
     * 但是再拆乘积就变小了
     */
    $products[0] = 0;
    $products[1] = 1;
    $products[2] = 2;
    $products[3] = 3;

    $maxProduct = 0;

    for ($i = 4; $i <= $length; $i++) {
        $maxProduct = 0;
        $middle = $i >> 1;
        for ($j = 1; $j <= $middle; $j++) {
            $product = $products[$j] * $products[$i - $j];

            $maxProduct = max($product, $maxProduct);

            $products[$i] = $maxProduct;
        }
    }

    return $maxProduct;
}
//贪心法
//策略当n>=5 时 尽可能地剪长度为3的绳子，
//当剩下的绳子长度为4时，把绳子剪成2+2。
function maxProductAfterCuttingTx($length) {
    if ($length < 2) return 0;
    if ($length == 2) return 1;
    if ($length == 3) return 2;

    $timesOfThree = floor($length / 3);

    if ($length - $timesOfThree * 3 == 1) {
        $timesOfThree--;
    }

    $timesOfTwo = floor(($length - $timesOfThree * 3) / 2);
    $maxProduct = pow(3, $timesOfThree) * pow(2, $timesOfTwo);

    return $maxProduct;
}

$len = 10;
var_dump(maxProductAfterCuttingDp($len));
var_dump(maxProductAfterCuttingTx($len));
