<?php
/**
 * 桶排序
 * 比较适合用在外部排序中
 * @author skyeinfo@qq.com
 * @lastModifyTime 2018/11/26
 * @lastModify skyeinfo@qq.com
 */
namespace Sort;

class BucketSort
{
    public function main() {

        /**
         * 桶排序的思想：
         * 将数据均匀划分后使用快排。
         * 桶排序的条件：
         * 数据可以很容易的划分为n个大小连续的桶，且桶内数据分布均匀
         * 桶排序的使用举例：
         * 将10GB的订单数据按照订单金额大小排序，内存限制为100MB
         */
    }

}