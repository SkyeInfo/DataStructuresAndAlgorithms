<?php
/**
 * 0-1背包问题
 * 定义物品个数为num，背包容量为maxWeight
 * 物品价值为values = [val1, val2, val3, ...]
 * 物品重量为weights = [weight1, weight2, weight3, ...]
 */

/**
 * @param $num
 * @param $maxWeight
 * @param $values
 * @param $weights
 * @return array
 */
function Solution($num, $maxWeight, $values, $weights) {
    $maxValue = $trace = array();

    for ($i = 0; $i <= $num; $i++) {
        $maxValue[$i][0] = 0;
    }

    for ($j = 0; $j <= $maxWeight; $j++) {
        $maxValue[0][$j] = 0;
    }

    for ($indexGoods = 1; $indexGoods <= $num; $indexGoods++) {
        for ($bagWeight = 1; $bagWeight <= $maxWeight; $bagWeight++) {
            if ($bagWeight < $weights[$indexGoods - 1]) {   //装不进去
                $maxValue[$indexGoods][$bagWeight] = $maxValue[$indexGoods - 1][$bagWeight];
            } else { //能装进去
                $maxValue[$indexGoods][$bagWeight] = max($maxValue[$indexGoods - 1][$bagWeight], $maxValue[$indexGoods - 1][$bagWeight - $weights[$indexGoods - 1]] + $values[$indexGoods - 1]); //如果是两个相等还要再考虑要不要拿，那就会造成多种解
            }
        }
    }

    //写完表格之后，回溯找到最优解
    $tranceBagWeight = $maxWeight;
    for ($tranceGoods = $num; $tranceGoods >= 1; $tranceGoods--) {
        if ($maxValue[$tranceGoods][$tranceBagWeight] == $maxValue[$tranceGoods - 1][$tranceBagWeight]) { continue; }
        if ($maxValue[$tranceGoods][$tranceBagWeight] == $maxValue[$tranceGoods - 1][$tranceBagWeight - $weights[$tranceGoods - 1]] + $values[$tranceGoods - 1]) {
            $trace[] = $tranceGoods;
            $tranceBagWeight = $tranceBagWeight - $weights[$tranceGoods - 1];
        }
    }

    return [$maxValue[$num][$maxWeight], $trace];
}

$num = 5;
$maxWeight = 10;
$values = [6, 3, 5, 4, 6];
$weights = [1, 2, 6, 5, 4];

list($maxValue, $trace) = Solution($num, $maxWeight, $values, $weights);

var_dump($maxValue, implode(', ', $trace));