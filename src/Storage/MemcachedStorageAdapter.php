<?php
/**
 * Created by PhpStorm.
 * User: Machenchi
 * Date: 2017/6/27
 * Time: 13:08
 * Copyright:EastSea
 */

namespace SIWF\Storage;


use SIWF\Tree\Builder;
use SIWF\Tree\TreeNode;

class MemcachedStorageAdapter extends StorageAdapter
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
     * @var \Memcached
     */
    protected $cache;

    /**
     * MemcacheStorageAdapter constructor.
     *
     * @param Builder   $builder
     * @param \Memcached $cache
     */
    public function __construct(Builder $builder,\Memcached $cache)
    {
        parent::__construct($builder);
        $this->cache = $cache;
        $this->cachekey .= $this->prefix;
    }

    public function addRoot($root)
    {
        $this->cache->set($this->cachekey,serialize($root));
        return $this;
    }

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