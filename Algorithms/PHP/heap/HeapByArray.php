<?php
/**
 * 用数组实现堆
 * @author skyeinfo@qq.com
 * @lastModifyTime 2019/2/18
 * @lastModify skyeinfo@qq.com
 */
class HeapByArray
{
    /**
     * 构建最大/小堆
     * 注意：采用引用传值，会把原array做修改
     * @author skyeinfo@qq.com
     * @lastModifyTime 2019/2/18
     * @lastModify skyeinfo@qq.com
     * @param array $numArray
     * @param bool $isMinHead true表示最小堆，false表示最大堆
     * @return array
     */
    public function buildHeap(array &$numArray, bool $isMinHead = true) {
        $length = count($numArray);

        if ($length <= 1) return $numArray;

        $middle = floor($length / 2);

        for ($i = $middle; $i >= 0; $i--) {
            $this->adjustHeap($numArray, $length, $i, $isMinHead);
        }

        return $numArray;
    }

    /**
     * 调整最大堆
     * @author skyeinfo@qq.com
     * @lastModifyTime 2019/2/18
     * @lastModify skyeinfo@qq.com
     * @param array $numArr
     * @param int $heapSize
     * @param int $index
     * @param bool $isMinHead
     */
    private function adjustHeap(array &$numArr, int $heapSize, int $index, bool $isMinHead) {
         $left = $index * 2 + 1;
         $right = $index * 2 + 2;

         $limitIndex = $index;

         if ($isMinHead) {
             if ($left < $heapSize && $numArr[$left] < $numArr[$index]) {
                 $limitIndex = $left;
             }

             if ($right < $heapSize && $numArr[$right] < $numArr[$limitIndex]) {
                 $limitIndex = $right;
             }
         } else {
             if ($left < $heapSize && $numArr[$left] > $numArr[$index]) {
                 $limitIndex = $left;
             }

             if ($right < $heapSize && $numArr[$right] > $numArr[$limitIndex]) {
                 $limitIndex = $right;
             }
         }

         if ($index !== $limitIndex) {
             $temp = $numArr[$limitIndex];
             $numArr[$limitIndex] = $numArr[$index];
             $numArr[$index] = $temp;

             $this->adjustHeap($numArr, $heapSize, $limitIndex, $isMinHead);
         }
    }
}

$arr = [12,3,5,24,56,32,14,8,16,18,133];

$buildHead = new HeapByArray();

$buildHead->buildHeap($arr);

var_dump($arr);

$arr[0] = 1000;
$buildHead->buildHeap($arr);

var_dump($arr);
