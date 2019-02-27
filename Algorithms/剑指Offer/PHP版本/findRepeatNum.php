<?php
/**
 * 查找数组中第一个重复的数字/查找数组中任意一个重复的数字
 * 在一个长度为n的数组里的所有数字都在0~n-1范围内。数组中某些数字是重复的，
 * 但是不知道有几个数字重复，也不知道重复数字重复了几次，
 * 找出数组中第一个重复的数字/数组中任意一个重复的数字
 * 用例：[2,3,1,0,2,5,3]  那么其中重复的数字是2 和 3
 * @author yangshengkai@chuchujie.com
 * @lastModifyTime 2019/2/26
 * @lastModify yangshengkai@chuchujie.com
 */

/**
 * 第一种方案
 * 先排序再遍历
 * 时间复杂度O(nlogn) 空间复杂度O(1)
 */

/**
 * 第二种方案
 * 采用哈希表：遍历数组，每扫描到一个数字就可以用O(1)的时间复杂度判断哈希表中是否存在该数字，
 * 如果哈希表中没有这个数字就把它加入，否则则判定找到了一个重复数字。
 * 时间复杂度为O(N) 空间复杂度O(N)
 */

/**
 * 第三种方案
 * 从头遍历数组进行重排，当扫描到下标为i的数字（用m表示），
 * 先比较i是否等于m，如果是则扫描下一个数字，如果不是，则将m与下标为m的数字进行比较，
 * 如果相等则查找到了一个重复元素，否则交换下标为i和m的数据，然后扫描下一个数据，进行比较、交换，直到查找到重复的数据。
 * 时间复杂度O(N)，空间复杂度O(1)
 */
$a = [2,3,1,0,2,5,3];
var_dump(solution3($a));
function solution3(array $arr) {
    $count = count($arr);

    for ($i = 0; $i < $count; $i++) {
        while ($i != $arr[$i]) {
            if ($arr[$i] > ($count - 1) || $arr[$i] < 0) return false;

            if ($arr[$i] == $arr[$arr[$i]]) { return $arr[$i]; }

            $temp = $arr[$arr[$i]];
            $arr[$arr[$i]] = $arr[$i];
            $arr[$i] = $temp;
        }
    }

    return false;
}