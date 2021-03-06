<?php
/**
 * 基数排序
 * @author skyeinfo@qq.com
 * @lastModifyTime 2018/11/26
 * @lastModify skyeinfo@qq.com
 */
namespace Sort;

class RadixSort
{
    public function main() {
        /**
         * 基数排序对要排序的数据是有要求的，需要可以分割出独立的“位”来比较，而且位之间有递进的关系，
         * 如果 a 数据的高位比 b 数据大，那剩下的低位就不用比较了。除此之外，每一位的数据范围不能太大，
         * 要可以用线性排序算法来排序，否则，基数排序的时间复杂度就无法做到 O(n) 了。
         *
         * 比如对一组手机号或者英文单词排序
         */
    }
}