<?php
/**
 * Created by PhpStorm.
 * User: Machenchi
 * Date: 2017/5/4
 * Time: 17:27
 * Copyright:EastSea
 */

namespace SIWF\Storage;

use SIWF\Tree\TreeNode;

/**
 * Class NativeStorageAdapter
 *
 * @package SIWF\Storage
 */
class NativeStorageAdapter extends StorageAdapter
{
    /**
     * @var
     */
    protected $root=null;
    

    /**
     * @param TreeNode $root
     * @return $this
     */
    public function addRoot($root)
    {
        $this->root = $root;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRoot()
    {
        if(is_null($this->root))
            $this->addRoot($this->builder->build());
        return $this->root;
    }

}