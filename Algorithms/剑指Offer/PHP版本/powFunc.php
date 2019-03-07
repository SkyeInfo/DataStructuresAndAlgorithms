<?php
/**
 * 实现pow函数
 * 指数只能为正/负整数和0
 * 基数支持小数
 * @author skyeinfo@qq.com
 * @lastModifyTime 2019/3/2
 * @lastModify skyeinfo@qq.com
 */
var_dump(selfPowFunc(3, 4));
var_dump(selfPowFunc(1.2, 3), pow(1.2, 3));
var_dump(selfPowFunc(5, -2), pow(5, -2));
var_dump(selfPowFunc(0, 4));
var_dump(selfPowFunc(3, 0));
var_dump(selfPowFunc(-2, 4));
var_dump(selfPowFunc(-3, -3), pow(-3,-3));
var_dump(selfPowFunc(0, -2), pow(0,-2));

function selfPowFunc($base, $exponent) {
    if ($exponent >= 0) {
        if ($exponent == 0) return 1;
        if ($exponent == 1) return $base;

        $rlt = selfPowFunc($base, $exponent >> 1);

        $rlt *= $rlt;

        if ($exponent & 1) {
            $rlt *= $base;
        }

    } else {
        if ($base == 0) return INF;

        $rlt = 1 / selfPowFunc($base, abs($exponent));
    }
    return $rlt;
}
