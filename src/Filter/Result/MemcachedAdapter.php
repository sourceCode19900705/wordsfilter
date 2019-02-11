<?php
/**
 * Created by PhpStorm.
 * User: Machenchi
 * Date: 2017/5/8
 * Time: 15:55
 * Copyright:EastSea
 */

namespace SIWF\Filter\Result;


class MemcachedAdapter implements StorageAdapter
{
    private $namespace;
    
    private $cache;

    private $namespaceKey = 'namespace';

    private $prefix='siwf_result_';

    public function __construct(\Memcached $cache)
    {
        $this->cache = $cache;
        $this->init();
    }
    public function get($text)
    {
        $key = $this->prefix.$this->namespaceKey.$this->namespace.md5($text);
        $res = $this->cache->get($key);
        if($res === false)
            return null;
        return $res;
    }

    public function add($text, $isHint)
    {
        $key = $this->prefix.$this->namespaceKey.$this->namespace.md5($text);
        $this->cache->set($key,$isHint);
    }

    public function clear()
    {
        $this->cache->increment($this->prefix.$this->namespaceKey);
    }

    protected function init()
    {
        $this->namespace = $this->cache->get($this->prefix.$this->namespaceKey);
        if($this->namespace == false)
        {
            $namespace = rand(1,10000);
            $this->namespace = $namespace;
            $this->cache->set($this->prefix.$this->namespaceKey,$namespace);
        }
        return $this->namespace;
    }
}