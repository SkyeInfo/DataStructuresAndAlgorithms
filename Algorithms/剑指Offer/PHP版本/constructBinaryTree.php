<?php
/**
 * 已知前序和中序重建二叉树
 * @author yangshengkai@chuchujie.com
 * @lastModifyTime 2019/3/1
 * @lastModify yangshengkai@chuchujie.com
 */
class TreeNode
{
    public $val;
    public $left;
    public $right;

    public function __construct($val)
    {
        if (isset($val)) {
            $this->val = $val;
        }
    }
}

function rebuildBinaryTree(array $preOrder, array $inOrder) {
    if (empty($preOrder) || empty($inOrder) || count($preOrder) == 0 || count($inOrder) == 0 || count($preOrder) != count($inOrder)) return false;

    $length = count($preOrder);
    $preOrderStartIdx = $inOrderStartIdx = 0;
    $preOrderEndIdx = $inOrderEndIdx = $length - 1;
    return constructTree($preOrder, $preOrderStartIdx, $preOrderEndIdx, $inOrder, $inOrderStartIdx, $inOrderEndIdx);
}
function constructTree($preOrder, $preOrderStartIdx, $preOrderEndIdx, $inOrder, $inOrderStartIdx, $inOrderEndIdx) {
    if ($preOrderStartIdx > $preOrderEndIdx || $inOrderStartIdx > $inOrderEndIdx) { return null; }

    $rootVal = $preOrder[$preOrderStartIdx];
    $root = new TreeNode($rootVal);

    for ($i = $inOrderStartIdx; $i <= $inOrderEndIdx; $i++) {
        if ($inOrder[$i] == $rootVal) {
            break;
        }
    }

    $leftLength = $i - $inOrderStartIdx;

    $root->left = constructTree($preOrder, $preOrderStartIdx + 1, $preOrderStartIdx + $leftLength, $inOrder, $inOrderStartIdx, $i - 1);
    $root->right = constructTree($preOrder, $preOrderStartIdx + $leftLength + 1, $preOrderEndIdx, $inOrder, $i + 1, $inOrderEndIdx);

    return $root;
}

function backPrint($head) {

    if ($head == null || !($head instanceof TreeNode)){
        return;
    }

    backPrint($head->left);
    backPrint($head->right);
    echo $head->val . " ";
}

$preOrder = [1,2,4,8,9,5,3,6,10,11,7];
$inOrder = [8,4,9,2,5,1,11,10,6,3,7];

$root = rebuildBinaryTree($preOrder, $inOrder);
backPrint($root);

