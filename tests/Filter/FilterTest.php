<?php

/**
 * Created by PhpStorm.
 * User: Machenchi
 * Date: 2017/5/4
 * Time: 16:58
 * Copyright:EastSea
 */
class FilterTest extends PHPUnit_Framework_TestCase
{
    public function testFilterWithNativeStorage()
    {
        $wordsAdapter = new \SIWF\Words\ArrayWordsAdapter(['simple','illegal']);
        $builder = new \SIWF\Tree\Builder($wordsAdapter);
        $storage = new \SIWF\Storage\NativeStorageAdapter($builder);
        $filter = new \SIWF\Filter\Filter($storage);

        $txt = 'A very simple illegal words filter';
        $hint = $filter->hint($txt);
        $this->assertSame('simple', $hint);
    }
}