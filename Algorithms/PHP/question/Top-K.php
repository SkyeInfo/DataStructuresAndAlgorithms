<?php
class HeapByArray
{
    public function buildHeap(array &$numArray, bool $isMinHead = true) {
        $length = count($numArray);

        if ($length <= 1) return $numArray;

        $middle = floor($length / 2);

        for ($i = $middle; $i >= 0; $i--) {
            $this->adjustHeap($numArray, $length, $i, $isMinHead);
        }

        return $numArray;
    }

    public function adjustHeap(array &$numArr, int $heapSize, int $index, bool $isMinHead = true) {
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

echo "初始: ".memory_get_usage()."B\n";

$start = microtime(true);

$K = 100;
$numbers = $number = array();
for ($i = 1; $i <= 1000000; $i++) {
    $numbers[] = mt_rand(0,1000000);
}
$number = array_slice($numbers, 0, 100);

$time = microtime(true) - $start;
echo "创建完数据使用: ".memory_get_usage()."B" . PHP_EOL;
echo "耗时：" . $time . 's' . PHP_EOL;

$buildHeap = new HeapByArray();

$buildHeap->buildHeap($number);  //把number构造为最小堆
for ($i = 10; $i < 1000000; $i++) {
    if ($numbers[$i] > $number[0]) {
        $number[0] = $numbers[$i];

        $buildHeap->adjustHeap($number, $K, 0);
    }
}

$time = microtime(true) - $start;
echo "使用: ".memory_get_usage()."B" . PHP_EOL;
echo "耗时：" . $time . 's' . PHP_EOL;

print_r($number);
?>
