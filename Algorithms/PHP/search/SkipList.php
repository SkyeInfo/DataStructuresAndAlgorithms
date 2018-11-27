<?php
/**
 * 跳表
 * 对链表加多级索引的结构就是跳表
 * 时间复杂度O(logn)，用空间(复杂度O(n))换时间
 * @author skyeinfo@qq.com
 * @lastModifyTime 2018/11/26
 * @lastModify skyeinfo@qq.com
 */
namespace Search;

/**
 * 节点
 * Class Node
 * @package Search
 */
class Node
{
    private $id;
    public $value;
    public $level;
    public $forward = [];

    public function __construct($value, $level) {
        $this->id = uniqid();
        $this->level = $level;
        $this->value = $value;

        for ($i = 0; $i < $level; $i++) {
            $this->forward[$i] = 0;
        }
    }

    public function getId() {
        return $this->id;
    }
}

/**
 * 跳跃表
 * Class SkipList
 * @package Search
 */
class SkipList
{
    private $maxLevel;
    public $nodePool = [];
    public $head = null;

    public function __construct($maxLevel) {
        $this->maxLevel = $maxLevel;
        $header = new Node(-1, $maxLevel);
        $this->addToNodePool($header->getId(), $header);
        $this->head = $header->getId();
    }

    /**
     * 维护一个节点池
     * @author skyeinfo@qq.com
     * @lastModifyTime 2018/11/27
     * @lastModify skyeinfo@qq.com
     * @param $id
     * @param Node $object
     */
    public function addToNodePool($id, Node $object) {
        $this->nodePool[$id] = $object;
    }

    /**
     * 根据节点id获取节点
     * @author skyeinfo@qq.com
     * @lastModifyTime 2018/11/27
     * @lastModify skyeinfo@qq.com
     * @param $id
     * @return mixed|null
     */
    public function getNodeFromPool($id) {
        return empty($this->nodePool[$id]) ? null : $this->nodePool[$id];
    }

    /**
     * 插入节点
     * @author skyeinfo@qq.com
     * @lastModifyTime 2018/11/27
     * @lastModify skyeinfo@qq.com
     * @param $value
     * @return bool
     */
    public function insert($value) {
        $visitTrace = array();
        $count = 0;

        $temp = $this->getNodeFromPool($this->head);

        for ($i = $this->maxLevel - 1; $i >= 0; $i--) {
            while ($temp && $temp->forward[$i]) {
                $count++;
                if ($count > 20) {
                    break;
                }

                $forward = $this->getNodeFromPool($temp->forward[$i]);

                if ($forward->value < $value) {
                    $temp = $forward;
                } else if ($forward->value > $value) {
                    break;
                } else {
                    return false;
                }
            }

            if ($temp) {
                $visitTrace[$i] = $temp->getId();
            }
        }

        $level = $this->randomLevel();
        $newNode = new Node($value, $level);
        $this->addToNodePool($newNode->getId(), $newNode);

        for ($i = 0; $i < $level; $i++) {
            $trace = $this->getNodeFromPool($visitTrace[$i]);
            $newNode->forward[$i] = $trace->forward[$i];
            $trace->forward[$i] = $newNode->getId();
        }

        return true;
    }

    /**
     * 查找节点
     * @author skyeinfo@qq.com
     * @lastModifyTime 2018/11/27
     * @lastModify skyeinfo@qq.com
     * @param $value
     * @return bool
     */
    public function find($value) {
        $temp = $this->getNodeFromPool($this->head);
        $count = 0;

        for ($i = $this->maxLevel - 1; $i >= 0; $i--) {
            while ($temp && $temp->forward[$i]) {
                $count++;
                if ($count > 20) {
                    break;
                }

                echo "第{$i}层级:{$temp->forward[$i]}" . PHP_EOL;
                $forward = $this->getNodeFromPool($temp->forward[$i]);
                if ($forward->value < $value) {
                    $temp = $forward;
                } else if ($forward->value > $value) {
                    break;
                } else {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * 按照id打印链表
     * @author skyeinfo@qq.com
     * @lastModifyTime 2018/11/27
     * @lastModify skyeinfo@qq.com
     */
    public function printAllNode() {
        for ($i = $this->maxLevel - 1; $i >= 0; $i--) {
            $node = $this->head;
            $nodeObj = $this->getNodeFromPool($node);
            echo '第' . $i . '层级：';
            while (!empty($nodeObj)) {
                echo $nodeObj->forward[$i] . '->';
                $node = $nodeObj->forward[$i];
                $nodeObj = $this->getNodeFromPool($node);
            }
            echo 'null' . PHP_EOL;
        }

    }

    /**
     * 按照值打印链表
     * @author skyeinfo@qq.com
     * @lastModifyTime 2018/11/27
     * @lastModify skyeinfo@qq.com
     */
    public function printAllValue() {
        for ($i = $this->maxLevel - 1; $i >= 0; $i--) {
            $node = $this->head;
            $nodeObj = $this->getNodeFromPool($node);
            echo '第' . $i . '层级：';
            while (!empty($nodeObj)) {
                echo $nodeObj->value. '->';
                $node = $nodeObj->forward[$i];
                $nodeObj = $this->getNodeFromPool($node);
            }
            echo 'null' . PHP_EOL;
        }

    }

    /**
     * 生成随机level
     * @author skyeinfo@qq.com
     * @lastModifyTime 2018/11/27
     * @lastModify skyeinfo@qq.com
     * @return int
     */
    private function randomLevel() {
        $level = 1;

        for ($i = 1; $i < $this->maxLevel; $i++) {
            $r = rand();
            if ($r % 2 == 1) {
                $level++;
            }
        }

        return $level;
    }
}

$testArr = [1, 4, 6, 12, 23, 34, 67, 123, 234, 345, 567, 899, 900, 1234, 1236, 2345, 3465, 5674, 6456];
$a = new SkipList(3);
foreach ($testArr as $value) {
    $a->insert($value);
}

$a->printAllNode();
$a->printAllValue();
var_dump($a->find(6));
