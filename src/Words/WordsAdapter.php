<?php
/**
 * Created by PhpStorm.
 * User: Machenchi
 * Date: 2017/5/4
 * Time: 17:09
 * Copyright:EastSea
 */

namespace SIWF\Words;


abstract class WordsAdapter
{
    /**
     * @return DicCollection
     */
    abstract public function getWords();
}