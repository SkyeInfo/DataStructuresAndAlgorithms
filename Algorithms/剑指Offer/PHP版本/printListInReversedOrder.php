<?php
/**
 * 倒序打印链表
 * @author skyeinfo@qq.com
 * @lastModifyTime 2019/3/1
 * @lastModify skyeinfo@qq.com
 */
class ListNode
{
    public $val;
    public $next;

    public function __construct($value) {
        $this->val = $value;
        $this->next = null;
    }
}

function createList() {
    $head = new ListNode(-1);

    $node1 = new ListNode(1);
    $node2 = new ListNode(2);
    $node3 = new ListNode(3);
    $node4 = new ListNode(4);
    $node5 = new ListNode(5);

    $head->next = $node1;
    $node1->next = $node2;
    $node2->next = $node3;
    $node3->next = $node4;
    $node4->next = $node5;

    return $head;
}
//利用栈
function printListInReversedOrderWithStack(ListNode $head) {
    if ($head == null || $head->next == null) {
        return false;
    }

    $node = $head->next;
    $stack = array();

    while ($node != null) {
        array_push($stack, $node);
        $node = $node->next;
    }

    while (!empty($stack)) {
        $nodeTemp = array_pop($stack);

        echo $nodeTemp->val . ' ';
    }
}

//递归
function printListInReversedOrderRecursively(ListNode $node) {
    if ($node != null) {
        if ($node->next != null) {
            printListInReversedOrderRecursively($node->next);
        }

        echo $node->val . ' ';
    }

}
$head = createList();
printListInReversedOrderWithStack($head);
echo PHP_EOL;
printListInReversedOrderRecursively($head->next);
