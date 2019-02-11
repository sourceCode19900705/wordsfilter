<?php
/**
 * Created by PhpStorm.
 * User: Machenchi
 * Date: 2017/5/4
 * Time: 17:00
 * Copyright:EastSea
 */

namespace SIWF\Filter;

use SIWF\Storage\StorageAdapter;

class Filter
{
    protected $storage;
    
    protected $charset='UTF8';
    
    public function __construct(StorageAdapter $storage)
    {
        $this->storage = $storage;
    }

    public function hint($txt)
    {
        $root = $this->storage->getRoot();
        $len = mb_strlen($txt,$this->charset);
        for($i = 0;$i<$len;$i++){
            $s = mb_substr($txt,$i,1,$this->charset);
            $str = '';
            $node = $root;
            for($j = $i;$j<$len;$j++){
                if(!array_key_exists($s,$node->getChilds())){
                    break;
                }
                $node = $node->getChilds()[$s];
                $str .= $s;
                $s = mb_substr($txt,$j+1,1,$this->charset);
            }
            if(!empty($str) && ($node->isIsEnd() == true)){
                return $str;
            }
        }
        return false;
    }

    public function setCharset($encoding)
    {
        $this->charset = $encoding;
    }
}