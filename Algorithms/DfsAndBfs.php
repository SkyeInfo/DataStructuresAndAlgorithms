<?php
/**
 * 深度优先遍历和广度优先遍历
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

/**
 * 深度优先 == 前序遍历
 * 只不过这个是非递归版本实现
 * @author skyeinfo@qq.com
 * @lastModifyTime 2019/2/27
 * @lastModify skyeinfo@qq.com
 * @param $root
 */
function dfs($root) {
    if ($root == null) return;

    $stack = array(); //模拟栈

    array_push($stack, $root);
    while (!empty($stack)) {
        $node = array_pop($stack);
        echo $node->val . ' ';

        if ($node->right != null) {
            array_push($stack, $node->right);
        }

        if ($node->left != null) {
            array_push($stack, $node->left);
        }
    }
}

/**
 * 广度优先
 * @author skyeinfo@qq.com
 * @lastModifyTime 2019/2/27
 * @lastModify skyeinfo@qq.com
 * @param $root
 */
function bfs($root) {
    if ($root == null) return;

    $queue = array();//模拟队列

    array_push($queue, $root);

    while (!empty($queue)) {
        $count = count($queue);

        for ($i = 0; $i < $count; $i++) {
            $node = array_shift($queue);

            echo $node->val . ' ';

            if ($node->left != null) {
                array_push($queue, $node->left);
            }

            if ($node->right != null) {
                array_push($queue, $node->right);
            }
        }
    }
}
$bt = createBT();
dfs($bt);
echo PHP_EOL;
bfs($bt);