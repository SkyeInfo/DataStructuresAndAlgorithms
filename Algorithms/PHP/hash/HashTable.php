<?php
/**
 * 散列表（哈希表）
 * @author yangshengkai@chuchujie.com
 * @lastModifyTime 2018/11/28
 * @lastModify yangshengkai@chuchujie.com
 */
class HashTable
{
    /**
     * 散列表的关键在于散列函数 hash(key)
     * 散列函数的基本要求：
     * 1、散列函数计算得到的散列值必须是一个非负整数
     * 2、如果 key1 == key2 那么 hash(key1) == hash(key2)
     * 3、如果 key1 != key2 那么 hash(key1) != hash(key2)，避免散列冲突
     *
     * 避免散列冲突的解决办法常用的有 开放寻址法 和 链表法
     * 开放寻址法 包括：
     * 线性探索 - 在冲突位置以1步长依次向后探索，注意在删除元素时不能直接将对应位置置空，采用标记delete的方式软删除
     * 二次探测 - 在冲突位置依次以hash(key)+1^2, hash(key)+2^2, hash(key)+3^2...这样的步长向后探索
     * 双重散列 - 采用多个hash()方法，直到找到空闲位置
     *
     * 链表法：
     * 在数组槽上拓展一条链
     */
}