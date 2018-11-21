<?php

/**
 * 0-1背包问题
 * 有n个物品，每个物品的重量为w[i]，每个物品的价值为v[i]。
 * 现在有一个背包，它所能容纳的重量为W，
 * 问：当你面对这么多有价值的物品时，
 * 你的背包所能带走的最大价值是多少？
 * 其中每种物品只有一件，可以选择放或者不放。
 * @author skyeinfo@qq.com
 */
class BackpackQue{
    public function solution(int $W, array $w, array $v){
        $value = array(); //$value表示当前背包的总价值
        $i = 1; $j = 0;      //$i 表示第几件商品,$j 表示当前背包的容量
        $value[$i - 1][$j] = 0;    //初始化
        //问题单元化处理
        if($j > $w[$i]){ //可以拿
            //此时取最大值
        }
    }
}