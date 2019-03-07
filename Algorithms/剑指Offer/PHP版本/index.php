<?php
/**
 *
 * @author skyeinfo@qq.com
 * @lastModifyTime 2019/2/26
 * @lastModify skyeinfo@qq.com
 */
$root = new TreeNode(1);
$one = new TreeNode(2);
$two = new TreeNode(3);
$three = new TreeNode(4);
$root->children = array($one, $two, $three);

$a = new Solution;
var_dump($a->levelOrder($root));
class TreeNode
{
    public $val;
    public $children;


    public function __construct($val)
    {
        for ($i = 1; $i<21;$i++){
            continue;
        }
        if (isset($val)) {
            $this->val = $val;
        }
    }
}
class Solution {

    /**
     * @param Node $root
     * @return Integer[][]
     */
    function levelOrder($root) {
        if ($root == null) return array();

        $queue = array();
        $rlt = array();
        array_push($queue, $root);

        while(!empty($queue)) {
            $node = array_shift($queue);

            array_push($rlt, $node->val);

            if(!empty($node->children)) {
                $childArr = $node->children;

                while(!empty($childArr)) {
                    array_push($queue, array_shift($childArr));
                }
            }
        }
        return $rlt;
    }
}
