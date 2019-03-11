## 问题描述：

* 有 N (N>1000000)个无序排列的数，求出其中的前K个最大（小）的数。
参考：  
[大数据Top K问题](https://blog.csdn.net/brycegao321/article/details/79629155)  

如果涉及到小内存大文件，先拆分大文件为小文件使之能加载到内存，然后分别取TOP-K，再进行聚拢排序或者最小/大堆。

### 快速排序

解法：在数据都能加载到内存的情况下，采用快速排序的划分函数找到划分位置K，K之前的数据即为所求。

[用快排解决Top-K问题](https://github.com/SkyeInfo/DataStructuresAndAlgorithms/blob/master/Algorithms/PHP/sort/QuickSort.php "用快排解决Top-K问题")

### 最大/小堆
如果是求最大K个，用最小堆。  
读取数据的前K个元素，构建一个含有K个元素的最小堆，然后依次读取剩下的数据，每次都和最顶部元素比较，如果大则进堆，移除最顶部元素，然后重建堆，如果小直接舍弃。

**用数组实现最小堆**  
```php
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

//输出
初始: 353528B
创建完数据使用: 36013472B
耗时：27.992277145386s
使用: 36013536B
耗时：28.285822153091s

数组打印省略
```
**实际问题：如何获取10万个无序数据中前1000个大的数据？**  
用最小堆解决；
先构建一个具有1000个数据空间的数组；  
依次读取数据直到数组满；  
然后将数组构建为最小堆；  
然后继续读取数据，将数据与数组第一个元素比较，小则舍弃，大则替换，然后重建最小堆；（堆中存放的都是比较大的值）  
重复上一步骤，直至读取完毕。

怎么用数组构建最小堆？   
利用数组的索引；  
以及父节点与子节点的索引关系。C = F * 2 + 1；