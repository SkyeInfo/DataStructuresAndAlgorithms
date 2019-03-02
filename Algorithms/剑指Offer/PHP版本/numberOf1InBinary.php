<?php
/**
 * 正整数n的二进制表示中1的个数
 * @author skyeinfo@qq.com
 * @lastModifyTime 2019/3/2
 * @lastModify skyeinfo@qq.com
 */

/**
 * 当不断将n右移时容易引起死循环
 * 所以移动标志位
 */
var_dump(numOf1(0));
var_dump(numberOf1(0x7FFFFFFF));
var_dump(judge(1024));

function numOf1($num) {
    $count = 0;
    $flag = 1;

    while($flag) {
        if ($num & $flag) {
           $count++;
        }

        $flag = $flag << 1;
    }

    return $count;
}

/**
 * 将n和n-1做与运算，每次都会把最右边一个1消掉
 */
function numberOf1($num){
    $count = 0;
    while ($num) {
        $count++;
        $num = $num & ($num - 1);
    }
    return $count;
}
/**
 * 拓展：
 * 用一行代码判断一个整数是否是2的整数次方
 */

function judge($num) {
    return ($num == 0) ? false : ($num & ($num - 1) ? false : true);
}