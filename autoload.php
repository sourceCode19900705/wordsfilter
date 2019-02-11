<?php
/**
 * Created by PhpStorm.
 * User: Machenchi
 * Date: 2017/3/29
 * Time: 22:49
 * Copyright:EastSea
 */

function autoloadClass($class){
    $dir = __DIR__;
    $classMap = [
        'SIWF'=>$dir.DIRECTORY_SEPARATOR.'src'
    ];
    $classArray = explode('\\',$class);
    if(array_key_exists($classArray[0], $classMap)){
        $classDir = $classMap[$classArray[0]];
        array_shift($classArray);
        $classPath = implode(DIRECTORY_SEPARATOR,$classArray);
        $classFile = $classDir.DIRECTORY_SEPARATOR.$classPath.'.php';
        if(file_exists($classFile))
            include $classFile;
    }else{
        //This namespace is not my project namespace
    }
}
spl_autoload_register('autoloadClass');