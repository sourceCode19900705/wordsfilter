<?php
/**
 * Created by PhpStorm.
 * User: Machenchi
 * Date: 2017/5/4
 * Time: 18:05
 * Copyright:EastSea
 */

namespace SIWF\Storage;

use SIWF\Tree\Builder;
use SIWF\Tree\TreeNode;

/**
 * Class MemcacheStorageAdapter
 *
 * @package SIWF\Storage
 */
class MemcacheStorageAdapter extends StorageAdapter
{
    /**
     * @var string
     */
    protected $prefix = 'siwf_';

    /**
     * @var string
     */
    protected $cachekey = 'treeroot';

    /**
     * @var \Memcache
     */
    protected $cache;

    /**
     * MemcacheStorageAdapter constructor.
     *
     * @param Builder   $builder
     * @param \Memcache $cache
     */
    public function __construct(Builder $builder,\Memcache $cache)
    {
        parent::__construct($builder);
        $this->cache = $cache;
        $this->cachekey .= $this->prefix;
    }


    /**
     * @param TreeNode $root
     * @return $this
     */
    public function addRoot($root)
    {
        $this->cache->set($this->cachekey,serialize($root));
        return $this;
    }

    /**
     * @return array|TreeNode|string
     */
    public function getRoot()
    {
        $root = unserialize($this->cache->get($this->cachekey));
        if(!$root)
        {
            $root = $this->builder->build();
            $this->addRoot($root);
        }
        return $root;
    }

    /**
     *
     */
    public function clear()
    {
        $this->cache->set($this->cachekey,null);
    }
}