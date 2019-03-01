<?php
/**
 * 二叉树 根节点到叶子节点最短路径问题
 * 实际是说：从根节点到最近的叶子节点所经过的节点数
 * @author skyeinfo@qq.com
 * @lastModifyTime 2019/2/27
 * @lastModify skyeinfo@qq.com
 */
class Node {
    public $val;
    public $left;
    public $right;

    public function __construct($val) {
        if (isset($val)){
            $this->val = $val;
        }
    }
}

function createBT() {
    $head = new Node(1);
    $head->left  = new Node(2);
    $head->right = new Node(3);

    $head->left->left   = new Node(4);
    $head->left->right  = new Node(5);
    $head->right->left  = new Node(6);
    $head->right->right = new Node(7);
    $head->left->left->left = new Node(8);
    $head->left->left->right = new Node(9);
    $head->right->left->left = new Node(10);
    $head->right->left->left->left = new Node(11);

    return $head;
}

function minDepth(Node $head) {
    if ($head == null) return false;

    if ($head->left == null && $head->right == null) return 1;

    $current = 1;  //头结点 1
    $min = PHP_INT_MAX;

    calDepth($head, $current, $min);

    return $min;
}

//递归方式
function calDepth(Node $node, int $current, int &$min) {  //$min变量用来暂存最小值
    if ($node->left == null && $node->right == null) {
        if ($current < $min) {
            $min = $current;
        }

        return;   //递归退出点
    }
    if ($node->left != null) {
        calDepth($node->left, $current + 1, $min);
    }

    if ($node->right != null) {
        calDepth($node->right, $current + 1, $min);
    }
}
//第二种递归方式
function minDepth2($node) {
    if ($node == null) return 0;

    $minLeft = minDepth2($node->left);
    $minRight = minDepth2($node->right);

    if ($minLeft == 0 || $minRight == 0) {
        return $minLeft >= $minRight ? $minLeft + 1 : $minRight + 1;
    }

    return min($minLeft, $minRight) + 1;
}

/**
 * 非递归方式
 * 利用的是广度优先遍历的方式，找到第一个没有左右子树的节点
 * @author skyeinfo@qq.com
 * @lastModifyTime 2019/2/27
 * @lastModify skyeinfo@qq.com
 * @param Node $root
 * @return int
 */
function minDepth3(Node $root) {
    if ($root == null) return 0;
    if ($root->left == null && $root->right == null) return 1;

    $depth = 1; //头结点 1
    $queue = array();//当做队列使用
    array_push($queue, $root);

    while (!empty($queue)) {
        $count = count($queue);

        for ($i = 0; $i < $count; $i++) {
            $node = array_shift($queue);

            if ($node == null) {  //这一步相当于扫完一层 +1
                $depth++;
                continue;
            }

            if ($node->left == null && $node->right == null) {
                return $depth + 1;
            }

            if ($node->left != null) {
                array_push($queue, $node->left);
            }

            if ($node->right != null) {
                array_push($queue, $node->right);
            }
        }

        array_push($queue, null);  //用于隔层
    }

    return $depth;
}

$bt = createBT();

var_dump(minDepth($bt));
var_dump(minDepth2($bt));
var_dump(minDepth3($bt));
