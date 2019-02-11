<?php
/**
 * Created by PhpStorm.
 * User: Machenchi
 * Date: 2017/5/4
 * Time: 17:22
 * Copyright:EastSea
 */

namespace SIWF\Tree;


class TreeNode
{
    /**
     * @var string
     */
    protected $character;
    /**
     * @var array
     */
    protected $childs = [];

    protected $isEnd=false;

    /**
     * @return string
     */
    public function getCharacter()
    {
        return $this->character;
    }

    /**
     * @param string $character
     */
    public function setCharacter($character)
    {
        $this->character = $character;
    }

    /**
     * @return array
     */
    public function getChilds()
    {
        return $this->childs;
    }

    /**
     * @param array $childs
     */
    public function setChilds($childs)
    {
        $this->childs = $childs;
    }

    /**
     * @return boolean
     */
    public function isIsEnd()
    {
        return $this->isEnd;
    }



    /**
     * @param boolean $isEnd
     */
    public function setIsEnd($isEnd)
    {
        $this->isEnd = $isEnd;
    }

    /**
     * @param $key string
     * @param $node TrieNode
     * @return TrieNode
     */
    public function addChild($key,$node)
    {
        $this->childs[$key] = $node;
        return $node;
    }
}