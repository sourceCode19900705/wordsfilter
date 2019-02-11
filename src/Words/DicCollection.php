<?php
/**
 * Created by PhpStorm.
 * User: Machenchi
 * Date: 2017/5/4
 * Time: 17:38
 * Copyright:EastSea
 */

namespace SIWF\Words;


class DicCollection implements \IteratorAggregate
{
    protected $dics;

    public function __construct(array $dics = [])
    {
        $this->dics = $dics;
    }
    
    public function add($word)
    {
        $this->dic[] = $word;
    }
    public function getIterator()
    {
        return new \ArrayIterator($this->dics);
    }
}