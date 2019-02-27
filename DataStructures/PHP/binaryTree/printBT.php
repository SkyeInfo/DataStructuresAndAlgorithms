<?php
/**
 * 三种顺序打印二叉树-递归实现
 * @author: skyeinfo@qq.com
 * Last Modify Time 2017/12/19-18:06
 * Last Modify By skyeinfo@qq.com
 */

$test = new printBT();

$test->main();

class printBT{
    //前序
    public function prePrint($head){

        if ($head == null || !($head instanceof Node)){
            return;
        }

        echo $head->val . " ";
        $this->prePrint($head->left);
        $this->prePrint($head->right);
    }


    //中序
    public function midPrint($head){

        if ($head == null || !($head instanceof Node)){
            return;
        }

        $this->midPrint($head->left);
        echo $head->val . " ";
        $this->midPrint($head->right);
    }

    //后序
    public function backPrint($head){

        if ($head == null || !($head instanceof Node)){
            return;
        }

        $this->backPrint($head->left);
        $this->backPrint($head->right);
        echo $head->val . " ";
    }

    public function main() {
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

        $this->prePrint($head);
        echo PHP_EOL;
        $this->midPrint($head);
        echo PHP_EOL;
        $this->backPrint($head);
    }
}

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



