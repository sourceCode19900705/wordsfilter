<?php
/**
 * Created by PhpStorm.
 * User: Machenchi
 * Date: 2017/5/4
 * Time: 18:01
 * Copyright:EastSea
 */

namespace SIWF\Words;


class ArrayWordsAdapter extends WordsAdapter
{
    protected $words;
    
    public function __construct(array $words)
    {
        $this->words = $words;
    }
    
    public function getWords()
    {
        return new DicCollection($this->words);
    }

}