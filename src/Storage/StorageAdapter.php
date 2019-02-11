<?php
/**
 * Created by PhpStorm.
 * User: Machenchi
 * Date: 2017/5/4
 * Time: 17:15
 * Copyright:EastSea
 */

namespace SIWF\Storage;

use SIWF\Tree\Builder;

abstract class StorageAdapter implements Storage
{
    protected $builder;

    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
    }
}