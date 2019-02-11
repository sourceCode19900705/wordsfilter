<?php
/**
 * Created by PhpStorm.
 * User: Machenchi
 * Date: 2017/5/8
 * Time: 15:53
 * Copyright:EastSea
 */

namespace SIWF\Filter\Result;


interface StorageAdapter
{
    public function get($text);
    
    public function add($text,$isHint);
    
    public function clear();
}