<?php
/**
 * 斐波那契数列
 * @author skyeinfo@qq.com
 * @lastModifyTime 2019/3/2
 * @lastModify skyeinfo@qq.com
 */
//递归解法
//时间复杂度O(N的指数方式递增)
function fibonacciRecursively(int $index) {
    if($index < 0) return false;
    $result = [0, 1];

    if ($index < 2) return $result[$index];

    return fibonacciRecursively($index - 1) + fibonacciRecursively($index - 2);
}
//循环
//时间复杂度O(N)
function fibonacciCyclically(int $index) {
    if ($index < 0) return false;
    $result = [0, 1];
    if ($index < 2) return $result[$index];

    $fibonacciNumOne = 0;
    $fibonacciNumTwo = 1;
    $fibonacciNum = 0;

    for ($i = 2; $i <= $index; $i++) {
        $fibonacciNum = $fibonacciNumOne + $fibonacciNumTwo;

        $fibonacciNumOne = $fibonacciNumTwo;
        $fibonacciNumTwo = $fibonacciNum;
    }

    return $fibonacciNum;
}
var_dump(fibonacciRecursively(6));
var_dump(fibonacciCyclically(10));

/**
 * 青蛙跳台阶问题
 * 一只青蛙一次可以跳上1级台阶，也可以跳2级台阶。求该青蛙跳上一个n级的台阶总共有几种跳法。
 *
 * 解法：
 * 把n级台阶的跳法看成n的函数，记为f(n)。当n>2时，第一次跳的时候就有两种不同的选择，一是第一次只跳1级，
 * 此时跳法数目等于后面剩下的n-1级台阶的跳法数目，即为f(n-1)；二是第一次跳2级，此时跳法数目等于后面剩下的n-2级
 * 台阶的跳法数目，即为f(n-2)。因此，n级台阶的不同跳法的总数f(n)=f(n-1)+f(n-2)。
 * 所以等效于斐波那契数列。
 */
