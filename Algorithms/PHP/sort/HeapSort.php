<?php
/**
 * 堆排序
 *
 * @author yangshengkai@chuchujie.com
 * @lastModifyTime 2019/2/18
 * @lastModify yangshengkai@chuchujie.com
 */
class HeapSort
{
    /**
     * 排序
     * 从小到大，先构建最大堆，再交换，然后按最大堆调整
     * 从大到小，先构建最小堆，再交换，然后按最小堆调整
     * @author yangshengkai@chuchujie.com
     * @lastModifyTime 2019/2/18
     * @lastModify yangshengkai@chuchujie.com
     * @param array $numbers
     * @return array
     */
    public function sort(array &$numbers){
        $length = count($numbers);
        if ($length <= 1) return $numbers;

        //构建最小堆
        $this->buildHeap($numbers);

        for ($i = $length - 1; $i >= 1; $i--) {
            $tmp = $numbers[0];
            $numbers[0] = $numbers[$i];
            $numbers[$i] = $tmp;

            $this->adjustHeap($numbers, $i, 0);
        }

        return $numbers;
    }

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
    private function adjustHeap(array &$numArr, int $heapSize, int $index, bool $isMinHead = true) {
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

$heapSort = new HeapSort();

$heapSort->sort($arr);

var_dump($arr);

