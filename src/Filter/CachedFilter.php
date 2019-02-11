<?php
/**
 * Created by PhpStorm.
 * User: Machenchi
 * Date: 2017/5/8
 * Time: 15:46
 * Copyright:EastSea
 */

namespace SIWF\Filter;

use SIWF\Storage\StorageAdapter;
use SIWF\Filter\Result\StorageAdapter as ResultStorageAdapter;

class CachedFilter extends Filter
{
    private $resStroage;

    public function __construct(StorageAdapter $storage,ResultStorageAdapter $result)
    {
        parent::__construct($storage);
        $this->resStroage = $result;
    }

    public function hint($txt)
    {
        $res = $this->resStroage->get($txt);
        if(is_null($res))
        {
            $res =  parent::hint($txt);
            $this->resStroage->add($txt,$res ? 1 : 0);
            return $res;
        }
        return $res === 0 ? false : $txt;
    }
}