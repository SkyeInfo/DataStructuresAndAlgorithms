<?php
/**
 * 经典的KMP算法
 * @author skyeinfo@qq.com
 * @lastModifyTime 2019/3/6
 * @lastModify skyeinfo@qq.com
 * @param $str1  主串
 * @param $str2  模式串
 */

$str1 = "aaabaaabbbabaa";
$str2 = 'baaabbb';
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
            return $i - $j + 1;
        }
    }

    return false;
}

function getNext($str, $length) {
    $next = array();
    $next[0] = -1;
    $k = -1;

    for ($i = 1; $i < $length; ++$i) {
        while ($k != -1 && $str[$k + 1] != $str[$i]) {
            $k = $next[$k];
        }

        if ($str[$k + 1] == $str[$i]) {
            ++$k;
        }
        $next[$i] = $k;

    }
    return $next;
}

