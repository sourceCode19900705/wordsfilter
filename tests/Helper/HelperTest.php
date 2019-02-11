<?php

/**
 * Created by PhpStorm.
 * User: Machenchi
 * Date: 2017/5/4
 * Time: 18:34
 * Copyright:EastSea
 */
class HelperTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        @unlink('./words.txt');
        @unlink('./words.txt.php');
    }

    public function testFileToArray()
    {

        $file = './words.txt';
        file_put_contents($file, "simple".PHP_EOL,FILE_APPEND);
        file_put_contents($file,"illegal",FILE_APPEND);

        $filearray = make_text_file_to_array_file($file);
        $array = require($filearray);
        $expect = ['simple','illegal'];
        $this->assertSame($expect,$array);
        @unlink('./words.txt');
        @unlink('./words.txt.php');
    }
}
