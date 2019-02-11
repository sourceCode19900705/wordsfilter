<?php
/**
 * Created by PhpStorm.
 * User: Machenchi
 * Date: 2017/5/4
 * Time: 17:47
 * Copyright:EastSea
 */

namespace SIWF\Words;


/**
 * Class FileWordsAdapter
 *
 * @package SIWF\Words
 */
class FileWordsAdapter extends WordsAdapter
{
    /**
     * @var
     */
    protected $file;

    /**
     * FileWordsAdapter constructor.
     *
     * @param $phpArrayFile
     */
    public function __construct($phpArrayFile)
    {
        $this->file = $phpArrayFile;
    }

    /**
     * @return DicCollection
     */
    public function getWords()
    {
        return new DicCollection(require($this->file));
    }
}