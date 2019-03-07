<?php
/**
 * 经典的KMP算法
 * @author skyeinfo@qq.com
 * @lastModifyTime 2019/3/6
 * @lastModify skyeinfo@qq.com
 * @param $str1  主串
 * @param $str2  模式串
 */

$str1 = 'asfsdahfihieiocadasdesdnfhfafwe';
$str2 = 'eiocadasde';
$a = kmp($str1, $str2);
var_dump($a);
function kmp($str1, $str2) {
    $length1 = strlen($str1);
    $length2 = strlen($str2);

    $next = getNext($str2, $length2);

    $j = 0;
    for ($i = 0; $i < $length1; $i++) {
        while ($j > 0 && $str1[$i] != $str2[$j]) {
            $j = $next[$j - 1] + 1;
        }
        if ($str1[$i] == $str2[$j]) {
            $j++;
        }
        if ($j == $length2) {
            return $i - $length2 + 1;
        }
    }

    return false;
}

function getNext($str, $length) {
    /**
     * 极客时间-数据结构与算法提供的代码比较晦涩，下面一部分是比较容易理解的
     * 可参考：https://www.zhihu.com/question/21923021
     */
//    $next = array();
//    $next[0] = -1;
//    $k = -1;
//
//    for ($i = 1; $i < $length; ++$i) {
//        while ($k != -1 && $str[$k + 1] != $str[$i]) {
//            $k = $next[$k];
//        }
//
//        if ($str[$k + 1] == $str[$i]) {
//            ++$k;
//        }
//        $next[$i] = $k;
//
//    }
//    return $next;
    $next = array();

    $next[0] = -1;   //单纯的为了编程方便
    $i = 0; //$i 和 $j索引其实都是为了遍历模式串
    $j = -1;

    while ($i < $length) {
        if ($j == -1 || $str[$i] == $str[$j]) {  //注意 || 符号
            $i++;
            $j++;
            $next[$i] = $j;  //索引$j同时还肩负着计数的作用
        } else {
            $j = $next[$j];  //为什么往回退这么多就是匹配的？
        }
    }

    return $next;
}
