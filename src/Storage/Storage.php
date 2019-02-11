<?php
/**
 * Created by PhpStorm.
 * User: Machenchi
 * Date: 2017/5/4
 * Time: 17:13
 * Copyright:EastSea
 */

namespace SIWF\Storage;


use SIWF\Tree\TreeNode;

interface Storage
{
    /**
     * @param $root TreeNode
     *
     * @return mixed
     */
    public function addRoot($root);

    /**
     * @return TreeNode
     */
    public function getRoot();
}